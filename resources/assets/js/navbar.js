$(function(){
	var prev = 0;
	$(window).on('scroll', function(){
	  	var scrollTop = $(window).scrollTop();
	  	if(scrollTop < prev){
	  		navShow();
	  	}
	  	if(scrollTop > $('.navbar-top').offset().top){
	  		if(scrollTop > prev){
	  			if(scrollTop < 600){
	  				navShow();
	  			}else{
	  				navHide();
	  			}
		  	}else{
		  		navShow();
		  	}
	  	}else{
	  		navHide();
	  	}
	  	prev = scrollTop;
	  	
	});
});

function navShow(){
	$('.navbar-scroll').removeClass('hidden');
	$('.navbar-scroll').addClass('show');	
}
function navHide(){
	$('.navbar-scroll').removeClass('show');
	$('.navbar-scroll').addClass('hidden');	
}