( function($) {
  'use strict';


	/*-------------------------------------------------------------------------------
	  Smooth scroll to anchor
	-------------------------------------------------------------------------------*/


	var navbar=$('.js-navbar');
	var navbarAffixHeight=40
	
    $('.js-target-scroll').on('click', function() {
        var target = $(this.hash);
        if (target.length) {
            $('html,body').animate({
                scrollTop: (target.offset().top - navbarAffixHeight + 1)
            }, 1000);
            return false;
        }
    });

	$('body').scrollspy({
			offset:  navbarAffixHeight + 1
		});
	



/*------------------------------------------------------------------
	Header Fixed on top
-------------------------------------------------------------------*/


 $(function() {
    var nav = $(".navfixedhide");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 1) {
            nav.removeClass('navfixedhide').addClass("navfixedshow animated fadeInDown");
        } else {
            nav.removeClass("navfixedshow animated fadeInDown").addClass('navfixedhide');
        }
    });
});



$('.navbar-toggle').on('click',function(){
  if($('header').hasClass('navfixedshow animated fadeInDown fixedleft')) {
        $('header').removeClass('fixedleft');
    } else {
        $('header').addClass('navfixedshow animated fadeInDown fixedleft');
    }
  });
  
$('.navbar-nav a ').on('click',function(){
  if($('.navbar-collapse').removeClass('in')) {
    $('header').removeClass('fixedleft');
  }
  });
  
$('.navbar-nav .dropdown a ').on('click',function(){
  if($('.navbar-collapse').addClass('in')) {
    $('header').addClass('fixedleft');
  }
  });



/*------------------------------------------------------------------
	testimonial slider
-------------------------------------------------------------------*/


$(document).ready(function() {
     
      var owl = $("#testimonial_slider");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 2],
            [1000, 2],
            [1200, 3],
            [1400, 3],
            [1600, 3]
          ],
          navigation : true,
		  autoPlay  : 3000
     
      });
     
    });
	



/*------------------------------------------------------------------
	Banner-slider
-------------------------------------------------------------------*/


    $(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
        autoPlay : 3000,
        stopOnHover : true,
        navigation:true,
        paginationSpeed : 1000,
        goToFirstSpeed : 2000,
        singleItem : true,
        autoHeight : true,
        transitionStyle:"fade"
      });
     
    });



/*------------------------------------------------------------------
	back to top
-------------------------------------------------------------------*/

$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

})(jQuery);
