
$( document ).ready(function() {
	$('span.lang').click(function(){
		var $lang = this.getAttribute("data-lang");
		var $url = "http://mcit.od.ua/index.php?lang="+$lang;
		window.parent.parent.location=$url;
	});


	$('#reloadall').click(function(){
		var $lang = this.getAttribute("data-lang");
		var $url = "http://mcit.od.ua/index.php?lang="+$lang;
		window.parent.parent.location=$url;
	});
});
