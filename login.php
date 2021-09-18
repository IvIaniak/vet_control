
<?php

    require_once 'header.php';
    require_once 'apr1_md5.php';
    $login = $_POST['login'];
    //$login = mb_convert_encoding($pass,"UTF-8","Windows-1251");
    $pass = $_POST['pass'];
    $salt= "1";
    $pass=mb_convert_encoding($pass,"UTF-8","Windows-1251");
    //$pass_crypt = crypt($pass,$salt);
    $pass_crypt = APR1_MD5::hash("$pass", "$salt");;

    require_once 'connect.php';

    $query ="SELECT * FROM account WHERE nikname = '$login'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
  //  $result = $link->query($query);
    if($result)
    {
        while($row = mysqli_fetch_array($result))

        if ($login == $row['nikname']){
            if ($row['password'] == $pass_crypt){
                $_SESSION['nikname'] = $row['nikname'];
                $_SESSION['fullname'] = $row['fname']." ".$row['lname']." ".$row['sname'];
                //echo "pass:".$row['pass']."<br><hr>\n";
                //echo "plevel:".$row['plevel']."<br><hr>\n";
                $_SESSION['plevel'] = $row['level'];
                $_SESSION['punkt'] = $row['punkt'];
                $_SESSION['msg']= "Добро пожаловать ".$row['nikname'];
            //    echo "id:".$row['id']."<br><hr>\n";
            //    echo "line:".$row['line']."<br><hr>\n";
            //    echo "$pass<br><hr>\n";
                //echo "$pass_crypt<br><hr>\n";
                $query1 ="SELECT * FROM zone WHERE numberzone = '".$row['punkt']."'";
                $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
              //  $result = $link->query($query);
                if($result1)
                {
                    while($row1 = mysqli_fetch_array($result1)){
                      $_SESSION['portzona'] = $row1[2];
                    }
                }
                $_SESSION['msg'].=" - ".$_SESSION['portzona'];

            $_SESSION['access'] = 'yes';
            $_SESSION['pass_log'] = 'yes';
            for ($n=0; $n<20; $n++) {
                $_SESSION['id'] .= chr(rand(97,122));
             }
             $xashuser = $_SESSION['id'];
             $queryupdate ="UPDATE account SET xashuser = '$xashuser' WHERE nikname = '$login'";
             $result = mysqli_query($link, $queryupdate) or die("Ошибка " . mysqli_error($link));
          //   $result = $link->query($queryupdate);
            //header("Location: http://ganter.com.ua/mcit/index.php?lang=".$_SESSION['lang']);
            //header("Location: http://mcit.od.ua/index.php?lang=".$_SESSION['lang']);
              exit("<meta http-equiv='refresh' content='0; url= ".$dir."/index.php?lang=".$_SESSION['lang']."'>");
                die;
            } else {
                $_SESSION['access'] = 'no';
                $_SESSION['pass_log'] = 'no';
                //echo "<div class='error'><p>$wd[176]</p></div>";
                //header("Location: http://ganter.com.ua/mcit/index.php?lang=".$_SESSION['lang']);
                //header("Location: http://mcit.od.ua/index.php?lang=".$_SESSION['lang']);
                exit("<meta http-equiv='refresh' content='0; url= ".$dir."/index.php?lang=".$_SESSION['lang']."'>");
                //require 'index.php';
                die;
            }
        } else {
            $_SESSION['access'] = 'no';
            $_SESSION['pass_log'] = 'no';
            //echo "<div class='error'><p>$wd[176]</p></div>";
            //header("Location: http://ganter.com.ua/mcit/index.php?lang=".$_SESSION['lang']);
          //  header("Location: http://mcit.od.ua/index.php?lang=".$_SESSION['lang']);
            exit("<meta http-equiv='refresh' content='0; url= ".$dir."/index.php?lang=".$_SESSION['lang']."'>");
            //require 'index.php';
            die;
        }
        $_SESSION['access'] = 'no';
        $_SESSION['pass_log'] = 'no';
        //echo "<div class='error'><p>$wd[176]</p></div>";
        //header("Location: http://ocalhost/dashboard/mcit_bd_new/index.php");
        //header("Location: http://ganter.com.ua/mcit/index.php?lang=".$_SESSION['lang']);
      //  header("Location: http://mcit.od.ua/index.php?lang=".$_SESSION['lang']);
          exit("<meta http-equiv='refresh' content='0; url= ".$dir."/index.php?lang=".$_SESSION['lang']."'>");
        //require 'index.php';
        die;
    }

 ?>
