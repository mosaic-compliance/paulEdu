<?php
/**
 * Created by PhpStorm.
 * User: PCirino
 * Date: 7/16/2018
 * Time: 11:44 AM
 */
$names = array("John", "Kevin", "Anna", "Aaron");
$address = array("name"=> "John Smith", "age"=>35, "married"=> true);
echo json_encode($address);
$jsonString = '{"name":"John Smith","age":35,"married":true}';
$phpArr = json_decode($jsonString);
echo $phpArr->name;
?>