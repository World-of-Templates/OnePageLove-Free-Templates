<?php
/**
* Comments form and comment Oneline Lite
*
* @package ThemeHunk
* @subpackage Oneline Lite
* @since Oneline Lite 1.0
*/
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die (__('Please do not load this page directly. Thanks!','oneline-lite'));

if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','oneline-lite'); ?></p>
<?php return; } ?>

<!-- You can start editing here. -->
<div class="clear"></div>
<div class="comment-section">
     <div id="commentsbox">
     <?php if ( have_comments() ) : ?>
     <div class="post-info" id="comments">
                     <h2>
     <?php comments_number(__('No Comments&hellip;', 'oneline-lite'), __('One Comments...', 'oneline-lite'),  __('% Comments&hellip;', 'oneline-lite') ); ?></h2>
     </div>
     <ol class="commentlist">
          <?php wp_list_comments(); ?>
     </ol>
     <div class="comment-nav">
          <div class="alignleft">
               <?php previous_comments_link(); ?>
          </div>
          <div class="alignright">
               <?php next_comments_link(); ?>
          </div>
     </div>
     <?php else : // this is displayed if there are no comments so far ?>
     <?php if ( comments_open() ) : ?>
     <!-- If comments are open, but there are no comments. -->
     <?php else : // comments are closed ?>
     <!-- If comments are closed. -->
     <p class="nocomments"><?php _e('Comments are closed.', 'oneline-lite'); ?></p>
     <?php endif; ?>
     <?php endif; ?>
     <?php if ( comments_open() ) : 
          echo "<div id='comments_pagination'>";
               paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;'));
          echo "</div>";
     $custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';  //label removed for cleaner layout
          comment_form(array(
               'comment_field'               => $custom_comment_field,
               'comment_notes_after'         => '',
               'logged_in_as'                => '',
               'comment_notes_before'        => '',
               'title_reply'                 => __('Leave a Reply', 'oneline-lite'),
               'cancel_reply_link'           => __('Cancel Reply', 'oneline-lite'),
               'label_submit'                => __('Post Comment', 'oneline-lite')
          ));
 endif; // if you delete this the sky will fall on your head ?>
</div>
</div>