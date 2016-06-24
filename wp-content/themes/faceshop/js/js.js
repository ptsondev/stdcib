jQuery(document).ready(function($){	
	$(".rslides").responsiveSlides({
		nav: true,      
	});
	
	$(window).bind('scroll', function() {		
		parallax();
	});	
	
	$( document ).tooltip();  
});


jQuery(window).load(function($) {
	/*jQuery("#list-new-products").flexisel({
		animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000      
	});*/
});


function parallax() {
	var scrollPos = $(window).scrollTop();	
	$('#why-using-stdweb').css('backgroundPosition', "50% " + Math.round(( scrollPos - $('#why-using-stdweb').offset().top) * 0.8) + "px");
	$('#footer-info').css('backgroundPosition', "50% " + Math.round(( scrollPos - $('#footer-info').offset().top) * 0.8) + "px");
	//console.log(scrollPos);
	
	// header
	if(scrollPos >140){
		$('#header').removeClass('unactive');
		$('#header').addClass('active');
	}else{
		$('#header').removeClass('active');
		$('#header').addClass('unactive');
	}
	
	if(scrollPos > 540){
		$('#home-make-sure img').addClass('active');
		$('#home-make-sure .moveL').addClass('active');
	}
}