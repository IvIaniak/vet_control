
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>всі користувачі</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>Дата створення корисиувача</span>
        <td><span>Логін</span>
        <td><span>П.І.Б.</span>
        <td><span>Рівень доступу</span>
        <td><span>Статус</span>
        <td><span>Зона обслуговування</span>
        <td><span>дії над записом</span>
    </tr>
    <?php
    $result = mysqli_query($link, "SELECT * FROM account") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['date']."</span>
                        <td><span>".$row['nikname']."</span>
                        <td><span>".$row['fname']." ".$row['lname']." ".$row['sname']."</span>
                        <td><span>".$row['level']."</span>
                        <td><span>".$row['status']."</span>
                        <td><span>".$row['punkt']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='deluser'></button></form><span class='fa fa-edit arreysettings edit_user' data-user='".$row['id']."'></span>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
