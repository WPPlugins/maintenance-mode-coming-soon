<?php

/**
 * Required styles for the plugin.
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Maintenance_Mode
 *
 * Put all the fonts in an array and remove the duplicates.
 */

$fonts_array 	= array(
	$options['design']['header_font'],
	$options['design']['secondary_font'],
	$options['form']['input_font'],
	$options['form']['button_font']
);

// Remove Duplicates
$signals_fonts 	= array_unique( $fonts_array );

echo '<style>' . "\r\n";

// Loop
foreach ( $signals_fonts as $single_font ) {
	echo '@import url("https://fonts.googleapis.com/css?family=' . urlencode( $single_font ) . ':400,700");' . "\r\n";
}

/**
 * Body
 * ------------------------------
 */

echo 'body{';
if ( ! empty( $options['design']['secondary_font'] ) ) {
	echo 'font-family:"' . $options['design']['secondary_font'] . '", Arial, sans-serif;';
}
echo '}' . "\r\n";


/**
 * Background : Color
 * ------------------------------
 */

if ( empty( $options['design']['bg_cover'] ) && ! empty( $options['design']['bg_color'] ) ) {
	echo '.signals-fixed-background{background-color:#' . $options['design']['bg_color'] . ';}' . "\r\n";
}


/**
 * Background : Cover
 * ------------------------------
 */

if ( ! empty( $options['design']['bg_cover'] ) ) {
	echo '.signals-fixed-background{background-image:url("' . $options['design']['bg_cover'] . '");}' . "\r\n";
}


/**
 * Maintenance Mode
 * ------------------------------
 */

if ( ! empty( $options['design']['content_margin'] ) ) {
	echo '.maintenance-mode{margin:' . $options['design']['content_margin'] . 'px auto;}' . "\r\n";
}


/**
 * Logo
 * ------------------------------
 */

if ( ! empty( $options['design']['logo_height'] ) ) {
	echo '.logo{max-height:' . $options['design']['logo_height'] . 'px;}';
}

if ( ! empty( $options['design']['content_alignment'] ) ) {
	echo '.logo-container{';

	if ( 'right' == $options['design']['content_alignment'] ) {
		echo 'text-align:right;';
	} elseif ( 'center' == $options['design']['content_alignment'] ) {
		echo 'margin:25px auto;';
	} else {
		echo 'text-align:left;';
	}

	echo '}' . "\r\n";
}


/**
 * Header Text
 * ------------------------------
 */

if ( ! empty( $options['design']['header_font'] ) || ! empty( $options['design']['header_font_size'] ) || ! empty( $options['design']['header_font_lh'] ) || ! empty( $options['design']['header_font_style'] ) || ! empty( $options['design']['header_font_color'] ) ) {
	echo '.header-text{';

	// Font Family
	if ( ! empty( $options['design']['header_font'] ) ) {
		echo 'font-family:"' . $options['design']['header_font'] . '", Arial, sans-serif;';
	}

	// Font Size
	if ( ! empty( $options['design']['header_font_size'] ) ) {
		echo 'font-size:' . $options['design']['header_font_size'] . 'px;';
	}

	// Line Height
	if ( ! empty( $options['design']['header_font_lh'] ) ) {
		echo 'line-height:' . $options['design']['header_font_lh'] . 'px;';
	}

	// Font Style
	if ( ! empty( $options['design']['header_font_style'] ) ) {
		if ( 'bold' == $options['design']['header_font_style'] ) {
			echo 'font-weight:700;';
		} elseif ( 'italic' == $options['design']['header_font_style'] ) {
			echo 'font-style:italic;'; 
		} elseif ( 'underline' == $options['design']['header_font_style'] ) {
			echo 'text-decoration:underline;';
		} else {
			echo 'font-weight:400;font-style:normal;text-decoration:none;';
		}
	}

	// Font Color
	if ( ! empty( $options['design']['header_font_color'] ) ) {
		echo 'color:#' . $options['design']['header_font_color'] . ';';
	}

	echo '}' . "\r\n";
}


/**
 * Secondary Text
 * ------------------------------
 */

