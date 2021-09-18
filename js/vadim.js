
//click on gambur
$(document).on('click', ".click",function(){
	var target =  $(this).attr('data-target');
	//$('.list').load(target+".php?action=addzerno");
	$(".menu .click").removeClass('green');
	$("[data-target="+target+"].click").addClass('green');
	$('.list').load(target+".php");
	//console.log('ping');
});

//click on criatezvit
$(document).on('click', ".criatezvit",function(){
	var target =  $(this).attr('data-target');
	target= target+".php?print=1";

	  window.open(target, '_blank').focus();
});


//click zvdzvdv
$(document).on('click', ".clickzvd",function(){
	var target =  $(this).attr('data-dokid');
	$('.list').load("zvdzvdv.php?id="+target);
	//console.log('ping');
});
//click clicksertifikat
$(document).on('click', ".clicksertifikat",function(){
	var target =  $(this).attr('data-dokid');
	$('.list').load("sertifikat.php?id="+target);
	//console.log('ping');
});

//click block
$(document).on('click', ".clickblock",function(){
	var target =  $(this).attr('data-dokid');
	$('.list').load("zvdzvdv.php?id="+target);
	//console.log('ping');
});

$(document).on('change', ".tip",function(){
	var target =  $(this).val();
	$('.list').load("add.php?action="+target);
});
// посмотреть подробнее
$(document).on('click', ".shotinfo",function(){
	var target =  $(this).attr('id');
	if ($(".fullinfo."+target).hasClass('active')){
			$(".fullinfo").removeClass('active');
			} else {
		$(".fullinfo").removeClass('active');
			$(".fullinfo."+target).addClass('active');

		}
});
//  редактирование пользователя
$(document).on('click', ".edit_user",function(){
	var target =  $(this).attr('data-user');
	$('.list').load("admin.php?edit_user="+target);
});
//  редактирование оператора ринку
$(document).on('click', ".edit_operator_rinku",function(){
	var target =  $(this).attr('data-user');
	$('.all_operator_rinku').load("admin.php?edit_operator_rinku="+target);
});

// редактирование записи
$(document).on('click', ".edit_items",function(){
	var target =  $(this).attr('data-items');
	$('.list').load("add.php?edit_items="+target);
});
//пагинация главного меню
$(document).on('click', ".btntype",function(){
	var target =  $(this).attr('data-target');
	$(".btntype").removeClass('active');
	$(".btntype .button").removeClass('green');
	$(".items").removeClass('active');
	$("[data-target="+target+"]").addClass('active');
	$("[data-target="+target+"] .button").addClass('green');
	$(".items."+target).addClass('active');
});
// меню второстипенное
$(document).on('click', ".btntypein",function(){
	var target =  $(this).attr('data-target');
	$(".btntypein").removeClass('active');
	$(".btntypein .button").removeClass('green');
	$(".itemses").removeClass('active');
	$("[data-target="+target+"]").addClass('active');
	$("[data-target="+target+"] .button").addClass('green');
	$(".itemses."+target).addClass('active');
	$(".itemses."+target).load(target+".php");
});

//exit
$(document).on('click', ".exit",function(){
	var target =  $(this).attr('data-target');
	$('body').load("close_bd.php");
});

window.setInterval(function(){
if ($("#messege").length){
	var targetid = $('#messege li:last').attr('id');
	//$('#messege').load("chat_all.php?load=".targetid);
				$.ajax({
						url: 'chat_all.php',
						type: 'GET',
						data: {'load': targetid},
						dataType: 'html',
						success: function(data) {
							$('#messege').append(data);
							if(data){
								var scrull=($('#messege li:last').offset().top);
								$(function() {$(".all_chat").scrollTop(scrull);});
							}
						},
						error:  function(xhr, str){
						// alert('Возникла ошибка: ' + xhr.responseCode);
						console.log('Возникла ошибка: ' + xhr.responseCode);
									}
				});
		}
}, 1000);

