<?php
/**
 * Skills Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['skills-section-toggle']==1) { ?>
<section id="skills" class="skills <?php echo $parallel['skills-custom-class']; ?>">
	<div class="container">
        <div class="row">
          <?php if ($parallel['skills-title']) { ?>
            <div class="col-md-12 heading">			
              <h2 class="title"><?php echo $parallel['skills-title']; ?><span></span></h2>
            </div>
          <?php } ?>
			<div class="col-sm-6 col-md-6">
                <?php if ($parallel['skill1-name']) { ?>
                    <?php echo $parallel['skill1-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill1-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill1-percent']; ?>%; background-color:<?php echo $parallel['skill1-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($parallel['skill2-name']) { ?>
                    <?php echo $parallel['skill2-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill2-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill2-percent']; ?>%; background-color:<?php echo $parallel['skill2-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($parallel['skill3-name']) { ?>
                    <?php echo $parallel['skill3-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill3-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill3-percent']; ?>%; background-color:<?php echo $parallel['skill3-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($parallel['skill4-name']) { ?>
                    <?php echo $parallel['skill4-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill4-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill4-percent']; ?>%; background-color:<?php echo $parallel['skill4-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
                
                <?php if ($parallel['skill5-name']) { ?>
                    <?php echo $parallel['skill5-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill5-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill5-percent']; ?>%; background-color:<?php echo $parallel['skill5-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
                <?php if ($parallel['skill6-name']) { ?>
                    <?php echo $parallel['skill6-name']; ?>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $parallel['skill6-percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $parallel['skill6-percent']; ?>%; background-color:<?php echo $parallel['skill6-color']; ?>">				     
                      </div>
                    </div>
                <?php } ?>
			</div>
            <?php if ($parallel['skills-text']) { ?>
            <div class="col-sm-6 col-md-6">
                <?php
                    $my_id = $parallel['skills-text'];
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
</section><!--skills-->
<?php } ?>