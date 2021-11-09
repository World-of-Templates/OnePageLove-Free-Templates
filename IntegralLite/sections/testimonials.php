<?php
/**
 * Testimonials Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['testi-section-toggle']==1) { ?>
<section id="testimonials" class="testimonials <?php echo esc_attr($integral['testi-custom-class']); ?>">
<?php if($integral['testi-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="testislider">
                <?php if ($integral['testi-title']) { ?>
                    <h2 class="smalltitle_dark"><?php echo esc_html($integral['testi-title']); ?><span></span></h2>
                <?php } ?> 
                <?php if ( is_active_sidebar( 'testimonial-widgets' ) ) : ?>
                    <ul class="slides">
                      <?php dynamic_sidebar( 'testimonial-widgets' ); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</section>
<?php } ?>