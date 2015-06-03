<?php
/*
*
* Contains all the dynamic css rules generated based on theme settings.	
*
*/

function mk_dynamic_css() {

	wp_enqueue_style( 'mk-style', get_stylesheet_uri(), false, false, 'all' );

global $mk_options;



$output = $fontface_style_1 = $fontface_style_2 = $fontface_css_1 = $fontface_css_2 = $google_font_2 = $google_font_1 = '';
$safefont_css_2 = $safefont_css_1 =  $body_bg = $header_bg = $banner_bg = $page_bg = $footer_bg = $uc_bg = $classic_nav_bg = '';


/* Get skin color from global $_GET for skin switcher panel */
if(isset($_GET['skin'])) {
	$skin_color = '#'.$_GET['skin'];
} else {
	$skin_color = $mk_options['skin_color'];
}








###########################################
# Typography
###########################################

$special_elements_1_list = isset($mk_options['special_elements_1']) ? $mk_options['special_elements_1'] : '';
$special_elements_2_list = isset($mk_options['special_elements_2']) ? $mk_options['special_elements_2'] : '';


function my_strstr( $haystack, $needle, $before_needle = false ) {
	if ( !$before_needle ) return strstr( $haystack, $needle );
	else return substr( $haystack, 0, strpos( $haystack, $needle ) );
}

/* fontface */
if ( $mk_options['special_fonts_type_1'] == 'fontface' ) {
	$fontface_1 = $mk_options['special_fonts_list_1'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_1\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_1 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0".FONTFACE_URI."/", $match[0] )."\n";
		}

		if ( is_array( $mk_options['special_elements_1'] ) ) {
			$special_elements_1 = implode( ', ', $mk_options['special_elements_1'] );
		} else {
			$special_elements_1 = $mk_options['special_elements_1'];
		}

		if ( $special_elements_1 && $fontface_1 ) {
			$fontface_css_1 = $special_elements_1 . '{ font-family: "' . $fontface_1.'"}';
		}

	}
}

if ( $mk_options['special_fonts_type_2'] == 'fontface' ) {
	$fontface_2 = $mk_options['special_fonts_list_2'];

	$stylesheet = FONTFACE_DIR.'/fontface_stylesheet.css';
	if ( file_exists( $stylesheet ) ) {
		$file_content = file_get_contents( $stylesheet );
		if ( preg_match( "/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$fontface_2\\1.*?}/is", $file_content, $match ) ) {
			$fontface_style_2 = preg_replace( "/url\s*\(\s*['|\"]\s*/is", "\\0".FONTFACE_URI."/", $match[0] )."\n";
		}
			if ( is_array( $special_elements_2_list ) ) {
				$special_elements_2 = implode( ', ', $special_elements_2_list );
			} else {
				$special_elements_2 = $special_elements_2_list;
			}

			if ( $special_elements_2 && $fontface_2 ) {
				$fontface_css_2 = $special_elements_2 . '{ font-family: "' . $fontface_2.'"}';
			}
	}
}




/**
 * Safe Fonts
 * */
if ( $mk_options['special_fonts_type_1'] == 'safe_font' ) {
	$safefont_1 = $mk_options['special_fonts_list_1'];

	if ( is_array( $mk_options['special_elements_1'] ) ) {
		$special_elements_1 = implode( ', ', $mk_options['special_elements_1'] );
	} else {
		$special_elements_1 = $mk_options['special_elements_1'];
	}

	if ( $special_elements_1 && $safefont_1 ) {
		$safefont_css_1 = $special_elements_1 . '{ font-family: ' . $safefont_1.'}';
	}

}


if ( $mk_options['special_fonts_type_2'] == 'safe_font' ) {
	$safefont_2 = $mk_options['special_fonts_list_2'];

	if ( is_array( $mk_options['special_elements_2'] ) ) {
		$special_elements_2 = implode( ', ', $mk_options['special_elements_2'] );
	} else {
		$special_elements_2 = $mk_options['special_elements_2'];
	}

	if ( $special_elements_2 && $safefont_2 ) {
		$safefont_css_2 = $special_elements_2 . '{ font-family: ' . $safefont_2.'}';
	}

}



/**
 * Google Fonts
 * */
