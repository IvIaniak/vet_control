<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


//if(!empty($_POST['objektkontrolbag'])){
if(isset($_POST['virobnyk_serth'])){
//Принимаем данные
$serch = $_POST['virobnyk_serth'];
$tsrget = $_POST['tsrget'];

  //echo "<li>$serch</li>";

  $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['virobnyk_serth']))));
    $result = mysqli_query($link, "SELECT * from operator_rinku WHERE edrpo = '$referal' ") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){

              echo "<input type='text' name='edrpo' class='serth' size='30'  value='$row[1]' placeholder='Виробник $row[1]' required ><input type='text' name='fullname' size='30'  value='$row[6]' placeholder='$row[6]' required ><input type='text' name='cuntry' size='30'  value='$row[7]' placeholder='Країна походження' required >";
            }
        } else {
          echo "";
        }
}
?>
