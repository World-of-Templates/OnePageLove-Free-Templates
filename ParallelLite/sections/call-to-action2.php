<?php
/**
 * Call to Action Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['calltoaction2-section-toggle']==1) { ?>
<section id="calltoaction2" class="calltoaction2 <?php echo $parallel['calltoaction2-custom-class']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 text-left">
                <?php if ($parallel['calltoaction2-title']) { ?><h2><?php echo $parallel['calltoaction2-title']; ?></h2><?php } ?>
                <?php if ($parallel['calltoaction2-text']) { ?><p><?php echo $parallel['calltoaction2-text']; ?></p><?php } ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 text-right cta-button">
                <?php if ($parallel['calltoaction2-btn-text']) { ?><a href="<?php echo $parallel['calltoaction2-btn-url']; ?>" class="btn btn-lg btn-xl btn-secondary"><?php echo $parallel['calltoaction2-btn-text']; ?></a><?php } ?>
            </div>
        </div>
    </div>
</section><!--parallax2-->
<?php } ?>