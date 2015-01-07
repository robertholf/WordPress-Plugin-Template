<?php

/*
 * RBPlugin_Admin Class
 *
 * These are administrative specific functions
 */

class RBPlugin_Admin {

	// *************************************************************************************************** //

	/*
	 * Initialize
	 */

		public static function admin_init(){

			// Check if Admin
			if ( is_admin() ){

				// Add Primary Menus
				add_action( 'admin_menu', array('RBPlugin_Admin', 'menu_admin') );

				// Add  Menu Item to Settings Page
				add_action( 'admin_menu', array('RBPlugin_Admin', 'menu_addlinkto_settings') );

				// Add Styles to Admin Head Section 
				add_action('admin_head', array('RBPlugin_Admin', 'RBPlugin_admin_head') );


			}

		}


	/*
	 * Administrative Menu's
	 */

		// Add Admin Menu
		public static function menu_admin(){

			add_menu_page( __('Sample', RBPlugin_TEXTDOMAIN), __('Sample', RBPlugin_TEXTDOMAIN), 'edit_pages', 'plugin', array('RBPlugin_Admin', 'menu_dashboard'), 'div', 4);

				add_submenu_page( 'plugin', __('Dashboard', RBPlugin_TEXTDOMAIN), __('Dashboard', RBPlugin_TEXTDOMAIN), 'edit_pages', 'plugin', array('RBPlugin_Admin', 'menu_dashboard') );
				add_submenu_page( 'plugin', __('Settings', RBPlugin_TEXTDOMAIN), __('Settings', RBPlugin_TEXTDOMAIN), 'edit_pages', 'plugin_menu_settings', array('RBPlugin_Admin', 'menu_settings') );

		}

		// Add Menu Item to Settings Dropdown
		public static function menu_addlinkto_settings() {

			// Check Permissions, Allow Editors and above, not just any low user level 
			if ( !current_user_can('edit_posts') )
				return;

			add_options_page( 'RB Plugin', 'RB Plugin', 'manage_options', 'plugin', array('RBPlugin_Admin', 'menu_settings'));
		}


	/*
	 * Define Views for Navigation
	 */

		// Admin Dashboard View
		public static function menu_dashboard(){
			include_once( RBPlugin_PLUGIN_DIR .'view/admin/dashboard.php');
		}

		// Settings Page View
		public static function menu_settings(){
			//include_once('view/admin/settings.php');
		}


	/*
	 * Define Admin Styles
	 */

		public static function RBPlugin_admin_head() {
			// Ensure we are in the admin section of wordpress
			if( is_admin() ) {

				// Get Styles
				wp_register_style( 'RBPLUGINadmin', RBPlugin_PLUGIN_PATH .'assets/css/admin/admin.css' );
				wp_enqueue_style( 'RBPLUGINadmin' );

				// Get Scripts
				//wp_enqueue_script( 'jquery-ui-datepicker' );

			}
		}

}
