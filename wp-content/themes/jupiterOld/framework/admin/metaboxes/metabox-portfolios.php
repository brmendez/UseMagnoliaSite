<?php
$config  = array(
  'title' => sprintf( '%s Portfolio Post Options', THEME_NAME ),
  'id' => 'mk-metaboxes-posts-options',
  'pages' => array(
    'portfolio'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(
    array(
    "name" => __( "Custom URL", "mk_framework" ),
    "desc" => __( "If you may choose to change the permalink to a page, post or external URL. If left empty the single post permalink will be used instead.", "mk_framework" ),
    "id" => "_portfolio_permalink",
    "default" => "",
    "type" => "superlink"
  ),
  array(
    "name" => __( "Post Type", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_single_post_type",
    "default" => 'image',
    "preview" => false,
    "options" => array(
      "image" => 'Image',
      "video" => 'Video',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Video Site", "mk_framework" ),
    "id" => "_single_video_site",
    "default" => 'youtube',
    "options" => array(
      "vimeo" => 'Vimeo',
      "youtube" => 'Youtube',
      "dailymotion" => 'Daily Motion',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Video Id", "mk_framework" ),
    "desc" => __( "Please fill this option with the required ID. you can find the ID from the link parameters as examplified below:<br /> http://www.youtube.com/watch?v=<strong>ID</strong><br />https://vimeo.com/<strong>ID</strong><br />http://www.dailymotion.com/embed/video/<strong>ID</strong>", "mk_framework" ),
    "id" => "_single_video_id",
    "type" => "text"
  ),


  array(
    "name" => __( "Show Featured Image", "mk_framework" ),
    "desc" => __( "If you do not want to set a featured image inside single portfolio kindly disable it here. If you post type is video, featured video player will be disabled.", "mk_framework" ),
    "id" => "_portfolio_featured_image",
    "default" => 'true',
    "type" => "toggle"
  ),


  array(
    "name" => __( "Similiar Posts", "mk_framework" ),
    "desc" => __( "If you do not want to show similar posts section inside single portfolio kindly disable it here.", "mk_framework" ),
    "id" => "_portfolio_similar",
    "default" => 'true',
    "type" => "toggle"
  ),

  array(
    "name" => __( "Social Share", "mk_framework" ),
    "desc" => __( "If you do not want to show Social share & love post feature int this post disable this option.", "mk_framework" ),
    "id" => "_portfolio_social",
    "default" => 'true',
    "type" => "toggle"
  ),


);
new mkMetaboxesGenerator( $config, $options );
