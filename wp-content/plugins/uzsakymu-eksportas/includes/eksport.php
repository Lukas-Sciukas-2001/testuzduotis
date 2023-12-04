<?php

function eksportuoti_duomenis(){

    $uzsakymai = wc_get_orders(array(
        'limit' => -1
    ));

    $duomenys = array();
    foreach($uzsakymai as $uzsakymas) {
        $uz_id = $uzsakymas->get_id();
        $produktai = $uzsakymas->get_items();
        $prekes='';

        foreach($produktai as $produktas){
            $prekes=$prekes.$produktas->get_name()." ";
        }
        $vardas = $uzsakymas->get_billing_first_name();
        $pavarde = $uzsakymas->get_billing_last_name();
        $suma = $uzsakymas->get_total();
        $sumaPristatymas = $uzsakymas->get_shipping_total();
        $mokejimoBudas = $uzsakymas->get_payment_method_title();
        $duomenys[]=array(
            'id' => $uz_id,
            'prekes' => $prekes,
            'vardas' => $vardas,
            'pavarde' =>$pavarde,
            'suma' => $suma,
            'pristatymo mokestis' => $sumaPristatymas,
            'apmokejimo budas' => $mokejimoBudas
        );
    }

    $data = date('Y-m-d');
    $csvFailoLink=PLUGINO_FOLDER.'uzsakymai-'.$data.'.csv';
    $csvFailas=fopen($csvFailoLink,'w');
    fputcsv($csvFailas,['ID','Prekes','Vardas','Pavarde','Suma','Pristatymo_mokestis','Apmokejimo_budas']);
    foreach ($duomenys as $duomuo) {
        $linija = [
            $duomuo['id'],
            $duomuo['prekes'],
            $duomuo['vardas'],
            $duomuo['pavarde'],
            $duomuo['suma'],
            $duomuo['pristatymo mokestis'],
            $duomuo['apmokejimo budas'],
        ];
        fputcsv($csvFailas,$linija);
        
    }
    fclose($csvFailas);
    




    wp_redirect(admin_url('admin.php?page=uzsakymu-eksportas&statusas=1'));
}