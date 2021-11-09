<?php
/**
* The template for displaying archive pages
* If you'd like to further customize these archive views, you may create a
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
?>
<?php get_header(); ?>
<?php $layout = oneline_lite_get_layout(); 
$oneline_plx = get_theme_mod('parallax_opt');
if($oneline_plx =='' || $oneline_plx =='0'){  
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 
}  ?>

<div class="page-title <?php echo svg_active();?> <?php echo $prlx_class;?>">
<div data-center="<?php echo $prlx_data_center;?>" data-top-bottom="<?php echo $prlx_top_bottom;?>" class="demo-image" style="background-image:url('<?php echo esc_url(oneline_lite_page_thumb()); ?>')">
	<div class="overlay-demo"></div>
	<div class="full-fs-caption">
		<div class="caption-container">
			<div class="archive-title">
				<?php
				the_archive_title('<h2>','</h2>');
				?>
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
	<?php if (have_posts()) : ?>
	<div id="main">
		<ul class="load_post standard-layout">
			<?php get_template_part('loop', 'blog'); ?>
		</ul>
	</div>
	<?php
	else :
	get_template_part( 'content', 'none' );
	endif;
	?>
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