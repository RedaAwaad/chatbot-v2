
//Loading 
$(window).on('load', function() { 
	$('.loader-effect, .loader-effect img').fadeOut();	
	$('#layout-loading').fadeOut('slow');

});


$(document).ready(function() {
    
    'use strict';

	$('.navbar-collapse a').on('click', function() {
		$('.hamburger').removeClass('is-active collapsed')
		$(".navbar-collapse").collapse('hide');
		
	});
	
	$(window).on('resize',function(){
		if($(this).width() >991){
			$('#header').removeClass("open");
			$('.hamburger.is-active').trigger('click');
		}
	})
	/* Toggle menu button*/
    $('.hamburger').on('click', function() {
	  $(this).toggleClass('is-active','fast');
	  $("#header").toggleClass('open');
     }) 
	
	

	
	var duration = 500;
	for (let i = 1; i < 7; i++) {

		setTimeout(
			function() 
			{
				$('.qoute-'+i+'').fadeIn('');
				$('.device-'+i+'').fadeIn('');
				
			}, duration)
			duration = duration + i*50;
	}


	rotate();
	$(window).on('resize',function () {
		rotate();
	})
	function rotate() {
		if($(window).innerHeight() <520 ){
			$('#home').addClass('rotate');
			
		}
		else{
			$('#home').removeClass('rotate');
		}
	}
});    