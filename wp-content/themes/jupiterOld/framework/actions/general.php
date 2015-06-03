<?php
/**
 * Add_action hooks for Theme general features
 *
 * @author  Bob Ulusoy
 * @copyright Copyright (c) Bob Ulusoy
 * @link  http://artbees.net
 * @since  Version 3.5
 * @package  MK Framework
 */



add_action( 'page_title', 'mk_page_title' );
add_action( 'theme_breadcrumbs', 'mk_theme_breadcrumbs' );
add_action( 'quick_contact', 'mk_quick_contact' );
//add_action( 'footer_twitter', 'mk_footer_twitter' );
add_action( 'footer_menu', 'mk_footer_menu' );
//add_action( 'header_google_maps', 'mk_header_google_maps' );









/**
 */
if ( !function_exists( 'mk_page_title' ) ) {
	function mk_page_title( $post_id = NULL ) {
		global $post,
		$mk_options;

		if ( is_front_page() && $mk_options['disable_homepage_title'] == 'false' ) {
			return false;
		}

		if ( is_singular( 'product' ) && $mk_options['woocommerce_single_product_title'] == 'false' ) {
			return false;
		}
		if ( function_exists( 'is_woocommerce' ) && is_shop() && $mk_options['woocommerce_shop_title'] == 'false' ) {
			return false;
		}
		if ( function_exists( 'is_woocommerce' ) && is_archive() && $mk_options['woocommerce_archive_title'] == 'false' ) {
			return false;
		}

		if ( is_singular() && ( get_post_meta( $post_id, '_page_disable_title', true ) == 'false' || get_post_meta( $post_id, '_template', true ) == 'no-title' || get_post_meta( $post_id, '_template', true ) == 'no-header-title' || get_post_meta( $post_id, '_template', true ) == 'no-header-title-footer' || get_post_meta( $post_id, '_template', true ) == 'no-footer-title') ) {
			return false;
		}
		if ( (is_singular() && get_post_meta( $post_id, '_enable_slidehsow', true ) == 'true') || is_404() ) {
			return false;
		}



		$align = $title = $subtitle = $shadow_css = '';


		if ( is_singular() ) {
			$custom_page_title = get_post_meta( $post_id, '_custom_page_title', true );
				if ( !empty( $custom_page_title ) ) {
					$title = $custom_page_title;
				} else {
					$title = get_the_title( $post_id );
				}
			$subtitle = get_post_meta( $post_id, '_page_introduce_subtitle', true );
			$align = get_post_meta( $post_id, '_introduce_align', true );

		}


		/* Loads Archive Page Headings */
		if ( is_archive() ) {
			$title = $mk_options['archive_page_title'];
			if ( is_category() ) {
				$subtitle = sprintf( __( 'Category Archive for: "%s"', 'mk_framework' ), single_cat_title( '', false ) );
			}
			elseif ( is_tag() ) {
				$subtitle = sprintf( __( 'Tag Archives for: "%s"', 'mk_framework' ), single_tag_title( '', false ) );
			}
			elseif ( is_day() ) {
				$subtitle = sprintf( __( 'Daily Archive for: "%s"', 'mk_framework' ), get_the_time( 'F jS, Y' ) );
			}
			elseif ( is_month() ) {
				$subtitle = sprintf( __( 'Monthly Archive for: "%s"', 'mk_framework' ), get_the_time( 'F, Y' ) );
			}
			elseif ( is_year() ) {
				$subtitle = sprintf( __( 'Yearly Archive for: "%s"', 'mk_framework' ), get_the_time( 'Y' ) );
			}
			elseif ( is_author() ) {
				if ( get_query_var( 'author_name' ) ) {
					$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
				}
				else {
					$curauth = get_userdata( get_query_var( 'author' ) );
				}
				$subtitle = sprintf( __( 'Author Archive for: "%s"' ), $curauth->nickname );
			}
			elseif ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$subtitle = sprintf( __( 'Archives for: "%s"', 'mk_framework' ), $term->name );
			}
			if ( $mk_options['archive_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}

		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			if ( bbp_is_forum_archive() ) {
				$title = bbp_get_forum_archive_title();

			} elseif ( bbp_is_topic_archive() ) {
				$title = bbp_get_topic_archive_title();

			} elseif ( bbp_is_single_view() ) {
				$title = bbp_get_view_title();
			} elseif ( bbp_is_single_forum() ) {

				$forum_id = get_queried_object_id();
				$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

				//if ( 0 !== $forum_parent_id )
				//$title = breadcrumbs_plus_get_parents( $forum_parent_id );

				$title = bbp_get_forum_title( $forum_id );
			}
			elseif ( bbp_is_single_topic() ) {
				$topic_id = get_queried_object_id();
				$title = bbp_get_topic_title( $topic_id );
			}

			elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

				$title = bbp_get_displayed_user_field( 'display_name' );
			}
		}


		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			ob_start();
			woocommerce_page_title();
			$title = ob_get_clean();
		}



		/* Loads Search Page Headings */
		if ( is_search() ) {
			$title = $mk_options['search_page_title'];
			$allsearch = new WP_Query( "s=".get_search_query()."&showposts=-1" ); $count = $allsearch->post_count; wp_reset_query();
			$subtitle  = $count .' '. sprintf( __( 'Search Results for: "%s"', 'mk_framework' ), stripslashes( strip_tags( get_search_query() ) ) );

			if ( $mk_options['search_disable_subtitle'] == 'false' ) {
				$subtitle = '';
			}

		}
		if ( $mk_options['page_title_shadow'] == 'true' ) {
			$shadow_css = 'mk-drop-shadow';
		}

		$align = !empty( $align ) ? $align : 'left';


		echo '<section id="mk-page-introduce" class="intro-'.$align.'">';
		echo '<div class="mk-grid">';
		if ( !empty( $title )) {
			echo '<h1 class="page-introduce-title '.$shadow_css.'">' . $title . '</h1>';

		}

		if ( !empty( $subtitle ) ) {
			echo '<div class="page-introduce-subtitle">';
			echo $subtitle;
			echo '</div>';
		}
		if ( $mk_options['disable_breadcrumb'] == 'true' ) {
			if ( get_post_meta( $post_id, '_disable_breadcrumb', true ) != 'false' ) {
				do_action( 'theme_breadcrumbs', $post_id );
			}
		}

		echo '<div class="clearboth"></div></div></section>';

	}
}
/***************************************/



