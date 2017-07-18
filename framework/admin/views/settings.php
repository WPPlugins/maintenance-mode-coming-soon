<?php

/**
 * Settings panel view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

require_once 'header.php';

?>

	<div class="signals-body signals-clearfix">
		<div class="signals-float-left">
			<div class="signals-mobile-menu">
				<a href="javascript:void;">
					<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/toggle.png" />
				</a>
			</div><!-- .signals-mobile-menu -->

			<ul class="signals-main-menu">
				<li><a href="#basic"><?php esc_html_e( 'Basic', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#email"><?php esc_html_e( 'Email', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#design"><?php esc_html_e( 'Design', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#form"><?php esc_html_e( 'Form', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#social"><?php esc_html_e( 'Social', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#advanced"><?php esc_html_e( 'Advanced', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#preview"><?php esc_html_e( 'Preview', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#support"><?php esc_html_e( 'Support', 'maintenance-mode-coming-soon' ); ?></a></li>
				<li><a href="#about"><?php esc_html_e( 'About', 'maintenance-mode-coming-soon' ); ?></a></li>
			</ul>
		</div><!-- .signals-float-left -->

		<div class="signals-float-right">
			<?php

				// Checking for the offers transient
				$offers_transient = get_transient( 'mmcs_offer' );

				// If the value is saved in the database, then don't ping the server
				if ( $offers_transient ) {
					echo $offers_transient;
				} else {
					// Getting our latest products and offer from the website
					$signals_offers = wp_remote_get( 'http://www.69signals.com/offers.php?product=mmcs' );

					// Checking for the errors
					// If everything is OK, then display the information
					if ( ! is_wp_error( $signals_offers ) ) {
						echo $signals_offers['body'];

						// Setting the transient over here so that it does not ping the server again for a day atleast
						set_transient( 'mmcs_offer', $signals_offers['body'], 60 * 60 * 24 );
					} // $signals_offers
				} // $offers_transient

				// Including tabs content
				require_once 'settings-basic.php';		// basic
				require_once 'settings-email.php';		// email
				require_once 'settings-design.php';		// design
				require_once 'settings-form.php';		// form
				require_once 'settings-social.php';		// social
				require_once 'settings-advanced.php';	// advanced
				require_once 'settings-preview.php';	// preview
				require_once 'settings-support.php';	// support
				require_once 'settings-about.php';		// about

			?>
		</div><!-- .signals-float-right -->
	</div><!-- .signals-body -->

<?php

require_once 'footer.php';