<!-- Start the Loop. -->
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--Start post-->
<li id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> >
	<div class="post-heading">
		<h2><a href="<?php the_permalink() ?>"  title="<?php _e('Permanent Link to','oneline-lite'); the_title_attribute(); ?>"><?php the_title();  ?></a></h2>
	</div>
	<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ):?>
	<span class="post-date"><p><?php the_category(' / '); ?> <i class="fa fa-asterisk" aria-hidden="true"></i>
		<a href="<?php the_permalink(); ?>"> <?php echo get_the_date(); ?></a>
	</p></span>
	<?php endif;?>
	<div class="post-img-wrapper">
		<div class="post-img">
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
			<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post-thumbnails'); ?></a>
			<?php } ?>
		</div>
	</div>
	<div class="post-detail clear">
		<p><?php the_excerpt();?></p>
	</div>
	<span class="post-readmore">
		<a href="<?php the_permalink() ?>"><?php _e('READ MORE','oneline-lite'); ?></a>
	</span>
	<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ):?>
	<div class="post-meta">
		<span class="post-comment"><a href="<?php comments_link(); ?>" ><?php comments_number(__('No Comments', 'oneline-lite'), __('One Comment', 'oneline-lite'),  __('% Comments', 'oneline-lite') ); ?></a></span>
		<span class="post-author">
			<?php the_author_posts_link(); ?>
		</span>
	</div>
    <?php endif; ?>
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
</li>
<?php endwhile;
oneline_lite_pagination();
else: ?>
<div class="post">
	<p>
		<?php _e('sorry no post matched your criteria!', 'oneline-lite'); ?>
	</p>
</div>
<?php endif; ?>
<div class="clear"></div>
<!--End post-->