/**
 */
if ( !function_exists( 'mk_theme_breadcrumbs' ) ) {
	function mk_theme_breadcrumbs( $post_id = NULL ) {
		global $post,
		$mk_options;




		if ( is_singular() ) {
			$local_skining = get_post_meta( $post->ID, '_enable_local_backgrounds', true );
			$breadcrumb_skin = get_post_meta( $post->ID, '_breadcrumb_skin', true );
			if ( $local_skining == 'true' && !empty( $breadcrumb_skin ) ) {
				$breadcrumb_skin_class = $breadcrumb_skin;
			} else {
				$breadcrumb_skin_class = $mk_options['breadcrumb_skin'];
			}
		} else {
			$breadcrumb_skin_class = $mk_options['breadcrumb_skin'];
		}

		$output = '';
		if ( function_exists( 'mk_breadcrumbs_plus' ) ) {
			$output = mk_breadcrumbs_plus( array(
					'prefix' => '<div class="mk-breadcrumbs-inner '.$breadcrumb_skin_class.'-skin">',
					'suffix' => '</div>',
					'title' => false,
					'home' => __( 'Home', 'mk_framework' ),
					'front_page' => false,
					'bold' => false,
					'blog' => __( 'Blog', 'mk_framework' ),
					'echo' => false,
					'post_id' => $post_id
				) );
		}
		echo $output;
	}
}
/***************************************/











/**
 */
if ( !function_exists( 'mk_quick_contact' ) ) {
	function mk_quick_contact() {
		global $mk_options;

		if ( $mk_options['disable_quick_contact'] != 'true' ) return false;

		$id = mt_rand( 99, 999 );
		$tabindex_1 = $id;
		$tabindex_2 = $id + 1;
		$tabindex_3 = $id + 2;
		$tabindex_4 = $id + 3;
?>
	<div class="mk-quick-contact-wrapper">
		<a href="#" class="mk-quick-contact-link"><i class="mk-icon-envelope"></i></a>
		<div id="mk-quick-contact">
			<div class="mk-quick-contact-title"><?php echo $mk_options['quick_contact_title']; ?></div>
			<p><?php echo $mk_options['quick_contact_desc']; ?></p>
			<form class="mk-contact-form" method="post" novalidate="novalidate">
				<input type="text" placeholder="<?php _e( 'Your Name', 'mk_framework' ); ?>" required="required" id="contact_name" name="contact_name" class="text-input" value="" tabindex="<?php echo $tabindex_1; ?>" />
				<input type="email" required="required" placeholder="<?php _e( 'Your Email', 'mk_framework' ); ?>" id="contact_email" name="contact_email" class="text-input" value="" tabindex="<?php echo $tabindex_2; ?>"  />
				<textarea placeholder="<?php _e( 'Type your message...', 'mk_framework' ); ?>" required="required" id="contact_content" name="contact_content" class="textarea" tabindex="<?php echo $tabindex_3; ?>"></textarea>
	       		<div class="btn-cont"><button type="submit" class="mk-contact-button shop-flat-btn shop-skin-btn" tabindex="<?php echo $tabindex_4; ?>"><?php _e( 'Send', 'mk_framework' ); ?></button></div>
	       		<i class="mk-contact-loading mk-moon-loop-4 mk-icon-spin"></i>
	       		<i class="mk-contact-success mk-icon-ok-sign"></i>
				<input type="hidden" value="<?php echo $mk_options['quick_contact_email']; ?>" name="contact_to"/>
			</form>
			<div class="bottom-arrow"></div>
		</div>
	</div>
	<?php
	}
}
/***************************************/











