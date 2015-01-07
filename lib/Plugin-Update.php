<?php

/*
 * RBPlugin_Update Class
 *
 * These are functions needed to remotely update the WordPress plugin 
 */

class RBPlugin_Update {

   /**
	 * The plugin current version
	 * @var string
	 */
	public $current_version;
 
	/**
	 * The plugin remote update path
	 * @var string
	 */
	public $update_path;
 
	/**
	 * Plugin Slug (plugin_directory/plugin_file.php)
	 * @var string
	 */
	public $plugin_slug;
 
	/**
	 * Plugin name (plugin_file)
	 * @var string
	 */
	public $slug;
 
	/**
	 * Initialize a new instance of the WordPress Auto-Update class
	 * @param string $current_version
	 * @param string $update_path
	 * @param string $plugin_slug
	 */
	function __construct($current_version, $update_path, $plugin_slug){


	}
 
	/**
	 * Add our self-hosted autoupdate plugin to the filter transient
	 *
	 * @param $transient
	 * @return object $ transient
	 */
	public function check_update($transient){


	}
 
	/**
	 * Add our self-hosted description to the filter
	 *
	 * @param boolean $false
	 * @param array $action
	 * @param object $arg
	 * @return bool|object
	 */
	public function check_info($false, $action, $arg){



	}
 
	/**
	 * Return the remote version
	 * @return string $remote_version
	 */
	public function getRemote_version(){


	}
 
	/**
	 * Get information about the remote version
	 * @return bool|object
	 */
	public function getRemote_information(){



	}
 
	/**
	 * Return the status of the plugin licensing
	 * @return boolean $remote_license
	 */
	public function getRemote_license(){



	}


}