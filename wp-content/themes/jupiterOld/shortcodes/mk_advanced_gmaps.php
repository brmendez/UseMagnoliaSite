<?php


extract( shortcode_atts( array(
			'height' => '400',
			'parallax' => 'true',
			'latitude' => '',
			'longitude' => '',
			'address' => '',

			'latitude_2' => '',
			'longitude_2' => '',
			'address_2' => '',

			'latitude_3' => '',
			'longitude_3' => '',
			'address_3' => '',

			'zoom' => '14',
			'pan_control' => 'true',
			'draggable' => 'true',
			'zoom_control' => 'true',
			'map_type_control' => 'true',
			'scale_control' => 'true',
			'pin_icon' => '',
			'modify_coloring' => 'false',
			'hue' => '#ccc',
			'saturation' => '',
			'lightness' => '',
			'el_class' => '',
			
		), $atts ) );
$output = '';

if ( $longitude == '' && $latitude == '') { return null; }

if ( $zoom < 1 ) {
	$zoom = 1;
}

$id = mt_rand(99,9999);

wp_enqueue_script( 'skrollr');

if($parallax == 'true') {
	$parallax_class = 'mk-gmaps-parallax';
	$parallax_height = $height+200;
} else {
	$parallax_class = '';
	$parallax_height = $height;
}

$output .= '<div class="'.$parallax_class.'" style="height:'.$height.'px"><div id="google-map-'.$id.'" class="mk-advanced-gmaps" data-top-center="margin-top:-200px" data-bottom-center="margin-top:0px" style="height:'.$parallax_height.'px;width:100%;" data-zoom="'.$zoom.'" data-pin-icon="'.$pin_icon.'" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-address="'.$address.'" data-latitude2="'.$latitude_2.'" data-longitude2="'.$longitude_2.'" data-address2="'.$address_2.'" data-latitude3="'.$latitude_3.'" data-longitude3="'.$longitude_3.'" data-address3="'.$address_3.'" data-pan-control="'.$pan_control.'" data-zoom-control="'.$zoom_control.'" data-map-type-control="'.$map_type_control.'" data-scale-control="'.$scale_control.'" data-draggable="'.$draggable.'" data-modify-coloring="'.$modify_coloring.'" data-saturation="'.$saturation.'" data-lightness="'.$lightness.'" data-hue="'.$hue.'"></div></div>';

$output .= '<script type="text/javascript" src="http'.((is_ssl())? 's' : '').'://maps.google.com/maps/api/js?sensor=false"></script>';


echo $output;
