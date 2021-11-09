<?php
/*
 * The template for displaying all pages.
 */
?>

<?php get_header(); ?>

<div class="container my-lg-5 my-sm-3">

	<div class="row">

		<div class="<?php echo esc_attr( serenity_lite_content_class() ); ?>">

			<div class="content my-5">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			    <div class="page-header mb-5">

					<h1 class="entry-title"><?php the_title(); ?></h1>

				</div>
			    
				<div class="entry">

					<?php the_content(); ?>

				</div>
			     
			 </div>

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