// пошук оператора ринку new
$(document).on('click', ".serth_submit_operator",function(){
	var tsrget =$(this).attr('data-target');



	if($(".serth_operator [name='edrpo']").val().length >= 2){

		var serch = $(".serth").val();

		if (tsrget == 'virobnyk'){
			var name = 'віробник';
		}
		if (tsrget == 'exporter'){
			var name = 'Єкспортер';
		}
		if (tsrget == 'recipient'){
			var name = 'одержувач';
		}
		if (tsrget == 'expeditor'){
			var name = 'Експедитор';
		}
		if (tsrget == 'importer'){
			var name = 'Імпортер';
		}
		 $.post(
			 "search_operator_rinku.php",
			 {
				 virobnyk_serth: serch,
				 tsrget : tsrget
			 },
			 onAjaxSuccess
		 );

		 function onAjaxSuccess(data)
		 {
			 // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
			 if (!data =='')
			 {
				 $('.serth_operator').html(data).fadeIn();
				 if(name=='віробник'){
					 $("[name='cuntry_virobnyk']").click();
				 }
				  $('.serth_operator').append("<br><span class='button green serth_submit_operator' data-target='virobnyk'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");
			 } else {
				 $('.serth_operator').html("<span>Збігів не знайдено введіть данні "+name+":</span><br><input type='text' name='edrpo' class='serth' size='30'  value='' placeholder='введіть код ЄДРПОУ/Індіфікатор' required ><input type='text' name='fullname' size='30'  value='' placeholder='"+name+" назва' required ><input type='text' name='cuntry' size='30'  value='' placeholder='Країна походження' required ><br><span class='button green serth_submit_operator' data-target='virobnyk'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");
			 }

		 }
	}
});
//удаляем оператора из список заявки
$(document).on('click', "[name='deloperator']",function(){
	var target = $(this).attr('data-del');
	var targetclass = $(this).parent().attr('class');
	var edrpo_del = $(".find_operator #"+target+" .edrpo").text();
	var fullname_del = $(".find_operator #"+target+" .fullname").text();
	var cuntry_del = $(".find_operator #"+target+" .cuntry").text();
	console.log(targetclass);

	var edrpo_out = $(".find_operator .inputs."+targetclass+" [name='edrpo_"+targetclass+"']").val().replace(edrpo_del,'');
	var fullname_out = $(".find_operator .inputs."+targetclass+" [name='fullname_"+targetclass+"']").val().replace(fullname_del,'');
	var cuntry_out = $(".find_operator .inputs."+targetclass+" [name='cuntry_"+targetclass+"']").val().replace(cuntry_del,'');
	var edrpo_out = edrpo_out.replace(';;',';');
	var fullname_out = fullname_out.replace(';;',';');
	var cuntry_out = cuntry_out.replace(';;',';');
	if (edrpo_out[0]==';'){
		edrpo_out = edrpo_out.slice(1,edrpo_out.length);
		fullname_out = fullname_out.slice(1,fullname_out.length);
	  cuntry_out = cuntry_out.slice(1,cuntry_out.length);
	}
	if (edrpo_out[edrpo_out.length-1]==';'){
		edrpo_out = edrpo_out.slice(0,edrpo_out.length-1);
		fullname_out = fullname_out.slice(0,fullname_out.length-1);
		cuntry_out = cuntry_out.slice(0,cuntry_out.length-1);
	}
	$(".find_operator .inputs."+targetclass+" [name='edrpo_"+targetclass+"']").val(edrpo_out);
	$(".find_operator .inputs."+targetclass+" [name='fullname_"+targetclass+"']").val(fullname_out);
	$(".find_operator .inputs."+targetclass+" [name='cuntry_"+targetclass+"']").val(cuntry_out);
	//console.log(edrpo_out);
	//console.log(fullname_out);
	//console.log(cuntry_out);
	serch_zaborony(cuntry_out);

	$('#'+target).remove();
});

