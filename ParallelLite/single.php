<?php
/**
 * Single Posts for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?>">
        
			<div class="content">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?></figure><?php } ?>
                    <div class="clearfix"></div>
                     
                    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                    <ul class="pagemeta">
                        <li><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
                        <li><i class="fa fa-bookmark"></i><?php the_category(', '); ?></li>
                        <li><i class="fa fa-comment"></i><?php
                                printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'parallel' ),
                                    number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></li>
                        <li><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php the_author(); ?></a></li>
                    </ul>

                    <div class="entry">
                      <?php the_content(); ?>
                    </div>
            
                    <div class="clearfix"></div>
            
                </article>                
			
			<?php wp_link_pages(); ?> 
			
			<?php endwhile;?>
				
			<?php comments_template(); ?>

			<?php endif; ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
    
</div>

<?php get_footer(); ?>