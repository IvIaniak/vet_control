<?php
session_start();
    $host = 'localhost'; // адрес сервера
    $database = 'pmgu'; // имя базы данных
    $user = 'pmgu'; // имя пользователя
    $password = 'pmgu1231238'; // пароль



    $dir = "https://ganter.com.ua/pmgu"; // путь к корневой директории
    //chdir($dir);
    //$today = date("d.m.Y");
    $today = date("d.m.Y");
    $today2020 = date("d.m.Y");
    $totime2020= date("H:i",strtotime("+2 hour"));
    $todaypom = date("d.m.Y", strtotime("+1 month"));
    $totime = date("G:i:s");
    $phpdata = date("Y.m.d",strtotime("+0 hour"));
    $phpdata7 = date("Y.m.d",strtotime("-7 day"));
    $phptodataandtime = date("Y.m.d G:i:s",strtotime("+0 hour"));
    $hours = date("G",strtotime("+2 hour"));
    $minutes = date("i");

    $cost = 0;

 ?>
