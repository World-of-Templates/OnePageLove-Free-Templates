<?php
/**
 * Sanitization for textarea field
 */
function Featuredlite_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}
function Featuredlite_sanitize_textarea_html( $input ) {
    $output = esc_html( $input );
    return $output;
}
/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function Featuredlite_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}

function Featuredlite_sanitize_text( $string ) {
    return wp_kses_post( balanceTags( $string ) );
}


/**
 * vaild int.
 */
function Featuredlite_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}

function Featuredlite_registers(){
    wp_enqueue_script( 'Featuredlite_customizer_script', get_template_directory_uri() . '/customizer/customizer.js', array("jquery"), '', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'Featuredlite_registers' );

// single page post meta
function th_checkbox_filter($search,$theme_mod,$default=false){
$filter = get_theme_mod($theme_mod);
$value = (!empty($filter) && !empty($filter[0]))?in_array($search, $filter):$default;
return $value;
}
?>