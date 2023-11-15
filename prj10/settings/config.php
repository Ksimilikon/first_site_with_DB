<?php
$db_host='localhost';
$db_user='root';
$db_password='';
$db_name='LR10_PHP';

//соеденение
$mysqli=new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->query("SET NAMES 'UTF8'");

//проверка соеденения
if($mysqli->connect_errno){
    echo "Не удалось подключиться к MySQL: ". $mysqli->connect_error;
}
?>