<?php
/**
 * Brands Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['brands-section-toggle']==1) { ?>
<section id="brands" class="brands <?php echo $parallel['brands-custom-class']; ?>">
	<div class="container">
        <div class="row">
			<div class="col-md-12 heading">			
				<?php if ($parallel['brands-maintitle']) { ?><h2 class="title"><?php echo $parallel['brands-maintitle']; ?><span></span></h2><?php } ?>
				<?php if ($parallel['brands-subtitle']) { ?><p class="subtitle"><?php echo $parallel['brands-subtitle']; ?></p><?php } ?>
			</div>
        </div>
        <?php if ( is_active_sidebar( 'brands-widgets' ) ) : ?>
        <div class="row multi-columns-row">
            <?php dynamic_sidebar( 'brands-widgets' ); ?>
		</div>
        <?php endif; ?>
	</div>
</section><!--brands-->
<?php } ?>