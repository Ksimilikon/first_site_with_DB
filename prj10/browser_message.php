<?php require "settings/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ваши обращения</title>
</head>
<body>
    <aside>
        <a href='add.html'><button>Добавить</button></a>
        <a href='changePersonal_data.php'><button>Изменить личные даннные</button></a>
        <a href="exit.php"><button>Выйти</button></a>
    </aside>
    <main>
        <?php
            $idUser=$_SESSION['id'];
            //id сообщений для поиска
            // $index=1;
            // while(true){
            //     $messageId=$mysqli->query("SELECT `id_user`, `id_message` FROM `comments_users` 
            //     WHERE `id_message` = '".$index."'");
            //     $messageID_availbl[]=$messageId->fetch_object();
            //     if()
            //     //breake
            //     if(empty($messageID_availbl[$index-1]))
            //     {
            //         break;
            //     }
            //     $index++;
            // }
            //получение данных
            $message=$mysqli->query("SELECT * FROM `comments_users` WHERE `id_user` = '".$idUser."'");
            for($i=0;$i<$message->num_rows;$i++){
                $messageData[]=$message->fetch_object();
            }
            for($i=count($messageData);$i>=0;$i--)//сначала выводятся новые
            {
                if(!empty($messageData[$i]->id_user)){//для избежания предупреждения
                    if($messageData[$i]->id_user==$idUser){

                        echo '<div class="contain">
                            <h3>Тема: </h3><h3>'.$messageData[$i]->theme.'</h3>
                            <h4>Сообщение: </h4>'.$messageData[$i]->message.'<p></p>
                            <h6>Дата: </h6><h6>'.$messageData[$i]->dateANDtime.'</h6>
                            <a href="deleteForm.php?id='.$messageData[$i]->id_message.'"><button>Удалить</button></a>
                            <a href="changeFormByUser.php?id='.$messageData[$i]->id_message.'"><button>Изменить</button></a>
                            </div>';
                    }
                }
            }
        ?>
        
    </main>
</body>
</html>