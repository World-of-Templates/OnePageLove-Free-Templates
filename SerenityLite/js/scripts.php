<?php
/**
 * This file adds some functionality to certain sections of the One-page Template.
 */
?>
<script type="text/javascript">
/* Slick Slider */
jQuery(document).ready(function($){
	// Brands Slider
	$(".brands-slider").slick({
		dots: true,
		autoplay: <?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_brands_autoplay', 'true' )); ?>,
		autoplaySpeed: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_brands_speed', '4' )); ?>)*1000,
		arrows: false,
		pauseOnHover: true,
		infinite: true,
		slidesToShow: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_brands_layout', '6' )); ?>),
		slidesToScroll: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_brands_scroll', '1' )); ?>),
		speed: 500,
		responsive: [{
	      breakpoint: 979,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll:1,
	      }
	    }, {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll:1,
	      }
	    }]
	});
	// Testimonials Slider
	$(".testimonials-slider").slick({
		dots: true,
		autoplay: <?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_testimonials_autoplay', 'true' )); ?>,
		autoplaySpeed: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_testimonials_speed', '8' )); ?>)*1000,
		arrows: false,
		pauseOnHover: true,
		infinite: true,
		slidesToShow: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_testimonials_layout', '3' )); ?>),
		slidesToScroll: parseInt(<?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_testimonials_scroll', '3' )); ?>),
		speed: 1000,
		responsive: [{
	      breakpoint: 979,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll:1,
	      }
	    }, {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll:1,
	      }
	    }]
	});
})
</script>