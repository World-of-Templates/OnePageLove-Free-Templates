<?php
/************* COMMENT LAYOUT *********************/
// Comment Form
function parallel_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body panel panel-default">
    <?php endif; ?>
    <div class="comment-author vcard panel-heading">
        <?php printf( __( '<strong>%s</strong> <span class="timecomment"> left a comment on', 'parallel' ), get_comment_author_link() ); ?>
        <?php printf( __('%1$s at %2$s', 'parallel'), get_comment_date(),  get_comment_time(), 'parallel' ); ?>
        <?php edit_comment_link( __( '(Edit)', 'parallel' ) );?>
        </span>
    </div>
    <div class="panel-body">

    <?php comment_text(); ?>
    </div>

    <div class="reply panel-footer">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation pull-right"><?php _e( 'Your comment is awaiting moderation.', 'parallel' ); ?></em>
    <?php endif; ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; 
}
