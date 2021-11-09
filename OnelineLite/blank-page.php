<?php
/**
* Template Name:Blank Template
*/
get_header(); ?>
<style>
#header,.footer-wrapper,.foot-copyright{
	display:none;
}	
</style>
<div id="blank-page" class="clearfix">
<div class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<?php the_content(); ?>
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
		comments_template();
		}
			endwhile;
			endif;
		?>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
