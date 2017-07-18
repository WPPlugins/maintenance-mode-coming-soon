<?php

/**
 * Email settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="email">
	<form method="post" class="signals-admin-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'EMAIL', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Email settings for the plugin. You can configure your MailChimp account API with this plugin to store collected emails in an list.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-form-group">
					<label for="mmcs_api" class="signals-strong"><?php esc_html_e( 'MailChimp API', 'maintenance-mode-coming-soon' ); ?></label>
					<input type="text" name="mmcs_api" id="mmcs_api" value="<?php esc_attr_e( stripslashes( $options['email']['mailchimp_api'] ) ); ?>" placeholder="<?php esc_attr_e( 'MailChimp API', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

					<p class="signals-form-help-block"><?php esc_html_e( 'Provide your MailChimp API over here.', 'maintenance-mode-coming-soon' ); ?> <a href="http://kb.mailchimp.com/accounts/management/about-api-keys" target="_blank"><?php esc_html_e( 'Click here', 'maintenance-mode-coming-soon' ); ?></a> <?php esc_html_e( 'to know how to get this information. In case you don\'t want to enable subscription option, just leave this field blank.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>

				<div class="signals-form-group signals-email-list">
					<label for="mmcs_list" class="signals-strong"><?php esc_html_e( 'MailChimp List', 'maintenance-mode-coming-soon' ); ?></label>(<a href="javascript:void;" id="grab-mailchimp"><?php esc_html_e( 'Refresh', 'maintenance-mode-coming-soon' ); ?></a>)

					<div class="signals-ajax-email-list">
						<?php

							// check for the transient
							// if it's set, then just show the html
							$signals_email_list = get_transient( 'mmcs_email_list' );

							if ( false === $signals_email_list ) {
								// Checking if the API key is present in the database
								if ( ! empty( $options['email']['mailchimp_api'] ) ) {
									// Grabbing lists using the MailChimp API
									$signals_api 	= new Signals_MailChimp( $options['email']['mailchimp_api'] );
									$signals_lists 	= $signals_api->call( 'lists/list',
										array (
					                		'apikey' => $options['email']['mailchimp_api']
					                	)
									);

									if ( ! $signals_lists ) {
										$signals_email_data = '<p class="signals-form-help-block">' . esc_html__( 'There was an error communicating with the MailChimp server. Please make sure that the API Key used is correct and try again.', 'maintenance-mode-coming-soon' ) . '</p>';
									} else if ( $signals_lists['total'] == 0 ) {
										$signals_email_data = '<p class="signals-form-help-block">' . esc_html__( 'It seems that there is no list created for this account. Why not create one on the MailChimp website and then try here.', 'maintenance-mode-coming-soon' ) . '</p>';
									} else {
										$signals_email_data = '<select name="mmcs_list" id="mmcs_list">';

										foreach ( $signals_lists['data'] as $signals_single_list ) {
											$signals_email_data .= '<option value="' . $signals_single_list['id'] . '"' . selected( $signals_single_list['id'], $options['email']['mailchimp_list'], false ) . '>' . $signals_single_list['name'].'</option>';
										}

										$signals_email_data .= '</select>';
										$signals_email_data .= '<p class="signals-form-help-block">' . esc_html__( 'Select your MailChimp list in which you would like to store the subscribers data.', 'maintenance-mode-coming-soon' ) . '</p>';
									}
								} else {
									$signals_email_data = '<p class="signals-form-help-block">' . esc_html__( 'Provide your MailChimp API key in the above field and click on <strong>`Refresh`</strong>. Your lists will appear over here.', 'maintenance-mode-coming-soon' ) . '</p>';
								}

								// echo data
								echo $signals_email_data;

								// set the transient
								// Cache it for 365 days
								set_transient( 'mmcs_email_list', $signals_email_data, 60 * 60 * 24 * 365 );
							} else {
								echo $signals_email_list;
							}

						?>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_message_noemail" class="signals-strong"><?php esc_html_e( 'Message: No Email', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_message_noemail" id="mmcs_message_noemail" value="<?php echo esc_attr_e( stripslashes( $options['email']['message_noemail'] ) ); ?>" placeholder="<?php esc_attr_e( 'Message when email is not provided', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide error message to show if the user forgets to provide email address.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_message_subscribed" class="signals-strong"><?php esc_html_e( 'Message: Already Subscribed', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_message_subscribed" id="mmcs_message_subscribed" value="<?php echo esc_attr_e( stripslashes( $options['email']['message_subscribed'] ) ); ?>" placeholder="<?php esc_attr_e( 'Message when user is already subscribed', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide message to show if the user is already subscribed to the mailing list.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_message_wrong" class="signals-strong"><?php esc_html_e( 'Message: General Error', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_message_wrong" id="mmcs_message_wrong" value="<?php echo esc_attr_e( stripslashes( $options['email']['message_wrong'] ) ); ?>" placeholder="<?php esc_attr_e( 'Message when anything goes wrong while subscribing', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide general error message to show if anything goes wrong while subscribing.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_message_done" class="signals-strong"><?php esc_html_e( 'Message: Successfully Subscribed', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_message_done" id="mmcs_message_done" value="<?php echo esc_attr_e( stripslashes( $options['email']['message_done'] ) ); ?>" placeholder="<?php esc_attr_e( 'Success message when the user gets subscribed', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide message to show when the user gets subscribed successfully.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>
			</div>
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-admin-form -->
</div><!-- #email -->