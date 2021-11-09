<?php
/**
* The template for displaying 404 pages (Not Found)
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
get_header();
$layout = oneline_lite_get_layout(); ?>
<div class="page-title page_404 <?php echo svg_active();?>">
<div class="demo-image">
	<div class="overlay-demo"></div>
	<div class="full-fs-caption">
		<div class="caption-container">
			<div class="archive-title">
				<h2 class="title overtext"><?php _e( '404 Not Found !', 'oneline-lite' ); ?></h2>
			</div>
		</div>
	</div>
</div>
<?php echo oneline_lite_page_svg_bottom_enable(); ?>
<?php echo oneline_lite_page_svg_top_enable(); ?>
</div>
<div id="page" class="clearfix <?php echo $layout; ?> <?php echo svg_active();?>">
<div class="content-wrapper">
<!-- Content Start -->
<div class="content">
<div class="page-content blog-content">
	<p>
	<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'oneline-lite' ); ?>
	</p>
	<?php get_search_form(); ?>
</div>
</div>
</div>
<?php if ( $layout != 'no-sidebar' ) { ?>
<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>
<?php } ?>
</div><!-- Content End -->
<?php get_footer(); ?>