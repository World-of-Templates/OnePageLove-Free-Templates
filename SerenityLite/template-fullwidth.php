<?php
/**
 Template Name: Full-width Template
 */
?>
<?php get_header(); ?>

<div class="container my-lg-5 my-sm-3">

	<div class="row">

		<div class="col-md-12">

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
					
					 <?php endwhile;?>

				 <?php endif; ?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>