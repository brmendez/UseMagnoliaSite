<?php

extract( shortcode_atts( array(
			'orderby'=> 'date',
			'slides' => '',
			'order'=> 'DESC',
			"full_height" => "true",
			"height" => 350,
			"animation_speed" => 700,
			"slideshow_speed" => 7000,
			"direction_nav" => "true",
			'skip_arrow' => 'false',
			"el_class" => '',
		), $atts ) );

$button2_txt_color = $button1_txt_color = $outline1_hover_color = $outline2_hover_color = $button2_bg_color = $button1_bg_color = $outline2_active_color = $video_color_mask_css = $outline1_active_color = '';

global $post, $mk_options;

$query = array(
	'post_type' => 'edge',
	'suppress_filters' => false
);


if ( !empty($slides) ) {
	$query['post__in'] = explode( ',', $slides );
}

if ( $order ) {
	$query['order'] = $order;
}
if ( $orderby ) {
	$query['orderby'] = $orderby;
}

$loop  = new WP_Query( $query );


$output = '<div class="mk-edge-slider swiper-container" data-height="'.$height.'" data-fullHeight="'.$full_height.'" data-pause="'.$slideshow_speed.'" data-speed="'.$animation_speed.'">';
$output .= '<div style="height:'.$height.'px" class="edge-slider-holder swiper-wrapper">';
while ( $loop->have_posts() ):
	$loop->the_post();


$type =  get_post_meta( $post->ID, '_edge_type', true ) ? get_post_meta( $post->ID, '_edge_type', true ) : 'image';
$animation =  get_post_meta( $post->ID, '_animation', true ) ? get_post_meta( $post->ID, '_animation', true ) : 'default_anim';
$mp4 =  get_post_meta( $post->ID, '_video_mp4', true );
$webm =  get_post_meta( $post->ID, '_video_webm', true );
$ogv =  get_post_meta( $post->ID, '_video_ogv', true );
$video_preview =  get_post_meta( $post->ID, '_video_preview', true );
$video_pattern =  get_post_meta( $post->ID, '_video_pattern', true );
$video_overlay =  get_post_meta( $post->ID, '_video_color_overlay', true );
$slide_image =  get_post_meta( $post->ID, '_slide_image', true );
$slide_bg_color =  get_post_meta( $post->ID, '_bg_color', true );
$cover_bg =  get_post_meta( $post->ID, '_cover', true );

$content_width =  get_post_meta( $post->ID, '_content_width', true ) ? get_post_meta( $post->ID, '_content_width', true ) : 70;
$title =  get_post_meta( $post->ID, '_title', true );
$description =  get_post_meta( $post->ID, '_description', true );

$btn_1_txt =  get_post_meta( $post->ID, '_btn_1_txt', true );
$btn_1_url =  get_post_meta( $post->ID, '_btn_1_url', true );
$btn_2_txt =  get_post_meta( $post->ID, '_btn_2_txt', true );
$btn_2_url =  get_post_meta( $post->ID, '_btn_2_url', true );

$caption_skin =  get_post_meta( $post->ID, '_caption_skin', true );

$btn_1_style =  get_post_meta( $post->ID, '_btn_1_style', true );
$btn_2_style =  get_post_meta( $post->ID, '_btn_2_style', true );

$btn_1_skin =  get_post_meta( $post->ID, '_btn_1_skin', true );
$btn_2_skin =  get_post_meta( $post->ID, '_btn_2_skin', true );
$caption_align =  get_post_meta( $post->ID, '_caption_align', true );



if ( $btn_1_style == 'flat' ) {
	if ( $btn_1_skin == 'light' ) {
		$button1_bg_color = '#ffffff';
		$button1_txt_color = 'dark';

	} else if ( $btn_1_skin == 'dark' ) {
			$button1_bg_color = '#252525';
			$button1_txt_color = 'light';

		} else if ( $btn_1_skin == 'skin' ) {
			$button1_bg_color = $mk_options['skin_color'];
			$button1_txt_color = 'light';
		}
}

if ( $btn_2_style == 'flat' ) {
	if ( $btn_2_skin == 'light' ) {
		$button2_bg_color = '#ffffff';
		$button2_txt_color = 'dark';

	} else if ( $btn_2_skin == 'dark' ) {
			$button2_bg_color = '#252525';
			$button2_txt_color = 'light';

		} else if ( $btn_2_skin == 'skin' ) {
			$button2_bg_color = $mk_options['skin_color'];
			$button2_txt_color = 'light';
		}
}


if ( $btn_1_style == 'outline' ) {
	if ( $btn_1_skin == 'light' ) {
		$outline1_active_color = '#ffffff';
		$outline1_hover_color = '#252525';

	} else if ( $btn_1_skin == 'dark' ) {
			$outline1_active_color = '#252525';
			$outline1_hover_color = '#ffffff';

		} else if ( $btn_1_skin == 'skin' ) {
			$outline1_active_color = $mk_options['skin_color'];
			$outline1_hover_color = '#ffffff';
		}
}

