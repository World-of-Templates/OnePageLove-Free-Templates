<?php
/**
* The template part for displaying content
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<span class="sticky-post"><?php _e( 'Featured', 'oneline-lite' ); ?></span>
		<?php endif; ?>
		
		<span class="post-date"><p><?php the_category(' / '); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
			<a href="<?php the_permalink(); ?>"> <?php echo get_the_date(); ?></a>
		</p></span>
	</div>
	<div class="post-detail clear">
		<?php the_content(); ?>
	</div>
	<?php
	wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'oneline-lite' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'oneline-lite' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
?>
<div class="post-meta">
	<span class="post-comment"><a href="<?php comments_link(); ?>" title=""><?php comments_number(__('No Comments', 'oneline-lite'), __('One Comment', 'oneline-lite'),  __('% Comments', 'oneline-lite') ); ?></a></span>
	<span class="post-author">
		<?php the_author_posts_link(); ?>
	</span>
</div>
<div class="post-bottom-strip">
	<div class="post-social-icon">
		<div class="post-social-meta">
			<?php 
                  if( shortcode_exists( 'themehunk-customizer-social' ) ) {
                    echo do_shortcode("[themehunk-customizer-social]");
                   } ?>
		</div>
	</div>
</div>
</article>