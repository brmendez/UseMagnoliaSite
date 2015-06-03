<?php 
global $post, $mk_options;
$page_layout = get_post_meta( $post->ID, '_layout', true );
$padding = get_post_meta( $post->ID, '_padding', true );
$padding = ($padding == 'true') ? 'no-padding' : '';

$grid_width = $mk_options['grid_width'];
$content_width = $mk_options['content_width'];

if($page_layout == 'default') {
	$page_layout = $mk_options['news_layout'];
}



if( $page_layout=='full' ) {
	$image_width = $grid_width;
}else {
	$image_width = ( ( $content_width / 100 ) * $grid_width );
}
$image_height = $mk_options['news_featured_image_height'];


$terms = get_the_terms(get_the_id(), 'news_category');
$terms_slug = array();
$terms_name = array();
if (is_array($terms)) {
	foreach($terms as $term) {
		$terms_name[] = $term->name;
			}
}


get_header(); ?>

<nav class="mk-news-pagination mk-loop-next-prev">
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
<div id="theme-page">
	<div class="theme-page-wrapper <?php echo $page_layout; ?>-layout vc_row-fluid mk-grid <?php echo $padding; ?>">
		<div class="theme-content <?php echo $padding; ?>">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="news-post-heading">
			<?php if($mk_options['news_page'] != '') : ?>
				<a class="back-news-page" href="<?php echo get_permalink($mk_options['news_page']); ?>"><i class="mk-icon-double-angle-left"></i><?php _e('Back to News', 'mk_framework'); ?></a>
			<?php endif; ?>

				<ul class="news-single-social">
					<li><a onClick="window.print()" href="#"><?php _e('Print', 'mk_framework'); ?></a></li>
					<li><a href="mailto:info@company.com?subject=<?php the_title(); ?>&body=<?php the_excerpt(); ?>"><?php _e('Email', 'mk_framework'); ?></a></li>
				</ul>

				<div class="single-news-meta">

				<div class="news-single-categories"><?php echo implode(', ', $terms_name); ?></div>

				<time class="news-single-date" datetime="<?php the_date() ?>">
						<a href="<?php echo get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ) ?>"><?php echo get_the_date() ?></a>
				</time>
				</div>	
				<div class="clearboth"></div>
			</div>
			

			<?php if('' != get_the_post_thumbnail()) : 
				$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height)); 
			?>
			<div class="news-featured-image">	
				<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo $image_src; ?>" height="<?php echo $image_height; ?>" width="<?php echo $image_width; ?>" />
			</div>
			<?php endif; ?>

			<div class="news-post-content" itemprop="mainContentOfPage">
				<?php the_content();?>
			</div>	

			<div class="mk-back-top">
				<a href="#" class="mk-back-top-link"><i class="mk-icon-arrow-up"></i><?php _e('Back to Top', 'mk_framework'); ?></a>
			</div>

			<div class="clearboth"></div>
			<?php endwhile; ?>
		</div>

	<?php if($page_layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>	
	</div>
</div>
<?php get_footer(); ?>