if ( is_array( $special_elements_1_list ) ) {
	$special_elements_1 = implode( ', ', $special_elements_1_list );
} else {
	$special_elements_1 = $special_elements_1_list;
}

if ( is_array( $special_elements_2_list ) ) {
	$special_elements_2 = implode( ', ', $special_elements_2_list );
} else {
	$special_elements_2 = $special_elements_2_list;
}

if ( $special_elements_1 && $mk_options['special_fonts_type_1'] == 'google' ) {

	$google_font_1 = $special_elements_1  . ' {font-family: ';

	$format_name1 = strpos( $mk_options['special_fonts_list_1'], ':' );
	if ( $format_name1 !== false ) {
		$google_font_1 .=  my_strstr( str_replace( '+', ' ', $mk_options['special_fonts_list_1'] ), ':', true );
	} else { $google_font_1 .= str_replace( '+', ' ', $mk_options['special_fonts_list_1'] );


	}

	$google_font_1 .=' }';
}

if ( $special_elements_2 && $mk_options['special_fonts_type_2'] == 'google' ) {
	$google_font_2 = $special_elements_2  . ' {font-family: ';

	$format_name2 = strpos( $mk_options['special_fonts_list_2'], ':' );
	if ( $format_name2 !== false ) {
		$google_font_2 .=  my_strstr( str_replace( '+', ' ', $mk_options['special_fonts_list_2'] ), ':', true );
	} else { $google_font_2 .= str_replace( '+', ' ', $mk_options['special_fonts_list_2'] );


	}

	$google_font_2 .=' }';

}
$safe_font = $mk_options['font_family'] ? 'font-family: ' . stripslashes( $mk_options['font_family'] ) . ';' : '';





/**
 * Body background
 */

$body_bg .= $mk_options['body_color'] ? 'background-color:'.$mk_options['body_color'].';' : '';
$body_bg .= $mk_options['body_image'] ? 'background-image:url(' . $mk_options['body_image'] . ');' : ' ';
$body_bg .= $mk_options['body_repeat'] ? 'background-repeat:'.$mk_options['body_repeat'].';' : '';
$body_bg .= $mk_options['body_position'] ? 'background-position:'.$mk_options['body_position'].';' : '';
$body_bg .= $mk_options['body_attachment'] ? 'background-attachment:'.$mk_options['body_attachment'].';' : '';



/**
 * Header background
 */
$header_bg .= $mk_options['header_color'] ? 'background-color:'.$mk_options['header_color'].';' : '';
$header_bg .= $mk_options['header_image'] ? 'background-image:url(' . $mk_options['header_image'] . ');' : ' ';
$header_bg .= $mk_options['header_repeat'] ? 'background-repeat:'.$mk_options['header_repeat'].';' : '';
$header_bg .= $mk_options['header_position'] ? 'background-position:'.$mk_options['header_position'].';' : '';
$header_bg .= $mk_options['header_attachment'] ? 'background-attachment:'.$mk_options['header_attachment'].';' : '';



/**
 * Header Banner background
 */

$banner_bg .= $mk_options['banner_color'] ? 'background-color:'.$mk_options['banner_color'].';' : '';
$banner_bg .= $mk_options['banner_image'] ? 'background-image:url(' . $mk_options['banner_image'] . ');' : ' ';
$banner_bg .= $mk_options['banner_repeat'] ? 'background-repeat:'.$mk_options['banner_repeat'].';' : '';
$banner_bg .= $mk_options['banner_position'] ? 'background-position:'.$mk_options['banner_position'].';' : '';
$banner_bg .= $mk_options['banner_attachment'] ? 'background-attachment:'.$mk_options['banner_attachment'].';' : '';



/**
 * Page background
 */

$page_bg .= $mk_options['page_color'] ? 'background-color:'.$mk_options['page_color'].';' : '';
$page_bg .= $mk_options['page_image'] ? 'background-image:url(' . $mk_options['page_image'] . ');' : ' ';
$page_bg .= $mk_options['page_repeat'] ? 'background-repeat:'.$mk_options['page_repeat'].';' : '';
$page_bg .= $mk_options['page_position'] ? 'background-position:'.$mk_options['page_position'].';' : '';
$page_bg .= $mk_options['page_attachment'] ? 'background-attachment:'.$mk_options['page_attachment'].';' : '';


