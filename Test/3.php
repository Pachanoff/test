<?php 

$logErr = $passErr = $nameErr =  $emailErr = "";
$login = $password = $name = $email = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['login'])) {
        $logErr = "Введите логин";
    } else {
        $login = test_input($_POST['login']);
    }

    if (empty($_POST['password'])) {
        $passErr = "Введите пароль";
    } else {
        $password = test_input($_POST['password']);
    }
    
    if (empty($_POST['name'])) {
        $nameErr = "Введите имя";
    } else {
        $name = test_input($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Введите Email";
    } else {
        $email = test_input($_POST['email']);
    }
}
