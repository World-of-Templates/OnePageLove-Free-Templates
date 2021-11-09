<?php
/**
 * Call to Action Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['calltoaction-section-toggle']==1) { ?>
<section id="calltoaction" class="calltoaction <?php echo esc_attr($integral['calltoaction-custom-class']); ?>">
    <?php if($integral['calltoaction-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ($integral['calltoaction-title']) { ?><h2><?php echo esc_html($integral['calltoaction-title']); ?></h2><?php } ?>
                <?php if ($integral['calltoaction-text']) { ?><p><?php echo wp_kses_post($integral['calltoaction-text']); ?></p><?php } ?>
            </div>
            <?php if($integral['calltoaction-btn1-toggle']==true && $integral['calltoaction-btn2-toggle']==false) { ?>
                <div class="col-md-12 text-center">
                <?php if ($integral['calltoaction-btn1-text']) { ?><a href="<?php echo esc_url($integral['calltoaction-btn1-url']); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html($integral['calltoaction-btn1-text']); ?></a><?php } ?>
                </div>
                <?php } else if($integral['calltoaction-btn1-toggle']==true){ ?>
                <div class="col-md-6 text-right">
                <?php if ($integral['calltoaction-btn1-text']) { ?><a href="<?php echo esc_url($integral['calltoaction-btn1-url']); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html($integral['calltoaction-btn1-text']); ?></a><?php } ?>
                </div>
                <?php } ?>

                <?php if($integral['calltoaction-btn2-toggle']==true && $integral['calltoaction-btn1-toggle']==false) { ?>
                <div class="col-md-12 text-center">
                <?php if ($integral['calltoaction-btn2-text']) { ?><a href="<?php echo esc_url($integral['calltoaction-btn2-url']); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($integral['calltoaction-btn2-text']); ?></a><?php } ?>
                </div>
                <?php } else if($integral['calltoaction-btn2-toggle']==true) { ?>
                <div class="col-md-6 text-left">
                <?php if ($integral['calltoaction-btn2-text']) { ?><a href="<?php echo esc_url($integral['calltoaction-btn2-url']); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($integral['calltoaction-btn2-text']); ?></a><?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>