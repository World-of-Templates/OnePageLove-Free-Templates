 /* 
  * Contains handlers to make Theme Customizer preview reload changes asynchronously.
  */
 (function($) {

     // main header
     wp.customize('parallax_heading', function(value) {
         value.bind(function(to) {
             $('.main-text h1').text(to);
         });
     });
     wp.customize('parallax_subheading', function(value) {
         value.bind(function(to) {
             $('.main-text h2').text(to);
         });
     });
     wp.customize('parallax_button_text', function(value) {
         value.bind(function(to) {
             $('.main-button button').text(to);
         });
     });

     // first feature coloum
     wp.customize('first_parallax_heading', function(value) {
         value.bind(function(to) {
             $('.main-feature .first a h3').text(to);
         });
     });
     wp.customize('first_parallax_desc', function(value) {
         value.bind(function(to) {
             $('.main-feature .first a p').text(to);
         });
     });
     // second feature coloum
     wp.customize('second_parallax_heading', function(value) {
         value.bind(function(to) {
             $('.main-feature .second a h3').text(to);
         });
     });
     wp.customize('second_parallax_desc', function(value) {
         value.bind(function(to) {
             $('.main-feature .second a p').text(to);
         });
     });
     // third feature coloum
     wp.customize('third_parallax_heading', function(value) {
         value.bind(function(to) {
             $('.main-feature .third a h3').text(to);
         });
     });
     wp.customize('third_parallax_desc', function(value) {
         value.bind(function(to) {
             $('.main-feature .third a p').text(to);
         });
     });

     // top-ribbon
     wp.customize('hb_heading', function(value) {
         value.bind(function(to) {
             $('.ribbon-section h2').text(to);
         });
     });
     wp.customize('hb_button_text', function(value) {
         value.bind(function(to) {
             $('.ribbon-section .ribbon-button button').text(to);
         });
     });
     // bottom-ribbon
     wp.customize('hb_heading_bottom', function(value) {
         value.bind(function(to) {
             $('.bottom-ribbon-section h2.heading-area').text(to);
         });
     });
     wp.customize('hb_button_text_bottom', function(value) {
         value.bind(function(to) {
             $('.bottom-ribbon-section .ribbon-button button').text(to);
         });
     });

     // services
     wp.customize('our_services_heading', function(value) {
         value.bind(function(to) {
             $('.multi-feature-area h2.head-text').text(to);
         });
     });
     wp.customize('our_services_subheading', function(value) {
         value.bind(function(to) {
             $('.multi-feature-area h3.subhead-text').text(to);
         });
     });

     // aboutus
     wp.customize('about_us_heading', function(value) {
         value.bind(function(to) {
             $('.aboutus-text h2').text(to);
         });
     });
     wp.customize('about_us_subheading', function(value) {
         value.bind(function(to) {
             $('.aboutus-text p').text(to);
         });
     });
     wp.customize('about_us_image', function(value) {
         value.bind(function(to) {
             $('.aboutus-section img').attr("src", to);
         });
     });

     // blog
     wp.customize('blog_head_', function(value) {
         value.bind(function(to) {
             $('.multi-slider-area h2').text(to);
         });
     });
     wp.customize('blog_desc_', function(value) {
         value.bind(function(to) {
             $('.multi-slider-area h3.subhead-text').text(to);
         });
     });
     // team.
     wp.customize('our_team_heading', function(value) {
         value.bind(function(to) {
             $('.client-team-section h2').text(to);
         });
     });
     wp.customize('our_team_subheading', function(value) {
         value.bind(function(to) {
             $('.client-team-section h3').text(to);
         });
     });
     // price
     wp.customize('our_price_heading', function(value) {
         value.bind(function(to) {
             $('.price-section h2').text(to);
         });
     });
     wp.customize('our_price_subheading', function(value) {
         value.bind(function(to) {
             $('.price-section h3.subhead-text ').text(to);
         });
     });

     // testimonials
     wp.customize('testimonial_heading', function(value) {
         value.bind(function(to) {
             $('.client-testimonial-section h2').text(to);
         });
     });
     wp.customize('testimonial_subheading', function(value) {
         value.bind(function(to) {
             $('.client-testimonial-section h3').text(to);
         });
     });
     // woocommerce
     wp.customize('woo_head_', function(value) {
         value.bind(function(to) {
             $('.woocommerce-section h2').text(to);
         });
     });
     wp.customize('woo_desc_', function(value) {
         value.bind(function(to) {
             $('.woocommerce-section h3').text(to);
         });
     });

     // news-letter
     wp.customize('cf_head_', function(value) {
         value.bind(function(to) {
             $('.newsletter h3').text(to);
         });
     });

 })(jQuery);