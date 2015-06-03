<?php



/*
 * Convert theme settings to a globaly accessible vaiable throught the theme.
 */
if (!function_exists('mk_theme_options')) {
     function mk_theme_options()
     {
          $GLOBALS['mk_options'] = get_option(THEME_OPTIONS);

          if(empty($GLOBALS['mk_options'])) {
            $theme_options = array();   
            $page = include(THEME_ADMIN . "/admin-panel/masterkey.php");
            $theme_options[$page['name']] = array();
            foreach ($page['options'] as $option) {
                if (isset($option['default'])) {
                    $theme_options[$page['name']][$option['id']] = $option['default'];
                }
            }

            $theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option($page['name']));

            $GLOBALS['mk_options'] = $theme_options[$page['name']];      
          }

     }
}

add_action('init', 'mk_theme_options');
/*-----------------*/



/*
 * Adds Schema.org tags
 */
if (!function_exists('mk_html_tag_schema')) {
      function mk_html_tag_schema()
      {
            $schema = 'http://schema.org/';
            if (is_single()) {
                  $type = "Article";
            } elseif (is_author()) {
                  $type = 'ProfilePage';
            } elseif (is_search()) {
                  $type = 'SearchResultsPage';
            } else {
                  $type = 'WebPage';
            }
            
            echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
      }
}
/*-----------------*/



/* removes Contactform 7 styles */
remove_action('wp_enqueue_scripts', 'wpcf7_enqueue_styles');


// Register your custom function to override some LayerSlider data
add_action('layerslider_ready', 'my_layerslider_overrides');
function my_layerslider_overrides() {

    // Disable auto-updates
    $GLOBALS['lsAutoUpdateBox'] = false;
}


/*
Adds debugging information to front-end
*/
function mk_theme_debugging_info()
{
     $theme_data = wp_get_theme(); 
    echo '<meta name="generator" content="'.wp_get_theme().' '.$theme_data['Version'].'" />'. "\n";
     
}
add_action('wp_head', 'mk_theme_debugging_info');