/**
 * Footer background
 */

$footer_bg  = $mk_options['footer_color'] ? 'background-color:'.$mk_options['footer_color'].';' : '';
$footer_bg .= $mk_options['footer_image'] ? 'background-image:url(' . $mk_options['footer_image'] . ');' : ' ';
$footer_bg .= $mk_options['footer_repeat'] ? 'background-repeat:'.$mk_options['footer_repeat'].';' : '';
$footer_bg .= $mk_options['footer_position'] ? 'background-position:'.$mk_options['footer_position'].';' : '';
$footer_bg .= $mk_options['footer_attachment'] ? 'background-attachment:'.$mk_options['footer_attachment'].';' : '';




/**
 * Under Construction Section background
 */

$uc_bg .= $mk_options['uc_bg_color'] ? 'background-color:'.$mk_options['uc_bg_color'].';' : '';
if($mk_options['uc_bg_image_source'] == 'preset') {
$uc_bg .=  $mk_options['uc_bg_preset_image'] ? 'background-image:url(' . $mk_options['uc_bg_preset_image'] . ');' : ' ';
} else if($mk_options['uc_bg_image_source'] == 'custom') {
$uc_bg .=  $mk_options['uc_bg_custom_image'] ? 'background-image:url(' . $mk_options['uc_bg_custom_image'] . ');' : ' ';	
}


$uc_bg .= $mk_options['uc_bg_repeat'] ? 'background-repeat:'.$mk_options['uc_bg_repeat'].';' : '';
$uc_bg .= $mk_options['uc_bg_position'] ? 'background-position:'.$mk_options['uc_bg_position'].';' : '';
$uc_bg .= $mk_options['uc_bg_attachment'] ? 'background-attachment:'.$mk_options['uc_bg_attachment'].';' : '';


$skin_darker = hexDarker($skin_color,20);
$main_nav_top_bg_hover_color = mk_color($mk_options['main_nav_top_bg_hover_color'], $mk_options['main_nav_top_bg_hover_color_rgba']);
$skin_color_60 = mk_color($mk_options['skin_color'], 0.6);


if($mk_options['main_nav_bg_color'] == '') {
	$classic_nav_bg = $header_bg;
} else {
	$classic_nav_bg = 'background-color:' . $mk_options['main_nav_bg_color'] . ';';
}

$sidebar_width = 100 - $mk_options['content_width'];
$boxed_layout_width = $mk_options['grid_width'] + 60;




###########################################
# Font family
###########################################
$output .= "
body {
	{$safe_font}
}

{$fontface_style_1}
{$fontface_style_2}
{$fontface_css_1}
{$fontface_css_2}
{$google_font_1}
{$google_font_2}
{$safefont_css_1}
{$safefont_css_2}
";




###########################################
# Backgrounds
###########################################

$output .= "

body
{
	{$body_bg}
}

#mk-header
{
	{$banner_bg}
}



.mk-header-bg
{
	{$header_bg}
}



.mk-header-toolbar
{
	background-color: {$mk_options['header_toolbar_bg']};	
}





#theme-page 
{
	{$page_bg}
}



#mk-footer 
{
	{$footer_bg}
}



#sub-footer 
{
	background-color: {$mk_options['sub_footer_bg_color']};
}



