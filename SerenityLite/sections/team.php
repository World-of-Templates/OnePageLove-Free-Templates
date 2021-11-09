<?php
/**
 * Team Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_team_section_toggle' ) == '' ) : ?>

<section id="team" class="team py-7">

	<div class="container">

        <div class="row">

			<div class="col-md-12 text-center">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_team_title', __( 'Team Members', 'serenity-lite' ) ) ); ?></h2>

                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_team_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>

            </div>

        </div>

        <?php if ( get_theme_mod( 'serenity_lite_onepage_team_content' ) ) : ?>

        <div class="row">

            <div class="content col-md-12 mt-5">

                <?php
                    global $post;
                    $post = get_post( wp_kses_post( get_theme_mod( 'serenity_lite_onepage_team_content') ) );
                    setup_postdata( $post );
                    the_content();
                    wp_reset_postdata();
                ?>

            </div>

        </div>

        <?php endif; ?>

        <?php if ( is_active_sidebar( 'team-widgets' ) ) : ?>

        <div class="widgets row multi-columns-row mt-5 text-center">

            <?php dynamic_sidebar( 'team-widgets' ); ?>

		</div>

        <?php endif; ?>

	</div>

</section>

<?php endif; ?>