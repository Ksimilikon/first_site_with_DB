<?php
require "settings/config.php";

$error0='';
$error1='';
$error2='';

if(!empty($_POST['login']) and !empty($_POST['FIO']) and !empty($_POST['birthday']) and !empty($_POST['telephone'])
and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['passwordR']))
{
    if($_POST['password']==$_POST['passwordR']){
        $login=strip_tags($_POST['login']);
        $FIO=strip_tags($_POST['FIO']);
        $birthday=strip_tags($_POST['birthday']);
        $telephone=strip_tags($_POST['telephone']);
        $email=strip_tags($_POST['email']);
        $password=strip_tags($_POST['password']);

        //проверка логина
        $loginCheck=$mysqli->query("SELECT `login` FROM `users` WHERE `login` = '".$login."'");
        $loginCheck=$loginCheck->fetch_object();
        if(empty($loginCheck)){
            $addUser=$mysqli->query("INSERT INTO `users` (`login`, `FIO`, `birthday`, `telephone`, `Email`, `password`)
            VALUES('".$login."', '".$FIO."', '".$birthday."', '".$telephone."', '".$email."', '".$password."')");

            session_start();
            $_SESSION['auth']=true;
            $_SESSION['id']=$userData->id;
            $_SESSION['login']=$userData->login;
            header("Location: browser_message.php");
            exit();
        }
        else{
            $error2='<p>Логин занят</p>';
        }
        
    }
    else{
        $error1='<p>Пароли не совпадают</p>';
    } 
}
else{
    $error0="<p>Не все поля заполненны</p>";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <form action="reg.php" method="post">
        <input name="login" type="text" placeholder="Логин">
        <input name="FIO" type="text" placeholder="ФИО">
        <input name="birthday" type="date" placeholder="Дата рождения">
        <input name="telephone" type="tel" placeholder="Номер телефона">
        <input name="email" type="email" placeholder="Эл. почта">
        <input name="password" type="password" placeholder="Пароль">
        <input name="passwordR" type="password" placeholder="Повтор пароля">

        <?=$error0?>
        <?=$error1?>
        <?=$error2?>


        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>