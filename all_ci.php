
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>всі оператори ринку</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>Одиниці виміру</span>
        <td><span>Скорочена назва одиниці виміру</span>
        <td><span>Відношення до 1000кг</span>
        <td><span>Дії над документом</span>
    </tr>
    <?php
    $result = mysqli_query($link, "SELECT * FROM ci") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['name_ci']."</span>
                        <td><span>".$row['shot_name_ci']."</span>
                        <td><span>".$row['otnosheniek1000kg']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='del_ci'></button></form>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
