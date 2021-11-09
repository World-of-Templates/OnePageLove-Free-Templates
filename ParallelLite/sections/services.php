<?php
/**
 * Services Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['services-section-toggle']==1) { ?>
<section id="services" class="services <?php echo $parallel['services-custom-class']; ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
				<?php if ($parallel['services-title']) { ?><h2 class="title"><?php echo $parallel['services-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['services-subtitle']) { ?><p class="subtitle"><?php echo $parallel['services-subtitle']; ?></p><?php } ?>
			</div>
			<?php if ($parallel['services-text']) { ?>
                <div class="col-md-12">
    				<?php
                        $my_id = $parallel['services-text'];
                        $post_id = get_post($my_id);
                        $content = $post_id->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]>', $content);
                        echo $content;
                    ?>
                </div>
            <?php } ?>
        </div>
        <?php if ( is_active_sidebar( 'service-widgets' ) ) : ?>
        <div class="row multi-columns-row">
            <?php dynamic_sidebar( 'service-widgets' ); ?>
        </div>
        <?php endif; ?>
	</div>
</section><!--services-->
<?php } ?>