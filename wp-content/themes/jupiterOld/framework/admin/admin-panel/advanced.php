<?php
$theme_options_advanced = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_advanced'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_manage_theme" => __("Manage Theme", "mk_framework"),
            "mk_options_ucp" => __("Under Construction Page", "mk_framework"),
            "mk_options_twitter_api" => __("Twitter API", "mk_framework"),
            "mk_options_custom_js" => __("Custom JS", "mk_framework"),
            "mk_options_custom_css" => __("Custom CSS", "mk_framework"),
            "mk_options_export_options" => __("Export Options", "mk_framework"),
            "mk_options_import_options" => __("Import Options", "mk_framework"),
            "mk_options_troubleshooting" => __("Troubleshooting", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_manage_theme'
    ),
    array(
        "name" => __("Advanced / Manage Theme", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Minify Theme JS File", "mk_framework"),
        "desc" => __("If you enable this option pre-minified theme Java Script files will be renderred in front-end. Minified JS is 30%-40% smaller in file size which will improve page speed.", "mk_framework"),
        "id" => "minify-js",
        "default" => "false",
        "type" => "toggle"
    ),
    array(
        "name" => __("query string from Static Files", "mk_framework"),
        "desc" => __("disabling this option will remove \"ver\" query string from JS and CSS files. For More info Please <a href=\"https://developers.google.com/speed/docs/best-practices/caching#LeverageProxyCaching\">Read Here</a>.", "mk_framework"),
        "id" => "remove-js-css-ver",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Portfolio Post Type", "mk_framework"),
        "desc" => __("If you will not use Portfolio post type feature simply disable this option.", "mk_framework"),
        "id" => "portfolio-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("News Post Type", "mk_framework"),
        "desc" => __("If you will not use News post type feature simply disable this option.", "mk_framework"),
        "id" => "news-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("FAQ Post Type", "mk_framework"),
        "desc" => __("If you will not use faq post type feature simply disable this option.", "mk_framework"),
        "id" => "faq-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Pricing Tables Post Type", "mk_framework"),
        "desc" => __("If you will not use Pricing Tables post type feature simply disable this option.", "mk_framework"),
        "id" => "pricing-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Clients Post Type", "mk_framework"),
        "desc" => __("If you will not use Clients post type feature simply disable this option.", "mk_framework"),
        "id" => "clients-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Employees Post Type", "mk_framework"),
        "desc" => __("If you will not use Employees post type feature simply disable this option.", "mk_framework"),
        "id" => "employees-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Testimonial Post Type", "mk_framework"),
        "desc" => __("If you will not use Testimonial post type feature simply disable this option.", "mk_framework"),
        "id" => "testimonials-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("FlexSlider Post Type", "mk_framework"),
        "desc" => __("If you will not use FlexSlider post type feature simply disable this option.", "mk_framework"),
        "id" => "flexslider-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Edge Slideshow Post Type", "mk_framework"),
        "desc" => __("If you will not use Edge Slideshow post type feature simply disable this option.", "mk_framework"),
        "id" => "edge-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("iCarousel Post Type", "mk_framework"),
        "desc" => __("If you will not use iCarousel post type feature simply disable this option.", "mk_framework"),
        "id" => "iCarousel-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Bunner Builder Post Type", "mk_framework"),
        "desc" => __("If you will not use Bunner Builder post type feature simply disable this option.", "mk_framework"),
        "id" => "banner-post-type",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_ucp'
    ),
    array(
        "name" => __("Advanced / Under Construction Page", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Under Construction Page", "mk_framework"),
        "desc" => __("You can enable this option while building your site. a coming soon page will appear for site visitors (visitor should not logged in).", "mk_framework"),
        "id" => "enable_uc",
        "default" => "false",
        "type" => "toggle"
    ),
    array(
        "name" => __("Upload Logo", "mk_framework"),
        "id" => "uc_logo",
        "default" => "",
        "type" => "upload"
    ),
    array(
        "name" => __("Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "uc_title",
        "default" => "We are currently under construction.",
        "type" => "text"
    ),
    array(
        "name" => __("Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "uc_subtitle",
        "default" => "Our estimated time before launch.",
        "type" => "text"
    ),

     array(
        "name" => __("Launch Date", "mk_framework"),
        "desc" => __("Please fill this field with expect date. eg : 12/24/2015 12:00:00 => month/day/year hour:minute:second", "mk_framework"),
        "id" => "uc_date",
        "default" => "12/24/2017 12:00:00",
        "type" => "text"
    ),
    
    array(
        "name" => __("UTC Timezone", "mk_framework"),
        "id" => "uc_offset",
        "default" => '0',
        "options" => array(
           "-12" => "-12",
           "-11" => "-11",
           "-10" => "-10",
           "-9" => "-9",
           "-8" => "-8",
           "-7" => "-7",
           "-6" => "-6",
           "-5" => "-5",
           "-4" => "-4",
           "-3" => "-3",
           "-2" => "-2",
           "-1" => "-1",
           "0" => "0",
           "+1" => "+1",
           "+2" => "+2",
           "+3" => "+3",
           "+4" => "+4",
           "+5" => "+5",
           "+6" => "+6",
           "+7" => "+7",
           "+8" => "+8",
           "+9" => "+9",
           "+10" => "+10",
           "+12" => "+12",
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Social Network Facebook", 'mk_framework'),
        "desc" => __("Fill this field with your facebook page full URL.", "mk_framework"),
        "id" => "uc_facebook",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Social Network Twitter", 'mk_framework'),
        "desc" => __("Fill this field with your twitter page full URL.", "mk_framework"),
        "id" => "uc_twitter",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Social Network Google Plus", 'mk_framework'),
        "desc" => __("Fill this field with your google plus page full URL.", "mk_framework"),
        "id" => "uc_gplus",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Your RSS feed URL", 'mk_framework'),
        "desc" => __("Fill this field with your RSS feed url, by default your wordpress rss feed will be used.", "mk_framework"),
        "id" => "uc_rss",
        "default" => get_bloginfo('rss2_url'),
        "type" => "text"
    ),
    array(
        "name" => __("Mailchimp List Subscribe Form URL", "mk_framework"),
        "desc" => __("This URL can be retrived from your mailchimp dashboard > Lists > your desired list > list settings > forms. in your form creation page you will need to click on 'share it' tab then find 'Your subscribe form lives at this URL:'. its a short URL so you will need to visit this link. once you get into the your created form page, then copy the full address and paste it here in this form. URL look like http://YOUR_USER_NAME.us6.list-manage.com/subscribe?u=d5f4e5e82a59166b0cfbc716f&id=4db82d169b", "mk_framework"),
        "id" => "uc_mailchimp_action_url",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Header Section Background", 'mk_framework'),
        "option_structure" => 'sub',
        "id" => 'uc_background',
        "type" => "specific_background_selector_start"
    ),
    array(
        "id" => "uc_bg_color",
        "default" => "",
        "type" => 'specific_background_selector_color'
    ),
    array(
        "id" => "uc_bg_repeat",
        "default" => "",
        "type" => 'specific_background_selector_repeat'
    ),
    array(
        "id" => "uc_bg_attachment",
        "default" => "",
        "type" => 'specific_background_selector_attachment'
    ),
    array(
        "id" => "uc_bg_position",
        "default" => "",
        "type" => 'specific_background_selector_position'
    ),
    array(
        "id" => "uc_bg_preset_image",
        "default" => "",
        "type" => 'specific_background_selector_image'
    ),
    array(
        "id" => "uc_bg_custom_image",
        "default" => "",
        "type" => 'specific_background_selector_custom_image'
    ),
    array(
        "id" => "uc_bg_image_source",
        "default" => "no-image",
        "type" => 'specific_background_selector_source'
    ),
    array(
        "divider" => true,
        "type" => "specific_background_selector_end"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_twitter_api'
    ),
    array(
        "name" => __("Advanced / Twitter API", "mk_framework"),
        "desc" => __('<ol style="list-style-type:decimal !important;">
  <li>Go to "<a href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a>," login with your twitter account and click "Create a new application".</li>
  <li>Fill out the required fields, accept the rules of the road, and then click on the "Create your Twitter application" button. You will not need a callback URL for this app, so feel free to leave it blank.</li>
  <li>Once the app has been created, click the "Create my access token" button.</li>
  <li>You are done! You will need the following data later on:</ol>', "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Consumer Key", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_consumer_key",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Consumer Secret", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_consumer_secret",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Access Token", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_access_token",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Access Token Secret", 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "twitter_access_token_secret",
        "default" => "",
        "type" => "text"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_custom_js'
    ),
    array(
        "name" => __("Advanced / Custom JS", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom JS", "mk_framework"),
        "desc" => __("You can write your own custom Javascript here in textarea. So you wont need to modify theme files.", "mk_framework"),
        "id" => "custom_js",
        "default" => '',
        'el_class' => 'mk_black_white',
        "rows" => 30,
        "type" => "textarea"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_custom_css'
    ),
    array(
        "name" => __("Advanced / Custom CSS", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom CSS", "mk_framework"),
        "desc" => __("You can write your own custom css, this way you wont need to modify Theme CSS files.", "mk_framework"),
        "id" => "custom_css",
        'el_class' => 'mk_black_white',
        "default" => '',
        "rows" => 30,
        "type" => "textarea"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_export_options'
    ),
    array(
        "name" => __("Advanced / Export Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Export Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "theme_export_options",
        "default" => '',
        "type" => "export"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_import_options'
    ),
    array(
        "name" => __("Advanced / Import Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Import Options", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "theme_import_options",
        "default" => '',
        "type" => "import"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_troubleshooting'
    ),
    array(
        "name" => __("Advanced / Troubleshooting", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("System Diagnostic Information", "mk_framework"),
        "desc" => __("Below information is useful to diagnose some of the possible reasons to malfunctions, performance issues or any errors. You can faciliate the process of support by providing below information to our support staff.", "mk_framework"),
        "type" => "sys_diagnose"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    ),
    array(
        "type" => "end"
    )
);