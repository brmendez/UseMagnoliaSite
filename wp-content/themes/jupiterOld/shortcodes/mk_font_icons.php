<?php
global $mk_options;
extract( shortcode_atts( array(
			'size' => 'medium',
			'icon' => '',
			'padding_horizental' => 4,
			'padding_vertical' => 4,
			'color' => $mk_options['skin_color'],
			'circle' => 'false',
			'circle_color' => '',
			'align' => '',
			'animation' => '',
			'link' => '',
			'target' => '_self',
			'el_class' => '',
		), $atts ) );

$color = !empty( $color ) ? ( 'color:' . $color .';' ) : '';

$circle_class =  $circle_style = $animation_css = '';
if ( $circle == 'true' ) {
	$circle_class = 'circle-enabled';
	$circle_style = 'background-color:'.$circle_color.';';
}
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

$output = '<span class="mk-font-icons mk-shortcode icon-align-'.$align.' '.$animation_css.$el_class.'">';
if ( $link ) {
	$output .= '<a target="'.$target.'" href="'.$link.'">';
}
$output .= '<i style="'.$color.'margin:'.$padding_vertical.'px;'.$padding_horizental.'px;'.$circle_style.'" class="mk-'.$icon.' '.$circle_class.' mk-size-'.$size.'"></i>';

if ( $link ) {
	$output .= '</a>';
}
$output .= '</span>';

echo $output;
