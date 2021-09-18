<?php
  echo "
    <HTML>
    <HEAD>
    <link href='css/chat.css' rel='stylesheet' type='text/css'>
    </HEAD>
    <form action='function.php' method='POST'>
    <TABLE BORDER=0 width=100%>
    <TR><TD colspan=2><font color='FF0000'><b><small>".$_SESSION['msg']."
    <TR><TD colspan=2><center>$wd[34]
    <TR><TD valign=top>
    <TABLE BORDER=0 width=75%>
    <TR><TD>$wd[31]<td><input type='text' name='name' maxlength='30' size='20'><br>
    <TR><TD>$wd[32]<td><input type='text' name='tel' size='20'><br>
    <TR><TD>$wd[33]<td><input type='text' name='cont' size='20'>
    <tr><td colspan=2><center>
    <input type='submit' name='add_per_type' value='$wd[22]'>
    <input type='submit' name='rem_per_type' value='$wd[23]'>
    <input type='submit' name='edt_per_type' value='$wd[24]'>
    <input type='hidden' name='login' value='".$_SESSION['login']."'>
    <input type='hidden' name='id' value='".$_SESSION['id']."'>
    <input type='hidden' name='lang' value='".$_SESSION['lang']."'>
    <input type='button' name='back' value='$wd[25]' onclick=\"location='menu.php?action=menu&id=".$_SESSION['id']."&login=".$_SESSION['name']."&lang=".$_SESSION['lang']."'\">
    </table>
    <TD width=50%>
    <table width=100% border=1>
    <tr><td><center>$wd[31]<td><center>$wd[32]<td><center>$wd[33]
  ";
  $sql = "SELECT * FROM perevoz ORDER BY name";
  $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
  if($result)
      {
          while($row = mysqli_fetch_array($result)){
              echo "<tr><td><center>$row[0]<td><center>$row[1]<td><center>$row[2]";
          }
      }

  echo "
  </table>
  </form>
  </HTML>
  ";


 ?>
