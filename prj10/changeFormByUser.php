<?php require "settings/config.php";
$idMessage=$_GET['id'];
$request=$mysqli->query("SELECT * FROM `comments_users` WHERE `id_message` = '".$idMessage."'");
$row=$request->fetch_object();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="changeUPDATE_user.php" method="get">
        <table border="1">
            <tr>
                <th>id_message</th>
                <th>id_user</th>
                <th>theme</th>
                <th>message</th>
                <th>dateANDtime</th>
            </tr>
            <tr>
                <td><input name="id_message" value="<?=$row->id_message?>" readonly></td>
                <td><input name="id_user" value="<?=$row->id_user?>" readonly></td>
                <td><select name="theme">
                    <?php
                        if($row->theme=='Технический вопрос'){
                            echo '<option selected>Технический вопрос</option>';
                        }
                        else{
                            echo '<option>Технический вопрос</option>';
                        }
                        
                        if($row->theme=='Вопрос по обработке платежей'){
                            echo '<option selected>Вопрос по обработке платежей</option>';
                        }
                        else{
                            echo '<option>Вопрос по обработке платежей</option>';
                        }
                        if($row->theme=='Проблема с доступом к JoyCasino'){
                            echo '<option selected>Проблема с доступом к JoyCasino</option>';
                        }
                        else{
                            echo '<option>Проблема с доступом к JoyCasino</option>';
                        }
                    ?>
                    </select></td>
                <td><input name="message" value="<?=$row->message?>"></td>
                <td><input name="dateANDtime" value="<?=date('Y-m-d H:i:s')?>" readonly></td>
            </tr>
        </table>
        <input name="idMessage" value='<?=$row->id_message?>' readonly>
        <input type="submit" value="Изменить">
    </form>
</body>
</html>