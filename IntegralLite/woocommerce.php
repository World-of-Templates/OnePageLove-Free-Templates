<?php
/*
 * The template for displaying woocommerce content.
 *
 * This is the template that displays all woocommerce content.
 *
 */
?>

<?php get_header(); ?>

<div class="spacer"></div>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'rightbar' ) ) : ?>col-sm-12 col-md-8<?php else : ?>col-md-12<?php endif; ?>">
			
			<div class="content">			
			
                <?php woocommerce_content(); ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>