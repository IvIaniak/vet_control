$(function(){
	//slik
			$('.sliklineslog').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1500,
			infinite: true,
			speed: 1500
			});

	if ($(window).width() < $(window).height()*1.5){
		$('.bacgraund > *').css('height','100%');
	} else {
		$('.bacgraund > *').css('width','100%');
	}
	$('.preloader').css('visibility','hidden');
	$('.preloader').css('opacity',0);
	$('.haned').css('top',0);
	//загрузка видео backgraunda
	window.onload = function() {
	   $('.bacgraund').append("<video src='../video/test111.mp4' autoplay loop muted></video>");
	   $('.bacgraund > video').css('top',0);
	   $('.bacgraund > video').css('width',"100%");
	   $('.paralax.prewback').addClass('deactive');
	   $('.vodeoinfo').append("<video src='../video/mct.mp4' autoplay muted></video>");
	   $('.vodeoinfo > img').addClass('deactive');
	   $('.vodeoinfo > video').css('top',0);
	   $('.vodeoinfo > video').css('width',"100%");


	 };

	setInterval(function () {
		$('.topmenu').css('top',0);
	}, 800);
	setTimeout(function () {
		$('.contents').addClass('active');
		$('.contents').children().first().addClass('active');
		$('.new').addClass('active');

	}, 1300);
	//поиск контейнера
	setTimeout(function(){
		$('#shipid_tf').css('width','100%');
		$('#shipid_tf').css('text-align','center');
		$('#shipid_tf > p > form > div').html('<p id="idhendtextfuind" style="color: #cccccc;">Введите номер контейнера</p>');

	}, 1300);

	$(document).on('click', ".btnkurs",function(){
		var target = $(this).attr('data-terget');

		if ($('#'+target).hasClass('active')){
			$('#'+target).removeClass('active');
			$('[data-terget="'+target+'"] > .fa').css('transform','rotate(90deg)');
		}else {
			$('#'+target).addClass('active');
			$('[data-terget="'+target+'"] > .fa').css('transform','rotate(0deg)');
			}
		});
		//верхнее меню
		$(document).on('click', ".btn",function(){
			var target = $(this).attr('data-terget');

				$('.contents').children().removeClass('active');

				$('.contents > .'+target).addClass('active');
				if ($(this).hasClass('pag')){
					$('.contents > .servises').addClass('active');
					$('.paginator').removeClass('active');
					$('[data-target=s'+target+']').addClass('active');
					$('.infoservis').removeClass('active');
					$('.s'+target+'.infoservis').addClass('active');
				}
					if (target=="gallerys"){

									$('.mediafoto').slick({
									slidesToShow: 1,
									slidesToScroll: 1,
									autoplay: true,
									centerMode: true,
									variableWidth: true,
									speed: 1500,
									autoplaySpeed: 2000
									});

					} else  if ($('.mediafoto').hasClass('slick-slider')){
						 $('.mediafoto').slick('slickUnfilter');
						 $('.paginatormedia').removeClass('active');
						$('.mediafoto').slick('unslick');
						$('.mediafoto > img').removeClass('active');
					}

			});
			//заказ звонка
			$(document).on('click', "#phone",function(){
				var target = $(this).attr('data-terget');
					if ($('.collbac').hasClass('active')){
						$('.collbac').removeClass('active');
					}else {
						$('.collbac').addClass('active');
					}
				});
			//кнопка вврх
			window.onscroll = function() {
			  var scrolled = window.pageYOffset;

			  $('#paralax').animate({
			  'top': (-scrolled/100*3)
		  }, 20);

if (($('body').height()-$(window).height()-$ ('.footer').height()*0.5)<scrolled) {
	if (!$('.leftfooter').hasClass('slick-slider')){
		$('.leftfooter').slick({

		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		speed: 2500,
		infinite: true,
		fade: true,
		autoplaySpeed: 3000
		});
	}
	$('.leftfooter').addClass('active');
	$('.centrfooter').addClass('active');
	$('.rightfooter').addClass('active');

}
			if (scrolled > 0){
				if (!$('.buttomup').hasClass('active')){
					$('.buttomup').addClass('active');
				}
			} else {
						$('.buttomup').removeClass('active');
				}
			}
			$(document).on('click', "#butmup",function(){
			    var scrol = window.pageYOffset;
			    $('html, body').animate({ 'scrollTop' : 0 }, 500);
			 // console.log(-scrol);
		  	});
			//пагинатор услуги
			$(document).on('click', ".paginator",function(){
			var target = $(this).attr('data-target');

				$('.infoservis').removeClass('active');
				$('.'+target+'.infoservis').addClass('active');

				$('.paginator').removeClass('active');
				$(this).addClass('active');
			});
			//пагинатор медиа filter
			$(document).on('click', ".paginatormedia",function(){
			var target = $(this).attr('data-target');


				$('.mediafoto > img').removeClass('active');
				$('.mediafoto > .'+target).addClass('active');

				$('.paginatormedia').removeClass('active');
				$(this).addClass('active');
				if (target =='f1') {
				  $('.mediafoto').slick('slickUnfilter');
				 $('.mediafoto').slick('unslick');
			   $('.mediafoto').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				centerMode: true,
				variableWidth: true,
				speed: 1500,
				autoplaySpeed: 2000
				});
			  	}
				 if (target =='f2') {
					 $('.mediafoto').slick('slickUnfilter');
					 $('.mediafoto').slick('unslick');
  				   $('.mediafoto').slick({
  					slidesToShow: 1,
  					slidesToScroll: 1,
  					autoplay: true,
  					centerMode: true,
  					variableWidth: true,
  					speed: 1500,
  					autoplaySpeed: 2000
  					});
				  $('.mediafoto').slick('slickFilter','.f2');
			   }
			    if (target =='f3') {
					$('.mediafoto').slick('slickUnfilter');
					$('.mediafoto').slick('unslick');
 				   $('.mediafoto').slick({
 					slidesToShow: 1,
 					slidesToScroll: 1,
 					autoplay: true,
 					centerMode: true,
 					variableWidth: true,
 					speed: 1500,
 					autoplaySpeed: 2000
 					});
				    $('.mediafoto').slick('slickFilter','.f3');
				}
				 if (target =='f4') {
					 $('.mediafoto').slick('slickUnfilter');
					 $('.mediafoto').slick('unslick');
   				  $('.mediafoto').slick({
   				   slidesToShow: 1,
   				   slidesToScroll: 1,
   				   autoplay: true,
   				   centerMode: true,
   				   variableWidth: true,
   				   speed: 1500,
   				   autoplaySpeed: 2000
   				   });
   				  $('.mediafoto').slick('slickFilter','.f4');
			  	}
				 if (target =='f5') {
					 $('.mediafoto').slick('slickUnfilter');
					 $('.mediafoto').slick('unslick');
					 $('.mediafoto').slick({
					  slidesToShow: 1,
					  slidesToScroll: 1,
					  autoplay: true,
					  centerMode: true,
					  variableWidth: true,
					  speed: 1500,
					  autoplaySpeed: 2000
					  });
  				 $('.mediafoto').slick('slickFilter','.f5');
			 }
			  if (target =='f6') {
				  $('.mediafoto').slick('slickUnfilter');
				  $('.mediafoto').slick('unslick');
				  $('.mediafoto').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					variableWidth: true
					});
	   			   $('.mediafoto').slick('slickFilter','.f6');
	   		 	}

			});

			// обработка кнопок отпраки на почту принтер телефон
		$(document).on('click', ".itemsendmap",function(){
			var target = $(this).attr('data-doit');

			if (target=="print"){
				window.print();
			}
			if (target=="mobsend"){
				console.log(target);
				var buttonID = "sendmobid";
			    var text = "Реквизиты OOO «MCIT CEPBIC» и карта подъезда к терминалу.";
			    document.getElementById(buttonID).setAttribute('href', "viber://forward?text=" + encodeURIComponent(text + " " + window.location.href));
			}
		});
//hover при focus ащкь не исчезает
	$('#sendmailfronhend > input').focus(function() {
		$('.wrapper > .haned > .row-12 > .col > .contact > .contacts > form').addClass('active');
	});

	$('#sendmailfronhend > input').blur(function() {
		$('.wrapper > .haned > .row-12 > .col > .contact > .contacts > form').removeClass('active');
	});
//управление плеером видео
	$('[datd-do]').click(function(){
		var doit = $(this).attr('datd-do');
		if (doit == "play") {
			$(this).removeClass('active');
			$(this).parent().find('.fa.fa-pause').addClass('active');
			$(this).parent().find('video')[0].play();

			$(this).parent().find('video').bind("ended", function() {
				$(this).parent().find('.fa.fa-pause').removeClass('active');
				$(this).parent().find('.fa.fa-play').addClass('active');
			});

		} else {
			$(this).removeClass('active');
			$(this).parent().find('.fa.fa-play').addClass('active');
			$(this).parent().find('video')[0].pause();

		}
	});
});
