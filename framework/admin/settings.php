<?php

/**
 * Settings page for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

function mmcs_admin_settings() {

	// Class : Mailchimp
	require_once SIGNALS_MMCS_PATH . 'framework/public/include/classes/class-mailchimp.php';

	// Google : Fonts
	require_once SIGNALS_MMCS_PATH . 'framework/admin/include/fonts.php';

	// Grab options from the database
	$options['basic'] 		= get_option( 'mmcs_options_basic' );
	$options['email'] 		= get_option( 'mmcs_options_email' );
	$options['design'] 		= get_option( 'mmcs_options_design' );
	$options['form'] 		= get_option( 'mmcs_options_form' );
	$options['social'] 		= get_option( 'mmcs_options_social' );
	$options['advanced'] 	= get_option( 'mmcs_options_advanced' );

	// Grabbing admin_email from the database
	$admin_email  			= get_option( 'admin_email', '' );

	// View template for the settings panel
	require_once SIGNALS_MMCS_PATH . 'framework/admin/views/settings.php';

}


// AJAX request for #basic section
function mmcs_ajax_basic() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' )
	);

	// Filter and Sanitize
	// Checking whether the status option is checked or not
	if ( isset( $_POST['mmcs_status'] ) ) {
		$tmp['status'] 		= absint( $_POST['mmcs_status'] );
	} else {
		$tmp['status'] 		= '2';
	}

	// Checking whether the user logged in option is checked or not
	if ( isset( $_POST['mmcs_showlogged'] ) ) {
		$tmp['logged'] 		= absint( $_POST['mmcs_showlogged'] );
	} else {
		$tmp['logged'] 		= '2';
	}

	// Checking whether the search engine exclusion option is checked or not
	if ( isset( $_POST['mmcs_excludese'] ) ) {
		$tmp['exclude_se'] 	= absint( $_POST['mmcs_excludese'] );
	} else {
		$tmp['exclude_se'] 	= '2';
	}

	// Branding option for promotion
	if ( isset( $_POST['mmcs_branding'] ) ) {
		$tmp['branding'] 	= absint( $_POST['mmcs_branding'] );
	} else {
		$tmp['branding'] 	= '2';
	}

	// Saving the record to the database
	$update_options = array(
		'status'				=> $tmp['status'],
		'title' 				=> strip_tags( $_POST['mmcs_title'] ),
		'header_text' 			=> $_POST['mmcs_header'],
		'secondary_text' 		=> $_POST['mmcs_secondary'],
		'antispam_text' 		=> strip_tags( $_POST['mmcs_antispam'] ),
		'custom_login_url' 		=> strip_tags( $_POST['mmcs_custom_login'] ),
		'show_logged_in' 		=> $tmp['logged'],
		'exclude_se'			=> $tmp['exclude_se'],
		'arrange' 				=> strip_tags( $_POST['mmcs_arrange'] ),
		'analytics' 			=> $_POST['mmcs_analytics'],
		'branding' 				=> $tmp['branding']
	);

	// Update options + show message
	update_option( 'mmcs_options_basic', $update_options );

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_basic', 'mmcs_ajax_basic' );


// AJAX request for #email section
function mmcs_ajax_email() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' )
	);

	// Filter & Sanitize
	// For - MailChimp (List ID)
	if ( isset( $_POST['mmcs_list'] ) ) {
		$tmp['list'] = strip_tags( $_POST['mmcs_list'] );
	} else {
		$tmp['list'] = '';
	}

	// If the API key is removed, we should remove the transient as well (if any)
	$tmp['api'] 	= strip_tags( $_POST['mmcs_api'] );

	// remove transient
	delete_transient( 'mmcs_email_list' );

	// Saving the record to the database
	$update_options 		= array(
		'mailchimp_api'			=> $tmp['api'],
		'mailchimp_list' 		=> $tmp['list'], 
		'message_noemail' 		=> strip_tags( $_POST['mmcs_message_noemail'] ),
		'message_subscribed' 	=> strip_tags( $_POST['mmcs_message_subscribed'] ),
		'message_wrong' 		=> strip_tags( $_POST['mmcs_message_wrong'] ),
		'message_done' 			=> strip_tags( $_POST['mmcs_message_done'] )
	);

	// Update options + show message
	update_option( 'mmcs_options_email', $update_options );

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_email', 'mmcs_ajax_email' );


// AJAX request for #design section
function mmcs_ajax_design() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' )
	);

	// Filter and Sanitize
	// For content overlay
	if ( isset( $_POST['mmcs_overlay'] ) ) {
		$tmp['overlay'] = absint( $_POST['mmcs_overlay'] );
	} else {
		$tmp['overlay'] = '2';
	}

	// Saving the record to the database
	$update_options = array(
		'logo'						=> strip_tags( $_POST['mmcs_logo'] ),
		'favicon'					=> strip_tags( $_POST['mmcs_favicon'] ),
		'bg_cover' 					=> strip_tags( $_POST['mmcs_bg'] ),
		'content_overlay' 			=> $tmp['overlay'],
		'logo_height' 				=> absint( $_POST['mmcs_logo_height'] ),
		'content_overlay_style' 	=> strip_tags( $_POST['mmcs_overlay_style'] ),
		'content_overlay_opacity' 	=> strip_tags( $_POST['mmcs_overlay_opacity'] ),
		'content_margin'			=> absint( $_POST['mmcs_margin'] ),
		'content_padding'			=> absint( $_POST['mmcs_padding'] ),
		'content_width'				=> absint( $_POST['mmcs_width'] ),
		'content_border_size' 		=> absint( $_POST['mmcs_border_size'] ),
		'content_border_color' 		=> strip_tags( $_POST['mmcs_border_color'] ),
		'bg_color' 					=> strip_tags( $_POST['mmcs_color'] ),
		'content_color' 			=> strip_tags( $_POST['mmcs_content_color'] ),
		'content_position'			=> strip_tags( $_POST['mmcs_position'] ),
		'content_alignment'			=> strip_tags( $_POST['mmcs_alignment'] ),
		'header_font' 				=> strip_tags( $_POST['mmcs_header_font'] ),
		'secondary_font' 			=> strip_tags( $_POST['mmcs_secondary_font'] ),
		'header_font_size' 			=> absint( $_POST['mmcs_header_size'] ),
		'secondary_font_size' 		=> absint( $_POST['mmcs_secondary_size'] ),
		'header_font_lh' 			=> absint( $_POST['mmcs_header_lh'] ),
		'secondary_font_lh' 		=> absint( $_POST['mmcs_secondary_lh'] ),
		'header_font_style' 		=> strip_tags( $_POST['mmcs_header_style'] ),
		'secondary_font_style' 		=> strip_tags( $_POST['mmcs_secondary_style'] ),
		'header_font_color' 		=> strip_tags( $_POST['mmcs_header_color'] ),
		'secondary_font_color' 		=> strip_tags( $_POST['mmcs_secondary_color'] ),
		'antispam_font_size' 		=> absint( $_POST['mmcs_antispam_size'] ),
		'antispam_font_lh' 			=> absint( $_POST['mmcs_antispam_lh'] ),
		'antispam_font_color' 		=> strip_tags( $_POST['mmcs_antispam_color'] )
	);

	// Update options + show message
	update_option( 'mmcs_options_design', $update_options );

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_design', 'mmcs_ajax_design' );


// AJAX request for #form section
function mmcs_ajax_form() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' )
	);

	// Checking whether the ignore form styles option is checked or not
	if ( isset( $_POST['mmcs_ignore_styles'] ) ) {
		$tmp['form_styles'] = absint( $_POST['mmcs_ignore_styles'] );
	} else {
		$tmp['form_styles'] = '2';
	}

	// AJAX form submission
	if ( isset( $_POST['mmcs_ajax_submit'] ) ) {
		$tmp['ajax_submit'] = absint( $_POST['mmcs_ajax_submit'] );
	} else {
		$tmp['ajax_submit'] = '2';
	}

	// Saving the record to the database
	$update_options = array(
		'input_text' 			=> strip_tags( $_POST['mmcs_input_text'] ),
		'button_text' 			=> strip_tags( $_POST['mmcs_button_text'] ),
		'ignore_form_styles' 	=> $tmp['form_styles'],
		'ajax_submit' 			=> $tmp['ajax_submit'],
		'input_font'			=> strip_tags( $_POST['mmcs_input_font'] ),
		'button_font' 			=> strip_tags( $_POST['mmcs_button_font'] ),
		'input_font_size'		=> absint( $_POST['mmcs_input_size'] ),
		'button_font_size'		=> absint( $_POST['mmcs_button_size'] ),
		'input_font_lh' 		=> absint( $_POST['mmcs_input_lh'] ),
		'button_font_lh' 		=> absint( $_POST['mmcs_button_lh'] ),
		'input_font_color'		=> strip_tags( $_POST['mmcs_input_color'] ),
		'button_font_color'		=> strip_tags( $_POST['mmcs_button_color'] ),
		'input_bg'				=> strip_tags( $_POST['mmcs_input_bg'] ),
		'button_bg'				=> strip_tags( $_POST['mmcs_button_bg'] ),
		'input_bg_hover'		=> strip_tags( $_POST['mmcs_input_bg_hover'] ),
		'button_bg_hover'		=> strip_tags( $_POST['mmcs_button_bg_hover'] ),
		'input_border'			=> strip_tags( $_POST['mmcs_input_border'] ),
		'button_border'			=> strip_tags( $_POST['mmcs_button_border'] ),
		'input_border_hover'	=> strip_tags( $_POST['mmcs_input_border_hover'] ),
		'button_border_hover'	=> strip_tags( $_POST['mmcs_button_border_hover'] ),
		'success_background'	=> strip_tags( $_POST['mmcs_success_bg'] ),
		'success_color'			=> strip_tags( $_POST['mmcs_success_color'] ),
		'error_background'		=> strip_tags( $_POST['mmcs_error_bg'] ),
		'error_color'			=> strip_tags( $_POST['mmcs_error_color'] )
	);

	// Update options + show message
	update_option( 'mmcs_options_form', $update_options );

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_form', 'mmcs_ajax_form' );


// AJAX request for #basic section
function mmcs_ajax_social() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' ),
		'html' 		=> ''
	);

	// Social networks
	$social_networks = array(
		'500px' 				=> '500px',
		'amazon' 				=> 'Amazon',
		'android' 				=> 'Android',
		'angellist' 			=> 'AngelList',
		'apple' 				=> 'Apple',
		'behance' 				=> 'Behance',
		'bitbucket' 			=> 'BitBucket',
		'bitcoin' 				=> 'Bitcoin',
		'buysellads' 			=> 'BuySellAds',
		'delicious' 			=> 'Delicious',
		'deviantart' 			=> 'DeviantArt',
		'digg' 					=> 'Digg',
		'dribbble' 				=> 'Dribbble',
		'dropbox' 				=> 'Dropbox',
		'etsy' 					=> 'Etsy',
		'facebook' 				=> 'Facebook',
		'flickr' 				=> 'Flickr',
		'foursquare' 			=> 'FourSquare',
		'github-alt' 			=> 'GitHub',
		'google' 				=> 'Google',
		'google-plus' 			=> 'Google+',
		'imdb' 					=> 'IMDB',
		'instagram' 			=> 'Instagram',
		'lastfm' 				=> 'Last.fm',
		'linkedin' 				=> 'LinkedIn',
		'medium' 				=> 'Medium',
		'meetup' 				=> 'Meetup',
		'mixcloud' 				=> 'MixCloud',
		'paypal' 				=> 'PayPal',
		'pinterest' 			=> 'Pinterest',
		'product-hunt' 			=> 'ProductHunt',
		'quora' 				=> 'Quora',
		'reddit' 				=> 'Reddit',
		'scribd' 				=> 'Scribd',
		'skype' 				=> 'Skype',
		'slack' 				=> 'Slack',
		'slideshare' 			=> 'SlideShare',
		'snapchat' 				=> 'SnapChat',
		'soundcloud' 			=> 'SoundCloud',
		'spotify' 				=> 'Spotify',
		'stack-overflow' 		=> 'StackOverflow',
		'stumbleupon' 			=> 'StumbleUpon',
		'telegram' 				=> 'Telegram',
		'trello' 				=> 'Trello',
		'tripadvisor' 			=> 'TripAdvisor',
		'tumblr' 				=> 'Tumblr',
		'twitch' 				=> 'Twitch',
		'twitter' 				=> 'Twitter',
		'vimeo' 				=> 'Vimeo',
		'vine' 					=> 'Vine',
		'vk' 					=> 'VK',
		'wechat' 				=> 'WeChat',
		'weibo' 				=> 'Weibo',
		'whatsapp' 				=> 'WhatsApp',
		'wikipedia-w' 			=> 'Wikipedia',
		'wordpress' 			=> 'WordPress',
		'xing' 					=> 'Xing',
		'yahoo' 				=> 'Yahoo',
		'youtube-play' 			=> 'YouTube'
	);

	// Filter and Sanitize
	foreach ( $social_networks as $key => $value ) {
		$update_options[$key] = strip_tags( $_POST['mmcs_social_' . $key] );
	}

	$update_options['link_color'] 	= strip_tags( $_POST['mmcs_social_link'] );
	$update_options['link_hover'] 	= strip_tags( $_POST['mmcs_social_hover'] );
	$update_options['icon_size'] 	= absint( $_POST['mmcs_social_size'] );
	$update_options['link_target'] 	= strip_tags( $_POST['mmcs_social_target'] );

	// Arrange
	$update_options['arrange'] 	= strip_tags( $_POST['mmcs_social_arrange'] );

	// Saving the record to the database
	// Update options + show message
	update_option( 'mmcs_options_social', $update_options );

	// Send the new code for icons preview back to the application
	// Open the array
	if ( isset( $update_options['arrange'] ) && '' != $update_options['arrange'] ) {
		$social_arrange = explode( ',', $update_options['arrange'] );

		// foreach
		foreach ( $social_arrange as $single_item ) {
			if ( ! empty( $update_options[$single_item] ) ) {
				$response['html'] .= '<li><i class="fa fa-fw fa-' . $single_item . '"></i></li>';
			}
		}
	}

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_social', 'mmcs_ajax_social' );


// AJAX request for #advanced section
function mmcs_ajax_advanced() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'success',
		'response' 	=> esc_html__( 'Options have been updated successfully.', 'maintenance-mode-coming-soon' )
	);

	// Filter and Sanitize
	// Checking whether the disable plugin option is checked or not
	if ( isset( $_POST['mmcs_disable'] ) ) {
		$tmp['disabled'] = absint( $_POST['mmcs_disable'] );
	} else {
		$tmp['disabled'] = '2';
	}

	// HTML
	if ( isset( $_POST['mmcs_html'] ) && ! empty( $_POST['mmcs_html'] ) ) {
		$tmp['html'] 	= $_POST['mmcs_html'];
	} else {
		$tmp['html'] 	= '';
	}

	// CSS
	if ( isset( $_POST['mmcs_css'] ) && ! empty( $_POST['mmcs_css'] ) ) {
		$tmp['css'] 	= $_POST['mmcs_css'];
	} else {
		$tmp['css'] 	= '';
	}

	// Saving the record to the database
	$update_options = array(
		'disable_settings' 		=> $tmp['disabled'],
		'custom_html'			=> $tmp['html'], // No sanitization
		'custom_css'			=> $tmp['css']  // Giving full freedom to them :)
	);

	// Update options + show message
	update_option( 'mmcs_options_advanced', $update_options );

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_advanced', 'mmcs_ajax_advanced' );


// AJAX request for user support
function mmcs_ajax_support() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'error',
		'response' 	=> esc_html__( 'Please fill in both the fields to create your support ticket.', 'maintenance-mode-coming-soon' )
	);

	// Filtering and sanitizing the support issue
	if ( ! empty( $_POST['signals_support_email'] ) && ! empty( $_POST['signals_support_issue'] ) ) {
		$admin_email 	= sanitize_text_field( $_POST['signals_support_email'] );
		$issue 			= $_POST['signals_support_issue'];

		$subject 		= '[Maintenance Mode Ticket][version ' . SIGNALS_MMCS_VERSION . '] by ' . $admin_email;
		$body 			= "Email: $admin_email \r\nIssue: $issue";
		$headers 		= 'From: ' . $admin_email . "\r\n" . 'Reply-To: ' . $admin_email;

		// Sending the mail to the support email
		if ( true === wp_mail( 'support@69signals.com', $subject, $body, $headers ) ) {
			// Sending the success response
			$response = array(
				'code' 		=> 'success',
				'response' 	=> esc_html__( 'We have received your support ticket. We will get back to you shortly!', 'maintenance-mode-coming-soon' )
			);
		} else {
			// Sending the failure response
			$response = array(
				'code' 		=> 'error',
				'response' 	=> esc_html__( 'There was an error creating the support ticket. You can try again later or send us an email directly to support@69signals.com', 'maintenance-mode-coming-soon' )
			);
		}
	}

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_support', 'mmcs_ajax_support' );


// AJAX request for email list
function mmcs_ajax_email_list() {

	// Including the mailchimp class
	require_once SIGNALS_MMCS_PATH . 'framework/public/include/classes/class-mailchimp.php';

	// get the email option
	$email_data = get_option( 'mmcs_options_email' );

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'error',
		'response' 	=> esc_html__( 'Please provide your MailChimp API in the above field before making the request again.', 'maintenance-mode-coming-soon' ),
		'help' 		=> esc_html__( 'Provide your MailChimp API key in the above field and click on `Refresh`. Your lists will appear over here.', 'maintenance-mode-coming-soon' ),
		'html' 		=> ''
	);

	// Filter and Sanitize
	// Checking for the API key
	if ( isset( $_POST['signals_email_api'] ) ) {
		// grab the api key
		$email_api = strip_tags( $_POST['signals_email_api'] );

		if ( ! empty( $email_api ) ) {
			// Grabbing lists using the MailChimp API
			$api 	= new Signals_MailChimp( $email_api );
			$lists 	= $api->call( 'lists/list',
				array (
	        		'apikey' => $email_api
	        	)
			);

			if ( ! $lists ) {
				$response['help'] = esc_html__( 'There was an error communicating with the MailChimp server. Please make sure that the API Key used is correct and try again.', 'maintenance-mode-coming-soon' );
			} else if ( $lists['total'] == 0 ) {
				$response['help'] = esc_html__( 'It seems that there is no list created for this account. Why not create one on the MailChimp website and then try here.', 'maintenance-mode-coming-soon' );
			} else {
				// success
				$response['code'] 		= 'success';
				$response['response'] 	= esc_html__( 'Your lists have been fetched from MailChimp. Please select the list for saving your subscribers data and click on "Save Changes".', 'maintenance-mode-coming-soon' );
				$response['help'] 		= esc_html__( 'Select your MailChimp list in which you would like to store the subscribers data.', 'maintenance-mode-coming-soon' );
				$response['html'] .= '<select name="mmcs_list" id="mmcs_list">';

				foreach ( $lists['data'] as $single_list ) {
					$response['html'] .= '<option value="' . $single_list['id'] . '"' . selected( $single_list['id'], $email_data['mailchimp_list'], false ) . '>' . $single_list['name'].'</option>';
				}

				$response['html'] .= '</select>';

				// set the transient
				// Cache it for 365 days
				set_transient( 'mmcs_email_list', $response['html'] . '<p class="signals-form-help-block">' . $response['help'] . '</p>', 60 * 60 * 24 * 365 );
			}
		} else {
			$response['help'] = esc_html__( 'Provide your MailChimp API key in the above field and click on `Refresh`. Your lists will appear over here.', 'maintenance-mode-coming-soon' );
		}
	}

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_email_list', 'mmcs_ajax_email_list' );


// AJAX : Preview
function mmcs_preview() {

	// Plugin options from the database
	$options['basic'] 		= get_option( 'mmcs_options_basic' );
	$options['email'] 		= get_option( 'mmcs_options_email' );
	$options['design'] 		= get_option( 'mmcs_options_design' );
	$options['form'] 		= get_option( 'mmcs_options_form' );
	$options['social'] 		= get_option( 'mmcs_options_social' );
	$options['advanced'] 	= get_option( 'mmcs_options_advanced' );

	// Render the maintenance mode template
	mmcs_render_template( $options );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_mmcs_ajax_preview', 'mmcs_preview' );