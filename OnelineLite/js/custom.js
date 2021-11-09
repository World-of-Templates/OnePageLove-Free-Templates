 jQuery(document).ready(function() {
 "use strict";
// Dropdown menu
     function thDropdownMenu() {
         var wWidth = jQuery(window).width();
         if (wWidth > 1024) {
             jQuery('.navigation ul.sub-menu, .navigation ul.children').hide();
             var timer;
             var delay = 100;
             jQuery('.navigation li').hover(
                 function() {
                     var $this = jQuery(this);
                     timer = setTimeout(function() {
                         $this.children('ul.sub-menu, ul.children').slideDown('fast');
                     }, delay);

                 },
                 function() {
                     jQuery(this).children('ul.sub-menu, ul.children').hide();
                     clearTimeout(timer);
                 }
             );
             //keynavigation
            jQuery(".menu-item a").focusin(function(){
            jQuery(this).parent().prev().find('.sub-menu').css("display","none");
            jQuery('+ .sub-menu', this).css("display","block");
           });
         } else {
             jQuery('.navigation li').removeClass('active');
             jQuery('.navigation li.active > ul.sub-menu, .navigation li.active > ul.children').show();
         }
     }

     thDropdownMenu();

     jQuery(window).resize(function() {
         thDropdownMenu();
     });

     //Vertical menus toggles

     jQuery('.widget .menu-menu-1-container, .navigation .menu').addClass('toggle-menu');
     jQuery('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
     jQuery('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');

     jQuery('.toggle-menu .toggle-menu-item-parent').prepend('<span class="toggle-caret" tabindex="0"><i class="fa fa-plus"></i></span>');

     jQuery('.toggle-caret').click(function(e) {
         e.preventDefault();
         jQuery(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
     });

      jQuery('.toggle-caret').keypress(function(e) {
        e.preventDefault();
        jQuery(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
    });
// Esc key close menu
            document.addEventListener( 'keydown', function( event ) {
            if ( event.keyCode === 27 ) {
              event.preventDefault();
              document.querySelectorAll( '.mobile-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-menu-active');
              }.bind( this ) );
              document.querySelectorAll( '.mobile-above-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-above-menu-active');
              }.bind( this ) );
              document.querySelectorAll( '.mobile-bottom-menu-active' ).forEach( function( element ) {
                jQuery('body').removeClass('mobile-bottom-menu-active');
              }.bind( this ) );
            }
          }.bind( this ) );

            //keynavigation close on last item
jQuery(".navigation .menu>.menu-item:nth-last-child(1) a").focusout(function(){
            jQuery('body').removeClass('mobile-menu-active');
           });
     // Show-hide Scroll to top & move-to-top arrow

     jQuery("body").prepend("<a id='move-to-top' class='animate ' href='#header'><i class=''></i></a>");

     var scrollDes = 'html,body';
     /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
     if (navigator.userAgent.match(/opera/i)) {
         scrollDes = 'html';
     }
     //show ,hide
     jQuery(window).scroll(function() {
         if (jQuery(this).scrollTop() > 120) {
             jQuery('#move-to-top').addClass('filling').removeClass('hiding');
         } else {
             jQuery('#move-to-top').removeClass('filling').addClass('hiding');
         }
     });
     //smooth scrolling to navigation active
if(jQuery(".home").length) {
    jQuery('.navigation ul li a:first').addClass('active');

    var sections = jQuery('section,.wrap'), 
    // wrap = jQuery('.wrap'),
    nav = jQuery('nav'), 
    nav_height = nav.outerHeight();

    jQuery(window).on('scroll', function () {
        var cur_pos = jQuery(this).scrollTop();

        sections.each(function() {
        var top = jQuery(this).offset().top-150,
        bottom = top + jQuery(this).outerHeight();

        if (cur_pos >= top && cur_pos <= bottom) {
        nav.find('a').removeClass('active');
        sections.removeClass('active');

        jQuery(this).addClass('active');
        nav.find('a[href="#'+jQuery(this).attr('id')+'"]').addClass('active');
        }
        });
    });

    nav.find('a').on('click', function () {
        if(jQuery('.mobile-menu-active').length){
             jQuery('body').removeClass('mobile-menu-active');
             }
    var $el = jQuery(this)
    , id = $el.attr('href');

    jQuery('html, body').animate({
    scrollTop: jQuery(id).offset().top
    }, 500);

    return false;
    });
}
//*****************/
// hero id scroll
//*****************/
if(jQuery(".hero-scroll").length) {
 jQuery(".hero-scroll a[href^='#']").click(function(e) {
    e.preventDefault();
    var position =  jQuery( jQuery(this).attr("href")).offset().top;
     jQuery("body, html").animate({
        scrollTop: position
    } /* speed */ );
});
}

     // Responsive Navigation

     // Responsive Navigation

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
                 jQuery('.navigation').not('.mobile-menu-wrapper').find('.menu').clone().appendTo('.mobile-menu-wrapper').hide();
             }

             jQuery('.toggle-mobile-menu').click(function(e) {
                 e.preventDefault();
                 e.stopPropagation();
                 jQuery('body').toggleClass('mobile-menu-active');
             });

             // prevent propagation of scroll event to parent
             jQuery(document).on('DOMMouseScroll mousewheel', '.mobile-menu-wrapper', function(ev) {
                 var $this = jQuery(this),
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

                 if (jQuery('a#pull').css('display') !== 'none') { // if toggle menu button is visible ( small screens )

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
// Scroll down header
  function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 250,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
               
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                    
                }
            }
        });
    }
    
