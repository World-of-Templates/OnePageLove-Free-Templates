;(function($){
	var num = 1; //number of pixels before modifying styles
	$(window).bind('scroll', function () {
	    if ($(window).scrollTop() > num) {
			$('.navbar').removeClass('navbar-dark');
			$('.navbar').addClass('navbar-light');
			$('.navbar').removeClass('bg-transparent');
			$('.navbar').addClass('bg-white');
			$('.site-title').addClass('text-dark');
			$('.navbar .cta.btn-outline-success').addClass('text-dark');
			$('.navbar').addClass('border-bottom');
	    } else {
			$('.navbar').removeClass('navbar-light');
			$('.navbar').addClass('navbar-dark');
			$('.navbar').removeClass('bg-white');
			$('.navbar').addClass('bg-transparent');
			$('.site-title').removeClass('text-dark');
			$('.navbar .cta.btn-outline-success').removeClass('text-dark');
			$('.navbar').removeClass('border-bottom');
	    }
	});
})(jQuery);