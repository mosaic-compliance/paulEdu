<?php
/**
 * Created by PhpStorm.
 * User: PCirino
 * Date: 7/16/2018
 * Time: 2:26 PM
 */
$result = $_REQUEST["input"];
$phpData=json_decode($result);
$username=$phpData->uname;
$passWord=$phpData->pwd;
$created=new DateTime($phpData->timeCreated);
$created->add(new DateInterval('P90D'));
$output = array(
    "userName"=>$username,
    "valid"=>$created
);
echo json_encode($output);
?>