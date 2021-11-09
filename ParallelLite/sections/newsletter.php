<?php
/**
 * Newsletter Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['newsletter-section-toggle']==1) { ?>
<section id="newsletter" class="newsletter <?php echo $parallel['newsletter-custom-class']; ?>">
    <?php if($parallel['newsletter-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if ($parallel['newsletter-title']) { ?><h2><?php echo $parallel['newsletter-title']; ?></h2><?php } ?>
                    <?php if ($parallel['newsletter-text']) { ?><p><?php echo $parallel['newsletter-text']; ?></p><?php } ?>
                </div>
                <?php if ($parallel['mailchimp-code']) { ?>
                <div class="col-md-4">
                    <?php echo do_shortcode($parallel['mailchimp-code']); ?>
                </div>
                <?php } ?>
            </div>
        </div>
</section><!--parallax3-->
<?php } ?>