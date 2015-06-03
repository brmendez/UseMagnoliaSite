<?php
$output = '';
extract( shortcode_atts( array(
			'title' => '',
			'count'=> 10,
			'style' => 'carousel',
			'column' => 4,
			'bg_color' => '',
			'border_color' => '',
			'orderby'=> 'date',
			'target' => '_self',
			'clients' => '',
			'height' => '',
			'order'=> 'DESC',
			'autoplay' => 'true',
			'cover' => 'false',
			'el_class' => '',
		), $atts ) );

$query = array(
	'post_type' => 'clients',
	'showposts' => $count,
);

if ( $clients ) {
	$query['post__in'] = explode( ',', $clients );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );

$bg_color = !empty( $bg_color ) ? ( ' background-color:'.$bg_color.'; ' ) : '';
$border_color_item = !empty( $border_color ) ? ( ' border-color:'.$border_color.'; ' ) : 'border-color:transparent;';
$height = !empty( $height ) ? ( ' height:'.$height.'px; ' ) : ( ' height:110px; ' );

if($style == 'carousel') {

$directionNav = "false";
if ( !empty( $title ) ) { 
    $directionNav = "true";
}

$slideshowSpeed = ($autoplay == 'false') ? 100000 : 4000;

$output .= '<div data-animation="slide" data-easing="swing" data-direction="horizontal" data-smoothHeight="false" data-slideshowSpeed="'.$slideshowSpeed.'" data-animationSpeed="500" data-pauseOnHover="true" data-controlNav="false" data-directionNav="'.$directionNav.'" data-isCarousel="true" data-itemWidth="184" data-itemMargin="0" data-minItems="1" data-maxItems="6" data-move="1" class="mk-clients-shortcode mk-script-call bg-cover-'.$cover.' mk-flexslider '.$el_class.'">';
if ( !empty( $title ) ) {
	$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$output .= '<ul class="mk-flex-slides">';
while ( $loop->have_posts() ):
	$loop->the_post();
$url = get_post_meta( get_the_ID(), '_url', true );
$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

$output .= '<li>';
$output .= !empty( $url ) ? '<a target="'.$target.'" href="'.$url.'">' : '';
$output .= '<div title="'.get_the_title().'" class="client-logo" style="background-image:url('.$image_src_array[0].'); '.$height.$bg_color.$border_color_item.'"></div>';
$output .= !empty( $url ) ? '</a>' : '';
$output .= '</li>';

endwhile;
wp_reset_query();

$output .= '</ul></div>';
} else {

	switch ( $column ) {
		case 1:
			$column_css = 'one-column';
			break;
		case 2:
			$column_css = 'two-column';
			break;
		case 3:
			$column_css = 'three-column';
			break;
		case 4:
			$column_css = 'four-column';
			break;
		case 5:
			$column_css = 'five-column';
			break;
		case 6:
			$column_css = 'six-column';
			break;
		default : 
			$column_css = 'four-column';
		}
	$container_border = !empty( $border_color ) ? ( ' style="border-left:1px solid '.$border_color.';border-top:1px solid '.$border_color.';" ' ) : '';
	$output .= '<div class="mk-clients-shortcode column-style bg-cover-'.$cover.' '.$column_css.' '.$el_class.'">';
	if ( !empty( $title ) ) {
		$output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
	}
	$output .= '<ul'.$container_border.'>';
	while ( $loop->have_posts() ):
		$loop->the_post();
	$url = get_post_meta( get_the_ID(), '_url', true );
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

	$output .= '<li>';
	$output .= !empty( $url ) ? '<a target="'.$target.'" href="'.$url.'">' : '';
	$output .= '<div title="'.get_the_title().'" class="client-logo" style="background-image:url('.$image_src_array[0].'); '.$height.$bg_color.$border_color_item.'"></div>';
	$output .= !empty( $url ) ? '</a>' : '';
	$output .= '</li>';

	endwhile;
	wp_reset_query();

	$output .= '</ul></div>';
}


echo $output;