//добавляем оператора в список заявки
$(document).on('click', ".addoperatorrinku",function(){
	var target = $("#typeoperatorrinky").val();
	var edrpo = $("input[name='edrpo']").val();
	var fullname = $("input[name='fullname'").val();
	var cuntry = $("input[name='cuntry'").val();

	if (edrpo && fullname && cuntry) {
			if ($("#"+edrpo+target).length){

			} else {
				if ($(".inputs."+target).length){
					$(".find_operator").append("<li class='"+target+"' id='"+edrpo+target+"'><span>"+target+":</span><span> Індентифікатор :</span><span class='edrpo'>"+edrpo+"</span><span class='fullname'>"+fullname+"</span><span>Країна походження:</span><span class='cuntry'>"+cuntry+"</span>  <span class='fa fa-trash arreysettings button red' name='deloperator' data-del='"+edrpo+target+"'></span>   </li>");
					var edrpo_out = $(".find_operator .inputs."+target+" [name='edrpo_"+target+"']").val();
					var fullname_out = $(".find_operator .inputs."+target+" [name='fullname_"+target+"']").val();
					var cuntry_out = $(".find_operator .inputs."+target+" [name='cuntry_"+target+"']").val();
					edrpo_out +=";"+edrpo;
					fullname_out +=";"+fullname;
					cuntry_out +=";"+cuntry;
				//	console.log(edrpo_out);
				//	console.log(fullname_out);
				//	console.log(cuntry_out);
					if (target=='virobnyk'){
							serch_zaborony(cuntry_out);
					}
					$(".find_operator .inputs."+target+"").html("<input name='edrpo_"+target+"' type='hidden' class='serth' size='30' value='"+edrpo_out+"'><input name='fullname_"+target+"' type='hidden' size='30' value='"+fullname_out+"'><input type='hidden' name='cuntry_"+target+"' size='30' value='"+cuntry_out+"'>");

				} else {
					if (target=='virobnyk'){
							serch_zaborony(cuntry);
					}
				  	$(".find_operator").append("<li class='"+target+"' id='"+edrpo+target+"'><span>"+target+":</span><span> Індентифікатор :</span><span class='edrpo'>"+edrpo+"</span><span class='fullname'>"+fullname+"</span><span>Країна походження:</span><span class='cuntry'>"+cuntry+"</span>  <span class='fa fa-trash arreysettings button red' name='deloperator' data-del='"+edrpo+target+"'></span>   </li>");
						$(".find_operator").append("<li class='inputs "+target+"'><input name='edrpo_"+target+"' type='hidden' class='serth' size='30' value='"+edrpo+"'><input name='fullname_"+target+"' type='hidden' size='30' value='"+fullname+"'><input type='hidden' name='cuntry_"+target+"' size='30' value='"+cuntry+"'></li>");
				}
			}
	}




});


// пошук оператора ринку
$(document).on('click', ".serth_submit",function(){
	var tsrget =$(this).attr('data-target');
	var target =$(this).parent().attr('data-target');

	if($("."+target+" #"+tsrget+"_serth").val().length >= 2){

		var serch = $("."+target+" #"+tsrget+"_serth").val();

		if (tsrget == 'virobnyk'){
			var name = 'віробник';
		}
		if (tsrget == 'exporter'){
			var name = 'Єкспортер';
		}
		if (tsrget == 'recipient'){
			var name = 'одержувач';
		}
		if (tsrget == 'expeditor'){
			var name = 'Експедитор';
		}
		if (tsrget == 'importer'){
			var name = 'Імпортер';
		}
		 $.post(
			 "search_operator_rinku.php",
			 {
				 virobnyk_serth: serch,
				 tsrget : tsrget
			 },
			 onAjaxSuccess
		 );

		 function onAjaxSuccess(data)
		 {
			 // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
			 if (!data =='')
			 {
				 $('.'+tsrget).html(data).fadeIn();
				 if(name=='віробник'){
					 $("[name='cuntry_virobnyk']").click();
				 }
			 } else {
				  $('.'+tsrget).html("<span>Збігів не знайдено введіть данні "+name+":</span><br><input type='text' name='edrpo_"+tsrget+"' size='30'  value='' placeholder='введіть код ЄДРПОУ/Індіфікатор' required ><input type='text' name='fullname_"+tsrget+"' size='30'  value='' placeholder='"+name+" назва' required ><input type='text' name='cuntry_"+tsrget+"' size='30'  value='' placeholder='Країна походження' required ><br>");
			 }

		 }
	}
});

