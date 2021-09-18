<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

?>
<div class="row-12">
    <div class="col xs-12 sm-12 md-12 lg-12 chats">
      <ul>
          <li class="btntype active" data-target="all_chat"> <span class="button green">загальний чат</span> </li>
          <li class="btntype " data-target="zone_chat"> <span class="button">чат на пунткі</span></li>
      </ul>
        <div class="all_chat active items">
          <div id="messege">
              <?php include "chat_all.php"; ?>
          </div>


        </div>
        <div class="zone_chat  items">
          <div id="messege">
            
            <h1>В данній момнте не доступно ! в разработке!</h1>
          </div>


        </div>
        <form id="msgchatall" action='function.php' method='POST'>
          <input type='hidden'  name='zhat_zona' size='30'  value='99'>
          <input type='text' id="msgchatall"  name='msg' size='30'  value='' placeholder="Ваша думка:?" required >

          <span class="button green add_chat" name='add_msg_all_chat' >Додати</span>
        </form>
    </div>
</div>
