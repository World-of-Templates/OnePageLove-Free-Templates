<?php
/**
 * Photo Gallery Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_gallery_section_toggle' ) == '' ) : ?>

<section id="gallery" class="gallery pt-7">

	<div class="container">

		<div class="row">

            <div class="col-md-12 text-center">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_gallery_title', __( 'Photo Gallery', 'serenity-lite' ) ) ); ?></h2>
                
                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_gallery_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>
            
            </div>

		</div>

	</div>

	<?php if ( is_active_sidebar( 'gallery-widgets' ) ) : ?>

	<div class="container-fluid">

	    <div class="row mt-5">

	        <?php dynamic_sidebar( 'gallery-widgets' ); ?>

		</div>

	</div>

	<?php endif; ?>

</section>

<?php endif; ?>