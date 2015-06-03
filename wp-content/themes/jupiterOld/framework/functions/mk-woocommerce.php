<?php

global $woocommerce, $mk_options;


/*
* Check if Woocommerce plugin is enabled.
*/
function mk_woocommerce_enabled() {
	if ( class_exists( 'woocommerce' ) ) { return true; }
	return false;
}

if ( !mk_woocommerce_enabled() ) { return false; }
/******************/


/*
* Declares support to woocommerce
*/
add_theme_support( 'woocommerce' );
/******************/



/*
* Overrides woocommerce styles and scripts modified and created by theme
*/
function mk_woocommerce_assets() {
	$theme_data = wp_get_theme("Jupiter");
	wp_enqueue_style( 'woocommerce', THEME_STYLES.'/woocommerce.css', false, $theme_data['Version'], 'all'  );
}

add_filter( 'woocommerce_enqueue_styles', 'mk_woocommerce_assets' );
/******************/


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action( 'woocommerce_before_main_content', 'mk_woocommerce_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'mk_woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	

function mk_woocommerce_output_content_wrapper() {
	global $post, $mk_options;
	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	} else {
		if(is_single()) {
			$page_layout = $mk_options['woocommerce_single_layout'];
		} 
		else if(is_page()) {
			$page_layout = get_post_meta($post->ID, '_layout', true);
		} else {
			$page_layout=$mk_options['woocommerce_layout'];
		}
	}
	


?>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout  mk-grid row-fluid">
		<div class="theme-content">
<?php
}





function mk_woocommerce_output_content_wrapper_end() {
	global $post, $mk_options;
	if(isset($_REQUEST['layout']) && !empty($_REQUEST['layout'])) {
		$page_layout = $_REQUEST['layout'];
	} else {
		if(is_single()) {
		$page_layout = $mk_options['woocommerce_single_layout'];
		} 
		else if(is_page()) {
			$page_layout = get_post_meta($post->ID, '_layout', true);
		} else {
			$page_layout=$mk_options['woocommerce_layout'];
		}
	}

	
?>
		</div>
	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>
<?php
}




add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
if ( ! function_exists( 'woocommerce_header_add_to_cart_fragment' ) ) { 
    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;
        
        ob_start();
        
        ?>
     <a class="shoping-cart-link" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="mk-custom-moon-cart"><span><?php echo $woocommerce->cart->cart_contents_count; ?></span></i></a>
        <?php
        
        $fragments['a.shoping-cart-link'] = ob_get_clean();
        
        return $fragments;
        
    }
}