//serth operator operator_rinku
$(document).on('change keyup input click', "#typeoperatorrinky",function(){
	var target = $(this).val();

	switch(target) {
	  case 'virobnyk':
			$('.serth_operator').html("<input type='text' name='edrpo' class='serth' id='serth_virobnyk' size='30' value='' placeholder='введіть код ЄДРПОУ/Індіфікатор'><input type='text' name='fullname' size='30' value='' placeholder='Назва виробника'><input type='text' name='cuntry' size='30' value='' placeholder='Країна походження' required=''><br><span class='button green serth_submit_operator' data-target='virobnyk'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");

		break;

	  case 'exporter':
			$('.serth_operator').html("<input type='text' name='edrpo' class='serth' id='serth_exporter' size='30' value='' placeholder='введіть код ЄДРПОУ/Індіфікатор'><input type='text' name='fullname' size='30' value='' placeholder='Назва виробника'><input type='text' name='cuntry' size='30' value='' placeholder='Країна походження' required=''><br><span class='button green serth_submit_operator' data-target='exporter'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");

	  break;

		case 'expeditor':
			$('.serth_operator').html("<input type='text' name='edrpo' class='serth' id='serth_expeditor' size='30' value='' placeholder='введіть код ЄДРПОУ/Індіфікатор'><input type='text' name='fullname' size='30' value='' placeholder='Назва виробника'><input type='text' name='cuntry' size='30' value='' placeholder='Країна походження' required=''><br><span class='button green serth_submit_operator' data-target='expeditor'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");

		break;

		case 'recipient':
			$('.serth_operator').html("<input type='text' name='edrpo' class='serth' id='serth_recipient' size='30' value='' placeholder='введіть код ЄДРПОУ/Індіфікатор'><input type='text' name='fullname' size='30' value='' placeholder='Назва виробника'><input type='text' name='cuntry' size='30' value='' placeholder='Країна походження' required=''><br><span class='button green serth_submit_operator' data-target='recipient'>пошук</span><span class='fa fa-plus-square button green addoperatorrinku' aria-hidden='true'></span>");

		break;

	  default:
	  break;
	}

});


// ajax zaborony
function serch_zaborony(target) {
	targets=target.split(';');
	let targetsone = new Set(targets);
	console.log(targetsone);
	 $('.zaborony').html("");
	targetsone.forEach(function(item){
		console.log('ping');
		console.log(item);
			$.post(
				"search_zaborony.php",
				{
					target : item
				},
				onAjaxSuccess
			);

	});


	function onAjaxSuccess(data)
	{
		// Здесь мы получаем данные, отправленные сервером и выводим их на экран.
		if (!data =='')
		{
			$('.zaborony').append(data).fadeIn();
		} else {
			if ($('.zaborony').length){
			} else {
				 $('.zaborony').html("<span>Заборон не знайдено!</span><br>");
			 }
		}

	}
}

$(document).on('change keyup input click', "[name='cuntry_virobnyk']",function(){
	var target = $(this).val();

	if(target.length >= 3) {
			serch_zaborony(target);
			console.log(target);
	}

});


// chat ajax
$(document).on('click', ".add_chat",function(){
			var msg   = $('#msgchatall').serialize();
			//  var msg = $('#tranzitform').serialize();
				 $.ajax({
		           type: 'POST',
		           url: 'chat_send.php',
		           data: msg,
		           success: function(data) {
		             $('#messege').html(data);
		           },
		           error:  function(xhr, str){
		 	   // alert('Возникла ошибка: ' + xhr.responseCode);
				 console.log('Возникла ошибка: ' + xhr.responseCode);
		           }
		         });
	 $('input#msgchatall').val('');
	 $('#messege').load("chat_all.php");
	 $('.all_chat').scrollTop($('.all_chat')[0].scrollHeight);
});

// serch items
$(document).on('click', "#serchitems",function(){
			var msg   = $('#sertchitemsform').serialize();
			//  var msg = $('#tranzitform').serialize();
				 $.ajax({
		           type: 'POST',
		           url: 'serchitems.php',
		           data: msg,
		           success: function(data) {
		             $('#serchrezult').html(data);
		           },
		           error:  function(xhr, str){
		 	   // alert('Возникла ошибка: ' + xhr.responseCode);
				 console.log('Возникла ошибка: ' + xhr.responseCode);
		           }
		         });
	 $('#sertchitemsform input').val('');
});

