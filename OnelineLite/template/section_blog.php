<!-- LATEST POST START-->
<?php
if(!oneline_lite_checkbox_filter('blog','section_on_off')) :
$postshow = get_theme_mod('post_cate_count','4');
$heading = get_theme_mod('blog_heading','');
$subheading = get_theme_mod('blog_subheading','');
?>
<div class="post-wrapper">
<?php
echo oneline_lite_svg_enable();
?>
<section id="latest-post" class="<?php echo svg_active();?>" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;">
  <div class="container">
    <div class="page-post">
            <?php if($heading!=''){ ?>
      <h2 class="main-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo esc_html($heading); ?></h2>
      <?php }else{ ?>
      <h2 class="main-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php _e('Latest Post','oneline-lite'); ?></h2>
      <?php } ?>

      <?php if($subheading!=''){ ?>
      <p class="sub-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php echo esc_html($subheading); ?></p>
      <?php }else { ?>
<p class="sub-heading wow thunk-fadeInRight" data-wow-delay="0s"><?php 
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
echo do_shortcode("[themehunk-customizer-oneline-lite did='6']"); 
}?>  </p>
      <?php } ?>
      <div class="post-block">
        <ul class="post-grid wow fadeInLeft" data-wow-delay="0s">
          <?php
          $stickies = get_option('sticky_posts');
          $loop = new WP_Query(array('posts_per_page' => intval(get_theme_mod('slider_count', $postshow)),
          'cat' => get_theme_mod('slider_cate'),
          'order' => 'DESC',
          'ignore_sticky_posts' => 1, 'post__not_in' => $stickies,
          ));
          if ($loop->have_posts()) {
          $i = 0;
          while ($loop->have_posts()) :
          $loop->the_post();
          ?>
          <li class="post-list">
            <figure class="post-content">
              <?php
              if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
              <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('oneline-lite-custom-blog'); ?></a>
              <?php  } ?>
              <div class="date"><span class="day"><?php echo get_the_date( 'd' ); ?></span><span class="month"><?php echo get_the_date( 'M' ); ?></span></div><i class="<?php echo oneline_lite_postformate();  ?>"></i>
              <figcaption>
              <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
              <?php echo oneline_lite_get_th_custom_excerpt(); ?>
              </figcaption>
            </figure>
          </li>
          <?php 
          endwhile; 
        wp_reset_postdata();
          ?>
        </ul>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
</div>
<!-- LATEST POST END -->
<div class="clearfix"></div>
<?php endif; ?>