<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
?>

    <form action='function.php' method='POST'>
      <input type='text'  name='type_doks' size='30'  value='Міжнародний сертіфікат' placeholder='Міжнародний сертіфікат'><br>
      <input type='hidden'  name='iddok' size='30'  value='<?php echo $id;?>' placeholder="<?php echo $id;?>"><br>
      <input type='text'  name='series' size='30'  value='' placeholder="Додати Серія документа" required >
      <input type='text'  name='number' size='30'  value='' placeholder="Додати № документа" required ><br>
      <input type='date' id="date_doks"   name='date_doks'   value='' placeholder="Дата видачі сертифікату" required ><label for="#date_doks">Дата видачі сертифікату</label><br />
      <input type='submit' class="button green" name='add_sertifikat' value='Додати'>
    </form>

</div>
