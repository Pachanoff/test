<?php

// var_dump($_POST);

$file = "name.json";
$data = file_get_contents($file);
if (empty($data)) {
    $json = [];
} else {
    $json = json_decode($data, $assoc = TRUE);
}
$arr = array(
    'login'     => $_POST['login'],
    'password'    => $_POST['password'],
    'confirum_password'    => $_POST['confirum_password'],
    'email'    => $_POST['email'],
    'name'     => $_POST['name'],
);

if ($_POST['password'] === $_POST['confirum_password']) {
    
} else {
    echo "Пароли не совподают";
    die; 
}

array_push($json, $arr);
$json_string = json_encode($json);
file_put_contents($file, $json_string);


?>
