<?php
/**
 * Project Single Section for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>
<?php if($parallel['gallery-section-toggle']==1) { ?>
<section id="gallery" class="gallery <?php echo $parallel['gallery-custom-class']; ?>">
	<div class="container">
		<div class="row">
            <div class="col-md-12 heading">			
				<?php if ($parallel['gallery-title']) { ?><h2 class="title"><?php echo $parallel['gallery-title']; ?><span></span></h2><?php } ?>
                <?php if ($parallel['gallery-subtitle']) { ?><p class="subtitle"><?php echo $parallel['gallery-subtitle']; ?></p><?php } ?>
			</div>
		</div>
	</div>
	<?php if ($parallel['gallery-gallery']) { ?>
	<div class="container-fluid">
		<div class="row multi-columns-row no-gutter">
		<?php 
		    global $parallel;
		    $myGalleryIDs = explode(',', $parallel['gallery-gallery']);
		    foreach($myGalleryIDs as $myPhotoID):
		        $photoArray = parallel_wp_get_attachment($myPhotoID);
		    ?>
		        <a href="<?php echo wp_get_attachment_url( $myPhotoID ); ?>" class="<?php echo $parallel['gallery-layout']; ?> lightbox" title="<?php echo $photoArray[caption]; ?>">
		            <img src="<?php echo wp_get_attachment_url( $myPhotoID ); ?>" class="img-responsive" alt="<?php echo $photoArray[title]; ?>">
		    </a>
		<?php endforeach; ?>
		</div>
	</div>
	<?php } ?>
</section><!--slider-->
<?php } ?>