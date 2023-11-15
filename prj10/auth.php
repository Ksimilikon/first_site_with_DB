<?php
require "settings/config.php";

$error='';

if(!empty($_POST['login']) and !empty($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    //проверка верности введенных данных
    $userCheck=$mysqli->query("SELECT * FROM `users` WHERE `login` = '".$login."' AND `password` = '".$password."'");
    $userData=$userCheck->fetch_object();
    if(!empty($userData)){
        session_start();
        $_SESSION['auth']=true;
        $_SESSION['id']=$userData->id;
        $_SESSION['login']=$userData->login;
        if($userData->Admin==1)
        {
            header("Location: admin_browser.php");
            exit();
        }
        else{
        header("Location: browser_message.php");
        exit();  
        }
        
    }
    else{
        // header("Location: auth.html");
        // exit();
        $error="<p>Неправильный логин или пароль</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Авторизация</title>
</head>
<body>
    <form action="auth.php" method="post">
        <input name="login" type="text" placeholder="Логин">
        <input name="password" type="password" placeholder="Пароль">
        <?=$error?>
        <input type="submit" value="Вход">
    </form>
</body>
</html>