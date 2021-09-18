
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>всі оператори ринку</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>№_документу</span>
        <td><span>Дата_документу</span>
        <td><span>Країна</span>
        <td><span>Регіон</span>
        <td><span>Захворювання</span>
        <td><span>Предмет_заборони</span>
        <td><span>№_УКТЗЕД</span>
        <td><span>Дата_запису</span>
        <td><span>Користувач</span>
    </tr>
    <?php
    $result = mysqli_query($link, "SELECT * FROM zaborony") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['nomber_dok']."</span>
                        <td><span>".$row['data_dok']."</span>
                        <td><span>".$row['cuntry_dok']."</span>
                        <td><span>".$row['region_dok']."</span>
                        <td><span>".$row['zabolevanie_daok']."</span>
                        <td><span>".$row['items_zaborony_dok']."</span>
                        <td><span>".$row['uktz']."</span>
                        <td><span>".$row['date']."</span>
                        <td><span>".$row['uzer']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='delzaborony'></button></form><span class='fa fa-edit arreysettings edit_zaborony' data-user='".$row['id']."'></span>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
