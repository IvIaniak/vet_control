<?php

  echo "
      <HTML>
      <HEAD>
      <link href='css/chat.css' rel='stylesheet' type='text/css'>
      </HEAD>
      <form action='function.pl' method='POST'>
      <TABLE BORDER=0 width=100%>
      <TR><TD colspan=2><font color='FF0000'><b><small>".$_SESSION['msg']."
      <TR><TD colspan=2><center>$wd[26]
      <TR><TD align=center>
      <input type='hidden' name='login' value=".$_SESSION['name']."'>
      <input type='hidden' name='id' value=".$_SESSION['id'].">
      <input type='hidden' name='lang' value=".$_SESSION['lang'].">
      <input type='button' name='back' value='$wd[25]' onclick=\"location='menu.php?action=menu&id=".$_SESSION['id']."&login=".$_SESSION['name']."&lang=".$_SESSION['lang']."'\">
      <table width=100% border=1>
      <tr><td width=100><center>$wd[27]<td width=150><center>$wd[28]<td><center>$wd[29]
  ";
//mysql_set_charset('cp1251_general_ci',$link);


  $sql = "SELECT * FROM logs ORDER BY time  DESC  LIMIT 150";

  $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
//$result = $link->query($sql);

  if($result)
      {
          while($row = mysqli_fetch_array($result)){

              echo "<tr><td>$row[0]<td>$row[1]<td> $row[2]";

          }
      }




       $result->close();

       $conn->close();



  echo "
    </table>
    </form>
    </HTML>
  ";
 ?>