/*
Removes version paramerters from scripts and styles.
*/
function mk_remove_wp_ver_css_js($src)
{
     global $mk_options;
     if ($mk_options['remove-js-css-ver'] == 'false') {
          if (strpos($src, 'ver='))
               $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter('style_loader_src', 'mk_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'mk_remove_wp_ver_css_js', 9999);


/**
 * Content Width Calculator
 *
 * Retrieves the content width based on $grid-width
 *
 * @param string  $layout param
 */
if (!function_exists('mk_content_width')) {
     function mk_content_width($layout = 'full')
     {
          
          global $mk_options;
          
          if ($layout == 'full') {
               
               return $mk_options['grid_width'] - 40;
          } else {
               
               return round(($mk_options['content_width'] / 100) * $mk_options['grid_width'] - 40);
          }
     }
}
/*-----------------*/





/**
 * Retrieves Portfolio Categories
 *
 * @param string  $id   current post ID
 * @param string  $link to return link or text.
 */

if (!function_exists('mk_get_portfolio_tax')) {
     function mk_get_portfolio_tax($id, $link = true)
     {
          
          if (empty($id))
               return;
          
          $terms      = get_the_terms($id, 'portfolio_category');
          $terms_slug = array();
          $terms_name = array();
          if (is_array($terms) && !empty($terms)) {
               if ($link == true) {
                    foreach ($terms as $term) {
                         $terms_name[] = '<a href="' . get_term_link($term->slug, 'portfolio_category') . '">' . $term->name . '</a>';
                    }
               } else {
                    foreach ($terms as $term) {
                         $terms_name[] = $term->name;
                    }
               }
               return $terms_name;
          }
          return array();
     }
}
/*-----------------*/







if (!function_exists('mk_shortcode_empty_paragraph_fix')) {
     function mk_shortcode_empty_paragraph_fix($content)
     {
          $array = array(
               '<p>[' => '[',
               ']</p>' => ']',
               ']<br />' => ']'
          );
          
          $content = strtr($content, $array);
          
          return $content;
     }
}

/* Safe way to remove autop tags inside shortcodes without touching wordpress filters and default behaviors. */
add_filter('the_content', 'mk_shortcode_empty_paragraph_fix');
/*-----------------*/






if (!function_exists('mk_add_ajax_library')) {
     function mk_add_ajax_library()
     {
          $html = '<script type="text/javascript">';
          $html .= 'var ajaxurl = "' . admin_url('admin-ajax.php') . '"';
          $html .= '</script>';
          echo $html;
     }
}

add_action('wp_enqueue_scripts', 'mk_add_ajax_library');
/*-----------------*/






if (!function_exists('mk_under_construction')) {
     function mk_under_construction()
     {
          global $mk_options;
          
          if ($mk_options['enable_uc'] == 'true' && !is_user_logged_in() && !is_admin() && basename($_SERVER['PHP_SELF']) != 'wp-login.php') {
               get_template_part('under-construction');
               exit();
          }
          
     }
}

add_action('init', 'mk_under_construction', 26);
/*-----------------*/








function mk_get_attachment_id_from_url($attachment_url = '')
{
     
     global $wpdb;
     $attachment_id = false;
     
     // If there is no url, return.
     if ('' == $attachment_url)
          return;
     
     // Get the upload directory paths
     $upload_dir_paths = wp_upload_dir();
     
     // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
     if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {
          
          // If this is the URL of an auto-generated thumbnail, get the URL of the original image
          $attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
          
          // Remove the upload path base directory from the attachment URL
          $attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);
          
          // Finally, run a custom database query to get the attachment ID from the modified attachment URL
          $attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
          
     }
     
     return $attachment_id;
}
/*-----------------*/







if (!function_exists('mk_flush_rules')) {
     function mk_flush_rules()
     {
          if (get_option('mk_jupiter_flush_rules')) {
               global $wp_rewrite;
               $wp_rewrite->flush_rules();
               delete_option('mk_jupiter_flush_rules');
          }
          
     }
     
     add_action('wp_loaded', 'mk_flush_rules');
}
/*-----------------*/




/*
 * Contact Form ajax function
 */

add_action('wp_ajax_nopriv_mk_contact_form', 'mk_contact_form');
add_action('wp_ajax_mk_contact_form', 'mk_contact_form');


function mk_contact_form()
{
     $sitename = get_bloginfo('name');
     $siteurl  = home_url();
     
     $to      = isset($_POST['to']) ? trim($_POST['to']) : '';
     $name    = isset($_POST['name']) ? trim($_POST['name']) : '';
     $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
     $email   = isset($_POST['email']) ? trim($_POST['email']) : '';
     $content = isset($_POST['content']) ? trim($_POST['content']) : '';
     
     
     $error = false;
     if ($to === '' || $email === '' || $content === '' || $name === '') {
          $error = true;
     }
     if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
          $error = true;
     }
     if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $to)) {
          $error = true;
     }
     
     if ($error == false) {
          $subject = sprintf(__('%1$s\'s message from %2$s', 'mk_framework'), $sitename, $name);
          $body    = __('Site: ', 'mk_framework') . $sitename . ' (' . $siteurl . ')' . "\n\n";
          $body .= __('Name: ', 'mk_framework') . $name . "\n\n";
          if (!empty($phone)) {
               $body .= __('Phone Number: ', 'mk_framework') . $phone . "\n\n";
          }
          $body .= __('Email: ', 'mk_framework') . $email . "\n\n";
          $body .= __('Messages: ', 'mk_framework') . $content;
          $headers = "From: $name <$email>\r\n";
          $headers .= "Reply-To: $email\r\n";
          
          
          if (wp_mail($to, $subject, $body, $headers)) {
               echo 'Message sent successfully';
          } else {
               echo 'Message Could not be sent';
          }
          die();
     }
}
/*-----------------*/






/*
 * Converts Hex value to RGBA if needed.
 */
if (!function_exists('mk_color')) {
     function mk_color($colour, $alpha)
     {
          if (!empty($colour)) {
               if ($alpha >= 0.95) {
                    return $colour; // If alpha is equal 1 no need to convert to RGBA, so we are ok with it. :)
               } else {
                    if ($colour[0] == '#') {
                         $colour = substr($colour, 1);
                    }
                    if (strlen($colour) == 6) {
                         list($r, $g, $b) = array(
                              $colour[0] . $colour[1],
                              $colour[2] . $colour[3],
                              $colour[4] . $colour[5]
                         );
                    } elseif (strlen($colour) == 3) {
                         list($r, $g, $b) = array(
                              $colour[0] . $colour[0],
                              $colour[1] . $colour[1],
                              $colour[2] . $colour[2]
                         );
                    } else {
                         return false;
                    }
                    $r      = hexdec($r);
                    $g      = hexdec($g);
                    $b      = hexdec($b);
                    $output = array(
                         'red' => $r,
                         'green' => $g,
                         'blue' => $b
                    );
                    
                    return 'rgba(' . implode($output, ',') . ',' . $alpha . ')';
               }
          }
     }
}
/*-----------------*/











