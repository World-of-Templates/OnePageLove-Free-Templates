<?php
/**
 * Testimonials Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_testimonials_section_toggle' ) == '' ) : ?>

<section id="testimonials" class="testimonials position-relative py-7">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center text-light">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_testimonials_title', __( 'Testimonials', 'serenity-lite' ) ) ); ?></h2>

                <p class="lead w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_testimonials_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>

            </div>

        </div>

        <?php if ( is_active_sidebar( 'testimonial-widgets' ) ) : ?>

        <div class="widgets row multi-columns-row mt-5">

            <div class="testimonials-slider slider col-md-12 text-dark">

                <?php dynamic_sidebar( 'testimonial-widgets' ); ?>

            </div>

        </div>

        <?php endif; ?>

    </div>

</section>

<?php endif; ?>