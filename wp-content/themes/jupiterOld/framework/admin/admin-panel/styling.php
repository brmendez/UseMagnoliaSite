<?php
$theme_options_styling = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_skining'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_backgrounds_skin" => __("Backgrounds", "mk_framework"),
            "mk_options_general_skin" => __("General Coloring", "mk_framework"),
            "mk_options_main_navigation_skin" => __("Main Navigation", "mk_framework"),
            "mk_options_header_toolbar_skin" => __("Header Toolbar", "mk_framework"),
            "mk_options_header_banner_skin" => __("Page Title", "mk_framework"),
            "mk_options_sidebar_skin" => __("Sidebar", "mk_framework"),
            "mk_options_footer_skin" => __("Footer", "mk_framework"),
            "mk_options_misc_skin" => __("Miscellaneous", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_backgrounds_skin'
    ),
    array(
        "name" => __("Styling / Backgrounds", "mk_framework"),
        "desc" => __("In this section you can modify all the backgrounds of your site including header, page, body, footer. Here, you can set the layout you would like your site to look like, then click on different layout sections to add/create different backgrounds.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Choose between boxed and full width layout", 'mk_framework'),
        "desc" => __("Choose between a full or a boxed layout to set how your website's layout will look like.", 'mk_framework'),
        "id" => "background_selector_orientation",
        "default" => "full_width_layout",
        "item_padding" => "0px 30px 20px 0",
        "options" => array(
            "boxed_layout" => 'boxed-layout',
            "full_width_layout" => 'full-width-layout'
        ),
        "type" => "visual_selector"
    ),
    array(
        "name" => __("Boxed Layout Outer Shadow Size", "mk_framework"),
        "desc" => __("You can have a outer shadow around the box. using this option you in can modify its range size", "mk_framework"),
        "id" => "boxed_layout_shadow_size",
        "default" => "0",
        "min" => "0",
        "max" => "60",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Boxed Layout Outer Shadow Intensity", "mk_framework"),
        "desc" => __("determines how darker the shadow to be.", "mk_framework"),
        "id" => "boxed_layout_shadow_intensity",
        "default" => "0",
        "min" => "0",
        "max" => "1",
        "step" => "0.01",
        "unit" => 'alpha',
        "type" => "range"
    ),
    array(
        "name" => __("Background color & texture", 'mk_framework'),
        "desc" => __("Please click on the different sections to modify their backgrounds.", 'mk_framework'),
        "id" => 'general_backgounds',
        "type" => "general_background_selector"
    ),
    array(
        "id" => "body_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "body_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "page_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_color",
        "default" => "#fff",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "header_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_color",
        "default" => "#545454",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_size",
        "default" => "true",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "banner_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_color",
        "default" => "#1a1a1a",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_image",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_size",
        "default" => "false",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_position",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_attachment",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_repeat",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "id" => "footer_source",
        "default" => "no-image",
        "type" => 'hidden_input'
    ),
    array(
        "name" => __("Header Background Opacity.", "mk_framework"),
        "desc" => __("You can change the opacity of your header section.", "mk_framework"),
        "id" => "header_opacity",
        "min" => "0",
        "max" => "1",
        "step" => "0.1",
        "unit" => 'opacity',
        "default" => "1",
        "type" => "range"
    ),
    array(
        "name" => __("Header Background Sticky Opacity.", "mk_framework"),
        "desc" => __("The opacity of the sticky header section (after scroll header will be fixed to the top of window).", "mk_framework"),
        "id" => "header_sticky_opacity",
        "min" => "0",
        "max" => "1",
        "step" => "0.1",
        "unit" => 'opacity',
        "default" => "0.95",
        "type" => "range"
    ),
    array(
        "name" => __('Header Bottom Border Color', "mk_framework"),
        "id" => "header_border_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_general_skin'
    ),
    array(
        "name" => __("Styling & Coloring / General Skin Colors", "mk_framework"),
        "desc" => __("These options defines your site's general colors.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Theme Accent Color', "mk_framework"),
        "desc" => __("The theme main color that will be applied to some elements.", "mk_framework"),
        "id" => "skin_color",
        "default" => "#00c8d7",
        "type" => "color"
    ),
    array(
        "name" => __('Body Text Color', "mk_framework"),
        "id" => "body_text_color",
        "default" => "#252525",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 1 (h1) Color', "mk_framework"),
        "id" => "h1_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 2 (h2) Color', "mk_framework"),
        "id" => "h2_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 3 (h3) Color', "mk_framework"),
        "id" => "h3_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 4 (h4) Color', "mk_framework"),
        "id" => "h4_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 5 (h5 Color', "mk_framework"),
        "id" => "h5_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Heading 6 (h6) Color', "mk_framework"),
        "id" => "h6_color",
        "default" => "#393836",
        "type" => "color"
    ),
    array(
        "name" => __('Paragraph (p) Color', "mk_framework"),
        "id" => "p_color",
        "default" => "#252525",
        "type" => "color"
    ),
    array(
        "name" => __('Content Links Color', "mk_framework"),
        "id" => "a_color",
        "default" => "#333333",
        "type" => "color"
    ),
    array(
        "name" => __('Content Links Color Hover', "mk_framework"),
        "id" => "a_color_hover",
        "default" => "#00c8d7",
        "type" => "color"
    ),
    array(
        "name" => __('Content Strong tag Color', "mk_framework"),
        "id" => "strong_color",
        "default" => "#00c8d7",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_main_navigation_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Main Navigation", "mk_framework"),
        "desc" => __("In this section you can modify the coloring of Main Navigation Section.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Container Color Background Color', "mk_framework"),
        "desc" => __("This option will put your main navigation in a colored container. This option best works when you choose classic style navigation style from Masterkey > General > Header > Main Navigation Styles.", "mk_framework"),
        "id" => "main_nav_bg_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Background Color', "mk_framework"),
        "id" => "main_nav_top_bg_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Text Color', "mk_framework"),
        "id" => "main_nav_top_text_color",
        "default" => "#444444",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Hover Text Color', "mk_framework"),
        "id" => "main_nav_top_text_hover_color",
        "default" => "#00c8d7",
        "type" => "color"
    ),
    array(
        "name" => __('Top Level Hover Background Color', "mk_framework"),
        "id" => "main_nav_top_bg_hover_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __("Top Level Hover Background Color Opacity Alpha.", "mk_framework"),
        "desc" => __("You can use this option to give yout navigation hover and current item background color a transparent layer style. default is 0.2", "mk_framework"),
        "id" => "main_nav_top_bg_hover_color_rgba",
        "min" => "0",
        "max" => "1",
        "step" => "0.1",
        "unit" => 'alpha',
        "default" => "0",
        "type" => "range"
    ),
    array(
        "name" => __('Sub Level Background Color', "mk_framework"),
        "id" => "main_nav_sub_bg_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Text Color', "mk_framework"),
        "id" => "main_nav_sub_text_color",
        "default" => "#444444",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Text Hover Color', "mk_framework"),
        "id" => "main_nav_sub_text_color_hover",
        "default" => "#00c8d7",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Level Hover Background Color', "mk_framework"),
        "id" => "main_nav_sub_hover_bg_color",
        "default" => "#f5f5f5",
        "type" => "color"
    ),
    array(
        "name" => __('Responsive Navigation Background Color', "mk_framework"),
        "id" => "responsive_nav_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Responsive Navigation Text Color', "mk_framework"),
        "id" => "responsive_nav_txt_color",
        "default" => "#444444",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_toolbar_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Header Toolbar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Header Toolbar Background Color', "mk_framework"),
        "id" => "header_toolbar_bg",
        "default" => "#ffffff",
        "type" => "color"
    ),
    array(
        "name" => __('Header Toolbar Border Bottom Color', "mk_framework"),
        "id" => "header_toolbar_border_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Header Toolbar Text Color', "mk_framework"),
        "id" => "header_toolbar_txt_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Header Toolbar Link Color', "mk_framework"),
        "id" => "header_toolbar_link_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Header Toolbar Social Network Icon Colors', "mk_framework"),
        "id" => "header_toolbar_social_network_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Header Search Form Input Background Color', "mk_framework"),
        "id" => "header_toolbar_search_input_bg",
        "default" => "",
        "type" => "color"
    ),
    array(
        "name" => __('Header Search Form Input Text Color', "mk_framework"),
        "id" => "header_toolbar_search_input_txt",
        "default" => "#c7c7c7",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_banner_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Page Title", "mk_framework"),
        "desc" => __("In this section you can modify coloring of Header Page Title and Subtitle.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Page Title', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "page_title_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __("text Shadow for Title?", "mk_framework"),
        "desc" => __("If you enable this option 1px gray shadow will appear in page title.", "mk_framework"),
        "id" => "page_title_shadow",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __('Page Subtitle', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "page_subtitle_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __("Breadcrumb Skin", "mk_framework"),
        "id" => "breadcrumb_skin",
        "default" => 'dark',
        "options" => array(
            "light" => __('For Light Background', "mk_framework"),
            "dark" => __('For Dark Background', "mk_framework")
        ),
        "type" => "radio"
    ),
    array(
        "name" => __('Banner Section Border Bottom Color', 'mk_framework'),
        "desc" => __("", "mk_framework"),
        "id" => "banner_border_color",
        "default" => "",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Sidebar", "mk_framework"),
        "desc" => __("This section allows you to modify the coloring of sidebar elements.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Sidebar Title Color', "mk_framework"),
        "id" => "sidebar_title_color",
        "default" => "#333333",
        "type" => "color"
    ),
    array(
        "name" => __('Sidebar Text Color', "mk_framework"),
        "id" => "sidebar_text_color",
        "default" => "#666666",
        "type" => "color"
    ),
    array(
        "name" => __('Sidebar Links', "mk_framework"),
        "id" => "sidebar_links_color",
        "default" => "#333333",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Footer", "mk_framework"),
        "desc" => __("Here, you can modify coloring of Footer section.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Footer Title Color', "mk_framework"),
        "id" => "footer_title_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "name" => __('Footer Text Color', "mk_framework"),
        "id" => "footer_text_color",
        "default" => "#808080",
        "type" => "color"
    ),
    array(
        "name" => __('Footer Links Color', "mk_framework"),
        "id" => "footer_links_color",
        "default" => "#999999",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Footer Background Color', "mk_framework"),
        "id" => "sub_footer_bg_color",
        "default" => "#202020",
        "type" => "color"
    ),
    array(
        "name" => __('Sub Footer Navigation and Copyright Text Color', "mk_framework"),
        "id" => "sub_footer_nav_copy_color",
        "default" => "#fff",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_misc_skin'
    ),
    array(
        "name" => __("Styling & Coloring / Miscellaneous", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Header Start Tour Link Color', "mk_framework"),
        "id" => "start_tour_color",
        "default" => "#333",
        "type" => "color"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "end_sub"
    ),
    array(
        "type" => "end_main_pane"
    )
);