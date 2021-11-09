<?php
/**
 * Contact Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['contact-section-toggle']==1) { ?>
<section id="contact" class="contact <?php echo $parallel['contact-custom-class']; ?>">
<div class="container">
	<div class="row">
		<div class="col-md-12 heading">
			<?php if ($parallel['contact-title']) { ?><h2 class="title"><?php echo $parallel['contact-title']; ?><span></span></h2><?php } ?>
            <?php if ($parallel['contact-subtitle']) { ?><p class="subtitle"><?php echo $parallel['contact-subtitle']; ?></p><?php } ?>
		</div>
		<?php if ($parallel['contact-text']) { ?>
        <div class="col-md-12 margin-bottom-50">			
			<?php
                $my_id = $parallel['contact-text'];
                $post_id = get_post($my_id);
                $content = $post_id->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]>', $content);
                echo $content;
            ?>
		</div>
        <?php } ?>
        <?php if($parallel['contact-info-toggle']==1) { ?>
		<div class="col-md-12 margin-bottom-50">
				<?php if ($parallel['contact-phone']) { ?>
				<div class="col-sm-4 col-md-4 col-lg-4 text-center">
					<p><span class="fa fa-phone fa-3x"></span></p>
					<p><?php echo $parallel['contact-phone']; ?></p>
				</div>
				<?php } ?>
				<?php if ($parallel['contact-address']) { ?>
				<div class="col-sm-4 col-md-4 col-lg-4 text-center">
					<p><span class="fa fa-home fa-3x"></span></p>
					<p><?php echo str_replace("\n", "<br>", $parallel['contact-address']); ?></p>
				</div>
				<?php } ?>
				<?php if ($parallel['contact-email']) { ?>
				<div class="col-sm-4 col-md-4 col-lg-4 text-center">
					<p><span class="fa fa-envelope fa-3x"></span></p>
					<p><?php echo $parallel['contact-email']; ?></p>
				</div>
				<?php } ?>
		</div>
		<?php } ?>
		<?php if ($parallel['contact-form-code']) { ?>
        <div class="col-md-12">
			<?php echo do_shortcode($parallel['contact-form-code']); ?>
		</div>
        <?php } ?>
	</div>
</div>
</section><!--contact-->
<?php } ?>