<?php
/**
 * Skills Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<?php if($integral['skills-section-toggle']==1) { ?>
<section id="skills" class="skills lite <?php echo esc_attr($integral['skills-custom-class']); ?>">
	<div class="container">
        <div class="row">
			<?php if ($integral['skills-title']) { ?>
            <div class="col-md-12">			
				<h2 class="smalltitle"><?php echo esc_html($integral['skills-title']); ?><span></span></h2>
			</div>
            <?php } ?>
			<div class="col-sm-6 col-md-6">
                <?php if ($integral['skill1-name']) { ?>
                    <?php echo $integral['skill1-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill1-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill1-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill1-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($integral['skill2-name']) { ?>
                    <?php echo $integral['skill2-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill2-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill2-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill2-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($integral['skill3-name']) { ?>
                    <?php echo $integral['skill3-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill3-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill3-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill3-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($integral['skill4-name']) { ?>
                    <?php echo $integral['skill4-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill4-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill4-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill4-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
                
                <?php if ($integral['skill5-name']) { ?>
                    <?php echo $integral['skill5-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill5-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill5-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill5-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($integral['skill6-name']) { ?>
                    <?php echo $integral['skill6-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr($integral['skill6-percent']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr($integral['skill6-percent']); ?>%; background-color:<?php echo esc_attr($integral['skill6-color']); ?>">				     
                      </div>
                    </div>
                <?php } ?>
			</div>
            <?php if ($integral['skills-text']) { ?>
            <div class="col-sm-6 col-md-6">
                <?php
                    $my_id = $integral['skills-text'];
                    $post_id = get_post($my_id);
                    $content = $post_id->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]>', $content);
                    echo $content;
                ?>
			</div>
            <?php } ?>
		</div>
	</div>
</section>
<?php } ?>