<?php

/**
 * Social settings view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 *
 * Load social networks in an array
 * -------------------------------------------
 */

$social_networks = array(
	'500px' 				=> '500px',
	'amazon' 				=> 'Amazon',
	'android' 				=> 'Android',
	'angellist' 			=> 'AngelList',
	'apple' 				=> 'Apple',
	'behance' 				=> 'Behance',
	'bitbucket' 			=> 'BitBucket',
	'bitcoin' 				=> 'Bitcoin',
	'buysellads' 			=> 'BuySellAds',
	'delicious' 			=> 'Delicious',
	'deviantart' 			=> 'DeviantArt',
	'digg' 					=> 'Digg',
	'dribbble' 				=> 'Dribbble',
	'dropbox' 				=> 'Dropbox',
	'etsy' 					=> 'Etsy',
	'facebook' 				=> 'Facebook',
	'flickr' 				=> 'Flickr',
	'foursquare' 			=> 'FourSquare',
	'github-alt' 			=> 'GitHub',
	'google' 				=> 'Google',
	'google-plus' 			=> 'Google+',
	'imdb' 					=> 'IMDB',
	'instagram' 			=> 'Instagram',
	'lastfm' 				=> 'Last.fm',
	'linkedin' 				=> 'LinkedIn',
	'medium' 				=> 'Medium',
	'meetup' 				=> 'Meetup',
	'mixcloud' 				=> 'MixCloud',
	'paypal' 				=> 'PayPal',
	'pinterest' 			=> 'Pinterest',
	'product-hunt' 			=> 'ProductHunt',
	'quora' 				=> 'Quora',
	'reddit' 				=> 'Reddit',
	'scribd' 				=> 'Scribd',
	'skype' 				=> 'Skype',
	'slack' 				=> 'Slack',
	'slideshare' 			=> 'SlideShare',
	'snapchat' 				=> 'SnapChat',
	'soundcloud' 			=> 'SoundCloud',
	'spotify' 				=> 'Spotify',
	'stack-overflow' 		=> 'StackOverflow',
	'stumbleupon' 			=> 'StumbleUpon',
	'telegram' 				=> 'Telegram',
	'trello' 				=> 'Trello',
	'tripadvisor' 			=> 'TripAdvisor',
	'tumblr' 				=> 'Tumblr',
	'twitch' 				=> 'Twitch',
	'twitter' 				=> 'Twitter',
	'vimeo' 				=> 'Vimeo',
	'vine' 					=> 'Vine',
	'vk' 					=> 'VK',
	'wechat' 				=> 'WeChat',
	'weibo' 				=> 'Weibo',
	'whatsapp' 				=> 'WhatsApp',
	'wikipedia-w' 			=> 'Wikipedia',
	'wordpress' 			=> 'WordPress',
	'xing' 					=> 'Xing',
	'yahoo' 				=> 'Yahoo',
	'youtube-play' 			=> 'YouTube'
);

?>

