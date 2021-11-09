<?php
/**
 * Contact Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_contact_section_toggle' ) == '' ) : ?>

<section id="contact" class="contact text-light py-7">

	<div class="container">

		<div class="row">

			<div class="col-sm-12 col-md-8 col-lg-8">

				<?php if ( is_active_sidebar( 'contact-form-widgets' ) ) : ?>

                    <?php dynamic_sidebar( 'contact-form-widgets' ); ?>

                <?php endif; ?>

			</div>

			<div class="col-sm-12 col-md-3 col-lg-3 ml-auto">

				<?php if ( is_active_sidebar( 'contact-info-widgets' ) ) : ?>

                    <?php dynamic_sidebar( 'contact-info-widgets' ); ?>

                <?php endif; ?>

			</div>
	        
		</div>

	</div>

</section>

<?php endif; ?>