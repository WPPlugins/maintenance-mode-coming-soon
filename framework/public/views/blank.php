<?php

/**
 * Renders the blank template for the plugin.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

$mmcs_js = array(
	'title' 	=> $options['basic']['title']
);

if ( isset( $_POST['action'] ) && 'process_email' == $_POST['action'] ) {
	/**
	 * AJAX request for processing emails
	 * We are going to store the response in the $data() array
	 * ------------------------------------------------------------
	 */

	$data = array(
		'code' 		=> 'error',
		'response' 	=> 'Unable to understand the request.'
	);

	// Check : Form Submission
	if ( isset( $_POST['email'] ) ) {
		// Processing
		$email = strip_tags( $_POST['email'] );

		if ( '' === $email ) {
			$data['code'] 		= 'error';
			$data['response'] 	= stripslashes( $options['email']['message_noemail'] );
		} else {
			$email = filter_var( strtolower( trim( $email ) ), FILTER_SANITIZE_EMAIL );

			if ( strpos( $email, '@' ) ) {
				require_once SIGNALS_MMCS_PATH . 'framework/public/include/classes/class-mailchimp.php';

				$connect 	= new Signals_MailChimp( $options['email']['mailchimp_api'] );
				$response 	= $connect->call( 'lists/subscribe', array(
					'id'            => $options['email']['mailchimp_list'],
					'email'         => array( 'email' => $email ),
					'send_welcome'  => true
				) );

				// Response : @MailChimp
				if ( isset( $response['code'] ) && 214 !== $response['code'] ) {
					$data['code'] 		= 'error';
					$data['response'] 	= stripslashes( $options['email']['message_wrong'] );
				} elseif ( isset( $response['code'] ) && 214 === $response['code'] ) {
					$data['code'] 		= 'success';
					$data['response'] 	= stripslashes( $options['email']['message_subscribed'] );
				} else {
					$data['code'] 		= 'success';
					$data['response'] 	= stripslashes( $options['email']['message_done'] );
				}
			} else {
				$data['code'] 			= 'error';
				$data['response'] 		= stripslashes( $options['email']['message_noemail'] );
			}
		}
	}


	/**
	 * Submission : AJAX
	 * ------------------------------------------------------------
	 */

	if ( isset( $options['form']['ajax_submit'] ) && '1' == $options['form']['ajax_submit'] ) {
		// Sending proper headers and sending the response back in the JSON format.
		header( "Content-Type: application/json" );
		echo json_encode( $data );

		// REQUIRED : Exiting the AJAX function
		exit();
	}
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo stripslashes( $options['basic']['title'] ); ?></title>
<?php if ( isset( $options['design']['favicon'] ) && ! empty( $options['design']['favicon'] ) ) : ?>
<link rel="shortcut icon" href="<?php echo esc_url_raw( $options['design']['favicon'] ); ?>" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo SIGNALS_MMCS_URL; ?>/framework/public/css/basic.css" />
<?php

	echo '<style>';

	/**
	 * Section : Form
	 * ------------------------------
	 */

	if ( '1' == $options['form']['ignore_form_styles'] ) {
		if ( ! empty( $options['form']['input_font'] ) || ! empty( $options['form']['input_font_size'] ) || ! empty( $options['form']['input_font_lh'] ) || ! empty( $options['form']['input_font_color'] ) || ! empty( $options['form']['input_bg'] ) || ! empty( $options['form']['input_border'] ) ) {
			echo '.content input[type="text"]{';

			// Font Family
			if ( ! empty( $options['form']['input_font'] ) ) {
				echo 'font-family:"' . $options['form']['input_font'] . '", Arial, sans-serif;';
			}

			// Font Size
			if ( ! empty( $options['form']['input_font_size'] ) ) {
				echo 'font-size:' . $options['form']['input_font_size'] . 'px;';
			}

			// Line Height
			if ( ! empty( $options['form']['input_font_lh'] ) ) {
				echo 'line-height:' . $options['form']['input_font_lh'] . 'px;';
			}

			// Font Color
			if ( ! empty( $options['form']['input_font_color'] ) ) {
				echo 'color:#' . $options['form']['input_font_color'] . ';';
			}

			// Background
			if ( ! empty( $options['form']['input_bg'] ) ) {
				echo 'background:#' . $options['form']['input_bg'] . ';';
			}

			// Border
			if ( ! empty( $options['form']['input_border'] ) ) {
				echo 'border:1px solid #' . $options['form']['input_border'] . ';';
			}

			echo '}' . "\r\n";
		}

		if ( ! empty( $options['form']['input_bg_hover'] ) || ! empty( $options['form']['input_border_hover'] ) ) {
			echo '.content input[type="text"]:focus{';

			// Background : Focus
			if ( ! empty( $options['form']['input_bg_hover'] ) ) {
				echo 'background:#' . $options['form']['input_bg_hover'] . ';';
			}

			// Border : Focus
			if ( ! empty( $options['form']['input_border_hover'] ) ) {
				echo 'border:1px solid #' . $options['form']['input_border_hover'] . ';';
			}

			echo '}' . "\r\n";
		}


		/**
		 * Buttons
		 * ------------------------------
		 */

		if ( ! empty( $options['form']['button_font'] ) || ! empty( $options['form']['button_font_size'] ) || ! empty( $options['form']['button_font_lh'] ) || ! empty( $options['form']['button_font_color'] ) || ! empty( $options['form']['button_bg'] ) || ! empty( $options['form']['button_border'] ) ) {
			echo '.content input[type="submit"]{';

			// Font Family
			if ( ! empty( $options['form']['button_font'] ) ) {
				echo 'font-family:"' . $options['form']['button_font'] . '", Arial, sans-serif;';
			}

			// Font Size
			if ( ! empty( $options['form']['button_font_size'] ) ) {
				echo 'font-size:' . $options['form']['button_font_size'] . 'px;';
			}

			// Line Height
			if ( ! empty( $options['form']['button_font_lh'] ) ) {
				echo 'line-height:' . $options['form']['button_font_lh'] . 'px;';
			}

			// Font Color
			if ( ! empty( $options['form']['button_font_color'] ) ) {
				echo 'color:#' . $options['form']['button_font_color'] . ';';
			}

			// Background
			if ( ! empty( $options['form']['button_bg'] ) ) {
				echo 'background:#' . $options['form']['button_bg'] . ';';
			}

			// Border
			if ( ! empty( $options['form']['button_border'] ) ) {
				echo 'border:1px solid #' . $options['form']['button_border'] . ';';
			}

			echo '}' . "\r\n";
		}

		if ( ! empty( $options['form']['button_bg_hover'] ) || ! empty( $options['form']['button_border_hover'] ) ) {
			echo '.content input[type="submit"]:hover,';
			echo '.content input[type="submit"]:focus{';

			// Background : Focus
			if ( ! empty( $options['form']['button_bg_hover'] ) ) {
				echo 'background:#' . $options['form']['button_bg_hover'] . ';';
			}

			// Border : Focus
			if ( ! empty( $options['form']['button_border_hover'] ) ) {
				echo 'border:1px solid #' . $options['form']['button_border_hover'] . ';';
			}

			echo '}' . "\r\n";
		}


		/**
		 * Messages
		 * ------------------------------
		 */

		if ( ! empty( $options['form']['success_background'] ) || ! empty( $options['form']['success_color'] ) ) {
			echo '.signals-alert-success,.toast-success{';

			// Success : Background
			if ( ! empty( $options['form']['success_background'] ) ) {
				echo 'background:#' . $options['form']['success_background'] . ';';
			}

			// Success : Font Color
			if ( ! empty( $options['form']['success_color'] ) ) {
				echo 'color:#' . $options['form']['success_color'] . ';';
			}

			echo '}' . "\r\n";
		}

		if ( ! empty( $options['form']['error_background'] ) || ! empty( $options['form']['error_color'] ) ) {
			echo '.signals-alert-error,.toast-error{';

			// Error : Background
			if ( ! empty( $options['form']['error_background'] ) ) {
				echo 'background:#' . $options['form']['error_background'] . ';';
			}

			// Error : Font Color
			if ( ! empty( $options['form']['error_color'] ) ) {
				echo 'color:#' . $options['form']['error_color'] . ';';
			}

			echo '}' . "\r\n";
		}
	}

	/**
	 * Section : Custom (css)
	 * ------------------------------------------------------------
	 */

	if ( ! empty( $options['advanced']['custom_css'] ) ) {
		echo stripslashes( $options['advanced']['custom_css'] );
	}

	echo '</style>' . "\r\n";

