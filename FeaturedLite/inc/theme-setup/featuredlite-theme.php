<?php
class Featuredlite_Popup {
  function active(){
        $this->default_homepage_setup();
    if(!get_option( "thunk_customizer_disable_popup")):
    add_action('customize_controls_print_styles', array($this,'popup_styles'));
    add_action( 'customize_controls_enqueue_scripts', array($this,'popup_scripts'));
    endif;
  }

function active_plugin(){
        $plugin_slug = 'themehunk-customizer';
        $active_file_name =  $plugin_slug.'/'.$plugin_slug.'.php';
        $button_class = 'install-now button button-primary button-large';

                $button_txt = esc_html__( 'Install Plugin & Setup Homepage', 'featuredlite' );
                $status     = is_dir( WP_PLUGIN_DIR . '/'.$plugin_slug );

                if ( ! $status ) {
                    $install_url = wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'install-plugin',
                                'plugin' => $plugin_slug
                            ),
                            network_admin_url( 'update.php' )
                        ),
                        'install-plugin_'.$plugin_slug
                    );

                } else {
                    $install_url = add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode( $active_file_name ),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
                    ), network_admin_url('plugins.php'));
                    $button_class = 'activate-now button-primary button-large';
                    $button_txt = esc_html__( 'Setup Homepage', 'featuredlite' );
                }

        $url = esc_url($install_url);
    return "<a href='javascript:void' onclick=\"featuredlite_install('{$url}'); return false;\"  data-slug='".esc_attr($plugin_slug)."' class='".esc_attr( $button_class )."'>{$button_txt}</a>";

}

function popup_styles() {
    wp_enqueue_style('featuredlite_customizer_popup', get_template_directory_uri() . '/inc/theme-setup/customizer-popup-styles.css');
}

function popup_scripts() {
    wp_enqueue_script( 'featuredlite_customizer_popup', get_template_directory_uri() . '/inc/theme-setup/customizer-popup.js', array("jquery"), '', true  );
}
 function default_homepage_setup() {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'home-template.php'
    ));
      $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;
    if(empty($pages)){
          $post_id = wp_insert_post(array (
           'post_type' => 'page',
           'post_title' => 'Home',
           'post_content' => '',
           'post_status' => 'publish',
           'comment_status' => 'closed',   // if you prefer
           'ping_status' => 'closed',      // if you prefer
           'page_template' =>'home-template.php', //Sets the template for the page.
        ));
      }
          if($post_id && get_option( 'page_on_front')==$post_id){
            update_option( 'page_on_front', $post_id );
            update_option( 'show_on_front', 'page' );
        }
 }
}
function customizer_disable_popup(){
      $value = intval(@$_POST['value']);
      update_option( "thunk_customizer_disable_popup", $value );
      die();
  }
add_action('wp_ajax_customizer_disable_popup', 'customizer_disable_popup');

// featured theme about us

function featured_lite_tab_config($theme_data){
    $config = array(
        'theme_brand' => __('ThemeHunk','featuredlite'),
        'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
        'welcome'=>sprintf(esc_html__('Welcome to Featuredlite - Version %1s', 'featuredlite'), $theme_data->get( 'Version' ) ),
        'welcome_desc' => esc_html__( 'Featuredlite is a versatile one page theme for creating beautiful websites. This theme comes with powerful features which will help you in designing a wonderful website for any type of niche (Business, Landing page, E-commerce, Local business, Personal website).', 'featuredlite' ),
        'tab_one' =>esc_html__( 'Get Started with Featuredlite', 'featuredlite' ),
        'tab_two' =>esc_html__( 'Recommended Actions', 'featuredlite' ),

        'plugin_title' => esc_html__( 'Step 1 - Do recommended actions', 'featuredlite'),
        'plugin_link' => '?page=th_featured_lite&tab=actions_required',
        'plugin_text' => sprintf(esc_html__('Install recommended plugin Themehunk Customizer.  It will activate homepage sections ( Like : Header, Ribbon, Service, About Us, Team, WooCommerce, Testimonial and Contact Us ).', 'featuredlite'), $theme_data->get( 'Name' )),
        'plugin_button' => esc_html__('Go To Recommended Action', 'featuredlite'),


        'docs_title' => esc_html__( 'Step 2 - Configure Homepage Layout', 'featuredlite' ),
        'docs_link' => '//www.youtube.com/watch?v=ef0xl9VsbgI',
        
        'customizer_title' => esc_html__( 'Step 3 - Customize Your Website', 'featuredlite' ),
        'customizer_text' =>  sprintf(esc_html__('%s theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel.', 'featuredlite'), $theme_data->Name),
        'customizer_button' => sprintf( esc_html__('Start Customize', 'featuredlite')),

        'support_title' => esc_html__( 'Step 4 - Theme Support', 'featuredlite' ),
        'support_link' => esc_url('https://www.support.themehunk.com/'),
        
        'doc_link' => esc_url('//themehunk.com/docs/featuredlite-theme/'),
        'doc_link_text' => sprintf(esc_html__('Theme Documentation', 'featuredlite'), $theme_data->get( 'Name' )),
        'support_text' => sprintf(esc_html__('If you need any help you can contact to our support team, our team is always ready to help you.', 'featuredlite'), $theme_data->get( 'Name' )),
        'support_button' => sprintf( esc_html__('Create a support ticket', 'featuredlite'), $theme_data->get( 'Name' )),

        'demo_title' => esc_html__( 'Step 5 - Import Demo Content', 'featuredlite' ),
        );
    return $config;
}


