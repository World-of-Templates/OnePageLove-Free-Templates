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
<div class="col-md-4 col-sm-4">
	<div class="latest_news_detail wow animated fadeInUp">
	   <div class="image_detail"> 
			<div class="post_img">
				<?php the_post_thumbnail(); ?>
			 </div>
			<div class="post_date">
				<p> <?php the_time('j M'); ?></p>
			</div>
		</div>
		<h6> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h6>
		<div class="category sub_category"> <a href="<?php echo get_category_link( $category_id ); ?> "> <?php echo $category_name; ?> </a> </div>
		<p> <a href="<?php the_permalink();?>"> <?php _e( 'READ MORE', 'ministudio' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>  </a> </p>
	</div>
</div>
