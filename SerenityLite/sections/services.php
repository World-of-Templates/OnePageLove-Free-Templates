<?php
/**
 * Services Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_services_section_toggle' ) == '' ) : ?>

<section id="services" class="services py-7">

	<div class="container">

        <div class="row <?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_services_scheme', 'text-dark' ) ); ?>">

            <div class="col-md-12 text-center">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_services_title', __( 'Services', 'serenity-lite' ) ) ); ?></h2>

                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_services_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>

            </div>

        </div>

        <?php if ( get_theme_mod( 'serenity_lite_onepage_services_content' ) ) : ?>

        <div class="row">

            <div class="content col-md-12 mt-5">

                <?php
                    global $post;
                    $post = get_post( wp_kses_post( get_theme_mod( 'serenity_lite_onepage_services_content') ) );
                    setup_postdata( $post );
                    the_content();
                    wp_reset_postdata();
                ?>

            </div>

        </div>

        <?php endif; ?>

        <?php if ( is_active_sidebar( 'service-widgets' ) ) : ?>

        <div class="widgets row multi-columns-row mt-5">

            <?php dynamic_sidebar( 'service-widgets' ); ?>

        </div>

        <?php endif; ?>

    </div>

</section>

<?php endif; ?>