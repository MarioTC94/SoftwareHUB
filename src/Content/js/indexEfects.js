$(document).ready(function(){
	//Animacion para los enlaces del menu
	$("header .menu > a, .contenedor-submenu").each(function(index, elemento){
		$(this).css({
			"top": "-200px"
		});
		$(this).animate({
			"top": "0"
		}, 2000+(index*400));
	});

	$(window).scroll(function(){
		var barra = $(this).scrollTop();
		var posicion =  (barra * 0.25);
		
		if($(this).width() > 1024){
			$('.paralax').css({
				'background-position': '0 -' + posicion + 'px'
			});
		}
	});
});