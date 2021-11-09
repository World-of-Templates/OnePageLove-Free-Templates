<?php
/**
* The template for displaying all single posts and attachments
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
get_header(); ?>
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
     <h1 class="title overtext"> <?php the_title(); ?></h1>
    </div>
  </div>
</div>
<?php echo oneline_lite_page_svg_bottom_enable(); ?>
<?php echo oneline_lite_breadcrumb(); ?>
<?php echo oneline_lite_page_svg_top_enable(); ?>
</div>
<div id="page" class="clearfix <?php echo $layout; ?> <?php echo svg_active();?>">
<div class="content-wrapper">
<div class="content">
<div class="single-post-content">
  <div class="single-post">
    <?php if (have_posts()) : while (have_posts()) : the_post();
    get_template_part('content');
        the_tags();
    ?>
    
    <?php echo oneline_lite_get_related_sigle_post();
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
    comments_template();
    }
    endwhile; endif;
    ?>
  </div>
</div>
</div>
</div>
<?php if ( $layout != 'no-sidebar' ){ ?>
<!--- sidebar -->
<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>
<?php } ?>
</div>
<?php get_footer(); ?>