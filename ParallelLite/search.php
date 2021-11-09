<?php
/**
 * Category Page for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-md-8">

			<div class="content">
	
			<h4 class="page-header"><?php printf( __( 'Search Results for: %s', 'parallel' ), get_search_query() ); ?></h4>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="pagemeta"><?php _e('Posted on', 'parallel'); ?> <?php the_time( get_option( 'date_format' ) ); ?> <?php _e('by', 'parallel'); ?> <?php the_author_posts_link() ?></div>

				<div class="entry">

				<?php if(get_the_post_thumbnail()) { ?> <div class="alignleft"><?php the_post_thumbnail('thumbnail'); ?></div> <?php } ?>

				<?php the_excerpt(); ?>

				</div>

			    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="btn btn-default btn-sm readmore pull-right"><?php _e('Read more', 'parallel'); ?></a>
				
				<div class="pagemeta pull-left"><?php _e('Posted under', 'parallel'); ?> <?php the_category(', '); ?> <?php the_tags(' | Tags: '); ?></div>

				<div class="clearfix"></div>
				
			</div> <!--post -->
			 
			<?php endwhile;?>

			<?php endif; ?>
			
			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'parallel' ),
			    'next_text' => __( 'Next', 'parallel' ),
			    'screen_reader_text' => __( '&nbsp;', 'parallel' ),
			) ); ?>

			</div><!--content-->

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>