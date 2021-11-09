<?php 
/**
 * Functions
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
* Enqueue Scripts.
*/
require get_template_directory() . '/inc/enqueue.php';

/**
* Theme Welcome Page.
*/
require get_template_directory() . '/inc/welcome/theme-welcome.php';

/**
 * Extras.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Wordpress Customizer.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * WP Bootstrap 4.x Navwalker.
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
* Load WooCommerce Functions.
*/
require get_template_directory() . '/inc/woocommerce.php';

/**
* TGM Plugin Activation.
*/
require get_template_directory() . '/inc/tgm-plugin-activation.php';

/**
* Upgrade Notice.
*/
require get_template_directory() . '/inc/upgrade/class-customize.php';

/**
* Theme Demo Import functions.
*/
require get_template_directory() . '/inc/theme-demo-import.php';