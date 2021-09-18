<?php
session_start();
require_once 'connect.php';
require 'lang.php';

if(isset($_POST['otchet'])){
    $op = 'otchet';
}
if(isset($_POST['month'])){
    $op = 'month';
}

switch ($op)
{
case 'otchet' :
          $grand=0;
        	$total_prr=0;
        	$total_hr=0;
        	$cont_count=0;
        	$linename= $_POST['line'];
        	$flag_plo=0;
            $contrarrey = array();
            if ($_POST['flat'] != 0) {
        		$flag_plo=1;
        	}

        	if ($_POST['expeditor'] != '-') {
        		$filter1 = "and expeditor = ".$_POST['expeditor'];
                echo $filter1;
        	} else {
        		$filter1 = "";
        	}

        	if ($_POST['perevoz'] != '-') {
        		$filter2 = "and perevoz = ".$_POST['perevoz'];
        	} else {
        		$filter2 = "";
        	}

        	if ($_POST['perevoz_out'] != '-') {
        		$filter3 = "and perevoz_out = ".$_POST['perevoz_out'];
        	} else {
        		$filter3 = "";
        	}

        	if ($_POST['expeditor_out'] != '-') {
        		$filter4 = "and expeditor_out = ".$_POST['expeditor_out'];
        	} else {
        		$filter4 = "";
        	}


            if ($_POST['line'] == 1) {
                if (($_POST['where'] == 1) or ($_POST['where'] == 4)) {
                    if ($_POST['show_out'] == 1) {
                        $line = "(line != ' ' ";
                        $line.= "$filter1 "."$filter2 "."$filter3 "."$filter4";
                        $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                        $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                        $ourarrey = array();

                        if ($result){
                            while ($row = mysqli_fetch_array($result))
                            {
                                $typekont = $_POST['type'];

                                if (preg_match("/$typekont/",$row[1])){

                                    if ($flag_plo == 1) {

                                        //if ($$row[13]=~m/$_POST['flat'}/) {
                                            $flatfrom=$_POST['flat'];
                                        if (preg_match("/$flatfrom/",$row[13])){
                                            array_push($contrarrey, $row);
                                        }
                                    } else {
                                        array_push($contrarrey, $row);
            						             }
                                 }
                            }
                        }
                    }
                    $line = "(line != '' ";
                    $line.= "$filter1 "."$filter2 ";
                    $sql = "SELECT * FROM k_na_sklade WHERE ".$line.") ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    $ourarrey = array();
                    if ($result){
                        while($row = mysqli_fetch_array($result))
                        {
                            $typekont = $_POST['type'];
                            if (preg_match("/$typekont/",$row[1])){
                                if ($flag_plo == 1) {
                                    //if ($$row[13]=~m/$_POST['flat'}/) {
                                        $flatfrom=$_POST['flat'];

                                    if (preg_match("/$flatfrom/",$row[13])){
                                        array_push($contrarrey, $row);
                                    }
                                } else {

                                    array_push($contrarrey, $row);
                                }
                             }
                        }
                    }
                }
                if ($_POST['where'] == 2){
                    $line = "(line != '' ";
                    $line.= "$filter1 "."$filter2 "."$filter3 "."$filter4";
                    $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    $ourarrey = array();
                    if ($result){
                        while($row = mysqli_fetch_array($result))
                        {
                            $typekont = $_POST['type'];
                            if (preg_match("/$typekont/",$row[1])){
                                if ($flag_plo == 1) {
                                    //if ($$row[13]=~m/$_POST['flat'}/) {
                                        $flatfrom=$_POST['flat'];
                                    if (preg_match("/$flatfrom/",$row[13])){
                                        array_push($contrarrey, $row);
                                    }
                                } else {
                                    array_push($contrarrey, $row);
                                }
                             }
                        }
                    }
                }
                if ($_POST['where'] == 3){
                    $line = "(line != '' ";
                    $line.= "$filter1 "."$filter2 ";
                    $sql = "SELECT * FROM k_na_sklade WHERE ".$line.") ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    $ourarrey = array();
                    if ($result){
                        while($row = mysqli_fetch_array($result))
                        {
                            $typekont = $_POST['type'];
                            if (preg_match("/$typekont/",$row[1])){
                                if ($flag_plo == 1) {
                                    //if ($$row[13]=~m/$_POST['flat'}/) {
                                        $flatfrom=$_POST['flat'];
                                    if (preg_match("/$flatfrom/",$row[13])){
                                        array_push($contrarrey, $row);
                                    }
                                } else {
                                    array_push($contrarrey, $row);
                                }
                             }
                        }
                    }
                    $line = "(line != '' ";
                    $line.= "$filter1 "."$filter2 "."$filter3 "."$filter4";
                    $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    $ourarrey = array();
                    if ($result){
                        while($row = mysqli_fetch_array($result))
                        {
                            $typekont = $_POST['type'];
                            if (preg_match("/$typekont/",$row[1])){
                                if ($flag_plo == 1) {
                                    //if ($$row[13]=~m/$_POST['flat'}/) {
                                        $flatfrom=$_POST['flat'];
                                    if (preg_match("/$flatfrom/",$row[13])){
                                        array_push($contrarrey, $row);
                                    }
                                } else {
                                    array_push($contrarrey, $row);
                                }
                             }
                        }
                    }
                }
            } else {
    // остановился тут
                if (($_POST['where'] == 1) or ($_POST['where'] == 4)) {
                    if ($_POST['show_out'] == 1) {
                        $line = "(line = '".$_POST['line']."' ";
                        $line.= "$filter1 "."$filter2 "."$filter3 "."$filter4";
                        $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                        $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                        $ourarrey = array();

                        if ($result){
                            while($row = mysqli_fetch_array($result))
                            {
                              $typekont = $_POST['type'];
                              if (preg_match("/$typekont/",$row[1])){
                                 if ($flag_plo == 1) {

                                     $flatfrom=$_POST['flat'];
                                     if (preg_match("/$flatfrom/",$row[13])){
                                         array_push($contrarrey, $row);
                                     }
                                    } else {

                                        array_push($contrarrey, $row);
                                    }
                                }
                            }
                        }
                      }
                    $line = "(line = '".$_POST['line']."' ";
                    $line.= "$filter1 "."$filter2 ";
                    $sql = "SELECT * FROM k_na_sklade WHERE ".$line.") ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    $ourarrey = array();
                    if ($result){
                        while($row = mysqli_fetch_array($result))
                        {
                          $typekont = $_POST['type'];

                          if (preg_match("/$typekont/",$row[1])){
                             if ($flag_plo == 1) {
                                 $flatfrom=$_POST['flat'];
                                 if (preg_match("/$flatfrom/",$row[13])){
                                     array_push($contrarrey, $row);
                                 }
                                } else {
                                    array_push($contrarrey, $row);
                                }
                            }
                        }
                    }
                }
                if ($_POST['where'] == 2) {
                        $line = "(line = '".$_POST['line']."' ";
                        $line.= "$filter1 "."$filter2 "."$filter3 "."$filter4";
                        $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                        $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                        $ourarrey = array();
                        //array_push($contrarrey, 'TEST');
                            if ($result){
                                while($row = mysqli_fetch_array($result))
                                {
                                $typekont = $_POST['type'];
                                if (preg_match("/$typekont/",$row[1])){
                                    if ($flag_plo == 1) {
                                        $flatfrom=$_POST['flat'];
                                        if (preg_match("/$flatfrom/",$row[13])){
                                            array_push($contrarrey, $row);
                                        }
                                    } else {
                                        array_push($contrarrey, $row);
                                    }
                                }
                            }
                        }
                    }
                if ($_POST['where'] == 3) {
                        $line = "(line = '".$_POST['line']."' ";
                        $line.= "$filter1 "."$filter2 ";
                        $sql = "SELECT * FROM k_na_sklade WHERE ".$line.") ORDER BY order_num DESC";
                        $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                        $ourarrey = array();
                        if ($result){
                            while($row = mysqli_fetch_array($result))
                            {
                                $typekont = $_POST['type'];
                                if (preg_match("/$typekont/",$row[1])){
                                    if ($flag_plo == 1) {
                                        $flatfrom=$_POST['flat'];
                                        if (preg_match("/$flatfrom/",$row[13])){
                                            array_push($contrarrey, $row);
                                        }
                                    } else {
                                        array_push($contrarrey, $row);
                                    }
                                }
                            }
                        }
                       $line = "(line = '".$_POST['line']."' ";
                       $line.= "$filter1 "."$filter2 "."$filter3"."$filter4";
                       $sql = "SELECT * FROM k_vne_sklada WHERE ".$line.") ORDER BY order_num DESC";
                       $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                       $ourarrey = array();
                       if ($result){
                           while($row = mysqli_fetch_array($result))
                           {
                               $typekont = $_POST['type'];
                               if (preg_match("/$typekont/",$row[1])){
                                   if ($flag_plo == 1) {
                                       $flatfrom=$_POST['flat'];
                                       if (preg_match("/$flatfrom/",$row[13])){
                                           array_push($contrarrey, $row);
                                       }
                                    } else {
                                       array_push($contrarrey, $row);
                                    }
                                   }
                               }
                           }
                    }
            }

    $from_days= strtotime($_POST['date_from']);
    $to_days= strtotime($_POST['date_to']);


foreach($contrarrey as $key => $value)
{
//echo $value[3];
    if ($_POST['where'] == 1) {

        $days = strtotime($value[3]);
        if (($days >= $from_days) and ($days <= $to_days)) {

            array_push($containers, $value);
         }
    }
    if ($_POST['where'] ==  4) {
         $days = strtotime($value[3]);
         if (($days >= $from_days) and ($days <= $to_days)) {
             array_push($containers, $value);
         }
      }
      if ($_POST['where'] == 2) {
            $p_days = strtotime($value[3]);
            $u_days = strtotime($value[15]);
            //$p_days = $value[3];
            //$u_days = date($value[15]);
           $value[22] = $u_days;
          if (($u_days >= $from_days) and ($u_days <= $to_days)) {
               array_push($containers, $value);
           }
        }
        if ($_POST['where'] == 3) {
           if (($value[15] != '') and ($value[15] != 1) and ($value[15] != 0)) {
               $p_days = strtotime($value[3]);
               $u_days = strtotime($value[15]);
              $value[22] = $u_days;
              if ((($p_days >= $from_days) && ($p_days <= $to_days)) || (($u_days >= $from_days) && ($u_days <= $to_days))) {
                 array_push($containers, $value);
              }
           } else {
              $days = strtotime($value[3]);
            //  $days =  strtotime($today) - $days;
            //  $days = round($days / (60 * 60 * 24));

            //$days = $to_days;
              if (($days >= $from_days) && ($days <= $to_days)) {
                 array_push($containers, $value);
              }
           }
       }
   }

    $cont_count_45=0;
    $cont_count_40=0;
    $cont_count_20=0;
    $cont_ref_20=0;
    $cont_ref_40=0;
    $cont_ref_h=0;





    echo "<HTML>";
    echo "<HEAD><meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1251\">";
    echo "<link href=\"css/otchet.css\" rel=\"stylesheet\" type=\"text/css\"></HEAD>";
    echo "<BODY leftmargin=1 topmargin=1>";
    echo "
    <tr><td width=30%>
    <img src='img/logo.jpg'>
    <td valign=top><center><h2>$wd[124]:<font color=#AA0000><h3>".$_POST['line']."</font>
    <h5>$wd[125] <u>".$_POST['date_from']."</u> $wd[95] <u>".$_POST['date_to']."</u>
    </table>
    ";
    echo "<hr width=100% noshade>";
    echo "<table width=100% border=0 leftmargin=0 topmargin=0 cellspacing=0><tr>";

    if ($_POST['f_num'] == 1) { echo "<td align=center width=120px>$wd[126]"; };
    if ($_POST['f_type'] == 1) { echo "<td align=center width=70px>$wd[127]"; };
    if ($_POST['f_line'] == 1) { echo "<td align=center>$wd[128]"; };
    if ($_POST['f_date_in'] == 1) { echo "<td align=center>$wd[129]"; };
    if ($_POST['f_date_out'] == 1) { echo "<td align=center>$wd[130]"; };
    if ($_POST['f_exp_in'] == 1) { echo "<td align=center>$wd[131]"; };
    if ($_POST['f_exp_out'] == 1) { echo "<td align=center>$wd[132]"; };
    if ($_POST['f_per_in'] == 1) { echo "<td align=center>$wd[133]"; };
    if ($_POST['f_per_out'] == 1) { echo "<td align=center>$wd[134]"; };
    if ($_POST['f_car_in'] == 1) { echo "<td align=center>$wd[135]"; };
    if ($_POST['f_car_out'] == 1) { echo "<td align=center>$wd[136]"; };
    if ($_POST['f_dri_in'] == 1) { echo "<td align=center>$wd[137]" ;};
    if ($_POST['f_dri_out'] == 1) { echo "<td align=center>$wd[138]" ;};
    if ($_POST['f_soprov'] == 1) { echo "<td align=center>$wd[72]"; };
    if ($_POST['f_order'] == 1) { echo "<td align=center>$wd[104]"; };
    if ($_POST['f_prostoy'] == 1) { echo "<td align=center>$wd[105]"; };
    if ($_POST['f_payload'] == 1) { echo "<td align=center>$wd[75]"; };
    if ($_POST['f_ploshadka'] == 1) { echo "<td align=center>$wd[57]"; };
    if ($_POST['f_hran'] == 1) { echo "<td align=center>$wd[106]"; };
    if ($_POST['f_prr'] == 1) { echo "<td align=center>$wd[139]"; };
    if ($_POST['f_info'] == 1) { echo "<td align=center>$wd[107]"; };
    if ($_POST['f_cena'] == 1) { echo "<td align=center>$wd[108]"; };
    if ($_POST['f_total_cena'] == 1) { echo "<td align=center>$wd[109]"; };
    echo "<tr><td colspan=100><hr width=100% noshade>";

echo "<br><br>";
if ($_POST['where'] == 2 or $_POST['where'] == 3) {
 // @containers = sort {$a->[22] <=> $b->[22]} @containers;
 //print_r($containers[22]);

}
//print_r($contrarrey[0]);

// point
foreach($containers as $key => $row)
{
    $delta=30;

if ($row[2] == "P&O") {
   $delta=60;
}
if ($row[2] == "UnMGr") {
   $delta=60;
}
if ($row[2] == "EVERGREEN") {
   $delta=60;
}
if ($row[2] == "CMA CGM") {
   $delta=0;
}

$sql = "SELECT * FROM line WHERE linename = '$row[2]'";
$result = mysqli_query($link, $sql) or die("Ошибка " . $mysqlerr=mysqli_error($link));
$ourarrey = array();
if ($result){
    if ($roww = mysqli_fetch_array($result))
    {
        $prr = $roww[1] ;
    }
}


   if (($row[15] != '') and ($row[15] != 1) and ($row[15] != 0)) {
       $f_days = strtotime($row[3]);
       $t_days = strtotime($row[15]);
       $datediff =  $t_days - $f_days;
       $days = round($datediff / (60 * 60 * 24));
       $days+=1;

       $linessql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
       $sql = "SELECT * FROM line_price WHERE ".$linessql.")";
       $result = mysqli_query($link, $sql) or die("Ошибка " . $mysqlerr=mysqli_error($link));
       $ourarrey = array();
       if ($result){
           if ($roww = mysqli_fetch_array($result)) {
               $prostoy=$roww[2];
               $days-=$roww[2];
               if ($days < 0) { $days = 0; }
               if ($days > $delta)
               {
               $mdays = $days - $delta;
               $cost = ($mdays * $roww[4]) + ($delta * $roww[3]);
               } else {
                    $cost = $days * $roww[3];
               }
           }
       }
   }
    echo "<tr>";
    if ($_POST['f_num'] == 1) {
    if ($row[15] != '') { echo "<td align=center>$row[0]" ;}
    else { echo "<td align=center bgcolor=eeeeee>$row[0]"  ;}
    }
    if ($_POST['f_type'] == 1) { echo "<td align=center>$row[1]"; }
    if ($_POST['f_line'] == 1) { echo "<td align=center>$row[2]"; }
    if ($_POST['f_date_in'] == 1) { echo "<td align=center>$row[3]"; }
    if ($_POST['f_date_out'] == 1) {
        if ($row[15] != '') { echo "<td align=center>$row[15]"; }
        else { echo "<td align=center>".$today ; }
    }
    if ($_POST['f_exp_in'] == 1) { echo "<td align=center>$row[7]"; }
    if ($_POST['f_exp_out'] == 1) { echo "<td align=center>$row[19]"; }
    if ($_POST['f_per_in'] == 1) { echo "<td align=center>$row[8]"; }
    if ($_POST['f_per_out'] == 1) { echo "<td align=center>$row[20]"; }
    if ($_POST['f_car_in'] == 1) { echo "<td align=center>$row[4]"; }
    if ($_POST['f_car_out'] == 1) { echo "<td align=center>$row[17]"; }
    if ($_POST['f_dri_in'] == 1) { echo "<td align=center>$row[5]"; }
    if ($_POST['f_dri_out'] == 1) { echo "<td align=center>$row[18]"; }
    if ($_POST['f_soprov'] == 1) { echo "<td align=center>$row[6]"; }
    if ($_POST['f_order'] == 1) { echo "<td align=center>$row[16]"; }
    if ($_POST['f_prostoy'] == 1) { echo "<td align=center>".$prostoy ;}
    if ($_POST['f_payload'] == 1) { echo "<td align=center>$row[12]"; }
    if ($_POST['f_ploshadka'] == 1) { echo "<td align=center>$row[13]"; }
    if ($_POST['f_hran'] == 1) {
    if ($row[15] != '') { echo "<td align=center>".$days." дн."; }
    else {
        $f_days = strtotime($row[3]);
        $t_days = strtotime($todaypom);
        $datediff =  $t_days - $f_days;
        $days = round($datediff / (60 * 60 * 24));
        $days+=1;

        $linessql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
        $sql = "SELECT * FROM line_price WHERE ".$linessql.")";
        $result = mysqli_query($link, $sql) or die("Ошибка " . $mysqlerr=mysqli_error($link));
        $ourarrey = array();
        if ($result){
            if ($roww = mysqli_fetch_array($result)) {
                $prostoy=$roww[2];
                $days-=$roww[2];
                if ($days<0) { $days=0; }
            }
            echo "<td align=center>".$days." дн.";
        }
    }
}
//POINT
if ($_POST['f_prr'] == 1) {
if ($row[15] != '') {

  if ($row[2] == "MAERSK") {
    if (preg_match("/20/",$row[1])){
        echo "<td align=center>22";
     } else {
         echo "<td align=center>25";
     }
} else if ($row[2] == "Cosco") {
    if (preg_match("/20/",$row[1])){
        echo "<td align=center>20";
    } else {
        echo "<td align=center>23";
    }
} else if ($row[2] == "MISC") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>29";
  } else {
      echo "<td align=center>32";
  }
} else if ($row[2] == "NEO SHIPPING") {
   if (preg_match("/20/",$row[1])){
       echo "<td align=center>25";
   } else {
       echo "<td align=center>27";
   }
} else if ($row[2] == "MARUBA") {
   if (preg_match("/20/",$row[1])){
       echo "<td align=center>21";
    } else {
        echo "<td align=center>23";
    }
} else if ($row[2] == "ЛСА") {
   if (preg_match("/20/",$row[1])){
       echo "<td align=center>25";
  } else {
      echo "<td align=center>27";
  }
} else if ($row[2] == "SOC") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>25";
  } else {
      echo "<td align=center>27";
  }
} else if ($row[2] == "CCLL") {
 if (preg_match("/20/",$row[1])){
     echo "<td align=center>25";
 } else {
     echo "<td align=center>27";
 }
} else if ($row[2] == "SCI") {
   if (preg_match("/20/",$row[1])){
      echo "<td align=center>25";
    } else {
        echo "<td align=center>27";
    }
} else if  ($row[2] == "BCL") {
  if (preg_match("/20/",$row[1])){
        echo "<td align=center>23";
    } else {
        echo "<td align=center>25";
    }
} else if ($row[2] == "NIPPON YUSEN KAISHA LINE") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>24";
  } else {
      echo "<td align=center>24";
  }
} else if ($row[2] == "BULCON") {
    if (preg_match("/20/",$row[1])){
      echo "<td align=center>21";
  } else {
      echo "<td align=center>23";
  }
//point
} else if ($row[2] == "CHINA SHIPPING CONTAINER LINE") {
    if (preg_match("/20/",$row[1])){
        echo "<td align=center>20";
    }  else {
        echo "<td align=center>23";
    }
} else if ($row[2] == "UASC") {
    if (preg_match("/20/",$row[1])){
      echo "<td align=center>21";
  } else {
      echo "<td align=center>23";
  }
} else if ($row[2] == "ADMIRAL") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>24";
    } else {
        echo "<td align=center>24";
    }
} else if ($row[2] == "YANG MING") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>20";
    } else {
        echo "<td align=center>20";
    }
} else if ($row[2] == "MCL") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>21";
    } else {
        echo "<td align=center>23";
    }
} else if ($row[2] == "ARKAS") {
    if (preg_match("/20/",$row[1])){
      echo "<td align=center>24";
    } else {
        echo "<td align=center>28";
    }

} else if ($row[2] == "OOCL") {
    if (preg_match("/20/",$row[1])){
      echo "<td align=center>21";
    } else {
        echo "<td align=center>23";
    }
} else if ($row[2] == "SOC") {
    if (preg_match("/20/",$row[1])){
      echo "<td align=center>18";
    } else {
        echo "<td align=center>20";
    }
} else if ($row[2] == "LCL") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>25";
    } else {
        echo "<td align=center>27";
    }
} else if ($row[2] == "MOL") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>25";
    } else {
        echo "<td align=center>27";
    }
} else if ($row[2] == "WHL") {
  if (preg_match("/20/",$row[1])){
      echo "<td align=center>21";
    } else {
        echo "<td align=center>23";
    }

} else if ($row[2] == "K LINE") {
  if (preg_match("/20/",$row[1])){
  echo "<td align=center>25"; }
  else { echo "<td align=center>27"; }

} else if ($row[2] == "HAPAG LLOYD") {
  if (preg_match("/20/",$row[1])){
  echo "<td align=center>25"; }
  else { echo "<td align=center>27"; }

} else if ($row[2] == "EVERGREEN") {
  if (preg_match("/20/",$row[1])){
  echo "<td align=center>22"; }
  else { echo "<td align=center>25"; }

} else if ($row[2] == "SARJAK") {
  if (preg_match("/20/",$row[1])){
  echo "<td align=center>24"; }
  else { echo "<td align=center>28"; }

} else if ($row[2] == "PIL") {
    if (preg_match("/20/",$row[1])){
  echo "<td align=center>24"; }
  else { echo "<td align=center>30"; }
} else { echo "<td align=center>$prr"; }
} else { echo "<td align=center>0"; }
}
 if ($_POST['f_info'] == 1) { echo "<td align=center>$row[9]"; }
