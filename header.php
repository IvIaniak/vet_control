<?php
session_start();

//$_SESSION['access'] = 'no';
    require_once 'config.php'; // подключаем скрипт
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>«ПМГУ ДПСС Одеса»</title>
      <!--  <link href="img/icon/MCT.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />-->
    <link rel="icon" href="img/icon/cropped-favi-32x32.png" sizes="32x32">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="https://use.fontawesome.com/webfontloader/1.6.24/webfontloader.js"></script>
    <script src="https://use.fontawesome.com/948142a9de.js"></script>

    <!--<link href="css/grid.css" rel="stylesheet" type="text/css">-->
    <link href="css/chat.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/grid.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/948142a9de.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />

    <!--<SCRIPT language=JavaScript>

    var DataTimerID = -1;

    function RefreshD() {
       if (DataTimerID>=0) {
          clearTimeout(DataTimerID);
       }
       DataTimerID = setTimeout('RefreshData()', 10);
    }

    function RefreshData() {
      // top.frames['stat'].location="status.php?login=".$_SESSION['name']."&id=".$_SESSION['id']."&lang=".$_SESSION['lang']."";
       //top.frames['short'].location="short.php?login=".$_SESSION['name']."&id=".$_SESSION['id']."&lang=".$_SESSION['lang']."";
    }

</SCRIPT>-->

</head>
