<?php
/**
 * Newsletter Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['newsletter-section-toggle']==1) { ?>
<section id="newsletter" class="newsletter <?php echo esc_attr($integral['newsletter-custom-class']); ?>">
    <?php if($integral['newsletter-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($integral['newsletter-title']) { ?><h2><?php echo esc_html($integral['newsletter-title']); ?></h2><?php } ?>
                    <?php if ($integral['newsletter-text']) { ?><p><?php echo wp_kses_post($integral['newsletter-text']); ?></p><?php } ?>
                </div>
                <?php if ($integral['mailchimp-code']) { ?>
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $integral['mailchimp-code']; ?>
                </div>
                <?php } ?>
            </div>
        </div>
</section>
<?php } ?>