//point
if ($_POST['f_cena'] == 1) {

   echo "<td align=center>";
   if ($row[15] == '') {
       $linenameforsql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
       $sql = "SELECT * FROM line_price WHERE ".$linenameforsql.")";
       $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
       $ourarrey = array();
       $f_days = strtotime($row[3]);
       $t_days = strtotime($todaypom);
       $datediff =  $t_days - $f_days;
       $days = round($datediff / (60 * 60 * 24));
       $days+=1;
           if ($result){
               while ($roww = mysqli_fetch_array($result)){
                   $days-=$roww[2];
                   if ($days < 0) {
                      $days = 0;
                   }
                   if ($days > $delta) {
                      $mdays = $days - $delta;
                      $cost = ($mdays * $roww[4]) + ($delta * $roww[3]);
                   } else {
                      $cost = $days * $roww[3];
                  }

               }
           } echo $cost;
       } else {
           $linenameforsql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
           $sql = "SELECT * FROM line_price WHERE ".$linenameforsql.")";
           $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
           $ourarrey = array();
           $f_days = strtotime($row[3]);
           $t_days = strtotime($row[15]);
           $datediff =  $t_days - $f_days;
           $days = round($datediff / (60 * 60 * 24));
           $days+=1;
           if ($result){
               while ($roww = mysqli_fetch_array($result)){
                   $days-=$roww[2];
                   if ($days < 0) {
                      $days = 0;
                   }
                   if ($days > $delta) {
                      $mdays = $days - $delta;
                      $cost = ($mdays * $roww[4]) + ($delta * $roww[3]);
                   }
                   else {
                      $cost = $days * $roww[3];
                   }

               }

           } echo $cost;
       }
    }

