<!DOCTYPE html>
<html xmlns="http<?php echo (is_ssl())? 's' : ''; ?>://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<?php  
global $mk_options;
?>            
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>
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

<body>
<div class="mk-uc-header">
<?php if($mk_options['uc_logo'] != '') : ?>
<div class="mk-uc-header-logo">
    <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php echo $mk_options['uc_logo'];?>" /></a>
</div>
<?php endif; ?>
</div>
<div class="mk-uc-wrapper">
<span class="mk-uc-title"><?php echo $mk_options['uc_title'];?></span>
<span class="mk-uc-subtitle"><?php echo $mk_options['uc_subtitle'];?></span>

<ul id="mk-uc-countdown" class="mk-event-countdown" data-date="<?php echo $mk_options['uc_date']; ?>" data-offset="<?php echo $mk_options['uc_offset']; ?>">
			<li>
				<span class="days timestamp">00</span>
				<span class="timeRef"><?php _e('days', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="hours timestamp">00</span>
				<span class="timeRef"><?php _e('hours', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="minutes timestamp">00</span>
				<span class="timeRef"><?php _e('minutes', 'mk_framework'); ?></span>
			</li>
			<li>
				<span class="seconds timestamp">00</span>
				<span class="timeRef"><?php _e('seconds', 'mk_framework'); ?></span>
			</li>
</ul>


<div class="mk-uc-social-subscribe">

	<ul class="uc-social">
		<?php

			$facebook = $mk_options['uc_facebook'];
			$twitter = $mk_options['uc_twitter'];
			$gplus = $mk_options['uc_gplus'];
			$rss = $mk_options[ 'uc_rss'];
			$mailchimp_action_url = $mk_options['uc_mailchimp_action_url'];

	if($twitter) {
		echo '<li><a class="twitter-icon" title="'.__('Follow us in Twitter','mk_framework').'" href="'.$twitter.'"><i class="mk-jupiter-icon-square-twitter"></i></a></li>';
	}
	if($facebook) {
		echo '<li><a class="facebook-icon" title="'.__('Follow us in Facebook','mk_framework').'" href="'.$facebook.'"><i class="mk-jupiter-icon-square-facebook"></i></a></li>';
	}
	if($gplus) {
		echo '<li><a class="googleplus-icon" title="'.__('Follow us in Google Plus','mk_framework').'" href="'.$gplus.'"><i class="mk-jupiter-icon-square-googleplus"></i></a></li>';
	}
	if($rss) {
		echo '<li><a class="rss-icon" title="'.__('Subscribe to our RSS feed','mk_framework').'" href="'.$rss.'"><i class="mk-jupiter-icon-square-rss"></i></a></li>';
	}

	?>			
	</ul>

	<div id="mk-uc-subscribe">
		<form action="<?php echo $mailchimp_action_url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<input type="email" value="" name="EMAIL" class="email text-input" id="mce-EMAIL" placeholder="<?php _e('Enter your email to subscribe', 'mk_framework'); ?>" required>
			<input type="submit" value="<?php _e('submit', 'mk_framework'); ?>" name="subscribe" id="mc-embedded-subscribe" class="mk-button small mk-skin-button three-dimension">
		</form>
	</div>


</div>

<div class="clearboth"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>