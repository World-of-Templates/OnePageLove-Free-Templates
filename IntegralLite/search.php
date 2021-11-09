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

		<div class="col-md-8">

			<div class="content">
	
			<h4 class="page-header"><?php printf( __( 'Search Results for: %s', 'integral' ), get_search_query() ); ?></h4>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="pagemeta"><?php esc_html_e('Posted on', 'integral'); ?> <?php the_time( get_option( 'date_format' ) ); ?> <?php esc_html_e('by', 'integral'); ?> <?php the_author_posts_link() ?></div>

				<div class="entry">

				<?php if(get_the_post_thumbnail()) { ?> <div class="alignleft"><?php the_post_thumbnail('thumbnail'); ?></div> <?php } ?>

				<?php the_excerpt(); ?>

				</div>

			    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="btn btn-default btn-sm readmore pull-right"><?php esc_html_e('Read more', 'integral'); ?></a>
				
				<div class="pagemeta pull-left"><?php esc_html_e('Posted under', 'integral'); ?> <?php the_category(', '); ?> <?php the_tags(' | Tags: '); ?></div>

				<div class="clearfix"></div>
				
			</div> <!--post -->
			 
			<?php endwhile;?>

			<?php endif; ?>
			
			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'integral' ),
			    'next_text' => __( 'Next', 'integral' ),
			    'screen_reader_text' => __( '&nbsp;', 'integral' ),
			) ); ?>

			</div><!--content-->

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>