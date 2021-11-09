<?php
/**
 * Comments Template for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<h4 class="comments-title page-header hidden-sm hidden-xs">
		<a class="viewcomments" href="#collapseOne">
			<i class="fa fa-comments"></i>
			<?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'parallel' ),
				number_format_i18n( get_comments_number() ),
				get_the_title() );
			?>
		</a>
		<a class="leavecomments" href="#collapseTwo"><span class="pull-right"><i class="fa fa-comment-o"></i> <?php _e( 'Leave a comment', 'parallel' ); ?></span></a>
	</h4>

	<div id="collapseOne">
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'parallel' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
						'parallel' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'parallel' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( 
					array( 
						'callback' => 
						'parallel_comment' 
					)
				);
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'parallel' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
						'parallel' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'parallel' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'parallel' ); ?></p>
		<?php endif; ?>
	</div>
	<div id="collapseTwo">
		<?php
		$args = array(
			'id_form'             => 'commentform',
			'id_submit'           => 'submit',
			'class_submit'        => 'btn btn-primary',
			'title_reply'         => __( 'Leave a Comment', 'parallel' ),
			'title_reply_to'      => __( 'Leave a Comment to %s', 'parallel' ),
			'cancel_reply_link'   => __( 'Cancel Comment', 'parallel' ),
			'label_submit'        => __( 'Post Comment', 'parallel' ),
			'comment_field'       => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment','parallel' ) . '</label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="12" aria-required="true" required></textarea></p>',
			'fields'              => array(
				'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name','parallel' ) . '<span class="required">*</span></label> <input class="form-control input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true" style="width:60%; min-width:200px;" required></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email','parallel' ) . '<span class="required">*</span></label> <input class="form-control input-comment-email" id="email" name="email" type="email" value="" size="30" aria-required="true" style="width:60%; min-width:200px;" required></p>',
				'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website','parallel' ) . '</label> <input class="form-control input-comment-url" id="url" name="url" type="text" style="width:60%; min-width:200px;" value="" size="30"></p>',
			),
			'cancel_reply_link'   => '<button class="btn btn-danger btn-xs">' . __('Cancel reply','parallel') . '</button>',
			'comment_notes_after' => '',
			'label_submit'        => __( 'Post Comment','parallel')
		);

		comment_form( $args );

		?>
	</div>
</div><!-- #comments -->
