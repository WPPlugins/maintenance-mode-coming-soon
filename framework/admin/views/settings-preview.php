<?php

/**
 * Preview view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-tile" id="preview">
	<div class="signals-tile-body">
		<div class="signals-tile-title"><?php esc_html_e( 'PREVIEW', 'maintenance-mode-coming-soon' ); ?></div>
		<p><?php esc_html_e( 'You can preview the maintenance page to see how it will look once the maintenance mode is turned on. Clicking the button below will show you the preview mode.', 'maintenance-mode-coming-soon' ); ?></p>

		<div class="signals-section-content">
			<a href="javascript:;" class="signals-btn s-mmcs-preview"><strong><?php esc_html_e( 'Preview Maintenance Page', 'maintenance-mode-coming-soon' ); ?></strong></a><br/><br/>

			<p class="signals-form-help-block"><?php echo '<strong>' . esc_html__( 'NOTE:', 'maintenance-mode-coming-soon' ) . '</strong> ' . esc_html__( 'Form submission does not work in the preview mode.', 'maintenance-mode-coming-soon' ); ?></p>
		</div><!-- .signals-section-content -->
	</div><!-- .signals-tile-body -->
</div><!-- #preview -->

<div class="s-popup">
	<div class="s-popup-wrapper">
		<div class="s-popup-content">
			<iframe class="s-preview-html" srcdoc="<div style='font-family: Arial, sans-serif; font-size: 13px; font-weight: 700; color: #101010; text-align: center; margin-top: 20px;'><span style='background: #fffbbd; padding: 8px 12px;'>Processing..</span></div>"></iframe><!-- .s-preview-html -->

			<div class="s-close">
				<a href="javascript:;">
					<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/close.png" alt="x" />
				</a>
			</div><!-- .s-close -->
		</div><!-- .s-popup-content -->
	</div><!-- .s-popup-wrapper -->
</div><!-- .s-popup -->