<?php
/**
 * Blog Section
 */
?>

<?php if ( get_theme_mod( 'serenity_lite_blog_section_toggle' ) == '' ) : ?>

<section id="blog" class="blog py-7">

	<div class="container">

        <div class="row">

			<div class="col-md-12 text-center <?php echo esc_attr(get_theme_mod( 'serenity_lite_onepage_blog_scheme', 'text-dark' ) ); ?>">

                <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_blog_title', __( 'Our Recent Blogs', 'serenity-lite' ) ) ); ?></h2>
                
                <p class="lead text-info w-75 mx-auto"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_blog_subtitle', __( 'Sed fermentum, felis ut cursus varius, purus velit placerat tortor, at faucibus elit purus posuere velit. Integer sit amet felis ligula.', 'serenity-lite' ) ) ); ?></p>
            
            </div>

        </div>

        <div class="content row multi-columns-row mt-5">

                <?php

                    $args = array( 'numberposts' => 3, 'date'=> 'DSC', 'post_status' => 'publish' );

                    $postslist = get_posts( $args );

                    foreach ($postslist as $post) :  setup_postdata($post); ?> 

                        <div class="col-sm-12 col-md-12 col-lg-4 mb-5">

                            <div class="card shadow">

                                <article id="post-<?php the_ID(); ?>">
                    
                                    <?php if(get_the_post_thumbnail()) : ?>

                                        <figure class="post-image mb-0">

                                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('serenity-lite-post-thumbnails',array('class'=>'img-fluid rounded')); ?></a>

                                        </figure>

                                    <?php endif; ?>
                                    
                                    <div class="clearfix"></div>

                                    <div class="card-body">

                                        <p class="text-uppercase small mb-1"><?php the_category(', '); ?></p>
                                        
                                        <h5 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                                        
                                        <p class="meta text-muted text-info small mb-0">
                                            
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 28, $default, $alt, array('class'=>'rounded-circle mr-1') ); ?>

                                            <?php printf(
                                                esc_html__( '%1$s on %2$s', 'serenity-lite' ),
                                                '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>',
                                                get_the_time( get_option( 'date_format' ) )
                                            ); ?>

                                            <span class="float-right">
                                                
                                                <i class="far fa-comment"></i>
                                                
                                                <?php printf(
                                                    _n( '%1$s', '%1$s', get_comments_number(), 'serenity-lite' ),
                                                    number_format_i18n( get_comments_number() )
                                                ); ?>

                                            </span>
                                        
                                        </p>
                                        
                                        <div class="clearfix"></div>

                                    </div>
                                 
                                </article>

                            </div>
 
                        </div>
 
                <?php endforeach; ?>
 
                <?php wp_reset_postdata(); ?>

        </div>

        <div class="row margin-top-30">

			<div class="col-md-12 text-center">			

                <a href="<?php echo get_permalink( esc_attr( get_theme_mod( 'serenity_lite_onepage_blog_link' ) ) ); ?>" class="btn btn-sm btn-outline-primary"><?php echo esc_html(get_theme_mod( 'serenity_lite_onepage_blog_btn', __( 'Read the blog', 'serenity-lite' ) ) ); ?></a>

			</div>

        </div>

	</div>

</section>

<?php endif; ?>