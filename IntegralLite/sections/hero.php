<?php
/**
 * Hero Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<section id="welcome" class="hero">
<?php if($integral['hero-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if ($integral['hero-title']) { ?><h1><?php echo esc_html($integral['hero-title']); ?></h1><?php } ?>
			<?php if ($integral['hero-subtitle']) { ?><h2><?php echo wp_kses_post($integral['hero-subtitle']); ?></h2><?php } ?>
			<?php if ($integral['hero-tagline']) { ?>
            <div class="lead text-center">
                <p><?php echo str_replace("\n", "<br>", $integral['hero-tagline']); ?></p>
            </div>
            <?php } ?>
			<?php if($integral['hero-btn1-toggle']==true && $integral['hero-btn2-toggle']==false) { ?>
            <div class="col-md-12 text-center">
                <a href="<?php echo esc_url($integral['hero-btn1-url']); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html($integral['hero-btn1-text']); ?></a>
			</div>
			<?php } else if($integral['hero-btn1-toggle']==true){ ?>
			<div class="col-md-6 text-right">
                <a href="<?php echo esc_url($integral['hero-btn1-url']); ?>" class="btn btn-lg btn-secondary"><?php echo esc_html($integral['hero-btn1-text']); ?></a>
			</div>
			<?php } ?>
			<?php if($integral['hero-btn2-toggle']==true && $integral['hero-btn1-toggle']==false) { ?>
			<div class="col-md-12 text-center">
                <a href="<?php echo esc_url($integral['hero-btn2-url']); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($integral['hero-btn2-text']); ?></a>
			</div>
			<?php } else if($integral['hero-btn2-toggle']==true) { ?>
			<div class="col-md-6 text-left">
                <a href="<?php echo esc_url($integral['hero-btn2-url']); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($integral['hero-btn2-text']); ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</section>