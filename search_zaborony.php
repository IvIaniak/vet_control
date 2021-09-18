<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



if(isset($_POST['target'])){
//Принимаем данные
$target = $_POST['target'];
$count =1;
  //echo "<li>$serch</li>";

  $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['target']))));
    $result = mysqli_query($link, "SELECT * from zaborony WHERE cuntry_dok LIKE '%$referal%'") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
              echo "<li><input type='checkbox' name='check_zaborona".$count."' value='$row[1]' ><span>ЗАБОРОНИТА :№$row[1] від $row[2] ,$row[3]</span>;<span> Захворювання :$row[5] </span>;<span>Предмет_заборони :$row[6]</span></li><br>";
              $count++;
            }
        } else {
          echo "";
        }
}
?>
