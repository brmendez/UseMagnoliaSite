<?php

extract( shortcode_atts( array(
			'title' => '',
			'per_page' => -1,
			'featured' => 'false',
			'order'=> 'DESC',
			'orderby'=> 'date',
		), $atts ) );
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$output = '';

	$output .= '<div class="mk-shortcode mk-woocommerce-carousel">';
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style"><span>'.$title.'</span>';
	$output .= '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" class="mk-woo-view-all">'.__( 'VIEW ALL', 'mk_framework' ).'</a></h3>';
	$output .= '<div data-selector=".woocommerce li" data-animation="slide" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-slideshowSpeed="6000" data-animationSpeed="500" data-pauseOnHover="true" data-controlNav="false" data-directionNav="true" data-isCarousel="true" data-itemWidth="276" data-itemMargin="0" data-minItems="1" data-maxItems="4" data-move="1" class="mk-flexslider mk-script-call">';
	if ( $featured == 'false' ) {
		$output .= do_shortcode( '[recent_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
	} else {
		$output .= do_shortcode( '[featured_products per_page="'.$per_page.'" orderby="'.$orderby.'" order="'.$order.'"]' );
	}



	$output .= '</div><div class="clearboth"></div></div>';

	echo $output;

}
	
