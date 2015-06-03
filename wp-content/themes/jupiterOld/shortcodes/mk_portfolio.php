<?php
extract(shortcode_atts(array(
     'style' => 'classic',
     'column' => 3,
     'count' => 10,
     'disable_excerpt' => 'true',
     'disable_permalink' => 'true',
     "sortable" => 'true',
     'pagination' => 'true',
     'pagination_style' => '1',
     'height' => '',
     'cat' => '',
     'author' => '',
     'posts' => '',
     'offset' => 0,
     'order' => 'DESC',
     'orderby' => 'date',
     'ajax' => 'true',
     'target' => '_self',
     'el_class' => '',
     'image_quality' => 1
), $atts));
global $mk_options;
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
$query = array(
     'post_type' => 'portfolio',
     'posts_per_page' => (int) $count,
     'paged' => $paged
);
if ($offset) {
     $query['offset'] = $offset;
}
if ($cat != '') {
     $query['tax_query'] = array(
          array(
               'taxonomy' => 'portfolio_category',
               'field' => 'slug',
               'terms' => explode(',', $cat)
          )
     );
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
if ($author) {
     $query['author'] = $author;
}
$r = new WP_Query($query);
if (is_page()) {
     global $post;
     $layout = get_post_meta($post->ID, '_layout', true);
} else if (is_search()) {
     $layout = $mk_options['search_page_layout'];
} else if (is_archive()) {
     $layout = $mk_options['archive_page_layout'];
}
$atts                  = array(
     'column' => $column,
     'ajax' => $ajax,
     'layout' => $layout,
     'height' => $height,
     'disable_excerpt' => $disable_excerpt,
     'pagination' => $pagination,
     'target' => $target,
     'disable_permalink' => $disable_permalink,
     'image_quality' => $image_quality
);
$paginaton_style_class = '';
if ($pagination_style == '2') {
     $paginaton_style_class = 'load-button-style';
} else if ($pagination_style == '3') {
     $paginaton_style_class = 'scroll-load-style';
} else {
     $paginaton_style_class = 'page-nav-style';
}
$ajax_state_class = $output = '';
if ($style == 'modern' && $ajax == 'true') {
     $ajax_state_class = 'portfolio-ajax-enabled';
}
$output .= '<div class="portfolio-grid ' . $ajax_state_class . '">';
$id = mt_rand(100, 999);
if ($sortable == 'true' && !is_archive()) {
     $output .= '<header class="mk-grid" id="mk-filter-portfolio"><ul>';
     $terms = array();
     if ($cat != '') {
          foreach (explode(',', $cat) as $term_slug) {
               $terms[] = get_term_by('slug', $term_slug, 'portfolio_category');
          }
     } else {
          $terms = get_terms('portfolio_category', 'hide_empty=1');
          /*
          In order to order category filter by Ascending or Descending change above line as below :
          
          Descending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=DESC' );
          
          Ascending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC' );
          
          Alternatively you can order them by :
          
          * orderby 
          - id
          - count
          - name - Default
          - slug
          - none
          You will need to add this param as below example :
          
          Order by count and ascending :  $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC&orderby=count' );
          
          */
     }
     $output .= '<li><a class="current" data-filter="*" href="#">' . __('All', 'mk_framework') . '</a></li>';
     foreach ($terms as $term) {
          $output .= '<li><a data-filter=".' . $term->slug . '" href="#">' . $term->name . '</a></li>';
     }
     $output .= '<div class="clearboth"></div></ul>';
     $output .= '<div class="clearboth"></div></header>';
}
if ($style == 'modern' && $ajax == 'true') {
     wp_enqueue_script('transit', THEME_JS . '/jquerytransit.js', array(
          'jquery'
     ), '0.9.9');
     $output .= '<div class="portfolio-loader"><div></div></div>';
     if($layout == 'full') {
          $output .= '<div class="ajax-container mk-grid">';
     } else {
          $output .= '<div class="ajax-container">';
     }
     $output .= '<div class="ajax-controls">';
     $output .= '<a href="#" class="close-ajax"><i class="mk-moon-close-2"></i></a>';
     $output .= '<a href="#" class="next-ajax"><i class="mk-moon-arrow-right-3"></i></a>';
     $output .= '<a href="#" class="prev-ajax"><i class="mk-moon-arrow-left-2"></i></a>';
     $output .= '</div></div>';
}
$output .= '<div class="loop-main-wrapper"><section data-style="portfolio-' . $style . '" id="mk-portfolio-loop-' . $id . '" class="mk-portfolio-container mk-theme-loop mk-portfolio-' . $style . ' ' . $paginaton_style_class . ' '.$el_class.'" >' . "\n";
if (is_archive()):
     if (have_posts()):
          while (have_posts()):
               the_post();
               switch ($style) {
                    case 'classic':
                         $output .= mk_portfolio_classic_loop($r, $atts, 1);
                         break;
                    case 'modern':
                         $output .= mk_portfolio_modern_loop($r, $atts, 1);
                         break;
                         $output .= mk_portfolio_classic_loop($r, $atts, 1);
               }
          endwhile;
     endif;
else:
     if ($r->have_posts()):
          while ($r->have_posts()):
               $r->the_post();
               switch ($style) {
                    case 'classic':
                         $output .= mk_portfolio_classic_loop($r, $atts, 1);
                         break;
                    case 'modern':
                         $output .= mk_portfolio_modern_loop($r, $atts, 1);
                         break;
                         $output .= mk_portfolio_classic_loop($r, $atts, 1);
               }
          endwhile;
     endif;
endif;
$output .= '</section><div class="clearboth"></div>' . "\n\n";
$output .= '<a class="mk-loadmore-button" style="display:none;" href="#"><i class="mk-moon-loop-4"></i><i class="mk-moon-arrow-down-4"></i>' . __('Load More', 'mk_framework') . '</a>';
if ($pagination == 'true') {
     ob_start();
     mk_theme_blog_pagenavi('', '', $r, $paged);
     $output .= ob_get_clean();
}
$output .= '</div></div>';
wp_reset_postdata();
echo $output;
