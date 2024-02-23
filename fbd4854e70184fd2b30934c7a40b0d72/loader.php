<?php

    set_time_limit(500); 

    $displayDatas = [];
    $sites = [];

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://monitoring.wavecontrol.com/api/v1/sites?api_key=6228b214b3e38");

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($curl);

    $sites = json_decode($output);

    curl_close($curl);

    function RemoveSpecialChar($str) {
        $res = str_replace( array(','), ' ', $str);       
        return $res;
    }

    foreach($sites as $site){
        $tempArray = [];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://monitoring.wavecontrol.com/api/v1/site/".$site->site_id."/?api_key=6228b214b3e38");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        $temp = json_decode($output);
        curl_close($curl);

        $curl1 = curl_init();
        curl_setopt($curl1, CURLOPT_URL, "https://monitoring.wavecontrol.com/api/v1/site/".$site->site_id."/measurements?api_key=6228b214b3e38");
        curl_setopt($curl1, CURLOPT_RETURNTRANSFER, 1);
        $output1 = curl_exec($curl1);
        $temp1 = json_decode($output1);
        curl_close($curl1);

        $tempSite = RemoveSpecialChar($temp->site_name);
        $tempStreet = RemoveSpecialChar($temp->street);


        $tempArray = [
            'name' => $tempSite,
            'street' => $tempStreet,
            'lat' => $temp->latitude,
            'lon' => $temp->longitude,
            'measurement' => $temp1->stadistic_data->avg_measure,
            'date' => end($temp1->measurements)->measure_datetime
        ];
        array_push($displayDatas, $tempArray);    
    }

    $indicatorFilePath = './csv/data.csv';

    $csvData = '';
    foreach($displayDatas as $row){
        $csvData .= implode(',', $row) . "\n";
        file_put_contents($indicatorFilePath, $csvData);
    } 
?>