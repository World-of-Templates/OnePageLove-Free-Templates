<?php
/**
* The template for displaying Search Results pages
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
get_header();
$layout = oneline_lite_get_layout();?>
<div class="page-title <?php echo svg_active();?>">
<div class="demo-image">
	<div class="overlay-demo"></div>
	<div class="full-fs-caption">
		<div class="caption-container">
			<div class="archive-title">
				<h1><?php printf( __( 'Search Results for : %s', 'oneline-lite' ), get_search_query() ); ?></h1>
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
	<div id="main">
		<?php if (have_posts()) : ?>
		<ul class="load_post standard-layout">
			<?php get_template_part('loop', 'blog'); ?>
		</ul>
		<?php
		else :
		get_template_part( 'content', 'none' );
		endif;
		?>
	</div>
</div>
</div>
</div>
<?php if ( $layout != 'no-sidebar' ){ ?>
<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>
<?php } ?>
</div><!-- Content End -->
<?php get_footer(); ?>