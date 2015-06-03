<?php 

global $post,
$mk_options;



$single_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );
$padding = ($padding == 'true') ? 'no-padding' : '';

if($single_layout == 'default' || empty($single_layout)) {
	$single_layout = $mk_options['single_layout'];
}


/*
Image dimensions
*/
$image_height = $mk_options['single_featured_image_height'];
$image_width = mk_content_width($single_layout);






/************************************************************
  Next & previous post
*************************************************************/
function social_networks_meta() {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$output = '<meta property="og:image" content="'.$image_src_array[ 0 ].'"/>'. "\n";
	$output .= '<meta property="og:url" content="'.get_permalink().'"/>'. "\n";
	$output .= '<meta property="og:title" content="'.get_the_title().'"/>'. "\n";
	echo $output;
}
add_action('wp_head', 'social_networks_meta');





get_header(); ?>




<?php 
/************************************************************
  Next & previous post
*************************************************************/
?>
<?php if($mk_options['blog_prev_next'] == 'true') : ?>
<nav class="mk-blog-pagination mk-loop-next-prev">
<?php

$next_post = get_next_post();
if ( !empty( $next_post ) ) {
	echo '<a href="'.get_permalink( $next_post->ID ).'" title="'.get_the_title( $next_post->ID ).'" class="mk-next-post"><i class="mk-icon-chevron-right"></i></a>';
}

$prev_post = get_previous_post();
if ( !empty( $prev_post ) ) {
	echo '<a href="'.get_permalink( $prev_post->ID ).'" title="'.get_the_title( $prev_post->ID ).'" class="mk-prev-post"><i class="mk-icon-chevron-left"></i></a>';
}

if(4==3){paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link();}
?>





</nav>
<?php endif; ?>

