<?php
/**
* The template for displaying 404 pages (Not Found)
* @package ThemeHunk
* @subpackage Featuredlite
* @since Featuredlite 1.0
*/
get_header(); ?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="container <?php echo $layout; ?>" >
	
		<div class="content-wrapper blog-container">
			<div class="page-title breadcrumb">
				<h1><?php _e( 'Not Found', 'featuredlite' ); ?></h1>
			</div>
			<!-- Content Start -->
			<div class="content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'featuredlite' ); ?></p>
				<?php get_search_form(); ?>
			</div>
			<?php if ( $layout != 'no-sidebar' ) { ?>
			<div class="sidebar-wrapper">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- page End -->
	<?php get_footer(); ?>