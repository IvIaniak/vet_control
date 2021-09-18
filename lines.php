<?php
  echo "
    <HTML>
    <HEAD>
    <link href='css/chat.css' rel='stylesheet' type='text/css'>
    </HEAD>
    <form action='function.php' method='POST'>
    <TABLE BORDER=0 width=100%>
    <TR><TD colspan=2><font color='FF0000'><b><small><font color='FF0000'>".$_SESSION['msg']."
    <TR><TD colspan=2><center>$wd[38]
    <TR><TD valign=top>
    <table width=100% border=0>
    <tr><td><center>$wd[31]<td><center>$wd[39]<td>$wd[40]
  ";
  $sql = "SELECT * FROM line";
  $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
  if($result)
      {
          while($row = mysqli_fetch_array($result)){
              echo "<tr><td><center>$row[0]<td><center>";
              $sql1 = "SELECT * FROM line_price WHERE linename='".$row[0]."'";
              $result1 = mysqli_query($link, $sql1) or die("Ошибка " . mysqli_error($link));
              if($result1)
                  {
                      while($roww = mysqli_fetch_array($result1)){
                        if ($roww[5] != '') {
                          echo "<span style='color:ff0000'>|</span> $roww[1]: $roww[5] ";
                        }

                      }
                echo "<span style='color:ff0000'>|</span>";
              }
              echo "<td><select name=\"gg\">";
              $sql1 = "SELECT * FROM line_price WHERE linename='".$row[0]."'";
              $result1 = mysqli_query($link, $sql1) or die("Ошибка " . mysqli_error($link));
              if($result1)
                  {
                      while($roww = mysqli_fetch_array($result1)){
                        $freetime = $roww[2]+1;
                        echo "<option>$roww[1]: $wd[41]($roww[2]$wd[44]): $roww[3]$ $wd[42]($freetime $wd[44]): $roww[4]$ </option>";

                      }
                      echo "</select>";
                  }
          }
      }
      echo "
      </table>
      <TR><TD valign=top>
      <TABLE BORDER=1 width=100%>
      <tr><td width=50% valign=top>
      <TABLE BORDER=0 width=100%>
      <TR><TD>$wd[31]<td><input type='text' name='name' size='20'><br>
      <TR><TD>$wd[45]:<td>
      <select name='type'>
    ";
    $sql = "SELECT * FROM kont_type";
    $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<option value=\"$row[1]-$row[0]\">$row[1]'$row[0]</option>";
            }
          }
  echo "
      </select><br>
      <TR><TD>$wd[39]:<td><input type='text' name='prr' maxlength='10' size='20'><br>
      <tr><td colspan=2><center>
      <input type='submit' name='add_line' value='$wd[22]'>
      <input type='submit' name='rem_line' value='$wd[23]'>
      <input type='submit' name='edt_line' value='$wd[24]'>
      <input type='hidden' name='login' value='".$_SESSION['login']."'>
      <input type='hidden' name='id' value='".$_SESSION['id']."'>
      <input type='hidden' name='lang' value='".$_SESSION['lang']."'>
      </form>
      </table>
      <td valign=top>

      <table width=100% border=0>

      <form action='function.php' method='POST'>
      <tr><td>$wd[20]<td>
      <select name='name'>
      ";
      $sql = "SELECT * FROM line";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if($result)
          {
              while($row = mysqli_fetch_array($result)){
                  echo "<option value=\"$row[0]\">$row[0]</option>";
              }
            }
      echo "
        </select><br>

        <TR><TD>$wd[45]:<td>
        <select name='type'>
      ";
      $sql = "SELECT * FROM kont_type";
      $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
      if($result)
          {
              while($row = mysqli_fetch_array($result)){
                  echo "<option value=\"$row[1]-$row[0]\">$row[1]'$row[0]</option>";
              }
            }
    echo "
        </select><br>

        <TR><TD>$wd[43]:<td><input type='text' name='prostoy' maxlength='30' size='20'><br>
        <TR><TD>$wd[41]:<td><input type='text' name='cost_do' maxlength='30' size='20'><br>
        <TR><TD>$wd[42]:<td><input type='text' name='cost_po' maxlength='30' size='20'><br>

        <tr><td colspan=2><center>
        <input type='submit' name='add_line_price' value='$wd[46]'>
        </table>

        </table>
        <input type='hidden' name='login' value='".$_SESSION['login']."'>
        <input type='hidden' name='id' value='".$_SESSION['id']."'>
        <input type='hidden' name='lang' value='".$_SESSION['lang']."'>
        <tr><td><center><input type='button' name='back' value='$wd[25]' onclick=\"location='menu.php?action=menu&id=".$_SESSION['id']."&login=".$_SESSION['name']."&lang=".$_SESSION['lang']."'\">
        </table>

        </HTML>

    ";


 ?>
