<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */

get_header(); ?>
<div class="col-md-12 text-center">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="error-404 not-found">
				<div style="visibility: visible; animation-name: fadeInUp;" class="error_msg wow  fadeInUp animated">
	            	<h2><?php _e( '404 Error', 'ministudio' ); ?></h2>
    	            <h3><?php _e( 'Oops! Page Not Found', 'ministudio' ); ?></h3>
                </div>
				
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ministudio' ); ?></p>
		
				<?php get_search_form(); ?>
				
			</div><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->
</div>
<?php get_footer(); ?>
