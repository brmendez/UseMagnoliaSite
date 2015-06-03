<?php
/*
Template Name: Blank Page
*/
global $post, $mk_options;
$page_layout = get_post_meta( $post->ID, '_layout', true );

$padding = get_post_meta( $post->ID, '_padding', true );

$padding = ($padding == 'true') ? 'no-padding' : '';

if(empty($page_layout)) {
	$page_layout = 'right';
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6"  <?php language_attributes(); ?>>
   <![endif]-->
<!--[if IE 7]>
   <html id="ie7" <?php language_attributes(); ?>>
      <![endif]-->
<!--[if IE 8]>
      <html id="ie8" <?php language_attributes(); ?>>
         <![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
         <html <?php language_attributes(); ?>>
            <![endif]-->
<head>
 		<meta charset="<?php bloginfo('charset'); ?>">
        <meta name="Theme Version" content="<?php $theme_data = wp_get_theme(); echo $theme_data['Version']; ?>">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>
            <?php bloginfo("name"); ?> <?php wp_title("|", true); ?>
        </title>
        <?php $custom_favicon = $mk_options['custom_favicon']; if ( $custom_favicon ) : ?>
          <link rel="shortcut icon" href="<?php echo $custom_favicon ?>"  />
        <?php endif; ?>
  	  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
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
         </script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); 
		wp_head();

		$mk_body_class[] = 'mk-blank-template';
	?>
</head>
	<body <?php body_class($mk_body_class); ?>>
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?> mk-grid vc_row-fluid">
		<div class="theme-content <?php echo $padding; ?>" itemprop="mainContentOfPage">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
					<div class="clearboth"></div>
			<?php endwhile; ?>
		</div>

	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>

<?php if($mk_options['custom_js']) : ?>
		<script type="text/javascript">
		
		<?php echo stripslashes($mk_options['custom_js']); ?>
		
		</script>
	
	
	<?php 
	endif;
	
	if($mk_options['analytics']){
		?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo stripslashes($mk_options['analytics']); ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<?php 

	}

wp_footer(); ?>
</body>
</html>