<?php

/**
 * Basic settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="basic">
	<form method="post" class="signals-basic-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'BASIC', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Configure the core settings. Make sure you configure these options carefully as they are important for the working of the plugin.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_status" class="signals-strong"><?php esc_html_e( 'Enable Maintenance Mode?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_status" value="1"<?php checked( '1', $options['basic']['status'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Set the plugin status. Do you want to enable Maintenance Mode for your website?', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_title" class="signals-strong"><?php esc_html_e( 'Page Title', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_title" id="mmcs_title" value="<?php echo esc_attr_e( stripslashes( $options['basic']['title'] ) ); ?>" placeholder="<?php esc_attr_e( 'Please provide a Page Title', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php _e( 'Provide title for the maintenance page.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header" class="signals-strong"><?php esc_html_e( 'Header Text', 'maintenance-mode-coming-soon' ); ?></label>
						<textarea name="mmcs_header" id="mmcs_header" rows="3" placeholder="<?php esc_attr_e( 'Header text for the maintenance page', 'maintenance-mode-coming-soon' ); ?>"><?php echo esc_textarea( stripslashes( $options['basic']['header_text'] ) ); ?></textarea>

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide header text for the maintenance page. It is not recommended to leave this blank.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary" class="signals-strong"><?php _e( 'Secondary Text', 'maintenance-mode-coming-soon' ); ?></label>
						<textarea name="mmcs_secondary" id="mmcs_secondary" rows="3" placeholder="<?php esc_attr_e( 'Secondary text for the maintenance page', 'maintenance-mode-coming-soon' ); ?>"><?php echo esc_textarea( stripslashes( $options['basic']['secondary_text'] ) ); ?></textarea>

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide secondary text for the maintenance page. It is not recommended to leave this blank.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_antispam" class="signals-strong"><?php _e( 'Anti Spam Text', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_antispam" id="mmcs_antispam" value="<?php echo esc_attr_e( stripslashes( $options['basic']['antispam_text'] ) ); ?>" placeholder="<?php esc_attr_e( 'Please provide a Anti-spam Text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide anti-spam text for the maintenance page.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_custom_login" class="signals-strong"><?php esc_html_e( 'Custom login URL', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_custom_login" id="mmcs_custom_login" value="<?php echo esc_attr_e( $options['basic']['custom_login_url'] ); ?>" placeholder="<?php esc_attr_e( 'Custom login URL', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'In case you are using any plugin for custom login, provide your custom login URL over here. This plugin should be able to detect your custom login automatically in most of the situations. In case it fails to do so, you can provide the custom login URL over here.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_showlogged" class="signals-strong"><?php esc_html_e( 'Show normal website to logged in users?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_showlogged" value="1"<?php checked( '1', $options['basic']['show_logged_in'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Enable this option if you want logged in users to view the website normally while visitors see the maintenance page.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_excludese" class="signals-strong"><?php esc_html_e( 'Exclude Search Engines?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_excludese" value="1"<?php checked( '1', $options['basic']['exclude_se'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Do you want to exclude search engines from viewing maintenance page? This will enable search engines to view your regular website and not the Maintenance Mode page even if the plugin is enabled.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<label class="signals-strong"><?php esc_html_e( 'Arrange Elements', 'maintenance-mode-coming-soon' ); ?></label>
				<p class="signals-form-help-block"><?php esc_html_e( 'Select the order in which you would like to display the sections on the maintenance page. To change the order, simply drag the items and arrange as per your preference.', 'maintenance-mode-coming-soon' ); ?></p>
				<div class="signals-elements">
					<ul id="arrange-items">
						<?php

							if ( isset( $options['basic']['arrange'] ) && '' != ( $options['basic']['arrange'] ) ) {
								$signals_arrange = explode( ',', $options['basic']['arrange'] );

								// list items
								foreach ( $signals_arrange as $signals_item ) {
									if ( 'html' == $signals_item ) {
										echo '<li data-id="' . $signals_item . '">' . __( 'Custom HTML', 'maintenance-mode-coming-soon' ) . '</li>';
									} else {
										echo '<li data-id="' . $signals_item . '">' . ucfirst( $signals_item ) . '</li>';
									}
								}
							} else {

						?>

								<li data-id="logo"><?php esc_html_e( 'Logo', 'maintenance-mode-coming-soon' ); ?></li>
								<li data-id="header"><?php esc_html_e( 'Header', 'maintenance-mode-coming-soon' ); ?></li>
								<li data-id="secondary"><?php esc_html_e( 'Secondary', 'maintenance-mode-coming-soon' ); ?></li>
								<li data-id="form"><?php esc_html_e( 'Form', 'maintenance-mode-coming-soon' ); ?></li>
								<li data-id="social"><?php esc_html_e( 'Social', 'maintenance-mode-coming-soon' ); ?></li>
								<li data-id="html"><?php esc_html_e( 'Custom HTML', 'maintenance-mode-coming-soon' ); ?></li>

						<?php } // arrange ?>
					</ul>

					<input type="hidden" name="mmcs_arrange" id="mmcs_arrange" value="<?php echo esc_attr_e( $options['basic']['arrange'] ); ?>">
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_analytics" class="signals-strong"><?php esc_html_e( 'Analytics Code', 'maintenance-mode-coming-soon' ); ?></label>
						<textarea name="mmcs_analytics" id="mmcs_analytics" rows="5" placeholder="<?php esc_attr_e( 'Analytics code for the maintenance page', 'maintenance-mode-coming-soon' ); ?>"><?php echo esc_textarea( stripslashes( $options['basic']['analytics'] ) ); ?></textarea>

						<p class="signals-form-help-block"><?php esc_html_e( 'Provide analytics code for the maintenance page. It\'s good to have tracking installed :)', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_branding" class="signals-strong"><?php esc_html_e( 'Enable Branding?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_branding" value="1"<?php checked( '1', $options['basic']['branding'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Shower us some love and enable this option so that we can do a small shameless self promotion.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>
			</div><!-- .signals-section-content -->
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-basic-form -->
</div><!-- #basic -->