<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();
echo "

<HTML>
<HEAD>
<link href='css/chat.css' rel='stylesheet' type='text/css'>
</HEAD>
<form action='function.php' method='POST'>
<TABLE BORDER=0 width=100%>
<TR><TD colspan=2><font color='FF0000'><b><small>".$_SESSION['msg']."
<TR><TD colspan=2><center>$wd[18]
<TR><TD valign=top>
<TABLE BORDER=0 width=350>
<TR><TD>$wd[2]<td><input type='text' name='name' maxlength='30' size='20'><br>
<TR><TD>$wd[3]<td><input type='password' name='pass' maxlength='20' size='20'><br>
<TR><TD>$wd[19]<td><input type='text' name='plevel' maxlength='1' size='20'>
<TR><TD>$wd[20]<td>
<select name='line'>
<option value=''>$wd[21]</option>
";
$sql = "SELECT * FROM line ORDER BY linename";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
if($result)
    {
        while($row = mysqli_fetch_array($result)){
            echo "<option value=\"$row[0]\">$row[0]</option>";
        }
    }
echo "
</select><br>
<tr><td colspan=2><center>
<input type='submit' name='add_user' value='$wd[22]'>
<input type='submit' name='rem_user' value='$wd[23]'>
<input type='submit' name='edt_user' value='$wd[24]'>
<input type='hidden' name='login' value=".$_SESSION['login']."'>
<input type='hidden' name='id' value=".$_SESSION['id']."'>
<input type='hidden' name='lang' value=".$_SESSION['lang']."'>
<input type='button' name='back' value='$wd[25]' onclick=\"location='menu.php?action=menu&id=".$_SESSION['id']."&login=".$_SESSION['name']."&lang=".$_SESSION['lang']."'\">
</table>
<TD width=600>
<table width=100% border=1>
<tr><td><center>$wd[2]<td><center>$wd[3]<td><center>$wd[19]<td><center>$wd[20]
";
$sql = "SELECT * FROM account";
$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
if($result)
    {
        while($row = mysqli_fetch_array($result)){
          if ($row[2] >= $_SESSION['plevel']) {
            echo "<tr><td><center>$row[0]<td><center>$row[1]<td><center>$row[2]<td><center>$row[4]";
          }
        }
    }
echo "
</table>
</form>
</HTML>
";

 ?>
