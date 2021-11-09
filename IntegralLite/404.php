<?php
/**
 * 404 Page for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>

<?php get_header(); ?>

<div class="spacer"></div>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'rightbar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?>">

			<div class="content">
				
			
                <h2><?php esc_html_e('Error 404 : Page not found!', 'integral'); ?></h2>

                <p><?php esc_html_e('The page you\'re trying to locate is missing or can\'t be found.', 'integral'); ?></p>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
	
</div>

<?php get_footer(); ?>






