<?php
session_start();
require_once 'connect.php';
require_once 'lang.php';

if(isset($_POST['add_zerno'])){
    $opp = 'add_zerno';
    $number = $_POST['number'];
    $port = $_POST['port'];
    $nameboad = $_POST['nameboad'];
    $rezervtonaje = $_POST['rezervtonaje'];
    $type = $_POST['type'];
    $countpartiy = $_POST['countpartiy'];
    $numbersertefikats = $_POST['numbersertefikats'];
    $dataset = $_POST['dataset'];
}

if(isset($_POST['admintest'])){
    $opp = 'admintest';

}

if(isset($_POST['del_ci'])){
    $opp = 'del_ci';
    $id = $_POST['id'];
}
if(isset($_POST['add_import'])){
                 $opp = 'add_import';
         $edyno_vikno = $_POST['edyno_vikno'];
         $numbertoday = $_POST['numbertoday'];
            $portzona = $_POST['portzona'];
         $datapodathi = $_POST['datapodathi'];
      $edrpo_virobnyk = $_POST['edrpo_virobnyk'];
   $fullname_virobnyk = $_POST['fullname_virobnyk'];
     $cuntry_virobnyk = $_POST['cuntry_virobnyk'];
     $virobnyk_uxvala = $_POST['virobnyk_uxvala'];
     $edrpo_exporter = $_POST['edrpo_exporter'];
  $fullname_exporter = $_POST['fullname_exporter'];
    $cuntry_exporter = $_POST['cuntry_exporter'];
    $edrpo_recipient = $_POST['edrpo_recipient'];
 $fullname_recipient = $_POST['fullname_recipient'];
   $cuntry_recipient = $_POST['cuntry_recipient'];
     $edrpo_inporter = $_POST['edrpo_importer'];
  $fullname_inporter = $_POST['fullname_importer'];
    $cuntry_inporter = $_POST['cuntry_importer'];
      $uktz_number = $_POST['uktz_number'];
$objektkontrolbagajax = $_POST['objektkontrolbagajax'];
            $dateout = $_POST['dateout'];
          $all_massa = $_POST['all_massa'];
             $trejim = $_POST['trejim'];
            $aktoglady = $_POST['aktoglady'];
            $expeditor = $_POST['edrpo_expeditor'];
           $expeditor .=" ; ";
           $expeditor .=$_POST['fullname_expeditor'];
     $expeditor_adress = $_POST['cuntry_expeditor'];
     $counttransport = $_POST['counttransport'];
     $type_doks =$_POST['type_doks'];
     $number =$_POST['number'];
     $date_doks =$_POST['date_doks'];
     $organization =$_POST['organization'];
     for ($i=1; $i <= $counttransport; $i++) {
       $auto_tupe .= $_POST['auto_tupe'.$i.''];
       $auto_tupe .= ";";
       $objektkontroltransport .= $_POST['objektkontroltransport'.$i.''];
       $objektkontroltransport .= ";";
       $countbag .= $_POST['countbag'.$i.''];
       $countbag .= ";";
       $name_ci .= $_POST['name_ci'.$i.''];
       $name_ci .= ";";
       $countplace .= $_POST['countplace'.$i.''];
       $countplace .= ";";
     }



}
if(isset($_POST['add_export'])){
                $opp = 'add_export';
                $edyno_vikno = $_POST['edyno_vikno'];
                $numbertoday = $_POST['numbertoday'];
                   $portzona = $_POST['portzona'];
                $datapodathi = $_POST['datapodathi'];
             $edrpo_virobnyk = $_POST['edrpo_virobnyk'];
          $fullname_virobnyk = $_POST['fullname_virobnyk'];
            $cuntry_virobnyk = $_POST['cuntry_virobnyk'];
            $virobnyk_uxvala = $_POST['virobnyk_uxvala'];
            $edrpo_exporter = $_POST['edrpo_exporter'];
         $fullname_exporter = $_POST['fullname_exporter'];
           $cuntry_exporter = $_POST['cuntry_exporter'];
           $edrpo_recipient = $_POST['edrpo_recipient'];
        $fullname_recipient = $_POST['fullname_recipient'];
          $cuntry_recipient = $_POST['cuntry_recipient'];
            $edrpo_inporter = $_POST['edrpo_importer'];
         $fullname_inporter = $_POST['fullname_importer'];
           $cuntry_inporter = $_POST['cuntry_importer'];
             $uktz_number = $_POST['uktz_number'];
       $objektkontrolbagajax = $_POST['objektkontrolbagajax'];
                   $dateout = $_POST['dateout'];
                 $all_massa = $_POST['all_massa'];
                    $trejim = $_POST['trejim'];
                   $aktoglady = $_POST['aktoglady'];
                   $expeditor = $_POST['edrpo_expeditor'];
                  $expeditor .=" ; ";
                  $expeditor .=$_POST['fullname_expeditor'];
            $expeditor_adress = $_POST['cuntry_expeditor'];
            $counttransport = $_POST['counttransport'];
            $type_doks =$_POST['type_doks'];
            $number =$_POST['number'];
            $date_doks =$_POST['date_doks'];
            $organization =$_POST['organization'];
            for ($i=1; $i <= $counttransport; $i++) {
              $auto_tupe .= $_POST['auto_tupe'.$i.''];
              $auto_tupe .= ";";
              $objektkontroltransport .= $_POST['objektkontroltransport'.$i.''];
              $objektkontroltransport .= ";";
              $countbag .= $_POST['countbag'.$i.''];
              $countbag .= ";";
              $name_ci .= $_POST['name_ci'.$i.''];
              $name_ci .= ";";
              $countplace .= $_POST['countplace'.$i.''];
              $countplace .= ";";
            }

}

