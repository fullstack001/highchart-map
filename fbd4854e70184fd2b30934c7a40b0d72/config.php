<?php
    date_default_timezone_set('Asia/Qatar');
    
    $passwordArray = [];
    $passwordFilePath = './csv/password.csv'; 
    $passwordFile = fopen($passwordFilePath, 'r');

    if($passwordFile !== false){
        $newData = [];
        while(($row = fgetcsv($passwordFile)) !== false){
            $newData = $row;
            array_push($passwordArray, $newData);
        }
        fclose($passwordFile);
    
    }else{
        echo "Error opening the file.";
    }
    $password = $passwordArray[0][0];

    $indicators = [];
    $indicatorFilePath = './csv/data.csv';
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
    $trasholderFilePath = './csv/trasholder.csv';
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


    function saveTrasholder($array){
        $trasholderFilePath = './csv/trasholder.csv';
        $data = array(
            $array
        );
        $csvData = '';
        foreach($data as $row){
            $csvData .= implode(',', $row) . "\n";
            file_put_contents($trasholderFilePath, $csvData);
        }  
    }

    function saveIndicators($array){
        $indicatorFilePath = './csv/data.csv';
        $data = [];
        foreach($array as $item){
            array_push($data, $item);
        }

        $csvData = '';
        foreach($data as $row){
            $csvData .= implode(',', $row) . "\n";
            file_put_contents($indicatorFilePath, $csvData);
        }  
    }


    if(isset($_POST['action'])){
        if ($_POST['action'] == 'edit' && $_POST['id']){
            
            if($_POST['id'] == 'trasholder_submit'){
                $green = $_POST['green'];
                $blue = $_POST['blue'];
                $yellow = $_POST['yellow'];
                $red = $_POST['red'];
                $green_level = $_POST['green_level'];
                $blue_level = $_POST['blue_level'];
                $yellow_level = $_POST['yellow_level'];
                $red_level = $_POST['red_level'];
                $en_general = $_POST['en_general'];
                $en_fontSize = $_POST['en_fontSize'];
                $en_fontColor = $_POST['en_fontColor'];
                $en_fontStyle = $_POST['en_fontStyle'];
                $ar_general = $_POST['ar_general'];
                $ar_fontSize = $_POST['ar_fontSize'];
                $ar_fontColor = $_POST['ar_fontColor'];
                $ar_fontStyle = $_POST['ar_fontStyle'];
                $label1 = $_POST['label1'];
                $label2 = $_POST['label2'];
                $label3 = $_POST['label3'];
                $label4 = $_POST['label4'];
                
                $temp = [];

                array_push(
                    $temp, $green, $blue, $yellow, $red, 
                    $green_level, $blue_level, $yellow_level, $red_level,
                    $en_general, $en_fontSize, $en_fontColor, $en_fontStyle,
                    $ar_general, $ar_fontSize, $ar_fontColor, $ar_fontStyle,
                    $label1, $label2, $label3, $label4
                );               
                saveTrasholder($temp);
                echo json_encode('success');
            }

            if($_POST['id'] == 'sites'){                
                $site = $_POST['site'];
                $street = $_POST['street'];
                $lat = $_POST['lat'];
                $lot = $_POST['lot'];
                $value = $_POST['value'];
                $date = date("Y-m-d").'T'.date("H:i:s").'+03:00';
                $index = (int)$_POST['index']-1;

                $tempArray = $indicators[$index];               
                $tempArray[4] = $value;
                $tempArray[5] = $date;
                
                $indicators[$index] = $tempArray;
                saveIndicators($indicators);
                echo json_encode('success');
            }

           
        }
    }

?>