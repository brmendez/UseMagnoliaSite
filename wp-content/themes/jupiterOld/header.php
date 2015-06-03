<!DOCTYPE html>
<html <?php mk_html_tag_schema(); ?> xmlns="http<?php echo (is_ssl())? 's' : ''; ?>://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php  
global $mk_options;
?>            
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title itemprop="name">
        <?php
           if ( defined('WPSEO_VERSION') ) {
            wp_title('');
             } else {
             bloginfo('name'); ?> <?php wp_title(' - ', true);
          }
        ?>
        </title>
        <?php if ( $mk_options['custom_favicon'] ) : ?>
          <link rel="shortcut icon" href="<?php echo $mk_options['custom_favicon']; ?>"  />
        <?php else : ?>
        <link rel="shortcut icon" href="<?php echo THEME_IMAGES; ?>/favicon.png"  />
        <?php endif; ?>
        <?php if($mk_options['iphone_icon']): ?>
        <link rel="apple-touch-icon-precomposed" href="<?php echo $mk_options['iphone_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['iphone_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $mk_options['iphone_icon_retina']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $mk_options['ipad_icon']; ?>">
        <?php endif; ?>
        <?php if($mk_options['ipad_icon_retina']): ?>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $mk_options['ipad_icon_retina']; ?>">
        <?php endif; ?>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url');?>">
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url');?>">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">

         <!--[if lt IE 9]>
         <script src="<?php echo THEME_JS;?>/html5shiv.js" type="text/javascript"></script>
         <![endif]-->
         <!--[if IE 7 ]>
               <link href="<?php echo THEME_STYLES;?>/ie7.css" media="screen" rel="stylesheet" type="text/css" />
               <![endif]-->
         <!--[if IE 8 ]>
               <link href="<?php echo THEME_STYLES;?>/ie8.css" media="screen" rel="stylesheet" type="text/css" />
         <![endif]-->

         <!--[if lte IE 8]>
            <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/respond.js"></script>
         <![endif]-->

         <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

         <script type="text/javascript">
         var mk_header_parallax, mk_banner_parallax, mk_page_parallax, mk_footer_parallax, mk_body_parallax;
          var mk_images_dir = "<?php echo THEME_IMAGES; ?>",
          mk_theme_js_path = "<?php echo THEME_JS;  ?>",
          mk_responsive_nav_width = <?php echo $mk_options['responsive_nav_width']; ?>,
          mk_grid_width = <?php echo $mk_options['grid_width'] ?>,
          mk_header_sticky = <?php echo $mk_options['enable_sticky_header']; ?>,
          mk_ajax_search_option = "<?php echo $mk_options['header_search_location']; ?>";
          <?php if(is_singular()) : ?>
          var mk_header_parallax = <?php echo get_post_meta( $post->ID, 'header_parallax', true ) ? get_post_meta( $post->ID, 'header_parallax', true ) : "false" ?>,
          mk_banner_parallax = <?php echo get_post_meta( $post->ID, 'banner_parallax', true ) ? get_post_meta( $post->ID, 'banner_parallax', true ) : "false"; ?>,
          mk_page_parallax = <?php echo get_post_meta( $post->ID, 'page_parallax', true ) ? get_post_meta( $post->ID, 'page_parallax', true ) : "false"; ?>,
          mk_footer_parallax = <?php echo get_post_meta( $post->ID, 'footer_parallax', true ) ? get_post_meta( $post->ID, 'footer_parallax', true ) : "false"; ?>,
          mk_body_parallax = <?php echo get_post_meta( $post->ID, 'body_parallax', true ) ? get_post_meta( $post->ID, 'body_parallax', true ) : "false"; ?>,
          mk_no_more_posts = "<?php echo _e('No More Posts', 'mk_framework'); ?>";
          <?php endif; ?>
          
          function is_touch_device() {
              return ('ontouchstart' in document.documentElement);
          }
          
         </script>
    <?php wp_head(); ?>
    </head>
<?php

global $post;


$mk_body_class[] = $mk_banner_class = $mk_header_class = $show_header_old = $show_header = '';

if(is_singular()) {
  $show_header_old = get_post_meta( $post->ID, '_header', true );
  $show_header = get_post_meta( $post->ID, '_template', true );
}

if ( ($mk_options['background_selector_orientation'] == 'boxed_layout') && !(is_singular() && get_post_meta( $post->ID, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post->ID, 'background_selector_orientation', true ) == 'full_width_layout')) { 
   
    $mk_body_class[] = 'mk-boxed-enabled';

} else if(is_singular() && get_post_meta( $post->ID, '_enable_local_backgrounds', true ) == 'true' && get_post_meta( $post->ID, 'background_selector_orientation', true ) == 'boxed_layout') {
  
   $mk_body_class[] = 'mk-boxed-enabled';

}


if($mk_options['body_size'] == 'true') {
  $mk_body_class[] = 'mk-background-stretch';

}

