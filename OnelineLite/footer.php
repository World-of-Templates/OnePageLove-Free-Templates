<?php
/**
* The template for displaying the footer
*
* @package ThemeHunk
* @subpackage Oneline lite
* @since Oneline Lite 1.0
*/
?>
<div class="footer-wrapper"><!-- Footer wrapper start -->
<?php
if ( is_active_sidebar( 'first-footer-widget-area'  )
|| is_active_sidebar( 'second-footer-widget-area' )
|| is_active_sidebar( 'third-footer-widget-area'  )
){
   echo oneline_lite_svg_enable('footer_top_svg_background');
    	get_sidebar('footer');
    }
?>
</div>
<div class="foot-copyright">
<?php echo oneline_lite_svg_enable(); ?>
<div class="footer-content">
<?php if( get_theme_mod('copyright_textbox')!=''){
echo '<span class="text-footer">'.esc_html(get_theme_mod( 'copyright_textbox')).'</span>';
} else { ?>

<span class="text-footer">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
<a href="<?php echo esc_url( __( 'https://themehunk.com/', 'oneline-lite' ) ); ?>"><?php printf( __('Powered by %s', 'oneline-lite' ), 'ThemeHunk' ); ?></a>
</span>
<?php } ?>
<div class="social-ft">
<?php oneline_lite_social_links(); ?>
</div>
</div>
</div>
<?php $back_to_top = get_theme_mod('oneline-lite_backtotop_disable');?> 
<?php if($back_to_top=='' || $back_to_top=='0') { ?> 
<a href="javascript:void(0);" id="scroll" title="<?php echo esc_html(__('Scroll to Top','oneline-lite')); ?>"><span></span></a>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>