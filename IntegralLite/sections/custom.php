<?php
/**
 * Custom Javsscript for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<script type="text/javascript">
jQuery(document).ready(function($){

	<?php if($integral['hero-parallax-toggle']==1) { ?> $('#welcome').parallax("50%", 0.4); <?php } ?>
	<?php if($integral['testi-parallax-toggle']==1) { ?> $('#testimonials').parallax("50%", 0.4); <?php } ?>
	<?php if($integral['calltoaction-parallax-toggle']==1) { ?> $('#calltoaction').parallax("50%", 0.4); <?php } ?>
	<?php if($integral['newsletter-parallax-toggle']==1) { ?> $('#newsletter').parallax("50%", 0.4); <?php } ?>

		$('.flexslider').flexslider({
		animation: "slide",
		slideshow: <?php if($integral['project-single-autoplay']==1) echo "true"; else echo "false";  ?>,
		slideshowSpeed: parseInt(<?php echo $integral['project-single-slider']; ?>)*1000,
		});

		$('.testislider').flexslider({
		controlNav: true, 
		animation: "slide",
		slideshow: <?php if($integral['testi-autoplay']==1) echo "true"; else echo "false";  ?>,
		slideshowSpeed: parseInt(<?php echo $integral['testi-slider']; ?>)*1000,
		});
})	
</script>