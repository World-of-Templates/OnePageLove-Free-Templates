<?php
/**
 * About Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['about-section-toggle']==1) { ?>
<section id="about" class="about <?php echo $parallel['about-custom-class']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
				<?php if ($parallel['about-title']) { ?><h2 class="title"><?php echo $parallel['about-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['about-subtitle']) { ?><p class="subtitle"><?php echo $parallel['about-subtitle']; ?></p><?php } ?>
			</div>
			<div class="col-md-12">
                <?php
                    $my_id = $parallel['about-text'];
                    $post_id = get_post($my_id);
                    $content = $post_id->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
                    echo $content;
                ?>
			</div><!--feature-->
		</div>
	</div>
</section><!--about-->
<?php } ?>