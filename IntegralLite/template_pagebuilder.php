<?php
/**
 Template Name: Page-Builder Template (Elementor & Beaver Builder)
 * Pages for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>

<?php get_header(); ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" class="page-builder">
			
			<?php the_content(); ?>
		
		</article>
		
	<?php endwhile;?>

	<?php endif; ?>

<?php get_footer(); ?>