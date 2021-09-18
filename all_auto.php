
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


?>
<h1>всі оператори ринку</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>Тип автотранспорту</span>
        <td><span>Скорочена назва</span>
        <td><span>Дії над документом</span>
    </tr>
    <?php
    $result = mysqli_query($link, "SELECT * FROM auto_tupe") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['auto_type']."</span>
                        <td><span>".$row['auto_type_shot']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='del_auto_tupe'></button></form>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
