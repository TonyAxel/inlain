<?php
//error_reporting(0);
$connect = mysqli_connect('localhost', 'root', '' , 'blog_db');
$dataPost = $_POST['dataP'];
$comm = $_POST['dataC'];

    for($i = 0; $i < count($dataPost); $i++){
        $userId = (int)$dataPost[$i]['userId']; 
        $idP = (int)$dataPost[$i]['id'];
        $title = (string)$dataPost[$i]['title'];
        $body = (string)$dataPost[$i]['body'];
        mysqli_query($connect, 'INSERT INTO `blog` VALUES ('. $userId . ',' . $idP . ',' . '"'.$title. '"' . "," .'"'. $body.'"'. ')');
    }
    

    for($i = 0; $i < count($comm); $i++){
        $PostId = (int)$comm[$i]['postId']; 
        $idC = (int)$comm[$i]['id'];
        $title = (string)$comm[$i]['name'];
        $email = (string)$comm[$i]['email'];
        $body = (string)$comm[$i]['body'];
        mysqli_query($connect, 'INSERT INTO `comm` VALUES ('. $PostId . ',' . $idC . ',' . '"'.$title. '"' . "," .'"'. $email.'"'. "," . '"' . $body . '"' .')');
    }
    ;
    echo 'Загружено ' . count($dataPost) . ' записей и ' . count($comm) . ' комминтариев';
