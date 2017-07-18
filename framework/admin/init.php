<?php

/**
 * WordPress management panel.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

function mmcs_meta_links( $links, $file ) {

	if ( strpos( $file, 'maintenance-mode-coming-soon.php' ) !== false ) {
		$new_links = array(
			'<a href="http://www.69signals.com/support.php" target="_blank">' . esc_html__( 'Support', 'maintenance-mode-coming-soon' ) . '</a>',
			'<a href="http://www.69signals.com/hire-us.php" target="_blank">' . esc_html__( 'Hire Us', 'maintenance-mode-coming-soon' ) . '</a>'
		);

		$links = array_merge( $links, $new_links );
	}

	return $links;

}
add_filter( 'plugin_row_meta', 'mmcs_meta_links', 10, 2 ); // Add plugin meta links


// Menu for the support and about panel
function mmcs_add_menu() {

	if( is_admin() && current_user_can( 'manage_options' ) ) {
		// Adding to the plugin panel link to the settings menu
		$menu = add_options_page (
			esc_html__( 'Maintenance Mode & Coming Soon', 'maintenance-mode-coming-soon' ),
			esc_html__( 'Maintenance Mode', 'maintenance-mode-coming-soon' ),
			'manage_options',
			'maintenance_mode_options',
			'mmcs_admin_settings'
		);

		// Loading the JS conditionally
		add_action( 'load-' . $menu, 'mmcs_load_scripts' );
	}

}
add_action( 'admin_menu', 'mmcs_add_menu' );


// Registering .js and .css files
function mmcs_admin_scripts() {

	wp_register_style( 'mmcs-admin-base', SIGNALS_MMCS_URL . '/framework/admin/css/admin.css', false, '0.1' );

	wp_register_script( 'mmcs-webfonts', '//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js', false, '0.1' );
	wp_register_script( 'mmcs-admin-editor', SIGNALS_MMCS_URL . '/framework/admin/js/editor/ace.js', false, '0.1', true );
	wp_register_script( 'mmcs-admin-color', SIGNALS_MMCS_URL . '/framework/admin/js/colorpicker/jscolor.js', false, '0.1', true );
	wp_register_script( 'mmcs-admin-base', SIGNALS_MMCS_URL . '/framework/admin/js/admin.js', 'jquery', '0.1', true );

	// Styles
	wp_enqueue_style( 'mmcs-admin-base' );

	// Scripts
	wp_enqueue_script( 'mmcs-webfonts' );
	wp_enqueue_script( 'mmcs-admin-editor' );
	wp_enqueue_script( 'mmcs-admin-color' );
	wp_enqueue_script( 'mmcs-admin-base' );

	// Media Uploader
	wp_enqueue_media();

}


// Scripts & styles for the plugin
function mmcs_load_scripts() {

	add_action( 'admin_enqueue_scripts', 'mmcs_admin_scripts' );

}


// Including file for the management panel
require_once SIGNALS_MMCS_PATH . 'framework/admin/settings.php';