<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


if(isset($_POST['msg'])){
//Принимаем данные
        $msg = $_POST['msg'];
      $login = $_SESSION['fullname'];
  $zhat_zona = $_SESSION['zhat_zona'];
  
      if (strlen($msg)>0){
              mysqli_query($link, "INSERT INTO chat VALUES ('','$phptodataandtime','$login','$msg','$zhat_zona','')")or die("Ошибка " . mysqli_error($link));
      }


}
?>
