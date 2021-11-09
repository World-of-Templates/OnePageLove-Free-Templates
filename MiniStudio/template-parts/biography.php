<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */
?>

<div class="admin wow animated fadeInUp">
	<div class="admin_img">
		<?php
		/**
		 * Filter the Ministudio author bio avatar size.
		 *
		 * @since Ministudio 1.0.5
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'ministudio_author_bio_avatar_size', 42 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="admin_text">
		<h4 class="author-title"><?php echo get_the_author(); ?></h4>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'ministudio' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->