<?php

namespace App\Imports;

use App\Models\Sample;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use ErrorException;
use Carbon\Carbon;

class SamplesImport implements ToCollection, WithHeadingRow, SkipsOnFailure, WithMapping
{
    
    use SkipsFailures;
    
    
    private $rows = 0; // no. of rows count processed;
    private $wasRecentlyCreated = 0; // no. of rows count inserted;
    
    
    
    public function collection(Collection $rows)
    {
        $data = $rows->toArray();
        //dd($data);
        
        $rules = [
            '*.kit_id' => ['required', 'exists:kits,id', 'distinct'],
            '*.sample_id' => ['required', 'exists:kits,sample_id', 'distinct'],
            '*.lab_id' => 'array',
            '*.sample_registered_date'=>'required|date',
            '*.analysis_date'=>'sometimes|nullable|date|after_or_equal:*.sample_registered_date',
            '*.rtpcr_analysis_date'=>'sometimes|nullable|date|after_or_equal:*.sample_registered_date',
            '*.reporting_date'=>'sometimes|nullable|date|after_or_equal:*.sample_registered_date|after_or_equal:*.analysis_date|required_with:*.cobas_result,*.genotyping_result,*.luminex_result,*.rtpcr_result'
        ];
        

        $messages = [];
        
        
        foreach ($data as $key => $val){
            /*Adding [complex/]conditional rules and messages.*/
            
            $rules = array_merge($rules, [$key.'.lab_id' => ['sometimes', 'nullable', 'distinct', 'unique:samples,lab_id,'.$val['kit_id'].',kit_id']]);
            
            
            if(!empty($val['analysis_date'])){
                //$rules = array_merge($rules, [$key.'.analysis_date' => ['after_or_equal:'.$key.'.sample_registered_date']]);
                
                $messages["$key.analysis_date.date"] = "Error on row: <strong>".($key+2)."</strong>. The analysis_date <strong>".(Arr::exists($val, "analysis_date")?$val['analysis_date']:"").
                        "</strong> is not a valid date.";
                
                $messages["$key.analysis_date.after_or_equal"] = "Error on row: <strong>".($key+2)."</strong>. The analysis_date <strong>".(Arr::exists($val, "analysis_date")?$val['analysis_date']:"").
                        "</strong> must be a date after or equal to sample_registered_date <strong>".(Arr::exists($val, "sample_registered_date")?$val['sample_registered_date']:"").
                        "</strong>.";
            }
            
            if(!empty($val['rtpcr_analysis_date'])){
                //$rules = array_merge($rules, [$key.'.rtpcr_analysis_date' => ['after_or_equal:'.$key.'.sample_registered_date']]);
                
                $messages["$key.rtpcr_analysis_date.date"] = "Error on row: <strong>".($key+2)."</strong>. The rtpcr_analysis_date <strong>".(Arr::exists($val, "rtpcr_analysis_date")?$val['rtpcr_analysis_date']:"").
                        "</strong> is not a valid date.";
                
                $messages["$key.rtpcr_analysis_date.after_or_equal"] = "Error on row: <strong>".($key+2)."</strong>. The rtpcr_analysis_date <strong>".(Arr::exists($val, "rtpcr_analysis_date")?$val['rtpcr_analysis_date']:"").
                        "</strong> must be a date after or equal to sample_registered_date <strong>".(Arr::exists($val, "sample_registered_date")?$val['sample_registered_date']:"").
                        "</strong>.";
            }
            
            if(!empty($val['reporting_date'])){
                //$rules = array_merge($rules, [$key.'.reporting_date' => ['after_or_equal:'.$key.'.sample_registered_date,', 'after_or_equal:'.$key.'.analysis_date']]);
                
                $messages["$key.reporting_date.date"] = "Error on row: <strong>".($key+2)."</strong>. The reporting_date <strong>".(Arr::exists($val, "reporting_date")?$val['reporting_date']:"").
                        "</strong> is not a valid date.";
                
                $rules = array_merge($rules, [$key.'.result' =>['required_without_all:'.$key.'.cobas_result,'.$key.'.genotyping_result,'.$key.'.luminex_result,'.$key.'.rtpcr_result']]);
                $messages["$key.result.required_without_all"] = "Error on row: <strong>".($key+2)."</strong>. At least one of the cobas result / genotyping result / luminex result / rtpcr result is required
                                          when the reporting date is present.";
                
                
                /*
                $messages["$key.reporting_date.after_or_equal.$key.sample_registered_date"] = "Error on row: <strong>".($key+2)."</strong>. The reporting_date <strong>".(Arr::exists($val, "reporting_date")?$val['reporting_date']:"").
                        "</strong> must be a date after or equal to sample_registered_date <strong>".(Arr::exists($val, "sample_registered_date")?$val['sample_registered_date']:"").
                        "</strong>.";
                
                $messages["$key.reporting_date.after_or_equal.$key.analysis_date"] = "Error on row: <strong>".($key+2)."</strong>. The reporting_date <strong>".(Arr::exists($val, "reporting_date")?$val['reporting_date']:"").
                        "</strong> must be a date after or equal to analysis_date <strong>".(Arr::exists($val, "analysis_date")?$val['analysis_date']:"").
                        "</strong>.";
                */
                
                $reporting_date_msg = "";
                $append_li = false;
                
                if(!empty($val['sample_registered_date']) && !Carbon::parse($val['reporting_date'])->gte(Carbon::parse($val['sample_registered_date']))){
                    $reporting_date_msg = "Error on row: <strong>".($key+2)."</strong>. The reporting_date <strong>".(Arr::exists($val, "reporting_date")?$val['reporting_date']:"").
                    "</strong> must be a date after or equal to sample_registered_date <strong>".(Arr::exists($val, "sample_registered_date")?$val['sample_registered_date']:"").
                    "</strong>.";
                    $append_li = true;
                }
                
                if(!empty($val['analysis_date']) && !Carbon::parse($val['reporting_date'])->gte(Carbon::parse($val['analysis_date']))){
                    $reporting_date_msg .= ($append_li?"<li>":"")."Error on row: <strong>".($key+2)."</strong>. The reporting_date <strong>".(Arr::exists($val, "reporting_date")?$val['reporting_date']:"").
                    "</strong> must be a date after or equal to analysis_date <strong>".(Arr::exists($val, "analysis_date")?$val['analysis_date']:"").
                    "</strong>".($append_li?"</li>":"");
                    
                }
                
                $messages["$key.reporting_date.after_or_equal"] = $reporting_date_msg;
                
                
            }
            
            
            /*Adding messages for array based field validation.*/
            $messages["$key.kit_id.required"] = "Error on row: <strong>".($key+2)."</strong>. kit_id missing."
                .   " The kit_id is required.";
            
            $messages["$key.kit_id.exists"] = "Error on row: <strong>".($key+2)."</strong>. No kit with kit_id <strong>"
                    .(Arr::exists($val, "kit_id")?$val['kit_id']:"")."</strong> found. The kit should already be registered "
                    ."before importing the sample.";
                        
            $messages["$key.kit_id.distinct"] = "Error on row: <strong>".($key+2)."</strong>. The kit_id <strong>".(Arr::exists($val, "kit_id")?$val['kit_id']:"").
                    "</strong> has a duplicate value. ".
                    " The kit_id must be unique.";
                        
                        
                        
            $messages["$key.sample_id.required"] = "Error on row: <strong>".($key+2)."</strong>. sample_id missing."
                    ." The sample_id is required.";;
            
            $messages["$key.sample_id.exists"] = "Error on row: <strong>".($key+2).
                    "</strong>. No sample with sample_id <strong>".(Arr::exists($val, "sample_id")?$val['sample_id']:"").
                    "</strong> found. The sample_id should be registered before importing the sample.";
                
            $messages["$key.sample_id.distinct"] = "Error on row: <strong>".($key+2)."</strong>. The sample_id <strong>".(Arr::exists($val, "sample_id")?$val['sample_id']:"").
                    "</strong> has a duplicate value. ".
                    " The sample_id must be unique.";
                            
            
            
            $messages["$key.lab_id.distinct"] = "Error on row: <strong>".($key+2)."</strong>. The lab_id <strong>".(Arr::exists($val, "lab_id")?$val['lab_id']:"").
                    "</strong> has a duplicate value. ".
                    " The lab_id must be unique.";
            
            $messages["$key.lab_id.unique"] = "Error on row: <strong>".($key+2).
                    "</strong>. The lab_id <strong>".(Arr::exists($val, "lab_id")?$val['lab_id']:"").
                    "</strong> has already been registered. The lab_id must be unique.";
            
            
            
            $messages["$key.sample_registered_date.required"] = "Error on row: <strong>".($key+2)."</strong>. sample_registered_date missing.".
                    " sample_registered_date is required.";
                            
            $messages["$key.sample_registered_date.date"] = "Error on row: <strong>".($key+2)."</strong>. The sample_registered_date <strong>".(Arr::exists($val, "sample_registered_date")?$val['sample_registered_date']:"").
                    "</strong> is not a valid date.";
            
            
            
            $messages["$key.reporting_date.required_with"] = "Error on row: <strong>".($key+2)."</strong>. The reporting_date is required when at least one of the cobas result / genotyping result / luminex result / rtpcr result
                        is present.";
            
                            
        }
        
        
        $validator = Validator::make($data, $rules, $messages)->validate();
        //dd($messages);
        //dd($validator->errors());
        //dd($validator);

        
         
         foreach ($data as $row) {
             ++$this->rows;
             $sample = Sample::updateOrCreate(
                         ['kit_id' => $row['kit_id'], 'sample_id' => $row['sample_id']],
                         [
                             'lab_id' => $row['lab_id'],
                             'sample_registered_date' => $row['sample_registered_date'],
                             'cobas_result' => $row['cobas_result'],
                             'genotyping_result' => $row['genotyping_result'],
                             'luminex_result' => $row['luminex_result'],
                             'analysis_date' => $row['analysis_date'],
                             'rtpcr_result' => $row['rtpcr_result'],
                             'rtpcr_analysis_date' => $row['rtpcr_analysis_date'],
                             'reported_via' => $row['reported_via'],
                             'reporting_date' => $row['reporting_date']
                         ]
                     );
             if($sample->reporting_date){
                 $sample->kit->order->update(['status' => config('constants.results.RESULT_RECEIVED')]);
             }
             elseif($sample->sample_registered_date){
                 $sample->kit->order->update(['status' => config('constants.samples.SAMPLE_REGISTERED')]);
             }
             
             if($sample->wasRecentlyCreated)
                 ++$this->wasRecentlyCreated;
             
         }
         
        
    }

