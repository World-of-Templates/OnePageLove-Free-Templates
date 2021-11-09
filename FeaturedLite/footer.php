<?php
/**
* The template for displaying the footer
*/
?>
<?php $back_to_top = get_theme_mod('featuredlite_backtotop_disable');?>
<input type="hidden" id="back-to-top" value="<?php echo $back_to_top?>"/> 
<?php get_sidebar('footer'); ?>
</div>
<div class="footer-copyright">
<div class="container">
	<ul>
		<li class="copyright">
			<?php 
			$allowed_html = array(
                                  'a' => array(
                                  'href' => array(),
                                  'title' => array(),
                                  'target' => array()
                              ),
                              'br' => array(),
                              'em' => array(),
                              'strong' => array(),
                          );
                $url = "https://themehunk.com";
              echo  sprintf( 
              	wp_kses( __( 'Featuredlite developed by <a href="%s" target="_blank">ThemeHunk</a>', 'featuredlite' ), $allowed_html), esc_url( $url ) );
			?>
		</li>
		<li class="social-icon">
			<?php featuredlite_social_links(); ?>
		</li>
	</ul>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>