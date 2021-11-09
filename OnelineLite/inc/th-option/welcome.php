
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','oneline-lite'); ?></p>
     <p>
        <?php
        if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'oneline-lite');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'oneline-lite');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";

        }
        ?>
		
		<button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'oneline-lite'); ?></button>
        <a style="<?php echo $style; ?>";  target="_blank" href="<?php echo get_home_url(); ?>" class="button alink button-primary"><?php _e('View Home Page','oneline-lite'); ?></a>
		
         </p>
    <p>
        <a target="_blank" href="https://www.youtube.com/watch?v=pHCoxwYCZGQ"><?php _e('Manually Setup','oneline-lite'); ?></a>
    </p>
</div>



<!--- tab second -->
<div class="theme_link">

    <h3><?php _e('Documentation','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Our WordPress Theme is well documented, you can go with our documentation and learn to customize Oneline Lite Theme','oneline-lite'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/oneline-lite-theme/"><?php _e(' Go to docs','oneline-lite'); ?></a></p>

    
    
</div>
<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e("Customize Your Website","oneline-lite"); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e("Oneline lite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel","oneline-lite"); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","oneline-lite"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("Customizer Links","oneline-lite"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","oneline-lite"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=site_color'); ?>" class="components-button is-link"><?php _e("Site Colors","oneline-lite"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=global_set'); ?>" class="components-button is-link"><?php _e("Global Options","oneline-lite"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=header_setting'); ?>" class="components-button is-link"><?php _e("Header Options","oneline-lite"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=slider_set_optn'); ?>" class="components-button is-link"><?php _e("Slider Options","oneline-lite"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e("Footer Widgets","oneline-lite"); ?></a>
                 <hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->