/*

if ( !function_exists( 'mk_footer_twitter' ) ) {
	function mk_footer_twitter() {
		global $post, $mk_options;
		$output = '';

		$enable = get_post_meta( $post->ID, '_enable_footer_twitter', true );

		if ( empty( $enable ) || $enable == 'false' ) {
			return false;
		}
		$username = get_post_meta( $post->ID, '_footer_twitter_username', true );
		$bg_color = get_post_meta( $post->ID, '_footer_twitter_bg_color', true );
		$skin = get_post_meta( $post->ID, '_footer_twitter_txt_color', true );
		$count = get_post_meta( $post->ID, '_tweet_count', true );
		$consumer_key = $mk_options['twitter_consumer_key'];
		$consumer_secret = $mk_options['twitter_consumer_secret'];
		$access_token = $mk_options['twitter_access_token'];
		$access_token_secret = $mk_options['twitter_access_token_secret'];

		$id = mt_rand( 99, 9999 );




		if ( $username && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count ) {
			$output .= '<div style="background-color:'.$bg_color.'" class="mk-footer-tweets mk-'.$skin.'-skin"><div class="mk-grid">';

			$transName = 'mk_jupiter_footer_tweets';
			$cacheTime = 10;
			delete_transient( $transName );
			if ( false === ( $twitterData = get_transient( $transName ) ) ) {
				// require the twitter auth class
				@require_once THEME_WIDGETS . '/twitteroauth/twitteroauth.php';
				$twitterConnection = new TwitterOAuth(
					$consumer_key, // Consumer Key
					$consumer_secret,    // Consumer secret
					$access_token,       // Access token
					$access_token_secret     // Access token secret
				);
				$twitterData = $twitterConnection->get(
					'statuses/user_timeline',
					array(
						'screen_name'     => $username,
						'count'           => $count,
						'exclude_replies' => false
					)
				);
				if ( $twitterConnection->http_code != 200 ) {
					$twitterData = get_transient( $transName );
				}
				set_transient( $transName, $twitterData, 30 * $cacheTime );
			};
			$twitter = get_transient( $transName );
			if ( $twitter && is_array( $twitter ) ) {
				$output .= '<div id="mk_footer_tweets" class="mk-flexslider">';
				$output .= '<ul class="mk-flex-slides">';
				foreach ( $twitter as $tweet ):
					$output .= '<li>';
				$output .= '<span class="tweet-username">@'.$username.'</span>';
				$output .= '<span class="tweet-text">';

				$latestTweet = $tweet->text;
				$latestTweet = preg_replace( '/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet );
				$latestTweet = preg_replace( '/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet );
				$output .= $latestTweet;
				$output .= '</span>';

				$twitterTime = strtotime( $tweet->created_at );
				$timeAgo = mk_ago( $twitterTime );

				$output .= '<span class="tweet-time">'.$timeAgo.'</span></li>';


				endforeach;
				$output .= '</ul>';
				$output .= '</div>';
				$output .= '</div></div>';

			}


			$output .= '<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(window).on("load",function () {
                jQuery("#mk_footer_tweets").flexslider({
                    selector: ".mk-flex-slides > li",
                    slideshow: true,
                    animation: "fade",
                    smoothHeight: false,
                    slideshowSpeed: 5000,
                    animationSpeed: 500,
                    directionNavArrowsLeft : \'<i class="mk-moon-arrow-left-14"></i>\',
    				directionNavArrowsRight : \'<i class="mk-moon-arrow-right-15"></i>\',
                    pauseOnHover: true,
                    controlNav: false,
                    directionNav:false,
                    prevText: "",
                    nextText: ""
                });
            });
        });
        </script>
        <style>

        </style>';
		}
		echo $output;

	}
}
/***************************************/










