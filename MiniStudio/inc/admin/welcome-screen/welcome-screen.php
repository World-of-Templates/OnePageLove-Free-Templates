<?php
/**
 * Welcome Screen Class
 */
class Blogcafe_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'ministudio_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'ministudio_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'ministudio_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'ministudio_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'ministudio_welcome', array( $this, 'ministudio_welcome_getting_started' ), 	    10 );
		add_action( 'ministudio_welcome', array( $this, 'ministudio_welcome_free_pro' ), 				60 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_ministudio_dismiss_required_action', array( $this, 'ministudio_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_ministudio_dismiss_required_action', array($this, 'ministudio_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function ministudio_welcome_register_menu() {
		add_theme_page( 'About Ministudio', 'About Ministudio', 'activate_plugins', 'ministudio-welcome', array( $this, 'ministudio_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function ministudio_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'ministudio_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function ministudio_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Ministudio! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'ministudio' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ministudio-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=ministudio-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Ministudio', 'ministudio' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function ministudio_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_ministudio-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'ministudio-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'ministudio-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $ministudio_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('ministudio_show_required_actions') ):
				$ministudio_show_required_actions = get_option('ministudio_show_required_actions');
			else:
				$ministudio_show_required_actions = array();
			endif;

			if( !empty($ministudio_required_actions) ):
				foreach( $ministudio_required_actions as $ministudio_required_action_value ):
					if(( !isset( $ministudio_required_action_value['check'] ) || ( isset( $ministudio_required_action_value['check'] ) && ( $ministudio_required_action_value['check'] == false ) ) ) && ((isset($ministudio_show_required_actions[$ministudio_required_action_value['id']]) && ($ministudio_show_required_actions[$ministudio_required_action_value['id']] == true)) || !isset($ministudio_show_required_actions[$ministudio_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'ministudio-welcome-screen-js', 'ministudioWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','ministudio' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function ministudio_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'ministudio-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'ministudio-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $ministudio_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('ministudio_show_required_actions') ):
			$ministudio_show_required_actions = get_option('ministudio_show_required_actions');
		else:
			$ministudio_show_required_actions = array();
		endif;

		if( !empty($ministudio_required_actions) ):
			foreach( $ministudio_required_actions as $ministudio_required_action_value ):
				if(( !isset( $ministudio_required_action_value['check'] ) || ( isset( $ministudio_required_action_value['check'] ) && ( $ministudio_required_action_value['check'] == false ) ) ) && ((isset($ministudio_show_required_actions[$ministudio_required_action_value['id']]) && ($ministudio_show_required_actions[$ministudio_required_action_value['id']] == true)) || !isset($ministudio_show_required_actions[$ministudio_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'ministudio-welcome-screen-customizer-js', 'ministudioWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=ministudio-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','ministudio'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function ministudio_dismiss_required_action_callback() {

		global $ministudio_required_actions;

		$ministudio_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $ministudio_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($ministudio_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('ministudio_show_required_actions') ):

				$ministudio_show_required_actions = get_option('ministudio_show_required_actions');

				$ministudio_show_required_actions[$ministudio_dismiss_id] = false;

				update_option( 'ministudio_show_required_actions',$ministudio_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$ministudio_show_required_actions_new = array();

				if( !empty($ministudio_required_actions) ):

					foreach( $ministudio_required_actions as $ministudio_required_action ):

						if( $ministudio_required_action['id'] == $ministudio_dismiss_id ):
							$ministudio_show_required_actions_new[$ministudio_required_action['id']] = false;
						else:
							$ministudio_show_required_actions_new[$ministudio_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'ministudio_show_required_actions', $ministudio_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function ministudio_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="ministudio-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','ministudio'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','ministudio'); ?></a></li>
		</ul>

		<div class="ministudio-tab-content">

			<?php
			/**
			 * @hooked ministudio_welcome_getting_started - 10
			 * @hooked ministudio_welcome_actions_required - 20
			 * @hooked ministudio_welcome_child_themes - 30
			 * @hooked ministudio_welcome_github - 40
			 * @hooked ministudio_welcome_changelog - 50
			 * @hooked ministudio_welcome_free_pro - 60
			 */
			do_action( 'ministudio_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function ministudio_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function ministudio_welcome_free_pro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

$GLOBALS['Blogcafe_Welcome'] = new Blogcafe_Welcome();