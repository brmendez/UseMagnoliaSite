<?php
extract(shortcode_atts(array(
     'el_class' => '',
     'bg_color' => '',
     'border_color' => '',
     'bg_image' => '',
     'bg_repeat' => 'repeat',
     'predefined_bg' => '',
     'section_layout' => '',
     'section_id' => '',
     'sidebar' => '',
     'bg_stretch' => '',
     'attachment' => '',
     'top_shadow' => '',
     'bg_position' => 'left top',
     'enable_3d' => 'false',
     'speed_factor' => '',
     'min_height' => 100,
     'margin_bottom' => '10',
     'padding_top' => '10',
     'padding_bottom' => '10',
     'video_opacity' => '',
     'last_page' => 'false',
     'first_page' => 'false',
     'bg_video' => 'no',
     'mp4' => '',
     'webm' => '',
     'ogv' => '',
     'poster_image' => '',
     'video_mask' => 'false',
     'visibility' => '',
     'video_color_mask' => '',
     'full_height' => ''
), $atts));
$output = $bg_stretch_class = $top_shadow_css = $first_page_css = $backgroud_image = $video_color_mask_css = '';
$id     = mt_rand(99, 9999);
global $post;
if ($bg_stretch == 'true') {
     $bg_stretch_class = 'mk-background-stretch ';
}
if ($top_shadow == 'true') {
     $top_shadow_css = ' drop-top-shadow';
}
if (!empty($bg_image)) {
     $backgroud_image = !empty($bg_image) ? 'background-image:url(' . $bg_image . '); ' : '';
} else {
     $backgroud_image = !empty($predefined_bg) ? 'background-image:url(' . THEME_IMAGES . '/pattern/' . $predefined_bg . '.png);' : '';
}
$border_css = (empty($bg_image) && !empty($border_color)) ? 'border:1px solid ' . $border_color . ';border-left:none;border-right:none;' : '';
$output .= '<div class="clearboth"></div></div></div>';
$output .= '<div id="' . $section_id . '" class="full-width-' . $id . ' ' . $bg_stretch_class . $top_shadow_css . ' full-height-' . $full_height . ' mk-video-holder parallax-' . $enable_3d . ' mk-page-section mk-blur-parent mk-shortcode ' . $visibility . ' ' . $el_class . '" data-speedFactor="' . $speed_factor . '">';
     if ($video_mask == 'true') {
          $output .= '<div class="mk-video-mask"></div>';
     }
     if (!empty($video_color_mask)) {
          $video_color_mask_css = ' style="background-color:' . $video_color_mask . ';opacity:' . $video_opacity . ';"';
     }
     $output .= '<div' . $video_color_mask_css . ' class="mk-video-color-mask"></div>';


if ($bg_video == 'yes') {

        if(!empty($poster_image)) {
            $output .= '<div style="background-image:url('.$poster_image.');" class="mk-video-section-touch"></div>';  
        }

     $output .= '<div class="mk-section-video"><video poster="' . $poster_image . '" controls="controls" muted="muted" preload="auto" loop="true" autoplay="true">';
     if (!empty($mp4)) {
          $output .= '<source type="video/mp4" src="' . $mp4 . '" />';
     }
     if (!empty($webm)) {
          $output .= '<source type="video/webm" src="' . $webm . '" />';
     }
     if (!empty($ogv)) {
          $output .= '<source type="video/ogg" src="' . $ogv . '" />';
     }
     if (!empty($mp4)) {
          $output .= '<object width="1900" height="1060" type="application/x-shockwave-flash" data="' . THEME_JS . '/flashmediaelement.swf">';
          $output .= '<param name="movie" value="' . THEME_JS . '/flashmediaelement.swf" />';
          $output .= '<param name="flashvars" value="controls=true&file=' . $mp4 . '" />';
          $output .= '<img src="' . $poster_image . '" title="No video playback capabilities" />';
          $output .= '</object>';
     }
     $output .= '</video></div>';
}
if ($section_layout == 'full') {
     $output .= '<div class="mk-grid vc_row-fluid row-fluid page-section-content"><div class="mk-padding-wrapper">' . wpb_js_remove_wpautop($content) . '</div><div class="clearboth"></div></div>';
} else {
     $output .= '<div class="theme-page-wrapper ' . $section_layout . '-layout mk-grid vc_row-fluid row-fluid page-section-content">';
     $output .= '<div class="theme-content">' . wpb_js_remove_wpautop($content) . '<div class="clearboth"></div></div>';
     $output .= '<aside id="mk-sidebar" class="mk-builtin"><div class="sidebar-wrapper" style="padding-top:0;padding-bottom:0;">';
     ob_start();
     dynamic_sidebar($sidebar);
     $output .= ob_get_contents();
     ob_end_clean();
     $output .= '</div></aside></div>';
}
$output .= '<div class="clearboth"></div></div>';
$output .= '<style type="text/css">
                   .full-width-' . $id . ' {
                        min-height:' . $min_height . 'px;
                        padding:' . $padding_top . 'px 0 ' . $padding_bottom . 'px;
                        ' . $backgroud_image . '
                        background-attachment:' . $attachment . ';
                        ' . ($bg_color ? ('background-color:' . $bg_color . ';') : '') . '
                        background-position:' . $bg_position . ';
                        background-repeat:' . $bg_repeat . ';
                        margin-bottom:' . $margin_bottom . 'px;
                        ' . $border_css . '
                  }';
if ($first_page == 'true') {
     $output .= '
                        .mk-main-wrapper{
                            display: none;
                        }
                        #theme-page{
                             padding-top:0;
                        {';
}
$output .= '.full-width-' . $id . ' .mk-fancy-title span, .full-width-' . $id . ' .mk-blog-view-all{
                        background-color: ' . $bg_color . ' !important;
                    }
                 </style>';
if ($last_page == 'true') {
     $output .= '<div><div>';
} else {
     $layout = get_post_meta($post->ID, '_layout', true);
     $output .= '<div class="theme-page-wrapper ' . $layout . '-layout mk-grid vc_row-fluid row-fluid">';
     $output .= '<div class="theme-content">';
}
echo $output;
