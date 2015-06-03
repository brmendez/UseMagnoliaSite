<?php
extract( shortcode_atts( array(
			'el_class' => '',
			'id' => '',
			'size' => 'medium',
			'icon' => '',
			'bg_color' => '',
			'outline_skin' => '',
            'outline_active_color' => '#fff',
            'outline_hover_color' => '#333',
			'dimension' => 'three',
			'text_color' => 'light',
			"url" => '',
			"target" => '',
			'margin_bottom' => 15,
			'margin_top' => '',
			'animation' => '',
            'visibility' => '',
            'fullwidth' => '',
			"align" => '',
		), $atts ) );

$animation_css = $button = $style = '';

$style_id = mt_rand( 99, 999 );

$style .= '<style type="text/css">
    .button-'.$style_id.' {
                margin-bottom: '.$margin_bottom.'px;
                margin-top: '.$margin_top.'px;

        }
';

if ( $dimension == 'outline' ) {
        if($outline_skin != 'custom') {                
                $outline_skin = !empty( $outline_skin ) ? ('outline-btn-'.$outline_skin) : 'outline-btn-dark';              
        } else {

            $style .= '
                 .button-'.$style_id.' {
                    border-color: '.$outline_active_color.' !important;
                    color: '.$outline_active_color.';
                }

                 .button-'.$style_id.':hover {
                    background-color:'.$outline_active_color.';
                    color: '.$outline_hover_color.';  
                }';
        }

        


} else if($dimension == 'three' || $dimension == 'two' || $dimension == 'flat') {
	$style .= '
        .button-'.$style_id.' {
                background-color:' . $bg_color . ';

        }
        ';
    $text_color = !empty( $text_color ) ? ($text_color.'-color ') : 'light-color ';  
} 

 if($dimension == 'three' || $dimension == 'two') {
    $style .= '
         .button-'.$style_id.':hover {
                background-color:' . hexDarker( $bg_color, 7 ). ';

        }
        .button-'.$style_id.'.three-dimension  {
             box-shadow: 0px 3px 0px 0px '.hexDarker( $bg_color, 20 ).';
        }
        .button-'.$style_id.'.three-dimension:active  {
             box-shadow: 0px 1px 0px 0px '.hexDarker( $bg_color, 20 ).';
        } 
    ';
}

$style .= '</style>';


if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}
$icon = !empty( $icon ) ? ( '<i class="mk-'.$icon.'"></i>' ) : '';
$id = !empty( $id ) ? ( 'id="'.$id.'"' ) : '';
$target = !empty( $target ) ? ( 'target="'.$target.'"' ) : '';
$fullwidth =  ($fullwidth == 'true') ? 'fullwidth-button ' : '';

$button = '<a href="'.$url.'" '.$target.' '.$id.' class="mk-button '.$outline_skin.' button-'.$style_id.' '.$animation_css.$text_color.' mk-shortcode '.$dimension.'-dimension '.$size.' '.$visibility.' '.$fullwidth.$el_class.'">'.$icon.do_shortcode( strip_tags( $content ) ).'</a>';
$output = ( !empty( $align ) ? '<div class="mk-button-align '.$fullwidth.$align.'">' : '' ) . $button . ( !empty( $align ) ? '</div>' : '' );
echo $output . "\n\n" . $style;
