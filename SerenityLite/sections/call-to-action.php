<?php
/**
 * Call to Action Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_cta_section_toggle' ) == '' ) : ?>

<section id="calltoaction" class="calltoaction position-relative py-10 text-light">

    <div class="blacklayer"></div>

    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-md-7 col-lg-7 text-sm-center text-md-left text-lg-left mb-sm-4 mb-md-0 mb-lg-0">

                <h2 class="section-title display-4"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_cta_title', __( 'Call to Action', 'serenity-lite' ) ) ); ?></h2>

                <p class="lead"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_cta_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit.', 'serenity-lite' ) ) ); ?></p>

            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 ml-auto text-center my-auto">

                <p class="above mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_cta_above_btn_text', __( 'Want to learn more?', 'serenity-lite' ) ) ); ?></p>

                <a href="<?php echo esc_url( get_theme_mod( 'serenity_lite_onepage_cta_link', '#' ) ); ?>" class="btn btn-lg btn-pill btn-outline-light"><?php echo esc_html( get_theme_mod( 'serenity_lite_onepage_cta_btn', __( 'Download Now', 'serenity-lite' ) ) ); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
            
            </div>

        </div>

    </div>

</section>

<?php endif; ?>