<?php
/**
 * About Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['about-section-toggle']==1) { ?>
<section id="about" class="about lite <?php echo esc_attr($integral['about-custom-class']); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
                <?php if ($integral['about-title-icon']) { ?><i class="fa <?php echo esc_attr($integral['about-title-icon']); ?>"></i><?php } ?>
				<?php if ($integral['about-title']) { ?><h2 class="bigtitle"><span><?php echo esc_html($integral['about-title']); ?></span></h2><?php } ?>
                <?php if ($integral['about-subtitle']) { ?><p class="subtitle"><?php echo wp_kses_post($integral['about-subtitle']); ?></p><?php } ?>
			</div>
			<div class="col-md-12">
                <?php
                    $my_id = $integral['about-text'];
                    $post_id = get_post($my_id);
                    $content = $post_id->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
                    echo $content;
                ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>