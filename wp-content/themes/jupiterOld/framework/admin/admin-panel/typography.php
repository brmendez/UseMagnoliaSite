<?php
$theme_options_typography = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_typography'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_fonts" => __("Fonts", "mk_framework"),
            "mk_options_general_typography" => __("General Typography", "mk_framework"),
            "mk_options_main_navigation_typography" => __("Main Navigation", "mk_framework"),
            "mk_options_page_introduce_typography" => __("Page Title", "mk_framework"),
            "mk_options_sidebar_typography" => __("Sidebar", "mk_framework"),
            "mk_options_footer_typography" => __("Footer", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_fonts'
    ),
    array(
        "name" => __("Typography / Fonts", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Body Font-Family', "mk_framework"),
        "id" => "font_family",
        "default" => '',
        "options" => array(
            'Arial Black, Gadget, sans-serif' => 'Arial Black, Gadget, sans-serif',
            'Bookman Old Style, serif' => 'Bookman Old Style, serif',
            'Comic Sans MS, cursive' => 'Comic Sans MS, cursive',
            'Courier, monospace' => 'Courier, monospace',
            'Courier New, Courier, monospace' => 'Courier New, Courier, monospace',
            'Garamond, serif' => 'Garamond, serif',
            'Georgia, serif' => 'Georgia, serif',
            'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
            'Lucida Console, Monaco, monospace' => 'Lucida Console, Monaco, monospace',
            'Lucida Sans, Lucida Grande, Lucida Sans Unicode, sans-serif' => 'Lucida Grande, Lucida Sans, Lucida Sans Unicode, sans-serif',
            'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif' => 'HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, sans-serif',
            'MS Sans Serif, Geneva, sans-serif' => 'MS Sans Serif, Geneva, sans-serif',
            'MS Serif, New York, sans-serif' => 'MS Serif, New York, sans-serif',
            'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype, Book Antiqua, Palatino, serif',
            'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
            'Times New Roman, Times, serif' => 'Times New Roman, Times, serif',
            'Trebuchet MS, Helvetica, sans-serif' => 'Trebuchet MS, Helvetica, sans-serif',
            'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("1. Choose a font", "mk_framework"),
        "id" => "special_fonts_list_1",
        "default" => 'Open+Sans:400,300,600,700,800',
        "function" => 'mk_fonts_list',
        "type" => "custom"
    ),
    array(
        "id" => __("special_fonts_type_1", "mk_framework"),
        "default" => 'google',
        "type" => "special_font"
    ),
    array(
        "name" => __("Google Font character sets", "mk_framework"),
        "desc" => __("please add your character set name/names with comma in between. This option if only works when you have you are using google fonts and your language has other characters that is not available in English. in  Available character sets : latin,latin-ext,cyrillic-ext,greek-ext,greek,vietnamese,cyrillic", "mk_framework"),
        "id" => "google_font_subset_1",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => __("2. Specify which sections use the above font ", "mk_framework"),
        "id" => "special_elements_1",
        "default" => array(
            'body'
        ),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "id" => "special_fonts_type_2",
        "default" => 'google',
        "type" => "special_font"
    ),
    array(
        "name" => __("1. Choose a font", "mk_framework"),
        "id" => "special_fonts_list_2",
        "default" => '',
        "function" => 'mk_fonts_list',
        "type" => "custom"
    ),
    array(
        "name" => __("Google Font character sets", "mk_framework"),
        "desc" => __("please add your character set name/names with comma in between. This option if only works when you have you are using google fonts and your language has other characters that is not available in English. in  Available character sets : latin,latin-ext,cyrillic-ext,greek-ext,greek,vietnamese,cyrillic", "mk_framework"),
        "id" => "google_font_subset_2",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => __("2. Specify which sections use the above font ", "mk_framework"),
        "id" => "special_elements_2",
        "default" => array(),
        "options" => $font_replacement_objects,
        "type" => "multiselect"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_general_typography'
    ),
    array(
        "name" => __("Typography / General Typography", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Body Text Size', "mk_framework"),
        "id" => "body_font_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "13",
        "type" => "range"
    ),
    array(
        "name" => __('Body Text Weight', "mk_framework"),
        "id" => "body_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Pragraph (p) Text Size', "mk_framework"),
        "id" => "p_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "13",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 1 (h1) Size', "mk_framework"),
        "id" => "h1_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "36",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 1 (h1) Weight', "mk_framework"),
        "id" => "h1_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 1 (h1) Text Transform', "mk_framework"),
        "id" => "h1_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 2 (h2) Size', "mk_framework"),
        "id" => "h2_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "30",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 2 (h2) Weight', "mk_framework"),
        "id" => "h2_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 2 (h2) Text Transform', "mk_framework"),
        "id" => "h2_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 3 (h3) Size', "mk_framework"),
        "id" => "h3_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "24",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 3 (h3) Weight', "mk_framework"),
        "id" => "h3_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 3 (h3) Text Transform', "mk_framework"),
        "id" => "h3_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 4 (h4) Size', "mk_framework"),
        "id" => "h4_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "18",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 4 (h4) Weight', "mk_framework"),
        "id" => "h4_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 4 (h4) Text Transform', "mk_framework"),
        "id" => "h4_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 5 (h5) Size', "mk_framework"),
        "id" => "h5_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "16",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 5 (h5) Weight', "mk_framework"),
        "id" => "h5_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 5 (h5) Text Transform', "mk_framework"),
        "id" => "h5_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 6 (h6) Size', "mk_framework"),
        "id" => "h6_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Heading 6 (h6) Weight', "mk_framework"),
        "id" => "h6_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Heading 6 (h6) Text Transform', "mk_framework"),
        "id" => "h6_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Header Start Tour Link Font Size', "mk_framework"),
        "id" => "start_tour_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_main_navigation_typography'
    ),
    array(
        "name" => __("Typography / Main Navigation", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Main Items Space in Between', "mk_framework"),
        "desc" => __("This Value will be applied as padding to left and right of the item.", "mk_framework"),
        "id" => "main_nav_item_space",
        "min" => "0",
        "max" => "100",
        "step" => "1",
        "unit" => 'px',
        "default" => "25",
        "type" => "range"
    ),
    array(
        "name" => __('Menu Top Level Text Size', "mk_framework"),
        "id" => "main_nav_top_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "12",
        "type" => "range"
    ),
    array(
        "name" => __('Menu Top Level Text Weight', "mk_framework"),
        "id" => "main_nav_top_weight",
        "default" => 'bold',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_page_introduce_typography'
    ),
    array(
        "name" => __("Typography / Page Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Page Title Size', 'mk_framework'),
        "id" => "page_introduce_title_size",
        "min" => "10",
        "max" => "120",
        "step" => "1",
        "unit" => 'px',
        "default" => "34",
        "type" => "range"
    ),
    array(
        "name" => __('Page Title Weight', 'mk_framework'),
        "id" => "page_introduce_weight",
        "default" => 'lighter',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Page Title Text Transform', "mk_framework"),
        "id" => "page_title_transform",
        "default" => 'none',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Page Subtitle Size', 'mk_framework'),
        "id" => "page_introduce_subtitle_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Page Subtitle Text Transform', "mk_framework"),
        "id" => "page_introduce_subtitle_transform",
        "default" => 'none',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar_typography'
    ),
    array(
        "name" => __("Typography / Sidebar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Sidebar Title Size', "mk_framework"),
        "id" => "sidebar_title_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Sidebar Title Weight', "mk_framework"),
        "id" => "sidebar_title_weight",
        "default" => 'bolder',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Sidebar Title Text Transform', "mk_framework"),
        "id" => "sidebar_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Sidebar Text Size', "mk_framework"),
        "id" => "sidebar_text_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "12",
        "type" => "range"
    ),
    array(
        "name" => __('Sidebar Text Weight', "mk_framework"),
        "id" => "sidebar_text_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer_typography'
    ),
    array(
        "name" => __("Typography / Footer", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __('Footer Title Size', "mk_framework"),
        "id" => "footer_title_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "14",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Title Weight', "mk_framework"),
        "id" => "footer_title_weight",
        "default" => '800',
        "options" => $font_weight,
        "type" => "dropdown"
    ),
    array(
        "name" => __('Footer Title Text Transform', "mk_framework"),
        "id" => "footer_title_transform",
        "default" => 'uppercase',
        "options" => array(
            "none" => 'None',
            "uppercase" => 'Uppercase',
            "capitalize" => 'Capitalize',
            "lowercase" => 'Lower case'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __('Footer Text Size', "mk_framework"),
        "id" => "footer_text_size",
        "min" => "10",
        "max" => "50",
        "step" => "1",
        "unit" => 'px',
        "default" => "12",
        "type" => "range"
    ),
    array(
        "name" => __('Footer Text Weight', "mk_framework"),
        "id" => "footer_text_weight",
        "default" => 'normal',
        "options" => $font_weight,
        "type" => "dropdown"
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
