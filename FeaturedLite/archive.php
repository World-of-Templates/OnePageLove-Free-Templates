<?php
/**
* The template for displaying archive pages
* If you'd like to further customize these archive views, you may create a
* @package ThemeHunk
* @subpackage Featuredlite
* @since Featuredlite 1.0
*/
?>
<?php get_header(); ?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="container <?php echo $layout; ?>">
	
		<div class="content-wrapper blog-container">
			<!-- Content Start -->
			<div class="content">
			<div class="archive-title">
				<?php the_archive_title('<h1>','</h1>'); ?>
			</div>
			<div class="breadcrumb">
				<?php featuredlite_breadcrumb(); ?>
			</div>
				<?php if (have_posts()) :
					get_template_part('loop', 'blog');
					else :
					get_template_part( 'content', 'none' );
					endif;
				?>
			</div>
			<?php if ( $layout != 'no-sidebar' ) { ?>
			<div class="sidebar-wrapper">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>
		</div>

	</div><!-- Content End -->
	<?php get_footer(); ?>