$(document).on('keypress', "#msgchatall",function(e){

    var code = e.keyCode || e.which;
    if ( code == 13 ) {
        e.preventDefault();
        return false;
    }
});

//проверка форми
	var allcheck = 0;
$(document).on('change ', ".import form .itemses",function(){
	var check = 0;
//console.log('ping');
	var target = $(this).attr('data-target');
	$(this).find("input,select").each(function( index ) {
		//console.log( index + ": "+$(this).attr('name') );

		if ($(this).val().length == 0){
			check++;
		}
	});
	if (check == 0) {
		$('.menuseckond [data-target='+target+'] span .fa-check').addClass('active');
		$('.menuseckond [data-target='+target+'] span .fa-exclamation').removeClass('active');
		allcheck++;
	} else {
		$('.menuseckond [data-target='+target+'] span .fa-check').removeClass('active');
		$('.menuseckond [data-target='+target+'] span .fa-exclamation').addClass('active');
		if (allcheck > 0) {
		//	allcheck--;
		}
	}
	//console.log(allcheck);
	if (allcheck == 3){
	//		$('input.submit').addClass('green');

	} else {
		//	$('.submit').removeClass('green');
			//console.log(allcheck);
	}
});

$(document).on('change keyup input click', ".who",function(){
    if(this.value.length >= 2){
			var serch = this.value;
			//  var msg = $('#tranzitform').serialize();

			 $.post(
			   "search.php",
			   {
			     objektkontrolbagajax: serch
			   },
			   onAjaxSuccess
			 );

			 function onAjaxSuccess(data)
			 {
			   // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
			  // alert(data);
				 $('.search_result').html(data).fadeIn();
			 }
    }
});
$(".search_result").hover(function(){
    $(".who").blur();
//Убираем фокус с input
});

//При выборе результата поиска, прячем список и заносим выбранный результат в input



$(document).on("click", ".serchobjektkontrolbagajax", function(){
  //s_user = $(this).text();
	var uktz = $(this).text();
	var target =  $(this).attr('data-target');

$(".uktz .who").val(uktz);
$(".uktz .who").attr('value',uktz);
//$(".uktz .who").attr('placeholder',uktz);

//$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно

    $(".search_result").fadeOut();
//})
});

