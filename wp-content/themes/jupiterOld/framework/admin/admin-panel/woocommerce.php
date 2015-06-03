<?php
$theme_options_woocommerce = array();

if ( !class_exists( 'woocommerce' ) ) { return false; }

$theme_options_woocommerce = array(
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_woocommrce'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_woo_general" => __("General Settings", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_woo_general'
    ),
    array(
        "name" => __("Advanced / Woocommerce", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Shop Catalog Mode", "mk_framework"),
        "desc" => __("This option will turn your shop to catalog mode. So users will not be able to shop in your site.", "mk_framework"),
        "id" => "woocommerce_catalog",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => __("Woocommerce Shop Layout", "mk_framework"),
        "id" => "woocommerce_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Product Loop Image Height", "mk_framework"),
        "desc" => __("Using this option you can change the product loop image height. default : 330", "mk_framework"),
        "id" => "woo_loop_img_height",
        "default" => "300",
        "min" => "100",
        "max" => "1000",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Shop Loop Image Quality", "mk_framework"),
        "id" => "woo_image_quality",
        "default" => "1",
        "options" => array(
            "1" => 'Normal Size',
            "2" => 'Retina Quality',
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Shop Page Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "woocommerce_shop_title",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Woocommerce Single Product Layout", "mk_framework"),
        "id" => "woocommerce_single_layout",
        "default" => "full",
        "options" => array(
            "left" => __("Left Sidebar", "mk_framework"),
            "right" => __("Right Sidebar", "mk_framework"),
            "full" => __("Full Layout", "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Single Product Page Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "woocommerce_single_product_title",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Shop Archive Page Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "woocommerce_archive_title",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Toolbar Checkout", "mk_framework"),
        "desc" => __("If you dont want to use header toolbar checkout section (in case if you only use product cataloges), diable this option.", "mk_framework"),
        "id" => "header_checkout_woocommerce",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Products Loops Image Cropping", "mk_framework"),
        "desc" => __("If you dont want to crop images in products loop disable this option.", "mk_framework"),
        "id" => "woocommerce_loop_crop",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Shopping Cart Location", "mk_framework"),
        "desc" => __("Using this option you can choose where your shopping cart locate.", "mk_framework"),
        "id" => "shopping_cart_location",
        "default" => 'toolbar',
        "options" => array(
            "toolbar" => __('Header Toolbar', "mk_framework"),
            "header" => __('Header Section', "mk_framework"),
            "disable" => __('Disable from both', "mk_framework")
        ),
        "type" => "radio"
    ),
    array(
        "name" => __("Excerpt For Products Loop", "mk_framework"),
        "desc" => __("If you would like to show some small description for products loop enable this option.", "mk_framework"),
        "id" => "woocommerce_loop_show_desc",
        "default" => 'false',
        "type" => "toggle"
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