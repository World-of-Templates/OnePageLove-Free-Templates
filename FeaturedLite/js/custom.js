/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 // flex background slider
jQuery(document).ready(function(jQuery) {
jQuery(window).load(function()  {
    var newspeed = jQuery("#txt_slidespeed").val();
    if ( jQuery('.fadein-slider .slide-item').length > 1 ) {
        jQuery('.fadein-slider .slide-item:gt(0)').hide();
        setInterval(function(){
            jQuery('.fadein-slider :first-child').fadeOut(2000).next('.slide-item').fadeIn(2000).end().appendTo('.fadein-slider');
        }, newspeed);
    }
   // loader
var featured_slide = jQuery('.fadein-slider');
    var featured_slideSrc = new Array();

    if( featured_slide.length ){
        jQuery.each( featured_slide, function(i, f){
            featured_slideSrc[i] = jQuery(f).attr('src');
            /*remove the src attribute so window will ignore these iframes*/
            jQuery(f).attr('src', '');
        }); 
    }
    
    function featured_slide_flex() {
        if( featured_slide.length ){
            jQuery.each( featured_slide, function(a, x){
                /*put the src attribute value back*/
                jQuery(x).attr('src', featured_slideSrc[a]);
            });
        }   
    }
    jQuery(".loader").fadeOut("slow");
    jQuery(".overlayloader").delay(1000).fadeOut("slow");
    setTimeout(featured_slide_flex, 2000);
});
});
/*-------------------------------------------------*/
/* srcolling-section-menu
/*--------------------------------------------------*/
function validUrlCheck(url){
  var url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
 return url_validate;
}

