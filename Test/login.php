<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css\main.css" rel="stylesheet">
    <title>Авторизация</title>
</head>
<body>
    <section class="center">
        
        <form action="/signin.php" method="post">
            <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
            <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
            
            <button type="submit">Войти</button>
            <p>
                У вас нет аккаунта? - <a href="index.php">зарегистрируйтесь</a>
            </p>
        </form>

    </section>
</body>
</html>