if (!function_exists('mk_ago')) {
     function mk_ago($time)
     {
          $periods = array(
               "second",
               "minute",
               "hour",
               "day",
               "week",
               "month",
               "year",
               "decade"
          );
          $lengths = array(
               "60",
               "60",
               "24",
               "7",
               "4.35",
               "12",
               "10"
          );
          
          $now = time();
          
          $difference = $now - $time;
          $tense      = "ago";
          
          for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
               $difference /= $lengths[$j];
          }
          
          $difference = round($difference);
          
          if ($difference != 1) {
               $periods[$j] .= "s";
          }
          
          return "$difference $periods[$j] ago ";
     }
}
/*-----------------*/










if (!function_exists('hexDarker')) {
     function hexDarker($hex, $factor = 30)
     {
          $new_hex = '';
          if ($hex == '' || $factor == '') {
               return false;
          }
          
          $hex = str_replace('#', '', $hex);
          
          $base['R'] = hexdec($hex{0} . $hex{1});
          $base['G'] = hexdec($hex{2} . $hex{3});
          $base['B'] = hexdec($hex{4} . $hex{5});
          
          
          foreach ($base as $k => $v) {
               $amount      = $v / 100;
               $amount      = round($amount * $factor);
               $new_decimal = $v - $amount;
               
               $new_hex_component = dechex($new_decimal);
               if (strlen($new_hex_component) < 2) {
                    $new_hex_component = "0" . $new_hex_component;
               }
               $new_hex .= $new_hex_component;
          }
          
          return '#' . $new_hex;
     }
}
/*-----------------*/








if (!function_exists('mk_get_skin_color')) {
     function mk_get_skin_color()
     {
          global $mk_options;     
          if (isset($_GET['skin'])) {
               return $_GET['skin'];
               ;
          } else {
               return $mk_options['skin_color'];
          }
     }
}
/*-----------------*/







if (!function_exists('mk_add_admin_bar_link')) {
     function mk_add_admin_bar_link()
     {
          global $wp_admin_bar;
          $theme_data = wp_get_theme();
          if (!is_super_admin() || !is_admin_bar_showing())
               return;
          $wp_admin_bar->add_menu(array(
               'id' => 'masterkey_setrtings',
               'title' => __('Theme Options', 'mk_framework'),
               'href' => admin_url('admin.php?page=masterkey')
          ));
     }
}
add_action('admin_bar_menu', 'mk_add_admin_bar_link', 25);
/*-----------------*/






/*
 * Adds Extra
 */
add_action('show_user_profile', 'mk_show_extra_profile_fields');
add_action('edit_user_profile', 'mk_show_extra_profile_fields');


if (!function_exists('mk_show_extra_profile_fields')) {
     function mk_show_extra_profile_fields($user)
     {
?>

    <h3>User Social Networks</h3>

    <table class="form-table">

        <tr>
            <th><label for="twitter">Twitter</label></th>

            <td>
                <input type="text" name="twitter" id="twitter" value="<?php
          echo esc_attr(get_the_author_meta('twitter', $user->ID));
?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter Profile URL.</span>
            </td>
        </tr>

    </table>
<?php
     }
}


add_action('personal_options_update', 'my_save_extra_profile_fields');
add_action('edit_user_profile_update', 'my_save_extra_profile_fields');


if (!function_exists('my_save_extra_profile_fields')) {
     function my_save_extra_profile_fields($user_id)
     {
          
          if (!current_user_can('edit_user', $user_id))
               return false;
          update_user_meta($user_id, 'twitter', $_POST['twitter']);
     }
}
/*-----------------*/







/*
 * Removes wordpress default excerpt brakets from its endings
 */
if (!function_exists('mk_theme_excerpt_more')) {
     function mk_theme_excerpt_more($excerpt)
     {
          return str_replace('[...]', '', $excerpt);
     }
}
add_filter('wp_trim_excerpt', 'mk_theme_excerpt_more');
/*-----------------*/






/*
 * Gives the text widget capability of inserting shortcode.
 */
