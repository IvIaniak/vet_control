<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


if(isset($_POST['id'])){
$id = $_POST['id'];
if (strlen($id)>0){
$serch = "id LIKE '%$id%'";
$sheck++;
}
}

if(isset($_POST['trejim'])){
$trejim = $_POST['trejim'];
if (strlen($trejim )>0){
    if ($sheck > 0) {
      $serch.=" AND trejim LIKE '%$trejim%'";
    } else {
      $serch ="trejim LIKE '%$trejim%'";
    }
    $sheck++;
  }
}

if(isset($_POST['numbertoday'])){
$numbertoday = $_POST['numbertoday'];
if (strlen($numbertoday )>0){
  if ($sheck > 0) {
    $serch.=" AND numbertoday = '$numbertoday'";
  } else {
    $serch ="numbertoday = '$numbertoday'";
  }
  $sheck++;
  }
}
if(isset($_POST['objektkontrolbagajax'])){
$objektkontrolbagajax = $_POST['objektkontrolbagajax'];
if (strlen($objektkontrolbagajax)>0){
  if ($sheck > 0) {
    $serch.=" AND objektkontrolbag LIKE '%$objektkontrolbagajax%'";
  } else {
    $serch ="objektkontrolbag LIKE '%$objektkontrolbagajax%'";
  }
  $sheck++;
  }
}

if(isset($_POST['datafrom']) AND isset($_POST['datatoo'])){
  if (strlen($_POST['datafrom']) > 0 and strlen($_POST['datatoo']) > 0) {
$datafrom = date("Y-m-d H:i:s", strtotime($_POST['datafrom']));
$datatoo = date("Y-m-d H:i:s", strtotime($_POST['datatoo']));

    if ($sheck > 0) {
      $serch.=" AND (date BETWEEN '$datafrom' AND '$datatoo')";
    } else {
      $serch ="(date BETWEEN  '$datafrom' AND '$datatoo')";
    }
    $sheck++;
  }
}


  $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['objektkontrolbagajax']))));
    $result = mysqli_query($link, "SELECT * from iet WHERE $serch") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
          if ($_SESSION['plevel'] == 10){
            while($row = mysqli_fetch_array($result)){
                echo "
                <li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[22]</span><span Class='three'>№<br />$row[1]</span><span Class='four'>Зона обсл.<br />$row[21]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[3]</span><span>Митний режим<br />$row[5]</span><span  Class='six'>Кількість (вага, шт.)<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[20]</span>
                <ul Class='fullinfo $row[0]'>
                  <li><span>ID</span> : <span>$row[0]</span></li>
                  <li><span>Дата створення заявки</span> : <span>$row[22]</span></li>
                  <li><span>№</span> : <span>$row[1]</span></li>
                  <li><span>Порт (зона обслуговування)</span> : <span>$row[21]</span></li>
                  <li><span>Вантаж(назва, код УКТЗЕД, дата виробництва, місце походження)</span> : <span>$row[3]</span></li>
                  <li><span>Транспортний засіб(вид, номер)</span> : <span>$row[4]</span></li>
                  <li><span>Митний режим (експорт/імпорт/транзит і т.д.)</span> : <span>$row[5]</span></li>
                  <li><span>Кількість (вага, шт.)/кількість місць</span> : <span>$row[6]</span></li>
                  <li><span>Дата подачі заяви суб’єктом господарювання</span> : <span>$row[7]</span></li>
                  <li><span>Підстава для видачі ветеринарного документу </span> : <span>$row[8]</span></li>
                  <li><span>Дата видачі ветеринарного документу інспектором</span> : <span>$row[10]</span></li>
                  <li><span>Виробник</span> : <span>$row[11]</span></li>
                  <li> <span>Користувач</span> : <span>$row[20]</span></li>
                  <li><form action='function.php' method='POST'>
                  <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                  <button class='fa fa-lock arreysettings' type='submit' name='lock'></button>
                  <span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                  <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                               </ul></li>";
            }
        } else {
          while($row = mysqli_fetch_array($result)){
              echo "
              <li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[22]</span><span Class='three'>№<br />$row[1]</span><span Class='four'>Зона обсл.<br />$row[21]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[3]</span><span>Митний режим<br />$row[5]</span><span  Class='six'>Кількість (вага, шт.)<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[20]</span>
              <ul Class='fullinfo $row[0]'>
                <li><span>ID</span> : <span>$row[0]</span></li>
                <li><span>Дата створення заявки</span> : <span>$row[22]</span></li>
                <li><span>№</span> : <span>$row[1]</span></li>
                <li><span>Порт (зона обслуговування)</span> : <span>$row[21]</span></li>
                <li><span>Вантаж(назва, код УКТЗЕД, дата виробництва, місце походження)</span> : <span>$row[3]</span></li>
                <li><span>Транспортний засіб(вид, номер)</span> : <span>$row[4]</span></li>
                <li><span>Митний режим (експорт/імпорт/транзит і т.д.)</span> : <span>$row[5]</span></li>
                <li><span>Кількість (вага, шт.)/кількість місць</span> : <span>$row[6]</span></li>
                <li><span>Дата подачі заяви суб’єктом господарювання</span> : <span>$row[7]</span></li>
                <li><span>Підстава для видачі ветеринарного документу </span> : <span>$row[8]</span></li>
                <li><span>Дата видачі ветеринарного документу інспектором</span> : <span>$row[10]</span></li>
                <li><span>Виробник</span> : <span>$row[11]</span></li>
                <li> <span>Користувач</span> : <span>$row[20]</span></li>
                <li><span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                <span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                             </ul></li>";
          }

        }
        }

?>