if ($_POST['f_total_cena'] == 1) {
   echo "<td align=center>";

   if ($row[15] == '') {
       $linenameforsql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
       $sql = "SELECT * FROM line_price WHERE ".$linenameforsql.")";
       $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
       $f_days = strtotime($row[3]);
       $t_days = strtotime($todaypom);
       $datediff =  $t_days - $f_days;
       $days = round($datediff / (60 * 60 * 24));
       $days+=1;
       if ($result){
           if ($roww = mysqli_fetch_array($result)){
             $days-=$roww[2];
             if ($days < 0) {
                $days = 0;
             }
             if ($days > $delta) {
                $mdays = $days - $delta;
                $cost = ($mdays * $roww[4]) + ($delta * $roww[3]);
             } else {
                $cost = $days * $roww[3];
             }
             echo $cost;
             $grand+=$cost;
             $total_hr+=$cost;
           }
       }
   }

       if ($row[15] != '') {
           $linenameforsql = "(linename = '$row[2]' AND cont_type = '$row[1]'";
           $sql = "SELECT * FROM line_price WHERE ".$linenameforsql.")";
           $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
           $f_days = strtotime($row[3]);
           $t_days = strtotime($row[15]);
           $datediff =  $t_days - $f_days;
           $days = round($datediff / (60 * 60 * 24));
           $days+=1;
           if ($result){
               while ($roww = mysqli_fetch_array($result)){
                   $days-=$roww[2];
                   if ($days < 0) {
                      $days = 0;
                   }
                   if ($days > $delta) {
                      $mdays = $days - $delta;
                      $cost = ($mdays * $roww[4]) + ($delta * $roww[3]);
                      $total_hr+=$cost;
                   } else {
                      $cost = $days * $roww[3];
                      $total_hr+=$cost;
                   }
               }
          }
               $sql = "SELECT * FROM line WHERE linename = '$row[2]'";
               $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
               if ($result){
                   while ($rox = mysqli_fetch_array($result)){
                       if ($row[2] == "MAERSK") {
                           if (preg_match("/20/",$row[1])){
                               $total_prr = $total_prr+22;
                               $cost = $cost+22;
                           } else {
                               $total_prr = $total_prr+25;
                               $cost = $cost+25;
                           }
                       }
                       if (($row[2] == "ARKAS") or ($row[2] == "BCL")) {
                           if (preg_match("/20/",$row[1])){
                           	$total_prr = $total_prr+24;
                           	$cost = $cost+24;
                           } else {
                           	$total_prr = $total_prr+28;
                           	$cost = $cost+28;
                           }
                       }
                       if (($row[2] == "HAPAG LLOYD") or ($row[2] == "K LINE")) {
                           if (preg_match("/20/",$row[1])){
                               $total_prr = $total_prr+25;
                               $cost = $cost+25;
                           } else {
                               $total_prr = $total_prr+27;
                               $cost = $cost+27;
                           }
                       }
                       if (($row[2] == "WHL")) {
                           if (preg_match("/20/",$row[1])){
                               $total_prr = $total_prr+21;
                               $cost = $cost+21;
                           } else {
                               $total_prr = $total_prr+23;
                               $cost = $cost+23;
                           }
                       }
                       if (($row[2] == "EVERGREEN")) {
                           if (preg_match("/20/",$row[1])){
                               $total_prr = $total_prr+22;
                               $cost = $cost+22;
                           } else {
                               $total_prr = $total_prr+25;
                               $cost = $cost+25;
                           }
                       }
                       if (($row[2] == "SARJAK")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+24;
                               	$cost = $cost+24;
                           } else {
                               	$total_prr = $total_prr+28;
                               	$cost = $cost+28;
                           }
                       }
                       if (($row[2] == "PIL")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+24;
                               	$cost = $cost+24;
                           } else {
                               	$total_prr = $total_prr+30;
                               	$cost = $cost+30;
                           }
                       }
                       if (($row[2] == "LCL") or ($row[2] == "CCLL") or ($row[2] == "SCI") or ($row[2] == "MOL") or ($row[2] == "ЛСА") or ($row[2] == "SOC") or ($row[2] == "NEO SHIPPING")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+25;
                               	$cost = $cost+25;
                           } else {
                               	$total_prr = $total_prr+27;
                               	$cost = $cost+27;
                           }
                       }
                       if (($row[2] == "NIPPON YUSEN KAISHA LINE") or ($row[2] == "ADMIRAL")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+24;
                               	$cost = $cost+24;
                           } else {
                               	$total_prr = $total_prr+24;
                               	$cost = $cost+24;
                           }
                       }
                       if (($row[2] == "BULCON") or ($row[2] == "UASC") or ($row[2] == "MCL") or ($row[2] == "OOCL") or ($row[2] == "MARUBA")) {
                            if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+21;
                               	$cost = $cost+21;
                           } else {
                               	$total_prr = $total_prr+23;
                               	$cost = $cost+23;
                           }
                       }
                       if ($row[2] == "MISC") {
                          if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+29;
                               	$cost = $cost+29;
                           } else {
                               	$total_prr = $total_prr+32;
                               	$cost = $cost+32;
                           }
                       }
                       if (($row[2] == "CHINA SHIPPING CONTAINER LINE")) {
                            if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+20;
                               	$cost = $cost+20;
                           } else {
                               	$total_prr = $total_prr+23;
                               	$cost = $cost+23;
                           }
                       }
                       if (($row[2] == "Cosco")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+20;
                               	$cost = $cost+20;
                           } else {
                               	$total_prr = $total_prr+23;
                               	$cost = $cost+23;
                           }
                       }
                       if (($row[2] == "YANG MING")) {
                           if (preg_match("/20/",$row[1])){
                               	$total_prr = $total_prr+20;
                               	$cost = $cost+20;
                           } else {
                               	$total_prr = $total_prr+20;
                               	$cost = $cost+20;
                           }
                       }
                       if (($row[15] > 0) and (($row[2] == "MAERSK") and
                                               ($row[2] == "BCL") and
                                               ($row[2] == "SOC") and
                                               ($row[2] == "MCL") and
                                               ($row[2] == "OOCL") and
                                               ($row[2] == "ARKAS") and
                                               ($row[2] == "MISC") and
                                               ($row[2] == "CHINA SHIPPING CONTAINER LINE") and
                                               ($row[2] == "ADMIRAL") and
                                               ($row[2] == "UASC") and
                                               ($row[2] == "BULCON") and
                                               ($row[2] == "YANG MING") and
                                               ($row[2] == "HAPAG LLOYD") and
                                               ($row[2] == "NIPPON YUSEN KAISHA LINE") and
                                               ($row[2] == "ЛСА") and
                                               ($row[2] == "Cosco") and
                                               ($row[2] == "CCLL") and
                                               ($row[2] == "NEO SHIPPING") and
                                               ($row[2] == "MARUBA") and
                                               ($row[2] == "WHL") and
                                               ($row[2] == "SCI"))) {
                               $total_prr+=$rox[1];
                       	       $cost+=$rox[1];
                       }
                    echo $cost;
                    $grand+=$cost;
                   }

               }

       }
 }

           if (preg_match("/45/",$row[1])){$cont_count_45++;}
           if (preg_match("/40/",$row[1])){$cont_count_40++;}
           if (preg_match("/20/",$row[1])){$cont_count_20++;}

           if ((preg_match("/REF/",$row[1])) and (preg_match("/20/",$row[1]))){$cont_ref_20++;}
           if ((preg_match("/REF/",$row[1])) and (preg_match("/40/",$row[1]))){$cont_ref_40++;}
           if (preg_match("/HR/",$row[1])){$cont_ref_h++;}

           $cont_count++;




        }
        echo "
        </table><hr width=100%>
        <table width=100% border=0><tr><td width=35% align=center>$wd[140]: ".$cont_count." $wd[141]<td align=center>$wd[142]: ".$cont_count_40."<td align=center>$wd[143]: ".$cont_count_20."<td align=center>REF '20:".$cont_ref_20."<td align=center>REF '40:".$cont_ref_40."<td align=center>HREF :".$cont_ref_h."<td align=center>45: ".$cont_count_45
        ;
        if ($_POST['f_total_cena'] == 1) {
            echo "<td align=center>ПРР:".$total_prr." $wd[144]<td align=center>$wd[145]:".$total_hr ." у.е.<td align=center>Total:".$grand." у.е.";
        }
        echo "</table>
            <hr width=100%>
            ";


