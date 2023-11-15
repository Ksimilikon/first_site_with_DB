<?php
require "settings/config.php";
session_start();
$id=$_SESSION['id'];
$theme=strip_tags($_POST['theme']);
$message=strip_tags($_POST['message']);
$dataANDtime=date('Y-m-d H:i:s');

$add=$mysqli->query("INSERT INTO `comments_users` (`id_user`, `theme`, `message`, `dateANDtime`)
VALUES ('".$id."', '".$theme."', '".$message."', '".$dataANDtime."')");
header("Location: browser_message.php");
exit();
?>
