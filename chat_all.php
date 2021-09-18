<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

if(isset($_GET['load'])){
        $opp = 'load';
        $load=$_GET['load'];
}

switch ($opp)
{
    case 'load' :
    $result = mysqli_query($link, "SELECT * from chat WHERE id > $load ORDER BY id ASC limit 50") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
              if ($row['fio']==$_SESSION['fullname']) {
                echo "<li Class='mymsg' id='".$row['id']."'><span Class='name'><strong> ".$row['fio']."</strong> - ".$row['data'].":</span><br /><span Class='msg'> ".$row['msg'].". </span></li>";
              } else {
                echo "<li id='".$row['id']."'><span Class='name' ><strong> ".$row['fio']." </strong>- ".$row['data'].":</span><br /><span Class='msg'> ".$row['msg'].". </span></li>";
              }
            }
        }

    break;


default :

    $result = mysqli_query($link, "SELECT * from chat ORDER BY id ASC limit 50") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
              if ($row['fio']==$_SESSION['fullname']) {
                echo "<li Class='mymsg' id='".$row['id']."'><span Class='name'><strong> ".$row['fio']."</strong> - ".$row['data'].":</span><br /><span Class='msg'> ".$row['msg'].". </span></li>";
              } else {
                echo "<li id='".$row['id']."'><span Class='name' ><strong> ".$row['fio']." </strong>- ".$row['data'].":</span><br /><span Class='msg'> ".$row['msg'].". </span></li>";
              }
            }
        }
break;
}

?>
