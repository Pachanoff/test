<?php
 
$people_json = file_get_contents('name.json');
 
$decoded_json = json_decode($people_json, false);
 
echo $decoded_json->name;
// Monty
 
echo $decoded_json->email;
// monty@something.com
 
echo $decoded_json->login;
// 77
 
?>