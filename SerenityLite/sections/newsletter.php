<?php
/**
 * Newsletter Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_newsletter_section_toggle' ) == '' ) : ?>

<section id="newsletter" class="newsletter position-relative py-7">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-8">

                <div class="row">

                    <div class="col-md-6">

                        <h2 class="section-title float-left pr-lg-5 mr-lg-3 border-right mb-0 display-4"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_newsletter_title', __( 'Newsletter', 'serenity-lite' ) ) ); ?></h2>

                    </div>

                    <div class="col-md-6 my-lg-auto my-3">

                        <p class="lead text-info mb-0"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_newsletter_subtitle', __( 'Semper lacus cursus porta, feugiat primis ultrice ligula risus auctor.', 'serenity-lite' ) ) ); ?></p>

                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 my-auto">

                <?php if ( is_active_sidebar( 'newsletter-form-widgets' ) ) : ?>

                    <?php dynamic_sidebar( 'newsletter-form-widgets' ); ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php endif; ?>