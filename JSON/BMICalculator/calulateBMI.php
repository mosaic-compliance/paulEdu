<?php

if(array_key_exists("input",$_REQUEST)) {
    $input = $_REQUEST["input"];
    $phpData = json_decode($input);
    $height = $phpData->ht;
    $weight = $phpData->wt;

        $height = $height*2.54/ 100;
        $bmi = $weight *0.453592/ (pow($height, 2));
        $message = "";
        if ($bmi < 18.5) {
            $message = "You are underweight";
        } else if ($bmi >= 18.5 && $bmi < 25) {
            $message = "Congrats!!! You have normal weight";
        } else if ($bmi >= 25 && $bmi < 30) {
            $message = "You are overweight";
        } else {
            $message = "Be careful you are obese";
        }
        $output = array(
            "bmi" => $bmi,
            "message" => $message
        );
        echo json_encode($output);
    }else{
        echo "No Result";
    };
