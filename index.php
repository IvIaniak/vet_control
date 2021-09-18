<?php
if (!isset($_GET['lang'])){
    session_start();
    session_destroy();
    $_GET['lang'] ='ukr';
    $_SESSION['lang'] = 'ukr';
    $_GET['list'] ='admin';
}



//require_once 'header.php';
require_once 'header.php';
require_once 'lang.php';
 ?>
<!--<body>-->
<body>
<?php
if (!isset($_SESSION['access'])){
    $_SESSION['access'] = 'no';
}
if (!isset($_SESSION['pass_log'])){
    $_SESSION['pass_log'] = 'not et';
}
  if ($_SESSION['access'] == 'no'){

        echo "
            <div class='logotip'>

            </div>
            <div class='accessform'>
            <form name=F1 method='POST' action='login.php'>
            <table border='0' cellspacing='0' align='center' bgcolor='BBBBBB'>
            <tr><td align=right> $wd[2]<td><input type='text' name='login' size='25' maxlength='15'></td></tr>
            <tr><td>$wd[3]<td><input type='password' name='pass' size='25' maxlength='20'></td></tr>
            <tr><td colspan=2 align='center'><br>
            <INPUT TYPE=hidden NAME='action' VALUE='login'>
            <INPUT TYPE=hidden NAME='lang' VALUE='pass'>
            <input type='submit' class='button green btn' value='$wd[4]'>
            </td></tr></table></form>

            <div class='lang'><b><a href='index.php?lang=ukr'>Український</a> | <a href='index.php?lang=ukr'>Український</a></b>
            <div align='center'><br> </div>
            </div>
            ";
        }
        if ($_SESSION['pass_log'] == 'no'){
            echo "<div class='error'><p>$wd[176]</p></div>";
        }

if ($_SESSION['access'] == 'yes'){ ?>
  <div class="wrapper">
              <div class="row-12">
                  <div class="col xs-12 sm-12 md-12 lg-12">
                      <div class="row-12">
                          <div class="col xs-12 sm-4 md-2 lg-2 menu"> <?php require_once 'menu.php'; ?>   </div>
                          <div class="col xs-12 sm-8 md-10 lg-10 list"> <?php require_once "home.php"; ?>   </div>
                      </div>

                    </div>



<?php
require_once 'footer.php';
}


?>


<?php


 ?>