?>
</head>
<body>
<?php

	// Custom
	// ------------------------------------------------------------

	$custom_html = stripslashes( $options['advanced']['custom_html'] );

	// Form
	// ------------------------------------------------------------

	if ( ! empty( $custom_html ) && false !== strpos( $custom_html, '{{form}}' ) ) {
		if ( ! empty( $options['email']['mailchimp_api'] ) && ! empty( $options['email']['mailchimp_list'] ) ) {
			$subscription_form = '<div class="subscription">';

			if ( isset( $data['code'] ) && isset( $data['response'] ) ) {
				$subscription_form .= '<div class="signals-alert signals-alert-' . $data['code'] . '">' . $data['response'] . '</div>' . "\r\n";
			}

			$subscription_form .= '<form method="post" class="mmcs-email-form">
				<input type="text" name="email" placeholder="' . esc_attr( stripslashes( $options['form']['input_text'] ) ) . '">
				<input type="hidden" name="action" value="process_email">
				<input type="submit" name="submit" value="' . esc_attr( stripslashes( $options['form']['button_text'] ) ) . '">
			</form>' . "\r\n";
			$subscription_form .= '</div>' . "\r\n";

			// Replace : Placeholder
			$custom_html = str_replace( '{{form}}', $subscription_form, $custom_html );
		}
	}

	// OUTPUT : Code
	echo $custom_html;


	// Signals : Branding
	// ------------------------------------------------------------

	if ( '1' == $options['basic']['branding'] ) {
		echo '<div class="signals-branding">';
		echo '<p>' . esc_html__( 'Made with', 'maintenance-mode-coming-soon' ) . ' love by <span><a href="http://www.69signals.com/" target="_blank">69signals</a></span></p>';
		echo '</div><!-- .signals-branding -->' . "\r\n";
	}

?>

<script type="text/javascript">
/* <![CDATA[ */
var config = <?php echo json_encode( $mmcs_js ) . "\r\n"; ?>
/* ]]> */
</script>

<?php

	if ( isset( $options['form']['ajax_submit'] ) && '1' == $options['form']['ajax_submit'] ) {

		// Jquery
		// ------------------------------------------------------------

		echo '<script type="text/javascript" src="' . includes_url() . 'js/jquery/jquery.js"></script>' . "\r\n";


		// Submission : AJAX
		// ------------------------------------------------------------

		echo '<script type="text/javascript" src="' . SIGNALS_MMCS_URL . '/framework/public/js/public.js"></script>';

	}

?>

<!-- Maintenance Mode Plugin by 69signals (http://www.69signals.com) -->
<!-- We are a Creative Digital Marketplace. We love to weave the web, simple but amazing. WordPress is our first love. -->
</body>
</html>