if ( ! function_exists( 'featured_lite_admin_scripts' ) ) :
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function featured_lite_admin_scripts( $hook ) {
        if ($hook === 'appearance_page_th_featured_lite'  ) {
            wp_enqueue_style( 'featuredlite-admin-css', get_template_directory_uri() . '/css/admin.css' );
            // Add recommend plugin css
            wp_enqueue_style( 'plugin-install' );
            wp_enqueue_script( 'plugin-install' );
            wp_enqueue_script( 'updates' );
            add_thickbox();
        }
    }
endif;
add_action( 'admin_enqueue_scripts', 'featured_lite_admin_scripts' );

function featured_lite_count_active_plugins() {
   $i = 3;
       if ( shortcode_exists( 'themehunk-customizer' ) ):
           $i--;
       endif;
        if(class_exists( 'woocommerce' )) :
           $i--;
       endif;
       if ( shortcode_exists( 'lead-form' ) ):
           $i--;
       endif;

       return $i;
}

function featured_lite_tab_count(){
   $count = '';
       $number_count = featured_lite_count_active_plugins();
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
           endif;
           return $count;
}


 /**
    * Menu tab
    */
function featured_lite_tab() {
               $number_count = featured_lite_count_active_plugins();
               $menu_title = esc_html__(' Get Started with Featuredlite', 'featuredlite');
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
               $menu_title = sprintf( esc_html__('Get Started with Featuredlite %s', 'featuredlite'), $count );
           endif;


   add_theme_page( esc_html__( 'Featuredlite', 'featuredlite' ), $menu_title, 'edit_theme_options', 'th_featured_lite', 'featured_lite_tab_page');
}
add_action('admin_menu', 'featured_lite_tab');

function featured_lite_pro_theme(){ ?>
<div class="freeevspro-img">
<img src="<?php echo esc_url(get_template_directory_uri().'/images/freevspro.png');?>" alt="free vs pro" />
<p>
 <a href="<?php echo esc_url('https://www.themehunk.com/product/featured-single-page-wordpress-theme/');?>" target="_blank" class="button button-primary">Check Pro version for more features</a>
</p></div>
<?php }


