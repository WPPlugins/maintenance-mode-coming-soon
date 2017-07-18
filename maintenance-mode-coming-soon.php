<?php

/**
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 *
 *
 * Plugin Name: 		Maintenance Mode & Coming Soon
 * Plugin URI: 			http://www.69signals.com/
 * Description: 		The Maintenance Mode & Coming Soon plugin allows you to quickly and easily set up a Maintenance Page or Coming Soon / Launch Page for your website.
 * Version: 			0.1
 * Author: 				akshitsethi
 * Author URI: 			http://www.69signals.com
 * License: 			GPLv3
 * License URI: 		http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: 		maintenance-mode-coming-soon
 * Domain Path: 		/framework/langs/
 *
 *
 * Maintenance Mode & Coming Soon Plugin
 * Copyright (C) 2017, akshitsethi - ping@69signals.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but without any warranty; without even the implied warranty of
 * merchantibility or fitness for a particular purpose. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 * Defining constants and activation hook.
 * If this file is called directly, abort.
 *
 * -------------------------------------------------------------------------
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}


/* Constants we will be using throughout the plugin. */
define( 'SIGNALS_MMCS_URL', plugins_url( '', __FILE__ ) );
define( 'SIGNALS_MMCS_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIGNALS_MMCS_VERSION', '0.1' );


/**
 * For the plugin activation & de-activation.
 * We are doing nothing over here.
 * ------------------------------------------------------------
 */

