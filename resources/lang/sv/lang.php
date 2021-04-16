<?php 

return [
    'admin' => 'Admin',
    'menu' => 'Meny',
    'dashboard' => 'Dashboard',
    'orders' => 'Beställningar',
    'kits' => 'Kits',
    'sample-results' => 'Prov Svar',
    'users' => 'Users',
    'reports' => 'Rapporter',
    'Language' => 'Språk',
    'Login' => 'Logga in',
    'Log out' => 'Logga ut',
    'Register' => 'Registrera',
     'Order' => 'Beställa',
    'Email' => 'E-post',
    'Password' => 'Lösenord',
    'Confirm Password' =>'Bekräfta Lösenord',
    'Current Password' => 'Nuvarande Lösenord',
    'New Password' => 'Nytt Lösenord',
    'Confirm New Password' => 'Bekräfta Nytt Lösenord',
    'Remember me' => 'Håll mig inloggad',
    'Already registered?' => 'Redan registrerad?',
    'Forgot your password?' => 'Glömt ditt lösenord?',
    'Email Password Reset Link' => 'E-post Lösenord Återställ Länk',
    'Reset Password' => 'Återställ Lösenord',
    'back' => 'Tillbaka',
    'to-front' => 'Till Hemsidan',
    'edit-user' => 'Redigera User',
    'delete-user' => 'Ta bort User',
    'Whoops! Something went wrong.' => 'Oj då! Något gick fel.',
    'wrong-current-password' => 'Ditt nuvarande lösenord matchar inte lösenordet du angav. Ange rätt nuvarande lösenord.',
    'password_update_success_msg' => 'Lösenordet har uppdaterats!',
    'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.' => 'Glömt ditt lösenord? Inga problem. Låt oss bara veta din e-postadress så skickar vi dig en länk för återställning av lösenord som gör att du kan välja en ny.',
    'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.' => 'Tack för att du registrerade dig! Innan du kom igång, kunde du verifiera din e-postadress genom att klicka på länken som vi just skickade till dig? Om du inte fick e-postmeddelandet skickar vi gärna ett annat till dig.',
    'A new verification link has been sent to the email address you provided during registration.' => 'En ny verifieringslänk har skickats till den e-postadress du angav under registreringen.',
    'Resend Verification Email' => 'Skicka Verifieringsemail Igen',
    'I have read, agreed and want to order.' => 'Jag har läst, samtyckt och vill beställa.',
    'I do not consent and do not wish to be contacted.' => 'Jag samtycker inte och vill inte bli kontaktad.',
    'click-button-to-order' => 'Beställa provtagningsmaterial med svarskuvert samt instruktioner genom knappen nedan.',
    'order-success-msg' => "Din beställning har tagits emot och den kommer att skickas
                            till din folkbokföringsadress om några dagar.
                            Om du vill att den ska skickas till en annan adress eller se
                            status kan du göra det på <a style=\"
                            color: cornflowerblue;\" href=".url('/myprofile').">mina sidor</a>
                            eller kontakta oss på hpvcenter@ki.se.",
    'click-button-to-withdraw-consent' => 'Om du är säker att du vill inte delta, avsluta deltagandet genom knappen nedan.',
    'regret-withdraw-consent' => 'Om du avslutar kommer vi inte kontakta dig längre. Däremot om du ångrar dig, behöver du bara
		                          samtycker igen på hemsidan och beställa självprovtagningskit.',
    'end-participation' => 'Avsluta',
    'unsubscribed-msg' => "Din deltagande i studien har avslutats och kommer vi inte kontakta dig längre. Däremot om du ångrar dig, behöver du bara
		                   samtycker igen på <a style=\"color: cornflowerblue;\" href=".url('/').">hemsidan</a> och beställa självprovtagningskit.",
    'profile' => 'Mina Sidor',
    'change-password' => 'Ändra lösenord',
    'my-details' => 'Mina Uppgifter',
    'name' => 'Namn',
    'ssn' => 'Personnummer',
    'address' => 'Adress',
    'check-edit' => 'Kontrollera/Redigera',
    'edit-address' => 'Redigera Adress',
    'phonenumber' => 'Phonenummer',
    'street-number-apartment' => 'Gata/Gatunummer/Lgh',
    'post-code' => 'Postnummer',
    'town-city' => 'Ort',
    'country' => 'Land',
    'select' => 'Välja',
    'update' => 'Uppdatera',
    'cancel' => 'Cancel',
    'address-updated' => 'Adress Uppdaterad',
    'my-orders' => 'Mina Beställningar',
    'no-orders' => 'Inga Beställningar',
    'latest' => 'Senaste',
    'order-date' => 'Beställning Datum',
    'status' => 'Status',
    'view-all' => 'See alla',
    'test-results' => 'Provsvar',
    'not-ready-yet' => 'Inte färdigt än',
    'result' => 'Result',
    'reporting-date' => 'Rapporterad Datum',
    'sample-registered-date' => 'Prov Registrerad Datum',
    'result-message' => 'Meddelande',
    /*Kit Import*/
    'order_id.required' => "Fel på rad: <strong> :row </strong>. Order_id saknas. "
                                 . "Order_id krävs.",
    'order_id.exists' => "Fel på rad: <strong>:row</strong>. Ingen order med order_id <strong>:order_id</strong> hittades. Beställningen ska göras "
                                         . "innan du registrerar ett kit.",
    'order_id.distinct' => "Fel på rad: <strong>:row</strong>. Order_id <strong>:order_id</strong> har ett duplikatvärde. ".
                                             "Order_id måste vara unik.",
    'sample_id.required_with' => "Fel på rad: <strong>:row</strong>. Sample_id saknas. "
                                             . "Sample_id krävs när sample_received_date är närvarande.",
    'sample_id.distinct' => "Fel på rad: <strong>:row</strong>. Sample_id <strong>:sample_id</strong> har ett duplikatvärde. ".
                                             "Sample_id måste vara unik.",
    'barcode.unique' => "Fel på rad: <strong>:row</strong>. Barcode <strong>:barcode</strong> har redan registrerats. Barcode måste vara unik.",
    'barcode.distinct' => "Fel på rad: <strong>:row</strong>. Barcode <strong>:barcode</strong> har ett duplikatvärde. ".
                                              " Barcode måste vara unik.",
    'kit_dispatched_date.required' => "Fel på rad: <strong>:row</strong>. Kit_dispatched_date saknas. ".
                                                 "Ange datumet när kit kommer att skickas.",
    'kit_dispatched_date.date' => "Fel på rad: <strong>:row</strong>. Kit_dispatched_date <strong>:kit_dispatched_date</strong> är inte ett giltigt datum.
                                                 Ange ett giltigt datum (åååå-mm-dd).",
    'sample_received_date.date' => "Fel på rad: <strong>:row</strong>. Sample_received_date <strong>:sample_received_date</strong> är inte ett giltigt datum.
                                                 Ange ett giltigt datum (åååå-mm-dd).",
    'sample_received_date.required_with' => "Fel på rad: <strong>:row</strong>. Sample_received_date saknas."
                                                 ." Sample_received_date krävs när sample_id är närvarande.",
    'sample_received_date.after_or_equal' => "Fel på rad: <strong>:row</strong>. Sample_received_date <strong>:sample_received_date</strong> måste vara ett datum efter eller samma som kit_dispatched_date <strong>:kit_dispatched_date</strong>.",
    'kits_import_success_msg' => "<strong>:total</strong> Kits/Samples har bearbetats framgångsrikt! <br>
                            varav <strong>:insert</strong> Kits/Samples har skapats och <strong>
                            :update</strong> Kits/Samples har uppdaterats.",
    /*Sample Import*/
    'cobas_analysis_date.required_with' => "Fel på rad: <strong>:row</strong>. Cobas_analysis_date saknas."
                                        ." Cobas_analysis_date krävs när cobas_result är närvarande.",
    'cobas_result.in' => "Fel på rad: <strong>:row</strong>. Cobas_result <strong>:cobas_result</strong> är ogiltigt. Endast tillåtet ett av värdena <strong>:allowed</strong>.",
    'cobas_analysis_date.date' => "Fel på rad: <strong>:row</strong>. Cobas_analysis_date <strong>:cobas_analysis_date</strong> är inte ett giltigt datum.
                                                Ange ett giltigt datum (åååå-mm-dd).",
    'cobas_result.required_with' => "Fel på rad: <strong>:row</strong>. Cobas_result saknas."
                                                ." Cobas_result krävs när cobas_analysis_date är närvarande.",
    'cobas_analysis_date.after_or_equal' => "Fel på rad: <strong>:row</strong>. Cobas_analysis_date <strong>:cobas_analysis_date</strong> måste vara ett datum efter eller samma som sample_registered_date <strong>:sample_registered_date</strong>.",
    'luminex_analysis_date.required_with' => "Fel på rad: <strong>:row</strong>. Luminex_analysis_date saknas."
                                            ." Luminex_analysis_date krävs när luminex_result är närvarande.",
    'luminex_result.in' => "Fel på rad: <strong>:row</strong>. Luminex_result <strong>:luminex_result</strong> är ogiltigt. Endast tillåtet ett av värdena <strong>:allowed</strong>.",
    'luminex_analysis_date.date' => "Fel på rad: <strong>:row</strong>. Luminex_analysis_date <strong>:luminex_analysis_date</strong> är inte ett giltigt datum.
                                                Ange ett giltigt datum (åååå-mm-dd).",
    'luminex_result.required_with' => "Fel på rad: <strong>:row</strong>. Luminex_result saknas."
                                                ." Luminex_result krävs när luminex_analysis_date är närvarande.",
    'luminex_analysis_date.after_or_equal' => "Fel på rad: <strong>:row</strong>. Luminex_analysis_date <strong>:luminex_analysis_date</strong> måste vara ett datum efter eller samma som sample_registered_date <strong>:sample_registered_date</strong>.",
    'rtpcr_analysis_date.required_with' => "Fel på rad: <strong>:row</strong>. Rtpcr_analysis_date saknas."
                                                        ." Rtpcr_analysis_date krävs när rtpcr_result är närvarande.",
    'rtpcr_result.in' => "Fel på rad: <strong>:row</strong>. Rtpcr_result <strong>:rtpcr_result</strong> är ogiltigt. Endast tillåtet ett av värdena <strong>:allowed</strong>.",
    'rtpcr_analysis_date.date' => "Fel på rad: <strong>:row</strong>. Rtpcr_analysis_date <strong>:rtpcr_analysis_date</strong> är inte ett giltigt datum.
                                                Ange ett giltigt datum (åååå-mm-dd).",
    'rtpcr_result.required_with' => "Fel på rad: <strong>:row</strong>. Rtpcr_result saknas."
                                                ." Rtpcr_result krävs när rtpcr_analysis_date är närvarande.",
    'rtpcr_analysis_date.after_or_equal' => "Fel på rad: <strong>:row</strong>. Rtpcr_analysis_date <strong>:rtpcr_analysis_date</strong> måste vara ett datum efter eller samma som sample_registered_date <strong>:sample_registered_date</strong>.",
    'reporting_date.required_with' => "Fel på rad: <strong>:row</strong>. Reporting_date saknas."
                                                      ." Reporting_date krävs när final_reporting_result är närvarande.",
    'final_reporting_result.in' => "Fel på rad: <strong>:row</strong>. Final_reporting_result <strong>:final_reporting_result</strong> är ogiltigt. Endast tillåtet ett av värdena <strong>:allowed</strong>.",
    'reporting_date.date' => "Fel på rad: <strong>:row</strong>. Reporting_date <strong>:reporting_date</strong> är inte ett giltigt datum.
                                                Ange ett giltigt datum (åååå-mm-dd).",
    'final_reporting_result.required_with' => "Fel på rad: <strong>:row</strong>. Final_reporting_result saknas."
                                            ." Final_reporting_result krävs när reporting_date är närvarande.",
    'reporting_date.after_or_equal' => "Fel på rad: <strong>:row</strong>. Reporting_date <strong>:reporting_date</strong> måste vara ett datum efter eller samma som sample_registered_date <strong>:sample_registered_date</strong>.",
    'kit_id.required' => "Fel på rad: <strong>:row</strong>. Kit_id saknas. "
                                 . "Kit_id krävs.",
    'kit_id.exists' => "Fel på rad: <strong>:row</strong>. Ingen kit med kit_id <strong>:kit_id</strong> hittades. Kit bör redan registreras innan sample importeras.",
    'kit_id.distinct' => "Fel på rad: <strong>:row</strong>. Kit_id <strong>:kit_id</strong> har ett duplikatvärde. ".
                                      " Kit_id måste vara unik.",
    'sample_id.required' => "Fel på rad: <strong>:row</strong>. Sample_id saknas."
                                    ." Sample_id krävs.",
    'sample_id.distinct' => "Fel på rad: <strong>:row</strong>. Sample_id <strong>:sample_id</strong> har ett duplikatvärde. ".
                                    " Sample_id måste vara unik.",
    'lab_id.distinct' => "Fel på rad: <strong>:row</strong>. Lab_id <strong>:lab_id</strong> har ett duplikatvärde. ".
                                    " Lab_id måste vara unik.",
    'lab_id.unique' => "Fel på rad: <strong>:row</strong>. The lab_id <strong>:lab_id</strong> har redan registrerats. Lab_id måste vara unik.",
    'sample_registered_date.required' => "Fel på rad: <strong>:row</strong>. Sample_registered_date saknas."
                                                    ." Sample_registered_date krävs.",
    'sample_registered_date.date' => "Fel på rad: <strong>:row</strong>. Sample_registered_date <strong>:sample_registered_date</strong> är inte ett giltigt datum.
                                                Ange ett giltigt datum (åååå-mm-dd).",
    'samples_import_success_msg' => "<strong>:total</strong> Samples har bearbetats framgångsrikt! <br>
                            varav <strong>:insert</strong> Samples har skapats och <strong>
                            :update</strong> Samples har uppdaterats.",
];