if ( ! empty( $options['design']['secondary_font'] ) || ! empty( $options['design']['secondary_font_size'] ) || ! empty( $options['design']['secondary_font_lh'] ) || ! empty( $options['design']['secondary_font_style'] ) || ! empty( $options['design']['secondary_font_color'] ) ) {
	echo '.secondary-text{';

	// Font Family
	if ( ! empty( $options['design']['secondary_font'] ) ) {
		echo 'font-family:"' . $options['design']['secondary_font'] . '", Arial, sans-serif;';
	}

	// Font Size
	if ( ! empty( $options['design']['secondary_font_size'] ) ) {
		echo 'font-size:' . $options['design']['secondary_font_size'] . 'px;';
	}

	// Line Height
	if ( ! empty( $options['design']['secondary_font_lh'] ) ) {
		echo 'line-height:' . $options['design']['secondary_font_lh'] . 'px;';
	}

	// Font Style
	if ( ! empty( $options['design']['secondary_font_style'] ) ) {
		if ( 'bold' == $options['design']['secondary_font_style'] ) {
			echo 'font-weight:700;';
		} elseif ( 'italic' == $options['design']['secondary_font_style'] ) {
			echo 'font-style:italic;';
		} elseif ( 'underline' == $options['design']['secondary_font_style'] ) {
			echo 'text-decoration:underline;';
		} else {
			echo 'font-weight:400;font-style:normal;text-decoration:none;';
		}
	}

	// Font Color
	if ( ! empty( $options['design']['secondary_font_color'] ) ) {
		echo 'color:#' . $options['design']['secondary_font_color'] . ';';
	}

	echo '}' . "\r\n";
}


/**
 * Anti-spam
 * ------------------------------
 * We apply secondary font family to antispam as well
 */

if ( ! empty( $options['design']['secondary_font'] ) || ! empty( $options['design']['antispam_font_size'] ) || ! empty( $options['design']['antispam_font_color'] ) ) {
	echo '.anti-spam{';

	// Font Family
	if ( ! empty( $options['design']['secondary_font'] ) ) {
		echo 'font-family:"' . $options['design']['secondary_font'] . '", Arial, sans-serif;';
	}

	// Font Size
	if ( ! empty( $options['design']['antispam_font_size'] ) ) {
		echo 'font-size:' . $options['design']['antispam_font_size'] . 'px;';
	}

	// Font Color
	if ( ! empty( $options['design']['antispam_font_color'] ) ) {
		echo 'color:#' . $options['design']['antispam_font_color'] . ';';
	}

	echo '}' . "\r\n";
}


/**
 * Section : Content
 * ------------------------------
 */

