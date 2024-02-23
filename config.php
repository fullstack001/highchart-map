<?php

    $indicators = [];
    $indicatorFilePath = './fbd4854e70184fd2b30934c7a40b0d72/csv/data.csv';
    $indicatorFile = fopen($indicatorFilePath, 'r');
    if($indicatorFile !== false){
        $newData = [];
        while(($row = fgetcsv($indicatorFile)) !== false){
            $newData = $row;
            array_push($indicators, $newData);
        }
        fclose($indicatorFile);
    }else{
        echo "Error opening the indicator file.";
    }

    
    $trashholders = [];
    $trasholderFilePath = './fbd4854e70184fd2b30934c7a40b0d72/csv/trasholder.csv';
    $trashholderFile = fopen($trasholderFilePath, 'r');
    if($trashholderFile !== false){
        $newData = [];
        while(($row = fgetcsv($trashholderFile)) !== false){
            $newData = $row;
            array_push($trashholders, $newData);
        }
        fclose($trashholderFile);
    }else{
        echo "Error opening the indicator file.";
    }


?>