if ( jQuery( ".home" ).length ) {
  jQuery('.menu li a:first').addClass('active');
  jQuery(document).on("scroll", onScroll);
  function onScroll(event){
    var scrollPos = jQuery(document).scrollTop();
    if (scrollPos >= 100) {
        jQuery('a.page-scroll').each(function () {
        var currLink = jQuery(this);
        var url =currLink.attr("href");
      var url_validate = validUrlCheck(url);
  if(!url_validate.test(url)){
         var refElement = jQuery(currLink.attr("href"));
        if ( jQuery(url).length ) {
          if (refElement.position().top - 100 <= scrollPos && refElement.position().top - 100 + refElement.height() > scrollPos) {
            jQuery('.menu li a').removeClass('active');
            currLink.addClass("active");
          }
        }
  }
    });
} else {
    jQuery('.menu li a').removeClass('active');
    jQuery('.menu li a:first').addClass('active');
    }
}
}
    jQuery('a.page-scroll').bind('click', function(event) {
            var $anchor = jQuery(this);
            var url = $anchor.attr('href');
            var url_validate = validUrlCheck(url);
            if(!url_validate.test(url)){
              if ( jQuery( url ).length ) {
            jQuery('html, body').stop().animate({
            scrollTop: jQuery(url).offset().top-70
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
       }
      }
    });
/*-------------------------------------------------*/
/* srcolling-section-menu
/*--------------------------------------------------*/
/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
/* <![CDATA[ */
var themehunk_customscript = {
    "responsive": "1",
    "nav_menu": "secondary"
};
/* ]]> */
if (themehunk_customscript.responsive && themehunk_customscript.nav_menu != 'none') {
    jQuery(document).ready(function($) {
        // merge if two menus exist
        if (themehunk_customscript.nav_menu == 'both') {
            $('.navigation').not('.mobile-menu-wrapper').find('.menu').clone().appendTo('.mobile-menu-wrapper').hide();
        }

        $('.toggle-mobile-menu').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('body').toggleClass('mobile-menu-active');
        });

        // prevent propagation of scroll event to parent
        $(document).on('DOMMouseScroll mousewheel', '.mobile-menu-wrapper', function(ev) {
            var $this = $(this),
                scrollTop = this.scrollTop,
                scrollHeight = this.scrollHeight,
                height = $this.height(),
                delta = (ev.type == 'DOMMouseScroll' ?
                    ev.originalEvent.detail * -40 :
                    ev.originalEvent.wheelDelta),
                up = delta > 0;

            var prevent = function() {
                ev.stopPropagation();
                ev.preventDefault();
                ev.returnValue = false;
                return false;
            }

            if ($('a#pull').css('display') !== 'none') { // if toggle menu button is visible ( small screens )

                if (!up && -delta > scrollHeight - height - scrollTop) {
                    // Scrolling down, but this will take us past the bottom.
                    $this.scrollTop(scrollHeight);
                    return prevent();
                } else if (up && delta > scrollTop) {
                    // Scrolling up, but this will take us past the top.
                    $this.scrollTop(0);
                    return prevent();
                }
            }
        });
    }).on('click', function(event) {

        var $target = jQuery(event.target);
        if (($target.hasClass("fa") && $target.parent().hasClass("toggle-caret")) || $target.hasClass("toggle-caret")) { // allow clicking on menu toggles
            return;
        }

        jQuery('body').removeClass('mobile-menu-active');
    });


}
jQuery(document).ready(function($) {
    /*----------------------------------------------------
    /*  Dropdown menu
    /* ------------------------------------------------- */
    function thDropdownMenu() {
        var wWidth = $(window).width();
        // $('.sub-menu').attr("tabindex","0"); 
        if (wWidth > 1024) {
            $('.navigation ul.sub-menu, .navigation ul.children').hide();
            var timer;
            var delay = 100;
            $('.navigation li').hover(
                function() {
                    var $this = $(this);
                    timer = setTimeout(function() {
                        $this.children('ul.sub-menu, ul.children').slideDown('fast');
                    }, delay);

                },
                function() {
                    $(this).children('ul.sub-menu, ul.children').hide();
                    clearTimeout(timer);
                }
            );

            //keynavigation
       $(".menu-item a").focusin(function(){
            $(this).parent().prev().find('.sub-menu').css("display","none");
            $('+ .sub-menu', this).css("display","block");
           });

        } else {
            $('.navigation li').unbind('hover');
            $('.navigation li.active > ul.sub-menu, .navigation li.active > ul.children').show();
        
        }

    }

    thDropdownMenu();

    $(window).resize(function() {
        thDropdownMenu();
    });

    /*---------------------------------------------------
    /*  Vertical menus toggles
    /* -------------------------------------------------*/


    $('.widget_nav_menu, .navigation .menu').addClass('toggle-menu');
    $('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
    $('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');

    $('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret" tabindex="0"><i class="fa fa-plus"></i></span>');

    $('.toggle-caret').click(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
    });

    $('.toggle-caret').keypress(function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
    });

    //Owl carousel
    var newcnt = jQuery("#slidecnt").val();
    jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    autoplay:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        380:{
            items:1,
            nav:true
        },
        480:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:newcnt,
            nav:true
        }
    }
})

});
// Scroll down header
function init() {
    window.addEventListener('scroll', function(e) {
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 80,
            header = document.querySelector("header");
        if (distanceY > shrinkOn) {
            classie.add(header, "smaller");
            jQuery(".main-heading").addClass("smaller");
        } else {
            if (classie.has(header, "smaller")) {
                classie.remove(header, "smaller");
                jQuery(".main-heading").removeClass("smaller");
            }
        }
    });
}
window.onload = init();
if(jQuery("#back-to-top").val()=='' || jQuery("#back-to-top").val()=='0' ){ 
/*Show-hide Scroll to top & move-to-top arrow*/
jQuery("body").prepend("<a id='move-to-top' class='animate hiding' href='#header'><i class='fa fa-angle-up'></i></a>");

var scrollDes = 'html,body';
/*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
if (navigator.userAgent.match(/opera/i)) {
    scrollDes = 'html';
}
//show ,hide
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 160) {
        jQuery('#move-to-top').addClass('filling').removeClass('hiding');
    } else {
        jQuery('#move-to-top').removeClass('filling').addClass('hiding');
    }
});
}
//move to top
jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('#move-to-top').fadeIn();
        } else {
            jQuery('#move-to-top').fadeOut();
        }
    });
    jQuery('#move-to-top').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});
// lead form function
jQuery(window).load(function() {
jQuery('.leadform-show-form span').addClass("form-group");
});
jQuery( "input" ).focus(function() {
jQuery(this).parent().addClass("form-lined");
});
jQuery("input").blur(function() {
jQuery(this).parent().removeClass("form-lined")
});
jQuery( "textarea" ).focus(function() {
jQuery(this).parent().addClass("form-lined");
});
jQuery("textarea").blur(function() {
jQuery(this).parent().removeClass("form-lined")
});
 //map scrolling
jQuery(document).ready(function() {
    jQuery('.map').click(function () {
       jQuery('.map iframe').css("pointer-events", "auto");
    });
    
    jQuery( ".map" ).mouseleave(function() {
      jQuery('.map iframe').css("pointer-events", "none"); 
    });
 });
/*------------wow animation------------*/

wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    callback: function(box) {
        // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
});
wow.init();

function rams() {
        // Get all the link elements within the primary menu.
        var links, i, len,
            menu = document.querySelector( '.navigation' );

        if ( ! menu ) {
            return false;
        }

        links = menu.getElementsByTagName( 'a' );

        // Each time a menu link is focused or blurred, toggle focus.
        for ( i = 0, len = links.length; i < len; i++ ) {
            links[i].addEventListener( 'focus', toggleFocus, true );
            links[i].addEventListener( 'blur', toggleFocus, true );
        }

        //Sets or removes the .focus class on an element.
        function toggleFocus() {
            var self = this;

            // Move up through the ancestors of the current link until we hit .primary-menu.
            while ( -1 === self.className.indexOf( 'menu' ) ) {
                // On li elements toggle the class .focus.
                if ( 'li' === self.tagName.toLowerCase() ) {
                    if ( -1 !== self.className.indexOf( 'focus' ) ) {
                        self.className = self.className.replace( ' focus', '' );
                    } else {
                        self.className += ' focus';
                    }
                }
                self = self.parentElement;
            }
        }
    }

    rams();