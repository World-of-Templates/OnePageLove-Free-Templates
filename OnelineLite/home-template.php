<?php
 /* Template Name: Home Page Layout */
?>
<?php 
get_header();      
//-- All section loop --
$section = array('section_slider','section_services','section_ribbon','section_team','section_testimonial','section_blog','section_woo','section_countactus');
        foreach(get_theme_mod('_sorting',$section) as $value):
        get_template_part( 'template/'.$value); 
        endforeach;
?>
<?php get_footer(); ?>