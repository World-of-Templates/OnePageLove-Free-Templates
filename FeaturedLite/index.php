<?php
/*
The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*/
?>
<?php get_header(); ?>
<?php $layout = featuredlite_get_layout(); ?>
<div id="page" class="container <?php echo $layout; ?>">
	<div class="content-wrapper blog-container">
		<div class="content">
			<?php get_template_part('loop', 'blog'); ?>
		</div>
		<?php if ( $layout != 'no-sidebar' ) { ?>
		<div class="sidebar-wrapper"><!--Sidebar wrapper start-->
		<?php get_sidebar(); ?>
	</div>
	<?php } ?>
</div>
</div>
<?php get_footer(); ?>