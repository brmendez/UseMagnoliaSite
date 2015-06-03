<?php
extract(shortcode_atts(array(
    "images" => '',
    'title' => '',
    'collection_title' => '',
    "height" => 500,
    "column" => 4,
    "el_class" => '',
    'disable_title' => 'false',
    'custom_links' => '',
    'frame_style' => '',
    'orderby' => 'menu_order',
    'image_quality' => 1,
    'order' => 'ASC',
    'pagination' => 'false',
    'pagination_style' => 3,
    'count' => 10,
), $atts));
if ($images == '')
    return null;
$id = mt_rand(99, 9999);
global $mk_options;
$layout = $output = $lightbox_push_top = $paginaton_style_class = '';
if (is_singular()) {
    global $post;
    $layout = get_post_meta($post->ID, '_layout', true);
}
switch ($column) {
    case 1:
        if ($layout == 'full') {
            $width = $mk_options['grid_width'] - 40;
        } else {
            $width = round(($mk_options['content_width'] / 100) * $mk_options['grid_width']) - 40;
        }
        $column_css = 'gallery-one-column';
        break;
    case 2:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 2) - 36;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 36;
        }
        $column_css = 'gallery-two-column';
        break;
    case 3:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 3) - 30;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 3) - 29;
        }
        $column_css = 'gallery-three-column';
        break;
    case 4:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 4) - 26;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 4) - 26;
        }
        $column_css = 'gallery-four-column';
        break;
    case 5:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 5) - 24;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 5) - 24;
        }
        $column_css = 'gallery-five-column';
        break;
    case 6:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 6) - 24;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 6) - 24;
        }
        $column_css = 'gallery-six-column';
        break;
    case 7:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 7) - 22;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 7) - 22;
        }
        $column_css = 'gallery-seven-column';
        break;
    case 8:
        if ($layout == 'full') {
            $width = round($mk_options['grid_width'] / 8) - 14;
        } else {
            $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 8) - 13;
        }
        $column_css = 'gallery-eight-column';
        break;
}
if($pagination == 'true') {
	if ($pagination_style == '2') {
	     $paginaton_style_class = 'load-button-style';
	} else if ($pagination_style == '3') {
	     $paginaton_style_class = 'scroll-load-style';
	} else {
	     $paginaton_style_class = 'page-nav-style';
	}
} else {
	$count = -1;
}

$custom_links = explode(',', $custom_links);
$i            = -1;
$query        = array(
    'posts_per_page' => (int) $count,
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'post_status' => 'inherit',
);
if ($images) {
    $query['post__in'] = explode(',', $images);
}
if ($orderby) {
    $query['orderby'] = $orderby;
}
if ($order) {
    $query['order'] = $order;
}
$paged          = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$query['paged'] = $paged;
$r              = new WP_Query($query);
if (!empty($title)) {
    $output .= '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>' . $title . '</span></h3>';
}
$output .= '<div class="loop-main-wrapper"><section id="gallery-loop-'.$id.'" data-style="gallery" class="mk-gallery-shortcode mk-theme-loop ' . $paginaton_style_class . ' ' . $el_class . '">';
if ($r->have_posts()):
    while ($r->have_posts()):
        $r->the_post();

       $i++;
        $image_title     = get_the_title();
        $alt             = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
        $image_title     = $collection_title ? $collection_title : $image_title;
        $image_src_array = wp_get_attachment_image_src($post->ID, 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' => $width * $image_quality,
            'height' => $height * $image_quality
        ));
        $output .= '<article class="' . $column_css . ' mk-isotop-item mk-gallery-item ' . $frame_style . '-frame"><div class="item-holder">';
        $output .= '<div class="image-hover-overlay"></div>';
        if ($disable_title != 'false' && !empty($image_title)) {
            $output .= '<div class="gallery-title">' . $image_title . '</div>';
            $lightbox_push_top = 'lightbox-push-top';
        }
        if (isset($custom_links[$i]) && $custom_links[$i] != '') {
            $output .= '<a href="' . $custom_links[$i] . '" class="mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus"></i></a>';
        } else {
            $output .= '<a href="' . $image_src_array[0] . '" alt="' . $alt . '" data-title="' . $title . '" class="gallery-group-' . $id . ' gallery-lightbox ' . $lightbox_push_top . ' mk-image-shortcode-lightbox"><i class="mk-jupiter-icon-plus"></i></a>';
        }
        $output .= '<span class="gallery-inner"><img alt="' . $alt . '" title="' . $title . '" src="' . $image_src . '" /></span>';
        $output .= '</div></article>' . "\n\n";
    endwhile;
endif;
$output .= '<div class="clearboth"></div></section>';
$output .= '<a class="mk-loadmore-button" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
if ($pagination == 'true') {
    ob_start();
    mk_theme_blog_pagenavi('', '', $r, $paged);
    $output .= ob_get_clean();
}
$output .= '</div>';
wp_reset_postdata();
echo $output;