// добовляем авто import
$(document).on('click', ".addtransport",function(){
	var counttranspotr = $(".counttransport.inportcountauto").val();
	var tsrget =$(this).attr('data-target');
//	var send={'counttranspotr':counttranspotr}
	counttranspotr++;
	//console.log(counttranspotr);
	$.ajax({
 			url: 'count_ayto_add.php',
			type: 'POST',
			data: {'counttr': counttranspotr},
			dataType: 'html',
			success: function(data) {
				$('.'+tsrget+' form .auto').append(data); /* выведет Moscow на странице */
			},
			error:  function(xhr, str){
			// alert('Возникла ошибка: ' + xhr.responseCode);
			console.log('Возникла ошибка: ' + xhr.responseCode);
						}
  });
	//$('.items.active form .auto').append("<br><input type='text' name='objektkontroltransport"+counttranspotr+"' size='30'  value='' placeholder='Транспортний засіб (вид, номер)' required ><input type='text' name='countbag"+counttranspotr+"' size='30'  value='' placeholder='Кількість (вага, шт.)/кількість місць' required >");
	$(".counttransport").val(counttranspotr);
});
// добовляем авто tranzit
$(document).on('click', ".addtransporttranzit",function(){
	var target = $(this).attr('data-target');
	var counttranspotr = $("."+target+"countauto").val();
//	var send={'counttranspotr':counttranspotr}
	counttranspotr++;
	console.log(counttranspotr);
	$.ajax({
 			url: 'count_ayto_add.php',
			type: 'POST',
			data: {'counttr': counttranspotr},
			dataType: 'html',
			success: function(data) {
				$('.'+target+' form .auto').append(data);
			},
			error:  function(xhr, str){
			// alert('Возникла ошибка: ' + xhr.responseCode);
			console.log('Возникла ошибка: ' + xhr.responseCode);
						}
  });
	//$('.items.active form .auto').append("<br><input type='text' name='objektkontroltransport"+counttranspotr+"' size='30'  value='' placeholder='Транспортний засіб (вид, номер)' required ><input type='text' name='countbag"+counttranspotr+"' size='30'  value='' placeholder='Кількість (вага, шт.)/кількість місць' required >");
	$("."+target+"countauto").val(counttranspotr);
});
// добовляем авто внутредержавнеперевезення
$(document).on('click', ".addtransportinnerperevoz",function(){
	var target = $(this).attr('data-target');
	var counttranspotr = $("."+target+"countauto").val();
	counttranspotr++;
	console.log(counttranspotr);
	$.ajax({
 			url: 'count_ayto_add.php',
			type: 'POST',
			data: {'counttr': counttranspotr},
			dataType: 'html',
			success: function(data) {
				$('.'+target+' form .auto').append(data);
			},
			error:  function(xhr, str){
			// alert('Возникла ошибка: ' + xhr.responseCode);
			console.log('Возникла ошибка: ' + xhr.responseCode);
						}
  });
	//$('.items.active form .auto').append("<br><input type='text' name='objektkontroltransport"+counttranspotr+"' size='30'  value='' placeholder='Транспортний засіб (вид, номер)' required ><input type='text' name='countbag"+counttranspotr+"' size='30'  value='' placeholder='Кількість (вага, шт.)/кількість місць' required >");
	$("."+target+"countauto").val(counttranspotr);
});
// добовляем авто єкспорт
$(document).on('click', ".addtransportexport",function(){
	var target = $(this).attr('data-target');
	var counttranspotr = $("."+target+"countauto").val();
	counttranspotr++;
	console.log(counttranspotr);
	$.ajax({
 			url: 'count_ayto_add.php',
			type: 'POST',
			data: {'counttr': counttranspotr},
			dataType: 'html',
			success: function(data) {
				$('.'+target+' form .auto').append(data);
			},
			error:  function(xhr, str){
			// alert('Возникла ошибка: ' + xhr.responseCode);
			console.log('Возникла ошибка: ' + xhr.responseCode);
						}
  });
	//$('.items.active form .auto').append("<br><input type='text' name='objektkontroltransport"+counttranspotr+"' size='30'  value='' placeholder='Транспортний засіб (вид, номер)' required ><input type='text' name='countbag"+counttranspotr+"' size='30'  value='' placeholder='Кількість (вага, шт.)/кількість місць' required >");
	$("."+target+"countauto").val(counttranspotr);
});
$(document).on('click', ".remtransportexport",function(){
		var tsrget =$(this).attr('data-target');
		var counttranspotr = $("."+tsrget+"countauto").val();

	if (counttranspotr > 1) {
			counttranspotr--;
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$("."+tsrget+"countauto").val(counttranspotr);
		}
});
$(document).on('click', ".remtransportinnerperevoz",function(){
		var tsrget =$(this).attr('data-target');
		var counttranspotr = $("."+tsrget+"countauto").val();

	if (counttranspotr > 1) {
			counttranspotr--;
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$("."+tsrget+"countauto").val(counttranspotr);
		}
});
$(document).on('click', ".remtransporttranzit",function(){
		var tsrget =$(this).attr('data-target');
		var counttranspotr = $("."+tsrget+"countauto").val();

	if (counttranspotr > 1) {
			counttranspotr--;
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$("."+tsrget+"countauto").val(counttranspotr);
		}
});

$(document).on('click', ".remtransport",function(){
	var counttranspotr = $(".counttransport").val();
	var tsrget =$(this).attr('data-target');
	if (counttranspotr > 1) {
			counttranspotr--;
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$('.'+tsrget+'.active form .auto select:last option').remove();
			$('.'+tsrget+'.active form .auto *:last').remove();
			$(".counttransport").val(counttranspotr);
		}
});
