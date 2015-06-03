<?php
$config  = array(
  'title' => sprintf( '%s Posts Options', THEME_NAME ),
  'id' => 'mk-metaboxes-tabs',
  'pages' => array(
    'post'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

  array(
    "name" => __( "Featured Image Lightbox in Blog Loop", "mk_framework" ),
    "desc" => __( "By default if user click on featured images in blog loop a lightbox will be opened. However you can disable this feature and instead once user clicked on featured image it will go through to single post.", "mk_framework" ),
    "id" => "_disable_post_lightbox",
    "default" => 'true',
    "type" => "toggle"
  ),

  array(
    "name" => __("Post Type", "mk_framework" ),
    "desc" => __( "", "mk_framework" ),
    "id" => "_single_post_type",
    "default" => 'image',
    "preview" => false,
    "options" => array(
      "image" => 'Image',
      "video" => 'Video',
      "audio" => 'Audio',
      "portfolio" => 'Portfolio',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Classic Loops Style Orientation", "mk_framework" ),
    "desc" => __( "This option allows you to choose how the blog loop item be displayed. This option only applies to Classic style.", "mk_framework" ),
    "id" => "_classic_orientation",
    "default" => 'landscape',
    "options" => array(
      "landscape" => 'Landscape',
      "portraite" => 'Portrait',
    ),
    "type" => "select"
  ),

  array(
    "name" => __( "Upload MP3 File", "mk_framework" ),
    "desc" => __( "Upload MP3 your file or paste the full URL for external files. This file formated needed for Safari, Internet Explorer, Chrome. ", "mk_framework" ),
    "id" => "_mp3_file",
    "preview" => false,
    "default" => "",
    "type" => "upload"
  ),

  array(
    "name" => __( "Upload OGG File", "mk_framework" ),
    "desc" => __( "Upload OGG your file or paste the full URL for external files. This file formated needed for Firefox, Opera, Chrome. ", "mk_framework" ),
    "id" => "_ogg_file",
    "preview" => false,
    "default" => "",
    "type" => "upload"
  ),
  array(
    "name" => __( "Sound Track Author", "mk_framework" ),
    "desc" => __( "Fill this Field If you would like to state the author of the audio file you are about to post.", "mk_framework" ),
    "id" => "_single_audio_author",
    "type" => "text"
  ),
    array(
    "name" => __( "Soundcloud", "mk_framework" ),
    "desc" => __( "Paste embed iframe or Wordpress shortcode. You can get both iframe or shortcode for wordpress from soundcould share=>embed popup. both formats are acceptable. Please note that using this option will ignore above options related to hosted audio player.", "mk_framework" ),
    "subtitle" => __( "", "mk_framework" ),
    "id" => "_audio_iframe",
    "preview" => false,
    "default" => "",
    "type" => "textarea"
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
    "name" => __( "Featured Image", "mk_framework" ),
    "desc" => __( "If you do not want to set a featured image (in case of sound post type : Audio player, in case of video post type : Video Player) kindly disable it here.", "mk_framework" ),
    "id" => "_disable_featured_image",
    "default" => 'true',
    "type" => "toggle"
  ),
  array(
    "name" => __( "Meta Section", "mk_framework" ),
    "id" => "_disable_meta",
    "default" => 'true',
    "type" => "toggle"
  ),
  array(
    "name" => __( "Tags", "mk_framework" ),
    "desc" => __( "Tags could be disabled using this option should you not want to include any tags", "mk_framework" ),
    "id" => "_disable_tags",
    "default" =>'true',
    "type" => "toggle"
  ),
  array(
    "name" => __( "Related Posts", "mk_framework" ),
    "desc" => __( "If you do not want to show related posts disable the post here", "mk_framework" ),
    "id" => "_disable_related_posts",
    "default" =>'true',
    "type" => "toggle"
  ),
  array(
    "name" => __( "About Author Box", "mk_framework" ),
    "desc" => __( "Disable the about author box here", "mk_framework" ),
    "id" => "_disable_about_author",
    "default" => 'true',
    "type" => "toggle"
  ),
  array(
    "name" => __( "Comments", "mk_framework" ),
    "desc" => __( "Disable comments section for this post.", "mk_framework" ),
    "id" => "_disable_comments",
    "default" => 'true',
    "type" => "toggle"
  ),



);
new mkMetaboxesGenerator( $config, $options );
