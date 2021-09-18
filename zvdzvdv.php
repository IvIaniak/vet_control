<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
?>

    <form action='function.php' method='POST'>
      <select  name='tupedok' id="inport2"  required>
          <option selected value=''>Оберіть тип документа</option>
          <option  value='ЗВД'>ЗВД</option>
          <option  value='ЗВДВ'>ЗВДВ</option>
          <option  value='Сертіфікт'>Сертіфікт</option>
      </select>
      <input type='hidden'  name='iddok' size='30'  value='<?php echo $id;?>' placeholder="<?php echo $id;?>"><br>
      <input type='text'  name='numberdok' size='30'  value='' placeholder="Додати № документа" required ><br>
      <input type='submit' class="button green" name='add_zvd_zvdv' value='Додати'>
    </form>

</div>
