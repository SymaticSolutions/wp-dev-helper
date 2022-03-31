<?php

/**
 * Fired during plugin activation
 *
 * @link       https://symaticsolutions.com
 * @since      0.1.0
 *
 * @package    Wp_Developer_Debug
 * @subpackage Wp_Developer_Debug/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.1.0
 * @package    Wp_Developer_Debug
 * @subpackage Wp_Developer_Debug/includes
 * @author     Symatic Solutions <info>
 */
class Wp_Developer_Debug_Activator {

	/**
	 * Activation Script
	 *
	 * Upon plugin activation add new user role 'Developer' and setup capabilities.
	 *
	 * @since    0.1.0
	 */
	public static function activate() {
		if(is_multisite()){ // if multisite is enabled we need to set developer capabilities similar to Super Admin.
			add_role(
				'developer',
				'Developer',
				get_role( 'administrator' )->capabilities // Administrator capabilities.
				+ array( // Super Admin capabilities.
					'create_sites' => 1,
					'delete_sites' => 1,
					'manage_network' => 1,
					'manage_sites' => 1,
					'manage_network_users' => 1,
					'manage_network_plugins' => 1,
					'manage_network_themes' => 1,
					'manage_network_options' => 1,
					'upgrade_network' => 1,
					'setup_network' => 1
				)
			);
		}else{
			add_role(
				'developer',
				'Developer',
				get_role( 'administrator' )->capabilities // Administrator capabilities.
			);
		}

	}

}
