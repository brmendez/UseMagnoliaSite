<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$image_height = 884;
$image_width = 884;

?>
<div class="images mk-single-images">

	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', true );
			$image = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height, 'crop' => false));

			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="mk-woocommerce-main-image mk-lightbox" title="%s" ><img height="'.$image_height.'" width="'.$image_width.'" src="'.$image.'" alt="'.$image_title.'" itemprop="image" /></a>', $image_link, $image_title), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
