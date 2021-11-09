<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */
?>
<?php 
$category_id = get_the_category(get_the_ID())[0]->term_id;
$category_name = get_the_category(get_the_ID())[0]->name;
?>
<article>
	<div class="col-md-6">
		<div class="latest_news_detail blog_post_img wow  fadeInUp">
			   <div class="image_detail"> 
					<div class="post_img">
						<?php the_post_thumbnail(); ?>
					 </div>
					<div class="post_date">
						<p> <?php the_time('j M'); ?></p>
					</div>
				</div>
		</div>
	</div>
	<div class="col-md-6">
		<div style="visibility: visible; animation-name: fadeInUp;" class="latest_news_detail blog_post_detail wow  fadeInUp">
			<h6> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h6>
			<div class="category sub_category"> <a href="<?php echo get_category_link( $category_id ); ?>"><?php echo $category_name; ?> </a> </div>
			<p><?php the_excerpt();?></p>
			<p class="read_more"> <a href="<?php the_permalink();?>"> <?php _e( 'READ MORE', 'ministudio' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>  </a> </p>
		</div>
	</div>
</article>