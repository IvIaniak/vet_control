<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


if(isset($_POST['counttr'])){
        $opp = 'add_auto';
        $counttranspotr = $_POST['counttr'];
  //$counttranspotr = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['objektkontrolbagajax']))));
}



switch ($opp)
{
  case 'add_auto' :
  ?>
  <select  name='auto_tupe<?php echo $counttranspotr;?>' Class='shot'>
      <option selected value=''>авто №<?php echo $counttranspotr;?></option>
      <?php
      $result = mysqli_query($link, "SELECT * FROM auto_tupe") or die("Ошибка " . mysqli_error($link));
      if($result)
          {
              while($row = mysqli_fetch_array($result)){
                  echo "<option value='".$row['auto_type_shot']."'><span>".$row['auto_type']."</span></option>";
              }
          }?>
  </select>
  <input type='text' name='objektkontroltransport<?php echo $counttranspotr;?>' size='30'  value='' placeholder="Номер транспортного засобу" required >
  <input type='number' Class='shot' name='countbag<?php echo $counttranspotr;?>' step="0.01" min="0" placeholder="Вага 0,00" required >
  <select  name='name_ci<?php echo $counttranspotr;?>' Class='shot'>
      <option selected value=''>Одиниці виміру</option>
      <?php
      $result = mysqli_query($link, "SELECT * FROM ci") or die("Ошибка " . mysqli_error($link));
      if($result)
          {
              while($row = mysqli_fetch_array($result)){
                  echo "<option value='".$row['shot_name_ci']."'><span>".$row['name_ci']."</span></option>";
              }
          }?>
  </select>
  <input type='number'  Class='shot' name='countplace<?php echo $counttranspotr;?>' step="1" min="0" placeholder="кіл-ть місць:1" required >

<?php
    break;
      default :
?>
<select  name='auto_tupe1' Class='shot'>
    <option selected value=''>тип авто</option>
    <?php
    $result = mysqli_query($link, "SELECT * FROM auto_tupe") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['auto_type_shot']."'><span>".$row['auto_type']."</span></option>";
            }
        }?>
</select>
<input type='text' name='objektkontroltransport1' size='30'  value='' placeholder="Номер транспортного засобу" required >
<input type='number' Class='shot' name='countbag1' step="0.01" min="0" placeholder="Вага 0,00" required >
<select  name='name_ci1' Class='shot'>
    <option selected value=''>Одиниці виміру</option>
    <?php
    $result = mysqli_query($link, "SELECT * FROM ci") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['shot_name_ci']."'><span>".$row['name_ci']."</span></option>";
            }
        }?>
</select>
<input type='number'  Class='shot' name='countplace1' step="1" min="0" placeholder="кіл-ть місць:1" required >


<?php

        break; }?>
