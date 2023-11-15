<?php
require "settings/config.php";
$id=$_GET['id'];
echo $id;
$delete=$mysqli->query("DELETE FROM `comments_users` WHERE `id_message` = '".$id."'");


header("Location: browser_message.php");
exit();