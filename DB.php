<?php

    $connect = mysqli_connect('localhost', 'root', '');
    $sql = "CREATE DATABASE blog_db";
    mysqli_query($connect,$sql);
    $connect = mysqli_connect('localhost', 'root', '' , 'blog_db');
    mysqli_query($connect, "CREATE TABLE blog ( userId integer, id integer PRIMARY KEY, title text, body text)");
    mysqli_query($connect, "CREATE TABLE comm ( postId integer, id integer PRIMARY KEY, name text, email text, body text, FOREIGN KEY (postId) REFERENCES `blog` (id) )");