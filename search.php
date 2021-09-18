<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


//if(!empty($_POST['objektkontrolbag'])){
if(isset($_POST['objektkontrolbagajax'])){
//Принимаем данные
$serch = $_POST['objektkontrolbagajax'];

  //echo "<li>$serch</li>";

  $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['objektkontrolbagajax']))));
    $result = mysqli_query($link, "SELECT * from uktz WHERE info LIKE '%$referal%' OR number LIKE '%$referal%'") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "\n<li><span Class='serchobjektkontrolbagajax' data-target='".$row['number']."'> ".$row['number']."; ".$row['info']."; ".$row['tupe']."</span></li>";
            }
        }
}
?>
