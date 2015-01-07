<?php

/*
 * RBPlugin_Init Class
 *
 * These are core functions needed to enable a WordPress plugin shell
 * and handle common plugin functions like activation & uninstall, etc.
 */

class RBPlugin_Init {


	// *************************************************************************************************** //
	/*
	 * 
	 */

		public static function init(){

			/*
			 * Internationalization
			 */

				// Identify Folder for PO files
				load_plugin_textdomain( RBPlugin_TEXTDOMAIN, false, basename( dirname( __FILE__ ) ) . '/assets/languages/' );


		}



	// *************************************************************************************************** //

	/*
	 * Plugin Activation
	 * Run when the plugin is installed.
	 */

		public function activation(){



		}


	/*
	 * Plugin Deactivation
	 * Cleanup when complete
	 */

		public function deactivation(){


		}



	/*
	 * Plugin Uninstall
	 * Cleanup when complete
	 */

		public function uninstall(){

			// Delete Saved Settings
			delete_option('rbplugin');

			// Redirect back to Plugins
			echo "<div style=\"padding:50px;font-weight:bold;\"><p>". __("Almost done...", RBPlugin_TEXTDOMAIN) ."</p><h1>". __("please uninstall on plugins page.", RBPlugin_TEXTDOMAIN) ."</h1><a href=\"plugins.php?deactivate=true\">". __("Please click here to complete the uninstallation process", RBPlugin_TEXTDOMAIN) ."</a></h1></div>";
			die;

		}


	/*
	 * Flush Rewrite Rules
	 * Remember to flush_rules() when adding rules
	 */

		public function flush_rules(){

			global $wp_rewrite;
			$wp_rewrite->flush_rules();

		}


	// *************************************************************************************************** //

	/*
	 * Update Needed
	 * Is this an updated version of the software and needs database upgrade?
	 */

		public function check_update_needed(){

			// Hold the version in a seprate option
			if(!get_option("rb_agency_version")) {
				update_option("rb_agency_version", rb_agency_VERSION);
			} else {
				// Version Exists, but is it out of date?
				if(get_option("rb_agency_version") <> rb_agency_VERSION){
					require_once(WP_PLUGIN_DIR . "/" . basename(dirname(__FILE__)) . "/upgrade.php");
				} else {
					// Namaste, version is number is correct
				}
			}
		}


	/*
	 * Upgrade Check
	 * Is there a newer version of the software available to upgrade to?
	 */

		public function check_upgrade_available(){
			//if(!class_exists("RBAgency_Update"))
				//require_once("update.php");

			//return RBAgency_Update::check_version($update_plugins_option, true);
		}



}
