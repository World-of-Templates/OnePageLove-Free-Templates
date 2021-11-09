// JavaScript Document

(function(){

	jQuery(document).ready(function($) {

		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				doScroll(this.hash);
				return false;
			}
		});

		if(jQuery(window).scrollTop() < 100){
			jQuery('.navbar li:first').addClass('active');
		}

	});

var header_height = jQuery('.top-navbar').height();

jQuery(window).load(function(){

			if(jQuery(location.hash).length >0){
				setTimeout(function() {
					doScroll(location.hash);
				}, 1);
			}
});


jQuery(window).scroll(function() {
	var currentScrollPos = jQuery(window).scrollTop();
	if (currentScrollPos >= 100) {

		var activeItem = 'welcome';

		jQuery('section').each(function() {
			var pos = jQuery(this).position().top;
			if (currentScrollPos >= (pos - header_height)) {
				activeItem = jQuery(this).attr('id');
			}
		});

		jQuery('.navbar li.active').removeClass('active');
		jQuery('a[href$=#'+ activeItem +']').parent().addClass('active');
	}else{
		jQuery('.navbar li.active').removeClass('active');
		jQuery('.navbar li:first').addClass('active');
	}
});

function doScroll(hash){
	var target = jQuery(hash);
	target = target.length ? target : jQuery('[name=' + hash.slice(1) +']');

	if (target.length) {
		jQuery('html, body').animate({
			scrollTop: ((jQuery(target).offset().top - (header_height-2)) + "px")
		},{
			duration: 1000,
			easing: 'easeOutQuad'
		});
	}
}
})();