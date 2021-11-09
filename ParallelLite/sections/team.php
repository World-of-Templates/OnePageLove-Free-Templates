<?php
/**
 * Team Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['team-section-toggle']==1) { ?>
<section id="team" class="team <?php echo $parallel['team-custom-class']; ?>">
	<div class="container">
        <div class="row">
			<div class="col-md-12 heading">			
				<?php if ($parallel['team-title']) { ?><h2 class="title"><?php echo $parallel['team-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['team-subtitle']) { ?><p class="subtitle"><?php echo $parallel['team-subtitle']; ?></p><?php } ?>
			</div>
        </div>
        <?php if ( is_active_sidebar( 'team-widgets' ) ) : ?>
        <div class="row multi-columns-row">
            <?php dynamic_sidebar( 'team-widgets' ); ?>
		</div>
        <?php endif; ?>
	</div>
</section><!--team-->
<?php } ?>