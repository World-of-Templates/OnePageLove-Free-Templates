<?php
/**
 * Welcome Screen Class
 */
class parallel_welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'parallel_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'admin_init', array( $this, 'parallel_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'parallel_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'parallel_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'parallel_welcome', array( $this, 'parallel_welcome_getting_started' ) );
		add_action('admin_init',array($this,'dismiss_welcome'),1);
		
		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_parallel_dismiss_required_action', array( $this, 'parallel_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_parallel_dismiss_required_action', array($this, 'parallel_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 */
	public function parallel_welcome_register_menu() {
		add_theme_page( __( 'Setup Parallel', 'parallel' ), __( 'Setup Parallel', 'parallel' ), 'activate_plugins', 'parallel-welcome', array( $this, 'parallel_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function parallel_activation_admin_notice() {
		global $current_user;

		if ( is_admin()) {

			$current_theme = wp_get_theme();
			$welcome_dismissed = get_user_meta($current_user->ID,'parallel_welcome_admin_notice');

			if($current_theme->get('Name')== "Parallel" && !$welcome_dismissed){
				add_action( 'admin_notices', array( $this, 'parallel_welcome_admin_notice' ), 99 );
			}

		}
	}
	function dismiss_welcome() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( isset($_GET['parallel_welcome_dismiss']) && $_GET['parallel_welcome_dismiss'] == '1' ) {
			add_user_meta($user_id, 'parallel_welcome_admin_notice', 'true', true);
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function parallel_welcome_admin_notice() {

		$dismiss_url = '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'parallel_welcome_dismiss', '1' ) ) ) . '" class="button" target="_parent">' . __('Dismiss this notice','parallel') . '</a>';
		?>
			<div class="notice theme-notice is-dismissible">
				<ul>
					<li class="left">
						<h2><?php _e( 'Welcome! Thank you for choosing Parallel! ', 'parallel' ); ?></h2>
		                <p><?php _e( 'Begin by visiting our welcome page to setup Parallel and start customizing your site.', 'parallel' ); ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=parallel-welcome' ) ); ?>" class="button button-primary" style="text-decoration: none;"><?php _e( 'Setup Parallel', 'parallel' ); ?></a> <?php echo $dismiss_url ?> </p>
					</li>
					<li class="right">
						<a target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/parallel/'); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php _e( 'Upgrade to Parallel Pro!', 'parallel' ); ?></a>
					</li>
				</ul>
			</div>
			<style>
				.theme-notice {border:2px dashed red;max-width:800px;position: relative;}
				.theme-notice h2 {margin:0.5em 0;}
				.theme-notice ul {width:100%;margin:0;}
				.theme-notice ul li {display: inline-block;}
				.theme-notice .left {margin-right: 60px;}
				.theme-notice .button-hero {float: right;margin-bottom: 3px;}
				.theme-notice a.notice-dismiss {text-decoration: none;}
			</style>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function parallel_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_parallel-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'parallel-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );

			global $parallel_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('parallel_show_required_actions') ):
				$parallel_show_required_actions = get_option('parallel_show_required_actions');
			else:
				$parallel_show_required_actions = array();
			endif;

			if( !empty($parallel_required_actions) ):
				foreach( $parallel_required_actions as $parallel_required_action_value ):
					if(( !isset( $parallel_required_action_value['check'] ) || ( isset( $parallel_required_action_value['check'] ) && ( $parallel_required_action_value['check'] == false ) ) ) && ((isset($parallel_show_required_actions[$parallel_required_action_value['id']]) && ($parallel_show_required_actions[$parallel_required_action_value['id']] == true)) || !isset($parallel_show_required_actions[$parallel_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'parallel-welcome-screen-js', 'ParallelWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','parallel' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 */
	public function parallel_welcome_scripts_for_customizer() {

		global $parallel_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('parallel_show_required_actions') ):
			$parallel_show_required_actions = get_option('parallel_show_required_actions');
		else:
			$parallel_show_required_actions = array();
		endif;

		if( !empty($parallel_required_actions) ):
			foreach( $parallel_required_actions as $parallel_required_action_value ):
				if(( !isset( $parallel_required_action_value['check'] ) || ( isset( $parallel_required_action_value['check'] ) && ( $parallel_required_action_value['check'] == false ) ) ) && ((isset($parallel_show_required_actions[$parallel_required_action_value['id']]) && ($parallel_show_required_actions[$parallel_required_action_value['id']] == true)) || !isset($parallel_show_required_actions[$parallel_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'parallel-welcome-screen-customizer-js', 'ParallelWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=parallel-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','parallel'),
		) );
	}

	/**
	 * Dismiss required actions
	 */
	public function parallel_dismiss_required_action_callback() {

		global $parallel_required_actions;

		$parallel_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $parallel_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($parallel_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('parallel_show_required_actions') ):

				$parallel_show_required_actions = get_option('parallel_show_required_actions');

				$parallel_show_required_actions[$parallel_dismiss_id] = false;

				update_option( 'parallel_show_required_actions',$parallel_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$parallel_show_required_actions_new = array();

				if( !empty($parallel_required_actions) ):

					foreach( $parallel_required_actions as $parallel_required_action ):

						if( $parallel_required_action['id'] == $parallel_dismiss_id ):
							$parallel_show_required_actions_new[$parallel_required_action['id']] = false;
						else:
							$parallel_show_required_actions_new[$parallel_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'parallel_show_required_actions', $parallel_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 */
	public function parallel_welcome_screen() {

		get_template_part( ABSPATH . 'wp-load.php' );
		get_template_part( ABSPATH . 'wp-admin/admin.php' );
		get_template_part( ABSPATH . 'wp-admin/admin-header.php' );
		?>
        
        <div class="wrap about-wrap theme-welcome">
            <h1><?php esc_html_e('Welcome to Parallel', 'parallel'); ?></h1>
            <h3><?php esc_html_e('VERSION 1.3.5', 'parallel'); ?></h3>
            <div class="about-text"><?php esc_html_e('Parallel is a one-page multi-purpose theme for professionals and small businesses. Its strength lies in displaying content on a single page in a simple and elegant manner. It\'s super easy to customize and allows you to establish your online online presence in minutes.', 'parallel'); ?></div>
            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'parallel'); ?></span></a>
            <div class="clearfix"></div>
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab nav-tab-active"><?php esc_html_e('Get Started', 'parallel'); ?></a>
            </h2>
            <div class="info-tab-content">
                <div class="left">
                    <div>
                    	<p><?php esc_html_e('Follow the steps below to setup Parallel and begin customizing your website.', 'parallel'); ?></p>
                        <h3><?php esc_html_e('Step 1 - Install Plugins', 'parallel'); ?></h3>
                        <ol>
                            <li><?php esc_html_e('Install', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/redux-framework/'); ?>"><?php esc_html_e('Redux Framework', 'parallel'); ?></a> <?php esc_html_e('plugin', 'parallel'); ?></li>
                            <li><?php esc_html_e('Install', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/contact-form-7/'); ?>"><?php esc_html_e('Contact Form 7', 'parallel'); ?></a> <?php esc_html_e('plugin', 'parallel'); ?></li>
                            <li><?php esc_html_e('Install', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/mailchimp-for-wp/'); ?>"><?php esc_html_e('Mailchimp for WordPress', 'parallel'); ?></a> <?php esc_html_e('plugin', 'parallel'); ?></li>
                            <li><?php esc_html_e('Install', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('https://wordpress.org/plugins/theme-demo-import/'); ?>"><?php esc_html_e('Theme Demo Import', 'parallel'); ?></a> <?php esc_html_e('plugin', 'parallel'); ?></li>
                        </ol>
                        <p>
                            <a class="button button-secondary" href="<?php echo esc_url('themes.php?page=tgmpa-install-plugins'); ?>"><?php esc_html_e('Install Plugins', 'parallel'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Step 2 - Configure Homepage Layout', 'parallel'); ?></h3>
                        <ol>
                            <li><?php esc_html_e('Create or edit a page, and assign it the One-Page Template from the Page Attributes section.', 'parallel'); ?></li>
                            <li><?php esc_html_e('Go to Settings > Reading and set "Front page displays" to "A static page".', 'parallel'); ?></li>
                            <li><?php esc_html_e('Select the page you just assigned the One-page Template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.', 'parallel'); ?></li>
                        </ol>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/knowledgebase/parallel-configure-homepage-layout/'); ?>"><?php esc_html_e('Homepage Configuration Instructions (with video)', 'parallel'); ?></a></p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Step 3 - Import Demo Content (OPTIONAL)', 'parallel'); ?></h3>
                        <p><?php esc_html_e('Make your site look like our live demo; import all demo pages, posts and widgets.', 'parallel'); ?>
                        <br /><?php esc_html_e('Live demo:', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('http://demo.themely.com/parallel/'); ?>">http://demo.themely.com/parallel/</a><br /><i><?php esc_html_e('(Make sure you have already installed the Theme Demo Import Plugin)', 'parallel'); ?></i></p>
                        <p><a class="button button-secondary" href="<?php echo esc_url('themes.php?page=theme-demo-import'); ?>"><?php esc_html_e('Import Demo Content', 'parallel'); ?></a></p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Customize Your Website', 'parallel'); ?></h3>
                        <p class="about"><?php esc_html_e('Click the button below to configure theme settings and start customizing your site.', 'parallel'); ?></p>
                        <p>
                            <a class="button button-primary button-hero" href="<?php echo esc_url('admin.php?page=Parallel&tab=1'); ?>"><?php esc_html_e('Parallel Options', 'parallel'); ?></a>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Theme Support', 'parallel'); ?></h3>
                        <p class="about"><?php esc_html_e('Need help? Support for Parallel is conducted through our support ticket system.', 'parallel'); ?></p>
                        <ul class="ul-square">
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Support Forum', 'parallel'); ?></a></li>
                            <li><a target="_blank" href="<?php echo esc_url('http://support.themely.com/section/parallel-theme-documentation/'); ?>"><?php esc_html_e('Theme Documentation', 'parallel'); ?></a></li>
                        </ul>
                        <p><a class="button button-secondary" target="_blank" href="<?php echo esc_url('http://support.themely.com/forums/'); ?>"><?php esc_html_e('Create a support ticket', 'parallel'); ?></a></p>
                    </div>
                </div>
                <div class="right">
                    <div class="upgrade">
                        <h3><?php esc_html_e('Upgrade to Parallel Pro!', 'parallel'); ?></h3>
                        <p class="about"><?php esc_html_e('Unlock all theme features!', 'parallel'); ?> <a target="_blank" href="<?php echo esc_url('http://demo.themely.com/parallel/'); ?>"><?php esc_html_e('View the live demo', 'parallel'); ?></a></p>
                        <p class="red"><strong><?php esc_html_e('Save 10% with coupon code', 'parallel'); ?> <span class="border-red"><?php esc_html_e('THEMELY10', 'parallel'); ?></span></strong></p>
                        <ul class="ul-square">
                            <li><?php esc_html_e('Easily change font type, color and size for all sections (no coding required)', 'parallel'); ?></li>
                            <li><?php esc_html_e('Change order of homepage sections (drag & drop)', 'parallel'); ?></li>
                            <li><?php esc_html_e('Easily change size and color of icons (no coding required)', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Photo & Video Slider in Welcome Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Content Animations', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Clients Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Single Projects Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Projects Grid Section (with lightbox popup)', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Pricing Tables Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Call To Action 1 Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Stats Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Videos Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Google Maps Section', 'parallel'); ?></li>
                            <li><?php esc_html_e('UNLOCK Social sharing on posts (Facebook, Twitter, Linkedin, Reddit, etc)', 'parallel'); ?></li>
                            <li><?php esc_html_e('MORE Theme Customization Options', 'parallel'); ?></li>
                            <li><?php esc_html_e('MORE Widget Areas', 'parallel'); ?></li>
                            <li><?php esc_html_e('MORE Custom Widgets', 'parallel'); ?></li>
                            <li><?php esc_html_e('ENHANCED Options Panel', 'parallel'); ?></li>
                            <li><?php esc_html_e('FREE Child Theme', 'parallel'); ?></li>
                            <li><?php esc_html_e('No restrictions!', 'parallel'); ?></li>
                            <li><?php esc_html_e('Priority support', 'parallel'); ?></li>
                            <li><?php esc_html_e('Regular theme updates', 'parallel'); ?></li>
                        </ul>
                        <p>
                            <a class="button button-primary button-hero" target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/parallel/'); ?>"><?php esc_html_e('UPGRADE NOW', 'parallel'); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}

}

$GLOBALS['parallel_Welcome'] = new parallel_Welcome();