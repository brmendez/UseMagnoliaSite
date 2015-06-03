<?php

function mk_theme_enqueue_scripts() {
	if ( !is_admin() && !( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) )) {
		global $mk_options;

		$output = '';

		$theme_data = wp_get_theme("Jupiter");




		wp_enqueue_script( 'jquery-iLightbox', THEME_JS .'/ilightbox.packed.js', array( 'jquery' ), $theme_data['Version'], true );
		
		remove_action( 'bbp_enqueue_scripts' , 'enqueue_styles' );

		/* Register Scripts */
		wp_register_script( 'jquery-jplayer', THEME_JS .'/jquery.jplayer.min.js', array( 'jquery' ), $theme_data['Version'], true );
		wp_register_script( 'jquery-icarousel', THEME_JS .'/icarousel.packed.js', array( 'jquery' ), $theme_data['Version'], true );
		wp_register_script( 'jquery-raphael', THEME_JS .'/jquery.raphael-min.js', array( 'jquery' ), $theme_data['Version'], true );
		wp_register_script( 'instafeed', THEME_JS .'/instafeed.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'skrollr', THEME_JS .'/min/skrollr-ck.js', array( 'jquery' ), $theme_data['Version'], true );



		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );

		}

		
		if($mk_options['disable_smoothscroll'] == 'true') {
			wp_enqueue_script( 'SmoothScroll-min', THEME_JS .'/min/SmoothScroll-ck.js', array( 'jquery' ), $theme_data['Version'], true );
		}

		if($mk_options['minify-js'] == 'true') {
            wp_enqueue_script( 'theme-vendors-min', THEME_JS .'/min/vendors-ck.js', array( 'jquery' ), $theme_data['Version'], true );
            wp_enqueue_script( 'theme-scripts-min', THEME_JS .'/min/theme-scripts-ck.js', array( 'jquery' ), $theme_data['Version'], true );    
        } else {
            wp_enqueue_script( 'theme-vendors', THEME_JS .'/vendors.js', array( 'jquery' ), $theme_data['Version'], true );
            wp_enqueue_script( 'theme-scripts', THEME_JS .'/theme-scripts.js', array( 'jquery' ), $theme_data['Version'], true );    
        }


		wp_enqueue_style( 'font-awesome', THEME_STYLES.'/font-awesome.css', false, $theme_data['Version'], 'all' );
		wp_enqueue_style( 'icomoon-fonts', THEME_STYLES.'/icomoon-fonts.css', false, $theme_data['Version'], 'all' );
		wp_enqueue_style( 'theme-icons', THEME_STYLES.'/theme-icons.css', false, $theme_data['Version'], 'all' );
		wp_enqueue_style( 'theme-styles', THEME_STYLES.'/theme-styles.css', false, $theme_data['Version'], 'all' );



		if ( is_rtl() ) {
			wp_enqueue_style(  'style-rtl', THEME_STYLES.'/rtl.css', false, $theme_data['Version'], 'all' );
		}

		if ( $mk_options['special_fonts_type_1'] == 'google' && !empty( $mk_options['special_fonts_list_1'] ) ) {
			$subset_1 = !empty($mk_options['google_font_subset_1']) ? ('&subset='.$mk_options['google_font_subset_1']) : '';
			wp_enqueue_style( 'google-font-api-special-1', 'http'.((is_ssl())? 's' : '').'://fonts.googleapis.com/css?family=' .$mk_options['special_fonts_list_1'].$subset_1 , false, false, 'all' );
		}


		if ( $mk_options['special_fonts_type_2'] == 'google' && !empty( $mk_options['special_fonts_list_2'] ) ) {
			$subset_2 = !empty($mk_options['google_font_subset_2']) ? ('&subset='.$mk_options['google_font_subset_2']) : '';
			wp_enqueue_style( 'google-font-api-special-2', 'http'.((is_ssl())? 's' : '').'://fonts.googleapis.com/css?family=' .$mk_options['special_fonts_list_2'].$subset_2  , false, false, 'all' );

		}

		wp_enqueue_style(  'css-iLightbox', THEME_DIR_URI.'/stylesheet/i-lightbox/ilightbox-style.css', false, $theme_data['Version'], 'all' );


	}
}
add_action( 'wp_enqueue_scripts', 'mk_theme_enqueue_scripts', 10 );




