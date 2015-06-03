<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'divider_width' => 'full',
			'style' => 'double_dot',
			'border_color' => '',
			'margin_top' => '20',
			'margin_bottom' => '20',

		), $atts ) );
$output = '';

if($style == 'thick_solid' || $style == 'thin_solid' || $style == 'single_dotted') {
	$border_color = ($border_color != '') ? (' style="border-top-color:'.$border_color.'" ') : '';
}

$output .= '<div style="padding: '.$margin_top.'px 0 '.$margin_bottom.'px;" class="mk-divider mk-shortcode divider_'.$divider_width.' '.$style.' '.$el_class.'">';
if ( $style == 'shadow_line' ) {
	$output .= '<div class="divider-inner"><span class="divider-shadow-left"></span><span class="divider-shadow-right"></span></div>';
} elseif ( $style == 'go_top' || $style == 'go_top_thick' ) {
	$output .= '<div class="divider-inner"><a href="#" class="divider-go-top">'.__( 'Back to top', 'mk_framework' ).'<i class="mk-icon-arrow-up"></i></a></div>';
} else {
	$output .= '<div class="divider-inner"'.$border_color.'></div>';
}
$output .= '</div><div class="clearboth"></div>';

echo $output;


