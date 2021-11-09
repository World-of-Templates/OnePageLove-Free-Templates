<?php
/*
 * The template for displaying woocommerce content.
 *
 * This is the template that displays all woocommerce content.
 *
 */
?>

<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col-md-8">
			
			<div class="content">			
			
                <?php woocommerce_content(); ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>