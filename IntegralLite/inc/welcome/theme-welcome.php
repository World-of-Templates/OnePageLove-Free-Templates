<?php
/**
 * Welcome Screen Class
 */
class Integral_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'integral_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'admin_init', array( $this, 'integral_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'integral_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'integral_welcome', array( $this, 'integral_welcome_getting_started' ), 	    10 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_theme_support' ),        	20 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_import_demo' ), 		    30 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_child_themes' ), 		    40 );

		/* Dismissable notice */
		add_action('admin_init', array($this,'dismiss_welcome'), 1);

		/* Toolbar upgrade link */
		add_action( 'admin_bar_menu', array($this, 'integral_lite_upgrade_toolbar'), 999 );
	}

	/**
	 * Creates the dashboard page
	 */
	public function integral_welcome_register_menu() {
		add_theme_page( __( 'Setup Integral', 'integral' ), __( 'Setup Integral', 'integral' ), 'activate_plugins', 'integral-welcome', array( $this, 'integral_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function integral_activation_admin_notice() {
		global $current_user;

		if ( is_admin()) {

			$current_theme = wp_get_theme();
			$welcome_dismissed = get_user_meta($current_user->ID,'integral_welcome_admin_notice');

			if($current_theme->get('Name')== "Integral" && !$welcome_dismissed){
				add_action( 'admin_notices', array( $this, 'integral_welcome_admin_notice' ), 99 );
			}

			wp_enqueue_style( 'integral-welcome-notice-css', get_template_directory_uri() . '/inc/welcome/css/notice.css' );

		}
	}
	/**
	 * Adds a button to dismiss the notice
	 */
	function dismiss_welcome() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( isset($_GET['integral_welcome_dismiss']) && $_GET['integral_welcome_dismiss'] == '1' ) {
			add_user_meta($user_id, 'integral_welcome_admin_notice', 'true', true);
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen

	 */
	public function integral_welcome_admin_notice() {
		
		$dismiss_url = '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'integral_welcome_dismiss', '1' ) ) ) . '" class="notice-dismiss" target="_parent"></a>';
		?>
			<div class="notice theme-notice">
				<div class="theme-notice-logo"><span></span></div>
				<div class="theme-notice-message wp-theme-fresh">
					<strong><?php esc_html_e( 'Welcome! Thank you for choosing Integral! ', 'integral' ); ?></strong><br />
					<?php esc_html_e( 'Visit our welcome page to setup Integral and start customizing your site.', 'integral' ); ?></div>
				<div class="theme-notice-cta">
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=integral-welcome#getting_started' ) ); ?>" class="button button-hero" style="text-decoration: none;"><?php esc_html_e( 'Setup Instructions', 'integral' ); ?> <?php echo $dismiss_url ?></a>
					<a target="_blank" href="<?php echo esc_url('http://demo.themely.com/integral/'); ?>" class="button button-hero" style="text-decoration: none;"><?php esc_html_e( 'View Live Demo', 'integral' ); ?></a>
					<a target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/integral/'); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php esc_html_e( 'Upgrade to Integral PRO!', 'integral' ); ?></a>
				</div>
			</div>
		<?php
	}

	/**
	 * Adds Upgrade Link to Toolbar
	 */
	function integral_lite_upgrade_toolbar( $wp_admin_bar ) {

		$args = array(
			'id'    => 'themely-upgrade-integral',
			'title' => esc_html__('Upgrade to Integral Pro ➡', 'integral'),
			'href'  => 'https://www.themely.com/themes/integral/',
			'meta'  => array( 'class' => 'themely-toolbar-upgrade', 'target' => '_blank' )
		);
		$wp_admin_bar->add_node( $args );

	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function integral_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_integral-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'integral-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );
			wp_enqueue_script( 'integral-welcome-screen-js', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array('jquery') );
		}
	}

	/**
	 * Welcome screen content
	 */
	public function integral_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<div class="wrap about-wrap theme-welcome">

            <h1><?php esc_html_e('Welcome to Integral', 'integral'); ?> <span><?php esc_html_e('VERSION 1.5.5', 'integral'); ?></span></h1>

            <div class="about-text"><?php esc_html_e('Integral is a powerful one-page theme for professionals, agencies and businesses. Its strength lies in displaying content on a single page in a simple and elegant manner. It\'s super easy to customize and allows you to create a stunning website in minutes.', 'integral'); ?></div>

            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'integral'); ?></span></a>

            <div class="clearfix"></div>

			<ul class="nav-tab-wrapper" role="tablist">
	            <li role="presentation" class="nav-tab nav-tab-active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#theme_support" aria-controls="theme_support" role="tab" data-toggle="tab"><?php esc_html_e( 'Help & Tutorials','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#import_demo" aria-controls="import_demo" role="tab" data-toggle="tab"><?php esc_html_e( 'Import Demo','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','integral'); ?></a></li>
	        </ul>

			<div class="info-tab-content">

				<?php do_action( 'integral_welcome' ); ?>

			</div>

		</div>

		<?php
	}

	/**
	 * Getting started
	 */
	public function integral_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/welcome/getting-started.php' );
	}

	/**
	 * Theme Support
	 */
	public function integral_welcome_theme_support() {
		require_once( get_template_directory() . '/inc/welcome/theme-support.php' );
	}

	/**
	 * Import Demo
	 */
	public function integral_welcome_import_demo() {
		require_once( get_template_directory() . '/inc/welcome/import-demo.php' );
	}

	/**
	 * Child themes
	 */
	public function integral_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/welcome/child-themes.php' );
	}
}

$GLOBALS['Integral_Welcome'] = new Integral_Welcome();