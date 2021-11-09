<?php
/**
 * Custom Javsscript for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<script type="text/javascript">
jQuery(document).ready(function($){

	<?php if($parallel['hero-parallax-toggle']==1) { ?> $('#welcome').parallax("50%", 0.4); <?php } ?>
	<?php if($parallel['testi-parallax-toggle']==1) { ?> $('#testimonials').parallax("50%", 0.4); <?php } ?>
	<?php if($parallel['calltoaction-parallax-toggle']==1) { ?> $('#calltoaction').parallax("50%", 0.4); <?php } ?>
	<?php if($parallel['newsletter-parallax-toggle']==1) { ?> $('#newsletter').parallax("50%", 0.4); <?php } ?>

		$(".testimonial-slider").slick({
			dots: true,
			autoplay: true,
			autoplaySpeed: 7000,
			arrows: false,
			pauseOnHover: true,
			infinite: true,
			slidesToShow: parseInt(<?php echo $parallel['testi-layout']; ?>),
			slidesToScroll: parseInt(<?php echo $parallel['testi-scroll']; ?>),
			responsive: [{
		      breakpoint: 979,
		      settings: {
		        slidesToShow: 2,
		      }
		    }, {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		      }
		    }]
		});
})	
</script>