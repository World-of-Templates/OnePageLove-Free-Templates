<?php
/**
 * Brands Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_brands_section_toggle' ) == '' ) : ?>

<section id="brands" class="brands py-7">

	<div class="container">

        <div class="row">

			<div class="col-md-12 text-center">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_brands_title', __( 'Brands', 'serenity-lite' ) ) ); ?></h2>

                <?php if ( get_theme_mod( 'serenity_lite_brands_section_title_divider_toggle' ) == '' ) : ?>
                    <span class="section-title-divider mx-auto mt-4 mb-3"></span>
                <?php endif; ?>
                
                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_brands_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>
            
            </div>

        </div>

        <?php if ( is_active_sidebar( 'brands-widgets' ) ) : ?>

        <div class="widgets row multi-columns-row mt-5">

            <div class="brands-slider slider col-md-12">

                <?php dynamic_sidebar( 'brands-widgets' ); ?>

            </div>

		</div>

        <?php endif; ?>

	</div>

</section>

<?php endif; ?>