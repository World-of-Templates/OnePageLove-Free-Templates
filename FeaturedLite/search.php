<?php
/**
* The template for displaying Search Results pages
*
* @package ThemeHunk
* @subpackage Featuredlite
* @since Featuredllite 1.0
*/
get_header();
?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="container <?php echo $layout; ?>">
	
		<div class="content-wrapper blog-container">
			<div class="page-title breadcrumb">
				<h1><?php printf( __( 'Search Results for : %s', 'featuredlite' ), get_search_query() ); ?></h1>
			</div>
			<!-- Content Start -->
			<div class="content">
				<?php get_template_part('loop', 'blog'); ?>
				<div class="pagination">
					<div class="older"><?php next_posts_link( __('Older Posts','featuredlite') ); ?></div>
					<div class="newer"><?php previous_posts_link( __('Newer Posts','featuredlite') ); ?></div>
				</div>
			</div>
			<?php if ( $layout != 'no-sidebar' ) { ?>
			<div class="sidebar-wrapper">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>
		</div>
	
</div>
<?php get_footer(); ?>