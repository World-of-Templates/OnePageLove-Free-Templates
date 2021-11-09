<?php
/**
* The Template for displaying all single posts
*
* @package ThemeHunk
* @subpackage Featuredlite
* @since Featuredlite 1.0
*/
get_header(); ?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="container <?php echo $layout; ?>">
	<div class="content-wrapper single-container">
		<div class="content">
		<div class="breadcrumb">
			<?php  featuredlite_breadcrumb(); ?>
		</div>
			<?php if (have_posts()) : while (have_posts()) : the_post();
						get_template_part('content');
			?>
			
			<?php echo featuredlite_get_related_sigle_post();
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile; endif;
			?>
		</div>
<?php if ( $layout != 'no-sidebar' ) { ?>
<div class="sidebar-wrapper">	<!--Sidebar wrapper start-->
<?php get_sidebar(); ?>
</div>
<?php } ?>
</div>
</div>
<?php get_footer(); ?>