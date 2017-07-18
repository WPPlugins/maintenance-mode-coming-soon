<?php

/**
 * Required functions for the plugin.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

function mmcs_render_template( $options ) {

	// Fix for W3 Total Cache plugin
	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		ob_end_clean();
		wp_cache_clear_cache();
	}


	// Fix for WP Super Cache plugin
	if ( function_exists( 'w3tc_pgcache_flush' ) ) {
		ob_end_clean();
		w3tc_pgcache_flush();
	}


	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', true );
	}

	if ( ! defined( 'DONOTCDN' ) ) {
		define( 'DONOTCDN', true );
	}

	if ( ! defined( 'DONOTCACHEDB' ) ) {
		define( 'DONOTCACHEDB', true );
	}

	if ( ! defined( 'DONOTMINIFY' ) ) {
		define( 'DONOTMINIFY', true );
	}

	if ( ! defined( 'DONOTCACHEOBJECT' ) ) {
		define( 'DONOTCACHEOBJECT', true );
	}


	/**
	 * Using the nocache_headers() to ensure that different nocache headers are sent
	 * to different browsers.
	 * We don't want any browser to cache the maintainance page.
	 * Also, output buffering is turned on.
	 */

	nocache_headers();
	ob_start();


	// Checking for options required for the plugin
	if ( empty( $options['basic']['title'] ) ) 					:	$options['basic']['title'] 					= esc_html__( 'Maintainance Mode', 'maintenance-mode-coming-soon' );				endif;
	if ( empty( $options['form']['input_text'] ) )				:	$options['form']['input_text'] 				= esc_html__( 'Enter your email address..', 'maintenance-mode-coming-soon' );	 	endif;
	if ( empty( $options['form']['button_text'] ) )				:	$options['form']['button_text'] 			= esc_html__( 'Subscribe', 'maintenance-mode-coming-soon' ); 						endif;

	// Response message
	if ( empty( $options['email']['message_noemail'] ) )		:	$options['email']['message_noemail'] 		= esc_html__( 'Oops! Something went wrong.', 'maintenance-mode-coming-soon' ); 		endif;
	if ( empty( $options['email']['message_subscribed'] ) )		:	$options['email']['message_subscribed'] 	= esc_html__( 'You are already subscribed!', 'maintenance-mode-coming-soon' ); 		endif;
	if ( empty( $options['email']['message_wrong'] ) )			:	$options['email']['message_wrong'] 			= esc_html__( 'Oops! Something went wrong.', 'maintenance-mode-coming-soon' ); 		endif;
	if ( empty( $options['email']['message_done'] ) )			:	$options['email']['message_done'] 			= esc_html__( 'Thank you! We\'ll be in touch!', 'maintenance-mode-coming-soon' ); 	endif;


	// Template file
	if ( '1' == $options['advanced']['disable_settings'] ) {
		require_once SIGNALS_MMCS_PATH . 'framework/public/views/blank.php';
	} else {
		require_once SIGNALS_MMCS_PATH . 'framework/public/views/html.php';
	}


	ob_flush();
	exit();

}


// To check the referrer
function mmcs_check_referrer() {

	// List of crawlers to check for
	$crawlers = array(
		'Abacho'          	=> 	'AbachoBOT',
		'Accoona'         	=> 	'Acoon',
		'AcoiRobot'       	=> 	'AcoiRobot',
		'Adidxbot'        	=> 	'adidxbot',
		'AltaVista robot' 	=> 	'Altavista',
		'Altavista robot' 	=> 	'Scooter',
		'ASPSeek'         	=> 	'ASPSeek',
		'Atomz'           	=> 	'Atomz',
		'Bing'            	=> 	'bingbot',
		'BingPreview'     	=> 	'BingPreview',
		'CrocCrawler'     	=> 	'CrocCrawler',
		'Dumbot' 			=> 	'Dumbot',
		'eStyle Bot'     	=> 	'eStyle',
		'FAST-WebCrawler'	=> 	'FAST-WebCrawler',
		'GeonaBot'       	=> 	'GeonaBot',
		'Gigabot'        	=> 	'Gigabot',
		'Google'         	=> 	'Googlebot',
		'ID-Search Bot'  	=> 	'IDBot',
		'Lycos spider'   	=> 	'Lycos',
		'MSN'            	=> 	'msnbot',
		'MSRBOT'         	=> 	'MSRBOT',
		'Rambler'        	=> 	'Rambler',
		'Scrubby robot'  	=> 	'Scrubby',
		'Yahoo'           	=> 	'Yahoo'
	);


	// Checking for the crawler over here
	if ( mmcs_string_to_array( $_SERVER['HTTP_USER_AGENT'], $crawlers ) ) {
		return true;
	}


	return false;

}


// Function to match the user agent with the crawlers array
function mmcs_string_to_array( $str, $array ) {

	$regexp = '~(' . implode( '|', array_values( $array ) ) . ')~i';
	return ( bool ) preg_match( $regexp, $str );

}