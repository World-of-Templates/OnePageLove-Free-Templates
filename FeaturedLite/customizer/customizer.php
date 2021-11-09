<?php
     //  =============================
     //  = Default Theme Customizer Settings  =
function featuredlite_customize_register( $wp_customize ) { 
 if (shortcode_exists('themehunk-customizer')!=true):
       $obj = NEW Featuredlite_Popup();
                $obj->active();
            endif;

class featuredlite_Misc_Control extends WP_Customize_Control{
    public function render_content() {
        switch ( $this->type ) {
            default:

            case 'heading':
                echo '<span class="customize-control-title">' . $this->title . '</span>';
                break;

            case 'custom_message' :
                echo '<p class="description">' . $this->description . '</p>';
                break;

            case 'hr' :
                echo '<hr />';
                break;
        }
    }
}



//  =============================
//  = Genral Settings     =
//  =============================
$wp_customize->get_section('title_tagline')->title = esc_html__('General Setting', 'featuredlite');
   $wp_customize->get_section('title_tagline')->priority = 3;
   $wp_customize->add_setting('title_disable', array(
        'default'           => 'enable',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('title_disable', array(
        'label'    => __('Display Site Title & Tagline', 'featuredlite'),
        'section'  => 'title_tagline',
        'settings' => 'title_disable',
         'type'       => 'checkbox',
        'choices'    => array(
            'enable' => 'Display Site Title & Tagline',
        ),
    )); 

    $obj = New Featuredlite_Popup();
// Home Page Settings
 $wp_customize->add_section('section_default_home', array(
        'title'    => __('One click Homepage Setup', 'featuredlite'),
        'priority' => 2,
    ));
   $wp_customize->add_setting('default_home', array(
        'sanitize_callback' => 'Featuredlite_sanitize_text',
    ));
   $wp_customize->add_control( new featuredlite_Misc_Control( $wp_customize, 'default_home',
            array(
        'section'  => 'section_default_home',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Click button to set theme default home page. You can modify this page from customize panel. Check this doc : <a target="_blank" href="https://themehunk.com/docs/featuredlite-theme/"> View Documentation</a>. <a class="activate-now button-primary button-large flactvate">Activating homepage...</a><div class="loader"></div><strong class="flactvate-activating">It may take few seconds...</strong>','featuredlite' ).$obj->active_plugin()
    )));



// wordpress-default-option
$wp_customize->add_section( 'header_image', array(
  'title'          => __( 'Header Background Image', 'featuredlite' ),
  'theme_supports' => 'custom-header',
  'priority'       => 40,
  'panel' =>'theme_optn',
) );
// custom color
    $wp_customize->get_section('colors')->title = esc_html__('Body Background Color', 'featuredlite');
    $wp_customize->get_section('colors')->priority = 60;
    $wp_customize->get_section('colors')->panel = 'theme_optn';
// custom background
$wp_customize->add_section( 'background_image', array(
  'title'          => __( 'Body Background Image', 'featuredlite' ),
  'theme_supports' => 'custom-background',
  'priority'       => 80,
  'panel' =>'theme_optn',
) );  

}
add_action('customize_register','featuredlite_customize_register');
?>