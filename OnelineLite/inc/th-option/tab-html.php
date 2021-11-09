<div class="wrap-th about-wrap-th theme_info_wrapper">
    <div class="header">

        <!-- themehunkhemes-badge wp-badge-->
<div class="th-option-area">
        <div class="th-option-top-hdr">
            <div class="col-1">
                <div class="logo-img">
				<a target="_blank" href="<?php echo esc_url($theme_header['theme_brand_url']); ?>/?wp=oneline-lite" class=""> <span class="logo-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/th-option/assets/images/icon.png"/><?php echo $theme_header['theme_brand']; ?></span></a>
			
            </div>
            </div>
            <div class="col-2">
                <div class="th-option-heading">
                    <h2><?php  echo $theme_header['welcome']; ?></h2>
                    <span><?php echo $theme_header['welcome_desc']; ?></span>
                </div>
                <span class="version"><?php echo $theme_header['v']; ?></span>
                <span><?php echo _e("FREE THEME", "oneline-lite"); ?></span>
            </div>
        </div>
        <div class="th-option-bottom-hdr">
            <a class="tablinks active" onclick="openTab(event, 'Welcome')"><?php _e('Welcome','oneline-lite');?></a>
            <a class="tablinks" onclick="openTab(event, 'Import-Demo-Content')"><?php _e('Import Demo Content','oneline-lite');?> </a>
            <a class="tablinks" onclick="openTab(event, 'Recommanded-Plugin')"><?php _e('Recommanded Plugin','oneline-lite');?> </a>
            <a class="tablinks" onclick="openTab(event, 'Free-Vs-Pro')"><?php _e('Free Vs Pro','oneline-lite');?></a>
            <a class="tablinks" onclick="openTab(event, 'Help')"><?php _e('Help','oneline-lite');?></a>

        </div>
    </div>

    </div> <!-- /header -->




    </div>

<div class="content-wrap">
    <div class="main">

<div class="tab-left" >

        

        <!-- Tab content -->
        <div id="Welcome" class="tabcontent active">
            <div class="rp-two-column">
        <?php include('welcome.php' ); ?>

            </div> <!-- close twocolumn -->
        </div>


          <div id="Import-Demo-Content" class="tabcontent">

            <div class="rp-two-column">

                <div class="rcp theme_link th-row">
                
                <div class="title-plugin">
                <h3><?php _e('Click Here To Import Demo Content','oneline-lite'); ?></h3>
				 
				 <p> <?php _e("You need to Install required plugins like- Hunk Companion, WooCommerce and One click demo import plugin. After installing required plugins import button will activate."); ?></p>
              <a class="button disabled importdemo"><?php _e( 'Import Demo', 'oneline-lite' ); ?></a>
				 
             </div>

             </div>
             
                  
                 <?php $this->plugin_install('import-demo-content'); ?>
            
            </div>

        
        </div>

        <div id="Recommanded-Plugin" class="tabcontent">
            <div class="rp-two-column">
            <?php $this->plugin_install(); ?>
            </div>
        </div>


            <div id="Free-Vs-Pro" class="tabcontent">
                <div class="rp-two-column">
                    <?php include('free-pro.php' ); ?>

                </div>
            </div>

    <div id="Help" class="tabcontent">
        <div class="rp-two-column">
                    <?php include('need-help.php' ); ?>

        </div>
    </div>




</div> <!-- tab div close -->



<div class="sidebar-wrap">
    <div class="sidebar">
    <?php include('sidebar.php' ); ?>
    </div>
</div>


</div>
</div>