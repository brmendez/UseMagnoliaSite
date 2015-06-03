<?php
/**
 * Add_action hooks for header toolbar elements.
 *
 * @author  Bob Ulusoy
 * @copyright Copyright (c) Bob Ulusoy
 * @link  http://artbees.net
 * @since  Version 3.5
 * @package  MK Framework
 */



add_action( 'header_toolbar_date', 'mk_header_toolbar_date' );
add_action( 'header_toolbar_menu', 'mk_header_toolbar_menu' );
add_action( 'header_toolbar_contact', 'mk_header_toolbar_contact' );
add_action( 'header_toolbar_social', 'mk_header_toolbar_social' );
add_action( 'header_toolbar_tagline', 'mk_header_toolbar_tagline' );
add_action( 'header_toolbar_login', 'mk_header_toolbar_login' );
add_action( 'header_toolbar_checkout', 'mk_header_toolbar_checkout');
add_action( 'header_toolbar_subscribe', 'mk_header_toolbar_subscribe' );
add_action( 'header_checkout', 'mk_header_checkout' );
add_action( 'header_search', 'mk_header_search' );
//add_action( 'notification_bar', 'mk_notification_bar' );

add_action( 'header_banner_video', 'mk_header_banner_video' );
add_action( 'start_tour_link', 'mk_start_tour_link' );
add_action( 'header_logo', 'mk_header_logo' );
add_action( 'header_main_navigation', 'mk_header_main_navigation' );
add_action( 'responsive_search', 'mk_responsive_search' );




/**
 */
if ( !function_exists( 'mk_header_toolbar_date' ) ) {
	function mk_header_toolbar_date() {
		global $mk_options;

		if ( $mk_options['enable_header_date'] == 'true' ) {
			echo '<span class="mk-header-date"><i class="mk-moon-clock"></i>'.date_i18n( "F j, Y" ).'</span>';
		}

	}
}

/***************************************/








/**
 */
if ( !function_exists( 'mk_header_toolbar_menu' ) ) {
	function mk_header_toolbar_menu() {

		$output =  wp_nav_menu( array(
				'theme_location' => 'toolbar-menu',
				'container' => 'nav',
				'container_id' => 'mk-toolbar-navigation',
				'container_class' => 'mk_toolbar_menu',
				'fallback_cb' => '',
			) );
		echo $output;

	}
}

/***************************************/









/**
 */
