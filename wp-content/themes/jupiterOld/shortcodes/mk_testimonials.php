<?php

extract( shortcode_atts( array(
			'title' => '',
			'show_as' => 'slideshow',
			'column' => 3,
			'style' => 'boxed',
			'count'=> 10,
			'orderby'=> 'date',
			'testimonials' => '',
			'order'=> 'DESC',
			'skin' => 'dark',
			"el_class"=> '',
			'animation' => '',
		), $atts ) );


$id = mt_rand( 99, 9999 );
$animation_css = $skin_css = '';
if ( $animation != '' ) {
	$animation_css = ' mk-animate-element ' . $animation . ' ';
}

if ( $style == 'simple' ) {
	$skin_css = $skin.'-version ';
}

if ( $style == 'boxed' ) {
	$directionNavArrowsLeft = 'mk-icon-chevron-left';
	$directionNavArrowsRight = 'mk-icon-chevron-right';
} else {
	if ( $skin == 'dark' ) {
		$directionNavArrowsLeft = 'mk-icon-chevron-left';
		$directionNavArrowsRight = 'mk-icon-chevron-right';
	} else {
		$directionNavArrowsLeft = 'mk-moon-arrow-left-14';
		$directionNavArrowsRight = 'mk-moon-arrow-right-15';
	}
}

if($style == 'modern') {
	$controlNav = 'true';
	$directionNav = 'false';
} else {
	$controlNav = 'false';
	$directionNav = 'true';
}


$script_out = '<script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#testimonial_'.$id.'").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "fade",
                    smoothHeight: false,
                    slideshowSpeed: 5000,
                    animationSpeed: 500,
                    directionNavArrowsLeft : \'<i class="'.$directionNavArrowsLeft.'"></i>\',
    				directionNavArrowsRight : \'<i class="'.$directionNavArrowsRight.'"></i>\',
                    pauseOnHover: true,
                    controlNav: '.$controlNav.',
                    directionNav:'.$directionNav.',
                    prevText: "",
                    nextText: ""
                });
            });
        });
        </script>';

$query = array(
	'post_type' => 'testimonial',
	'showposts' => $count,
);

if ( $testimonials ) {
	$query['post__in'] = explode( ',', $testimonials );
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}
if ( $order ) {
	$query['order'] = $order;
}

$loop = new WP_Query( $query );

$output = $heading_title = $column_class = '';

if($show_as == 'column') {

	$script_out = '';
	$slideshow_class = array('testimonial-column', 'testimonial-ul');

	switch($column) {
		case 1 :
		$column_class = 'one-column';
		break;
		case 2 :
		$column_class = 'two-column';
		break;
		case 3 :
		$column_class = 'three-column';
		break;
		case 4 :
		$column_class = 'four-column';
		continue;
	}

} else {
	$slideshow_class = array('mk-flexslider', 'mk-flex-slides');
}



if ( !empty( $title ) ) {
	$heading_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}
$i = 0;
while ( $loop->have_posts() ):
	$loop->the_post();
$i++;
$url = get_post_meta( get_the_ID(), '_url', true );
$company = get_post_meta( get_the_ID(), '_company', true );
if ( $style == 'boxed' || $style == 'modern' ) {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 120, 'height' => 120)); 
}
if ( $style != 'modern' ) {

	$output .= '<li class="'.$column_class.' testimonial-item">';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	$output .= '</div>';
	if ( $style == 'boxed' && !empty( $image_src ) ) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="50" height="50" src="'.$image_src.'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';
	$output .= !empty( $company ) ? ( '<a '.( !empty( $url ) ? ( 'href="'.$url.'"' ) : '' ).' class="mk-testimonial-company">'. strip_tags( $company ).'</a>' ) : '';
	$output .= '</li>'. "\n\n";

} else {

	$output .= '<li class="'.$column_class.' testimonial-item">';
	$output .= '<div class="mk-testimonial-content">';
	$output .= '<p class="mk-testimonial-quote">'. get_post_meta( get_the_ID(), '_desc', true ).'</p>';
	if (!empty( $image_src ) ) {
		$output .= '<div class="mk-testimonial-image '.$animation_css.'"><img width="50" height="50" src="'.$image_src.'" alt="'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'" /></div>';
	}
	$output .= '<span class="mk-testimonial-author">'. strip_tags( get_post_meta( get_the_ID(), '_author', true ) ).'</span>';
	$output .= !empty( $company ) ? ( '<a '.( !empty( $url ) ? ( 'href="'.$url.'" target="_blank"' ) : '' ).' class="mk-testimonial-company">'. strip_tags( $company ).'</a>' ) : '';
	$output .= '<div class="clearboth"></div></div>';
	$output .= '</li>'. "\n\n";
}

if($show_as == 'column' && ($i%$column == 0)) {
	$output .= '<div class="clearboth"></div>';
}

endwhile;

wp_reset_query();



$final_output = $heading_title;
$final_output .= '<div class="mk-testimonial '.$style.'-style '.$slideshow_class[0].' '.$skin_css.$el_class.'" id="testimonial_'.$id.'">';
if ( $style == 'simple' ) {
	$output .= '<i class="mk-moon-quotes-left"></i>';
	$output .= '<i class="mk-moon-quotes-right"></i>';
}
$final_output .= '<ul class="'.$slideshow_class[1].'">' . $output . '</ul></div>' . "\n\n\n\n" . $script_out;

echo $final_output;
