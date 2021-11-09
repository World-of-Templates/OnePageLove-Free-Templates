<?php
/**
 * Features Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_features_section_toggle' ) == '' ) : ?>

<section id="features" class="features py-7">

	<div class="container">

		<div class="row">

			<div class="col-md-12 text-center <?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_features_scheme', 'text-dark' ) ); ?>">

				<h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_features_title', __( 'Main Features', 'serenity-lite' ) ) ); ?></h2>

                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_features_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>

			</div>

		</div>

		<?php if ( is_active_sidebar( 'feature-widgets' ) ) : ?>

		<div class="widgets row multi-columns-row mt-5">

			<?php dynamic_sidebar( 'feature-widgets' ); ?>

		</div>

		<?php endif; ?>

	</div>

</section>

<?php endif; ?>