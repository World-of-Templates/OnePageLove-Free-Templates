<?php
/**
 * Category Page for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php get_header(); ?>

<div class="spacer"></div>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'rightbar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?>">

			<div class="content">
				
				<header class="page-header">

					<h1><?php esc_html_e('Category', 'integral'); ?></h1>

                    <h2><?php single_cat_title(); ?></h2>

				</header>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			    <?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('integral-post-thumbnails',array('class'=>'img-responsive')); ?></a></figure><?php } ?>

                <div class="clearfix"></div>

			    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                <ul class="pagemeta">

                    <li><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>

                    <li><i class="fa fa-bookmark"></i><?php the_category(', '); ?></li>

                    <li><i class="fa fa-comment"></i><?php
                            printf( _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'integral' ),
                                number_format_i18n( get_comments_number() ), get_the_title() ); ?></li>

                    <li><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><span class="vcard author author_name"><span class="fn"><?php the_author(); ?></span></span></a></li>

                </ul>

                <div class="entry">

                    <?php the_excerpt(); ?>
                    
                </div>

			    <div class="clearfix"></div>

			 </article> <!--post -->
			 
			 <?php endwhile;?>

			 <?php endif; ?>
			
			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'integral' ),
			    'next_text' => __( 'Next', 'integral' ),
			    'screen_reader_text' => __( '&nbsp;', 'integral' ),
			) ); ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>