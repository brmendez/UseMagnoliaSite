<?php
$config  = array(
  'title' => sprintf( '%s Styling Options', THEME_NAME ),
  'id' => 'mk-metaboxes-styling',
  'pages' => array(
    'page',
    'portfolio',
    'post',
    'news'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

  array(
    "name" => __( "Override Global Settings", "mk_framework" ),
    "desc" => __( "You should enable this option if you want to override global background values defined in Masterkey Settings.", "mk_framework" ),
    "id" => "_enable_local_backgrounds",
    "default" => 'false',
    "type" => "toggle"
  ),
  
  array(
    "name" => __( "Choose between boxed and full width layout", 'mk_framework' ),
    "desc" => __( "Choose between a full or a boxed layout to set how your website's layout will look like.", 'mk_framework' ),
    "id" => "background_selector_orientation",
    "default" => "full_width_layout",
    "options" => array(
      "boxed_layout" => 'boxed-layout',
      "full_width_layout" => 'full-width-layout',
    ),
    "type" => "visual_selector"
  ),



  array(
    "name" => __( "Boxed Layout Outer Shadow Size", "mk_framework" ),
    "desc" => __( "You can have a outer shadow around the box. using this option you in can modify its range size", "mk_framework" ),
    "id" => "boxed_layout_shadow_size",
    "default" => "0",
    "min" => "0",
    "max" => "60",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => __( "Boxed Layout Outer Shadow Intensity", "mk_framework" ),
    "desc" => __( "determines how darker the shadow to be.", "mk_framework" ),
    "id" => "boxed_layout_shadow_intensity",
    "default" => "0",
    "min" => "0",
    "max" => "1",
    "step" => "0.01",
    "unit" => 'alpha',
    "type" => "range"
  ),

  array(
    "name" => __( "Background color & texture", 'mk_framework' ),
    "desc" => __( "Please click on the different sections to modify their backgrounds.", 'mk_framework' ),
    "id"=> 'general_backgounds',
    "type" => "general_background_selector"
  ),


  array(
    "id"=>"body_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"body_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"page_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"page_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),








  array(
    "id"=>"header_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"banner_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"footer_color",
    "default"=> "",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_color_rgba",
    "default"=> "1",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_parallax",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),

  array(
    "name" => __( 'Page Title', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_title_color",
    "default" => "",
    "type" => "color"
  ),


  array(
    "name" => __( 'Page Subtitle', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_page_subtitle_color",
    "default" => "",
    "type" => "color"
  ),

  array(
    "name" => __( "Breadcrumb Skin", "mk_framework" ),
    "id" => "_breadcrumb_skin",
    "default" => '',
    "options" => array(
      "light" => __( 'For Light Background', "mk_framework" ),
      "dark" => __( 'For Dark Background', "mk_framework" ),

    ),
    "type" => "select"
  ),

    array(
    "name" => __( 'Banner Section Border Bottom Color', 'mk_framework' ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_banner_border_color",
    "default" => "",
    "type" => "color"
  ),





);
new mkMetaboxesGenerator( $config, $options );
