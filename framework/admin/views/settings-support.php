<?php

/**
 * Support view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="support">
	<form method="post" class="signals-support-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'SUPPORT', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Getting help is just a click away now. Report the issue you are facing with the plugin using the form below and we will get back to you at the email address provided.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-form-group">
					<label for="signals_support_email" class="signals-strong"><?php esc_html_e( 'Email Address', 'maintenance-mode-coming-soon' ); ?></label>
					<input type="text" name="signals_support_email" id="signals_support_email" value="<?php echo esc_attr_e( $admin_email ); ?>" placeholder="<?php esc_html_e( 'Please provide your email address', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php esc_html_e( 'You will receive support response at this email address.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="signals_support_issue" class="signals-strong"><?php esc_html_e( 'Issue / Feedback', 'maintenance-mode-coming-soon' ); ?></label>
					<textarea name="signals_support_issue" id="signals_support_issue" class="signals-block" rows="10" placeholder="<?php esc_html_e( 'Please explain the issue you are facing with the plugin. Provide as much detail as possible.', 'maintenance-mode-coming-soon' ); ?>"></textarea>

					<p class="signals-form-help-block"><?php esc_html_e( 'Please explain the issue you are facing with the plugin. Provide as much detail as possible.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>
			</div><!-- .signals-section-content -->
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-support-form -->
</div><!-- #support -->