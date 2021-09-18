
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

?>
<h1>додати Тип автотранспорту</h1>
  <form action='function.php' method='POST'>
    <input type="text" id="auto_type"  name='auto_type' placeholder="Тип автотранспорту" required><label for="#auto_type">Тип автотранспорту</label><br>
    <input type="text" id="auto_type_shot"  name='auto_type_shot' placeholder="Тип автотранспорту скорочена назва" required><label for="#auto_type_shot">Тип автотранспорту скорочена назва</label><br>
    <input type='submit' class="button green" name='addauto' value='Додати'>
  </form>
