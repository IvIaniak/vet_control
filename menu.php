<?php
session_start();
require_once 'connect.php';
require 'lang.php';

echo "<div class='menu'>  <ul>";
switch (  $_SESSION['plevel']) {
  case '10':
  //админмстратор
      ?>
          <li><span class="button btn home green click" data-target="home">Головна</span></li>
          <li><span class="button btn admins click" data-target="admin">Адиминстрирование</span></li>
          <li><span class="button btn addnote click" data-target="add">Додати запис</span></li>
          <li><span class="button btn chat click" data-target="chat">Чат</span></li>
          <li><span class="button btn zvit click" data-target="zvit">Звіти</span></li>
          <li><span class="button red btn menu exit" data-target="exit">Вихід</span></li>
      <?php
  break;
  case '20':
  //инспектора
      ?>
      <li><span class="button btn home click" data-target="home">Головна</span></li>
      <li><span class="button btn addnote click" data-target="add">Додати запис</span></li>
      <li><span class="button btn chat click" data-target="chat">Чат</span></li>
      <li><span class="button red btn menu exit" data-target="exit">Вихід</span></li>
      <?php
  break;
  case '30':
      ?>
      <li><span class="button btn home click" data-target="home">Головна</span></li>
      <li><span class="button btn addnote click" data-target="add">Додати запис</span></li>
      <li><span class="button btn chat click" data-target="chat">Чат</span></li>
      <li><span class="button red btn menu exit" data-target="exit">Вихід</span></li>
      <?php
  break;
  default:
      ?>
        <li><span>menu default</span></li>
        <li><span>menu default2</span></li>
      <?php
    break;
}


?>  </ul>

</div>