    public function map($row): array
    {
        try {

            if (gettype($row['sample_registered_date']) == 'integer' || gettype($row['sample_registered_date']) == 'double'){
                $row['sample_registered_date'] = Date::excelToDateTimeObject($row['sample_registered_date'])->format('Y-m-d');
            }
            
            if(gettype($row['analysis_date']) == 'integer' || gettype($row['analysis_date']) == 'double'){
                $row['analysis_date'] = Date::excelToDateTimeObject($row['analysis_date'])->format('Y-m-d');
            }
            
            if (gettype($row['rtpcr_analysis_date']) == 'integer' || gettype($row['rtpcr_analysis_date']) == 'double'){
                $row['rtpcr_analysis_date'] = Date::excelToDateTimeObject($row['rtpcr_analysis_date'])->format('Y-m-d');
            }
            
            if(gettype($row['reporting_date']) == 'integer' || gettype($row['reporting_date']) == 'double'){
                $row['reporting_date'] = Date::excelToDateTimeObject($row['reporting_date'])->format('Y-m-d');
            }
             
        }
        catch (ErrorException $e){
            
            //dd($e);
        }
        //dd($row);
        return $row;
        
    }
    

    
    public function getRowCount(): int
    {
        return $this->rows;
    }
    
    public function getInsertedRowCount(): int
    {
        return $this->wasRecentlyCreated;
    }
    
    public function getUpdatedRowCount(): int
    {
        return ($this->rows-$this->wasRecentlyCreated);
    }
}