if(isset($_POST['add_tranzit'])){
    $opp = 'add_tranzit';
    $edyno_vikno = $_POST['edyno_vikno'];
    $numbertoday = $_POST['numbertoday'];
       $portzona = $_POST['portzona'];
    $datapodathi = $_POST['datapodathi'];
 $edrpo_virobnyk = $_POST['edrpo_virobnyk'];
$fullname_virobnyk = $_POST['fullname_virobnyk'];
$cuntry_virobnyk = $_POST['cuntry_virobnyk'];
$virobnyk_uxvala = $_POST['virobnyk_uxvala'];
$edrpo_exporter = $_POST['edrpo_exporter'];
$fullname_exporter = $_POST['fullname_exporter'];
$cuntry_exporter = $_POST['cuntry_exporter'];
$edrpo_recipient = $_POST['edrpo_recipient'];
$fullname_recipient = $_POST['fullname_recipient'];
$cuntry_recipient = $_POST['cuntry_recipient'];
$edrpo_inporter = $_POST['edrpo_importer'];
$fullname_inporter = $_POST['fullname_importer'];
$cuntry_inporter = $_POST['cuntry_importer'];
 $uktz_number = $_POST['uktz_number'];
$objektkontrolbagajax = $_POST['objektkontrolbagajax'];
       $dateout = $_POST['dateout'];
     $all_massa = $_POST['all_massa'];
        $trejim = $_POST['trejim'];
       $aktoglady = $_POST['aktoglady'];
       $expeditor = $_POST['edrpo_expeditor'];
      $expeditor .=" ; ";
      $expeditor .=$_POST['fullname_expeditor'];
      $expeditor_adress = $_POST['cuntry_expeditor'];
      $counttransport = $_POST['counttransport'];
      $type_doks =$_POST['type_doks'];
      $number =$_POST['number'];
      $date_doks =$_POST['date_doks'];
      $organization =$_POST['organization'];
for ($i=1; $i <= $counttransport; $i++) {
  $auto_tupe .= $_POST['auto_tupe'.$i.''];
  $auto_tupe .= ";";
  $objektkontroltransport .= $_POST['objektkontroltransport'.$i.''];
  $objektkontroltransport .= ";";
  $countbag .= $_POST['countbag'.$i.''];
  $countbag .= ";";
  $name_ci .= $_POST['name_ci'.$i.''];
  $name_ci .= ";";
  $countplace .= $_POST['countplace'.$i.''];
  $countplace .= ";";
}

}
if(isset($_POST['add_innerperevoz'])){
        $opp = 'add_innerperevoz';
        $edyno_vikno = $_POST['edyno_vikno'];
        $numbertoday = $_POST['numbertoday'];
           $portzona = $_POST['portzona'];
        $datapodathi = $_POST['datapodathi'];
     $edrpo_virobnyk = $_POST['edrpo_virobnyk'];
    $fullname_virobnyk = $_POST['fullname_virobnyk'];
    $cuntry_virobnyk = $_POST['cuntry_virobnyk'];
    $virobnyk_uxvala = $_POST['virobnyk_uxvala'];
    $edrpo_exporter = $_POST['edrpo_exporter'];
    $fullname_exporter = $_POST['fullname_exporter'];
    $cuntry_exporter = $_POST['cuntry_exporter'];
    $edrpo_recipient = $_POST['edrpo_recipient'];
    $fullname_recipient = $_POST['fullname_recipient'];
    $cuntry_recipient = $_POST['cuntry_recipient'];
    $edrpo_inporter = $_POST['edrpo_importer'];
    $fullname_inporter = $_POST['fullname_importer'];
    $cuntry_inporter = $_POST['cuntry_importer'];
     $uktz_number = $_POST['uktz_number'];
    $objektkontrolbagajax = $_POST['objektkontrolbagajax'];
           $dateout = $_POST['dateout'];
         $all_massa = $_POST['all_massa'];
            $trejim = $_POST['trejim'];
           $aktoglady = $_POST['aktoglady'];
           $expeditor = $_POST['edrpo_expeditor'];
          $expeditor .=" ; ";
          $expeditor .=$_POST['fullname_expeditor'];
    $expeditor_adress = $_POST['cuntry_expeditor'];
    $counttransport = $_POST['counttransport'];
    $type_doks =$_POST['type_doks'];
    $number =$_POST['number'];
    $date_doks =$_POST['date_doks'];
    $organization =$_POST['organization'];
    for ($i=1; $i <= $counttransport; $i++) {
      $auto_tupe .= $_POST['auto_tupe'.$i.''];
      $auto_tupe .= ";";
      $objektkontroltransport .= $_POST['objektkontroltransport'.$i.''];
      $objektkontroltransport .= ";";
      $countbag .= $_POST['countbag'.$i.''];
      $countbag .= ";";
      $name_ci .= $_POST['name_ci'.$i.''];
      $name_ci .= ";";
      $countplace .= $_POST['countplace'.$i.''];
      $countplace .= ";";
    }
}

