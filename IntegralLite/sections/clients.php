<?php
/**
 * Clients Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['clients-section-toggle']==1) { ?>
<section id="clients" class="clients lite <?php echo esc_attr($integral['clients-custom-class']); ?>">
	<div class="container">
		<?php if ($integral['clients-maintitle']) { ?>
        <div class="row">
			<div class="col-md-12">			
				<h2 class="smalltitle"><?php echo esc_html($integral['clients-maintitle']); ?><span></span></h2>
			</div>
        </div>
        <?php } ?>
        <?php if ( is_active_sidebar( 'client-widgets' ) ) : ?>
        <div class="row multi-columns-row">
            <?php dynamic_sidebar( 'client-widgets' ); ?>
		</div>
        <?php endif; ?>
	</div>
</section>
<?php } ?>