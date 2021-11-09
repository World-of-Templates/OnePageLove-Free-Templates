<?php
/**
 * Single Posts
 */
?>
<?php get_header(); ?>

<div class="container my-lg-5 my-sm-3">

	<div class="row">

		<div class="<?php echo esc_attr( serenity_lite_content_class() ); ?>">
        
			<div class="content my-5">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
			    
	                <p class="text-uppercase mb-1"><?php the_category(', '); ?></p>
	                
	                <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	                
	                <p class="meta text-muted text-info small">
	                    
	                    <?php printf(
						    esc_html__( 'By %1$s on %2$s', 'serenity-lite' ),
						    '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>',
						    get_the_time( get_option( 'date_format' ) )
						); ?>

						<span>&bull;</span>

						<?php printf(
						    _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'serenity-lite' ),
						    number_format_i18n( get_comments_number() )
						); ?>

						<?php $post_tags = get_the_tags(); if ( $post_tags ) { echo __('&bull; Tags: ','serenity-lite'); foreach( $post_tags as $tag ) { echo '#' . tag_escape( $tag->name ) . ' '; } } ?>
	                
	                </p>

	                <?php if(get_the_post_thumbnail()) : ?>

	                	<figure class="post-image">

	                		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('serenity-lite-post-thumbnails',array('class'=>'img-fluid rounded')); ?></a>

	                	</figure>

	                <?php endif; ?>

	                <div class="clearfix"></div>

                    <div class="entry">
                    
                      <?php the_content(); ?>
                    
                    </div>
            
                    <div class="clearfix"></div>
            
                </article>                
			
			<?php wp_link_pages(); ?>

			<?php the_post_navigation( array(
                'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i> %title',
            	'next_text' => '%title <i class="fa fa-angle-double-right" aria-hidden="true"></i>'
            ) ); ?>
			
			<?php endwhile;?>
				
			<?php comments_template(); ?>

			<?php endif; ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>
    
</div>

<?php get_footer(); ?>