if ( $btn_2_style == 'outline' ) {
	if ( $btn_2_skin == 'light' ) {
		$outline2_active_color = '#ffffff';
		$outline2_hover_color = '#252525';

	} else if ( $btn_2_skin == 'dark' ) {
			$outline2_active_color = '#252525';
			$outline2_hover_color = '#ffffff';

		} else if ( $btn_2_skin == 'skin' ) {
			$outline2_active_color = $mk_options['skin_color'];
			$outline2_hover_color = '#ffffff';
		}
}




$bg_image_css = ( $type == 'image' ) ? ' style="background-image:url('.$slide_image.'); background-color:'.$slide_bg_color.'" ' : '';

$cover_bg = ($cover_bg != 'false') ? ' mk-background-stretch' : '';


$output .= '<div class="swiper-slide mk-video-holder '.$caption_align.$cover_bg.'"'.$bg_image_css.'>';


	
	if ( $video_pattern == 'true' ) {
		$output .= '<div class="mk-video-mask"></div>';
	}	

	if ( !empty( $video_overlay ) ) {
		$video_color_mask_css = ' style="background-color:'.$video_overlay.';opacity:0.3;"';
	}
	$output .= '<div'.$video_color_mask_css.' class="mk-video-color-mask"></div>';

/* 
* Video Section
*/
if ( $type == 'video' ) {

	if(!empty($video_preview)) {
			$output .= '<div style="background-image:url('.$video_preview.');" class="mk-video-section-touch"></div>';	
	}

	$output .= '<div class="mk-section-video"><video poster="'.$video_preview.'" controls="controls" muted="muted" preload="auto" loop="true" autoplay="true">';

	if ( !empty( $mp4 ) ) {
		//MP4 must be first for iPad!
		$output .= '<source type="video/mp4" src="'.$mp4.'" />';
	}
	if ( !empty( $webm ) ) {
		$output .= '<source type="video/webm" src="'.$webm.'" />';
	}
	if ( !empty( $ogv ) ) {
		$output .= '<source type="video/ogg" src="'.$ogv.'" />';
	}

	if ( !empty( $mp4 ) ) {
		//Flash fallback for non-HTML5 browsers without JavaScript
		$output .= '<object width="1900" height="1060" type="application/x-shockwave-flash" data="'.THEME_JS.'/flashmediaelement.swf">';
		$output .= '<param name="movie" value="'.THEME_JS.'/flashmediaelement.swf" />';
		$output .= '<param name="flashvars" value="controls=true&file='.$mp4.'" />';
		$output .= '<img src="'.$video_preview.'" title="No video playback capabilities" />';
		$output .= '</object>';
	}

	$output .= '</video></div>';
}
/***********/





$output .= '<div class="mk-grid">';

$output .= '<div class="edge-slide-content edge-'.$animation.' caption-'.$caption_skin.'" style="width:'.$content_width.'%">';
$output .= ( !empty( $title ) ) ? '<div class="edge-title">'.$title.'</div>' : '';
$output .= ( !empty( $description ) ) ? '<div class="edge-desc">'.$description.'</div>' : '';

if ( !empty( $btn_1_txt ) || !empty( $btn_2_txt ) ) {
	$output .= '<div class="edge-buttons">';
	$output .= ( !empty( $btn_1_txt ) ) ? do_shortcode( '[mk_button dimension="'.$btn_1_style.'" size="large" bg_color="'.$button1_bg_color.'" text_color="'.$button1_txt_color.'" outline_active_color="'.$outline1_active_color.'" outline_hover_color="'.$outline1_hover_color.'" outline_skin="custom" url="'.$btn_1_url.'" target="_self" align="none" margin_top="0" margin_bottom="0"]'.$btn_1_txt.'[/mk_button]' ) : '';
	$output .= ( !empty( $btn_2_txt ) ) ? do_shortcode( '[mk_button dimension="'.$btn_2_style.'" size="large" bg_color="'.$button2_bg_color.'" text_color="'.$button2_txt_color.'" outline_skin="custom" outline_active_color="'.$outline2_active_color.'" outline_hover_color="'.$outline2_hover_color.'"  url="'.$btn_2_url.'" target="_self" align="none" margin_top="0" margin_bottom="0"]'.$btn_2_txt.'[/mk_button]' ) : '';
	$output .= '</div>';
}

$content = str_replace( ']]>', ']]&gt;',  apply_filters( 'the_content', get_the_content() ) );

if ( !empty( $content ) ) {
	$output .= '<div class="mk-edge-custom-content">'.$content.'</div>';
}

$output .= '</div><!--/edge-slide-content-->';
$output .= '</div><!--/mk-grid-->';
$output .= '</div><!--/edge-slide-->';


endwhile;
wp_reset_query();
$output .= '</div>';

if ( $full_height == 'true' && $skip_arrow != 'false') {
	$output .= '<div class="edge-skip-slider"><i class="mk-jupiter-icon-arrow-down"></i></div>';
}

if ( $direction_nav == 'true' ) {

	$output .= '<a class="mk-edge-prev"><i class="mk-moon-arrow-left"></i></a>';
	$output .= '<a class="mk-edge-next"><i class="mk-moon-arrow-right-2"></i></a>';
}

$output .= '<div class="edge-slider-loading"></div>';
$output .= '</div>';

echo $output;
