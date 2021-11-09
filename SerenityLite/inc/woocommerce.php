<?php
/**
 * Add WooCommerce support
 */

add_action( 'after_setup_theme', 'serenity_lite_woocommerce_support' );
function serenity_lite_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}