if ( ! empty( $options['design']['content_overlay'] ) || ! empty( $options['design']['content_color'] ) || ! empty( $options['design']['content_width'] ) || ( ! empty( $options['design']['content_border_size'] ) && ! empty( $options['design']['content_border_color'] ) ) || ! empty( $options['design']['content_padding'] ) || ! empty( $options['design']['content_position'] ) || ! empty( $options['design']['content_alignment'] ) ) {
	echo '.content{';

	// Overlay
	if ( '1' == $options['design']['content_overlay'] ) {
		if ( ! empty( $options['design']['content_overlay_opacity'] ) ) {
			echo 'background-image:url("' . SIGNALS_MMCS_URL . '/framework/public/img/overlays/' . $options['design']['content_overlay_style'] . '-' . $options['design']['content_overlay_opacity'] . '.png");';
		} else {
			echo 'background-image:url("' . SIGNALS_MMCS_URL . '/framework/public/img/overlays/' . $options['design']['content_overlay_style'] . '-25.png");';
		}
	} else {
		if ( ! empty( $options['design']['content_color'] ) ) {
			echo 'background-color:#' . $options['design']['content_color'] . ';';
		}
	}

	// Padding
	if ( ! empty( $options['design']['content_padding'] ) ) {
		echo 'padding:' . $options['design']['content_padding'] . 'px;';
	}

	// Width
	if ( ! empty( $options['design']['content_width'] ) ) {
		// Making sure the width is not < 100 and not > 1170
		if ( $options['design']['content_width'] < 100 || $options['design']['content_width'] > 1170 ) {
			$options['design']['content_width'] = '1170';
		}

		echo 'max-width:' . $options['design']['content_width'] . 'px;';
	}

	// Position
	if ( ! empty( $options['design']['content_position'] ) ) {
		if ( 'center' == $options['design']['content_position'] ) {
			echo 'margin-left:auto;margin-right:auto;';
		} elseif ( 'right' == $options['design']['content_position'] ) {
			echo 'float:right;';
		} else {
			echo 'margin-left:0;margin-right:0;';
		}
	}

	// Alignment
	if ( ! empty( $options['design']['content_alignment'] ) ) {
		if ( 'right' == $options['design']['content_alignment'] ) {
			echo 'text-align:right;';
		} elseif ( 'center' == $options['design']['content_alignment'] ) {
			echo 'text-align:center;';
		} else {
			echo 'text-align:left;';
		}
	}

	// Border
	if ( ! empty( $options['design']['content_border_size'] ) && ! empty( $options['design']['content_border_color'] ) ) {
		echo 'border:' . $options['design']['content_border_size'] . 'px solid #' . $options['design']['content_border_color'] . ';';
	}

	echo '}' . "\r\n";

	// Alignment : Input
	if ( ! empty( $options['design']['content_alignment'] ) ) {
		echo '.content input{';
			if ( 'right' == $options['design']['content_alignment'] ) {
				echo 'text-align:right;';
			} elseif ( 'center' == $options['design']['content_alignment'] ) {
				echo 'text-align:center;';
			} else {
				echo 'text-align:left;';
			}
		echo '}' . "\r\n";
	}

}


/**
 * Section : Form
 * ------------------------------
 */

