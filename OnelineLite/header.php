<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="main">
  *
  */
  ?>
  <!DOCTYPE html>
  <html <?php language_attributes(); ?>>
    <head>
      <meta charset="<?php bloginfo('charset'); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      <?php wp_head(); ?>
    </head>
    <body <?php body_class('index');?>  >
      <?php wp_body_open();?> 
      <div class="overlayloader">
        <div class="loader">&nbsp;</div>
      </div>
<?php
$header_fixed_cls = '';
$cntralign_menu='';
if(get_theme_mod('oneline-lite_sticky_header_disable')=='1'){
    $header_fixed_cls = 'header-fixed';
    }else{
    $header_fixed_cls ='';
    }
if(get_theme_mod('header_layout')=='center'){
    $cntralign_menu = 'col-center';
    }else{
    $cntralign_menu='';
    } 
if(get_theme_mod('header_layout')=='split'){
    $split_menu ='col-center split';
    }else{
    $split_menu ='';
    } 
if (get_theme_mod('hdr_toggle_active')==''){
    $header_hide ='';
    }else{
    $header_hide ='header-hide';
    }
if(get_theme_mod('hdr_bg_trnsparent_active')=='1'){
    $hdr_trnsprnt ='hdr-transparent';
    }else{
    $hdr_trnsprnt ='';
    }  
if(get_theme_mod('last_menu_btn')=='1'){
    $last_btn ='last-btn';
    }else{
    $last_btn ='';
    }     
?>
<!-- script to split menu -->
 <?php 
if (get_theme_mod('header_layout')=='split') { ?>    
  <script>
    jQuery(document).ready(function() {
    // hides home from navigation
     var position = jQuery("ul.menu > li").length;
     var middle = Math.round(position/2);
     var i = 0;
     jQuery('ul.menu > li').each(function() {
         if(i == middle) {
                <?php
        if (get_theme_mod('title_disable')!==''){?>
          jQuery(this).before("<li class='logo-cent'><h1><a href='<?php echo esc_url( home_url( '/' ) ); ?>'><?php bloginfo( 'name' ); ?></a></h1><p><?php bloginfo('description');?></p></li>");
            <?php } else { ?>
      jQuery(this).before('<li class="logo-cent"><?php oneline_lite_the_custom_logo();?></li>');
            <?php } ?>
        }
         i++;
     });
 });
</script>
<?php } ?>  
<!-- script to split menu -->


	
<div id="header" class="header <?php echo $header_fixed_cls; ?> <?php echo $cntralign_menu; ?> <?php echo $split_menu; ?> <?php echo $header_hide; ?> <?php echo $hdr_trnsprnt; ?> <?php echo $last_btn; ?>" >

  <a class="skip-link screen-reader-text" href="#page"><?php _e( 'Skip to content', 'oneline-lite' ); ?></a>
        <div class="container clearfix">
          <div id="logo">
            <?php oneline_lite_the_custom_logo(); 
          if(get_theme_mod('title_disable','enable')){
           if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php endif;  
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
          <?php endif;  } ?>
          </div>
          <div id="main-menu-wrapper">
            <a href="#" id="pull" class="toggle-mobile-menu"></a>
            <nav class="navigation clearfix mobile-menu-wrapper">
              <?php if ( is_page_template( 'home-template.php' ) ) :
              oneline_lite_nav_menu();
              else:
              oneline_lite_front_nav_menu();
              endif;
              ?>
            </nav>
          </div>
        </div>
</div>
      <div class="clearfix"></div>