function featured_lite_tab_page() {
    $theme_data = wp_get_theme();
    $theme_config = featured_lite_tab_config($theme_data);


    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    }

    $actions_r = featured_lite_get_actions_required();
    $actions = $actions_r['actions'];

    $current_action_link =  admin_url( 'themes.php?page=th_featured_lite&tab=actions_required' );

    $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }
    ?>
    <div class="wrap about-wrap theme_info_wrapper">
        <h1><?php  echo $theme_config['welcome']; ?></h1>
        <div class="about-text"><?php echo $theme_config['welcome_desc']; ?></div>

        <a target="_blank" href="<?php echo $theme_config['theme_brand_url']; ?>/?wp=featuredlite" class="themehunkhemes-badge wp-badge"><span><?php echo $theme_config['theme_brand']; ?></span></a>
        <h2 class="nav-tab-wrapper">
            <a href="?page=th_featured_lite" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php  echo $theme_config['tab_one']; ?></a>
            <a href="?page=th_featured_lite&tab=actions_required" class="nav-tab<?php echo $tab == 'actions_required' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_two'];  echo featured_lite_tab_count();?></a>
            
        </h2>
        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                    <div class="theme_link">
                            <h3><?php echo $theme_config['plugin_title']; ?></h3>
                            <p class="about">
                            <?php echo $theme_config['plugin_text']; ?></p>
                            <p>
                                <a href="<?php echo esc_url($theme_config['plugin_link'] ); ?>" class="button button-secondary"><?php echo $theme_config['plugin_button']; ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php echo $theme_config['docs_title']; ?></h3>
                            <p class="about"><ol>
                                <li><p><?php esc_html_e(' 
Go to your dashboard. Create a new page and select “Home Page Template” from page attribute.','featuredlite')?> </p></li>
                                <li><p><?php esc_html_e('After this go to Dashboard > Settings > Reading and set newly created page as a static page under "Front page displays" and save your changes.','featuredlite')?></p></li>
                                </ol></p>
                            
                        </div>
                          <div class="theme_link">
                            <h3><?php echo $theme_config['customizer_title']; ?></h3>
                            <p class="about"><?php  echo $theme_config['customizer_text']; ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php echo $theme_config['customizer_button']; ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php echo $theme_config['support_title']; ?></h3>
                            <p class="about"><?php  echo $theme_config['support_text']; ?></p>
            <p>
            <p><a target="_blank" href="<?php echo $theme_config['doc_link']; ?>"><?php  echo $theme_config['doc_link_text']; ?></a></p>

                                <a href="<?php echo $theme_config['support_link']; ?>" target="_blank" class="button button-secondary"><?php echo $theme_config['support_button']; ?></a>
                            </p>
                        </div>

                        <div class="theme_link theme-demo">
                        <h3><?php echo esc_html($theme_config['demo_title']); ?></h3>
                        <p class="about"><ol>
                                <li><p><?php esc_html_e(' 
                                Install recommended plugins','featuredlite')?> </p></li>
                                <li><p><?php esc_html_e('Click this button and import desired demo.','featuredlite')?></p></li>
                                </ol>
                        </p>

                        <p>
                               <?php
            // Sita Sites - Installed but Inactive.
            // Sita Premium Sites - Inactive.
            if ( file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) && is_plugin_inactive( 'one-click-demo-import/one-click-demo-import.php' )){

              $class       = 'button zta-sites-inactive';
              $button_text = __( 'Activate Importer Plugin', 'featuredlite' );
              $data_slug   = 'one-click-demo-import';
              $data_init   = '/one-click-demo-import/one-click-demo-import.php';

              // Sita Sites - Not Installed.
              // Sita Premium Sites - Inactive.
            } elseif ( ! file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) ) {

              $class       = 'button zta-sites-notinstalled';
              $button_text = __( 'Install Importer Plugin', 'featuredlite' );
              $data_slug   = 'one-click-demo-import';
              $data_init   = '/one-click-demo-import/one-click-demo-import.php';

            }
            else {
              $class       = 'active';
              $button_text = __( 'See Library', 'featuredlite' );
              $link        = admin_url( 'themes.php?page=pt-one-click-demo-import' );
            }

            printf(
              '<a class="ztabtn %1$s" %2$s %3$s %4$s> %5$s </a>',
              esc_attr( $class ),
              isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
              isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
              isset( $data_init ) ? 'data-init="' . esc_attr( $data_init ) . '"' : '',
              esc_html( $button_text )
            );
            ?>
            </p>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ( $tab == 'actions_required' ) { ?>
            <div class="action-required-tab info-tab-content">

                <?php if ( is_child_theme() ){
                    $child_theme = wp_get_theme();
                    ?>
                    <form method="post" action="<?php echo esc_attr( $current_action_link ); ?>" class="demo-import-boxed copy-settings-form">
                        <p>
                           <strong> <?php printf( esc_html__(  'You\'re using %1$s theme, It\'s a child theme', 'featuredlite' ) ,  $child_theme->Name ); ?></strong>
                        </p>
                        <p><?php printf( esc_html__(  'Child theme uses it’s own theme setting name, would you like to copy setting data from parent theme to this child theme?', 'featuredlite' ) ); ?></p>
                        <p>

                        <?php

                        $select = '<select name="copy_from">';
                        $select .= '<option value="">'.esc_html__( 'From Theme', 'featuredlite' ).'</option>';
                        $select .= '<option value="featuredlite">Featuredlite</option>';
                        $select .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select .='</select>';

                        $select_2 = '<select name="copy_to">';
                        $select_2 .= '<option value="">'.esc_html__( 'To Theme', 'featuredlite' ).'</option>';
                        $select_2 .= '<option value="featuredlite">Featuredlite</option>';
                        $select_2 .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select_2 .='</select>';

                        echo $select . ' to '. $select_2;

                        ?>
                        <input type="submit" class="button button-secondary" value="<?php esc_attr_e( 'Copy now', 'featuredlite' ); ?>">
                        </p>
                        <?php if ( isset( $_GET['copied'] ) && $_GET['copied'] == 1 ) { ?>
                            <p><?php esc_html_e( 'Your settings copied.', 'featuredlite' ); ?></p>
                        <?php } ?>
                    </form>

                <?php } ?>
      
                    <?php if ( isset($actions['recommend_plugins']) && $actions['recommend_plugins'] == 'active' ) {  ?>
                        <div id="plugin-filter" class="recommend-plugins action-required">
                        <h3><?php esc_html_e( 'Recommend Plugins', 'featuredlite' ); ?></h3>
                            <?php featured_lite_plugin_api(); ?>
                        </div>
                    <?php } ?>                            
            </div>
        <?php } ?>

        <?php if ( $tab == 'theme-pro' ) { ?>

            <?php featured_lite_pro_theme(); ?>

        <?php } ?>

    </div> <!-- END .theme_info -->
    <?php

}

 function featured_lite_plugin_api() {
        include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                        network_admin_url( 'plugin-install.php' );


        $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){

        foreach($recommend_plugins[0] as $slug=>$plugin){
            
            $plugin_info = plugins_api( 'plugin_information', array(
                    'slug' => $slug,
                    'fields' => array(
                        'downloaded'        => false,
                        'rating'            => false,
                        'description'       => true,
                        'short_description' => false,
                        'donate_link'       => false,
                        'tags'              => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'last_updated'      => false,
                        'compatibility'     => false,
                        'tested'            => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => true,
                    )
                ) );
                //foreach($plugin_info as $plugin_info){
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                    $icons = (isset($plugin_info->icons['1x']))?$plugin_info->icons['1x']:$plugin_info->icons['default'];
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
            $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
            $button_class = 'install-now button';

            if ( ! is_plugin_active( $active_file_name ) ) {
                $button_txt = esc_html__( 'Install Now', 'featuredlite' );
                if ( ! $status ) {
                    $install_url = wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'install-plugin',
                                'plugin' => $plugin_slug
                            ),
                            network_admin_url( 'update.php' )
                        ),
                        'install-plugin_'.$plugin_slug
                    );

                } else {
                    $install_url = add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode( $active_file_name ),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
                    ), network_admin_url('plugins.php'));
                    $button_class = 'activate-now button-primary';
                    $button_txt = esc_html__( 'Active Now', 'featuredlite' );
                }


                    $detail_link = add_query_arg(
                    array(
                        'tab' => 'plugin-information',
                        'plugin' => $plugin_slug,
                        'TB_iframe' => 'true',
                        'width' => '772',
                        'height' => '349',

                    ),
                    network_admin_url( 'plugin-install.php' )
                );
                $detail = '';
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
                echo '<img src="'.$icons.'" />';
                if($plugin_slug=='lead-form-builder'){
        $detail='Lead form builder is a contact form as well as lead generator plugin. This plugin will allow you create
unlimited contact forms and to generate unlimited leads on your site.';
} elseif($plugin_slug=='themehunk-customizer'){
        $detail= 'ThemeHunk customizer – 
ThemeHunk customizer plugin will allow you to add  unlimited number of columns for services, Testimonial, and Team with widget support. It will add slider section, Ribbon section, latest post, Contact us and Woocommerce section. These will be visible on front page of your site.';

} elseif($plugin_slug=='woocommerce'){
$detail='WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the eCommerce solution that gives both store owners and developers complete control.';
}
            echo '<p class="rcp-detail">'.$detail.' </p>';

                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.$version.'</span>
                        '.$author.'
                <a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_slug ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a>
                </p>';
                echo '<a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'featuredlite' ).'</a>';
                echo '</div>';


            }

        }
    }
}


