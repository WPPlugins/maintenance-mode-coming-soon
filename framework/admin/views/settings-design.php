<?php

/**
 * Design settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="design">
	<form method="post" class="signals-design-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'DESIGN', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Design settings for the plugin. You have the option to modify every aspect of the maintenance page design as per your requirements.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-upload-group signals-clearfix">
					<div class="signals-form-group border-fix">
						<div class="signals-upload-element">
							<label class="signals-strong"><?php esc_html_e( 'Logo', 'maintenance-mode-coming-soon' ); ?></label>

							<?php if ( ! empty( $options['design']['logo'] ) ) : // If the image url is present, show the image. Else, show the default upload text ?>
								<span class="signals-preview-area"><img src="<?php echo esc_attr( $options['design']['logo'] ); ?>" /></span>
							<?php else : ?>
								<span class="signals-preview-area"><?php esc_html_e( 'Select or upload via WP native uploader', 'maintenance-mode-coming-soon' ); ?></span>
							<?php endif; ?>

							<input type="hidden" name="mmcs_logo" id="mmcs_logo" value="<?php esc_attr_e( $options['design']['logo'] ); ?>">
							<button type="button" name="signals_logo_upload" id="signals_logo_upload" class="signals-btn signals-upload" style="margin-top: 4px"><?php esc_html_e( 'Select', 'maintenance-mode-coming-soon' ); ?></button>

							<span class="signals-upload-append">
								<?php if ( ! empty( $options['design']['logo'] ) ) : ?>
									&nbsp;<a href="javascript: void(0);" class="signals-remove-image"><?php esc_html_e( 'Remove', 'maintenance-mode-coming-soon' ); ?></a>
								<?php endif; ?>
							</span>
						</div>
					</div>

					<div class="signals-form-group border-fix">
						<div class="signals-upload-element">
							<label class="signals-strong"><?php esc_html_e( 'Favicon', 'maintenance-mode-coming-soon' ); ?></label>

							<?php if ( ! empty( $options['design']['favicon'] ) ) : // If the image url is present, show the image. Else, show the default upload text ?>
								<span class="signals-preview-area"><img src="<?php echo esc_attr( $options['design']['favicon'] ); ?>" /></span>
							<?php else : ?>
								<span class="signals-preview-area"><?php esc_html_e( 'Select or upload via WP native uploader', 'maintenance-mode-coming-soon' ); ?></span>
							<?php endif; ?>

							<input type="hidden" name="mmcs_favicon" id="mmcs_favicon" value="<?php esc_attr_e( $options['design']['favicon'] ); ?>">
							<button type="button" name="signals_favicon_upload" id="signals_favicon_upload" class="signals-btn signals-upload" style="margin-top: 4px"><?php esc_html_e( 'Select', 'maintenance-mode-coming-soon' ); ?></button>

							<span class="signals-upload-append">
								<?php if ( ! empty( $options['design']['favicon'] ) ) : ?>
									&nbsp;<a href="javascript: void(0);" class="signals-remove-image"><?php esc_html_e( 'Remove', 'maintenance-mode-coming-soon' ); ?></a>
								<?php endif; ?>
							</span>
						</div>
					</div>

					<div class="signals-form-group border-fix">
						<div class="signals-upload-element">
							<label class="signals-strong"><?php esc_html_e( 'Background Cover Image', 'maintenance-mode-coming-soon' ); ?></label>

							<?php if ( ! empty( $options['design']['bg_cover'] ) ) : // If the image url is present, show the image. Else, show the default upload text ?>
								<span class="signals-preview-area"><img src="<?php echo esc_attr( $options['design']['bg_cover'] ); ?>" /></span>
							<?php else : ?>
								<span class="signals-preview-area"><?php esc_html_e( 'Select or upload via WP native uploader', 'maintenance-mode-coming-soon' ); ?></span>
							<?php endif; ?>

							<input type="hidden" name="mmcs_bg" id="mmcs_bg" value="<?php esc_attr_e( $options['design']['bg_cover'] ); ?>">
							<button type="button" name="signals_bg_upload" id="signals_bg_upload" class="signals-btn signals-upload" style="margin-top: 4px"><?php esc_html_e( 'Select', 'maintenance-mode-coming-soon' ); ?></button>

							<span class="signals-upload-append">
								<?php if ( ! empty( $options['design']['bg_cover'] ) ) : ?>
									&nbsp;<a href="javascript: void(0);" class="signals-remove-image"><?php esc_html_e( 'Remove', 'maintenance-mode-coming-soon' ); ?></a>
								<?php endif; ?>
							</span>
						</div>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_overlay" class="signals-strong"><?php esc_html_e( 'Content Overlay', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="checkbox" class="signals-form-ios" name="mmcs_overlay" value="1"<?php checked( '1', $options['design']['content_overlay'] ); ?>>

						<p class="signals-form-help-block"><?php esc_html_e( 'If enabled, applies transparent background to the content section of the maintenance page.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_logo_height" class="signals-strong"><?php esc_html_e( 'Logo Max Height', 'maintenance-mode-coming-soon' ); ?> <span>px</span></label>
						<input type="text" name="mmcs_logo_height" id="mmcs_logo_height" value="<?php esc_attr_e( $options['design']['logo_height'] ); ?>" placeholder="<?php esc_html_e( 'Maximum height for the logo', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Set maximum height for the logo. The width get adjusted automatically as per the height set over here.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_color" class="signals-strong"><?php esc_html_e( 'Background Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_color" id="mmcs_color" value="<?php esc_attr_e( stripslashes( $options['design']['bg_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the page', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the page. If the background cover image is set, this option will be ignored.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_content_color" class="signals-strong"><?php esc_html_e( 'Content Background Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_content_color" id="mmcs_content_color" value="<?php esc_attr_e( stripslashes( $options['design']['content_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Background color for the content section', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select background color for the content section. If the content overlay option is turned on, this option will be ignored.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_overlay_style" class="signals-strong"><?php esc_html_e( 'Content Overlay Style', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_overlay_style" id="mmcs_overlay_style">
							<option value="bb"<?php selected( 'bb', $options['design']['content_overlay_style'] ); ?>><?php esc_html_e( 'Black', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="ww"<?php selected( 'ww', $options['design']['content_overlay_style'] ); ?>><?php esc_html_e( 'White', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Select between white or black for the overlay style and then set it\'s opacity in the next option.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_overlay_opacity" class="signals-strong"><?php esc_html_e( 'Content Overlay Opacity', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_overlay_opacity" id="mmcs_overlay_opacity">
							<option value="5"<?php selected( '5', $options['design']['content_overlay_opacity'] ); ?>>5%</option>
							<option value="10"<?php selected( '10', $options['design']['content_overlay_opacity'] ); ?>>10%</option>
							<option value="15"<?php selected( '15', $options['design']['content_overlay_opacity'] ); ?>>15%</option>
							<option value="20"<?php selected( '20', $options['design']['content_overlay_opacity'] ); ?>>20%</option>
							<option value="25"<?php selected( '25', $options['design']['content_overlay_opacity'] ); ?>>25%</option>
							<option value="30"<?php selected( '30', $options['design']['content_overlay_opacity'] ); ?>>30%</option>
							<option value="35"<?php selected( '35', $options['design']['content_overlay_opacity'] ); ?>>35%</option>
							<option value="40"<?php selected( '40', $options['design']['content_overlay_opacity'] ); ?>>40%</option>
							<option value="45"<?php selected( '45', $options['design']['content_overlay_opacity'] ); ?>>45%</option>
							<option value="50"<?php selected( '50', $options['design']['content_overlay_opacity'] ); ?>>50%</option>
							<option value="55"<?php selected( '55', $options['design']['content_overlay_opacity'] ); ?>>55%</option>
							<option value="60"<?php selected( '60', $options['design']['content_overlay_opacity'] ); ?>>60%</option>
							<option value="65"<?php selected( '65', $options['design']['content_overlay_opacity'] ); ?>>65%</option>
							<option value="70"<?php selected( '70', $options['design']['content_overlay_opacity'] ); ?>>70%</option>
							<option value="75"<?php selected( '75', $options['design']['content_overlay_opacity'] ); ?>>75%</option>
							<option value="80"<?php selected( '80', $options['design']['content_overlay_opacity'] ); ?>>80%</option>
							<option value="85"<?php selected( '85', $options['design']['content_overlay_opacity'] ); ?>>85%</option>
							<option value="90"<?php selected( '90', $options['design']['content_overlay_opacity'] ); ?>>90%</option>
							<option value="95"<?php selected( '95', $options['design']['content_overlay_opacity'] ); ?>>95%</option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Select the opacity percentage for the content overlay. 5 means almost transparent and 95 means almost opaque.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_margin" class="signals-strong"><?php esc_html_e( 'Content Margin', 'maintenance-mode-coming-soon' ); ?> <span>px</span></label>
						<input type="text" name="mmcs_margin" id="mmcs_margin" value="<?php esc_attr_e( $options['design']['content_margin'] ); ?>" placeholder="<?php esc_html_e( 'Margin for the content section', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Set margin for the content section. We suggest you set it to a lower value as it will remain same for all screen sizes.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_padding" class="signals-strong"><?php esc_html_e( 'Content Padding', 'maintenance-mode-coming-soon' ); ?> <span>px</span></label>
						<input type="text" name="mmcs_padding" id="mmcs_padding" value="<?php esc_attr_e( $options['design']['content_padding'] ); ?>" placeholder="<?php esc_html_e( 'Padding for the content section', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Set padding for the content section. We suggest you set it to a lower value as it will remain same for all screen sizes. Any value between 15px to 45px seems good.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_width" class="signals-strong"><?php esc_html_e( 'Content Width', 'maintenance-mode-coming-soon' ); ?> <span>px</span></label>
						<input type="text" name="mmcs_width" id="mmcs_width" value="<?php esc_attr_e( $options['design']['content_width'] ); ?>" placeholder="<?php esc_html_e( 'Set content width for the page', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control">

						<p class="signals-form-help-block"><?php esc_html_e( 'Set maximum width of the content (in pixels) for the maintenance page. Provide only numeric value. Example: Entering 400 will set the width of the content to 400px. Defaults to 440px.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_border_size" class="signals-strong"><?php esc_html_e( 'Content Border Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_border_size" id="mmcs_border_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 0; $i < 16; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['content_border_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Border size for the content section. We suggest keeping it to value lower than 5px.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_position" class="signals-strong"><?php esc_html_e( 'Content Position', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_position" id="mmcs_position">
							<option value="left"<?php selected( 'left', $options['design']['content_position'] ); ?>><?php esc_html_e( 'Left', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="center"<?php selected( 'center', $options['design']['content_position'] ); ?>><?php esc_html_e( 'Center', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="right"<?php selected( 'right', $options['design']['content_position'] ); ?>><?php esc_html_e( 'Right', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'For the position of the content on the maintenance page. Does not work if the width is set to maximum which is 1170px.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_alignment" class="signals-strong"><?php esc_html_e( 'Content Alignment', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_alignment" id="mmcs_alignment">
							<option value="left"<?php selected( 'left', $options['design']['content_alignment'] ); ?>><?php esc_html_e( 'Left', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="center"<?php selected( 'center', $options['design']['content_alignment'] ); ?>><?php esc_html_e( 'Center', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="right"<?php selected( 'right', $options['design']['content_alignment'] ); ?>><?php esc_html_e( 'Right', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'For the alignment of the text on the maintenance page. Make it left, center, or right.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header_font" class="signals-strong"><?php esc_html_e( 'Header Font', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_header_font" id="mmcs_header_font" class="signals-google-fonts">
							<?php

								// Listing fonts from the array
								foreach ( $mmcs_google_fonts as $mmcs_font ) {
									echo '<option value="' . $mmcs_font . '"' . selected( $mmcs_font, $options['design']['header_font'] ) . '>' . $mmcs_font . '</option>' . "\n";
								}

							?>
						</select>

						<h3><?php esc_html_e( 'This is how this font is going to look!', 'maintenance-mode-coming-soon' ); ?></h3>
						<p class="signals-form-help-block"><?php esc_html_e( 'Font for the header text. Listing a total of 818 Google web fonts.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary_font" class="signals-strong"><?php esc_html_e( 'Secondary Font', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_secondary_font" id="mmcs_secondary_font" class="signals-google-fonts">
							<?php

								// Listing fonts from the array
								foreach ( $mmcs_google_fonts as $mmcs_font ) {
									echo '<option value="' . $mmcs_font . '"' . selected( $mmcs_font, $options['design']['secondary_font'] ) . '>' . $mmcs_font . '</option>' . "\n";
								}

							?>
						</select>

						<h3><?php esc_html_e( 'This is how this font is going to look!', 'maintenance-mode-coming-soon' ); ?></h3>
						<p class="signals-form-help-block"><?php esc_html_e( 'Font for the secondary text. Listing a total of 818 Google web fonts.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header_size" class="signals-strong"><?php esc_html_e( 'Header Text Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_header_size" id="mmcs_header_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 41; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['header_font_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the header text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary_size" class="signals-strong"><?php esc_html_e( 'Secondary Text Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_secondary_size" id="mmcs_secondary_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 41; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['secondary_font_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the secondary text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header_lh" class="signals-strong"><?php esc_html_e( 'Header Text Line Height', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_header_lh" id="mmcs_header_lh">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 81; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['header_font_lh'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Line height for the header text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary_lh" class="signals-strong"><?php esc_html_e( 'Secondary Text Line Height', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_secondary_lh" id="mmcs_secondary_lh">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 81; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['secondary_font_lh'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Line height for the secondary text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header_style" class="signals-strong"><?php esc_html_e( 'Header Text Style', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_header_style" id="mmcs_header_style">
							<option value="normal"<?php selected( 'normal', $options['design']['header_font_style'] ); ?>><?php esc_html_e( 'Normal', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="bold"<?php selected( 'bold', $options['design']['header_font_style'] ); ?>><?php esc_html_e( 'Bold', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="italic"<?php selected( 'italic', $options['design']['header_font_style'] ); ?>><?php esc_html_e( 'Italic', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="underline"<?php selected( 'underline', $options['design']['header_font_style'] ); ?>><?php esc_html_e( 'Underline', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Select the styling you would like to apply to the header text. In most cases, you would like to change it to "Bold"', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary_style" class="signals-strong"><?php esc_html_e( 'Secondary Text Style', 'maintenance-mode-coming-soon' ); ?></label>
						<select name="mmcs_secondary_style" id="mmcs_secondary_style">
							<option value="normal"<?php selected( 'normal', $options['design']['secondary_font_style'] ); ?>><?php esc_html_e( 'Normal', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="bold"<?php selected( 'bold', $options['design']['secondary_font_style'] ); ?>><?php esc_html_e( 'Bold', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="italic"<?php selected( 'italic', $options['design']['secondary_font_style'] ); ?>><?php esc_html_e( 'Italic', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="underline"<?php selected( 'underline', $options['design']['secondary_font_style'] ); ?>><?php esc_html_e( 'Underline', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Select the styling you would like to apply to the secondary text. In most cases, you would like to leave it to "Normal"', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_antispam_size" class="signals-strong"><?php esc_html_e( 'Antispam Text Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_antispam_size" id="mmcs_antispam_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 10; $i < 21; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['antispam_font_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the antispam text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_antispam_lh" class="signals-strong"><?php esc_html_e( 'Antispam Text Line Height', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_antispam_lh" id="mmcs_antispam_lh">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 81; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['design']['antispam_font_lh'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Line height for the antispam text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_header_color" class="signals-strong"><?php esc_html_e( 'Header Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_header_color" id="mmcs_header_color" value="<?php esc_attr_e( stripslashes( $options['design']['header_font_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Font color for the Header text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select font color for the header text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_secondary_color" class="signals-strong"><?php esc_html_e( 'Secondary Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_secondary_color" id="mmcs_secondary_color" value="<?php esc_attr_e( stripslashes( $options['design']['secondary_font_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Font color for the Secondary text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select font color for the secondary text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_border_color" class="signals-strong"><?php esc_html_e( 'Content Border Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_border_color" id="mmcs_border_color" value="<?php esc_attr_e( stripslashes( $options['design']['content_border_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Border color for the Content section', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select border color for the content section.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_antispam_color" class="signals-strong"><?php esc_html_e( 'Antispam Text Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_antispam_color" id="mmcs_antispam_color" value="<?php esc_attr_e( stripslashes( $options['design']['antispam_font_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Font color for the Antispam text', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select font color for the antispam text.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>
			</div><!-- .signals-section-content -->
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-design-form -->
</div><!-- #design -->