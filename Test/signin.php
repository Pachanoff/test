<?php 

$f_json = 'D:\code\Test\name.json';
$json = file_get_contents("$f_json");
$obj = json_decode($json,true);
echo "<pre>";
var_dump(json_decode($json));

setcookie('login', 5, time()+1800);
// if (isset($_COOKIE['login'])) {
//     echo 'куки установленные';

// } else {
//     echo 'куки не установленные';
// }
