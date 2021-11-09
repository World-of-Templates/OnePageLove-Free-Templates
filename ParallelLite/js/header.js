;(function($){

	var num = 1; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > num) {
	        $('.top-navbar').addClass('fixed-menu');
			$('.navbar').removeClass('navbar-transparent');
			$('.navbar').addClass('navbar-default');
	    } else {
	        $('.top-navbar').removeClass('fixed-menu');
			$('.navbar').removeClass('navbar-default');
			$('.navbar').addClass('navbar-transparent');
	    }
	});

})(jQuery);