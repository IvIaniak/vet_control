<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


if(isset($_POST['print'])){
        $opp = 'print';
        $zone = $_POST['zone'];
        $countcolumt =0;
        for ($i = 0; $i < 44; $i++) {
          if (isset($_POST['scales'.$i.''])) {
            $scales[] =$i;
            $countcolumt++;
          }
        }
}

switch ($opp)
{
    case 'print' :
    echo "
    <HTML>
    <HEAD>
    <link href='css/order.css' rel='stylesheet' type='text/css'>
    </HEAD><BODY>";
    echo "<table border=1 width=80% leftmargin=0 topmargin=20 cellspacing=1><tr>";
    for ($i = 0; $i < $countcolumt; $i++) {
      echo "<td><center>".$wd[$scales[$i]+200]."</td>";
    }
    echo "</tr>";

    $result = mysqli_query($link, "SELECT * FROM iet") or die("Ошибка " . mysqli_error($link));
    if($result)
        {
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              for ($i = 0; $i < $countcolumt; $i++) {
                echo "<td><center>".$row[$scales[$i]]."</td>";
              }
              echo "</tr>";
        }
      }
    echo "</table>";

    break;

    default :

    ?>
      <div class="zvit active items">
        <form action='zvit.php' method='POST' target='_blank'>
          <select  name='zone' >
              <option selected disabled>Оберіть зону обслуговування</option>
              <?php
              $result = mysqli_query($link, "SELECT DISTINCT namestrukture FROM zone") or die("Ошибка " . mysqli_error($link));
              if($result)
                  {
                      while($row = mysqli_fetch_array($result)){
                          echo "<option value='".$row['namestrukture']."'><span>".$row['namestrukture']."</span></option>";
                      }
                  }
              ?>
          </select><br>
          <select  name='punkt' >
              <option selected disabled>Оберіть №пункту обслуговування</option>
              <?php
              echo "<option value='-'><span>усі пункти обслуговування</span></option>";
              $result = mysqli_query($link, "SELECT DISTINCT punkt FROM account ORDER BY punkt DESC") or die("Ошибка " . mysqli_error($link));
              if($result)
                  {
                      while($row = mysqli_fetch_array($result)){
                          echo "<option value='".$row['punkt']."'><span>№".$row['punkt']."</span></option>";
                      }
                  }
              ?>
          </select><br>
          <select  name='punkt' >
              <option selected disabled>Оберіть тип (Імпорт/Єкспорт/Транзит)</option>
              <option value='inport'><span>Імпорт</span></option>
              <option value='export'><span>Експорт</span></option>
              <option value='tranzit'><span>Транзит</span></option>
              <option value='innerperevoz'><span>Внутрішньодержавне перевезення</span></option>

          </select><br>
          <hr />
          <h3>Оберіть колонки звіту</h3>
          <div class="columnis">
              <?php
              for ($i = 0; $i < 44; $i++) {

                  ?><span>
                    <input type="checkbox" id="<?php echo $i; ?>" name="scales<?php echo $i;?>">
                    <label for="scales<?php echo $i;?>"><?php echo   $wd[200+$i]; ?></label>
                    </span>

                  <?php

              }
               ?>
          </div>
          <input type='submit' class="button green" name='print' value='створити звіт'>
        </form>
    </div>


    <?php
    break;
}
?>
