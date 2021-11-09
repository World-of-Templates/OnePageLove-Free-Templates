<?php if(!th_checkbox_filter('blogslider','section_on_off')) : ?>
<input type="hidden" id="slidecnt" value="<?php echo esc_attr(get_theme_mod('post_count','5'));?>"/>
<section id="news" class="multi-slider-area">
    <?php if(get_theme_mod( 'blog_head_')!=''){?>
    <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo esc_html(get_theme_mod( 'blog_head_')); ?></h2>
    <?php } else { ?>
    <h2 class="head-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Latest News','featuredlite'); ?></h2>
    <?php } ?>
    <?php if(get_theme_mod( 'blog_desc_')!=''){?>
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php echo esc_html(get_theme_mod( 'blog_desc_')); ?></h3>
    <?php } else { ?>
    <h3 class="subhead-text wow thunk-fadeInLeft" data-wow-duration="1s"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','featuredlite'); ?></h3>
    <?php } ?>
    <div class="span12">
        <?php
        $loop = new WP_Query(array('posts_per_page' => get_theme_mod('slider_count',5),
        'cat' => get_theme_mod('slider_cate'),
        'order' => 'DESC',
        'meta_query' => array(array( 'key' => '_thumbnail_id')) ));
        if ($loop->have_posts()) {
        $i = 0;
        ?>
        <div id="owl-demo" class="owl-carousel">
            <?php  while ($loop->have_posts()) : $loop->the_post();
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'size' );
            ?>
            <div class="item"><img src="<?php echo $thumbnail_src[0]; ?>" alt="">
                <a href="<?php the_permalink(); ?>">
                    <span class="blog-content">
                        <h1><?php the_title(); ?></h1>
                    <?php echo featuredlite_get_th_custom_excerpt(); ?></span>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <?php } wp_reset_postdata();  ?>
    </div>
</section>
<div class="clearfix"></div>
<?php endif; ?>