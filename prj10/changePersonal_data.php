<?php require "settings/config.php";
session_start();
$idUser=$_SESSION['id'];

//запрос данных
$user=$mysqli->query("SELECT * FROM `users` WHERE `id` ='".$idUser."'");
$userData=$user->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Персональные данные</title>
</head>
<body>
<form action="changePersonal_data_update.php" method="post">
        <table>
            <tr>
                <th>login</th>
                <th>password</th>
                <th>FIO</th>
                <th>birthday</th>
                <th>Email</th>
                <th>telephone</th>
            </tr>
            <tr>
                <td><input name="login" value="<?=$userData->login?>"></td>
                <td><input name="password" value="<?=$userData->password?>"></td>
                <td><input name="FIO" value="<?=$userData->FIO?>"></td>
                <td><input name="birthday" type="datetime" value="<?=$userData->birthday?>"></td>
                <td><input name="Email" value="<?=$userData->Email?>"></td>
                <td><input name="telephone" value="<?=$userData->telephone?>"></td>
            </tr>
        </table>
        <input name="idUser" value="<?=$idUser?>" readonly>
        <input type="submit" value="Изменить">
    </form>
</body>
</html>