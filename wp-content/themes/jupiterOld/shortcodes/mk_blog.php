<?php
extract(shortcode_atts(array(
     'style' => 'classic',
     'column' => 3,
     'disable_meta' => 'true',
     'full_content' => 'false',
     'disable_lightbox' => 'true',
     'grid_image_height' => 350,
     'count' => 8,
     'offset' => 0,
     'cat' => '',
     'posts' => '',
     'author' => '',
     'disable_comments_share' => '',
     'pagination' => 'true',
     'pagination_style' => '2',
     'orderby' => 'date',
     'order' => 'DESC',
     'el_class' => ''
), $atts));
global $mk_options;
$query = array(
     'posts_per_page' => (int) $count,
     'post_type' => 'post'
);
if ($offset) {
     $query['offset'] = $offset;
}
if ($cat) {
     $query['cat'] = $cat;
}
if ($author) {
     $query['author'] = $author;
}
if ($posts) {
     $query['post__in'] = explode(',', $posts);
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
if (is_page()) {
     global $post;
     $layout = get_post_meta($post->ID, '_layout', true);
} else if (is_search()) {
     $layout = $mk_options['search_page_layout'];
} else if (is_archive()) {
     $layout = $mk_options['archive_page_layout'];
} else {
     $layout = 'right';
}
$grid_width    = $mk_options['grid_width'];
$content_width = $mk_options['content_width'];
$atts          = array(
     'layout' => $layout,
     'column' => $column,
     'grid_image_height' => $grid_image_height,
     'disable_meta' => $disable_meta,
     'disable_comments_share' => $disable_comments_share,
     'disable_lightbox' => $disable_lightbox,
     'grid_width' => $grid_width,
     'content_width' => $content_width,
     'full_content' => $full_content
);
$output        = '';
wp_enqueue_script('jquery-jplayer');
if ($pagination_style == '2') {
     $paginaton_style_class = 'load-button-style';
} else if ($pagination_style == '3') {
     $paginaton_style_class = 'scroll-load-style';
} else {
     $paginaton_style_class = 'page-nav-style';
}
$output .= '<div class="loop-main-wrapper"><section data-style="blog-' . $style . '" class="mk-blog-container mk-theme-loop mk-' . $style . '-wrapper ' . $paginaton_style_class . ' ' . $el_class . '" >' . "\n";
if (is_archive()):
     if (have_posts()):
          while (have_posts()):
               the_post();
               switch ($style) {
                    case 'classic':
                         $output .= blog_classic_style($atts, 1);
                         break;
                    case 'newspaper':
                         $output .= blog_newspaper_style($atts, 1);
                         break;
                    case 'grid':
                         $output .= blog_grid_style($atts, 1);
                         break;
                    case 'modern':
                         $output .= blog_modern_style($atts, 1);
                         break;
                    default:
                         $output .= blog_grid_style($atts, 1);
               }
          endwhile;
     endif;
else:
     if ($r->have_posts()):
          while ($r->have_posts()):
               $r->the_post();
               switch ($style) {
                    case 'classic':
                         $output .= blog_classic_style($atts, 1);
                         break;
                    case 'newspaper':
                         $output .= blog_newspaper_style($atts, 1);
                         break;
                    case 'grid':
                         $output .= blog_grid_style($atts, 1);
                         break;
                    case 'modern':
                         $output .= blog_modern_style($atts, 1);
                         break;
                    default:
                         $output .= blog_grid_style($atts, 1);
               }
          endwhile;
     endif;
endif;
$output .= '</section>' . "\n\n";
$output .= '<a class="mk-loadmore-button" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
if ($pagination == 'true') {
     ob_start();
     mk_theme_blog_pagenavi('', '', $r, $paged);
     $output .= ob_get_clean();
}
$output .= '</div>';
wp_reset_postdata();
echo $output;
