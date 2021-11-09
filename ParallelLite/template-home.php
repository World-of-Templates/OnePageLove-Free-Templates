<?php
/*
Template Name: One-page Template (Home)

 * Home Page Template for our theme
 *
 * @package WordPress
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>

<?php get_header(); ?>

<?php 
	$layout = $parallel['gen-home-layout']['Enabled'];
		if ($layout): foreach ($layout as $key=>$value) {
		 get_template_part( 'sections/'.$key);
	}
	endif;
?>

<?php get_footer(); ?>