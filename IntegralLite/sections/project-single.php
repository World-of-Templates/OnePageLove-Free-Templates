<?php
/**
 * Project Single Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['project-single-section-toggle']==1) { ?>
<section id="projects" class="project-single lite <?php echo esc_attr($integral['project-single-custom-class']); ?>">
	<div class="container">
		<div class="row">
			<?php if ($integral['project-single-title']) { ?>
            <div class="col-md-12">			
				<h2 class="smalltitle"><?php echo esc_html($integral['project-single-title']); ?><span></span></h2>
			</div>
            <?php } ?>
            <?php if ( is_active_sidebar( 'single-project-widgets' ) ) : ?>
                <?php dynamic_sidebar( 'single-project-widgets' ); ?>
            <?php endif; ?> 
		</div>
	</div>
</section>
<?php } ?>