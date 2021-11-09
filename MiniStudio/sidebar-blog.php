<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */
?>
<?php
$ministudio_blog_layout = get_theme_mod('ministudio_blog_layout','rightsidebar');
if($ministudio_blog_layout!="nosidebar") {
?>
<aside class="col-md-4">
	<div class="side_blog_bg">
		<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
			<aside id="secondary" class="sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside><!-- .sidebar .widget-area -->
		<?php endif; ?>
	</div>
</aside>
<?php } ?>