$mk_body_class[] = 'main-nav-align-'.$mk_options['main_menu_align'];

$header_grid_start = ($mk_options['header_grid'] == 'true') ? '<div class="mk-grid header-grid">' : '';
$header_grid_end = ($mk_options['header_grid'] == 'true') ? '</div>' : '';


?>

<body <?php body_class($mk_body_class); ?>>

<div id="mk-boxed-layout">
<?php
if($mk_options['banner_size'] == 'true') {
  $mk_banner_class = ' mk-background-stretch';
}  
 ?>
<header id="mk-header" data-height="<?php echo $mk_options['header_height']; ?>" data-sticky-height="<?php echo $mk_options['header_scroll_height']; ?>" class="<?php echo $mk_options['main_nav_style']; ?>-style-nav<?php echo $mk_banner_class; ?> mk-video-holder">


<?php 

if(is_page()){

  //do_action('notification_bar', $post->ID); removed!

  do_action('header_banner_video', $post->ID);

}


 
/************************************************************
  Header Toolbar
*************************************************************/
if($mk_options['disable_header_toolbar'] == 'true' && $show_header_old != 'false' && $show_header != 'no-header' && $show_header != 'no-header-title' && $show_header != 'no-header-title-footer' && $show_header != 'no-header-footer') : ?>
    <div class="mk-header-toolbar">
      
      <?php 
        echo $header_grid_start;

        // do_action('header_toolbar_menu');

        // do_action('header_toolbar_date'); 

        // do_action('header_toolbar_contact'); 

        // do_action('header_toolbar_tagline'); 

        // do_action('theme_wpml_language_switch');    

        // do_action('header_search', 'toolbar'); 

        // do_action('header_toolbar_social');

        // do_action('header_toolbar_login');

        // do_action('header_toolbar_subscribe');

        // do_action('header_toolbar_checkout');

        echo $header_grid_end;
       ?>
    <div class="clearboth"></div>
  </div>
<?php endif;
/************************************************************
  End Of Header Toolbar
*************************************************************/
?>






<?php
  if($mk_options['header_size'] == 'true') {
      $mk_header_class = ' mk-background-stretch';
  }  
 ?>


<?php /* Header Inner */ 

if($show_header_old != 'false' && $show_header != 'no-header' && $show_header != 'no-header-title' && $show_header != 'no-header-title-footer' && $show_header != 'no-header-footer') : 

?>
<div class="mk-header-inner">

  <?php /* Header background */ ?>
  <div class="mk-header-bg <?php echo $mk_header_class; ?>"></div>
  <?php if($mk_options['disable_header_toolbar'] == 'true') { ?>
    <div class="mk-toolbar-resposnive-icon"><i class="mk-icon-chevron-down"></i></div>
  <?php } ?>  

    <?php echo $header_grid_start; ?>




  <?php 
  $modern_nav_args = array(
      'style' => $mk_options['main_nav_style'],
      'search_location' => $mk_options['header_search_location'],
      'nav_location' => 'modern'
    );
  do_action('header_main_navigation',$modern_nav_args , 10, 1); 
  ?>

<?php if($mk_options['main_nav_style'] == 'classic') : echo $header_grid_end; endif; ?>

  <div class="mk-nav-responsive-link"><i class="mk-moon-menu-3"></i></div>
  
  <?php do_action('header_logo'); ?>


  <div class="clearboth"></div>




  <?php

  $classic_nav_args = array(
      'style' => $mk_options['main_nav_style'],
      'search_location' => $mk_options['header_search_location'],
      'nav_location' => 'classic'
    );
  do_action('header_main_navigation',$classic_nav_args , 10, 1); 
  ?>



<?php if($mk_options['main_nav_style'] == 'modern') : echo $header_grid_end; endif; ?>

<?php /* Header right section elements */ ?>
  <div class="mk-header-right">
  
  <?php 
    do_action('header_checkout');  

    do_action('start_tour_link');

    do_action('header_search', 'header'); 
  ?>

  </div>
  <?php /* End of header right section */ ?>

</div>

  <div class="clearboth"></div>
<?php /* End of Header Inner */ ?>





<div class="mk-header-padding-wrapper"></div>
<?php endif; // End for option disable header ?>

<div class="clearboth"></div>

<div class="mk-zindex-fix">    

<?php

if(is_singular()) {

  //do_action('header_google_maps',$post->ID); removed!

  do_action('theme_slideshow',$post->ID);

  do_action('page_title',$post->ID);

} else {

  do_action('page_title');

}

?>
</div>

<div class="clearboth"></div>

<?php 
/* Will be inside responsive Navigation */
if($show_header_old != 'false' && $show_header != 'no-header' && $show_header != 'no-header-title' && $show_header != 'no-header-title-footer' && $show_header != 'no-header-footer') { do_action('responsive_search'); } ?>


</header>