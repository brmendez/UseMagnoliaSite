<?php
vc_map(array(
    "name" => __("Pricing Table", "mk_framework"),
    "base" => "mk_pricing_table",
    "class" => "mk-pricing-tables-class",
    "controls" => "edit_popup_delete",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "heading" => __("Table Style", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Multi Color", 'mk_framework') => "multicolor",
                __("Mono Color", 'mk_framework') => "monocolor"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Offers", "mk_framework"),
            "param_name" => "content",
            "value" => "",
            "description" => __("Please add your offers text. Note : List of offers must be an unordered list. If you dont need offers list, leave this textarea empty. The number of the list items should match the number of your pricing items list as well.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("How Many Tables?", "mk_framework"),
            "param_name" => "table_number",
            "value" => "4",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'table',
            "description" => __("How many pricing tables would you like to view?", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Tables", "mk_framework"),
            "param_name" => "tables",
            "value" => '',
            "options" => $pricing,
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
                
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved pricing items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Employees", "mk_framework"),
    "base" => "mk_employees",
    "class" => "mk-employees-class",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
                __('Simple', "mk_framework") => "simple",
                __('Boxed', "mk_framework") => "boxed"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Column", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("Defines how many column to be in one row.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Rounded Employee Image", "mk_framework"),
            "param_name" => "rounded_image",
            "value" => "true",
            "description" => __("This option will turn employee image to rounded. Disable this options if you dont want this style.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'simple'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Box Blur", "mk_framework"),
            "param_name" => "box_blur",
            "value" => "false",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'boxed'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Count", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'employee',
            "description" => __("How many Employees you would like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Employees", "mk_framework"),
            "param_name" => "employees",
            "value" => '',
            "options" => $employees,
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Description", "mk_framework"),
            "param_name" => "description",
            "value" => "true",
            "description" => __("If you dont want to show Employees description disable this option.", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
                
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved employee items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Viewport Animation", "mk_framework"),
            "param_name" => "animation",
            "value" => $css_animations,
            "description" => __("Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Clients", "mk_framework"),
    "base" => "mk_clients",
    "class" => "mk-clients-class",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("Choose clients loop style", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Carousel", 'mk_framework') => "carousel",
                __("Column", 'mk_framework') => "column"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns?", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "6",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("This option defines how many columns will be set in one row. This option only works for column style", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework"),
        ),
        array(
            "type" => "range",
            "heading" => __("Count", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'clients',
            "description" => __("How many Clients you would like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Clients", "mk_framework"),
            "param_name" => "clients",
            "value" => '',
            "options" => $clients,
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved client items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "color",
            "heading" => __("Box Background Color", "mk_framework"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "color",
            "heading" => __("Box Border Color", "mk_framework"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Fit to Background", "mk_framework"),
            "description" => __("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area", "mk_framework"),
            "param_name" => "cover",
            "value" => "false"
        ),
        array(
            "type" => "range",
            "heading" => __("Logos Height", "mk_framework"),
            "param_name" => "height",
            "value" => "110",
            "min" => "50",
            "max" => "300",
            "step" => "1",
            "unit" => 'px',
            "description" => __("You can change logos height using this option.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Autoplay?", "mk_framework"),
            "param_name" => "autoplay",
            "value" => "true",
            "description" => __("If yo dont want to autoplay the client slider disable this option.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "mk_framework"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => __("Target for the links.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Blog", "mk_framework"),
    "base" => "mk_blog",
    "class" => "mk-blog-loop-class",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("please select which blog loop style you would like to use.", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Modern", 'mk_framework') => "modern",
                __("Classic", 'mk_framework') => "classic",
                __("Newspaper", 'mk_framework') => "newspaper",
                __("Grid", 'mk_framework') => "grid"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns?", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("This option defines how many columns will be set in one row. Column only works for newspaper and grid styles.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid',
                    'newspaper'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Images Height", "mk_framework"),
            "param_name" => "grid_image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("How many Posts?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many Posts would you like to show? (-1 means unlimited, please note that unlimited will be overrided the limit you defined at : Wordpress Sidebar > Settings > Reading > Blog pages show at most.)", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Categories", "mk_framework"),
            "param_name" => "cat",
            "options" => $categories,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $posts,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        
        array(
            "type" => "toggle",
            "heading" => __("Disable Date", "mk_framework"),
            "param_name" => "disable_meta",
            "value" => "true",
            "description" => __("If you dont want to show post date disable this option.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Disable Lightbox on Featured Image", "mk_framework"),
            "param_name" => "disable_lightbox",
            "value" => "true",
            "description" => __("You can disable featured image lightbox globally using this option.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Comments Count & Social Share", "mk_framework"),
            "param_name" => "disable_comments_share",
            "value" => "true",
            "description" => __("Using this option you can disable Shocial Share and comments count from Blog loop.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'newspaper',
                    'classic'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Full Content in Blog Loop?", "mk_framework"),
            "param_name" => "full_content",
            "value" => "false",
            "description" => __("If you enable this option instead of blog excerpt the full post content will be shown.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Pagination?", "mk_framework"),
            "param_name" => "pagination",
            "value" => "true",
            "description" => __("If you dont want to have pagination for this loop disable this option.", "mk_framework")
        ),
        array(
            "heading" => __("Pagination Style", 'mk_framework'),
            "description" => __("please select which pagination style you would like to use on this loop.", 'mk_framework'),
            "param_name" => "pagination_style",
            "value" => array(
                __("Classic Pagination Navigation", 'mk_framework') => "1",
                __("Load more button", 'mk_framework') => "2",
                __("Load more on page scroll", 'mk_framework') => "3"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
                
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved Blog items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Posts Carousel", "mk_framework"),
    "base" => "mk_blog_carousel",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "heading" => __("Choose Post Type", 'mk_framework'),
            "description" => __("", 'mk_framework'),
            "param_name" => "post_type",
            "value" => array(
                __("Blog", 'mk_framework') => "post",
                __("News", 'mk_framework') => "news"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("View All Page", 'mk_framework'),
            "description" => __("Select the page you would like to navigate if [View All] link clicked.", 'mk_framework'),
            "param_name" => "view_all",
            "value" => $pages,
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => __("How many Posts?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many Posts would you like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Enable Excerpt", "mk_framework"),
            "param_name" => "enable_excerpt",
            "value" => "false",
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "post_type",
                'value' => array(
                    'post'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Categories", "mk_framework"),
            "param_name" => "cat",
            "options" => $categories,
            "value" => '',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "post_type",
                'value' => array(
                    'post'
                )
            )
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $posts,
            "value" => '',
            "description" => __("", "mk_framework"),
            "dependency" => array(
                'element' => "post_type",
                'value' => array(
                    'post'
                )
            )
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
                
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved Blog items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Blog Showcase", "mk_framework"),
    "base" => "mk_blog_showcase",
    "class" => "mk-blog-loop-class",
    "controls" => "edit_popup_delete",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Categories", "mk_framework"),
            "param_name" => "cat",
            "options" => $categories,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $posts,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
                
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved Blog items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Portfolio", "mk_framework"),
    "base" => "mk_portfolio",
    "class" => "mk-portfolio-loop-class",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("please select which Portfolio loop style you would like to use.", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Classic", 'mk_framework') => "classic",
                __("Modern", 'mk_framework') => "modern"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => __("Shows Posts Using Ajax?", "mk_framework"),
            "param_name" => "ajax",
            "value" => "false",
            "description" => __("If you enable this option the portfolio posts items will be viewed in the same page above the loop.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("How many Columns?", "mk_framework"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "6",
            "step" => "1",
            "unit" => 'columns',
            "description" => __("How many columns you would like to have in one row? Please note that the actual size you will get be different around 10px. 3, 4, 5, 6 column in with sidebar layouts will be 2 columns.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Disable Excerpt?", "mk_framework"),
            "param_name" => "disable_excerpt",
            "value" => "true",
            "description" => __("If you dont want excerpt to be viewed in Portfolio newspaper style loop disable this option.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => __("Disable Permalink", "mk_framework"),
            "param_name" => "disable_permalink",
            "value" => "true",
            "description" => __("If dont need portfolio single post you can remove permalink from image hover icon and title.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("How many Posts?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many Posts would you like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Sortable?", "mk_framework"),
            "param_name" => "sortable",
            "value" => "true",
            "description" => __("If you dont want sortable filter navigation disable this option.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $portfolio_posts,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Select Specific Categories.", "mk_framework"),
            "param_name" => "cat",
            "value" => '',
            "description" => __("You will need to go to Wordpress Dashboard => Portfolios => Portfolio Categories. In the right hand find Slug column. you will need to add portfolio category slugs in this option. add comma to separate them.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Image Height", "mk_framework"),
            "param_name" => "height",
            "value" => "300",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Increase Quality of Image", "mk_framework"),
            "param_name" => "image_quality",
            "value" => array(
                __("Normal Quality", 'mk_framework') => "1",
                __("Images 2 times bigger (retina compatible)", 'mk_framework') => "2",
                __("Images 3 times bigger (fullwidth row compatible)", 'mk_framework') => "3"
            ),
            "description" => __("If you want portfolio images to be retina compatible or you just want to use it in fullwidth row, you may consider increasing the image size. This option will help you define the image quality yourself.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Disable Pagination?", "mk_framework"),
            "param_name" => "pagination",
            "value" => "true",
            "description" => __("If you dont want to have pagination for this loop disable this option.", "mk_framework")
        ),
        array(
            "heading" => __("Pagination Style", 'mk_framework'),
            "description" => __("please select which pagination style you would like to use on this loop.", 'mk_framework'),
            "param_name" => "pagination_style",
            "value" => array(
                __("Classic Pagination Navigation", 'mk_framework') => "1",
                __("Load more button", 'mk_framework') => "2",
                __("Load more on page scroll", 'mk_framework') => "3"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved Blog items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "mk_framework"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => __("Target for title permalink and image hover permalink icon.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("Portfolio Carousel", "mk_framework"),
    "base" => "mk_portfolio_carousel",
    "class" => "mk-portfolio-loop-class",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "heading" => __("Style", 'mk_framework'),
            "description" => __("please select which style you would like to use.", 'mk_framework'),
            "param_name" => "style",
            "value" => array(
                __("Classic", 'mk_framework') => "classic",
                __("Modern (Screen wide)", 'mk_framework') => "modern"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading Title", "mk_framework"),
            "param_name" => "title",
            "value" => "",
            "description" => __("", "mk_framework")
        ),
        array(
            "heading" => __("View All Page", 'mk_framework'),
            "description" => __("Select the page you would like to navigate if [View All] link clicked.", 'mk_framework'),
            "param_name" => "view_all",
            "value" => $pages,
            "type" => "dropdown",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("How many Posts?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many Posts would you like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Visible Items at Once", "mk_framework"),
            "param_name" => "show_items",
            "value" => "4",
            "min" => "1",
            "max" => "10",
            "step" => "1",
            "unit" => 'items',
            "description" => __("How many items you would like to show in carousel?", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Increase Quality of Image", "mk_framework"),
            "param_name" => "image_quality",
            "value" => array(
                __("Normal Quality", 'mk_framework') => "1",
                __("Images 2 times bigger (retina compatible)", 'mk_framework') => "2",
                __("Images 3 times bigger (fullwidth row compatible)", 'mk_framework') => "3"
            ),
            "description" => __("If you want portfolio images to be retina compatible or you just want to use it in fullwidth row, you may consider increasing the image size. This option will help you define the image quality yourself.", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $portfolio_posts,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Select Specific Categories.", "mk_framework"),
            "param_name" => "cat",
            "value" => '',
            "description" => __("You will need to go to Wordpress Dashboard => Portfolios => Portfolio Categories. In the right hand find Slug column. you will need to add portfolio category slugs in this option. add comma to separate them.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Title and Category?", "mk_framework"),
            "param_name" => "disable_title_cat",
            "value" => "true",
            "description" => __("Disable this option if you dont want to show post title and cateogry. this option is only for modern style.", "mk_framework"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved Portfolio items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("News", "mk_framework"),
    "base" => "mk_news",
    "class" => "mk-news-loop-class",
    "controls" => "edit_popup_delete",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "type" => "range",
            "heading" => __("How many News Posts?", "mk_framework"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("How many News Posts you would like to show? (-1 means unlimited)", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Posts", "mk_framework"),
            "param_name" => "posts",
            "options" => $news_posts,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "multiselect",
            "heading" => __("Select specific Authors", "mk_framework"),
            "param_name" => "author",
            "options" => $authors,
            "value" => '',
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Image Height", "mk_framework"),
            "param_name" => "image_height",
            "value" => "250",
            "min" => "150",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => __("This height will be applied to all posts height including posts without a featured image.", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Disable Pagination?", "mk_framework"),
            "param_name" => "pagination",
            "value" => "true",
            "description" => __("If you dont want to have pagination for this loop disable this option.", "mk_framework")
        ),
        array(
            "heading" => __("Pagination Style", 'mk_framework'),
            "description" => __("please select which pagination style you would like to use on this loop.", 'mk_framework'),
            "param_name" => "pagination_style",
            "value" => array(
                __("Load more button", 'mk_framework') => "2",
                __("Classic Pagination Navigation", 'mk_framework') => "1",
                __("Load more on page scroll", 'mk_framework') => "3"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("DESC (descending order)", 'mk_framework') => "DESC",
                __("ASC (ascending order)", 'mk_framework') => "ASC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved News items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));
vc_map(array(
    "name" => __("FAQ", "mk_framework"),
    "base" => "mk_faq",
    "class" => "mk-faq-class",
    "controls" => "edit_popup_delete",
    "category" => __('Loops', 'mk_framework'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Style", "mk_framework"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                __('Fancy', "mk_framework") => "fancy",
                __('Simple', "mk_framework") => "simple"
            ),
            "description" => __("", "mk_framework")
        ),
        array(
            "type" => "toggle",
            "heading" => __("Sortable?", "mk_framework"),
            "param_name" => "sortable",
            "value" => "true",
            "description" => __("If you dont want sortable filter navigation disable this option.", "mk_framework")
        ),
        array(
            "type" => "range",
            "heading" => __("Count", "mk_framework"),
            "param_name" => "count",
            "value" => "50",
            "min" => "-1",
            "max" => "300",
            "step" => "1",
            "unit" => 'FAQs'
        ),
        array(
            "type" => "range",
            "heading" => __("Offset", "mk_framework"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => __("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "mk_framework")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Select Specific Categories.", "mk_framework"),
            "param_name" => "cat",
            "value" => '',
            "description" => __("You will need to go to Wordpress Dashboard => FAQ => FAQ Categories. In the right hand find Slug column. you will need to add FAQ category slugs in this option. add comma to separate them.", "mk_framework")
        ),
        array(
            "heading" => __("Order", 'mk_framework'),
            "description" => __("Designates the ascending or descending order of the 'orderby' parameter.", 'mk_framework'),
            "param_name" => "order",
            "value" => array(
                __("ASC (ascending order)", 'mk_framework') => "ASC",
                __("DESC (descending order)", 'mk_framework') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => __("Orderby", 'mk_framework'),
            "description" => __("Sort retrieved FAQ items by parameter.", 'mk_framework'),
            "param_name" => "orderby",
            "value" => $mk_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "mk_framework"),
            "param_name" => "el_class",
            "value" => "",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "mk_framework")
        )
    )
));


