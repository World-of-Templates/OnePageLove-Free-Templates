<?php
/**
 * Footer section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>

        <section class="copyright">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <div class="copyrightinfo">

                            <p>
                                <?php if ( $parallel['copyright-text'] ) : ?>

                                <?php echo $parallel['copyright-text']; ?>

                                <?php else : ?>

                                <?php esc_html_e('&copy; 2016 All Rights Reserved', 'parallel'); ?>

                                <span class="sep"> | </span>

                                <?php printf( __( 'Powered by %2$s', 'parallel' ), 'parallel', '<a href="https://www.wordpress.org/" rel="designer">Wordpress</a>' ); ?>

                                <span class="sep"> | </span>

                                <?php printf( __( 'Made with &#10084; by %2$s', 'parallel' ), 'parallel', '<a href="https://www.themely.com/" rel="designer">Themely</a>' ); ?>

                                <?php endif; ?>
                            </p>

                        </div>

                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6">

                        <ul class="socials pull-right">
                            <?php if ($parallel['footer-facebook']) { ?><li><a href="<?php echo $parallel['footer-facebook']; ?>"><i class="fa fa-facebook fa-lg"></i></a></li><?php } ?> 
                            <?php if ($parallel['footer-twitter']) { ?><li><a href="<?php echo $parallel['footer-twitter']; ?>"><i class="fa fa-twitter fa-lg"></i></a></li><?php } ?> 
                            <?php if ($parallel['footer-googleplus']) { ?><li><a href="<?php echo $parallel['footer-googleplus']; ?>"><i class="fa fa-google-plus fa-lg"></i></a></li><?php } ?> 
                            <?php if ($parallel['footer-github']) { ?><li><a href="<?php echo $parallel['footer-github']; ?>"><i class="fa fa-github fa-lg"></i></a></li><?php } ?> 
                            <?php if ($parallel['footer-behance']) { ?><li><a href="<?php echo $parallel['footer-behance']; ?>"><i class="fa fa-behance fa-lg"></i></a></li><?php } ?>
                            <?php if ($parallel['footer-linkedin']) { ?><li><a href="<?php echo $parallel['footer-linkedin']; ?>"><i class="fa fa-linkedin fa-lg"></i></a></li><?php } ?>
                            <?php if ($parallel['footer-instagram']) { ?><li><a href="<?php echo $parallel['footer-instagram']; ?>"><i class="fa fa-instagram fa-lg"></i></a></li><?php } ?>
                            <?php if ($parallel['footer-youtube']) { ?><li><a href="<?php echo $parallel['footer-youtube']; ?>"><i class="fa fa-youtube fa-lg"></i></a></li><?php } ?>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

        </section>

        <?php get_template_part('sections/custom'); ?>

        <?php wp_footer(); ?>
    
    </body>

</html>