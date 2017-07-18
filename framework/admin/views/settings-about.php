<?php

/**
 * About view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="about">
	<div class="signals-tile-body">
		<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/logo.png" alt="69signals" />
		<p><?php esc_html_e( 'We are a Creative Digital Marketplace. We love to weave the web, simple but amazing. We create flawless web and mobile applications. Our perfectly crafted products will make you believe us.', 'maintenance-mode-coming-soon' ); ?></p>

		<div class="signals-section-content">
			<div class="signals-share">
				<p><?php esc_html_e( 'Show us some love. Connect with us via Social channels.', 'signals' ); ?></p>
				<a href="https://www.twitter.com/69signals" target="_blank">
					<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/twitter.png" />
				</a>

				<a href="https://www.facebook.com/69Signals" target="_blank">
					<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/facebook.png" />
				</a>
			</div><!-- .signals-share -->
		</div><!-- .signals-section-content -->
	</div><!-- .signals-tile-body -->
</div><!-- #about -->