/**
 */
if ( !function_exists( 'mk_footer_menu' ) ) {
	function mk_footer_menu() {
		wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container' => 'nav',
				'container_id' => 'mk-footer-navigation',
				'container_class' => 'footer_menu',
				'fallback_cb' => '',
			) );
	}
}
/***************************************/


/*

if ( !function_exists( 'mk_header_google_maps' ) ) {
	function mk_header_google_maps( $post_id = NULL ) {
		global $post;
		if ( get_post_meta( $post_id, '_enable_page_gmap', true ) != 'true' ) {
			return false;
		}




		$id = rand( 100, 3000 );

		$latitude = get_post_meta( $post_id, '_page_gmap_latitude', true );
		$longitude = get_post_meta( $post_id, '_page_gmap_longitude', true );
		$zoom = get_post_meta( $post_id, '_page_gmap_zoom', true );
		$panControl = get_post_meta( $post_id, '_enable_panControl', true );
		$zoomControl = get_post_meta( $post_id, '_enable_zoomControl', true );
		$draggable = get_post_meta( $post_id, '_enable_draggable', true );
		$mapTypeControl = get_post_meta( $post_id, '_enable_mapTypeControl', true );
		$scaleControl = get_post_meta( $post_id, '_enable_scaleControl', true );
		$gmap_height = get_post_meta( $post_id, '_gmap_height', true );
		$scrollwheel = get_post_meta( $post_id, '_enable_scrollwheel', true );

		$gmap_disable_coloring = get_post_meta( $post_id, '_disable_coloring', true );
		$gmap_hue = get_post_meta( $post_id, '_gmap_hue', true );
		$gmap_gamma = get_post_meta( $post_id, '_gmap_gamma', true );
		$gmap_saturation = get_post_meta( $post_id, '_gmap_saturation', true );
		$gmap_lightness = get_post_meta( $post_id, '_gmap_lightness', true );


		if ( $zoom < 1 ) {
			$zoom = 1;
		}


?>

	<div id="gmap_page_<?php echo $id;?>" class="mk-header-gmap" style="height:<?php echo $gmap_height; ?>px; width:100%;"></div>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
  var map;
var gmap_marker = <?php echo get_post_meta( $post_id, '_gmap_marker', true ); ?>;
var pin_icon = "<?php echo get_post_meta( $post_id, '_pin_icon', true ); ?>";

if(pin_icon == '') {
	pin_icon = mk_images_dir + '/gmap_pin.png';
}


  var myLatlng = new google.maps.LatLng(<?php echo $latitude;?>, <?php echo $longitude;?>)
      function initialize() {
        var mapOptions = {
          zoom: <?php echo $zoom;?>,
          center: myLatlng,
	      panControl: <?php echo empty( $panControl ) ? 'false' : $panControl;?>,
		  zoomControl: <?php echo empty( $zoomControl ) ? 'false' : $zoomControl?>,
		  mapTypeControl: <?php echo empty( $mapTypeControl ) ? 'false' :  $mapTypeControl;?>,
		  scaleControl: <?php echo empty( $scaleControl ) ? 'false' : $scaleControl;?>,
		  draggable : <?php echo empty( $draggable ) ? 'false' : $draggable;?>,
		  scrollwheel : <?php echo empty( $scrollwheel ) ? 'false' : $scrollwheel;?>,
	      mapTypeId: google.maps.MapTypeId.ROADMAP,
	      <?php if ( $gmap_disable_coloring == "true" ) { ?>
	      styles: [ { stylers: [
	      			 {hue: "<?php echo $gmap_hue; ?>"},
	      			 {saturation : <?php echo $gmap_saturation; ?> },
				     {lightness: <?php echo $gmap_lightness; ?> },
				     {gamma: <?php echo $gmap_gamma; ?> },
	      			 { featureType: "landscape.man_made", stylers: [ { visibility: "on" } ] }
	      		]
				} ]
		<?php } ?>
        };
        map = new google.maps.Map(document.getElementById('gmap_page_<?php echo $id;?>'), mapOptions);


if(gmap_marker == true) {
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: pin_icon,
        });
}

      }
 		google.maps.event.addDomListener(window, 'load', initialize);
			});
			</script>

			<div class="clearboth"></div>
	<?php

	}
}
 */

