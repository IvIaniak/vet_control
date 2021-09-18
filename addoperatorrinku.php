
<?php
require_once 'connect.php';
require_once 'lang.php';
session_start();

?>
<h1>додати оператора ринку</h1>
  <form action='function.php' method='POST'>
    <input type='edrpo' id="inport1" name='edrpo' size='30'  value='' placeholder="ЄДРПОУ" required ><label for="#inport1">введіть код ЄДРПОУ</label> <br>
    <select  name='pravova_forma' id="inport2">
        <option selected disabled>введіть ОРГАНІЗАЦІЙНО-ПРАВОВУ форму господарювання</option>
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
    <input type="text" id="operatorname"  name='fullname' placeholder="ТОВАРИСТВО З ОБМЕЖЕНОЮ ВIДПОВIДАЛЬНIСТЮ <<НАЗВА>>" size="30" required><label for="#operatorname">повна назва оператора ринку</label><br>
    <input type="text" id="operatornameshot"  name='shotname' placeholder="ТОВ <<НАЗВА>>" size="30" required><label for="#operatornameshot">скорочена назва оператора ринку</label><br>
    <hr /><label >Країна; Область; Район;  Місто; вулицю; № будинка</label><br>
    <input type='text'  name='cuntry' size='30'  value='' placeholder="введіть Країну" required >
    <input type='text'  name='oblast' size='30'  value='' placeholder="введіть Область" required >
    <input type='text'  name='rayon' size='30'  value='' placeholder="введіть Район" required >
    <input type='text' id="inport3" name='city' size='30'  value='' placeholder="введіть Місто" required >
    <input type='text' id="inport4" name='strids' size='30'  value='' placeholder="введіть вулицю" required >
    <input type='text' id="inport5" name='home_number' size='30'  value='' placeholder="введіть № будинка" required ><br />  <hr />
    <input type="email" id="email" name='email' placeholder="введіть@вашу.електронну.адресу" size="30" ><label for="#email">Email</label><br>
    <input type="tel" id="phone" name="phone" placeholder="+380487777777" pattern="\+380[0-9]{9}" ><label for="#phone">Телефон : +380487777777</label><br>
    <input type='submit' class="button green" name='addoperatorrinku' value='Додати'>
  </form>
