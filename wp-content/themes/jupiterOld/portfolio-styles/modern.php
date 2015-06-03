<?php
function mk_portfolio_modern_loop(&$r, $atts, $current)
{
     global $post;
     extract($atts);
     global $mk_options;
     if ($column > 6) {
          $column = 6;
     }
     switch ($column) {
          case 1:
               if ($layout == 'full') {
                    $width = $mk_options['grid_width'] - 40;
               } else {
                    $width = round(($mk_options['content_width'] / 100) * $mk_options['grid_width']) - 40;
               }
               $column_css = 'portfolio-one-column';
               break;
          case 2:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 2) - 25;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
               }
               $column_css = 'portfolio-two-column';
               break;
          case 3:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 3) - 20;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
               }
               $column_css = 'portfolio-three-column';
               break;
          case 4:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 4) - 15;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
               }
               $column_css = 'portfolio-four-column';
               break;
          case 5:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 5) - 10;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
               }
               $column_css = 'portfolio-five-column';
               break;
          case 6:
               if ($layout == 'full') {
                    $width = round($mk_options['grid_width'] / 6) - 15;
               } else {
                    $width = round((($mk_options['content_width'] / 100) * $mk_options['grid_width']) / 2) - 25;
               }
               $column_css = 'portfolio-six-column';
               break;
     }
     if ($layout == 'full') {
          $layout_class = 'portfolio-full-layout';
     } else {
          $layout_class = 'portfolio-with-sidebar';
     }
     $output     = '';
     $terms      = get_the_terms(get_the_id(), 'portfolio_category');
     $terms_slug = array();
     $terms_name = array();
     if (is_array($terms)) {
          foreach ($terms as $term) {
               $terms_slug[] = $term->slug;
               $terms_name[] = '<span>' . $term->name . '</span>';
          }
     }
     $height    = !empty($height) ? $height : 600;
     $post_type = get_post_meta($post->ID, '_single_post_type', true);
     $post_type = !empty($post_type) ? $post_type : 'image';
     $link_to   = get_post_meta(get_the_ID(), '_portfolio_permalink', true);
     $permalink = '';
     if (!empty($link_to)) {
          $link_array = explode('||', $link_to);
          switch ($link_array[0]) {
               case 'page':
                    $permalink = get_page_link($link_array[1]);
                    break;
               case 'cat':
                    $permalink = get_category_link($link_array[1]);
                    break;
               case 'portfolio':
                    $permalink = get_permalink($link_array[1]);
                    break;
               case 'post':
                    $permalink = get_permalink($link_array[1]);
                    break;
               case 'manually':
                    $permalink = $link_array[1];
                    break;
          }
     }
     if ($ajax == 'true' || empty($permalink)) {
          $permalink = get_permalink();
     }
     $output .= '<article id="' . get_the_ID() . '" class="mk-portfolio-item mk-portfolio-modern-item mk-isotop-item ' . $column_css . ' ' . $layout_class . ' portfolio-' . $post_type . ' ' . implode(' ', $terms_slug) . '"><div class="item-holder"><a class="project-load" data-post-id="' . get_the_ID() . '" href="' . $permalink . '">';
     $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
     $image_src       = bfi_thumb($image_src_array[0], array(
          'width' => $width*$image_quality,
          'height' => $height*$image_quality
     ));
     $output .= '<div class="featured-image">';
     $output .= '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . $image_src . '"  />';
     $output .= '<div class="image-hover-overlay"></div>';
     $output .= '<span class="modern-post-type-icon">';
     if ($post_type == 'image' || $post_type == '') {
          $output .= '<i class="mk-jupiter-icon-plus"></i>';
     } else if ($post_type == 'video') {
          $output .= '<i class="mk-jupiter-icon-video"></i>';
     }
     $output .= '</span>';
     $output .= '<div class="modern-portfolio-meta">';
     $output .= '<h3 class="the-title">' . get_the_title() . '</h3><div class="clearboth"></div>';
     $output .= '<div class="portfolio-categories">' . implode(', ', $terms_name) . ' </div>';
     $output .= '</div>';
     $output .= '</div>';
     $output .= '<div class="clearboth"></div></a></div></article>' . "\n\n\n";
     return $output;
}
add_action('wp_ajax_nopriv_mk_ajax_portfolio', 'mk_ajax_portfolio');
add_action('wp_ajax_mk_ajax_portfolio', 'mk_ajax_portfolio');
function mk_ajax_portfolio()
{
     if (isset($_POST['id']) && !empty($_POST['id'])):
          $output = get_ajax_portfolio_item($_POST['id']);
          die($output);
     else:
          die(0);
     endif;
}
function get_ajax_portfolio_item($id = false)
{
     $image_width = 1140;
     $query       = array();
     global $wp_embed, $mk_options;
     if (empty($id))
          return false;
     $query = array(
          'post_type' => 'portfolio',
          'p' => $id
     );
     $r = new WP_Query($query);
     $html = '';
     if ($r->have_posts()):
          while ($r->have_posts()):
               $r->the_post();
               $the_id                  = get_the_ID();
               $size                    = 'full';
               $current_post['title']   = get_the_title();
               $current_post['content'] = get_the_content();
               $image_height            = $mk_options['Portfolio_single_image_height'];
               $post_type               = get_post_meta($the_id, '_single_post_type', true);
               if ($post_type == '') {
                    $post_type = 'image';
               }
               if ($post_type == 'image') {
                    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                    $image_src       = bfi_thumb($image_src_array[0], array(
                         'width' => $image_width,
                         'height' => $image_height
                    ));
               }
               $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $current_post['content']));
               $html    = "<div id='ajax_project_{$the_id}' class='ajax_project' data-project_id='{$the_id}'>";

               /* Social Share icons */
               if ( $mk_options['single_portfolio_social'] == 'true' ) :
                    $html    .= '<div class="single-social-section portfolio-social-share ajax-portfolio-share">';
                    if ( function_exists( 'mk_love_this' ) ) {
                         ob_start();
                         mk_love_this();
                         $html .= '<div class="mk-love-holder">'.ob_get_contents().'</div>';
                         ob_get_clean();
                    }
                    $html    .= '<div class="blog-share-container">';
                    $html    .= '<div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>';
                    $html    .= '<ul class="single-share-box mk-box-to-trigger">';
                    $html    .= '<li><a class="facebook-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>';
                    $html    .= '<li><a class="twitter-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="mk-jupiter-icon-simple-twitter"></i></a></li>';
                    $html    .= '<li><a class="googleplus-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>';
                    $html    .= '<li><a class="linkedin-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>';
                    if ($post_type == 'image') {
                         $html    .= '<li><a class="pinterest-share" data-image="'.$image_src_array[0].'" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>';
                    }
                    $html    .= '</ul>';
                    $html    .= '</div>';
                    $html    .= '</div>';
               endif;



               $html .= "<div class='project_description'>";
               $html .= "<h2 class='title'>" . get_the_title($the_id) . "</h2>";
               $featured_image = get_post_meta($the_id, '_portfolio_featured_image', true) ? get_post_meta($the_id, '_portfolio_featured_image', true) : 'true';
               if ($featured_image != 'false') {
                    if ($post_type == 'image') {
                         $html .= '<div class="single-featured-image">';
                         $html .= '<a class="mk-lightbox portfolio-modern-lightbox" data-title="' . get_the_title() . '" href="' . $image_src_array[0] . '"><img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . $image_src . '" height="' . $image_height . '" width="' . $image_width . '" /></a>';
                         $html .= '</div>';
                    } elseif ($post_type == 'video') {
                         $video_id   = get_post_meta($the_id, '_single_video_id', true);
                         $video_site = get_post_meta($the_id, '_single_video_site', true);
                         if ($video_site == 'vimeo') {
                              $html .= '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://player.vimeo.com/video/' . $video_id . '?title=0&amp;byline=0&amp;portrait=0&amp;" width="' . $image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                         }
                         if ($video_site == 'youtube') {
                              $html .= '<div class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.youtube.com/embed/' . $video_id . '?showinfo=0" frameborder="0" width="' . $image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                         }
                         if ($video_site == 'dailymotion') {
                              $html .= '<div  class="mk-portfolio-video"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.dailymotion.com/embed/video/' . $video_id . '?logo=0" frameborder="0" width="' . $image_width . '" height="' . $image_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
                         }
                    }
               }
               $html .= $content;
               $html .= "</div>";
               $html .= "</div>";
          endwhile;
     endif;
     wp_reset_query();
     if ($html)
          return $html;
}