function mmcs_plugin_activation() {

	// Check for exisiting options in the database
	$options['basic'] 		= get_option( 'mmcs_options_basic' );
	$options['email'] 		= get_option( 'mmcs_options_email' );
	$options['design'] 		= get_option( 'mmcs_options_design' );
	$options['form'] 		= get_option( 'mmcs_options_form' );
	$options['social'] 		= get_option( 'mmcs_options_social' );
	$options['advanced'] 	= get_option( 'mmcs_options_advanced' );

	// Basic
	// ------------------------------------------------------------
	// Default options for the plugin on activation

	$default_options['basic'] 	= array(
		'status'				=> '2',
		'title' 				=> esc_html__( 'Maintenance Mode', 'maintenance-mode-coming-soon' ),
		'header_text' 			=> esc_html__( 'Maintenance Mode', 'maintenance-mode-coming-soon' ),
		'secondary_text' 		=> esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pharetra eu felis quis lobortis. Proin vitae rutrum nisl, ut ullamcorper quam. Praesent faucibus ligula ac nisl varius dictum. Maecenas iaculis posuere orci, sed consectetur augue.', 'maintenance-mode-coming-soon' ),
		'antispam_text' 		=> esc_html__( 'And yes, we hate spam too!', 'maintenance-mode-coming-soon' ),
		'custom_login_url' 		=> '',
		'show_logged_in' 		=> '2',
		'exclude_se'			=> '1',
		'arrange' 				=> 'logo,header,secondary,form,social,html',
		'analytics' 			=> '',
		'branding' 				=> '1'
	);

	// Email
	// ------------------------------------------------------------

	$default_options['email'] 	= array(
		'mailchimp_api'			=> '',
		'mailchimp_list' 		=> '',
		'message_noemail' 		=> esc_html__( 'Please provide a valid email address.', 'maintenance-mode-coming-soon' ),
		'message_subscribed' 	=> esc_html__( 'You are already subscribed!', 'maintenance-mode-coming-soon' ),
		'message_wrong' 		=> esc_html__( 'Oops! Something went wrong.', 'maintenance-mode-coming-soon' ),
		'message_done' 			=> esc_html__( 'Thank you! We\'ll be in touch!', 'maintenance-mode-coming-soon' )
	);

	// Design
	// ------------------------------------------------------------

	$default_options['design'] 	= array(
		'logo'						=> '',
		'favicon'					=> '',
		'bg_cover' 					=> '',
		'content_overlay' 			=> '2',
		'logo_height' 				=> '',
		'content_overlay_style' 	=> 'bb',
		'content_overlay_opacity' 	=> '25',
		'content_margin' 			=> '80',
		'content_padding' 			=> '30',
		'content_width'				=> '440',
		'content_border_size' 		=> '1',
		'content_border_color' 		=> '101010',
		'bg_color' 					=> 'ffffff',
		'content_color' 			=> 'ffffff',
		'content_position'			=> 'center',
		'content_alignment'			=> 'left',
		'header_font' 				=> 'Poppins',
		'secondary_font' 			=> 'Rubik',
		'header_font_size' 			=> '28',
		'secondary_font_size' 		=> '15',
		'header_font_lh' 			=> '42',
		'secondary_font_lh' 		=> '23',
		'header_font_style' 		=> 'bold',
		'secondary_font_style' 		=> 'normal',
		'header_font_color' 		=> '0e0f04',
		'secondary_font_color' 		=> '0e0f04',
		'antispam_font_size' 		=> '13',
		'antispam_font_lh' 			=> '24',
		'antispam_font_color' 		=> 'bbbbbb'
	);

	// Form
	// ------------------------------------------------------------

	$default_options['form'] 	= array(
		'input_text' 			=> esc_html__( 'Enter your email address..', 'maintenance-mode-coming-soon' ),
		'button_text' 			=> esc_html__( 'Subscribe', 'maintenance-mode-coming-soon' ),
		'ignore_form_styles' 	=> '2',
		'ajax_submit' 			=> '1',
		'input_font' 			=> 'Poppins',
		'button_font' 			=> 'Poppins',
		'input_font_size'		=> '13',
		'button_font_size'		=> '12',
		'input_font_lh' 		=> '22',
		'button_font_lh' 		=> '20',
		'input_font_color'		=> '0e0f04',
		'button_font_color'		=> 'ffffff',
		'input_bg'				=> '',
		'button_bg'				=> '0f0f0f',
		'input_bg_hover'		=> '',
		'button_bg_hover'		=> '0a0a0a',
		'input_border'			=> 'eeeeee',
		'button_border'			=> '0f0f0f',
		'input_border_hover'	=> 'bbbbbb',
		'button_border_hover'	=> '0a0a0a',
		'success_background' 	=> '90c695',
		'success_color' 		=> 'ffffff',
		'error_background' 		=> 'e08283',
		'error_color' 			=> 'ffffff'
	);

	// Social
	// ------------------------------------------------------------

	$default_options['social'] 	= array(
		'link_color' 			=> '101010',
		'link_hover' 			=> '101010',
		'icon_size' 			=> '16',
		'link_target' 			=> '_blank',
		'500px' 				=> '',
		'amazon' 				=> '',
		'android' 				=> '',
		'angellist' 			=> '',
		'apple' 				=> '',
		'behance' 				=> '',
		'bitbucket' 			=> '',
		'bitcoin' 				=> '',
		'buysellads'			=> '',
		'delicious'				=> '',
		'deviantart' 			=> '',
		'digg' 					=> '',
		'dribbble' 				=> '',
		'dropbox' 				=> '',
		'etsy' 					=> '',
		'facebook' 				=> '',
		'flickr' 				=> '',
		'foursquare' 			=> '',
		'github-alt' 			=> '',
		'google' 				=> '',
		'google-plus' 			=> '',
		'imdb' 					=> '',
		'instagram' 			=> '',
		'lastfm' 				=> '',
		'linkedin' 				=> '',
		'medium' 				=> '',
		'meetup' 				=> '',
		'mixcloud' 				=> '',
		'paypal' 				=> '',
		'pinterest' 			=> '',
		'product-hunt' 			=> '',
		'quora' 				=> '',
		'reddit' 				=> '',
		'scribd' 				=> '',
		'skype' 				=> '',
		'slack' 				=> '',
		'slideshare' 			=> '',
		'snapchat' 				=> '',
		'soundcloud' 			=> '',
		'spotify' 				=> '',
		'stack-overflow' 		=> '',
		'stumbleupon' 			=> '',
		'telegram' 				=> '',
		'trello' 				=> '',
		'tripadvisor' 			=> '',
		'tumblr' 				=> '',
		'twitch' 				=> '',
		'twitter' 				=> '',
		'vimeo' 				=> '',
		'vine' 					=> '',
		'vk' 					=> '',
		'wechat' 				=> '',
		'weibo' 				=> '',
		'whatsapp' 				=> '',
		'wikipedia-w' 			=> '',
		'wordpress' 			=> '',
		'xing' 					=> '',
		'yahoo' 				=> '',
		'youtube-play' 			=> ''
	);

	// Advanced
	// ------------------------------------------------------------

	$default_options['advanced'] = array(
		'disable_settings' 		=> '2',
		'custom_html'			=> '',
		'custom_css'			=> ''
	);

	/**
	 * If the options are not there in the database, then create the default options for the plugin.
	 * If present in the database, merge with the default ones.
	 * This is to provide compatibility with earlier versions. Although this does not 
	 * solve the purpose completely.
	 */

	// Basic
	// ------------------------------------------------------------

	if ( ! $options['basic'] ) {
		update_option( 'mmcs_options_basic', $default_options['basic'] );
	} else {
		$default_options['basic'] 		= array_merge( $default_options['basic'], $options['basic'] );
		update_option( 'mmcs_options_basic', $default_options['basic'] );
	}

	// Email
	// ------------------------------------------------------------

	if ( ! $options['email'] ) {
		update_option( 'mmcs_options_email', $default_options['email'] );
	} else {
		$default_options['email'] 		= array_merge( $default_options['email'], $options['email'] );
		update_option( 'mmcs_options_email', $default_options['email'] );
	}

	// Design
	// ------------------------------------------------------------

	if ( ! $options['design'] ) {
		update_option( 'mmcs_options_design', $default_options['design'] );
	} else {
		$default_options['design'] 	= array_merge( $default_options['design'], $options['design'] );
		update_option( 'mmcs_options_design', $default_options['design'] );
	}

	// Form
	// ------------------------------------------------------------

	if ( ! $options['form'] ) {
		update_option( 'mmcs_options_form', $default_options['form'] );
	} else {
		$default_options['form'] 		= array_merge( $default_options['form'], $options['form'] );
		update_option( 'mmcs_options_form', $default_options['form'] );
	}

	// Social
	// ------------------------------------------------------------

	if ( ! $options['social'] ) {
		update_option( 'mmcs_options_social', $default_options['social'] );
	} else {
		$default_options['social'] 		= array_merge( $default_options['social'], $options['social'] );
		update_option( 'mmcs_options_social', $default_options['social'] );
	}

	// Advanced
	// ------------------------------------------------------------

	if ( ! $options['advanced'] ) {
		update_option( 'mmcs_options_advanced', $default_options['advanced'] );
	} else {
		$default_options['advanced'] 	= array_merge( $default_options['advanced'], $options['advanced'] );
		update_option( 'mmcs_options_advanced', $default_options['advanced'] );
	}

} // mmcs_plugin_activation
register_activation_hook( __FILE__, 'mmcs_plugin_activation' );


/* Hook for the plugin deactivation. */
function mmcs_plugin_deactivation() {

	// Silence is golden
	// We might use this in future versions

}
register_deactivation_hook( __FILE__, 'mmcs_plugin_deactivation' );


/**
 * Including files necessary for the management panel of the plugin.
 * Basically, support panel and option to insert custom CSS is provided.
 * ------------------------------------------------------------
 */

if ( is_admin() ) {
	require_once SIGNALS_MMCS_PATH . 'framework/admin/init.php';
}


/**
 * Let's start the plugin now.
 * All the widgets are included and registered using the right hook.
 * ------------------------------------------------------------
 */

require_once SIGNALS_MMCS_PATH . 'framework/public/init.php';