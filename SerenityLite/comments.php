<?php
/**
 * Comments Template
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area border-top mt-5 pt-5">

	<div id="collapseOne">

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">

				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'serenity-lite' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
						'serenity-lite' ) ); ?></div>

				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'serenity-lite' ) ); ?></div>

			</nav><!-- #comment-nav-above -->

		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">

			<?php wp_list_comments(); ?>

		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">

				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'serenity-lite' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments',
						'serenity-lite' ) ); ?></div>

				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'serenity-lite' ) ); ?></div>

			</nav><!-- #comment-nav-below -->

		<?php endif; // Check for comment navigation. ?>

		<?php if ( ! comments_open() ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'serenity-lite' ); ?></p>

		<?php endif; ?>

	</div>

	<div id="collapseTwo">

		<?php
		$args = array(
			'id_form'             => 'commentform',
			'id_submit'           => 'submit',
			'class_submit'        => 'btn btn-lg btn-block btn-primary mt-4',
			'title_reply'         => __( 'Leave a comment', 'serenity-lite' ),
			'title_reply_to'      => __( 'Leave a comment to %s', 'serenity-lite' ),
			'cancel_reply_link'   => __( 'Cancel Comment', 'serenity-lite' ),
			'label_submit'        => __( 'Post Comment', 'serenity-lite' ),
			'comment_field'       => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment','serenity-lite' ) . '<span class="required">*</span></label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="8" aria-required="true" required></textarea></p>',
			'fields'              => array(
				'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name','serenity-lite' ) . '<span class="required">*</span></label> <input class="form-control input-lg input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true" required></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email','serenity-lite' ) . '<span class="required">*</span></label> <input class="form-control input-lg input-comment-email" id="email" name="email" type="email" value="" size="30" aria-required="true" required></p>',
				'website'  => '<p class="comment-form-website"><label for="website">' . __( 'Website','serenity-lite' ) . '</label> <input class="form-control input-lg input-comment-website" id="website" name="website" type="website" value="" size="30"></p>',
			),
			'cancel_reply_link'   => '<button class="btn btn-link float-right"><i class="fas fa-times"></i></button>',
			'comment_notes_after' => '',
			'label_submit'        => __( 'Post Comment','serenity-lite')
		);

		comment_form( $args );

		?>

	</div>

</div>