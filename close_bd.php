<?php
    require_once 'header.php';
    //mysqli_close($link);
    session_start();
    session_destroy();
    //require_once 'http://ganter.com.ua/mcit/index.php';
    //header("Refresh:0");
    echo "<script type='text/javascript'>window.top.location='".$dir."/index.php';</script>";
    //header("Location: http://ganter.com.ua/mcit/index.php");
    die;
 ?>
