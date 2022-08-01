<?php 
    // session_start();
    // ini_set('display_errors', 'Off');
    include_once '3.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    
    <form method="post" action="form1.php">

    <label>Логин</label><sup><?php echo $logErr;?></sup>
    <input type="text" name="login" placeholder="Введите логин" required>
    <label>Пароль</label><sup><?php echo $passErr;?></sup>
    <input type="password" name="password" placeholder="Введите пароль" required>
    <label>Подтвердите пароль</label>
    <input type="password" name="confirum_password" placeholder="Подтвердите пароль" required>
    <label>Почта</label><sup><?php echo $emailErr;?></sup>
    <input type="email" name="email" placeholder="Введите адрес электронной почты" required>
    <label>Имя</label><sup><?php echo $nameErr;?></sup>
    <input type="text" name="name" placeholder="Введите ваше имя" required>
    
        
    <button type="submit">Зарегистрироваться</button>
    <p>
        У вас уже есть аккаунт? - <a href="login.php">войдите</a>
    </p>

    </form>
    <!-- <script src="/Libs/jquery-3.6.0.min.js"></script>
    <script src="/script/form.js"></script> -->
</body>
</html>