if ( !function_exists( 'mk_header_toolbar_contact' ) ) {
	function mk_header_toolbar_contact() {
		global $mk_options;

		if ( !empty( $mk_options['header_toolbar_phone'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="mk-moon-phone-3"></i>'.stripslashes( $mk_options['header_toolbar_phone'] ).'</span>';
		}
		if ( !empty( $mk_options['header_toolbar_email'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="mk-moon-envelop"></i><a href="mailto:'.antispambot( $mk_options['header_toolbar_email'] ).'">'.antispambot( $mk_options['header_toolbar_email'] ).'</a></span>';
		}

	}
}

/***************************************/










/**
 */
if ( !function_exists( 'mk_header_toolbar_social' ) ) {
	function mk_header_toolbar_social() {

		global $mk_options;

		if ( $mk_options['disable_header_social_networks'] == 'false' ) {
			return false;
		}
		switch ( $mk_options['header_social_networks_style'] ) {
		case 'rounded' :
			$icon_style = 'mk-jupiter-icon-square-';
			break;
		case 'simple' :
			$icon_style = 'mk-jupiter-icon-simple-';
			break;
		case 'circle' :
			$icon_style = 'mk-jupiter-icon-';
			break;

		default :
			$icon_style = 'mk-jupiter-icon-';
		}
		$names = explode( ",", $mk_options['header_social_networks_site'] );
		$urls = explode( ",", $mk_options['header_social_networks_url'] );

		$output = '';
		if ( strlen( implode( '', $urls ) ) != 0 ) {
			$output = '<div id="mk-header-social">';
			$output .= '<ul>';
			foreach (array_combine( $urls, $names )  as  $url => $name ) {
				$output .= '<li><a class="'.$name.'-hover" target="_blank" href="'.$url.'"><i class="'.$icon_style.$name.'" alt="'.$name.'" title="'.$name.'"></i></a></li>';
			}
			$output .= '</ul>';

			$output .= '<div class="clearboth"></div></div>';
		}

		echo $output;

	}
}

/***************************************/












/**
 */
if ( !function_exists( 'mk_header_toolbar_tagline' ) ) {
	function mk_header_toolbar_tagline() {

		global $mk_options;

		if(!empty($mk_options['header_toolbar_tagline']))

		echo '<span class="mk-header-tagline">'.stripslashes( $mk_options['header_toolbar_tagline'] ).'</span>';

	}
}

/***************************************/









/**
 */
if ( !function_exists( 'mk_header_toolbar_login' ) ) {
	function mk_header_toolbar_login() {
		global $wp,
		$mk_options;

	if($mk_options['header_toolbar_login'] != 'true') return false;

		
		$current_url = home_url( $wp->request ) ;
		if ( is_user_logged_in() ) {
			global $current_user;
			get_currentuserinfo();
?>
			<div class="mk-header-login">
    		<a href="#" id="mk-header-login-button" class="mk-login-link mk-toggle-trigger"><i class="mk-moon-user-8"></i><?php echo $current_user->display_name; ?></a>
    		<div class="mk-login-register mk-box-to-trigger user-profile-box">
    			<?php
			$user_ID = get_current_user_id();
			echo get_avatar( $user_ID, 48 ); ?>
    			<a href="<?php echo get_edit_user_link(); ?>"><?php _e( 'Edit Profile', 'mk_framework' ); ?></a>
    			<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout"><?php _e( 'Logout', 'mk_framework' ); ?></a>
    		</div>
    		</div>
		<?php } else {
?>
	<div class="mk-header-login">
    <a href="#" id="mk-header-login-button" class="mk-login-link mk-toggle-trigger"><i class="mk-moon-user-8"></i><?php _e( 'Login', 'mk_framework' ); ?></a>
	<div class="mk-login-register mk-box-to-trigger">

		<div id="mk-login-panel">
				<form id="mk_login_form" name="mk_login_form" method="post" class="mk-login-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>">
					<span class="form-section">
					<label for="log"><?php _e( 'Username', 'mk_framework' ); ?></label>
					<input type="text" id="username" name="log" class="text-input">
					</span>
					<span class="form-section">
						<label for="pwd"><?php _e( 'Password', 'mk_framework' ); ?></label>
						<input type="password" id="password" name="pwd" class="text-input">
					</span>
					<?php do_action( 'login_form' );?>
					<label class="mk-login-remember">
						<input type="checkbox" name="rememberme" id="rememberme" value="forever"><?php _e( " Remember Me", 'mk_framework' );?>
					</label>

					<input type="submit" id="login" name="submit_button" class="shop-flat-btn shop-skin-btn" value="<?php _e( "LOG IN", 'mk_framework' );?>">
					<input type="hidden" value="login" class="" name="mk_form_action">
					<input type="hidden" value="mk_do_action" class="" name="action">
					<input type="hidden" value="<?php echo $current_url; ?>" class="mk_login_redirect" name="submit">
					<div class="register-login-links">
							<a href="#" class="mk-forget-password"><?php _e( "Forget?", 'mk_framework' );?></a>
						<?php if ( get_option( 'users_can_register' ) ) { ?>
							<a href="#" class="mk-create-account"><?php _e( "Register", 'mk_framework' );?></a>
						<?php } ?>
					</div>
				</form>
		</div>

		<?php if ( get_option( 'users_can_register' ) ) { ?>
			<div id="mk-register-panel">
					<div class="mk-login-title"><?php _e( "Create Account", 'mk_framework' );?></div>

					<form id="register_form" name="login_form" method="post" class="mk-form-regsiter" action="<?php echo site_url( 'wp-login.php?action=register', 'login_post' ) ?>">
						<span class="form-section">
							<label for="log"><?php _e( 'Username', 'mk_framework' ); ?></label>
							<input type="text" id="reg-username" name="user_login" class="text-input">
						</span>
						<span class="form-section">
							<label for="user_email"><?php _e( 'Your email', 'mk_framework' ); ?></label>
							<input type="text" id="reg-email" name="user_email" class="text-input">
						</span>
						<span class="form-section">
							<input type="submit" id="signup" name="submit" class="shop-flat-btn shop-skin-btn" value="<?php _e( "Create Account", 'mk_framework' );?>">
						</span>
						<?php do_action( 'register_form' ); ?>
						<input type="hidden" name="user-cookie" value="1" />
						<input type="hidden" name="redirect_to" value="<?php echo $current_url; ?>?register=true" />
						<div class="register-login-links">
							<a class="mk-return-login" href="#"><?php _e( "Already have an account?", 'mk_framework' );?></a>
						</div>
					</form>
			</div>
		<?php } ?>

		<div id="mk-forget-panel">
				<span class="mk-login-title"><?php _e( "Forget your password?", 'mk_framework' );?></span>
				<form id="forgot_form" name="login_form" method="post" class="mk-forget-password-form" action="<?php echo site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ?>">
					<span class="form-section">
							<label for="user_login"><?php _e( 'Username or E-mail', 'mk_framework' ); ?></label>
						<input type="text" id="forgot-email" name="user_login" class="text-input">
					</span>
					<span class="form-section">
						<input type="submit" id="recover" name="submit" class="shop-flat-btn shop-skin-btn" value="<?php _e( "Get New Password", 'mk_framework' );?>">
					</span>
					<div class="register-login-links">
						<a class="mk-return-login" href="#"><?php _e( "Remember Password?", 'mk_framework' );?></a>
					</div>
				</form>

		</div>
	</div>
</div>
<?php
		}

	}
}

/***************************************/









/**
 */
if ( !function_exists( 'mk_header_toolbar_subscribe' ) ) {
	function mk_header_toolbar_subscribe() {
		global $mk_options;

		if ( $mk_options['header_toolbar_subscribe'] != 'true' ) return false;

		?>	<div class="mk-header-signup">
        <a href="#" id="mk-header-subscribe-button" class="mk-subscribe-link mk-toggle-trigger"><i class="mk-moon-envelop"></i><?php _e( 'Subscribe', 'mk_framework' ); ?></a>
        <div id="mk-header-subscribe" class="mk-box-to-trigger">
			<form action="<?php echo $mk_options['mailchimp_action_url']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<label for="mce-EMAIL"><?php _e( 'Subscribe to newsletter', 'mk_framework' ); ?></label>
				<input type="email" value="" name="EMAIL" class="email text-input" id="mce-EMAIL" placeholder="<?php _e( 'Email Address', 'mk_framework' ); ?>" required>
				<input type="submit" value="<?php _e( 'Subscribe', 'mk_framework' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="shop-flat-btn shop-skin-btn">
			</form>
		</div>
      </div> <?php

	}
}

/***************************************/












/**
 */
if ( !function_exists( 'mk_header_search' ) ) {
	function mk_header_search($location) {
		global $mk_options;

		if($mk_options['header_search_location'] == $location)

		echo '<div id="mk-header-search">
		      <form class="mk-header-searchform" method="get" id="mk-header-searchform" action="'.home_url().'">
		        <span>
		        <input type="text" class="text-input on-close-state" value="" name="s" id="s" placeholder="'.__( 'Search..', 'mk_framework' ).'" />
		        <i class="mk-icon-search"><input value="" type="submit" class="header-search-btn" /></i>
		        </span>
		    </form>
   		 </div>';


	}
}

/***************************************/





/**
 */
if ( !function_exists( 'mk_responsive_search' ) ) {
	function mk_responsive_search() {

		echo '<form class="responsive-searchform" method="get" style="display:none;" action="'.home_url().'">
			        <input type="text" class="text-input" value="" name="s" id="s" placeholder="'.__( 'Search..', 'mk_framework' ).'" />
			        <i class="mk-icon-search"><input value="" type="submit" /></i>
			 </form>';


	}
}

/***************************************/



 




/**
 */
if ( !function_exists( 'mk_header_checkout' ) ) {
function mk_header_checkout($location) {

	global $woocommerce,
	$mk_options;

	if ( !$woocommerce || is_cart() || is_checkout() || $mk_options['woocommerce_catalog'] == 'true') { return false; }

		if(class_exists('Woocommerce') && $mk_options['header_checkout_woocommerce'] == 'true' && $mk_options['shopping_cart_location'] == 'header') :

?>

					<div class="shopping-cart-header">
								<a class="shoping-cart-link" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
									<i class="mk-custom-moon-cart"><span><?php echo $woocommerce->cart->cart_contents_count; ?></span></i>
								</a>	
						<div class="mk-shopping-cart-box">			
							<?php the_widget( 'WC_Widget_Cart', 'title= ' ); ?>
							<div class="clearboth"></div>
						</div>
					</div>
		<?php 
		endif;	
	}
}

/***************************************/







/**
 */
if ( !function_exists( 'mk_header_toolbar_checkout' ) ) {
function mk_header_toolbar_checkout() {
	global $woocommerce,
	$mk_options;

	if ( !$woocommerce || is_cart() || is_checkout() ) { return false; }

		if(class_exists('Woocommerce') && $mk_options['header_checkout_woocommerce'] == 'true' && $mk_options['shopping_cart_location'] == 'toolbar') :

			?>

					<div class="mk-header-checkout">
			      		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'woothemes' ); ?>" id="mk-header-checkout-btn" class="mk-checkout-btn">
			      			<i class="mk-custom-moon-cart"></i><?php _e( 'Checkout', 'mk_framework' ); ?>
			      		</a>
						<div id="mk-header-checkout">
							<?php the_widget( 'WC_Widget_Cart', 'title= ' ); ?>
						</div>
					</div>


<?php
		endif;	
	}
}

/***************************************/







/*
if ( !function_exists( 'mk_notification_bar' ) ) {
	function mk_notification_bar( $post_id = NULL ) {

		if(empty($post_id)) return false;

		$more_txt =  get_post_meta( $post_id, 'noti_more_text', true );
		$cookie_name =  get_post_meta( $post_id, 'noti_coockie_name', true );
		if ( get_post_meta( $post_id, 'enable_noti_bar', true ) != 'true' ) {
			return false;
		}

?>

	<div id="mk-notification-bar">
			<span class="mk-noti-message"><?php echo  get_post_meta( $post_id, 'noti_message', true ); ?></span>
			<?php if ( $more_txt ) : ?>
				<a class="mk-noti-more" href="<?php echo get_post_meta( $post_id, 'noti_more_url', true ); ?>"><?php echo $more_txt ?></a>
			<?php endif; ?>
			<a href="#" id="mk-bar-close"><i class="mk-icon-remove"></i></a>
		<div class="clearboth"></div>
	</div>

	<script type="text/javascript">
	    jQuery(document).ready(function() {
	      jQuery('#mk-notification-bar').cookieBar({
	      	closeButton: '#mk-bar-close',
	      	cookieName : "<?php echo $cookie_name; ?>"
	      });
	    });
	</script>
	<?php


	}
}	
 */
/***************************************/









/**
 */
if ( !function_exists( 'mk_header_banner_video' ) ) {
	function mk_header_banner_video($post_id = NULL) {

		if(empty($post_id)) return false;

		$enable = get_post_meta( $post_id, '_enable_banner_video', true );

		if ( empty( $enable ) || $enable == 'false' ) { return false;}


		$color_overlay = get_post_meta( $post_id, '_banner_video_color_overlay', true );
		$video_pattern = get_post_meta( $post_id, '_banner_video_pattern', true );
		$video_preview = get_post_meta( $post_id, '_banner_video_preview', true );
		$webm = get_post_meta( $post_id, '_banner_video_webm', true );
		$mp4 = get_post_meta( $post_id, '_banner_video_mp4', true );
		$ogv = get_post_meta( $post_id, '_banner_video_ogv', true );

		$output = '';


		if ( $video_pattern == 'true' ) {
			$output .= '<div class="mk-video-mask"></div>';
		}
		if ( !empty( $color_overlay ) ) {
			$output .= '<div style="background-color:'.$color_overlay.'" class="mk-video-color-mask"></div>';
		}
		if(!empty($video_preview)) {
			$output .= '<div style="background-image:url('.$video_preview.');" class="mk-video-section-touch"></div>';	
		}
		
		$output .= '<div class="mk-section-video"><video poster="'.$video_preview.'" muted="muted" preload="auto" loop="true" autoplay="true">';

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

		echo $output;

	}
}
/***************************************/





/**
 */
if ( !function_exists( 'mk_start_tour_link' ) ) {
	function mk_start_tour_link() {
		global $mk_options;
		$link_to = isset($mk_options['header_start_tour_page']) ? $mk_options['header_start_tour_page'] : '';
		$link  = '';
		if ( !empty( $link_to )) {
			$link_array = explode( '||', $link_to );
			switch ( $link_array[ 0 ] ) {
			case 'page':
				$link = get_page_link( $link_array[ 1 ] );
				break;
			case 'cat':
				$link = get_category_link( $link_array[ 1 ] );
				break;
			case 'portfolio':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'post':
				$link = get_permalink( $link_array[ 1 ] );
				break;
			case 'manually':
				$link = $link_array[ 1 ];
				break;
			}
		}
		if ( !empty( $mk_options['header_start_tour_text'] ) ) {
			echo '<a href="'.$link.'" class="mk-header-start-tour">'.$mk_options['header_start_tour_text'].'<i class="mk-icon-caret-right"></i></a>';
		}
	}
}













/**
 */
if ( !function_exists( 'mk_header_logo' ) ) {
	function mk_header_logo() {
		global $mk_options;

		if ( !empty( $mk_options['logo'] ) ) {

			$is_repsonive_logo = !empty($mk_options['responsive_logo']) ? 'logo-is-responsive' : '';

		?>
		<div class="header-logo <?php echo $is_repsonive_logo; ?> <?php echo $mk_options['logo_position'];?>-logo">
		    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>">
				
				<img class="mk-desktop-logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['logo']; ?>" />
				

				<?php if($mk_options['responsive_logo']) { ?>
				<img class="mk-resposnive-logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $mk_options['responsive_logo']; ?>" />
				<?php } ?>
				
			</a>
		</div>

		<?php } else { ?>
		<div class="header-logo <?php echo $mk_options['logo_position'];?>-logo">
		    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo THEME_IMAGES; ?>/jupiter-logo.png" /></a>
		</div>
		<?php }

	}
}

/***************************************/














/**
 */
if ( !function_exists( 'mk_header_main_navigation' ) ) {
	function mk_header_main_navigation($arg) {
		global $mk_options, $post;
		extract($arg);
		$output = $main_nav ='';
		$single_menu_location = get_post_meta( $post->ID, '_menu_location', true );

		if(is_singular() && isset($single_menu_location) && !empty($single_menu_location)) {
			
			$menu_location = $single_menu_location;
			
		} else {
			
			if(is_user_logged_in() && !empty($mk_options['loggedin_menu'])) {
				$menu_location = $mk_options['loggedin_menu'];	
			} else {
				$menu_location = 'primary-menu';	
			}
			
		}

		

		$search_form = '<div class="main-nav-side-search">
						<a class="mk-search-trigger mk-toggle-trigger" href="#"><i class="mk-icon-search"></i></a>
							<div id="mk-nav-search-wrapper" class="mk-box-to-trigger">
							      <form method="get" id="mk-header-navside-searchform" action="'.home_url().'">
							        <input type="text" value="" name="s" id="mk-ajax-search-input" />
							        <i class="mk-moon-search-3 nav-side-search-icon"><input value="" type="submit" /></i>
							    </form>
					  		</div>
					</div>';

	
	if($style == 'modern' && $nav_location == 'modern') :
			
  			echo '<div class="mk-header-nav-container modern-style">';
  			echo wp_nav_menu( array(
					'theme_location' => $menu_location,
					'container' => 'nav',
					'container_id' => 'mk-main-navigation',
					'container_class' => 'main_menu',
					'menu_class' => 'main-navigation-ul',
					'fallback_cb' => '',
					'walker' => new mk_artbees_walker
				) );
  		
   		if($search_location == 'beside_nav' || $search_location == 'beside_nav_no_ajax') {
   			echo $search_form;
   		}

		echo '</div>';		

  	elseif($style == 'classic' && $nav_location == 'classic') :

  		echo '<div class="mk-header-nav-container">
  						<div class="mk-classic-nav-bg"></div>
  						<div class="mk-classic-menu-wrapper">';
  
    	echo wp_nav_menu( array(
					'theme_location' => $menu_location,
					'container' => 'nav',
					'container_id' => 'mk-main-navigation',
					'container_class' => 'main_menu',
					'menu_class' => 'main-navigation-ul',
					'fallback_cb' => '',
					'walker' => new mk_artbees_walker
				) );

    	if($search_location == 'beside_nav') {
   			echo $search_form;
   		}

   		echo '</div></div>';
  	endif;

  
	}
}

/***************************************/