function mk_enqueue_styles() {
	global $post;


	if ( is_single() || is_page() ) {
		$enable_noti_bar = get_post_meta( $post->ID, 'enable_noti_bar', true );
		$local_backgrounds = get_post_meta( $post->ID, '_enable_local_backgrounds', true );


		if ( $local_backgrounds == 'true' ) {
			$body_bg  = get_post_meta( $post->ID, 'body_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'body_color', true ).' !important;' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'body_image', true ) . ') !important;' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'body_repeat', true ).' !important;' : '' ;
			$body_bg .= get_post_meta( $post->ID, 'body_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'body_position', true ).';' : '';
			$body_bg .= get_post_meta( $post->ID, 'body_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'body_attachment', true ).' !important;' : '';



			$header_bg  = get_post_meta( $post->ID, 'header_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'header_color', true ).' !important;' : '';
			$header_bg .= get_post_meta( $post->ID, 'header_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'header_image', true ) . ') !important;' : 'background-image:none !important;';
			$header_bg .= get_post_meta( $post->ID, 'header_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'header_repeat', true ).' !important;' : '' ;
			$header_bg .= get_post_meta( $post->ID, 'header_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'header_position', true ).';' : '';
			$header_bg .= get_post_meta( $post->ID, 'header_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'header_attachment', true ).' !important;' : '';


			$banner_bg  = get_post_meta( $post->ID, 'banner_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'banner_color', true ).' !important;' : '';
			$banner_bg .= get_post_meta( $post->ID, 'banner_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'banner_image', true ) . ') !important;' : 'background-image:none !important;';
			$banner_bg .= get_post_meta( $post->ID, 'banner_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'banner_repeat', true ).' !important;' : '' ;
			$banner_bg .= get_post_meta( $post->ID, 'banner_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'banner_position', true ).';' : '';
			$banner_bg .= get_post_meta( $post->ID, 'banner_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'banner_attachment', true ).' !important;' : '';


			$page_bg  = get_post_meta( $post->ID, 'page_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'page_color', true ).' !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'page_image', true ) . ') !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'page_repeat', true ).' !important;' : '' ;
			$page_bg .= get_post_meta( $post->ID, 'page_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'page_position', true ).' !important;' : '';
			$page_bg .= get_post_meta( $post->ID, 'page_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'page_attachment', true ).' !important;' : '';


			$footer_bg  = get_post_meta( $post->ID, 'footer_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'footer_color', true ).' !important;' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'footer_image', true ) . ') !important;' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'footer_repeat', true ).' !important;' : '' ;
			$footer_bg .= get_post_meta( $post->ID, 'footer_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'footer_position', true ).';' : '';
			$footer_bg .= get_post_meta( $post->ID, 'footer_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'footer_attachment', true ).' !important;' : '';




			$page_title = get_post_meta( $post->ID, '_page_title_color', true ) ? 'color:'.get_post_meta( $post->ID, '_page_title_color', true ).' !important;' : '';
			$page_subtitle = get_post_meta( $post->ID, '_page_subtitle_color', true ) ? 'color:'.get_post_meta( $post->ID, '_page_subtitle_color', true ).' !important;' : '';
			$banner_border = get_post_meta( $post->ID, '_banner_border_color', true ) ? 'border-bottom:1px solid '.get_post_meta( $post->ID, '_banner_border_color', true ).' !important;' : '';






			echo '<style type="text/css" media="screen">' . "\n";
			echo 'body {'. $body_bg. "}\n";
			echo '.mk-header-bg {'.$header_bg. "}\n";
			echo '#mk-header {' . $banner_bg. $banner_border . "}\n";
			echo '#theme-page{'.$page_bg. "}\n";
			echo '#mk-footer {'. $footer_bg. "}\n";
			echo '.page-introduce-title {'. $page_title. "}\n";
			echo '.page-introduce-subtitle {'. $page_subtitle. "}\n";


			$boxed_layout_shadow_size = get_post_meta( $post->ID, 'boxed_layout_shadow_size', true );
			$boxed_layout_shadow_intensity = get_post_meta( $post->ID, 'boxed_layout_shadow_intensity', true );
			if ( $boxed_layout_shadow_size > 0 ) {
				echo '#mk-boxed-layout {
		  -webkit-box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;
		  -moz-box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;
		  box-shadow: 0 0 '.$boxed_layout_shadow_size.'px rgba(0, 0, 0, '.$boxed_layout_shadow_intensity.') !important;

		}';
			}
			echo'</style>' . "\n";

		}

		if ( $enable_noti_bar == 'true' ) {
			$notifi_bg  = get_post_meta( $post->ID, 'noti_bg_color', true ) ? 'background-color: ' .get_post_meta( $post->ID, 'noti_bg_color', true ).' !important;' : '';
			if ( get_post_meta( $post->ID, 'noti_bg_image_source', true ) == 'preset' ) {
				$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_preset_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'noti_bg_preset_image', true ) . ') !important;' : ' ';
			} else if ( get_post_meta( $post->ID, 'noti_bg_image_source', true ) == 'custom' ) {
					$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_custom_image', true ) ? 'background-image:url(' . get_post_meta( $post->ID, 'noti_bg_custom_image', true ) . ') !important;' : ' ';
				}
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_repeat', true ) ? 'background-repeat:'.get_post_meta( $post->ID, 'noti_bg_repeat', true ).' !important;' : '' ;
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_position', true ) ? 'background-position:'.get_post_meta( $post->ID, 'noti_bg_position', true ).' !important;' : '';
			$notifi_bg .= get_post_meta( $post->ID, 'noti_bg_attachment', true ) ? 'background-attachment:'.get_post_meta( $post->ID, 'noti_bg_attachment', true ).' !important;' : '';

			echo '<style type="text/css" media="screen">' . "\n";
			echo '#mk-notification-bar {'.$notifi_bg."}\n";
			echo '.mk-noti-message {color:'.get_post_meta( $post->ID, 'noti_message_color', true )."}\n";
			echo '.mk-noti-more {color:'.get_post_meta( $post->ID, 'noti_more_color', true )."}\n";
			echo'</style>' . "\n";
		}




	}
}
add_action( 'wp_head', 'mk_enqueue_styles');
