
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

?>
<h1>додати Одиниці виміру</h1>
  <form action='function.php' method='POST'>
    <input type="text" id="name_ci"  name='name_ci' placeholder="Одиниці виміру" required><label for="#name_ci">Одиниці виміру</label><br>
    <input type="text" id="shot_name_ci"  name='shot_name_ci' placeholder="Скорочена назва одиниці виміру" required><label for="#shot_name_ci">Скорочена назва одиниці виміру</label><br>
    <input type="number" id="otnosheniek1000kg"  name='otnosheniek1000kg' placeholder="Відношення до 1000кг" required><label for="#otnosheniek1000kg">Відношення до 1000кг</label><br>
    <input type='submit' class="button green" name='addci' value='Додати'>
  </form>
