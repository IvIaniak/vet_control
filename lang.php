<?php
    session_start();

if (isset($_SESSION['lang'])) {
    require "./lang/".$_SESSION['lang'].".php";
} else {
//выборя языка
  if($_GET['lang'] == 'eng'){
      require './lang/eng.php';
      $_SESSION['lang'] = 'eng';
  }

  if($_GET['lang'] == 'rus'){
      require './lang/rus.php';
      $_SESSION['lang'] = 'rus';
  }

  if($_GET['lang'] == 'ukr'){
      require './lang/ukr.php';
      $_SESSION['lang'] = 'ukr';
  }

}

if (!isset($_GET['action'])){
    $_GET['action'] ='menu';
}

 ?>
