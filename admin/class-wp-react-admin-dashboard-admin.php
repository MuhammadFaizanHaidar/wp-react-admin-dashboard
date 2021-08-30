<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://faizanhaidar.com
 * @since      1.0.0
 *
 * @package    Wp_React_Admin_Dashboard
 * @subpackage Wp_React_Admin_Dashboard/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_React_Admin_Dashboard
 * @subpackage Wp_React_Admin_Dashboard/admin
 * @author     Muhammad Faizan Haidar <faizanhaider594@gmail.com>
 */
class Wp_React_Admin_Dashboard_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_React_Admin_Dashboard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_React_Admin_Dashboard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'css/wp-react-admin-dashboard-admin.css',
			array(),
			$this->version,
			'all'
		);
		$ver           = ( get_file_data( __FILE__, [ "Version" => "Version" ], false ) )['Version'];
		$css_to_load   = WP_REACT_ADMIN_DASHBOARD_URL . 'app/build/static/css/main.css';
		if ( defined( 'ENV_DEV' ) && ENV_DEV ) {
			// DEV React dynamic loading.
			$ver         = gmdate( 'Y-m-d-h-i-s' );
			
			$css_to_load = 'http://localhost:3000/elementorserver/wordpress/wp-content/plugins/wp-react-admin-dashboard/app/build/static/css/main.css';
		}
		$this->version = $ver;
		wp_enqueue_style(
			$this->plugin_name.'react-admin-css',
			$css_to_load,
			array(),
			$this->version,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_React_Admin_Dashboard_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_React_Admin_Dashboard_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/wp-react-admin-dashboard-admin.js',
			array( 'jquery' ),
			$this->version,
			false 
		);
		$ver           = ( get_file_data( __FILE__, [ "Version" => "Version" ], false ) )['Version'];
		$js_to_load    = WP_REACT_ADMIN_DASHBOARD_URL . 'app/build/static/js/main.js';
		if ( defined( 'ENV_DEV' ) && ENV_DEV ) {
			// DEV React dynamic loading.
			$ver         = gmdate( 'Y-m-d-h-i-s' );
			$js_to_load  = 'http://localhost:3000/elementorserver/wordpress/wp-content/plugins/wp-react-admin-dashboard/app/build/static/js/main.js';
		}
		$this->version = $ver;
		wp_enqueue_script(
			$this->plugin_name.'react-admin-js',
			$js_to_load,
			array( 'wp-element' ),
			$this->version,
			true
		);
	}

	public function wp_react_admin_dashboard_add_admin_menu() {
		add_menu_page(
			__( 'WordPress React Admin DashBoard','wp-react-admin-dashboard' ),
			__( 'WordPress React Admin DashBoard','wp-react-admin-dashboard' ),
			'manage_options',
			'wordpress_react_admin_dashboard',
			[ $this, 'wp_react_admin_dashboard_options_page' ],
			'dashboard',
			3

		);
	}

	public function wp_react_admin_dashboard_settings_init(  ) { 

		register_setting( 'pluginPage', 'wp_react_admin_dashboard_settings' );
	
		add_settings_section(
			'wp_react_admin_dashboard_pluginPage_section', 
			__( 'Your section description', 'wp-react-admin-dashboard' ), 
			[ $this, 'wp_react_admin_dashboard_settings_section_callback' ], 
			'pluginPage'
		);
	
		
	}

	public function wp_react_admin_dashboard_options_page(  ) { 

		?>
		<div id="wp-react-admin-dashboard">

		</div>
		<?php

	}
	

}
