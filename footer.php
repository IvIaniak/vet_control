<div class="col xs-12 sm-12 md-12 lg-12 msg">
  <div class="msgbag">
    <ul>
      <li>
        <span> <?php echo $_SESSION['msg']; ?></span>
      </li>
    </ul>
  </div>
</div>
<div class="col xs-12 sm-12 md-12 lg-12 shotinfo">
<?php

switch (  $_SESSION['plevel']) {
  case '10':
  $sql="SELECT * FROM iet";
  $results = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
  $count_import=0;
  $count_export=0;
  $count_tranzit=0;
  $count_vnetr=0;

  $count_tijden_import=0;
  $count_tijden_export=0;
  $count_tijden_tranzit=0;
  $count_tijden_vnetr=0;

  $count_day_import=0;
  $count_day_export=0;
  $count_day_tranzit=0;
  $count_day_vnetr=0;

  if($results)
      {
          while($rows = mysqli_fetch_array($results)){
          if ($rows['trejim']=='inport'){
            $count_import+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='export'){
            $count_export+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='tranzit'){
            $count_tranzit+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='innerperevoz'){
            $count_vnetr+=str_replace(',','.',$rows[6]);
          }

          if ($phpdata7 < date("Y.m.d",strtotime($rows[13]))){
            if ($rows['trejim']=='inport'){
              $count_tijden_import+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='export'){
              $count_tijden_export+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='tranzit'){
              $count_tijden_tranzit+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='innerperevoz'){
              $count_tijden_vnetr+=str_replace(',','.',$rows[6]);
            }
          }
          if ($phpdata == date("Y.m.d", strtotime($rows[13]))){
            if ($rows['trejim']=='inport'){
              $count_day_import+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='export'){
              $count_day_export+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='tranzit'){
              $count_day_tranzit+=str_replace(',','.',$rows[6]);
            }
            if ($rows['trejim']=='innerperevoz'){
              $count_day_vnetr+=str_replace(',','.',$rows[6]);
            }
          }
      }
  }
  $sql="SELECT * FROM zerno";
  $results = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
  $count_zerno=0;
  $count_tonaj=0;

  $count_tijden_zerno=0;
  $count_tijden_tonaj=0;

  $count_day_zerno=0;
  $count_day_tonaj=0;

  if($results)
      {
          while($rows = mysqli_fetch_array($results)){
            $count_zerno++;
            $count_tonaj+=str_replace(',','.',$rows['rezervtonaje']);

            if (strtotime($phpdata7) < strtotime($rows[1])){
              $count_tijden_zerno++;
              $count_tijden_tonaj+=str_replace(',','.',$rows['rezervtonaje']);
            }
            if ($phpdata == date("Y.m.d", strtotime($rows[1]))){
              $count_day_zerno++;
              $count_day_tonaj+=str_replace(',','.',$rows['rezervtonaje']);
            }
          }
      }
 ?>
              <div class="shotinfomenu">
                  <TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
                    <tr>
                      <td><span>на усіх пунктах </span>
                      <td><span>експорт</span>
                      <td><span>імпорт</span>
                      <td><span>транзит</span>
                      <td><span>внутрешні</span>
                      <td><span>зерно</span>
                    </tr>
                    <tr>
                      <td> <span>за согодні : </span><td><span> <?php echo $count_day_export; ?></span> <td><span><?php echo $count_day_import;?> </span><td><span><?php echo $count_day_tranzit; ?></span><td><span><?php echo   $count_day_vnetr; ?></span><td><span><?php echo $count_day_tonaj; ?></span></td>
                    </tr>
                    <tr>
                      <td> <span>за тиждень :</span><td><span> <?php echo $count_tijden_export; ?></span> <td><span><?php echo $count_tijden_import;?> </span><td><span><?php echo $count_tijden_tranzit; ?></span><td><span><?php echo   $count_tijden_vnetr; ?></span><td><span><?php echo $count_tijden_tonaj; ?></span></td>
                    </tr>
                    <tr>
                      <td> <span>за рік : </span><td><span> <?php echo $count_export; ?></span> <td><span><?php echo $count_import;?> </span><td><span><?php echo $count_tranzit; ?></span><td><span><?php echo   $count_vnetr; ?></span><td><span><?php echo $count_tonaj; ?></span></td>
                    </tr>
                  </table>
              </div>
<?php
break;
case '20':
$sql="SELECT * FROM iet WHERE punkt = ".$_SESSION['punkt'];
$results = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$count_import=0;
$count_export=0;
$count_tranzit=0;
$count_vnetr=0;

$count_tijden_import=0;
$count_tijden_export=0;
$count_tijden_tranzit=0;
$count_tijden_vnetr=0;

$count_day_import=0;
$count_day_export=0;
$count_day_tranzit=0;
$count_day_vnetr=0;

if($results)
    {
        while($rows = mysqli_fetch_array($results)){
        if ($rows['trejim']=='inport'){
          $count_import+=str_replace(',','.',$rows[6]);
        }
        if ($rows['trejim']=='export'){
          $count_export+=str_replace(',','.',$rows[6]);
        }
        if ($rows['trejim']=='tranzit'){
          $count_tranzit+=str_replace(',','.',$rows[6]);
        }
        if ($rows['trejim']=='innerperevoz'){
          $count_vnetr+=str_replace(',','.',$rows[6]);
        }

        if ($phpdata7 < date("Y.m.d",strtotime($rows[13]))){
          if ($rows['trejim']=='inport'){
            $count_tijden_import+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='export'){
            $count_tijden_export+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='tranzit'){
            $count_tijden_tranzit+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='innerperevoz'){
            $count_tijden_vnetr+=str_replace(',','.',$rows[6]);
          }
        }
        if ($phpdata == date("Y.m.d", strtotime($rows[13]))){
          if ($rows['trejim']=='inport'){
            $count_day_import+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='export'){
            $count_day_export+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='tranzit'){
            $count_day_tranzit+=str_replace(',','.',$rows[6]);
          }
          if ($rows['trejim']=='innerperevoz'){
            $count_day_vnetr+=str_replace(',','.',$rows[6]);
          }
        }
    }
}
$sql="SELECT * FROM zerno WHERE punkt= ".$_SESSION['punkt'];
$results = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
$count_zerno=0;
$count_tonaj=0;

$count_tijden_zerno=0;
$count_tijden_tonaj=0;

$count_day_zerno=0;
$count_day_tonaj=0;

if($results)
    {
        while($rows = mysqli_fetch_array($results)){
          $count_zerno++;
          $count_tonaj+=str_replace(',','.',$rows['rezervtonaje']);

          if (strtotime($phpdata7) < strtotime($rows[1])){
            $count_tijden_zerno++;
            $count_tijden_tonaj+=str_replace(',','.',$rows['rezervtonaje']);
          }
          if ($phpdata == date("Y.m.d", strtotime($rows[1]))){
            $count_day_zerno++;
            $count_day_tonaj+=str_replace(',','.',$rows['rezervtonaje']);
          }
        }
    }
 ?>


 <div class="shotinfomenu">
     <TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
       <tr>
         <td><span>на Пункте № <?php echo $_SESSION['punkt']; ?></span>
         <td><span>експорт</span>
         <td><span>імпорт</span>
         <td><span>транзит</span>
         <td><span>внутрешні</span>
         <td><span>зерно</span>
       </tr>
       <tr>
         <td> <span>за согодні : </span><td><span> <?php echo $count_day_export; ?></span> <td><span><?php echo $count_day_import;?> </span><td><span><?php echo $count_day_tranzit; ?></span><td><span><?php echo   $count_day_vnetr; ?></span><td><span><?php echo $count_day_tonaj; ?></span></td>
       </tr>
       <tr>
         <td> <span>за тиждень :</span><td><span> <?php echo $count_tijden_export; ?></span> <td><span><?php echo $count_tijden_import;?> </span><td><span><?php echo $count_tijden_tranzit; ?></span><td><span><?php echo   $count_tijden_vnetr; ?></span><td><span><?php echo $count_tijden_tonaj; ?></span></td>
       </tr>
       <tr>
         <td> <span>за рік : </span><td><span> <?php echo $count_export; ?></span> <td><span><?php echo $count_import;?> </span><td><span><?php echo $count_tranzit; ?></span><td><span><?php echo   $count_vnetr; ?></span><td><span><?php echo $count_tonaj; ?></span></td>
       </tr>
     </table>
 </div>
<?php
break;
case '30':
 ?>




<?php
break;
default:
 ?>


<?php break; } ?>
    </div>
    <script src="js/vadim.js"></script>
  </body>
</html>