if (!function_exists('mk_theme_widget_text_shortcode')) {
     function mk_theme_widget_text_shortcode($content)
     {
          $content          = do_shortcode($content);
          $new_content      = '';
          $pattern_full     = '{(\[raw\].*?\[/raw\])}is';
          $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
          $pieces           = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
          
          foreach ($pieces as $piece) {
               if (preg_match($pattern_contents, $piece, $matches)) {
                    $new_content .= $matches[1];
               } else {
                    $new_content .= do_shortcode($piece);
               }
          }
          
          return $new_content;
     }
}
add_filter('widget_text', 'mk_theme_widget_text_shortcode');
add_filter('widget_text', 'do_shortcode');
/*-----------------*/




/* Blog & Portfolio Pagination */
if (!function_exists('mk_theme_blog_pagenavi')) {
     function mk_theme_blog_pagenavi($before = '', $after = '', $blog_query, $paged)
     {
          global $wpdb, $wp_query;
          
          if (is_single())
               return;
          
          $pagenavi_options = array(
               'pages_text' => '',
               'current_text' => '%PAGE_NUMBER%',
               'page_text' => '%PAGE_NUMBER%',
               'dotright_text' => __('...', 'mk_framework'),
               'dotleft_text' => __('...', 'mk_framework'),
               'num_pages' => 4,
               'always_show' => 0,
               'num_larger_page_numbers' => 3,
               'larger_page_numbers_multiple' => 10,
               'use_pagenavi_css' => 0
          );
          if (is_archive() || is_search()) {
               $request = $wp_query->request;
          } else {
               $request = $blog_query->request;
          }
          
          $posts_per_page = intval(get_query_var('posts_per_page'));
          global $wp_version;
          if ((is_front_page() || is_home()) && version_compare($wp_version, "3.1", '>=')) { //fix wordpress 3.1 paged query
               $paged = (get_query_var('paged')) ? intval(get_query_var('paged')) : intval(get_query_var('page'));
          } else {
               $paged = intval(get_query_var('paged'));
          }
          if (is_archive() || is_search()) {
               $numposts = $wp_query->found_posts;
               $max_page = intval($wp_query->max_num_pages);
          } else {
               $numposts = $blog_query->found_posts;
               $max_page = intval($blog_query->max_num_pages);
          }
          
          
          if (empty($paged) || $paged == 0)
               $paged = 1;
          $pages_to_show         = intval($pagenavi_options['num_pages']);
          $larger_page_to_show   = intval($pagenavi_options['num_larger_page_numbers']);
          $larger_page_multiple  = intval($pagenavi_options['larger_page_numbers_multiple']);
          $pages_to_show_minus_1 = $pages_to_show - 1;
          $half_page_start       = floor($pages_to_show_minus_1 / 2);
          $half_page_end         = ceil($pages_to_show_minus_1 / 2);
          $start_page            = $paged - $half_page_start;
          
          if ($start_page <= 0)
               $start_page = 1;
          
          $end_page = $paged + $half_page_end;
          if (($end_page - $start_page) != $pages_to_show_minus_1) {
               $end_page = $start_page + $pages_to_show_minus_1;
          }
          
          if ($end_page > $max_page) {
               $start_page = $max_page - $pages_to_show_minus_1;
               $end_page   = $max_page;
          }
          
          if ($start_page <= 0)
               $start_page = 1;
          
          $larger_pages_array = array();
          if ($larger_page_multiple)
               for ($i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple)
                    $larger_pages_array[] = $i;
          
          if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
               $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
               $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
               
               echo '<div class="mk-pagination mk-grid">' . "\n";
               echo '<div class="mk-pagination-previous">';
               previous_posts_link('');
               echo '</div>';
               echo '<div class="mk-pagination-inner">';
               if (!empty($pages_text)) {
                    echo '<span class="pages">' . $pages_text . '</span>';
               }
               
               $larger_page_start = 0;
               foreach ($larger_pages_array as $larger_page) {
                    if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                         $larger_page_start++;
                    }
               }
               
               for ($i = $start_page; $i <= $end_page; $i++) {
                    if ($i == $paged) {
                         $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                         echo '<span class="current-page">' . $current_page_text . '</span>';
                    } else {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                    }
               }
               
               $larger_page_end = 0;
               foreach ($larger_pages_array as $larger_page) {
                    if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
                         $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
                         echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page-number" title="' . $page_text . '">' . $page_text . '</a>';
                         $larger_page_end++;
                    }
               }
               
               echo '</div>';
               echo '<div class="mk-pagination-next">';
               next_posts_link('', $max_page);
               echo '</div>';
               echo '<div class="mk-total-pages">' . __('page', 'mk_framework') . ' ' . $current_page_text . ' of ' . $max_page . '</div>';
               echo '</div>' . $after . "\n";
               
          }
     }
}