<div class="signals-tile" id="social">
	<form method="post" class="signals-social-form">
		<div class="signals-tile-body">
			<div class="signals-tile-title"><?php esc_html_e( 'SOCIAL', 'maintenance-mode-coming-soon' ); ?></div>
			<p><?php esc_html_e( 'Social media settings for the plugin. Manage your social profiles in this section and configure them as per your preference.', 'maintenance-mode-coming-soon' ); ?></p>

			<div class="signals-section-content">
				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_social_link" class="signals-strong"><?php esc_html_e( 'Link Color', 'maintenance-mode-coming-soon' ); ?></label>
						<input type="text" name="mmcs_social_link" id="mmcs_social_link" value="<?php esc_attr_e( stripslashes( $options['social']['link_color'] ) ); ?>" placeholder="<?php esc_html_e( 'Link color for the Social Icons', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select link color for the social icons.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_social_hover" class="signals-strong"><?php esc_html_e( 'Link Color', 'maintenance-mode-coming-soon' ); ?> <span><?php esc_html_e( 'HOVER', 'maintenance-mode-coming-soon' ); ?></span></label>
						<input type="text" name="mmcs_social_hover" id="mmcs_social_hover" value="<?php esc_attr_e( stripslashes( $options['social']['link_hover'] ) ); ?>" placeholder="<?php esc_attr_e( 'Link hover color for the Social Icons', 'maintenance-mode-coming-soon' ); ?>" class="signals-form-control color {required:false}">

						<p class="signals-form-help-block"><?php esc_html_e( 'Select link hover color for the social icons.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-double-group signals-clearfix">
					<div class="signals-form-group">
						<label for="mmcs_social_size" class="signals-strong"><?php esc_html_e( 'Icon Size', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_social_size" id="mmcs_social_size">
							<?php

								// Loading font sizes with the help of a loop
								for ( $i = 11; $i < 41; $i++ ) {
									echo '<option value="' . $i . '"' . selected( $options['social']['icon_size'], $i ) . '>' . $i . esc_html__( 'px', 'maintenance-mode-coming-soon' ) . '</option>';
								}

							?>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Font size for the social icons.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>

					<div class="signals-form-group">
						<label for="mmcs_social_target" class="signals-strong"><?php esc_html_e( 'Link Target', 'maintenance-mode-coming-soon' ); ?></label>

						<select name="mmcs_social_target" id="mmcs_social_target">
							<option value="_self"<?php selected( '_self', $options['social']['link_target'] ); ?>><?php esc_html_e( 'Same Window', 'maintenance-mode-coming-soon' ); ?></option>
							<option value="_blank"<?php selected( '_blank', $options['social']['link_target'] ); ?>><?php esc_html_e( 'New Window', 'maintenance-mode-coming-soon' ); ?></option>
						</select>

						<p class="signals-form-help-block"><?php esc_html_e( 'Link target for the social icons. Select the one as per your preference.', 'maintenance-mode-coming-soon' ); ?></p>
					</div>
				</div>

				<div class="signals-form-group">
					<ul class="signals-arrange-social">
						<?php

							// Open the array
							if ( isset( $options['social']['arrange'] ) && '' != $options['social']['arrange'] ) {
								$social_arrange = explode( ',', $options['social']['arrange'] );

								// foreach
								foreach ( $social_arrange as $single_item ) {
									if ( ! empty( $options['social'][$single_item] ) ) {
										echo '<li><a href="' . $options['social'][$single_item] . '"><i class="fa fa-fw fa-' . $single_item . '"></i></a></li>';
									}
								}
							}

						?>
					</ul>

					<p><?php esc_html_e( 'Preview for the social profiles can be seen over here. Links will appear exactly the same way on the maintenance page as they appear over here.', 'maintenance-mode-coming-soon' ); ?></p>
				</div>

				<ul id="arrange-social-items">
					<?php

						if ( isset( $options['social']['arrange'] ) && '' != $options['social']['arrange'] ) {
							$social_arrange = explode( ',', $options['social']['arrange'] );

							// foreach
							foreach ( $social_arrange as $single_item ) {
								echo '<li data-id="' . $single_item . '" class="signals-double-group signals-social signals-clearfix">';
								echo '<div class="signals-form-group">';
								echo '<p><i class="fa fa-fw fa-' . $single_item . '"></i> ' . $social_networks[$single_item] . '</p>';
								echo '</div>';
								echo '<div class="signals-form-group">';
								echo '<input type="text" name="mmcs_social_' . $single_item . '" id="mmcs_social_' . $single_item . '" value="' . esc_attr__( stripslashes( $options['social'][$single_item] ) ) . '" placeholder="' . esc_attr__( $social_networks[$single_item], 'maintenance-mode-coming-soon' ) . '" class="signals-form-control">';
								echo '</div>';
								echo '</li>';
							}
						} else {
							// foreach
							foreach ( $social_networks as $key => $value ) {
								echo '<li data-id="' . $key . '" class="signals-double-group signals-social signals-clearfix">';
								echo '<div class="signals-form-group">';
								echo '<p><i class="fa fa-fw fa-' . $key . '"></i> ' . $value . '</p>';
								echo '</div>';
								echo '<div class="signals-form-group">';
								echo '<input type="text" name="mmcs_social_' . $key . '" id="mmcs_social_' . $key . '" value="' . esc_attr__( stripslashes( $options['social'][$key] ) ) . '" placeholder="' . esc_attr__( $value, 'maintenance-mode-coming-soon' ) . '" class="signals-form-control">';
								echo '</div>';
								echo '</li>';
							}
						}

					?>
				</ul><!-- #arrange-social-items -->

				<input type="hidden" name="mmcs_social_arrange" id="mmcs_social_arrange" value="<?php echo esc_attr_e( $options['social']['arrange'] ); ?>">
			</div><!-- .signals-section-content -->
		</div><!-- .signals-tile-body -->
	</form><!-- .signals-design-form -->
</div><!-- #design -->