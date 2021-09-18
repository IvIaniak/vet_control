<?php
    require_once 'config.php'; // подключаем скрипт


    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

    //  $link = new mysqli($host, $user, $password, $database);
  //    if ($link->connect_error) {
  //      die("Ошибка: не удается подключиться: " . $link->connect_error);
  //    }
  //    if (!$conn->set_charset("utf8")) {
    //      printf("Ошибка при загрузке набора символов utf8: %s\n", $conn->error);
  //        exit();
  //    } else {
          //printf("Текущий набор символов: %s\n", $conn->character_set_name());
  //    }
  if (!mysqli_set_charset($link, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
    exit();
} else {
    //printf("Текущий набор символов: %s\n", mysqli_character_set_name($link));
}


function sqlreq ($sqlf,$linkf){
    $result = mysqli_query($linkf, $sqlf) or die("Ошибка " . $mysqlerr=mysqli_error($link));
    $ourarrey = array();
    if ($result){
        while($row = mysqli_fetch_array($result))
        {
            array_push($ourarrey, $row);
        }
    }

    return $ourarrey;

}

 ?>
