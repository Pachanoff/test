<?php 
ini_set('display_errors', 'Off'); 

$login = htmlspecialchars($_POST['login']);
$login = trim($login);

$password = htmlspecialchars($_POST['password']);
$password = trim($password);

$email = htmlspecialchars($_POST['email']);
$email = trim($email);

$name = htmlspecialchars($_POST['name']);
$name = trim($name);

$jsonArray = [];

if(file_exists('name.json')) { 
    $json = file_get_contents('name.json');
    $jsonArray = json_decode($json, true);
}

if ($login) {
    $jsonArray[] = $login;
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

if ($password) {
    $jsonArray[] = $password;
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

if ($email) {
    $jsonArray[] = $email;
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

if ($name) {
    $jsonArray[] = $name;
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

$key = $_POST['key'];
if(isset($_POST['save'])) {
    $jsonArray[$key] = $_POST['title'];
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    // header("Location:".$_SERVER['HTTP_REFERER']);
}

if(isset($_POST['del'])) {
    unset($jsonArray[$key]);
    file_put_contents('name.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
    header("Location:".$_SERVER['HTTP_REFERER']);
}

?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <section>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i></button>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Логин</th>
                            <th>Пароль</th>
                            <th>Почта</th>
                            <th>Имя</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jsonArray as $key => $value):  ?>
                        <tr>
                            <th scope="row"><?php echo (int)$key +1 ?></th>
                            <td><?php echo $value ?></td>
                            
                            <td>
                                <button class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#edit<?php echo $key; ?>">
                                <i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#delete<?php echo $key; ?>">
                                <i class="fas fa-trash"></i></button>
                                <!-- edit -->
                                <div class="modal fade" id="edit<?php echo $key; ?>" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Добавить запись</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo $value; ?>" name="title">
                                                </div>
                                                <input type="hidden" name="key" value="<?php echo $key; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" name="save">Сохранить</button>
                                        </div></form>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete -->
                                <div class="modal fade" id="delete<?php echo $key; ?>" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLable" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="exampleModalLable">Удалить запись</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="key" value="<?php echo $key; ?>">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="del">Удалить</button>
                                        </div></form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div> 
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Добавить запись</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="" class="form-control" name="ID">
                        <label>Логин</label>
                        <input type="text" class="form-control" name="login">
                        <label>Пароль</label>
                        <input type="password" class="form-control" name="password">
                        <label>Почта</label>
                        <input type="email" class="form-control" name="email">
                        <label>Имя</label>
                        <input type="text" class="form-control" name="name">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Сохранить</button>
            </div></form>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/4ab73bc97e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
        crossorigin="anonymous">
    </script>
  </body>
</html>