<?php
/**
 * Features Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['features-section-toggle']==1) { ?>
<section id="features" class="features <?php echo $parallel['features-custom-class']; ?>">
	<div class="container">
		<div class="row multi-columns-row">
			<?php if ( is_active_sidebar( 'feature-widgets' ) ) : ?>
                <?php dynamic_sidebar( 'feature-widgets' ); ?>
            <?php endif; ?>
		</div>
	</div>
</section><!--features-->
<?php } ?>