if(isset($_POST['edit_items'])){
    $opp = 'edit_items';
             $iditems = $_POST['iditems'];
         $numbertoday = $_POST['numbertoday'];
            $portzona = $_POST['portzona'];
    $objektkontrolbag = $_POST['objektkontrolbagajax'];
    //$objektkontroltransport = $_POST['objektkontroltransport'];
              $trejim = $_POST['trejim'];
    //$countbag = $_POST['countbag'];
         $datapodathi = $_POST['datapodathi'];
            $pidstava = $_POST['pidstava'];
         $datavidathi = $_POST['datavidathi'];
            $virobnyk = $_POST['virobnyk'];
      $counttransport = $_POST['counttransport'];
           $aktoglady = $_POST['aktoglady'];
            $virobnyk = $_POST['virobnyk'];
     $virobnyk_uxvala = $_POST['virobnyk_uxvala'];
     $virobnyk_adress = $_POST['virobnyk_adress'];
            $exporter = $_POST['exporter'];
     $exporter_adress = $_POST['exporter_adress'];
            $importer = $_POST['importer'];
     $importer_adress = $_POST['importer_adress'];
           $expeditor = $_POST['expeditor'];
    $expeditor_adress = $_POST['expeditor_adress'];
    $objektkontroltransport='';
    $countbag='';
    for ($i=1; $i <= $counttransport; $i++) {
      $objektkontroltransport .= $_POST['objektkontroltransport'.$i.''];
      $objektkontroltransport .= ";";
      $countbag .= $_POST['countbag'.$i.''];
      $countbag .= ";";
    }
}



