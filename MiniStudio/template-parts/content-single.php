<?php
/**
 * The template part for displaying single posts
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
<div class="col-md-12">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<article class="blog_post single_detail_blog wow animated fadeInUp">
			<h3> <a href="#/"><?php the_title();?></a> </h3>
			<div class="blog_text wow animated fadeInUp">
				<ul> 
					<li><?php the_date();?></li>
					<li> /  </li>
					<li> <a href="<?php echo get_category_link( $category_id ); ?>"><?php echo $category_name; ?></a> </li>
					<li> /  </li>
					<li> <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>  </li>
				</ul>
			</div>
			<div class="blog_post_img detail_page_img wow animated fadeInUp">
				<a href="#/"> <?php ministudio_post_thumbnail(); ?> </a>
				<div class="cetegory_section">
					<a href="<?php echo get_category_link( $category_id ); ?>"> <?php echo $category_name; ?> </a>
				</div>
			</div>
			<div class="entry-content">
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ministudio' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ministudio' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
					get_template_part( 'template-parts/biography' );
				?>
			</div><!-- .entry-content -->
		</article>
	</div><!-- #post-## -->
</div>