function featured_lite_get_actions_required( ) {

    $actions = array();

    $recommend_plugins = get_theme_support( 'recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }

    if ( ! empty( $recommend_plugins ) ) {

        foreach ( $recommend_plugins as $plugin_slug => $plugin_info ) {
            $plugin_info = wp_parse_args( $plugin_info, array(
                'name' => '',
                'active_filename' => '',
            ) );
            if ( $plugin_info['active_filename'] ) {
                $active_file_name = $plugin_info['active_filename'] ;
            } else {
                $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
            }
            if ( ! is_plugin_active( $active_file_name ) ) {
                $actions['recommend_plugins'] = 'active';
            }
        }

    }

    $actions = apply_filters( 'featured_lite_get_actions_required', $actions );

    $return = array(
        'actions' => $actions,
        'number_actions' => count( $actions ),
    );

    return $return;
}

// AJAX.
add_action( 'wp_ajax_featuredlite-sites-plugin-activate','required_plugin_activate' );
function required_plugin_activate() {

      if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => __( 'No plugin specified', 'featuredlite' ),
          )
        );
      }

      $plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';

      $activate = activate_plugin( $plugin_init, '', false, true );

      if ( is_wp_error( $activate ) ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => $activate->get_error_message(),
          )
        );
      }

      wp_send_json_success(
        array(
          'success' => true,
          'message' => __( 'Plugin Successfully Activated', 'featuredlite' ),
        )
      );

    }