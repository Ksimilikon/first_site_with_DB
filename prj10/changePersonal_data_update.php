<?php
require "settings/config.php";
$login=$_POST['login'];
$password=$_POST['password'];
$FIO=$_POST['FIO'];
$birthday=$_POST['birthday'];
$Email=$_POST['Email'];
$telephone=$_POST['telephone'];

$idUser=$_POST['idUser'];

$update=$mysqli->query("UPDATE `users` SET `login` ='".$login."', `password` ='".$password."', `FIO` ='".$FIO."', `birthday` ='".$birthday."', `Email` ='".$Email."', 
`telephone` ='".$telephone."' WHERE `id` ='".$idUser."'");
header("Location: browser_message.php");
exit();