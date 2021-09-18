<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();


if(isset($_GET['edit_user'])){
        $opp = 'edit_user';
        $iduser= $_GET['edit_user'];
}

if(isset($_GET['edit_operator_rinku'])){
        $opp = 'edit_operator_rinku';
        $idrinku = $_GET['edit_operator_rinku'];
}

switch ($opp)
{
    case 'edit_operator_rinku' :

          $result = mysqli_query($link, "SELECT * FROM operator_rinku WHERE id = '$idrinku'") or die("Ошибка " . mysqli_error($link));
          if($result)
              {
                  while($row = mysqli_fetch_array($result)){
          ?>
                      <div class="row-12">
                        <div class="col xs-12 sm-12 md-12 lg-12">
                             <div class="edit_operator active items">
                                    <h1>редагувати оператора ринку <?php echo $idrinku; ?> </h1>
                                      <form action='function.php' method='POST'>
                                         <input type='hidden' name='id' size='30'  value='<?php echo $row['id']; ?>'>
                                        <input type='edrpo' id="inport1" name='edrpo' size='30'  value='<?php echo $row['edrpo']; ?>' placeholder="<?php echo $row['edrpo']; ?>" required ><label for="#inport1">введіть код ЄДРПОУ</label> <br>
                                        <select  name='pravova_forma' id="inport2">
                                            <option selected value='<?php echo $row['pravova_forma']; ?>'> <?php echo $row['pravova_forma']; ?> </option>
                                            <option value='110'><span>Фермерське господарство  №110</span></option>
                                            <option value='Фермерське господарство №110'><span>Фермерське господарство  №110 </span></option>
                                            <option value='Приватне підприємство №120'><span>Приватне підприємство  №120 </span></option>
                                            <option value='Колективне підприємство* №130'><span>Колективне підприємство*  №130 </span></option>
                                            <option value='Державне підприємство №140'><span>Державне підприємство  №140 </span></option>
                                            <option value='Казенне підприємство №145'><span>Казенне підприємство  №145 </span></option>
                                            <option value='Комунальне підприємство №150'><span>Комунальне підприємство  №150 </span></option>
                                            <option value='Дочірнє підприємство №160'><span>Дочірнє підприємство  №160 </span></option>
                                            <option value='Іноземне підприємство №170'><span>Іноземне підприємство  №170 </span></option>
                                            <option value='Підприємство об"єднання громадян (релігійної організації, профспілки) №180'><span>Підприємство об"єднання громадян (релігійної організації, профспілки)  №180 </span></option>
                                            <option value='Підприємство споживчої кооперації №185'><span>Підприємство споживчої кооперації  №185 </span></option>
                                            <option value='Орендне підприємство* №190'><span>Орендне підприємство*  №190 </span></option>
                                            <option value='Індивідуальне підприємство* №191'><span>Індивідуальне підприємство*  №191 </span></option>
                                            <option value='Сімейне підприємство* №192'><span>Сімейне підприємство*  №192 </span></option>
                                            <option value='Спільне підприємство*№193'><span>Спільне підприємство* №193 </span></option>
                                            <option value='Господарські товариства №200'><span>Господарські товариства  №200 </span></option>
                                            <option value='Акціонерне товариство №230'><span>Акціонерне товариство  №230 </span></option>
                                            <option value='Відкрите акціонерне товариство*) №231'><span>Відкрите акціонерне товариство*)  №231 </span></option>
                                            <option value='Закрите акціонерне товариство*)№232'><span>Закрите акціонерне товариство*) №232 </span></option>
                                            <option value='Державна акціонерна компанія (товариство) №235'><span>Державна акціонерна компанія (товариство)  №235 </span></option>
                                            <option value='Товариство з обмеженою відповідальністю №240'><span>Товариство з обмеженою відповідальністю  №240 </span></option>
                                            <option value='Товариство з додатковою відповідальністю №250'><span>Товариство з додатковою відповідальністю  №250 </span></option>
                                            <option value='Повне товариство №260'><span>Повне товариство  №260 </span></option>
                                            <option value='Командитне товариство №270'><span>Командитне товариство  №270 </span></option>
                                            <option value='Кооперативи №300'><span>Кооперативи  №300 </span></option>
                                            <option value='Виробничий кооператив №310'><span>Виробничий кооператив  №310 </span></option>
                                            <option value='Обслуговуючий кооператив №320'><span>Обслуговуючий кооператив  №320 </span></option>
                                            <option value='Житлово-будівельний кооператив**) №321'><span>Житлово-будівельний кооператив**)  №321 </span></option>
                                            <option value='Гаражний кооператив**) №322'><span>Гаражний кооператив**)  №322 </span></option>
                                            <option value='Споживчий кооператив №330'><span>Споживчий кооператив  №330 </span></option>
                                            <option value='Сільськогосподарський виробничий кооператив №340'><span>Сільськогосподарський виробничий кооператив  №340 </span></option>
                                            <option value='Сільськогосподарський обслуговуючий кооператив №350'><span>Сільськогосподарський обслуговуючий кооператив  №350 </span></option>
                                            <option value='Кооперативний банк №390'><span>Кооперативний банк  №390 </span></option>
                                            <option value='Організації (установи, заклади) №400'><span>Організації (установи, заклади)  №400 </span></option>
                                            <option value='Орган державної влади №410'><span>Орган державної влади  №410 </span></option>
                                            <option value='Орган місцевого самоврядування №420'><span>Орган місцевого самоврядування  №420 </span></option>
                                            <option value='Державна організація (установа, заклад) №425'><span>Державна організація (установа, заклад)  №425 </span></option>
                                            <option value='Комунальна організація (установа, заклад) №430'><span>Комунальна організація (установа, заклад)  №430 </span></option>
                                            <option value='Приватна організація (установа, заклад) №435'><span>Приватна організація (установа, заклад)  №435 </span></option>
                                            <option value='Організація (установа, заклад) об"єднання громадян (релігійної організації, профспілки, споживчої кооперації тощо) №440'><span>Організація (установа, заклад) об"єднання громадян (релігійної організації, профспілки, споживчої кооперації тощо)  №440 </span></option>
                                            <option value='Організація орендарів* №490'><span>Організація орендарів*  №490 </span></option>
                                            <option value='Організація покупців* №495'><span>Організація покупців*  №495 </span></option>
                                            <option value='Об"єднання підприємств (юридичних осіб) №500'><span>Об"єднання підприємств (юридичних осіб)  №500 </span></option>
                                            <option value='Асоціація №510'><span>Асоціація  №510 </span></option>
                                            <option value='Корпорація №520'><span>Корпорація  №520 </span></option>
                                            <option value='Консорціум №530'><span>Консорціум  №530 </span></option>
                                            <option value='Концерн №540'><span>Концерн  №540 </span></option>
                                            <option value='Холдингова компанія №550'><span>Холдингова компанія  №550 </span></option>
                                            <option value='Інші об"єднання юридичних осіб №590'><span>Інші об"єднання юридичних осіб  №590 </span></option>
                                            <option value='Відокремлені підрозділи без статусу юридичної особи №600'><span>Відокремлені підрозділи без статусу юридичної особи  №600 </span></option>
                                            <option value='Філія (інший відокремлений підрозділ) №610'><span>Філія (інший відокремлений підрозділ)  №610 </span></option>
                                            <option value='Представництво №620'><span>Представництво  №620 </span></option>
                                            <option value='Об"єднання громадян, профспілки, благодійні організації та інші подібні організації №800'><span>Об"єднання громадян, профспілки, благодійні організації та інші подібні організації  №800 </span></option>
                                            <option value='Політична партія №810'><span>Політична партія  №810 </span></option>
                                            <option value='Громадська організація №815'><span>Громадська організація  №815 </span></option>
                                            <option value='Спілка об"єднань громадян №820'><span>Спілка об'єднань громадян  №820 </span></option>
                                            <option value='Релігійна організація №825'><span>Релігійна організація  №825 </span></option>
                                            <option value='Профспілка №830'><span>Профспілка  №830 </span></option>
                                            <option value='Об"єднання профспілок №835'><span>Об'єднання профспілок  №835 </span></option>
                                            <option value='Творча спілка (інша професійна організація) №840'><span>Творча спілка (інша професійна організація)  №840 </span></option>
                                            <option value='Благодійна організація №845'><span>Благодійна організація  №845 </span></option>
                                            <option value='Організація роботодавців №850'><span>Організація роботодавців  №850 </span></option>
                                            <option value='Об"єднання співвласників багатоквартирного будинку №855'><span>Об'єднання співвласників багатоквартирного будинку  №855 </span></option>
                                            <option value='Орган самоорганізації населення №860'><span>Орган самоорганізації населення  №860 </span></option>
                                            <option value='Інші організаційно-правові форми №900'><span>Інші організаційно-правові форми  №900 </span></option>
                                            <option value='Підприємець - фізична особа №910'><span>Підприємець - фізична особа  №910 </span></option>
                                            <option value='Товарна біржа №915'><span>Товарна біржа  №915 </span></option>
                                            <option value='Фондова біржа №920'><span>Фондова біржа  №920 </span></option>
                                            <option value='Кредитна спілка №925'><span>Кредитна спілка  №925 </span></option>
                                            <option value='Споживче товариство №930'><span>Споживче товариство  №930 </span></option>
                                            <option value='Спілка споживчих товариств №935'><span>Спілка споживчих товариств  №935 </span></option>
                                            <option value='Недержавний пенсійний фонд №940'><span>Недержавний пенсійний фонд  №940 </span></option>
                                            <option value='Садівниче товариство**) №950'><span>Садівниче товариство**)  №950 </span></option>
                                            <option value='Інші організаційно-правові форми №995'><span>Інші організаційно-правові форми  №995 </span></option>
                                        </select><label for="#inport2">введіть ОРГАНІЗАЦІЙНО-ПРАВОВУ форму господарювання</label><br>
                                        <input type="text" id="operatornameshot"  name='fullname' value='<?php echo $row['fullname']; ?>' placeholder="<?php echo $row['fullname']; ?>" size="30" required><label for="#operatornameshot">повна назва оператора ринку</label><br>

                                        <input type="text" id="operatornameshot"  name='shotname' value='<?php echo $row['shotname']; ?>' placeholder="<?php echo $row['shotname']; ?>" size="30" required><label for="#operatornameshot">скорочена назва оператора ринку</label><br>
                                        <label >Країна;Область;Район;Місто; вулицю; № будинка</label><br>
                                        <input type='text'  name='cuntry' size='30'  value='<?php echo $row['cuntry']; ?>' placeholder="введіть Країну" required >
                                        <input type='text'  name='oblast' size='30'  value='<?php echo $row['oblast']; ?>' placeholder="введіть Область" required >
                                        <input type='text'  name='rayon' size='30'  value='<?php echo $row['rayon']; ?>' placeholder="введіть Район" required >
                                        <input type='text' id="inport3" name='city' size='30'  value='<?php echo $row['city']; ?>' placeholder="введіть Місто" required >
                                        <input type='text' id="inport4" name='strids' size='30'  value='<?php echo $row['strids']; ?>' placeholder="введіть вулицю" required >
                                        <input type='text' id="inport5" name='home_number' size='30'  value='<?php echo $row['home_number']; ?>' placeholder="введіть № будинка" required ><br />
                                        <input type="email" id="email" name='email' value='<?php echo $row['email']; ?>' placeholder="введіть@вашу.електронну.адресу" size="30" ><label for="#email">Email</label><br>
                                        <input type="tel" id="phone" name="phone" value='<?php echo $row['phone']; ?>' placeholder="+380487777777" pattern="\+380[0-9]{9}" ><label for="#phone">Телефон : +380487777777</label><br>
                                        <input type='submit' class="button green" name='edit_operator_rinku' value='Оновити'>
                                      </form>
                               </div>
                          </div>
                      </div>
              <?php
                       }

                  }
    break;
    case 'edit_user' :
        $result = mysqli_query($link, "SELECT * FROM account WHERE id = '$iduser'") or die("Ошибка " . mysqli_error($link));
        if($result)
            {
                while($row = mysqli_fetch_array($result)){

        ?>
            <div class="row-12">
              <div class="col xs-12 sm-12 md-12 lg-12">
                   <div class="edituser active items">
                          <h1>редагувати користувача <?php echo $iduser; ?> </h1>
                            <form action='function.php' method='POST'>
                               <input type='hidden' name='id' size='30'  value='<?php echo $iduser; ?>'>
                              <input type='text' id="inport11" name='nikname' size='30'  value='<?php echo $row['nikname']; ?>' placeholder="<?php echo $row['nikname']; ?>" required ><label for="#inport11">введіть логін користувача</label> <br>
                              <input type='text' id="inport12" name='fname' size='30'  value='<?php echo $row['fname']; ?>'  placeholder="<?php echo $row['fname']; ?>" required ><label for="#inport12">введіть прізвище</label><br>
                              <input type='text' id="inport13" name='lname' size='30'  value='<?php echo $row['lname']; ?>' placeholder="<?php echo $row['lname']; ?>" required ><label for="#inport13">введіть ім'я</label><br>
                              <input type='text' id="inport14" name='sname' size='30'  value='<?php echo $row['sname']; ?>' placeholder="<?php echo $row['sname']; ?>" required ><label for="#inport14">по батькові</label><br>
                              <input type='password' id="inport15" name='password' size='30'  value='' placeholder="введіть пароль" required ><label for="#inport15">введіть пароль</label><br>
                              <select  name='level' >
                                  <option selected value="<?php echo $row['level']; ?>">введіть рівень доступу</option>
                                  <option value="10"><span>адмін</span></option>
                                  <option value="20">інспектор</option>
                                  <option value="30">відповідальний в зоні</option>

                              </select><br>
                              <select  name='status' >
                                  <option selected value="<?php echo $row['status']; ?>">Оберіть статус користувача</option>
                                  <option value="active"><span>робочий</span></option>
                                  <option value="vacation">відпустку</option>
                                  <option value="liberated">звільнений</option>
                              </select><br>
                              <select  name='punkt' >
                                  <option selected value="<?php echo $row['punkt']; ?>">Оберіть зону обслуговування</option>
                                  <?php

                                  $result1 = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
                                  if($result1)
                                      {
                                          while($row1 = mysqli_fetch_array($result1)){

                                              echo "<option value='".$row1['numberzone']."'><span>".$row1['namezone']." №".$row1['numberzone']."</span></option>";
                                          }
                                      }
                                  ?>
                              </select><br>
                              <input type='submit' class="button green" name='edit_user' value='Оновити'>
                            </form>
                     </div>
                </div>
            </div>
            <?php
                     }
                }
    break;


    default :
           ?>
          <div class="row-12">
              <div class="col xs-12 sm-12 md-12 lg-12">
                <ul>
                    <li class="btntype active" data-target="users"> <span class="button green">Користувачі</span> </li>
                    <li class="btntype " data-target="zone"> <span class="button">зони обслуговування</span></li>
                    <li class="btntype " data-target="uktz"> <span class="button">УКТЗ</span> </li>
                    <li class="btntype " data-target="operator_rinku"> <span class="button">оператори ринку</span> </li>
                    <li class="btntype " data-target="count_jurnals"> <span class="button">Лічильники документів на пунктах</span> </li>
                    <li class="btntype " data-target="logs"> <span class="button">лог дій</span> </li>
                    <li class="btntype " data-target="auto"> <span class="button">Транспортні засоби</span> </li>
                    <li class="btntype " data-target="ci"> <span class="button">Одиниці виміру</span> </li>
                    <li class="btntype " data-target="delitems"> <span class="button">видалити запис</span> </li>
                    <li class="btntype " data-target="zaborony"> <span class="button">заборони</span> </li>
                    <li class="btntype " data-target="admin"> <span class="button">admin</span> </li>
                </ul>
                <!--BLOCK-->
                <div class="zaborony items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="addzaborony"> <span class="button green">додати заборону</span> </li>
                      <li class="btntypein " data-target="all_zaborony"> <span class="button">всі заборони</span></li>
                      <li class="btntypein " data-target="add_file_zaborony"> <span class="button">додати із файлу заборони</span></li>
                  </ul>
                  <div class="addoperatorrinku active itemses">
                    <!--load from JS alluser.php -->
                      <?php //require 'addoperatorrinku.php'; ?>
                  </div>

                <div class="all_zaborony  itemses">
                    <!--load from JS alluser.php -->
                </div>
                <div class="add_file_zaborony  itemses">
                  <form action="function.php" enctype="multipart/form-data" accept-charset="UTF-8" method="POST">
                    <input name="userfile" type="file" />
                    <button class='fa fa-upload arreysettings' type='submit' name='addfromfilezaborony'></button>
                  </form>
                </div>
              </div>
          <!--BLOCK-->
                <!--BLOCK-->
                <div class="ci items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="add_ci"> <span class="button green">додати одиниці виміру</span> </li>
                      <li class="btntypein " data-target="all_ci"> <span class="button">всі одиниці виміру</span></li>
                  </ul>
                  <div class="add_ci active itemses">
                    <!--load from JS alluser.php -->
                      <?php require 'add_ci.php'; ?>
                  </div>

                <div class="all_ci  itemses">
                    <!--load from JS alluser.php -->
                </div>
              </div>
          <!--BLOCK-->
          <!--BLOCK-->
          <div class="admin items">
            <hr />
            <form action='function.php' method='POST'>
            <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
            <button class='fa fa-trash arreysettings' type='submit' name='admintest'></button></form>
          </div>
          <!--BLOCK-->
                <!--BLOCK-->
                <div class="auto items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="add_auto"> <span class="button green">додати тип авто</span> </li>
                      <li class="btntypein " data-target="all_auto"> <span class="button">всі авто</span></li>
                  </ul>
                  <div class="add_auto active itemses">
                    <!--load from JS alluser.php -->
                      <?php require 'add_auto.php'; ?>
                  </div>

                <div class="all_auto  itemses">
                    <!--load from JS alluser.php -->
                </div>
              </div>
          <!--BLOCK-->

                <!--BLOCK-->
                <div class="operator_rinku items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="addoperatorrinku"> <span class="button green">додати оператора ринку</span> </li>
                      <li class="btntypein " data-target="all_operator_rinku"> <span class="button">всі оператора ринку</span></li>
                      <li class="btntypein " data-target="add_operator_rinku"> <span class="button">додати із дайлу операторів ринку</span></li>
                  </ul>
                  <div class="addoperatorrinku active itemses">
                    <!--load from JS alluser.php -->
                      <?php require 'addoperatorrinku.php'; ?>
                  </div>
                  <div class="add_operator_rinku itemses">
                    <form action="function.php" enctype="multipart/form-data" accept-charset="UTF-8" method="POST">
                      <input name="userfile" type="file" />
                      <button class='fa fa-upload arreysettings' type='submit' name='addfromfileoperator_rinku'></button>
                    </form>

                  </div>
                <div class="all_operator_rinku  itemses">
                    <!--load from JS alluser.php -->
                </div>
              </div>
          <!--BLOCK-->
          <!--BLOCK-->
          <div class="count_jurnals items">
            <hr />
            <ul Class="menuseckond">
                <li class="btntypein active" data-target="edit_count_jurnals"> <span class="button green">редагувати лічильники на пунктах</span> </li>
                <li class="btntypein " data-target="all_count_jurnals"> <span class="button">всі лічильники на пунктах</span></li>
            </ul>
            <div class="edit_count_jurnals active itemses">
              <!--load from JS alluser.php -->
                <?php require 'edit_count_jurnals.php'; ?>
            </div>

          <div class="all_count_jurnals  itemses">
              <!--load from JS alluser.php -->
          </div>
          </div>
          <!--BLOCK-->
                <!--BLOCK-->
                <div class="users active items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="adduser"> <span class="button green">додати користувача</span> </li>
                      <li class="btntypein " data-target="alluser"> <span class="button">всі користувачі</span></li>
                  </ul>
                  <div class="adduser active itemses">
                    <?php require 'adduser.php'; ?>
                    <!--load from JS alluser.php -->
                  </div>

                <div class="alluser  itemses">
                    <!--load from JS alluser.php -->
                </div>
              </div>
          <!--BLOCK-->
          <!--BLOCK-->
          <div class="edituser  items">
            <h1>редагувати користувача</h1>
              <form action='function.php' method='POST'>
                <input type='text' id="inport11" name='nikname' size='30'  value='' placeholder="логін" required ><label for="#inport11">введіть логін користувача</label> <br>
                <input type='text' id="inport12" name='fname' size='30'  value=''  placeholder="введіть прізвище" required ><label for="#inport12">введіть прізвище</label><br>
                <input type='text' id="inport13" name='lname' size='30'  value='' placeholder="введіть ім'я" required ><label for="#inport13">введіть ім'я</label><br>
                <input type='text' id="inport14" name='sname' size='30'  value='' placeholder="введіть ім'я по батькові" required ><label for="#inport14">введіть ім'я по батькові</label><br>
                <input type='password' id="inport15" name='password' size='30'  value='' placeholder="введіть пароль" required ><label for="#inport15">введіть пароль</label><br>
                <select  name='level' >
                    <option selected disabled>Оберіть рівень доступу</option>
                    <option value="10"><span>адмін</span></option>
                    <option value="20">інспектор</option>
                    <option value="30">відповідальний в зоні</option>
                    <option value="40">---</option>
                    <option value="50">---</option>
                </select><br>
                <select  name='status' >
                    <option selected disabled>Оберіть статус користувача</option>
                    <option value="active"><span>робочий</span></option>
                    <option value="vacation">відпустку</option>
                    <option value="liberated">звільнений</option>
                </select><br>
                <select  name='punkt' >
                    <option selected disabled>Оберіть зону обслуговування</option>
                    <?php

                    $result = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
                    if($result)
                        {
                            while($row = mysqli_fetch_array($result)){
                                $order_id = $row['value'];
                                $order_id++;
                                echo "<option value='".$row['numberzone']."'><span>".$row['namezone']." №".$row['numberzone']."</span></option>";
                            }
                        }
                    ?>
                </select><br>
                <input type='submit' class="button green" name='adduser' value='Додати'>
              </form>
          </div>
          <!--BLOCK-->
          <!--BLOCK-->
                <div class="uktz  items">
                  <h1>всі УКТЗ</h1>
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="alluktz"> <span class="button green">Всі УКТЗ</span> </li>
                      <li class="btntypein " data-target="adduktz"> <span class="button">Додати УКТЗ</span></li>
                      <li class="btntypein " data-target="edituktz"> <span class="button">Редагувати</span></li>
                      <li class="btntypein " data-target="addfileuktz"> <span class="button">Додати із файлу</span></li>
                      <li class="btntypein " data-target="deluktzall"> <span class="button">Видалити усі УКТЗ</span></li>
                  </ul>
                  <div class="deluktzall itemses">
                    <form action="function.php" method="POST">

                      <button class='fa fa-trash arreysettings' type='submit' name='deluktzall'></button>
                    </form>

                  </div>
                  <div class="addfileuktz itemses">
                    <form action="function.php" enctype="multipart/form-data" accept-charset="UTF-8" method="POST">
                      <input name="userfile" type="file" />
                      <button class='fa fa-upload arreysettings' type='submit' name='addfromfileuktz'></button>
                    </form>

                  </div>
                  <div class="alluktz active itemses">
                  <TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
                      <tr>
                          <td><span>ID</span>
                          <td><span>Дата створення</span>
                          <td><span>Тип</span>
                          <td><span>№УКТЗ</span>
                          <td><span>ОПИС</span>
                          <td><span>Додав запис користувач</span>
                      </tr>
                      <?php
                      $result = mysqli_query($link, "SELECT * FROM uktz") or die("Ошибка " . mysqli_error($link));
                      if($result)
                          {
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>
                                          <td><span>".$row['id']."</span>
                                          <td><span>".$row['date']."</span>
                                          <td><span>".$row['tupe']."</span>
                                          <td><span>".$row['number']."</span>
                                          <td><span>".$row['info']."</span>
                                          <td><span>".$row['nameuser']."</span>
                                          <td><form action='function.php' method='POST'>
                                          <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                                          <button class='fa fa-trash arreysettings' type='submit' name='deluktz'></button></form></td>
                                      </tr>";
                              }
                          }  ?>
                  </table>
                  </div>


                </div>


          <!--BLOCK-->
                <div class="alluser  items">

                </div>
          <!--BLOCK-->
          <!--BLOCK-->
                <div class="logs  items">
                  <h1>лог дій</h1>
                  <TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
                      <tr>
                          <td><span>ID</span>
                          <td><span>Дата створення запису</span>
                          <td><span>дії</span>
                          <td><span>П.І.Б.</span>
                        </tr>
                      <?php
                      $result = mysqli_query($link, "SELECT * FROM logs ORDER BY id DESC limit 50") or die("Ошибка " . mysqli_error($link));
                      if($result)
                          {
                              while($row = mysqli_fetch_array($result)){
                                  echo "<tr>
                                          <td><span>".$row['id']."</span>
                                          <td><span>".$row['date']."</span>
                                          <td><span>".$row['message']."</span>
                                          <td><span>".$row['nikname']."</span>
                                      </tr>";
                              }
                          }  ?>
                  </table>
                </div>
          <!--BLOCK-->
                <div class="zone items">
                  <hr />
                  <ul Class="menuseckond">
                      <li class="btntypein active" data-target="addzone"> <span class="button green">додати зону обслуговування</span> </li>
                      <li class="btntypein " data-target="allzone"> <span class="button">всі зони обслуговування</span></li>
                  </ul>
                  <div class="addzone active itemses">
                    <h1>додати зону обслуговування</h1>
                    <form action='function.php' method='POST'>
                      <input type='text' id="inport21" name='namestrukture' size='30'  value='' placeholder="відділ прикор. інспек. контр. <<Одеса>>" required ><label for="#inport21">назва структурного підрозділу</label> <br>
                      <input type='number' id="inport22" name='numberzone' step="1" min="1" max="100" size='30'  value=''  placeholder="1" required ><label for="#inport22">введіть № зони</label><br>
                      <input type='text' id="inport23" name='namezone' size='30'  value='' placeholder="Тарутино" required ><label for="#inport23">введіть назву зони</label><br>

                      <input type='submit' class="button green" name='addzone' value='Додати'>
                    </form>
                  </div>
                  <div class="allzone itemses">
                    <h1>всі зони обслуговування</h1>
                    <TABLE WIDTH=100% BORDER=1 leftmargin=0 topmargin=0 cellspacing=0>
                        <tr>
                            <td><span>ID</span>
                            <td><span>Дата створення запису</span>
                            <td><span>Назва структурного підрозділу</span>
                            <td><span>№ зони обслуговування</span>
                            <td><span>Назва зони обслуговування</span>
                            <td><span>дії над записом</span>
                        </tr>
                        <?php
                        $result = mysqli_query($link, "SELECT * FROM zone") or die("Ошибка " . mysqli_error($link));
                        if($result)
                            {
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>
                                            <td><span>".$row['id']."</span>
                                            <td><span>".$row['date']."</span>
                                            <td><span>".$row['namestrukture']."</span>
                                            <td><span>".$row['numberzone']."</span>
                                            <td><span>".$row['namezone']."</span>
                                            <td><form action='function.php' method='POST'>
                                            <input type='hidden' name='id' size='30'  value='".$row['id']."' placeholder=''>
                                            <button class='fa fa-trash arreysettings' type='submit' name='delzone'></button> </form></td>
                                        </tr>";
                                }
                            }  ?>
                    </table>
                  </div>


                </div>
          <!--BLOCK-->
                <div class="addzone  items">

                </div>
          <!--BLOCK-->

                <div class="delitems  items">
                  <h1>видалити запис</h1>
                    <form action='function.php' method='POST'>
                      <select  name='table' >
                          <option selected disabled>Оберіть журнал</option>
                          <option value="zerno"><span>зерно</span></option>
                          <option value="iet">Експорт/Транзит/Імпорт/та ін</option>
                      </select><br>
                      <input type='text' id="inport31" name='idzapusa' size='30'  value='' placeholder="ID" required ><label for="#inport31">введіть ID записа!</label> <br>
                      <input type='submit' class="button red" name='remitems' value='видалити'>
                    </form>
                </div>
                <!--BLOCK-->
               </div>
          </div>
          <?php
    break;
} ?>
