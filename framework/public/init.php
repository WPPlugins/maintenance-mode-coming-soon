<?php

/**
 * Public side of the plugin.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

/* Include important files. */
require_once SIGNALS_MMCS_PATH . 'framework/public/include/functions.php';


function mmcs_plugin_init() {

	add_action( 'mmcs_footer_scripts', 'mmcs_scripts' );

	// Plugin options from the database
	$options['basic'] 		= get_option( 'mmcs_options_basic' );
	$options['email'] 		= get_option( 'mmcs_options_email' );
	$options['design'] 		= get_option( 'mmcs_options_design' );
	$options['form'] 		= get_option( 'mmcs_options_form' );
	$options['social'] 		= get_option( 'mmcs_options_social' );
	$options['advanced'] 	= get_option( 'mmcs_options_advanced' );


	// Localization
	load_plugin_textdomain( 'maintenance-mode-coming-soon', false, SIGNALS_MMCS_PATH . 'framework/langs' );


	// Getting custom login URL for the admin
	$login_url = wp_login_url();


	// Checking for the server protocol status
	if ( isset( $_SERVER['HTTPS'] ) === true ) {
		$protocol = 'https';
	} else {
		$protocol = 'http';
	}


	// This is the server address of the current page
	$server_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


	// Checking for the custom_login_url value
	if ( empty( $options['basic']['custom_login_url'] ) ) {
		$options['basic']['custom_login_url'] = NULL;
	}


	// Not for the backend
	// Only modifies the frontend of the system
	if ( ! is_admin() ) {
		if ( '1' == $options['basic']['status'] ) {

			/**
			 * A lot of checks are going on over here.
			 * We are checking for admin role, crawler status, and important wordpress pages to bypass.
			 * If the admin decides to exclude search engine from viewing the plugin, the website will be shown.
			 */

			if ( false === strpos( $server_url, '/wp-login.php' )
				&& false === strpos( $server_url, '/wp-admin/' )
				&& false === strpos( $server_url, '/async-upload.php' )
				&& false === strpos( $server_url, '/upgrade.php' )
				&& false === strpos( $server_url, '/plugins/' )
				&& false === strpos( $server_url, '/xmlrpc.php' )
				&& false === strpos( $server_url, $login_url )
				&& false === strpos( $server_url, $options['basic']['custom_login_url'] ) ) {

				// Checking for the search engine option
				if ( '1' == $options['basic']['exclude_se'] ) {
					if ( ! mmcs_check_referrer() ) {
						if ( '1' == $options['basic']['show_logged_in'] ) {
							// Checking if the user is logged in or not
							if ( ! is_user_logged_in() ) {
								// Render the maintenance mode template since the user is not logged in
								mmcs_render_template( $options );
							}
						} else {
							// Render the maintenance mode template
							mmcs_render_template( $options );
						}
					}
				} else {
					if ( '1' == $options['basic']['show_logged_in'] ) {
						// Checking if the user is logged in or not
						if ( ! is_user_logged_in() ) {
							// Render the maintenance mode template since the user is not logged in
							mmcs_render_template( $options );
						}
					} else {
						// Render the maintenance mode template.
						mmcs_render_template( $options );
					}
				}
			}
		}
	}

}
add_action( 'init', 'mmcs_plugin_init' );