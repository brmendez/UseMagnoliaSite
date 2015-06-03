<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'fullwidth' => 'false',
	'id' => '',
	'padding' =>0,
	'attached' => 'false',
	'visibility' => '',
    'el_class' => '',
), $atts));

$fullwidth_start = $output = $fullwidth_end = '';

$id = !empty($id) ? (' id="'.$id.'"') : '';


if($fullwidth == 'true') {
	global $post;
	$page_layout = get_post_meta( $post->ID, '_layout', true );
	$fullwidth_start = '</div></div>';
	$fullwidth_end = '<div class="theme-page-wrapper '.$page_layout.'-layout mk-grid vc_row-fluid no-padding"><div class="theme-content no-padding">';
}

$output .= $fullwidth_start . '<div'.$id.' class="wpb_row '.$el_class.' vc_row-fluid '.$visibility.' mk-fullwidth-'.$fullwidth.' add-padding-'.$padding.' attched-'.$attached.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$fullwidth_end . $this->endBlockComment('row');
echo $output;
