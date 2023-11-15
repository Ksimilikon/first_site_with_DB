<?php require "settings/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Обращения</title>
</head>
<body>
    <main>
        <?php
            $request=$mysqli->query("SELECT * FROM `comments_users`");
            //получение данных
            for($i=0;$i<$request->num_rows;$i++)
            {
                $data[]=$request->fetch_object();
            }
            //вывод данных
            for($i=count($data);$i>=0;$i--)
            {
                if(!empty($data[$i]->id_user)){
                    echo '<div class="contain">
                            <h3>Тема: </h3><h3>'.$data[$i]->theme.'</h3>
                            <h4>Сообщение: </h4><p>'.$data[$i]->message.'</p>
                            <h4>id_user </h4><p>'.$data[$i]->id_user.'</p>
                            <h6>Дата: </h6><h6>'.$data[$i]->dateANDtime.'</h6>
                            <a href="deleteForm_admin.php?id='.$data[$i]->id_message.'"><button>Удалить</button></a>
                            <a href="changeForm.php?id='.$data[$i]->id_message.'"><button>Изменить</button></a>
                            </div>';
                }
            }
        ?>
        <a href="exit.php"><button>Выйти</button></a>
    </main>
</body>
</html>