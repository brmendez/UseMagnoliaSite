<?php

extract( shortcode_atts( array(
            'title' => '',
            'email' => get_bloginfo( 'admin_email' ),
            'style' => 'classic',
            'skin' => 'dark',
            'phone' => 'false',
            'el_class' => '',
        ), $atts ) );
$id = mt_rand( 99, 999 );
$tabindex_1 = $id;
$tabindex_2 = $id + 1;
$tabindex_3 = $id + 2;
$tabindex_4 = $id + 3;
$tabindex_5 = $id + 4;

$fancy_title = $output = '';
if ( !empty( $title ) ) {
    $fancy_title = '<h3 class="mk-shortcode mk-fancy-title pattern-style mk-shortcode-heading"><span>'.$title.'</span></h3>';
}

if ( $style == 'classic' ) {

    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper classic-style mk-shortcode '.$el_class.'">';
    $output .= '<form class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row"><i class="mk-icon-user"></i><input placeholder="'.__( 'Your Name', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    if($phone == 'true') {
        $output .= '<div class="mk-form-row"><i class="mk-icon-phone"></i><input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" name="contact_phone" class="text-input" value="" tabindex="'.$tabindex_2.'" /></div>';
    }
    $output .= '<div class="mk-form-row"><i class="mk-icon-envelope"></i><input placeholder="'.__( 'Your Email', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    $output .= '<div class="mk-form-row"><i class="mk-icon-pencil"></i><textarea required="required" placeholder="'.__( 'Your message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';
    $output .= '<div class="mk-form-row" style="float:left;"><button tabindex="'.$tabindex_5.'" class="mk-button mk-skin-button three-dimension contact-form-button medium">'.__( 'Submit', 'mk_framework' ).'</button></div>';
    $output .= '<i class="mk-contact-loading mk-moon-loop-4 mk-icon-spin"></i>';
    $output .= '<i class="mk-contact-success mk-icon-ok-sign"></i>';
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';

} else {
    $output .= $fancy_title;
    $output .= '<div class="mk-contact-form-wrapper mk-shortcode contact-'.$skin.' modern-style '.$el_class.'">';
    $output .= '<form class="mk-contact-form" method="post" novalidate="novalidate">';
    $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Name', 'mk_framework' ).'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" /></div>';
    if($phone == 'true') {
        $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Phone Number', 'mk_framework' ).'" type="text" required="required" name="contact_phone" class="text-input" value="" tabindex="'.$tabindex_2.'" /></div>';
    }
    $output .= '<div class="mk-form-row"><input placeholder="'.__( 'Your Email', 'mk_framework' ).'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_3.'" /></div>';
    $output .= '<div class="mk-form-row"><textarea required="required" placeholder="'.__( 'Your message', 'mk_framework' ).'" name="contact_content" class="mk-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';
    $output .= '<div class="mk-form-row"><button tabindex="'.$tabindex_5.'" class="mk-button outline-btn-'.$skin.' outline-dimension contact-form-button large">'.__( 'Submit', 'mk_framework' ).'</button></div>';
    $output .= '<i class="mk-contact-loading mk-moon-loop-4 mk-icon-spin"></i>';
    $output .= '<i class="mk-contact-success mk-icon-ok-sign"></i>';
    $output .= '<input type="hidden" value="'.antispambot($email).'" name="contact_to"/>';
    $output .= '</form>';
    $output .= '<div class="clearboth"></div></div>';

}


echo $output;