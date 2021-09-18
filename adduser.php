
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();



?>
<h1>додати користувача</h1>
  <form action='function.php' method='POST'>
    <input type='text' id="inport1" name='nikname' size='30'  value='' placeholder="логін" required ><label for="#inport1">введіть логін користувача</label> <br>
    <input type='text' id="inport2" name='fname' size='30'  value=''  placeholder="введіть прізвище" required ><label for="#inport2">введіть прізвище</label><br>
    <input type='text' id="inport3" name='lname' size='30'  value='' placeholder="введіть ім'я" required ><label for="#inport3">введіть ім'я</label><br>
    <input type='text' id="inport4" name='sname' size='30'  value='' placeholder="введіть ім'я по батькові" required ><label for="#inport4">введіть ім'я по батькові</label><br>
    <input type='password' id="inport5" name='password' size='30'  value='' placeholder="введіть пароль" required ><label for="#inport5">введіть пароль</label><br>
    <select  name='level' >
        <option selected disabled>Оберіть рівень доступу</option>
        <option value="10"><span>адмін</span></option>
        <option value="20">інспектор</option>
        <option value="30">відповідальний в зоні</option>
        <option value="40">---</option>
        <option value="50">---</option>
    </select><br>
    <select  name='status' >
        <option selected disabled>Оберіть статус користувача</option>
        <option value="active"><span>робочий</span></option>
        <option value="vacation">відпустку</option>
        <option value="liberated">звільнений</option>
    </select><br>
    <select  name='punkt' >
        <option selected disabled>Оберіть зону обслуговування</option>
        <?php

        $result = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
        if($result)
            {
                while($row = mysqli_fetch_array($result)){
                    $order_id = $row['value'];
                    $order_id++;
                    echo "<option value='".$row['numberzone']."'><span>".$row['namezone']." №".$row['numberzone']."</span></option>";
                }
            }
        ?>
    </select><br>
    <input type='submit' class="button green" name='adduser' value='Додати'>
  </form>
