<?php
/**
 * Footer
 */
?>
            <footer class="page-footer text-light">

              <?php if ( get_theme_mod( 'serenity_lite_footer_toggle' ) == '' ) : ?>

                <div class="container">

                  <div class="row">

                    <div class="col-md-12">

                      <?php if ( is_page_template( 'template-onepage.php' ) ) : ?><div class="border-top border-opacity"></div><?php endif; ?>

                      <div class="social-icons my-5 py-7 d-flex justify-content-center">

                        <?php if ( get_theme_mod( 'serenity_lite_footer_fb_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_fb_url' )); ?>" class="fb text-light">
                          <i class="fab fa-facebook fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'serenity_lite_footer_tt_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_tt_url' )); ?>" class="tt text-light">
                          <i class="fab fa-twitter fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'serenity_lite_footer_gp_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_gp_url' )); ?>" class="gp text-light">
                          <i class="fab fa-google-plus fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'serenity_lite_footer_li_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_li_url' )); ?>" class="li text-light">
                          <i class="fab fa-linkedin fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'serenity_lite_footer_ig_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_ig_url' )); ?>" class="ig text-light">
                          <i class="fab fa-instagram fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'serenity_lite_footer_pt_url' ) ) : ?>
                        <a href="<?php echo esc_url(get_theme_mod( 'serenity_lite_footer_pt_url' )); ?>" class="pt text-light">
                          <i class="fab fa-pinterest fa-lg fa-2x"></i>
                        </a>
                        <?php endif; ?>

                      </div>
                      
                    </div>

                  </div>

                </div>

                <?php endif; ?>

                <div class="footer-copyright text-center small bg-dimped__dark py-3">

                    <a class="text-light" href="<?php echo esc_url( __( 'https://wordpress.org/', 'serenity-lite' ) ); ?>"><?php printf( __( 'Powered by %s', 'serenity-lite' ), 'WordPress' ); ?></a>

                    <span class="sep text-light mx-2"> | </span>

                    <a class="text-light" href="<?php echo esc_url( 'https://www.themely.com/' ); ?>"><?php printf( __( 'Made by %s', 'serenity-lite' ), 'Themely' ); ?></a>

                </div>

              </footer>

            </div>

        <?php wp_footer(); ?>

        <?php if( is_page_template( 'template-onepage.php' ) ) get_template_part('js/scripts'); ?>
    
    </body>

</html>