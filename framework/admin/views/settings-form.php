<?php

/**
 * Form settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="form">
	<form method="post" class="signals-form-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'FORM', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Form design settings for the plugin. These settings affect the appearance of the Mail Chimp subscription form. You can customize styles for the input field and button.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_text" class="signals-strong"><?php esc_html_e( 'Input Text', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_input_text" id="mmcs_input_text" value="<?php esc_attr_e( stripslashes( $options['form']['input_text'] ) ); ?>" placeholder="<?php esc_html_e( 'Text for the Input field', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Enter the text which you would like to use as a placeholder text for the text input field.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_text" class="signals-strong"><?php esc_html_e( 'Button Text', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_button_text" id="mmcs_button_text" value="<?php esc_attr_e( stripslashes( $options['form']['button_text'] ) ); ?>" placeholder="<?php esc_html_e( 'Text for the Button', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Enter the text for the button. Usually, it will be "Subscribe" or something like that.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_ignore_styles" class="signals-strong"><?php esc_html_e( 'Ignore Default Form Styles?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_ignore_styles" value="1"<?php checked( '1', $options['form']['ignore_form_styles'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Enable this option if you would like to use your custom form styles. The settings below will only be applicable when this option is turned on.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_ajax_submit" class="signals-strong"><?php esc_html_e( 'Enable AJAX Submission?', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_ajax_submit" value="1"<?php checked( '1', $options['form']['ajax_submit'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'Check this option if you would like to enable AJAX submission for the email subscription form. We suggest that you enable this as it prevents page reload on form submission.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_font" class="signals-strong"><?php esc_html_e( 'Input Font', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_input_font" id="mmcs_input_font" class="signals-google-fonts">
							<?php

								// Listing fonts from the array
								foreach ( $mmcs_google_fonts as $mmcs_font ) {
									echo '<option value="' . $mmcs_font . '"' . selected( $mmcs_font, $options['form']['input_font'] ) . '>' . $mmcs_font . '</option>' . "\n";
								}

							?>
						</select>

						<h3><?php esc_html_e( 'This is how this font is going to look!', 'maintenance-mode-coming-soon' ); ?></h3>
						<p class="signals-form-help-block"><?php esc_html_e( 'Font for the input text. Listing a total of 818 Google web fonts.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_font" class="signals-strong"><?php esc_html_e( 'Button Font', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_button_font" id="mmcs_button_font" class="signals-google-fonts">
							<?php

								// Listing fonts from the array
								foreach ( $mmcs_google_fonts as $mmcs_font ) {
									echo '<option value="' . $mmcs_font . '"' . selected( $mmcs_font, $options['form']['button_font'] ) . '>' . $mmcs_font . '</option>' . "\n";
								}

							?>
						</select>

						<h3><?php esc_html_e( 'This is how this font is going to look!', 'maintenance-mode-coming-soon' ); ?></h3>
						<p class="signals-form-help-block"><?php esc_html_e( 'Font for the button text. Listing a total of 818 Google web fonts.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_size" class="signals-strong"><?php esc_html_e( 'Input Text Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_input_size" id="mmcs_input_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 41; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['form']['input_font_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the text input field.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_size" class="signals-strong"><?php esc_html_e( 'Button Text Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_button_size" id="mmcs_button_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 41; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['form']['button_font_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the button text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_lh" class="signals-strong"><?php esc_html_e( 'Input Text Line Height', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_input_lh" id="mmcs_input_lh">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 81; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['form']['input_font_lh'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Line height for the input field text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_lh" class="signals-strong"><?php esc_html_e( 'Button Text Line Height', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_button_lh" id="mmcs_button_lh">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 81; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['form']['button_font_lh'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Line height for the button text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_color" class="signals-strong"><?php esc_html_e( 'Input Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_input_color" id="mmcs_input_color" value="<?php esc_attr_e( stripslashes( $options['form']['input_font_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Font color for the Input text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select font color for the input text field.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_color" class="signals-strong"><?php esc_html_e( 'Button Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_button_color" id="mmcs_button_color" value="<?php esc_attr_e( stripslashes( $options['form']['button_font_color'] ) ); ?>" placeholder="<?php esc_attr_e( 'Font color for the Button text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select font color for the button text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_bg" class="signals-strong"><?php esc_html_e( 'Input Background Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_input_bg" id="mmcs_input_bg" value="<?php esc_attr_e( stripslashes( $options['form']['input_bg'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the Input field', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the input text field. Leaving it blank will set it to default i.e. "Transparent".', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_bg" class="signals-strong"><?php esc_html_e( 'Button Background Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_button_bg" id="mmcs_button_bg" value="<?php esc_attr_e( stripslashes( $options['form']['button_bg'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the Button', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the button.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_bg_hover" class="signals-strong"><?php esc_html_e( 'Input Background Color', 'maintenance-mode-coming-soon' ); ?> <span><?php esc_html_e( 'FOCUS', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_input_bg_hover" id="mmcs_input_bg_hover" value="<?php esc_attr_e( stripslashes( $options['form']['input_bg_hover'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the Input field when it gets clicked', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the input text field when it gets clicked.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_bg_hover" class="signals-strong"><?php esc_html_e( 'Button Background Color', 'maintenance-mode-coming-soon' ); ?> <span><?php esc_html_e( 'HOVER', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_button_bg_hover" id="mmcs_button_bg_hover" value="<?php esc_attr_e( stripslashes( $options['form']['button_bg_hover'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the Button on hover', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the button on mouse hover.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_border" class="signals-strong"><?php esc_html_e( 'Input Border Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_input_border" id="mmcs_input_border" value="<?php esc_attr_e( stripslashes( $options['form']['input_border'] ) ); ?>" placeholder="<?php esc_html_e( 'Border color for the Input field', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select border color for the input field.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_border" class="signals-strong"><?php esc_html_e( 'Button Border Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_button_border" id="mmcs_button_border" value="<?php esc_attr_e( stripslashes( $options['form']['button_border'] ) ); ?>" placeholder="<?php esc_html_e( 'Border color for the Button', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select border color for the button.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_input_border_hover" class="signals-strong"><?php esc_html_e( 'Input Border Color', 'maintenance-mode-coming-soon' ); ?> <span><?php esc_html_e( 'FOCUS', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_input_border_hover" id="mmcs_input_border_hover" value="<?php esc_attr_e( stripslashes( $options['form']['input_border_hover'] ) ); ?>" placeholder="<?php esc_html_e( 'Border color for the Input field when it gets clicked', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select border color for the input field when it gets clicked.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_button_border_hover" class="signals-strong"><?php esc_html_e( 'Button Border Color', 'maintenance-mode-coming-soon' ); ?> <span><?php esc_html_e( 'HOVER', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_button_border_hover" id="mmcs_button_border_hover" value="<?php esc_attr_e( stripslashes( $options['form']['button_border_hover'] ) ); ?>" placeholder="<?php esc_html_e( 'Border color for the Button on hover', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select border color for the button on mouse hover.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_success_bg" class="signals-strong"><?php esc_html_e( 'Success Message Background Color', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_success_bg" id="mmcs_success_bg" value="<?php esc_attr_e( stripslashes( $options['form']['success_background'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the success message', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the success message.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_success_color" class="signals-strong"><?php esc_html_e( 'Success Message Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_success_color" id="mmcs_success_color" value="<?php esc_attr_e( stripslashes( $options['form']['success_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Text color for the success message', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select text color for the success message.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_error_bg" class="signals-strong"><?php esc_html_e( 'Error Message Background Color', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_error_bg" id="mmcs_error_bg" value="<?php esc_attr_e( stripslashes( $options['form']['error_background'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the error message', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the error message.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_error_color" class="signals-strong"><?php esc_html_e( 'Error Message Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_error_color" id="mmcs_error_color" value="<?php esc_attr_e( stripslashes( $options['form']['error_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Text color for the error message', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select text color for the error message.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>
			</div>
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-form-form -->
</div><!-- #form -->