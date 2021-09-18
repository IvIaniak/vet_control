<?php
require_once 'connect.php';
require 'lang.php';
session_start();



if ($_SESSION['plevel'] > 10){
  $addsql="punkt='".$_SESSION['punkt']."'";
} else {
  $addsql="";
}
if(isset($_GET['serch_items'])){
        $opp = 'serch_items';

}

switch ($opp)
{
    case 'serch_items' :


    break;


default :
?>
<div class="row-12">
    <div class="col xs-12 sm-12 md-12 lg-12">
      <ul>
          <!--<li class="btntype active" data-target="zerno"> <span class="button green">Зерно</span> </li>-->
          <li class="btntype " data-target="export"> <span class="button">Експорт</span> </li>
          <li class="btntype " data-target="import"> <span class="button">Імпорт</span> </li>
          <li class="btntype " data-target="tranzit"> <span class="button">Транзит</span> </li>
          <li class="btntype " data-target="innerperevoz"> <span class="button">Внутрішньодержавне перевезення</span> </li>
        <!--  <li class="btntype active" data-target="all"> <span class="button green">Все</span> </li>-->
          <li class="btntype active" data-target="alltest"> <span class="button green">Все</span> </li>

          <?php
            if ($_SESSION['plevel'] == 10){
              ?>
                <!--  <li class="btntype " data-target="alltest"> <span class="button">Все test</span> </li>-->
                  <li class="btntype active" data-target="search"><span class="button">Пошук</span> </li>
              <?php
            }?>
      </ul>
      <div class="search items" id="serchfrom">
        <hr />
        <ul Class="menuseckond">
            <li class="btntypein active" data-target="formserch"> <span class="button green">Пошук</span> </li>
            <li class="btntypein " data-target="formrezult"> <span class="button">Результаті пошука</span></li>
        </ul>
        <div class="formserch itemses active">
        <form action='function.php' method='POST' id="sertchitemsform">
          <input type='text'  name='id' size='30'  value='' placeholder="ID документа"  >
          <input type='text'  name='numbertoday' size='30'  value='' placeholder="порядковий № документа"  >
          <?php if ($_SESSION['plevel'] <= 10){ ?>
           <select  name='portzona' >
               <option selected value='<?php echo $_SESSION['punkt']; ?> '>Зона обслуговування№ <?php echo $_SESSION['punkt']; ?> </option>
               <?php
               $result = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
               if($result)
                   {
                       while($row = mysqli_fetch_array($result)){
                           echo "<option value='".$row['numberzone']."'><span>".$row['namezone']." №".$row['numberzone']."</span></option>";
                       }
                   }?>
           </select>
           <?php
         }  ?>


              <br /><input type='text'  name='objektkontrolbagajax' size='30'  value='' placeholder="Вантаж (назва, код УКТЗЕД, дата виробництва, місце походження)"  ><br />


             <select  name='trejim' >
                <option selected value=''><span>Транзіт/Імпорт/Єкспорт</span></option>
                <option value='tranzit'><span>Транзіт</span></option>
                <option value='inport'><span>Імпорт</span></option>
                <option value='export'><span>Єкспорт</span></option>
            </select>
            <br><label >Дата створення записа з</label><br>
            <input type='date'  name='datafrom' size='30'  value='' required><label >- по -</label>  <input type='date'  name='datatoo' size='30'  value=''><br>
          <div class="auto">
                <input type='text' name='objektkontroltransport1' size='30'  value='' placeholder="Транспортний засіб (вид, номер)"  >
                <input type='text' name='countbag1' size='30'  value='' placeholder="Кількість (вага, шт.)/кількість місць"  >
          </div>
          <input type='date' id="inport6" name='datapodathi' size='30'  value='' placeholder="Дата подачі заяви суб’єктом господарювання"  ><label for="#inport6">Дата подачі заяви суб’єктом господарювання</label><br>
          <input type='text' name='pidstava' size='30'  value='' placeholder="Підстава для видачі ветеринарного документу"  ><input type='text'  name='aktoglady' size='30'  value='' placeholder="№ Акта огляду"><br>
          <input type='date' id="inport8" name='datavidathi' size='30'  value='' placeholder="Дата видачі ветеринарного документу інспектором"  ><label for="#inport8">Дата видачі ветеринарного документу інспектором</label><br>
          <input type='text' name='virobnyk' size='30'  value='' placeholder='Виробник назва'  ><input type='text'  name='virobnyk_uxvala' size='30'  value='' placeholder='№ ухвали виробника(експлуатаційний дозвіл)'  ><input type='text' name='virobnyk_adress' size='30'  value='' placeholder='Адресса виробника'  ><br>
          <input type='text' name='exporter' size='30'  value='' placeholder="Єкспортер назва"  ><input type='text'  name='exporter_adress' size='30'  value='' placeholder="Єкспортер адресса"  ><br>
          <input type='text' name='importer' size='30'  value='' placeholder="Імпортер назва"  ><input type='text'  name='importer_adress' size='30'  value='' placeholder="Імпортер адресса"  ><br>
          <input type='text' name='expeditor' size='30'  value='' placeholder="Експедитор назва"  ><input type='text'  name='expeditor_adress' size='30'  value='' placeholder="Експедитор адресса"  ><br>
          <span  class="button green serch" id="serchitems" name='serch' value=''>ПОШУК</span>
        </form>
        </div>
        <div class="formrezult itemses">
          <ul  id="serchrezult">

          </ul>
        </div>
      </div>

      <div class="import items">
        <ul>

          <?php
          if ($addsql == ''){
            //$sql = "SELECT * FROM iet WHERE trejim ='inport' ORDER BY id DESC";
              $sql = "SELECT * FROM iet LEFT JOIN doks ON iet.id=doks.binding WHERE iet.trejim ='inport' ORDER BY iet.id DESC";
          } else {
            //  $sql = "SELECT * FROM iet WHERE trejim ='inport' AND ".$addsql." ORDER BY id DESC";
              $sql = "SELECT * FROM iet LEFT JOIN doks ON iet.id=doks.binding WHERE iet.trejim ='inport' AND iet.".$addsql." ORDER BY iet.id DESC";
          }
          $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
          if($result)
              {
                if ($_SESSION['plevel'] == 10){
                  while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "  <ul Class='fullinfo $row[0]'>";
                     for ($i = 0; $i < 44; $i++) {
                         if ($row[$i] !='' or $row[$i] !=null){
                           echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                   //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                     for ($i = 0; $i < 4; $i++) {
                         if ($row[47+$i] !='' or $row[47+$i] !=null){
                           echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                     $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                     if($result1)
                         {
                             while($row1 = mysqli_fetch_array($result1)){
                                   echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                             }
                         }
                      echo "<li> <hr /></li><li>";
                      echo "<li><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>";
                        if ($row[43]=="lock") {
                          echo "<button class='fa fa-unlock arreysettings' type='submit' name='unlock'></button>";
                        } else {
                          echo "<button class='fa fa-lock arreysettings' type='submit' name='lock'></button>";
                        }
                      echo "

                        <span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                        <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                                     </ul></li>";
                  }
              } else {
                while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "  <ul Class='fullinfo $row[0]'>";
                     for ($i = 0; $i < 44; $i++) {
                         if ($row[$i] !='' or $row[$i] !=null){
                           echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                   //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                     for ($i = 0; $i < 4; $i++) {
                         if ($row[47+$i] !='' or $row[47+$i] !=null){
                           echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                     $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                     if($result1)
                         {
                             while($row1 = mysqli_fetch_array($result1)){
                                   echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                             }
                         }
                      echo "<li> <hr /></li><li>";
                      if (empty($row[42] || $row[43]!="in work")){
                        echo "<span class='fa fa-plus-square arreysettings clickzvd' data-dokid='".$row['id']."' name='zvd_zvdv'></span>";
                        echo "<span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>";
                      }
                        echo "</ul></li>";
                  }

              }
              }
           ?>
         </ul>
      </div>
      <div class="export items">
        <ul>

          <?php
          if ($addsql == ''){
            $sql = "SELECT * FROM iet LEFT JOIN doks ON iet.id=doks.binding WHERE iet.trejim ='export' ORDER BY iet.id DESC";
            //$sql = "SELECT * FROM iet WHERE trejim ='export' ORDER BY id DESC";
          } else {
              $sql = "SELECT * FROM iet LEFT JOIN doks ON iet.id=doks.binding WHERE iet.trejim ='export' AND iet.".$addsql." ORDER BY iet.id DESC";
          }
          $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
          if($result)
              {
                if ($_SESSION['plevel'] == 10){
                  while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close 1' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork 2' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock 3' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo 4' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }

                     echo "  <ul Class='fullinfo $row[0]'>";
                      for ($i = 0; $i < 44; $i++) {
                          if ($row[$i] !='' or $row[$i] !=null){
                            echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                          }
                      }
                      echo "<li> <hr /></li>";
                    //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                      for ($i = 0; $i < 4; $i++) {
                          if ($row[47+$i] !='' or $row[47+$i] !=null){
                            echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                          }
                      }
                      echo "<li> <hr /></li>";
                      $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                      if($result1)
                          {
                              while($row1 = mysqli_fetch_array($result1)){
                                    echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                    echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                    echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                    echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                              }
                          }
                      echo "<li> <hr /></li>
                        <li><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row[0]."' placeholder=''>";
                        if ($row[43]=="lock") {
                          echo "<button class='fa fa-unlock arreysettings' type='submit' name='unlock'></button>";
                        } else {
                          echo "<button class='fa fa-lock arreysettings' type='submit' name='lock'></button>";
                        }
                      echo "
                        <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-plus-square arreysettings clicksertifikat' data-dokid='".$row[0]."' name='sertifikat'></span><span class='fa fa-edit arreysettings edit_items' data-items='".$row[0]."'></span></li>
                                     </ul></li>";
                  }
              } else {
                while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "  <ul Class='fullinfo $row[0]'>";
                     for ($i = 0; $i < 44; $i++) {
                         if ($row[$i] !='' or $row[$i] !=null){
                           echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                   //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                     for ($i = 0; $i < 4; $i++) {
                         if ($row[47+$i] !='' or $row[47+$i] !=null){
                           echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                     $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                     if($result1)
                         {
                             while($row1 = mysqli_fetch_array($result1)){
                                   echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                             }
                         }
                      echo "<li> <hr /></li><li>";
                      if (empty($row[42] || $row[43]!="in work")){
                        echo "<span class='fa fa-plus-square arreysettings clicksertifikat' data-dokid='".$row[0]."' name='sertifikat'></span>";
                        echo "<span class='fa fa-edit arreysettings edit_items' data-items='".$row[0]."'></span></li>";
                      }
                        echo "</ul></li>";
                  }

              }
            }
           ?>
         </ul>
      </div>
      <div class="tranzit items">
        <ul>
          <?php
          if ($addsql == ''){
            $sql = "SELECT * FROM iet WHERE trejim ='tranzit' ORDER BY id DESC";
          } else {
              $sql = "SELECT * FROM iet WHERE trejim ='tranzit' AND ".$addsql." ORDER BY id DESC";
          }
          $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
          if($result)
              {
                if ($_SESSION['plevel'] == 10){
                  while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "  <ul Class='fullinfo $row[0]'>";
                     for ($i = 0; $i < 44; $i++) {
                         if ($row[$i] !='' or $row[$i] !=null){
                           echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                   //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                     for ($i = 0; $i < 4; $i++) {
                         if ($row[47+$i] !='' or $row[47+$i] !=null){
                           echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                     $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                     if($result1)
                         {
                             while($row1 = mysqli_fetch_array($result1)){
                                   echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                             }
                         }
                       echo "<li> <hr /></li><li>";

                       echo " <li><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>";
                        if ($row[43]=="lock") {
                          echo "<button class='fa fa-unlock arreysettings' type='submit' name='unlock'></button>";
                        } else {
                          echo "<button class='fa fa-lock arreysettings' type='submit' name='lock'></button>";
                        }
                      echo "

                        <span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                        <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                                     </ul></li>";
                  }
              } else {
                while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "  <ul Class='fullinfo $row[0]'>";
                     for ($i = 0; $i < 44; $i++) {
                         if ($row[$i] !='' or $row[$i] !=null){
                           echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                   //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                     for ($i = 0; $i < 4; $i++) {
                         if ($row[47+$i] !='' or $row[47+$i] !=null){
                           echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                         }
                     }
                     echo "<li> <hr /></li>";
                     $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                     if($result1)
                         {
                             while($row1 = mysqli_fetch_array($result1)){
                                   echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                   echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                             }
                         }
                       echo "<li> <hr /></li><li>";
                      if (empty($row[42] || $row[43]!="in work")){
                        echo "<span class='fa fa-plus-square arreysettings clickzvd' data-dokid='".$row['id']."' name='zvd_zvdv'></span>";
                        echo "<span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>";
                      }
                        echo "</ul></li>";
                  }

              }
            }
           ?>
         </ul>
      </div>
      <div class="innerperevoz items">
<ul>


          <?php
          if ($addsql == ''){
            $sql = "SELECT * FROM iet WHERE trejim ='innerperevoz' ORDER BY id DESC";
          } else {
              $sql = "SELECT * FROM iet WHERE trejim ='innerperevoz' AND ".$addsql." ORDER BY id DESC";
          }
          $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
          if($result)
              {
                if ($_SESSION['plevel'] == 10){
                  while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                      echo "
                      <ul Class='fullinfo $row[0]'>
                        <li><span Class='titel'>ID</span> : <span Class='content'>$row[0]</span></li>
                        <li><span Class='titel'>Дата створення заявки</span> : <span Class='content'>$row[41]</span></li>
                        <li><span Class='titel'>№ Єдине вікно</span> : <span Class='content'>$row[2]</span></li>
                        <li><span Class='titel'>Зона обслуговування</span> : <span Class='content'>$row[40]</span></li>
                        <li><span Class='titel'>Вантаж(назва, код УКТЗЕД)</span> : <span Class='content'>$row[4] - $row[7]</span></li>
                        <li><span Class='titel'>Країна виробник</span> : <span Class='content'>$row[23]</span></li>
                        <li><span Class='titel'>Дата відправлення вантажу</span> : <span Class='content'>$row[5]</span></li>
                        <li><span Class='titel'>Транспортний засіб(вид, номер)</span> : <span Class='content'>$row[8] - $row[9]</span></li>
                        <li><span Class='titel'>Митний режим (експорт/імпорт/транзит і т.д.)</span> : <span Class='content'>$row[12]</span></li>
                        <li><span Class='titel'>Загальна масса</span> : <span Class='content'>$row[6] кг.</span></li>
                        <li><span Class='titel'>Кількість (вага, шт.)/кількість місць</span> : <span Class='content'>$row[13]-місць $row[11]</span></li>
                        <li><span Class='titel'>Дата подачі заяви суб’єктом господарювання</span> : <span Class='content'>$row[14]</span></li>
                        <li><span Class='titel'>Підстава для видачі ветеринарного документу </span> : <span Class='content'>$row[15]</span></li>
                        <li><span Class='titel'>Дата видачі ветеринарного документу інспектором</span> : <span Class='content'>$row[17]</span></li>
                        <li><span Class='titel'>Виробник</span> : <span Class='content'>$row[20]</span></li>
                        <li> <span Class='titel'>Користувач</span> : <span Class='content'>$row[39]</span></li>
                        <li><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>";
                        if ($row[43]=="lock") {
                          echo "<button class='fa fa-unlock arreysettings' type='submit' name='unlock'></button>";
                        } else {
                          echo "<button class='fa fa-lock arreysettings' type='submit' name='lock'></button>";
                        }
                      echo "

                        <span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                        <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                                     </ul></li>";
                  }
              } else {
                while($row = mysqli_fetch_array($result)){
                    if ($row[43]=="close"){
                      echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="in work") {
                      echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } elseif ($row[43]=="lock") {
                      echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    } else {
                      echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                    }
                    echo "
                    <ul Class='fullinfo $row[0]'>
                      <li><span Class='titel'>ID</span> : <span>$row[0]</span></li>
                      <li><span Class='titel'>Дата створення заявки</span> : <span>$row[41]</span></li>
                      <li><span Class='titel'>№ Єдине вікно</span> : <span>$row[2]</span></li>
                      <li><span Class='titel'>Порт (зона обслуговування)</span> : <span>$row[40]</span></li>
                      <li><span Class='titel'>Вантаж(назва, код УКТЗЕД)</span> : <span Class='content'>$row[4] - $row[7]</span></li>
                      <li><span Class='titel'>Країна виробник</span> : <span Class='content'>$row[23]</span></li>
                      <li><span Class='titel'>Дата відправлення вантажу</span> : <span Class='content'>$row[5]</span></li>
                      <li><span Class='titel'>Транспортний засіб(вид, номер)</span> : <span Class='content'>$row[8] - $row[9]</span></li>
                      <li><span Class='titel'>Митний режим (експорт/імпорт/транзит і т.д.)</span> : <span Class='content'>$row[12]</span></li>
                      <li><span Class='titel'>Загальна масса</span> : <span Class='content'>$row[6] кг.</span></li>
                      <li><span Class='titel'>Кількість (вага, шт.)/кількість місць</span> : <span Class='content'>$row[13]-місць $row[11]</span></li>
                      <li><span Class='titel'>Дата подачі заяви суб’єктом господарювання</span> : <span Class='content'>$row[14]</span></li>
                      <li><span Class='titel'>Підстава для видачі ветеринарного документу </span> : <span Class='content'>$row[15]</span></li>
                      <li><span Class='titel'>Дата видачі ветеринарного документу інспектором</span> : <span Class='content'>$row[17]</span></li>
                      <li><span Class='titel'>Виробник</span> : <span Class='content'>$row[20]</span></li>
                      <li> <span Class='titel'>Користувач</span> : <span Class='content'>$row[39]</span></li><li>";
                      if (empty($row[42] || $row[43]!="in work")){
                        echo "<span class='fa fa-plus-square arreysettings clickzvd' data-dokid='".$row['id']."' name='zvd_zvdv'></span>";
                        echo "<span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>";
                      }
                        echo "</ul></li>";
                  }

              }
            }
           ?>


           </ul>
      </div>

      <div class="alltest active items">
        <ul>
                <?php
                if ($addsql == ''){
                  $sql = "SELECT * FROM iet ORDER BY id DESC";
                } else {
                  $sql = "SELECT * FROM iet WHERE ".$addsql." ORDER BY id DESC";
                }
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if($result)
                    {
                        if ($_SESSION['plevel'] == 10){
                          while($row = mysqli_fetch_array($result)){
                            if ($row[43]=="close"){
                              echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } elseif ($row[43]=="in work") {
                              echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } elseif ($row[43]=="lock") {
                              echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } else {
                              echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            }
                            echo "  <ul Class='fullinfo $row[0]'>";
                             for ($i = 0; $i < 44; $i++) {
                                 if ($row[$i] !='' or $row[$i] !=null){
                                   echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                                 }
                             }
                             echo "<li> <hr /></li>";
                           //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                             for ($i = 0; $i < 4; $i++) {
                                 if ($row[47+$i] !='' or $row[47+$i] !=null){
                                   echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                                 }
                             }
                             echo "<li> <hr /></li>";
                             $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                             if($result1)
                                 {
                                     while($row1 = mysqli_fetch_array($result1)){
                                           echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                                     }
                                 }
                               echo "<li> <hr /></li><li>";
                               echo "
                                <li><form action='function.php' method='POST'>
                                <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>";
                                if ($row[43]=="lock") {
                                  echo "<button class='fa fa-unlock arreysettings' type='submit' name='unlock'></button>";
                                } else {
                                  echo "<button class='fa fa-lock arreysettings' type='submit' name='lock'></button>";
                                }
                              echo "

                                <span class='fa fa-plus-square arreysettings click' data-target='zvdzvdv' name='zvd_zvdv'></span>
                                <button class='fa fa-trash arreysettings' type='submit' name='deldok'></button> </form><span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>
                                             </ul></li>";
                          }
                      } else {
                        while($row = mysqli_fetch_array($result)){
                            if ($row[43]=="close"){
                              echo "<li Class='shotinfo close' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } elseif ($row[43]=="in work") {
                              echo "<li Class='shotinfo inwork' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } elseif ($row[43]=="lock") {
                              echo "<li Class='shotinfo lock' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            } else {
                              echo "<li Class='shotinfo' id='$row[0]'><span Class='one'>ID<br />$row[0]</span><span Class='too'>Дата створення заявки<br />$row[41]</span><span Class='three'>№ Єд. вікно<br />$row[2]</span><span Class='four'>Зона обсл.<br />$row[40]</span><span Class='five'>Вантаж(назва, код УКТЗЕД)<br />$row[4] - $row[7]</span><span>Митний режим<br />$row[12]</span><span  Class='six'>Загальна маса вантажу<br />$row[6]</span><span  Class='seven'>Користувач<br />$row[39]</span>";
                            }
                            echo "  <ul Class='fullinfo $row[0]'>";
                             for ($i = 0; $i < 44; $i++) {
                                 if ($row[$i] !='' or $row[$i] !=null){
                                   echo "<li><span Class='titel ".(200+$i)."'>".$wd[200+$i]."</span> : <span Class='content'>$row[$i]</span></li>";
                                 }
                             }
                             echo "<li> <hr /></li>";
                           //  echo "<li><span Class='titel ".(245)."'>".$wd[245]."</span> : <span Class='content'>".$row[45]."</span></li>";
                             for ($i = 0; $i < 4; $i++) {
                                 if ($row[47+$i] !='' or $row[47+$i] !=null){
                                   echo "<li><span Class='titel ".(247+$i)."'>".$wd[247+$i]."</span> : <span Class='content'>".$row[47+$i]."</span></li>";
                                 }
                             }
                             echo "<li> <hr /></li>";
                             $result1 = mysqli_query($link, "SELECT * FROM sertifikat WHERE binding ='$row[0]' ORDER BY id DESC") or die("Ошибка " . mysqli_error($link));
                             if($result1)
                                 {
                                     while($row1 = mysqli_fetch_array($result1)){
                                           echo "<li><span Class='titel sert'>".$wd[245]."</span> : <span Class='content'>".$row1[1]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[31]."</span> : <span Class='content'>".$row1[3]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[6]."</span> : <span Class='content'>".$row1[4]."</span></li>";
                                           echo "<li><span Class='titel sert'>".$wd[7]."</span> : <span Class='content'>".$row1[5]."</span></li>";
                                     }
                                 }
                               echo "<li> <hr /></li><li>";
                              if (empty($row[42] || $row[43]!="in work")){
                                echo "<span class='fa fa-plus-square arreysettings clickzvd' data-dokid='".$row['id']."' name='zvd_zvdv'></span>";
                                echo "<span class='fa fa-edit arreysettings edit_items' data-items='".$row['id']."'></span></li>";
                              }
                                echo "</ul></li>";
                          }

                      }
                    }
                 ?>

          </li>
        </ul>
      </div>


     </div>
</div>
<?php   break; } ?>
