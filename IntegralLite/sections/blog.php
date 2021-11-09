<?php
/**
 * blog Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['blog-section-toggle']==1) { ?>
<section id="blog" class="blog lite <?php echo esc_attr($integral['blog-custom-class']); ?>">
	<div class="container">
		<?php if ($integral['blog-title']) { ?>
        <div class="row">
			<div class="col-md-12">			
				<h2 class="smalltitle"><?php echo esc_html($integral['blog-title']); ?><span></span></h2>
			</div>
        </div>
        <?php } ?>
        <div class="row multi-columns-row">
                <?php
                    $args = array( 'numberposts' => $integral['blog-posts'], 'date'=> 'DSC', 'post_status' => 'publish', 'suppress_filters' => false, );
                    $postslist = get_posts( $args );
                    foreach ($postslist as $post) :  setup_postdata($post); ?> 
                        <div class="col-sm-<?php echo esc_attr($integral['blog-layout']); ?> col-md-<?php echo esc_attr($integral['blog-layout']); ?> col-lg-<?php echo esc_attr($integral['blog-layout']); ?>">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="home-blog-entry-thumb">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><?php the_post_thumbnail('integral-home-post-thumbnails',array('class'=>'img-responsive')); ?></figure><?php } ?></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="home-blog-entry-text">
                                    <header>
                                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="home-blog-entry-date">
                                            <ul class="pagemeta"><li><?php the_time( get_option( 'date_format' ) ); ?></li></ul>
                                        </div>
                                    </header>
                                    <p><?php echo integral_custom_excerpts(20); ?></p>
                                </div>
                        </article>
                        </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
		</div>
        <div class="row">
			<div class="col-md-12">			
                <?php echo wp_kses_post($integral['blog-below-text']); ?>
			</div>
        </div>
	</div>
</section>
<?php } ?>