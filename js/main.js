// AOS Instance
AOS.init();

jQuery(document).ready(function($){

	$('.close_menu').click(function(){
		$(".menu_mobile").fadeToggle();
	});
	$('.btn_book_mobile').click(function(){
		$(".sidebar").fadeToggle();
	});

	$('.slider_villa').owlCarousel({
		loop:false,
		margin:0,
		nav:true,
		autoplay:true,
		smartSpeed:1000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:4
			}
		}
	});


	
});


