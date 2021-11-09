<?php
/*
 * The template for displaying woocommerce content.
 */
?>

<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="<?php echo esc_attr( serenity_lite_content_class() ); ?>">
			
			<div class="content my-5">			
			
                <?php woocommerce_content(); ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>