<?php
/*
Plugin Name: RB Plugin WordPress Example
Plugin URI: http://rbplugin.com
Description: Example plugin.
Author: bertholf
Author URI: http://rob.bertholf.com
Version: 3.0
*/
$RBPlugin_VERSION = "3.0";
/*
License: None
*/

// *************************************************************************************************** //

	// Start Session
	if (!session_id()) session_start();


/*
 * Security
 */

	// Avoid direct calls to this file, because now WP core and framework has been used
	if ( !function_exists('add_action') ) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
	}

// *************************************************************************************************** //

/*
 * Declare Global Constants
 */

	// Version
	define( 'RBPlugin_VERSION', $RBPlugin_VERSION ); // e.g. 3.0
	// WordPress Version
	define( 'RBPlugin_VERSION_WP_MIN', '3.2' );
	// Paths
	define( 'RBPlugin_PLUGIN_PATH', plugin_dir_url(__FILE__) );
	define( 'RBPlugin_PLUGIN_DIR', plugin_dir_path(__FILE__) );
	define( 'RBPlugin_SLUG', plugin_basename(__FILE__) );
	define( 'RBPlugin_TEXTDOMAIN', RBPlugin_SLUG );
	// Server
	define( 'RBPlugin_LICENSE_PATH', 'http://rbplugin.com/license/' );


// *************************************************************************************************** //

/*
 * Initialize
 */

	// Call Classes
	require_once( RBPlugin_PLUGIN_DIR .'lib/RBPlugin-Init.php'); // WP Related
		add_action( 'init', array('RBPlugin_Init', 'init') ); // Menu/Internationalization etc.

	require_once( RBPlugin_PLUGIN_DIR .'lib/RBPlugin-Update.php'); // Update Specific
		add_action( 'init', 'update_check' );
			function update_check() {
				new wp_auto_update (RBPlugin_VERSION, RBPlugin_LICENSE_PATH, RBPlugin_SLUG);
			}

	require_once( RBPlugin_PLUGIN_DIR .'lib/RBPlugin-Common.php'); // Common Functions


	require_once( RBPlugin_PLUGIN_DIR .'lib/RBPlugin-Admin.php'); // Admin Specific
		add_action( 'init', array('RBPlugin_Admin', 'admin_init') ); // Menu/Internationalization etc.



/*
 * Hooks
 */

	// Activate Plugin
	register_activation_hook(__FILE__, array('RBPlugin_Init', 'activation'));

	// Deactivate Plugin
	register_deactivation_hook(__FILE__, array('RBPlugin_Init', 'deactivation'));

	// Uninstall Plugin
	register_uninstall_hook(__FILE__, array('RBPlugin_Init', 'uninstall'));



// *************************************************************************************************** //

/*
 * Diagnostics
 */

	define( 'RBPlugin_VERSION_SUPPORTED', version_compare(get_bloginfo('version'), RBPlugin_VERSION_WP_MIN, '>=') );




