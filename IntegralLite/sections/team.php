<?php
/**
 * Team Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['team-section-toggle']==1) { ?>
<section id="team" class="team lite <?php echo esc_attr($integral['team-custom-class']); ?>">
	<div class="container">
		<?php if ($integral['team-title']) { ?>
        <div class="row">
			<div class="col-md-12">			
				<h2 class="smalltitle"><?php echo esc_html($integral['team-title']); ?><span></span></h2>
			</div>
        </div>
        <?php } ?>
        <?php if ( is_active_sidebar( 'team-widgets' ) ) : ?>
        <div class="row multi-columns-row">
            <?php dynamic_sidebar( 'team-widgets' ); ?>
		</div>
        <?php endif; ?>
	</div>
</section>
<?php } ?>