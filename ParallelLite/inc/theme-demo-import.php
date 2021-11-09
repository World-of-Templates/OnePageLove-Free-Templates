<?php
/**
 * Theme Demo Import plugin specific functions.
 */

/**
 * Adds support for the pre-defined demo content.
 */
function TDI_import_files() {
	return array(
		array(
			'import_file_name'             => 'Parallel Demo Content',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/parallel-demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/parallel-demo-widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/parallel-demo-customizer.dat',
		),
	);
}
add_filter( 'theme-demo-import/import_files', 'TDI_import_files' );

/**
 * Adds support for setting the default front and blog pages as well as assigning the default menu.
 */
function TDI_after_import_setup() {

	$main_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'top' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'theme-demo-import/after_import', 'TDI_after_import_setup' );