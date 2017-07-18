<?php

/**
 * Renders the html template for the plugin.
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
<link rel="stylesheet" type="text/css" href="<?php echo SIGNALS_MMCS_URL; ?>/framework/public/css/public.css" />
<?php

	// Maintenance Page : Styles
	require_once SIGNALS_MMCS_PATH . '/framework/public/include/styles.php';

?>
</head>
<body class="signals-plugin">
	<div class="signals-fixed-background"></div><!-- .signals-fixed-background -->

	<div class="maintenance-mode">
		<div class="s-container">
			<div class="content">
				<?php

					// Logo
					// ------------------------------------------------------------

					if ( ! empty( $options['design']['logo'] ) ) {
						$arrange['logo'] = '<div class="logo-container">' . "\r\n";
						$arrange['logo'] .= '<img src="' . $options['design']['logo'] . '" class="logo" />' . "\r\n";
						$arrange['logo'] .= '</div>' . "\r\n";
					}

					// Header Text
					// ------------------------------------------------------------

					if ( ! empty( $options['basic']['header_text'] ) ) {
						$arrange['header'] = '<h1 class="header-text">' . stripslashes( nl2br( $options['basic']['header_text'] ) ) . '</h1>' . "\r\n";
					}

					// Secondary Text
					// ------------------------------------------------------------

					if ( ! empty( $options['basic']['secondary_text'] ) ) {
						$arrange['secondary'] = '<p class="secondary-text">' . stripslashes( nl2br( $options['basic']['secondary_text'] ) ) . '</p>' . "\r\n";
					}

					// Form
					// ------------------------------------------------------------

					if ( ! empty( $options['email']['mailchimp_api'] ) && ! empty( $options['email']['mailchimp_list'] ) ) {
						$arrange['form'] = '<div class="subscription">';

						if ( isset( $options['form']['ajax_submit'] ) && '1' != $options['form']['ajax_submit'] ) {
							if ( isset( $data ) ) {
								if ( isset( $data['code'] ) && isset( $data['response'] ) ) {
									$arrange['form'] .= '<div class="signals-alert signals-alert-' . $data['code'] . '">' . $data['response'] . '</div>' . "\r\n";
								}
							}
						}

						$arrange['form'] .= '<form method="post" class="mmcs-email-form">
							<input type="text" name="email" id="email" placeholder="' . esc_attr( stripslashes( $options['form']['input_text'] ) ) . '">
							<input type="hidden" name="action" value="process_email">
							<input type="submit" name="submit" value="' . esc_attr( stripslashes( $options['form']['button_text'] ) ) . '">
						</form>' . "\r\n";

						// Antispam Text
						if ( ! empty( $options['basic']['antispam_text'] ) ) {
							$arrange['form'] .= '<p class="anti-spam">' . stripslashes( $options['basic']['antispam_text'] ) . '</p>' . "\r\n";
						}

						$arrange['form'] .= '</div>' . "\r\n";


					}

					// Social
					// ------------------------------------------------------------
					// Keep the code string blank

					$social_code = '';

					// foreach() Loop
					if ( isset( $options['social']['arrange'] ) && '' != $options['social']['arrange'] ) {
						$social_arrange = explode( ',', $options['social']['arrange'] );

						// foreach
						foreach ( $social_arrange as $single_item ) {
							if ( ! empty( $options['social'][$single_item] ) ) {
								$social_code .= '<a href="' . strip_tags( $options['social'][$single_item] ) . '"><i class="fa fa-fw fa-' . $single_item . '"></i></a>' . "\r\n";
							}
						}
					} else {
						foreach ( $options['social'] as $key => $value ) {
							if ( 'arrange' != $key && 'link_color' != $key && 'link_hover' != $key && 'icon_size' != $key && 'link_target' != $key ) {
								if ( ! empty( $value ) ) {
									$social_code .= '<a href="' . strip_tags( $value ) . '"><i class="fa fa-fw fa-' . $key . '"></i></a>' . "\r\n";
								}
							}
						}
					}

					// Exists : $social_code
					if ( ! empty( $social_code ) ) {
						$arrange['social'] = '<div class="social-links">' . $social_code . '</div><!-- .social-links -->' . "\r\n";
					} else {
						$arrange['social'] = '';
					}

					// Custom
					// ------------------------------------------------------------

					$arrange['html'] = stripslashes( $options['advanced']['custom_html'] );

					if ( ! empty( $arrange['html'] ) ) {
						$arrange['html'] = '<div class="html">' . $arrange['html'] . '</div><!-- .html -->' . "\r\n";
					}

					// Arrange : Sections
					if ( isset( $options['basic']['arrange'] ) && '' != $options['basic']['arrange'] ) {
						$sections = explode( ',', $options['basic']['arrange'] );
					} else {
						$sections = array( 'logo', 'header', 'secondary', 'form', 'social', 'html' );
					}

					foreach ( $sections as $section ) {
						if ( isset( $arrange[$section] ) ) {
							echo $arrange[$section];
						}
					}

				?>
			</div><!-- .content -->

			<?php

				// Signals : Branding
				// ------------------------------------------------------------

				if ( '1' == $options['basic']['branding'] ) {
					echo '<div class="signals-branding">';
					echo '<p>' . esc_html__( 'Made with', 'maintenance-mode-coming-soon' ) . ' love by <span><a href="http://www.69signals.com/" target="_blank">69signals</a></span></p>';
					echo '</div><!-- .signals-branding -->' . "\r\n";
				}

			?>
		</div><!-- .s-container -->
	</div><!-- .maintenance-mode -->

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

		echo '<script type="text/javascript" src="' . SIGNALS_MMCS_URL . '/framework/public/js/public.js"></script>' . "\r\n";

	}

	// Analytics
	// ------------------------------------------------------------

	if ( isset( $options['basic']['analytics'] ) && '' != $options['basic']['analytics'] ) {
		echo stripslashes( $options['basic']['analytics'] ) . "\r\n";
	}

?>

<!-- Maintenance Mode Plugin by 69signals (http://www.69signals.com) -->
<!-- We are a Creative Digital Marketplace. We love to weave the web, simple but amazing. WordPress is our first love. -->
</body>
</html>