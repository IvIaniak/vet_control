
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

?>
<h1>Задати лічильники журналов на пунктах</h1>
  <form action='function.php' method='POST'>
    <select  name='zona' id="portzona" required>
    <option selected  value='99'>Оберіть зону обслуговування</option>
    <?php
    $result1 = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
    if($result1)
        {
            while($row1 = mysqli_fetch_array($result1)){
                echo "<option value='".$row1['numberzone']."'><span>".$row1['namezone']." №".$row1['numberzone']."</span></option>";
            }
        }?>
    </select><label for="#portzona">введіть Порт (зона обслуговування)</label><br>
    <input type='date' id="data_count" name='data_dey_jurnals' size='30'  value='<?php echo date("Y-m-d"); ?>' placeholder="<?php echo date("Y.m.d"); ?>" required ><label for="#data_count">Дата лічильников журналов на пунктах</label><br>

    <input type='number' id='import' value='0'  name='import' placeholder='№1' size='30' required><label for='#import'>Стартовий № лічильника Імпорт</label><br>
    <input type='number' id='export' value='0'  name='export' placeholder='№1' size='30' required><label for='#export'>Стартовий № лічильника Експорт</label><br>
    <input type='number' id='tranzit' value='0'  name='tranzit' placeholder='№1' size='30' required><label for='#tranzit'>Стартовий № лічильника Транзит</label><br>
    <input type='number' id='vnutrper' value='0'  name='vnutrper' placeholder='№1' size='30' required><label for='#vnutrper'>Стартовий № лічильника Внутрішньодержавне перевезення</label><br>




    <input type='submit' class="button green" name='add_count_zone' value='Додати'>


  </form>