if(isset($_POST['adduser'])){
    $opp = 'adduser';

    $nikname = $_POST['nikname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sname = $_POST['sname'];
    $password = $_POST['password'];
    $level= $_POST['level'];
    $status = $_POST['status'];
    $punkt = $_POST['punkt'];
}
if(isset($_POST['remitems'])){
    $opp = 'remitems';

    $table = $_POST['table'];
    $idzapusa = $_POST['idzapusa'];
}
if(isset($_POST['addzone'])){
    $opp = 'addzone';

    $namestrukture = $_POST['namestrukture'];
    $numberzone = $_POST['numberzone'];
    $namezone = $_POST['namezone'];
}
if(isset($_POST['deluser'])){
    $opp = 'deluser';
    $id = $_POST['id'];
}
if(isset($_POST['edit_user'])){
    $opp = 'edit_user';
    $id = $_POST['id'];
    $nikname = $_POST['nikname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sname = $_POST['sname'];
    $password = $_POST['password'];
    $level= $_POST['level'];
    $status = $_POST['status'];
    $punkt = $_POST['punkt'];
}
if(isset($_POST['delzone'])){
    $opp = 'delzone';
    $id = $_POST['id'];
}
if(isset($_POST['deldok'])){
    $opp = 'deldok';
    $id = $_POST['id'];
}
if(isset($_POST['zvd_zvdv'])){
    $opp = 'zvd_zvdv';
    $id = $_POST['id'];
}
if(isset($_POST['lock'])){
    $opp = 'lock';
    $id = $_POST['id'];
}
if(isset($_POST['unlock'])){
    $opp = 'unlock';
    $id = $_POST['id'];
}
if(isset($_POST['addoperatorrinku'])){
    $opp = 'addoperatorrinku';
    $edrpo= $_POST['edrpo'];
    $pravova_forma = $_POST['pravova_forma'];
    $fullname = $_POST['fullname'];
    $shotname= $_POST['shotname'];
    $cuntry = $_POST['cuntry'];
    $oblast = $_POST['oblast'];
    $rayon = $_POST['rayon'];
    $city = $_POST['city'];
    $strids= $_POST['strids'];
    $home_number= $_POST['home_number'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
}

if(isset($_POST['deluktz'])){
    $opp = 'deluktz';
    $id = $_POST['id'];
}
if(isset($_POST['deloperatorrinku'])){
    $opp = 'deloperatorrinku';
    $id = $_POST['id'];
}
if(isset($_POST['addfromfileuktz'])){
    $opp = 'addfromfileuktz';
    $id = $_POST['id'];
    $fileTmpPath = $_FILES['userfile']['tmp_name'];
    $fileName = $_FILES['userfile']['name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
  //  $prev=$fileTmpPath;
    $prev = file_get_contents($fileTmpPath, true);
    //$convertedText = mb_convert_encoding($prev, 'utf-8', mb_detect_encoding($prev));
    $convertedText=iconv("windows-1251", "utf-8", $prev);
    $prev=preg_split('/!!!/', $convertedText);
}

if(isset($_POST['addfromfileoperator_rinku'])){
    $opp = 'addfromfileoperator_rinku';
    $id = $_POST['id'];
    $fileTmpPath = $_FILES['userfile']['tmp_name'];
    $fileName = $_FILES['userfile']['name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
  //  $prev=$fileTmpPath;
    $prev = file_get_contents($fileTmpPath, true);
    //$convertedText = mb_convert_encoding($prev, 'utf-8', mb_detect_encoding($prev));
    $convertedText=iconv("windows-1251", "utf-8", $prev);
    $prev=preg_split('/!!!/', $convertedText);
}
if(isset($_POST['addfromfilezaborony'])){
    $opp = 'addfromfilezaborony';
    $id = $_POST['id'];
    $fileTmpPath = $_FILES['userfile']['tmp_name'];
    $fileName = $_FILES['userfile']['name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];
  //  $prev=$fileTmpPath;
    $prev = file_get_contents($fileTmpPath, true);
    //$convertedText = mb_convert_encoding($prev, 'utf-8', mb_detect_encoding($prev));
    $convertedText=iconv("windows-1251", "utf-8", $prev);
    $prev=preg_split('/!!!/', $convertedText);
}

if(isset($_POST['edit_operator_rinku'])){
    $opp = 'edit_operator_rinku';
    $id = $_POST['id'];
    $edrpo= $_POST['edrpo'];
    $pravova_forma = $_POST['pravova_forma'];
    $fullname = $_POST['fullname'];
    $shotname= $_POST['shotname'];
    $cuntry = $_POST['cuntry'];
    $oblast = $_POST['oblast'];
    $rayon = $_POST['rayon'];
    $city = $_POST['city'];
    $strids= $_POST['strids'];
    $home_number= $_POST['home_number'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
}
if(isset($_POST['add_count_zone'])){
    $opp = 'add_count_zone';
    $zona = $_POST['zona'];
    $data_dey_jurnals	= $_POST['data_dey_jurnals'];
    $import = $_POST['import'];
    $export = $_POST['export'];
    $tranzit = $_POST['tranzit'];
    $vnutrper = $_POST['vnutrper'];
}

if(isset($_POST['del_count_zone'])){
    $opp = 'del_count_zone';
    $id = $_POST['id'];
}
if(isset($_POST['addauto'])){
    $opp = 'addauto';
    $auto_type = $_POST['auto_type'];
    $auto_type_shot= $_POST['auto_type_shot'];
}

if(isset($_POST['del_auto_tupe'])){
    $opp = 'del_auto_tupe';
    $id = $_POST['id'];
}
if(isset($_POST['addci'])){
    $opp = 'addci';
    $name_ci = $_POST['name_ci'];
    $shot_name_ci = $_POST['shot_name_ci'];
    $otnosheniek1000kg = $_POST['otnosheniek1000kg'];
}
if(isset($_POST['deluktzall'])){
    $opp = 'deluktzall';
}
if(isset($_POST['add_zvd_zvdv'])){
    $opp = 'add_zvd_zvdv';
    $tupedok = $_POST['tupedok'];
    $iddok = $_POST['iddok'];
    $numberdok = $_POST['numberdok'];
}
if(isset($_POST['add_sertifikat'])){
    $opp = 'add_sertifikat';
    $type_doks = $_POST['type_doks'];
    $iddok = $_POST['iddok'];
    $date_doks = $_POST['date_doks'];
    $number = $_POST['series'];
    $number .= "-";
    $number .= $_POST['number'];
}


switch ($opp)
{
  case 'addfromfilezaborony' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login загрузил заборони в БД из файда ".$fileName;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      foreach($prev as $row){
          $prev2=explode(";", $row);
          $result = mysqli_query( $link, "SELECT * FROM zaborony WHERE nomber_dok ='".$prev2[0]."'" );
          if ( mysqli_num_rows( $result ) ) {
                mysqli_query($link, "UPDATE zaborony SET data_dok = '$prev2[1]' WHERE edrpo='$prev2[0]'");
                mysqli_query($link, "UPDATE zaborony SET cuntry_dok = '$prev2[2]' WHERE nomber_dok='$prev2[0]'");
                mysqli_query($link, "UPDATE zaborony SET region_dok = '$prev2[3]' WHERE nomber_dok='$prev2[0]'");
                mysqli_query($link, "UPDATE zaborony SET zabolevanie_daok = $prev2[4] WHERE nomber_dok='$prev2[0]'");
                mysqli_query($link, "UPDATE zaborony SET items_zaborony_dok = '$prev2[5]' WHERE nomber_dok='$prev2[0]'");
          } else {
            mysqli_query($link, "INSERT INTO zaborony VALUES ('','$prev2[0]','$prev2[1]','$prev2[2]','$prev2[3]','$prev2[4]','$prev2[5]','','$login','$phptodataandtime')")or die("Ошибка " . mysqli_error($link));
          }
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
  break;
  case 'add_sertifikat' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login добавил сертификат в документ id:".$iddok;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "UPDATE iet SET zvd_zvdv = '$number' WHERE id = '$iddok'");
      mysqli_query($link, "UPDATE iet SET status = 'close' WHERE id = '$iddok'");
      //mysqli_query($link, "UPDATE iet SET datavidathi = '$phptodataandtime' WHERE id = '$iddok'");
      mysqli_query($link, "UPDATE iet SET datavidathi = '$date_doks' WHERE id = '$iddok'");

      $sql="SELECT * FROM sertifikat WHERE binding = '$iddok'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                  $mes="пользователь $login изменил номер сертификата на:".$number."в документе id:".$iddok;
                   $_SESSION['msg']=$mes;
                   mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
                   mysqli_query($link, "UPDATE sertifikat SET type_doks = '$type_doks' WHERE binding = '$iddok'");
                   mysqli_query($link, "UPDATE sertifikat SET number = '$number' WHERE binding = '$iddok'");
                   mysqli_query($link, "UPDATE sertifikat SET date_doks = '$date_doks' WHERE binding = '$iddok'");
                   mysqli_query($link, "UPDATE sertifikat SET login = '$login' WHERE binding = '$iddok'");
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO sertifikat VALUES ('','$phptodataandtime','$iddok','$type_doks','$number','$date_doks','PMGU','$login')")or die("Ошибка " . mysqli_error($link));
      }

      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'add_zvd_zvdv' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login добавил $tupedok №$numberdok в документ id:".$iddok;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "UPDATE iet SET zvd_zvdv = '$tupedok:$numberdok' WHERE id = '$iddok'");
      mysqli_query($link, "UPDATE iet SET status = 'close' WHERE id = '$iddok'");
      mysqli_query($link, "UPDATE iet SET datavidathi = '$phptodataandtime' WHERE id = '$iddok'");
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'deluktzall' :
  $login = $_SESSION['fullname'];
//  $date_incoming = $_GET['datein'];
  $mes="пользователь $login видалв таблицю УКТЗ";
  $_SESSION['msg']=$mes;
  mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
  mysqli_query($link, "DELETE FROM uktz ")or die("Ошибка " . mysqli_error($link));
  header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
  break;
  case 'del_ci' :
  $login = $_SESSION['fullname'];
//  $date_incoming = $_GET['datein'];
  $mes="пользователь $login видалв одиниці виміру id:".$id;
  $_SESSION['msg']=$mes;
  mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
  mysqli_query($link, "DELETE FROM ci WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
  header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
  break;

  case 'admintest' :
  $punkt =   $_SESSION['punkt'];
  $mes="пользователь $login получение SCOPE_IDENTITY";
  $_SESSION['msg']=$mes;
  $phpdata1 = date("Y-m-d",strtotime("+0 hour"));
  mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
  $_SESSION['msg'] .="ID = ".mysqli_insert_id($link);
  header("Location: ".$dir."/index.php?lang=rus");
  break;

  case 'addci' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login добавил Одиниці виміру:".$name_ci;
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM ci WHERE name_ci = '$name_ci' OR shot_name_ci = '$shot_name_ci'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                  $mes="пользователь $login пытался добавить существующий Одиниці виміру:".$name_ci."-".$shot_name_ci;
                   $_SESSION['msg']=$mes;
                   mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO ci VALUES ('','$name_ci','$shot_name_ci','','$otnosheniek1000kg')")or die("Ошибка " . mysqli_error($link));
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'del_auto_tupe' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил тип автотранспорта  id:".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM auto_tupe WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'addauto' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login добавил тип автотранспорта :".$auto_type;
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM auto_tupe WHERE auto_type = '$auto_type'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                  $mes="пользователь $login пытался добавить существующий тип транспорта :".$auto_type;
                   $_SESSION['msg']=$mes;
                   mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO auto_tupe VALUES ('','$auto_type','$auto_type_shot','')")or die("Ошибка " . mysqli_error($link));
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'del_count_zone' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил лічильники журналов id:".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM ount_jurnals WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'add_count_zone' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login Задал лічильники журналов Импорт:$import , Експорт:$export , Транзит:$tranzit , Внутрішньодержавне перевезення:$vnutrper  на пункте  $zona на $data_dey_jurnals";
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM ount_jurnals WHERE data_dey_jurnals = '$data_dey_jurnals' AND zona = '$zona'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                  $mes="пользователь $login Изменил лічильники журналов Импорт:$import , Експорт:$export , Транзит:$tranzit , Внутрішньодержавне перевезення:$vnutrper  на пункте  $zona на $data_dey_jurnals";
                   $_SESSION['msg']=$mes;
                   mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
                   mysqli_query($link, "UPDATE ount_jurnals SET import = '$import' WHERE data_dey_jurnals = '$data_dey_jurnals' AND zona = '$zona'");
                   mysqli_query($link, "UPDATE ount_jurnals SET export = '$export' WHERE data_dey_jurnals = '$data_dey_jurnals' AND zona = '$zona'");
                   mysqli_query($link, "UPDATE ount_jurnals SET tranzit = '$tranzit' WHERE data_dey_jurnals = '$data_dey_jurnals' AND zona = '$zona'");
                   mysqli_query($link, "UPDATE ount_jurnals SET vnutrper = '$vnutrper' WHERE data_dey_jurnals = '$data_dey_jurnals' AND zona = '$zona'");
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO ount_jurnals VALUES ('','$zona','$import','$export','$tranzit','$vnutrper','$data_dey_jurnals')")or die("Ошибка " . mysqli_error($link));
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;

  case 'edit_operator_rinku' :
          $login = $_SESSION['fullname'];
          mysqli_query($link, "UPDATE operator_rinku SET edrpo = '$edrpo' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET pravova_forma = '$pravova_forma' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET fullname = '$fullname' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET shotname = '$shotname' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET cuntry = '$cuntry' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET oblast = '$oblast' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET rayon = '$rayon' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET city = '$city' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET strids = '$strids' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET home_number = '$home_number' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET email = '$email' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET phone = '$phone' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET date = '$phptodataandtime' WHERE id='$id'");
          mysqli_query($link, "UPDATE operator_rinku SET name_user_into = '$login' WHERE id='$id'");
          $mes="пользователь $login изменил оператора ринку ".$fullname." №".$edrpo;
          $_SESSION['msg']=$mes;
          mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
          header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'deloperatorrinku' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил оператора ринку ".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM operator_rinku WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'addoperatorrinku' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login добавил оператора ринку  $shotname ЕВРПО:$edrpo";
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM operator_rinku WHERE edrpo = '$edrpo'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                 $_SESSION['msg'] ="Данная запись существует";
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO operator_rinku VALUES ('','$edrpo','$pravova_forma','$fullname','$shotname','$cuntry','$oblast','$rayon','$city','$strids','$home_number','$email','$phone','$phptodataandtime','$login')")or die("Ошибка " . mysqli_error($link));
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;

    case 'edit_user' :
            mysqli_query($link, "UPDATE account SET nikname = '$nikname' WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET fname = '$fname' WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET lname = '$lname' WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET sname = '$sname' WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET level = $level WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET status = '$status' WHERE id='$id'");
            mysqli_query($link, "UPDATE account SET punkt = '$punkt' WHERE id='$id'");
            $login = $_SESSION['fullname'];
            $mes="пользователь $login изменил пользователя ".$fname." ".$lname." ".$sname." с привелегиями ".$level.".";
            $_SESSION['msg']=$mes;
            mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
            $salt= 1;
            require_once 'apr1_md5.php';
            $password=mb_convert_encoding($password,"UTF-8","Windows-1251");
            $pass_crypt = APR1_MD5::hash($password, "$salt");
            mysqli_query($link, "UPDATE account SET password = '$pass_crypt' WHERE id='$id'");
            header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
        break;
  case 'unlock' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login разблокировал документ id:".$id;
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM iet WHERE  id = '$id' AND datavidathi <> '0000-00-00'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
         mysqli_query($link, "UPDATE iet SET status = 'close' WHERE id = '$id'");
        } else {
          mysqli_query($link, "UPDATE iet SET status = 'in work' WHERE id = '$id'");
        }
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'lock' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login заблокировал документ id:".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "UPDATE iet SET status = 'lock' WHERE id = '$id'");
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'zvd_zvdv' :

      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'addfromfileuktz' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login загрузил в УКТЗ БД из файда ".$fileName;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
    foreach($prev as $row){
        $prev2=explode(";", $row);
        //  echo "$prev2[0] - $prev2[1] - $prev2[2]";
        //  echo "<br />";
        mysqli_query($link, "INSERT INTO uktz VALUES ('','$phptodataandtime','$prev2[0]','$prev2[1]','$login','$prev2[2]')")or die("Ошибка " . mysqli_error($link));
    }
      //echo $convertedText;

    //  mysqli_query($link, "DELETE FROM zone WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;

  case 'addfromfileoperator_rinku' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login загрузил в оператори ринку БД из файда ".$fileName;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      foreach($prev as $row){
          $prev2=explode(";", $row);
          $result = mysqli_query( $link, "SELECT * FROM operator_rinku WHERE edrpo ='".$prev2[2]."'" );
          if ( mysqli_num_rows( $result ) ) {
                mysqli_query($link, "UPDATE operator_rinku SET ipn = '$prev2[3]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET pravova_forma = '$prev2[4]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET fullname = '$prev2[1]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET shotname = $prev2[0] WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET cuntry = '$prev2[5]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET oblast = '$prev2[6]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET rayon = '$prev2[7]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET city = '$prev2[8]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET strids = '$prev2[9]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET house = '$prev2[10]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET email = '$prev2[11]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET phone = '$prev2[12]' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET date = '$phptodataandtime' WHERE edrpo='$prev2[2]'");
                mysqli_query($link, "UPDATE operator_rinku SET name_user_into = '$login' WHERE edrpo='$prev2[2]'");
          } else {
            mysqli_query($link, "INSERT INTO operator_rinku VALUES ('','$prev2[2]','$prev2[3]','','$prev2[4]','$prev2[1]','$prev2[0]','$prev2[5]','$prev2[6]','$prev2[7]','$prev2[8]','$prev2[9]','$prev2[10]','$prev2[11]','$prev2[12]','$phptodataandtime','$login')")or die("Ошибка " . mysqli_error($link));
          }

      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'deldok' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил УКТЗ ID ".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM iet WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'deluktz' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил УКТЗ ID ".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM uktz WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'delzone' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил зону ID ".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM zone WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'deluser' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил пользователя ID ".$id;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM account WHERE id='$id'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'addzone' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login добавил зону №$namezone($namezone)";
      $_SESSION['msg']=$mes;
      $sql="SELECT * FROM zone WHERE numberzone = '$numberzone' OR namezone = '$namezone'";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if ($result->num_rows > 0){
                 $_SESSION['msg'] ="Данная запись существует";
      } else {
        mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
        mysqli_query($link, "INSERT INTO zone VALUES ('','$phptodataandtime','$namestrukture','$numberzone','$namezone')")or die("Ошибка " . mysqli_error($link));
      }
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'remitems' :
      $login = $_SESSION['fullname'];
    //  $date_incoming = $_GET['datein'];
      $mes="пользователь $login удалил запись ID ".$idzapusa;
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "DELETE FROM $table WHERE id='$idzapusa'")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'add_zerno' :
      $login = $_SESSION['fullname'];
      $punkt =$_SESSION['punkt'];
      $mes="пользователь $login добавил в <<Таблиця зернові>> ".$type.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "INSERT INTO zerno VALUES ('','$phptodataandtime','$number','$port','$nameboad','$rezervtonaje','$type','$countpartiy','$numbersertefikats','$dataset','$login','$punkt')")or die("Ошибка " . mysqli_error($link));
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'add_import' :
      $login = $_SESSION['fullname'];
      $punkt = $_SESSION['punkt'];
      $portzona = $_SESSION['portzona'];
      $mes="пользователь $login добавил в <<Таблиця імпорт>> ".$objektkontrolbag.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "INSERT INTO iet VALUES ('','$numbertoday','$edyno_vikno','$portzona','$uktz_number','$dateout','$all_massa','$objektkontrolbagajax','$auto_tupe','$objektkontroltransport','$name_ci','$countplace','$trejim','$countbag','$datapodathi','$pidstava','$aktoglady','$datavidathi','$virobnyk','$edrpo_virobnyk','$fullname_virobnyk','$cuntry_virobnyk','$virobnyk_uxvala','$virobnyk_adress','$importer','$edrpo_inporter','$fullname_inporter','$cuntry_inporter','$importer_adress','','$edrpo_exporter','$fullname_exporter','$cuntry_exporter','$exporter_adress','$edrpo_recipient','$fullname_recipient','$cuntry_recipient','$expeditor','$expeditor_adress','$login','$punkt','$phptodataandtime','0','in work')")or die("Ошибка " . mysqli_error($link));
      $idinsert = mysqli_insert_id($link);
      mysqli_query($link, "INSERT INTO doks VALUES ('','$phptodataandtime','$idinsert','$type_doks','$number','$date_doks','$organization','$login','')")or die("Ошибка " . mysqli_error($link));
      $phpdata1 = date("Y-m-d",strtotime("+0 hour"));
      $result = mysqli_query( $link, "SELECT * FROM ount_jurnals WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'" );
      if ( mysqli_num_rows( $result ) ) {
          mysqli_query($link, "UPDATE ount_jurnals SET import =import+1 WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'");
      } else {
        mysqli_query($link, "INSERT INTO ount_jurnals VALUES ('','".$punkt."','1','1','1','1','$phpdata1')")or die("Ошибка " . mysqli_error($link));
      }

        header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'add_export' :
      $login = $_SESSION['fullname'];
      $punkt = $_SESSION['punkt'];
      $portzona = $_SESSION['portzona'];
      $mes="пользователь $login добавил в <<Таблиця export>> ".$objektkontrolbag.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "INSERT INTO iet VALUES ('','$numbertoday','$edyno_vikno','$portzona','$uktz_number','$dateout','$all_massa','$objektkontrolbagajax','$auto_tupe','$objektkontroltransport','$name_ci','$countplace','$trejim','$countbag','$datapodathi','$pidstava','$aktoglady','$datavidathi','$virobnyk','$edrpo_virobnyk','$fullname_virobnyk','$cuntry_virobnyk','$virobnyk_uxvala','$virobnyk_adress','$importer','$edrpo_inporter','$fullname_inporter','$cuntry_inporter','$importer_adress','','$edrpo_exporter','$fullname_exporter','$cuntry_exporter','$exporter_adress','$edrpo_recipient','$fullname_recipient','$cuntry_recipient','$expeditor','$expeditor_adress','$login','$punkt','$phptodataandtime','0','in work')")or die("Ошибка " . mysqli_error($link));
      $idinsert = mysqli_insert_id($link);
      mysqli_query($link, "INSERT INTO doks VALUES ('','$phptodataandtime','$idinsert','$type_doks','$number','$date_doks','$organization','$login','')")or die("Ошибка " . mysqli_error($link));
      $phpdata1 = date("Y-m-d",strtotime("+0 hour"));
      $result = mysqli_query( $link, "SELECT * FROM ount_jurnals WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'" );
      if ( mysqli_num_rows( $result ) ) {
          mysqli_query($link, "UPDATE ount_jurnals SET 	export =export+1 WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'");
      } else {
        mysqli_query($link, "INSERT INTO ount_jurnals VALUES ('','".$punkt."','1','1','1','1','$phpdata1')")or die("Ошибка " . mysqli_error($link));
      }
        header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
case 'add_tranzit' :
    $login = $_SESSION['fullname'];
    $punkt = $_SESSION['punkt'];
    $portzona = $_SESSION['portzona'];
    $mes="пользователь $login добавил в <<Таблиця транзит>> ".$objektkontrolbag.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
    $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      mysqli_query($link, "INSERT INTO iet VALUES ('','$numbertoday','$edyno_vikno','$portzona','$uktz_number','$dateout','$all_massa','$objektkontrolbagajax','$auto_tupe','$objektkontroltransport','$name_ci','$countplace','$trejim','$countbag','$datapodathi','$pidstava','$aktoglady','$datavidathi','$virobnyk','$edrpo_virobnyk','$fullname_virobnyk','$cuntry_virobnyk','$virobnyk_uxvala','$virobnyk_adress','$importer','$edrpo_inporter','$fullname_inporter','$cuntry_inporter','$importer_adress','','$edrpo_exporter','$fullname_exporter','$cuntry_exporter','$exporter_adress','$edrpo_recipient','$fullname_recipient','$cuntry_recipient','$expeditor','$expeditor_adress','$login','$punkt','$phptodataandtime','0','in work')")or die("Ошибка " . mysqli_error($link));
      $idinsert = mysqli_insert_id($link);
      mysqli_query($link, "INSERT INTO doks VALUES ('','$phptodataandtime','$idinsert','$type_doks','$number','$date_doks','$organization','$login','')")or die("Ошибка " . mysqli_error($link));
      $phpdata1 = date("Y-m-d",strtotime("+0 hour"));
      $result = mysqli_query( $link, "SELECT * FROM ount_jurnals WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'" );
      if ( mysqli_num_rows( $result ) ) {
          mysqli_query($link, "UPDATE ount_jurnals SET tranzit =tranzit+1 WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'");
      } else {
        mysqli_query($link, "INSERT INTO ount_jurnals VALUES ('','".$punkt."','1','1','1','1','$phpdata1')")or die("Ошибка " . mysqli_error($link));
      }
        header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
    break;
case 'edit_items' :
    $login = $_SESSION['fullname'];
    $punkt =$_SESSION['punkt'];
    $mes="пользователь $login отредактировал запись".$objektkontrolbag.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
    $_SESSION['msg']=$mes;
    mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
    mysqli_query($link, "UPDATE iet SET numbertoday = '$numbertoday' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET portzona = '$portzona' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET objektkontrolbag = '$objektkontrolbag' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET objektkontroltransport = '$objektkontroltransport' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET trejim = '$trejim' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET countbag = '$countbag' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET datapodathi = '$datapodathi' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET pidstava = '$pidstava' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET aktoglad = '$aktoglad' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET datavidathi = '$datavidathi' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET virobnyk = '$virobnyk' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET virobnyk_uxvala = '$virobnyk_uxvala' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET virobnyk_adress = '$virobnyk_adress' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET importer = '$importer' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET importer_adress = '$importer_adress' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET exporter = '$exporter' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET exporter_adress = '$exporter_adress' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET expeditor = '$expeditor' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET expeditor_adress = '$expeditor_adress' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET username = '$login' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET punkt = '$punkt' WHERE id='$iditems'");
    mysqli_query($link, "UPDATE iet SET date = '$phptodataandtime' WHERE id='$iditems'");
    header("Location: ".$dir."/index.php?lang=rus");
    break;
  case 'add_innerperevoz' :
        $login = $_SESSION['fullname'];
        $punkt = $_SESSION['punkt'];
        $portzona = $_SESSION['portzona'];
        $mes="пользователь $login добавил в <<Внутрішньодержавне  перевезення>> ".$objektkontrolbag.", обЪемом: ".$rezervtonaje.", количестом партий: ".$countpartiy.".";
        $_SESSION['msg']=$mes;
          mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
          mysqli_query($link, "INSERT INTO iet VALUES ('','$numbertoday','$edyno_vikno','$portzona','$uktz_number','$dateout','$all_massa','$objektkontrolbagajax','$auto_tupe','$objektkontroltransport','$name_ci','$countplace','$trejim','$countbag','$datapodathi','$pidstava','$aktoglady','$datavidathi','$virobnyk','$edrpo_virobnyk','$fullname_virobnyk','$cuntry_virobnyk','$virobnyk_uxvala','$virobnyk_adress','$importer','$edrpo_inporter','$fullname_inporter','$cuntry_inporter','$importer_adress','','','','','','$edrpo_recipient','$fullname_recipient','$cuntry_recipient','$expeditor','$expeditor_adress','$login','$punkt','$phptodataandtime','0','in work')")or die("Ошибка " . mysqli_error($link));
          $phpdata1 = date("Y-m-d",strtotime("+0 hour"));
          $result = mysqli_query( $link, "SELECT * FROM ount_jurnals WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'" );
          if ( mysqli_num_rows( $result ) ) {
              mysqli_query($link, "UPDATE ount_jurnals SET vnutrper =vnutrper+1 WHERE data_dey_jurnals='".$phpdata1."' AND zona='".$punkt."'");
          } else {
            mysqli_query($link, "INSERT INTO ount_jurnals VALUES ('','".$punkt."','1','1','1','1','$phpdata1')")or die("Ошибка " . mysqli_error($link));
          }
            header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;
  case 'adduser' :
      $login = $_SESSION['fullname'];
      $mes="пользователь $login добавил пользователя ".$fname." ".$lname." ".$sname." с привелегиями ".$level.".";
      $_SESSION['msg']=$mes;
      mysqli_query($link, "INSERT INTO logs VALUES ('','$phptodataandtime','$mes','$login','','','','','')")or die("Ошибка " . mysqli_error($link));
      $salt= 1;
      require_once 'apr1_md5.php';
      $password=mb_convert_encoding($password,"UTF-8","Windows-1251");
      $pass_crypt = APR1_MD5::hash($password, "$salt");
      $sqladduser = "INSERT INTO account VALUES ('','".$nikname."','".$fname."','".$lname."','".$sname."','".$pass_crypt."','".$level."','".$phptodataandtime."','".$status."','','".$punkt."')";
      mysqli_query($link, $sqladduser)or die("Ошибка " . mysqli_error($link));
      $_SESSION['msg']="Новый пользователь добавлен ".$_POST['fullname'];
      header("Location: ".$dir."/index.php?lang=".$_SESSION['lang']);
      break;

default :


    break;
}
 ?>
