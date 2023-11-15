<?php
require "settings/config.php";
$id_message=$_GET['id_message'];
$id_user=$_GET['id_user'];
$theme=$_GET['theme'];
$message=$_GET['message'];
$dateANDtime=$_GET['dateANDtime'];
$ID=$_GET['idMessage'];
//echo $theme;

$update=$mysqli->query("UPDATE `comments_users` SET `id_message` = '".$id_message."', `id_user`='".$id_user."',
 `theme`='".$theme."', `message`='".$message."', `dateANDtime`='".$dateANDtime."' WHERE `id_message`='".$ID."'");
header("Location: browser_message.php");
exit();