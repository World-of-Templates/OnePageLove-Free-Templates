<?php
/**
 * blog Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['blog-section-toggle']==1) { ?>
<section id="blog" class="blog <?php echo $parallel['blog-custom-class']; ?>">
	<div class="container">
        <div class="row">
			<div class="col-md-12 heading">			
				<?php if ($parallel['blog-title']) { ?><h2 class="title"><?php echo $parallel['blog-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['blog-subtitle']) { ?><p class="subtitle"><?php echo $parallel['blog-subtitle']; ?></p><?php } ?>
			</div>
        </div>
        <div class="row multi-columns-row">
                <?php
                    $args = array( 'numberposts' => $parallel['blog-posts'], 'date'=> 'DSC', 'post_status' => 'publish' );
                    $postslist = get_posts( $args );
                    foreach ($postslist as $post) :  setup_postdata($post); ?> 
                        <div class="col-sm-<?php echo $parallel['blog-layout']; ?> col-md-<?php echo $parallel['blog-layout']; ?> col-lg-<?php echo $parallel['blog-layout']; ?>">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="home-blog-entry-thumb">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><?php the_post_thumbnail('parallel-home-post-thumbnails',array('class'=>'img-responsive')); ?></figure><?php } ?></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="home-blog-entry-text">
                                    <header>
                                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="home-blog-entry-meta">
                                            <ul class="meta">
                                                <li><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
                                                <li><i class="fa fa-bookmark"></i><?php the_category(', '); ?></li>
                                            </ul>
                                        </div>
                                    </header>
                                    <?php the_excerpt(); ?>
                                </div>
                        </article>
                        </div>
                <?php endforeach; ?>
		</div>
        <?php if ($parallel['blog-below-text']) { ?>
        <div class="row margin-top-30">
			<div class="col-md-12">			
                <?php echo $parallel['blog-below-text']; ?>
			</div>
        </div>
        <?php } ?>
	</div>
</section><!--blog-->
<?php } ?>