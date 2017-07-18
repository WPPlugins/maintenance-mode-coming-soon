<?php

/**
 * Advanced settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="advanced">
	<form method="post" class="signals-admin-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'ADVANCED', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'You can add custom HTML & CSS in this section. Making wrong changes over here will affect the working of the plugin.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-form-group">
					<label for="mmcs_disable" class="signals-strong"><?php esc_html_e( 'Use Custom HTML only', 'maintenance-mode-coming-soon' ); ?></label>
					<input type="checkbox" class="signals-form-ios" name="mmcs_disable" value="1"<?php checked( '1', $options['advanced']['disable_settings'] ); ?>>

					<p class="signals-form-help-block"><?php esc_html_e( 'If you enable this option, the plugin will ignore everything except the HTML you provide.', 'maintenance-mode-coming-soon' ); ?></p>
					<p class="signals-form-help-block"><?php esc_html_e( 'Basically, you will have a blank template which you can fill with your provided html content. Only basic css gets added by the plugin which does the task of browser styling reset. You should style your html content either inline or by inserting styling in the custom css section. In short, use this option only if you know what you are doing.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="mmcs_html" class="signals-strong"><?php esc_html_e( 'Custom HTML', 'maintenance-mode-coming-soon' ); ?></label>
					<div id="mmcs_html_editor"></div>
					<textarea name="mmcs_html" id="mmcs_html" rows="8" placeholder="<?php esc_html_e( 'Custom HTML for the plugin', 'maintenance-mode-coming-soon' ); ?>"><?php echo stripslashes( $options['advanced']['custom_html'] ); ?></textarea>

					<p class="signals-form-help-block"><?php echo esc_html__( 'Custom HTML for the plugin goes over here. Please note that ', 'maintenance-mode-coming-soon' ) . '<i style="color: #f96773">' . esc_html__( '[html], [head], [title], [meta], [body], and similar tags', 'maintenance-mode-coming-soon' ) . '</i>' . esc_html__( ' are not required. Only provide content HTML for the page.', 'maintenance-mode-coming-soon' ); ?></p>
					<p class="signals-form-help-block"><?php esc_html_e( 'To insert subscription form anywhere in the html, simply use the placeholder {{form}} and you are done. This should only be used if you have enabled the above option to use custom HTML only.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>

				<div class="signals-form-group">
					<label for="mmcs_css" class="signals-strong"><?php esc_html_e( 'Custom CSS', 'maintenance-mode-coming-soon' ); ?></label>
					<div id="mmcs_css_editor"></div>
					<textarea name="mmcs_css" id="mmcs_css" rows="8" placeholder="<?php esc_html_e( 'Custom CSS for the plugin', 'maintenance-mode-coming-soon' ); ?>"><?php echo stripslashes( $options['advanced']['custom_css'] ); ?></textarea>

					<p class="signals-form-help-block"><?php esc_html_e( 'Custom CSS for the plugin goes over here.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>
			</div>
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-admin-form -->
</div><!-- #advanced -->