#mk-boxed-layout
{
  -webkit-box-shadow: 0 0 {$mk_options['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$mk_options['boxed_layout_shadow_intensity']});
  -moz-box-shadow: 0 0 {$mk_options['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$mk_options['boxed_layout_shadow_intensity']});
  box-shadow: 0 0 {$mk_options['boxed_layout_shadow_size']}px rgba(0, 0, 0, {$mk_options['boxed_layout_shadow_intensity']});
}



.mk-uc-header
{
 	{$uc_bg}
}




.mk-tabs-panes,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-divider .divider-go-top,
.ajax-container,
.mk-fancy-title.pattern-style span, 
.mk-portfolio-view-all, 
.mk-woo-view-all, 
.mk-blog-view-all 
{
	background-color: {$mk_options['page_color']};
}



.mk-header-bg 
{
  -webkit-opacity: {$mk_options['header_opacity']};
  -moz-opacity: {$mk_options['header_opacity']};
  -o-opacity: {$mk_options['header_opacity']};
  opacity: {$mk_options['header_opacity']};
}



.mk-fixed .mk-header-bg 
{
  -webkit-opacity: {$mk_options['header_sticky_opacity']};
  -moz-opacity: {$mk_options['header_sticky_opacity']};
  -o-opacity: {$mk_options['header_sticky_opacity']};
  opacity: {$mk_options['header_sticky_opacity']};
}

";




/* Header, Header Banner and Header toolbar border bottoms */
if(!empty($mk_options['header_border_color'])) {
	$output .= "
			.mk-header-inner 
			{
				border-bottom:1px solid {$mk_options['header_border_color']} !important;
			}
		";	
}


if(!empty($mk_options['header_toolbar_border_color'])) {
	$output .= "
				.mk-header-toolbar
					{
						border-bottom:1px solid {$mk_options['header_toolbar_border_color']};
					}
			";	
}


if(!empty($mk_options['banner_border_color'])) {
	$output .= "
				#mk-header
					{
						border-bottom:1px solid {$mk_options['banner_border_color']};
					}
			";	
}






###########################################
# General Typography & Coloring
###########################################

$output .= "
body
{
	font-size: {$mk_options['body_font_size']}px;
	color: {$mk_options['body_text_color']};
	font-weight: {$mk_options['body_weight']};
	line-height: 22px;
}


p {
	font-size: {$mk_options['p_size']}px;
	color: {$mk_options['p_color']};
}


a {
	color: {$mk_options['a_color']};
}


a:hover {
	color: {$mk_options['a_color_hover']};
}


#theme-page strong {
	color: {$mk_options['strong_color']};
}



#theme-page h1
{
	font-size: {$mk_options['h1_size']}px;
	color: {$mk_options['h1_color']};
	font-weight: {$mk_options['h1_weight']};
	text-transform: {$mk_options['h1_transform']};
}

#theme-page h2
{
	font-size: {$mk_options['h2_size']}px;
	color: {$mk_options['h2_color']};
	font-weight: {$mk_options['h2_weight']};
	text-transform: {$mk_options['h2_transform']};
}


#theme-page h3
{
	font-size: {$mk_options['h3_size']}px;
	color: {$mk_options['h3_color']};
	font-weight: {$mk_options['h3_weight']};
	text-transform: {$mk_options['h3_transform']};
}

#theme-page h4
{
	font-size: {$mk_options['h4_size']}px;
	color: {$mk_options['h4_color']};
	font-weight: {$mk_options['h4_weight']};
	text-transform: {$mk_options['h4_transform']};
}


#theme-page h5
{
	font-size: {$mk_options['h5_size']}px;
	color: {$mk_options['h5_color']};
	font-weight: {$mk_options['h5_weight']};
	text-transform: {$mk_options['h5_transform']};
}


#theme-page h6
{
	font-size: {$mk_options['h6_size']}px;
	color: {$mk_options['h6_color']};
	font-weight: {$mk_options['h6_weight']};
	text-transform: {$mk_options['h6_transform']};
}

.page-introduce-title 
{
	font-size: {$mk_options['page_introduce_title_size']}px;
	color: {$mk_options['page_title_color']};
	text-transform: {$mk_options['page_title_transform']};
	font-weight: {$mk_options['page_introduce_weight']};
}


.page-introduce-subtitle 
{
	font-size: {$mk_options['page_introduce_subtitle_size']}px;
	line-height: 100%;
	color: {$mk_options['page_subtitle_color']};
	font-size: {$mk_options['page_introduce_subtitle_size']}px;
	text-transform: {$mk_options['page_introduce_subtitle_transform']};
}


::-webkit-selection
{
	background-color: {$skin_color};
	color:#fff;
}

::-moz-selection
{
	background-color: {$skin_color};
	color:#fff;
}

::selection
{
	background-color: {$skin_color};
	color:#fff;
}

";









###########################################
# Widgets
###########################################

$output .= "

#mk-sidebar, 
#mk-sidebar p
{
		font-size: {$mk_options['sidebar_text_size']}px;
		color: {$mk_options['sidebar_text_color']};
		font-weight: {$mk_options['sidebar_text_weight']};
}



#mk-sidebar .widgettitle 
{
		text-transform: {$mk_options['sidebar_title_transform']};
		font-size: {$mk_options['sidebar_title_size']}px;
		color: {$mk_options['sidebar_title_color']};
		font-weight: {$mk_options['sidebar_title_weight']};
}


#mk-sidebar .widgettitle a 
{
		color: {$mk_options['sidebar_title_color']};
}	



#mk-sidebar .widget a
{
		color: {$mk_options['sidebar_links_color']};
}


#mk-footer, 
#mk-footer p
{
		font-size: {$mk_options['footer_text_size']}px;
		color: {$mk_options['footer_text_color']};
		font-weight: {$mk_options['footer_text_weight']};
}



#mk-footer .widgettitle
{
		text-transform: {$mk_options['footer_title_transform']};
		font-size: {$mk_options['footer_title_size']}px;
		color: {$mk_options['footer_title_color']};
		font-weight: {$mk_options['footer_title_weight']};
}



#mk-footer .widgettitle a
{
		color: {$mk_options['footer_title_color']};
}



#mk-footer .widget a
{
		color: {$mk_options['footer_links_color']};

}

#mk-sidebar .widget a:hover, 
#mk-footer .widget a:hover 
{
	color: {$skin_color};
}

";

















###########################################
# Widths
###########################################

$output .= "

.mk-grid
{
	max-width: {$mk_options['grid_width']}px;
}

.mk-header-nav-container, .mk-classic-menu-wrapper 
{
	width: {$mk_options['grid_width']}px;
}


.theme-page-wrapper #mk-sidebar.mk-builtin 
{
	width: {$sidebar_width}%;
}

.theme-page-wrapper.right-layout .theme-content, 
.theme-page-wrapper.left-layout .theme-content 
{
	width: {$mk_options['content_width']}%;
}


.mk-boxed-enabled #mk-boxed-layout, 
.mk-boxed-enabled #mk-boxed-layout .mk-header-inner.mk-fixed 
{
	max-width: {$boxed_layout_width}px;

}


.mk-boxed-enabled #mk-boxed-layout .mk-header-inner.mk-fixed, 
.mk-boxed-enabled #mk-boxed-layout .classic-style-nav .mk-header-nav-container.mk-fixed 
{
		width: {$boxed_layout_width}px !important;
		left:auto !important;
}


.modern-style-nav .mk-header-inner .main-navigation-ul > li > a, 
.modern-style-nav .mk-header-inner .mk-header-start-tour,
.mk-header-inner #mk-header-search,
.modern-style-nav .mk-header-inner,
.modern-style-nav .mk-search-trigger
{
	height: {$mk_options['header_height']}px;
	line-height:{$mk_options['header_height']}px;
}


.mk-header-nav-container
{
	text-align:{$mk_options['main_menu_align']};
}

@media handheld, only screen and (max-width: {$mk_options['grid_width']}px){

		.header-grid.mk-grid .header-logo.left-logo
		{
			left: 15px !important;
		}
		.header-grid.mk-grid .header-logo.right-logo, .mk-header-right {
			right: 15px !important;
		}

}




";











#################################################
# Content maximum width to convert to responsive
#################################################

$output .= "
@media handheld, only screen and (max-width: {$mk_options['content_responsive']}px){

			.theme-page-wrapper .theme-content
			{
				width: 100% !important;
				float: none !important;
			}


			.theme-page-wrapper 
			{
				padding-right:20px !important;
				padding-left: 20px !important;	
			}


			.theme-page-wrapper .theme-content 
			{
				padding:25px 0 !important;
			}


			.theme-page-wrapper #mk-sidebar  
			{
				width: 100% !important;
				float: none !important;
				padding: 0 !important;

			}


			.theme-page-wrapper #mk-sidebar .sidebar-wrapper 
			{
				padding:20px 0 !important;
			}

}



@media handheld, only screen and (max-width: {$mk_options['grid_width']}px){
		.mk-go-top, 
		.mk-quick-contact-wrapper
		{
			bottom:70px !important;
		}

		.mk-grid {
			width: 100%;
		}

		.mk-padding-wrapper {
			padding: 0 20px;
		}

 }


";









#################################################
# Header Toolbar Colorings
#################################################


$output .= "

#mk-toolbar-navigation ul li a, 
.mk-language-nav > a, 
.mk-header-login .mk-login-link, 
.mk-subscribe-link, 
.mk-checkout-btn,
.mk-header-tagline a,
.header-toolbar-contact a,
#mk-toolbar-navigation ul li a:hover, 
.mk-language-nav > a:hover, 
.mk-header-login .mk-login-link:hover, 
.mk-subscribe-link:hover, 
.mk-checkout-btn:hover,
.mk-header-tagline a:hover
{
	color:{$mk_options['header_toolbar_link_color']};
}


#mk-toolbar-navigation ul li a 
{
	border-right:1px solid {$mk_options['header_toolbar_link_color']};
}



.mk-header-tagline, 
.header-toolbar-contact, 
.mk-header-date
{
	color:{$mk_options['header_toolbar_txt_color']};
}


#mk-header-social a i {
	color:{$mk_options['header_toolbar_social_network_color']};
}

";










#################################################
# Header Section
#################################################

$output .= "

.classic-style-nav .header-logo
{
	height: {$mk_options['header_height']}px !important;
}


.classic-style-nav .mk-header-inner 
{
	
	line-height:{$mk_options['header_height']}px;
	padding-top:{$mk_options['header_height']}px;
}

.mk-header-nav-container
{
	background-color: {$mk_options['main_nav_bg_color']};
}


.mk-header-start-tour 
{
	font-size: {$mk_options['start_tour_size']}px;
	color: {$mk_options['start_tour_color']};
}


.mk-header-start-tour:hover
{
	color: {$mk_options['start_tour_color']};
}


.mk-classic-nav-bg 
{
	{$classic_nav_bg}
}


.mk-search-trigger,
.shoping-cart-link i,
.mk-nav-responsive-link i,
.mk-toolbar-resposnive-icon i
{
	color: {$mk_options['main_nav_top_text_color']};
}


#mk-header-searchform .text-input 
{
	background-color:{$mk_options['header_toolbar_search_input_bg']} !important;
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform span i
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input::-webkit-input-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}


#mk-header-searchform .text-input:-ms-input-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
} 


#mk-header-searchform .text-input:-moz-placeholder
{
	color: {$mk_options['header_toolbar_search_input_txt']};
}
";
 









#################################################
# Main Nvigation
#################################################


$output .= "

.main-navigation-ul > li > a, 
#mk-responsive-nav .mk-nav-arrow 
{
	color: {$mk_options['main_nav_top_text_color']};
	background-color: {$mk_options['main_nav_top_bg_color']};
	font-size: {$mk_options['main_nav_top_size']}px;
	font-weight: {$mk_options['main_nav_top_weight']};
	padding-right:{$mk_options['main_nav_item_space']}px;
	padding-left:{$mk_options['main_nav_item_space']}px;
}



.main-navigation-ul li > a:hover,
.main-navigation-ul li:hover > a,
.main-navigation-ul li.current-menu-item > a,
.main-navigation-ul li.current-menu-ancestor > a
{
	background-color: {$mk_options['main_nav_top_bg_hover_color']};
	background-color: {$main_nav_top_bg_hover_color};
	color: {$mk_options['main_nav_top_text_hover_color']};
}

.main-navigation-ul > li:hover > a,
.main-navigation-ul > li.current-menu-item > a,
.main-navigation-ul > li.current-menu-ancestor > a
{
	border-top-color:{$skin_color};
}

.main-navigation-ul li .sub 
{
  border-top:3px solid {$skin_color};
}


#mk-main-navigation ul li ul
{
	background-color: {$mk_options['main_nav_sub_bg_color']};
}


#mk-main-navigation ul li ul li a
{
	color: {$mk_options['main_nav_sub_text_color']};
}


#mk-main-navigation ul li ul li a:hover
{
	color: {$mk_options['main_nav_sub_text_color_hover']} !important;
}


.main-navigation-ul li ul li a:hover,
.main-navigation-ul li ul li:hover > a,
.main-navigation-ul ul li a:hover,
.main-navigation-ul ul li:hover > a,
.main-navigation-ul ul li.current-menu-item > a
{
	background-color:{$mk_options['main_nav_sub_hover_bg_color']} !important;
  	color: {$skin_color} !important;
}


.mk-search-trigger:hover
{
	color: {$mk_options['main_nav_top_text_hover_color']};
}";








#################################################
# Header Resposnive State
#################################################

$output .= "
	
@media handheld, only screen and (max-width: {$mk_options['responsive_nav_width']}px){
	
			.mk-header-nav-container 
			{
				width: auto !important;
				display:none;
			}


			.mk-header-right {
				right:70px !important;
			}
			
			
			.mk-header-inner #mk-header-search 
			{
				display:none !important;
			}


			#mk-header-search
			{
				padding-bottom: 10px !important;
			}


			#mk-header-searchform span .text-input
			{
				width: 100% !important;
			}


			.classic-style-nav .header-logo .center-logo
			{
			    text-align: right !important;
			}


			.classic-style-nav .header-logo .center-logo a
			{
			    margin: 0 !important;
			}


			.header-logo
			{
			    height: {$mk_options['header_height']}px !important;
			}
			
			.mk-header-inner
			{
				padding-top:0 !important;
			}


			.header-logo
			{
				position:relative !important;
				right:auto !important;
				left:auto !important;
				float:left !important;
				margin-left:10px;
				text-align:left;
			}


			.shopping-cart-header
			{
				margin:0 20px 0 0 !important;
			}
			
			
			#mk-responsive-nav 
			{
				background-color:{$mk_options['responsive_nav_color']} !important;
			}


			.mk-header-nav-container #mk-responsive-nav
			{
				visibility: hidden;
			}


			.mk-responsive .mk-header-nav-container #mk-main-navigation
			{
				visibility: visible;
			}


			
			#mk-responsive-nav li ul li .megamenu-title:hover, 
			#mk-responsive-nav li ul li .megamenu-title, 
			#mk-responsive-nav li a, #mk-responsive-nav li ul li a:hover 
			{
		  			color:{$mk_options['responsive_nav_txt_color']} !important;
			}


			.mk-mega-icon
			{
				display:none !important;
			}


			.mk-header-bg
			{
				zoom:1 !important;
				filter:alpha(opacity=100) !important;
				opacity:1 !important;
			}


			

			.mk-nav-responsive-link
			{
				display:block !important;
			}

			.mk-header-nav-container
			{
				height:100%;
				z-index:200;
			}


			#mk-main-navigation
			{
			position:relative;
			z-index:2;
			}


			.mk_megamenu_columns_2, 
			.mk_megamenu_columns_3, 
			.mk_megamenu_columns_4, 
			.mk_megamenu_columns_5, 
			.mk_megamenu_columns_6 
			{
				width:100% !important;
			}

}
";






#################################################
# Theme Skin colors
#################################################

$output .= "
.comment-reply a,
.mk-tabs .mk-tabs-tabs li.ui-tabs-active a > i,
.mk-toggle .mk-toggle-title.active-toggle:before,
.introduce-simple-title,
.rating-star .rated,
.mk-accordion.fancy-style .mk-accordion-tab.current:before,
.mk-testimonial-author,
.modern-style .mk-testimonial-company,
#wp-calendar td#today,
.mk-tweet-list a,
.widget_testimonials .testimonial-slider .testimonial-author,
.news-full-without-image .news-categories span,
.news-half-without-image .news-categories span,
.news-fourth-without-image .news-categories span,
.mk-read-more,
.news-single-social li a,
.portfolio-widget-cats,
.portfolio-carousel-cats,
.blog-showcase-more,
.simple-style .mk-employee-item:hover .team-member-position, 
.mk-readmore, 
.about-author-name,
.filter-portfolio li a:hover,
.mk-portfolio-classic-item .portfolio-categories a,
.register-login-links a:hover,
#mk-language-navigation ul li a:hover, 
#mk-language-navigation ul li.current-menu-item > a,
.not-found-subtitle,
.mk-mini-callout a,
.mk-quick-contact-wrapper h4,
.search-loop-meta a,
.new-tab-readmore,
.mk-news-tab .mk-tabs-tabs li.ui-tabs-active a,
.mk-tooltip,
.mk-search-permnalink,
.divider-go-top:hover,
.widget-sub-navigation ul li a:hover,
.mk-toggle-title.active-toggle i,
.mk-accordion-tab.current i,
.monocolor.pricing-table .pricing-price span,
#mk-footer .widget_posts_lists ul li .post-list-meta time,
.mk-footer-tweets .tweet-username,
.quantity .plus:hover,
.quantity .minus:hover,
.mk-woo-tabs .mk-tabs-tabs li.ui-state-active a,
.product .add_to_cart_button i,
.blog-modern-comment:hover, 
.blog-modern-share:hover,
.mk-tabs.simple-style .mk-tabs-tabs li.ui-tabs-active a,
.product-category .item-holder:hover h4
{
	color: {$skin_color} !important;
}

";








#################################################
# Theme Skin Background color
#################################################

$output .= "
.image-hover-overlay,
.newspaper-portfolio,
.single-post-tags a:hover,
.similar-posts-wrapper .post-thumbnail:hover > .overlay-pattern,
.portfolio-logo-section,
.post-list-document .post-type-thumb:hover,
#cboxTitle,
#cboxPrevious,
#cboxNext,
#cboxClose,
.comment-form-button, 
.mk-dropcaps.fancy-style,
.mk-image-overlay,
.pinterest-item-overlay,
.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.widget-portfolio-overlay,
.portfolio-carousel-overlay,
.blog-carousel-overlay,
.mk-classic-comments span,
.mk-similiar-overlay,
.mk-skin-button,
.mk-flex-caption .flex-desc span,
.mk-icon-box .mk-icon-wrapper i:hover,
.mk-quick-contact-link:hover,
.quick-contact-active.mk-quick-contact-link,
.mk-fancy-table th,
.mk-tooltip .tooltip-text,
.mk-tooltip .tooltip-text:after,
.wpcf7-submit,
.ui-slider-handle,
.widget_price_filter .ui-slider-range,
.shop-skin-btn,
#review_form_wrapper input[type=submit],
#mk-nav-search-wrapper form .nav-side-search-icon:hover,
form.ajax-search-complete i,
.blog-modern-btn,
.shoping-cart-link span,
.showcase-blog-overlay,
.gform_button[type=submit],
.button.alt,
#respond #submit,
.woocommerce .price_slider_amount .button.button
{
	background-color: {$skin_color} !important;
}

";








#################################################
# Shortcodes and other elements
#################################################


$output .= "

.mk-testimonial-image img,
.testimonial-author-image,  
.mk-circle-image span
{
	-webkit-box-shadow:0 0 0 1px {$skin_color};
	-moz-box-shadow:0 0 0 1px {$skin_color};
	box-shadow:0 0 0 1px {$skin_color};
}



.mk-blockquote.line-style,
.bypostauthor .comment-content,
.bypostauthor .comment-content:after,
.mk-tabs.simple-style .mk-tabs-tabs li.ui-tabs-active a
{
	border-color: {$skin_color} !important;
}



.news-full-with-image .news-categories span,
.news-half-with-image .news-categories span,
.news-fourth-with-image .news-categories span,
.mk-flex-caption .flex-desc span
{
	box-shadow: 8px 0 0 {$skin_color}, -8px 0 0 {$skin_color};
}



.monocolor.pricing-table .pricing-cols .pricing-col.featured-plan
{
	border:1px solid {$skin_color};
}




.mk-skin-button.three-dimension, .wpcf7-submit
{
	box-shadow: 0px 3px 0px 0px {$skin_darker};
}


.mk-skin-button.three-dimension:active, .wpcf7-submit:active
{
	box-shadow: 0px 1px 0px 0px {$skin_darker};	
}



.mk-footer-copyright, #mk-footer-navigation li a
{
	color: {$mk_options['sub_footer_nav_copy_color']};
}



.mk-woocommerce-main-image img:hover, .mk-single-thumbnails img:hover
{
	border:1px solid {$skin_color} !important;

}



.product-loading-icon
{
	background-color:{$skin_color_60};
}


{$mk_options['custom_css']}

";

$output = preg_replace('/\r|\n|\t/', '', $output);

wp_enqueue_style('theme-dynamic-styles',get_template_directory_uri() . '/custom.css');

wp_add_inline_style( 'theme-dynamic-styles', $output);


}
add_action( 'wp_enqueue_scripts', 'mk_dynamic_css' );
?>