<?php
/**
 * Welcome Screen Class
 */
class serenity_lite_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'serenity_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'admin_init', array( $this, 'serenity_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'serenity_lite_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'serenity_lite_welcome', array( $this, 'serenity_lite_welcome_getting_started' ), 	    10 );
		add_action( 'serenity_lite_welcome', array( $this, 'serenity_lite_welcome_theme_support' ),        	20 );
		add_action( 'serenity_lite_welcome', array( $this, 'serenity_lite_welcome_child_themes' ), 		    30 );
		add_action( 'serenity_lite_welcome', array( $this, 'serenity_lite_welcome_import_demo' ), 		    40 );

		/* Dismissable notice */
		add_action('admin_init',array($this,'dismiss_welcome'),1);
	}

	/**
	 * Creates the dashboard page
	 */
	public function serenity_lite_welcome_register_menu() {
		add_theme_page( __( 'Setup Serenity Lite', 'serenity-lite' ), __( 'Setup Serenity Lite', 'serenity-lite' ), 'edit_theme_options', 'serenity-lite-welcome', array( $this, 'serenity_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function serenity_lite_activation_admin_notice() {
		global $current_user;

		if ( is_admin() ) {

			$current_theme = wp_get_theme();
			$welcome_dismissed = get_user_meta($current_user->ID,'serenity_lite_welcome_admin_notice');

			if($current_theme->get('Name')== "Serenity Lite" && !$welcome_dismissed){
				add_action( 'admin_notices', array( $this, 'serenity_lite_welcome_admin_notice' ), 99 );
			}

			wp_enqueue_style( 'serenity-lite-welcome-notice-css', get_template_directory_uri() . '/inc/welcome/css/notice.css' );

		}
	}
	/**
	 * Adds a button to dismiss the notice
	 */
	function dismiss_welcome() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( isset($_GET['serenity_lite_welcome_dismiss']) && $_GET['serenity_lite_welcome_dismiss'] == '1' ) {
			add_user_meta($user_id, 'serenity_lite_welcome_admin_notice', 'true', true);
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen

	 */
	public function serenity_lite_welcome_admin_notice() {
		
		$dismiss_url = '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'serenity_lite_welcome_dismiss', '1' ) ) ) . '" class="notice-dismiss" target="_parent"></a>';
		?>
			<div class="notice theme-notice">
				<div class="theme-notice-logo"><span></span></div>
				<div class="theme-notice-message wp-theme-fresh">
					<strong><?php esc_html_e( 'Welcome, thank you for choosing Serenity Lite! ', 'serenity-lite' ); ?></strong><br />
					<?php esc_html_e( 'Follow our instructions to setup Serenity Lite and begin customizing your site.', 'serenity-lite' ); ?></div>
				<div class="theme-notice-cta">
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=serenity-lite-welcome#getting_started' ) ); ?>" class="button button-hero" style="text-decoration: none;"><?php esc_html_e( 'Setup Instructions', 'serenity-lite' ); ?> <?php echo $dismiss_url ?></a>
					<a href="<?php echo esc_url('https://demo.themely.com/serenity-lite/'); ?>" target="_blank" class="button button-hero" style="text-decoration: none;"><?php esc_html_e( 'Live Preview', 'serenity-lite' ); ?></a>
					<?php if ( current_user_can( 'customize' ) ) : ?>
					<a href="<?php echo esc_url('https://www.themely.com/themes/serenity/'); ?>" target="_blank" class="button button-primary button-hero" style="text-decoration: none;"><?php _e( 'Upgrade to Serenity PRO!', 'serenity-lite' ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function serenity_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_serenity-lite-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'serenity-lite-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );
			wp_enqueue_script( 'serenity-lite-welcome-screen-js', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array('jquery') );
		}
	}

	/**
	 * Welcome screen content
	 */
	public function serenity_lite_welcome_screen() {

		?>

		<div class="wrap about-wrap theme-welcome">

            <h1><?php esc_html_e('Welcome to Serenity Lite', 'serenity-lite'); ?> <span><?php esc_html_e('VERSION 1.1.0', 'serenity-lite'); ?></span></h1>

            <div class="about-text"><?php esc_html_e('Serenity Lite is a clean, modern and elegant one-page theme designed for professionals and businesses. Its strength lies in displaying all your content on a single page, is easily customizable and allows you to build a stunning website in minutes.', 'serenity-lite'); ?></div>

            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'serenity-lite'); ?></span></a>

            <div class="clearfix"></div>

			<ul class="nav-tab-wrapper" role="tablist">
	            <li role="presentation" class="nav-tab nav-tab-active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','serenity-lite'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#theme_support" aria-controls="theme_support" role="tab" data-toggle="tab"><?php esc_html_e( 'Help & Tutorials','serenity-lite'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','serenity-lite'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#import_demo" aria-controls="import_demo" role="tab" data-toggle="tab"><?php esc_html_e( 'Import Demo','serenity-lite'); ?></a></li>
	        </ul>

			<div class="info-tab-content">

				<?php do_action( 'serenity_lite_welcome' ); ?>

			</div>

		</div>

		<?php
	}

	/**
	 * Getting started
	 */
	public function serenity_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/welcome/getting-started.php' );
	}

	/**
	 * Theme Support
	 */
	public function serenity_lite_welcome_theme_support() {
		require_once( get_template_directory() . '/inc/welcome/theme-support.php' );
	}

	/**
	 * Child themes
	 */
	public function serenity_lite_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/welcome/child-themes.php' );
	}

	/**
	 * Import Demo
	 */
	public function serenity_lite_welcome_import_demo() {
		require_once( get_template_directory() . '/inc/welcome/import-demo.php' );
	}
}

$GLOBALS['serenity_lite_Welcome'] = new serenity_lite_Welcome();