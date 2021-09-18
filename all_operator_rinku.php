
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>всі оператори ринку</h1>
<TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
    <tr>
        <td><span>ID</span>
        <td><span>ЕДРПО</span>
        <td><span>ОРГАНІЗАЦІЙНО-ПРАВОВУ форма</span>
        <td><span>повна назва оператора ринку</span>
        <td><span>скорочена назва оператора ринку</span>
        <td><span>Країна;Область;Район;Місто; вулицю; № будинка</span>
        <td><span>Email</span>
        <td><span>Телефон :</span>
        <td><span>Дата сторення</span>
        <td><span>Користувач</span>
        <td><span>Дії над документом</span>
    </tr>
    <?php
    $result = mysqli_query($link, "SELECT * FROM operator_rinku") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                        <td><span>".$row['id']."</span>
                        <td><span>".$row['edrpo']."</span>
                        <td><span>".$row['pravova_forma']."</span>
                        <td><span>".$row['fullname']."</span>
                        <td><span>".$row['shotname']."</span>
                        <td><span>".$row['cuntry']."\n,Область:".$row['oblast'].",\n Район:".$row['rayon'].",\n ".$row['city'].",\n ".$row['strids'].", ".$row['home_number']."</span>
                        <td><span>".$row['email']."</span>
                        <td><span>".$row['phone']."</span>
                        <td><span>".$row['date']."</span>
                        <td><span>".$row['name_user_into']."</span>
                        <td><form action='function.php' method='POST'>
                        <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                        <button class='fa fa-trash arreysettings' type='submit' name='deloperatorrinku'></button></form><span class='fa fa-edit arreysettings edit_operator_rinku' data-user='".$row['id']."'></span>
                        </td>
                    </tr>";
            }
        }  ?>
</table>
