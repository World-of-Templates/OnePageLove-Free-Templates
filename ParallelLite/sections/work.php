<?php
/**
 * Work Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['work-section-toggle']==1) { ?>
<section id="work" class="work <?php echo $parallel['work-custom-class']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
                <?php if ($parallel['work-title']) { ?><h2 class="title"><?php echo $parallel['work-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['work-subtitle']) { ?><p class="subtitle"><?php echo $parallel['work-subtitle']; ?></p><?php } ?>
			</div>
			<div class="col-md-12">
                <?php
                    $my_id = $parallel['work-text'];
                    $post_id = get_post($my_id);
                    $content = $post_id->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
                    echo $content;
                ?>
			</div><!--feature-->
		</div>
	</div>
</section><!--work-->
<?php } ?>