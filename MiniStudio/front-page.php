<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Mini_Studio
 * @since Ministudio 1.0.5
 */

get_header('home'); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_slider(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_who_we_are(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_what_we_do(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_recent_work(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_pricing_table(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_latest_product(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_latest_news(); ?>

<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php ministudio_fun_get_touch(); ?>

<?php endwhile; ?>

<?php
get_footer('home');