/*scroll header function*/
    jQuery(window).scroll(function() {
        var scroll =jQuery(window).scrollTop();

        if (scroll >=100) {
           jQuery(".header").addClass('smaller');
        } else {
           jQuery(".header").removeClass("smaller");
        }
    });

    
	
	});
 /* start flex slider*/
 jQuery(window).load(function() {
  var newspeed = jQuery("#txt_slidespeed").val();
    jQuery('.flexslider').flexslider({
         slideshowSpeed: newspeed,
         slide_easing: 'easeInOutCubic',
         animationSpeed: 1000,
         pauseOnHover: true, 
    }); 
});
 /* end flex slider*/
 
 /*end scroll header function*/
 /*testimonials slider*/
 jQuery(window).load(function(){
  jQuery('.bxslider').bxSlider({ 
     mode:'fade',
     auto: true,
     autoControls: true,
     adaptiveHeight: false,
      });

// animation-wow

  wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
        // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();

 // loader
jQuery(".loader").fadeOut("slow");
  jQuery(".overlayloader").delay(1000).fadeOut("slow");
  
});
                 
 
///start pallaxx
 jQuery(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 (function(n){n.viewportSize={},n.viewportSize.getHeight=function(){return t("Height")},n.viewportSize.getWidth=function(){return t("Width")};var t=function(t){var f,o=t.toLowerCase(),e=n.document,i=e.documentElement,r,u;return n["inner"+t]===undefined?f=i["client"+t]:n["inner"+t]!=i["client"+t]?(r=e.createElement("body"),r.id="vpw-test-b",r.style.cssText="overflow:scroll",u=e.createElement("div"),u.id="vpw-test-d",u.style.cssText="position:absolute;top:-1000px",u.innerHTML="<style>@media("+o+":"+i["client"+t]+"px){body#vpw-test-b div#vpw-test-d{"+o+":7px!important}}<\/style>",r.appendChild(u),i.insertBefore(r,e.head),f=u["offset"+t]==7?i["client"+t]:n["inner"+t],i.removeChild(r)):f=n["inner"+t],f}})(this);


( function( $ ) {
  
  // Setup variables
  $window = $(window);
  $body = $('body');
  
    //FadeIn all sections   
 
  function adjustWindow(){
    
    // Init Skrollr
    var s = skrollr.init({
        render: function(data) {
        
            //Debugging - Log the current scroll position.
            //console.log(data.curTop);
        }
    });
    
    // Get window size
      winH = $window.height();
      
      // Keep minimum height 550
      if(winH <= 550) {
      winH = 550;
    } 
      
      
  }
    
} )( jQuery );
}
 else {
       (function(n){n.viewportSize={},n.viewportSize.getHeight=function(){return t("Height")},n.viewportSize.getWidth=function(){return t("Width")};var t=function(t){var f,o=t.toLowerCase(),e=n.document,i=e.documentElement,r,u;return n["inner"+t]===undefined?f=i["client"+t]:n["inner"+t]!=i["client"+t]?(r=e.createElement("body"),r.id="vpw-test-b",r.style.cssText="overflow:scroll",u=e.createElement("div"),u.id="vpw-test-d",u.style.cssText="position:absolute;top:-1000px",u.innerHTML="<style>@media("+o+":"+i["client"+t]+"px){body#vpw-test-b div#vpw-test-d{"+o+":7px!important}}<\/style>",r.appendChild(u),i.insertBefore(r,e.head),f=u["offset"+t]==7?i["client"+t]:n["inner"+t],i.removeChild(r)):f=n["inner"+t],f}})(this);


( function() {
  
  // Setup variables
  $window = jQuery(window);
  $body = jQuery('body');
  
    //FadeIn all sections   
  $body.imagesLoaded( function() {
    setTimeout(function() {
          
          // Resize sections
          adjustWindow();
          
          // Fade in sections
        $body.removeClass('loading').addClass('loaded');
        
    }, 800);
  });
  
  function adjustWindow(){
    
    // Init Skrollr
    var s = skrollr.init({
        render: function(data) {
        
            //Debugging - Log the current scroll position.
            //console.log(data.curTop);
        }
    });
    
    // Get window size
      winH = $window.height();
      
      // Keep minimum height 550
      if(winH <= 550) {
      winH = 550;
    } 
      
      
  }
    
} )( jQuery );
    }
});

//move to top
if (jQuery("#scroll").length) {
jQuery(document).ready(function(){ 
    jQuery(window).scroll(function(){ 
        if (jQuery(this).scrollTop() > 100) { 
            jQuery('#scroll').fadeIn(); 
        } else { 
            jQuery('#scroll').fadeOut(); 
        } 
    }); 
    jQuery('#scroll').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
}