break;
case 'month' :
        //ЕСЛИ ОТОБРАЖАЕМ ТОЛЬКО НА ТЕРМИНАЛЕ
        $grand=0;
        $total_prr=0;
        $total_hr=0;
        $cont_count=0;
        $linename=$_POST['line'];
        $posttype = $_POST['type'];
        $postflat = $_POST['flat'];
        $flag_plo=0;
        if ($_POST['flat'] != 0) {
            $flag_plo=1;
        }
        if ($_POST['line'] == 1) {
            if ($_POST['where'] == 1) {
                if ($_POST['show_out'] == 1) {
                    $sql = "SELECT * FROM k_vne_sklada ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    if ($result){
                        while ($row = mysqli_fetch_array($result)){
                            if (preg_match("/$posttype/",$row[1])){
                                if ($flag_plo == 1) {
                                    if (preg_match("/$postflat/",$row[13])){
                                        array_push($cont, $row);
                                    }
                                } else {
                                    array_push($cont, $row);
                                }
                            }
                        }
                    }
                }
                $sql = "SELECT * FROM k_na_sklade ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
            if ($_POST['where'] == 2) {
                $sql = "SELECT * FROM k_vne_sklada ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
            if ($_POST['where'] == 3) {
                $sql = "SELECT * FROM k_na_sklade ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
                $sql = "SELECT * FROM k_vne_sklada ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
        } else {
            if ($_POST['where'] == 1) {
                if ($_POST['show_out'] == 1) {
                    $sql = "SELECT * FROM k_vne_sklada WHERE line = '".$POST['line']."' ORDER BY order_num DESC";
                    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                    if ($result){
                        while ($row = mysqli_fetch_array($result)){
                            if (preg_match("/$posttype/",$row[1])){
                                if ($flag_plo == 1) {
                                    if (preg_match("/$postflat/",$row[13])){
                                        array_push($cont, $row);
                                    }
                                } else {
                                    array_push($cont, $row);
                                }
                            }
                        }
                    }
                }
                $sql = "SELECT * FROM k_na_sklade WHERE line = '".$POST['line']."' ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
            if ($_POST['where'] == 2) {
                $sql = "SELECT * FROM k_vne_sklada WHERE line = '".$POST['line']."' ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
            if ($_POST['where'] == 3) {
                $sql = "SELECT * FROM k_na_sklade WHERE line = '".$POST['line']."' ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
                $sql = "SELECT * FROM k_vne_sklada WHERE line = '".$POST['line']."' ORDER BY order_num DESC";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
                if ($result){
                    while ($row = mysqli_fetch_array($result)){
                        if (preg_match("/$posttype/",$row[1])){
                            if ($flag_plo == 1) {
                                if (preg_match("/$postflat/",$row[13])){
                                    array_push($cont, $row);
                                }
                            } else {
                                array_push($cont, $row);
                            }
                        }
                    }
                }
            }
        }
        $from_days= strtotime($_POST['date_from']);
        $to_days= strtotime($_POST['date_to']);
        foreach($contrarrey as $key => $value)
        {
            if ($_POST['where'] == 1) {
                $days = strtotime($value[3]);
                if ($days < $to_days+1) {
                    array_push($containers, $value);
                 }
            }
            if ($_POST['where'] == 2) {
                $p_days = strtotime($value[3]);
                $u_days = strtotime($value[15]);
                if ((($u_days > $from_days-1) and ($u_days < $to_days+1))) {
                    array_push($containers, $value);
                }
              }
              if ($_POST['where'] == 3) {
                  if ($row[15] == '') {
                      $p_days = strtotime($value[3]);
                      $u_days = strtotime($value[15]);
                      if ((($p_days > $from_days-1) and ($p_days < $to_days+1)) or (($u_days > $from_days-1) and ($u_days < $to_days+1))) {
                          array_push($containers, $value);
                      }
                  } else {
                      $days = strtotime($value[3]);
                      if (($days > $from_days-1) and ($days < $to_days+1)) {

                      }
                  }
              }
        }



        break;
    }
 ?>
