
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>всі лічильники по зонам</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>Зона</span>
        <td><span>Кількість документів Імпорт</span>
        <td><span>Кількість документів Експорт</span>
        <td><span>Кількість документів Транзит</span>
        <td><span>Кількість документів внутрідержавне перевезення</span>
        <td><span>Дата лічильника</span>
        <td><span>Дії над лічильником</span>
    </tr>
    
    <?php
    $result = mysqli_query($link, "SELECT * FROM ount_jurnals ORDER BY id  DESC") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['zona']."</span>
                        <td><span>".$row['import']."</span>
                        <td><span>".$row['export']."</span>
                        <td><span>".$row['tranzit']."</span>
                        <td><span>".$row['vnutrper']."</span>
                        <td><span>".$row['data_dey_jurnals']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='del_count_zone'></button></form>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
