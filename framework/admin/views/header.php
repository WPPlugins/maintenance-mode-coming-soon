<?php

/**
 * Provide a admin header view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 */

?>

<div class="signals-cnt-fix">
	<div class="signals-fix-wp38">
		<div class="signals-header signals-clearfix">
			<div class="signals-header-left">
				<img src="<?php echo SIGNALS_MMCS_URL; ?>/framework/admin/img/lrg-icon.png" class="signals-logo">
				<p>
					<strong><?php esc_html_e( 'Maintenance Mode', 'maintenance-mode-coming-soon' ); ?></strong>
					<span><?php esc_html_e( 'by', 'maintenance-mode-coming-soon' ); ?> <a href="http://www.69signals.com/" target="_blank"><?php esc_html_e( '69signals', 'maintenance-mode-coming-soon' ); ?></a></span>
				</p>
			</div><!-- .signals-header-left -->

			<div class="signals-header-right">
				<input type="submit" id="mmcs_submit" name="mmcs_submit" class="signals-btn" value="<?php esc_html_e( 'Save Changes', 'maintenance-mode-coming-soon' ); ?>" data-tab="basic">
			</div><!-- .signals-header-right -->

			<?php if ( isset( $signals_header_addon ) ) { echo $signals_header_addon; } ?>
		</div><!-- .signals-header -->