if ( '1' == $options['form']['ignore_form_styles'] ) {
	if ( ! empty( $options['form']['input_font'] ) || ! empty( $options['form']['input_font_size'] ) || ! empty( $options['form']['input_font_lh'] ) || ! empty( $options['form']['input_font_color'] ) || ! empty( $options['form']['input_bg'] ) || ! empty( $options['form']['input_border'] ) ) {
		echo '.content input[type="text"]{';

		// Font Family
		if ( ! empty( $options['form']['input_font'] ) ) {
			echo 'font-family:"' . $options['form']['input_font'] . '", Arial, sans-serif;';
		}

		// Font Size
		if ( ! empty( $options['form']['input_font_size'] ) ) {
			echo 'font-size:' . $options['form']['input_font_size'] . 'px;';
		}

		// Line Height
		if ( ! empty( $options['form']['input_font_lh'] ) ) {
			echo 'line-height:' . $options['form']['input_font_lh'] . 'px;';
		}

		// Font Color
		if ( ! empty( $options['form']['input_font_color'] ) ) {
			echo 'color:#' . $options['form']['input_font_color'] . ';';
		}

		// Background
		if ( ! empty( $options['form']['input_bg'] ) ) {
			echo 'background:#' . $options['form']['input_bg'] . ';';
		}

		// Border
		if ( ! empty( $options['form']['input_border'] ) ) {
			echo 'border:1px solid #' . $options['form']['input_border'] . ';';
		}

		echo '}' . "\r\n";
	}

	if ( ! empty( $options['form']['input_bg_hover'] ) || ! empty( $options['form']['input_border_hover'] ) ) {
		echo '.content input[type="text"]:focus{';

		// Background : Focus
		if ( ! empty( $options['form']['input_bg_hover'] ) ) {
			echo 'background:#' . $options['form']['input_bg_hover'] . ';';
		}

		// Border : Focus
		if ( ! empty( $options['form']['input_border_hover'] ) ) {
			echo 'border:1px solid #' . $options['form']['input_border_hover'] . ';';
		}

		echo '}' . "\r\n";
	}


	/**
	 * Buttons
	 * ------------------------------
	 */

	if ( ! empty( $options['form']['button_font'] ) || ! empty( $options['form']['button_font_size'] ) || ! empty( $options['form']['button_font_lh'] ) || ! empty( $options['form']['button_font_color'] ) || ! empty( $options['form']['button_bg'] ) || ! empty( $options['form']['button_border'] ) ) {
		echo '.content input[type="submit"]{';

		// Font Family
		if ( ! empty( $options['form']['button_font'] ) ) {
			echo 'font-family:"' . $options['form']['button_font'] . '", Arial, sans-serif;';
		}

		// Font Size
		if ( ! empty( $options['form']['button_font_size'] ) ) {
			echo 'font-size:' . $options['form']['button_font_size'] . 'px;';
		}

		// Line Height
		if ( ! empty( $options['form']['button_font_lh'] ) ) {
			echo 'line-height:' . $options['form']['button_font_lh'] . 'px;';
		}

		// Font Color
		if ( ! empty( $options['form']['button_font_color'] ) ) {
			echo 'color:#' . $options['form']['button_font_color'] . ';';
		}

		// Background
		if ( ! empty( $options['form']['button_bg'] ) ) {
			echo 'background:#' . $options['form']['button_bg'] . ';';
		}

		// Border
		if ( ! empty( $options['form']['button_border'] ) ) {
			echo 'border:1px solid #' . $options['form']['button_border'] . ';';
		}

		echo '}' . "\r\n";
	}

	if ( ! empty( $options['form']['button_bg_hover'] ) || ! empty( $options['form']['button_border_hover'] ) ) {
		echo '.content input[type="submit"]:hover,';
		echo '.content input[type="submit"]:focus{';

		// Background : Focus
		if ( ! empty( $options['form']['button_bg_hover'] ) ) {
			echo 'background:#' . $options['form']['button_bg_hover'] . ';';
		}

		// Border : Focus
		if ( ! empty( $options['form']['button_border_hover'] ) ) {
			echo 'border:1px solid #' . $options['form']['button_border_hover'] . ';';
		}

		echo '}' . "\r\n";
	}


	/**
	 * Messages
	 * ------------------------------
	 */

	if ( ! empty( $options['form']['success_background'] ) || ! empty( $options['form']['success_color'] ) ) {
		echo '.signals-alert-success,.toast-success{';

		// Success : Background
		if ( ! empty( $options['form']['success_background'] ) ) {
			echo 'background:#' . $options['form']['success_background'] . ';';
		}

		// Success : Font Color
		if ( ! empty( $options['form']['success_color'] ) ) {
			echo 'color:#' . $options['form']['success_color'] . ';';
		}

		echo '}' . "\r\n";
	}

	if ( ! empty( $options['form']['error_background'] ) || ! empty( $options['form']['error_color'] ) ) {
		echo '.signals-alert-error,.toast-error{';

		// Error : Background
		if ( ! empty( $options['form']['error_background'] ) ) {
			echo 'background:#' . $options['form']['error_background'] . ';';
		}

		// Error : Font Color
		if ( ! empty( $options['form']['error_color'] ) ) {
			echo 'color:#' . $options['form']['error_color'] . ';';
		}

		echo '}' . "\r\n";
	}
}


/**
 * Section : Social
 * ------------------------------
 */

if ( ! empty( $options['social']['link_color'] ) || ! empty( $options['social']['link_hover'] ) || ! empty( $options['social']['icon_size'] ) ) {
	echo '.social-links a{';

	// Font Color
	if ( ! empty( $options['social']['link_color'] ) ) {
		echo 'color:#' . $options['social']['link_color'] . ';';
	}

	// Font Size
	if ( ! empty( $options['social']['icon_size'] ) ) {
		echo 'font-size:' . $options['social']['icon_size'] . 'px;';
	}

	echo '}';

	// Link : Hover
	if ( ! empty( $options['social']['link_hover'] ) ) {
		echo '.social-links a:hover{color:#' . $options['social']['link_hover'] . ';}';
	}

}


/**
 * Section : Custom (css)
 * ------------------------------
 */

if ( ! empty( $options['advanced']['custom_css'] ) ) {
	echo stripslashes( $options['advanced']['custom_css'] );
}

echo '</style>' . "\r\n";