<?php
/**
 * Testimonials Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['testi-section-toggle']==1) { ?>
<section id="testimonials" class="testimonials <?php echo $parallel['testi-custom-class']; ?>">
<?php if($parallel['testi-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if ($parallel['testi-title']) { ?><h2 class="title"><?php echo $parallel['testi-title']; ?><span></span></h2><?php } ?>
        </div>
        <?php if ( is_active_sidebar( 'testimonial-widgets' ) ) : ?>
        <div class="col-md-12 margin-top-30">
            <div class="testimonial-slider slider">
                <?php dynamic_sidebar( 'testimonial-widgets' ); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
</section><!--Parallax1-->
<?php } ?>