<div id="theme-page">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

		$post_type = get_post_meta( $post->ID, '_single_post_type', true );
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		if($mk_options['blog_single_img_crop'] == 'true') {
			$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height));
		} else {
			$image_src = $image_src_array[ 0 ];
		}
		

	?>		

	<div class="theme-page-wrapper mk-blog-single <?php echo $single_layout; ?>-layout vc_row-fluid mk-grid <?php echo $padding; ?>">
		<div class="theme-content <?php echo $padding; ?>">
		<article id="<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if($mk_options['single_meta_section'] == 'true' && get_post_meta( $post->ID, '_disable_meta', true ) != 'false') : ?>
			<div class="blog-single-meta">
				<div class="mk-blog-author"><?php _e('By', 'mk_framework'); ?> <?php the_author_posts_link(); ?></div>
					<time class="mk-post-date" datetime="<?php the_date() ?>">
						<?php _e('Posted', 'mk_framework'); ?> <a href="<?php echo get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ); ?>"><?php echo get_the_date(); ?></a>
					</time>
					<div class="mk-post-cat"> <?php _e('In', 'mk_framework'); ?> <?php the_category( ', ' ) ?></div>
			</div>	
			<?php endif; ?>



			<div class="single-social-section">
				<div class="mk-love-holder"><?php echo mk_love_this(); ?></div>
				<?php
				if($mk_options['enable_blog_single_comments'] == 'true') :
						if ( get_post_meta( $post->ID, '_disable_comments', true ) != 'false' ) {
							?><a href="<?php echo get_permalink(); ?>#comments" class="blog-modern-comment"><i class="mk-moon-bubble-9"></i><span> <?php echo comments_number( '0', '1', '%'); ?></span></a><?php
						}
					endif;
				?>

				
				<?php if($mk_options['single_blog_social'] == 'true' ) : ?>
				<div class="blog-share-container">
					<div class="blog-single-share mk-toggle-trigger"><i class="mk-moon-share-2"></i></div>
					<ul class="single-share-box mk-box-to-trigger">
						<li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-facebook"></i></a></li>
						<li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-twitter"></i></a></li>
						<li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-googleplus"></i></a></li>
						<li><a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-pinterest"></i></a></li>
						<li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="mk-jupiter-icon-simple-linkedin"></i></a></li>
					</ul>
				</div>
				<?php endif; ?>
				<a class="mk-blog-print" onClick="window.print()" href="#" title="<?php _e('Print', 'mk_framework'); ?>"><i class="mk-icon-print"></i></a>
			<div class="clearboth"></div>
			</div>


			<div class="clearboth"></div>
			<?php 

			if($mk_options['single_disable_featured_image'] == 'true' && get_post_meta( $post->ID, '_disable_featured_image', true ) != 'false') :

			if($post_type == 'image' || $post_type == 'portfolio') { ?>
				<?php if(has_post_thumbnail()) : ?>
						<div class="single-featured-image">	
							<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo $image_src; ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" itemprop="image" />
						</div>		
				<?php endif; ?>		
			<?php } elseif($post_type == 'video') { 
				$skin_color = $mk_options['skin_color'];	
				$video_id = get_post_meta( $post->ID, '_single_video_id', true );	
				$video_site  = get_post_meta( $post->ID, '_single_video_site', true );


				if($video_site =='vimeo') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color='.str_replace("#", "", $skin_color).'" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}


				if($video_site =='youtube') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.youtube.com/embed/'.$video_id.'?showinfo=0&amp;theme=light&amp;color=white&amp;rel=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}

				if($video_site =='dailymotion') {
				echo '<div style="width:'.$image_width.'px;" class="mk-video-wrapper"><div class="mk-video-container"><iframe src="http'.((is_ssl())? 's' : '').'://www.dailymotion.com/embed/video/'.$video_id.'?logo=0" frameborder="0" width="'.$image_width.'" height="'.$image_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
				}
		
			} elseif($post_type == 'audio') { 	
				$audio_id = mt_rand( 99, 999 );
				$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
				$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
				$audio_author  = get_post_meta( $post->ID, '_single_audio_author', true ); 
				wp_enqueue_script( 'jquery-jplayer' );
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 170, 'height' => 170));

					/* Random Color variations for Audio box background */
				$audio_box_color  = array('#00c8d7', '#e1ba05', '#da4c26','#f56a5f', '#00b89a', '#95c76a','#acacac', '#d19760');
				$random_colors = array_rand($audio_box_color, 1);
				$has_image = '';

				echo '<script type="">

			jQuery(document).ready(function($) {

					jQuery("#jquery_jplayer_'.$audio_id.'").jPlayer({
						ready: function () {
							$(this).jPlayer("setMedia", {';
				if ( $mp3_file ) {
					echo 'mp3: "'.$mp3_file.'",';
				}
				if ( $ogg_file ) {
					echo 'ogg: "'.$ogg_file.'",';
				}

				echo ' });
						},
						play: function() { // To avoid both jPlayers playing together.
							$(this).jPlayer("pauseOthers");
						},
						swfPath: "'.THEME_JS.'",
						supplied: "mp3, ogg",
						cssSelectorAncestor: "#jp_container_'.$audio_id.'",
						wmode: "window"
					});

			})

			</script>';

			
		
			echo '<div class="mk-audio-section" style="background-color:'.$audio_box_color[$random_colors].'">';	
			if ( has_post_thumbnail() ) {
				echo '<img class="audio-thumb" alt="'.get_the_title().'" title="'.get_the_title().'" src="'.$image_src.'" />';
				$has_image = 'audio-has-img';
			}
			
				echo '<div data-mp3="'.$mp3_file.'" data-ogg="'.$ogg_file.'" id="jquery_jplayer_'.$audio_id.'" class="jp-jplayer mk-blog-audio"></div>
				<div id="jp_container_'.$audio_id.'" class="jp-audio '.$has_image.'">
					<div class="jp-type-single">
						<div class="jp-gui jp-interface">
							<div class="jp-time-holder">
								<div class="jp-current-time"></div>
								<div class="jp-duration"></div>
							</div>
							
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="jp-volume-bar">
								<i class="mk-moon-volume-mute"></i><div class="inner-value-adjust"><div class="jp-volume-bar-value"></div></div>
							</div>
							<ul class="jp-controls">
								<li><a href="javascript:;" class="jp-play" tabindex="1"><i class="mk-icon-play"></i></a></li>
								<li><a href="javascript:;" class="jp-pause" tabindex="1"><i class="mk-icon-pause"></i></a></li>
							</ul>';
							if($audio_author) {
								echo '<span class="mk-audio-author">'.$audio_author.'</span>';
							}	
						echo '</div>
						<div class="jp-no-solution">
							<span>Update Required</span>
							To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
						</div>
					</div></div><div class="clearboth"></div></div>';			
	 }   

	 endif;

 ?>		
 							

							<div class="clearboth"></div>
							<div class="mk-single-content" itemprop="mainContentOfPage">
								<?php the_content(); ?>
							</div>
							<?php wp_link_pages('before=<div class="mk-page-links">'.__('Pages:', 'mk_framework').'&after=</div>'); ?>

							<div class="single-post-tags">
								<?php if($mk_options['diable_single_tags'] == 'true' && get_post_meta( $post->ID, '_disable_tags', true ) != 'false') : ?>
									<span><?php _e('Tags:', 'mk_framework'); ?></span> 
									<?php the_tags(' ',''); ?>
								<?php endif; ?>
							</div>
							<div class="single-back-top">
								<a href="#"><i class="mk-icon-chevron-up"></i><?php _e('Back to Top', 'mk_framework'); ?></a>	
							</div>




				<?php if($mk_options['enable_blog_author'] == 'true' && get_post_meta( $post->ID, '_disable_about_author', true ) != 'false') : ?>
						<div class="mk-about-author-wrapper">
								<div class="avatar-wrapper"><?php global $user; echo get_avatar( get_the_author_meta('email'), '65',false ,get_the_author_meta('display_name', $user['ID'])); ?></div>
								<div class="mk-about-author-meta">
								<a class="about-author-name" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
								<div class="about-author-desc"><?php the_author_meta('description'); ?></div>
								<ul class="about-author-social">
									<?php 
									if(get_the_author_meta( 'twitter' )) {
										echo '<li><a class="twitter-icon" title="'.__('Follow me on Twitter','mk_framework').'" href="'.get_the_author_meta( 'twitter' ).'"><i class="mk-icon-twitter"></i></a></li>';
									}
									if(get_the_author_meta('email')) {
										echo '<li><a class="email-icon" title="'.__('Get in touch with me via email','mk_framework').'" href="mailto:'.get_the_author_meta('email').'"><i class="mk-icon-envelope-alt"></i></a></li>';
									}
									?>																											
								</ul>
								</div>
								<div class="clearboth"></div>
						</div>
					<?php endif; ?>
						


						<?php 
					if($mk_options['enable_single_related_posts'] == 'true' && get_post_meta( $post->ID, '_disable_related_posts', true ) != 'false') {
						do_action('blog_similar_posts', $post->ID); 
					}
						
						?>
					
					<?php 
					if($mk_options['enable_blog_single_comments'] == 'true') :

						if ( get_post_meta( $post->ID, '_disable_comments', true ) != 'false' ) {
							comments_template( '', true ); 
						}
					endif;
					?>	
			</article>
			<div class="clearboth"></div>
			</div>
				<?php endwhile; ?>
			<?php  if($single_layout != 'full') get_sidebar();  ?>
			<div class="clearboth"></div>	
		</div>

</div>
<?php get_footer(); ?>