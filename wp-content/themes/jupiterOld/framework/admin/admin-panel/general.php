<?php
$theme_options_general = array(
    array(
        "type" => "start",
    ),
    array(
        "type" => "start_main_pane",
        "id" => 'mk_options_general'
    ),
    array(
        "type" => "start_sub",
        "options" => array(
            "mk_options_global_settings" => __("Global Settings", "mk_framework"),
            "mk_options_header_toolbar" => __("Header Toolbar", "mk_framework"),
            "mk_options_header_section" => __("Header", "mk_framework"),
            "mk_options_sidebar" => __("Custom Sidebars", "mk_framework"),
            "mk_options_footer" => __("Footer", "mk_framework"),
            "mk_options_quick_contact" => __("Quick Contact Form", "mk_framework")
        )
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_global_settings'
    ),
    array(
        "name" => __("General / Global Settings Settings", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Custom Favicon", "mk_framework"),
        "desc" => __("Using this option, You can upload your own custom favicon.", "mk_framework"),
        "id" => "custom_favicon",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Breadcrumb Globally", "mk_framework"),
        "desc" => __("You can disable breadcrumb navigation globally using this option, or you may need to disable it in a page locally.", "mk_framework"),
        "id" => "disable_breadcrumb",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Smooth Scroll", "mk_framework"),
        "desc" => __("If you enable this option page scrolling will have smooth with easing effect.", "mk_framework"),
        "id" => "disable_smoothscroll",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header SearchForm Location", "mk_framework"),
        "desc" => __("You can define header search form location between header toolbar or header main section. Its recommended to choose header Main area if you have chosen modern style in main navigation.", "mk_framework"),
        "id" => "header_search_location",
        "default" => 'beside_nav',
        "options" => array(
            "disable" => __('Disable', "mk_framework"),
            "toolbar" => __('Header Toolbar', "mk_framework"),
            "header" => __('Header Main Area', "mk_framework"),
            "beside_nav" => __('Inside Main Navigation with Tooltip (With Ajax Search)', "mk_framework"),
            "beside_nav_no_ajax" => __('Inside Main Navigation with Tooltip (Without Ajax Search)', "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Page Title in Homepage", "mk_framework"),
        "desc" => __("By default Page title is disabled in Homepage, but you can enable it using this option.", "mk_framework"),
        "id" => "disable_homepage_title",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => __("Main Navigation Threshold Width", "mk_framework"),
        "desc" => __("This value defines when Main Navigation should viewed as Responsive Navigation. Default is 1140px but if your Navigation items fits in header in smaller widths you can change this value. For example if you wish to view your website in iPad and see Main Navigtion as you see in desktop, then you should change this value to any size below 1020px.", "mk_framework"),
        "id" => "responsive_nav_width",
        "default" => "1140",
        "min" => "600",
        "max" => "1380",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Main Grid Width", "mk_framework"),
        "desc" => __("This option defines the main content max-width. default value is 1140px", "mk_framework"),
        "id" => "grid_width",
        "default" => "1140",
        "min" => "960",
        "max" => "1380",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Content Width (in percent)", "mk_framework"),
        "desc" => __("Using this option you can define the width of the content. please note that its in percent, lets say if you set it 60%, sidebar will occupy 40% of the main conent space.", "mk_framework"),
        "id" => "content_width",
        "default" => "73",
        "min" => "50",
        "max" => "80",
        "step" => "1",
        "unit" => '%',
        "type" => "range"
    ),
    array(
        "name" => __("Main Content Responsive State", "mk_framework"),
        "desc" => __("Please define in which width of the screen the content & sidebar turn to fullwidth.", "mk_framework"),
        "id" => "content_responsive",
        "default" => "960",
        "min" => "800",
        "max" => "1140",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Apple iPhone Icon", "mk_framework"),
        "desc" => __("Icon for Apple iPhone (57px x 57px)", "mk_framework"),
        "id" => "iphone_icon",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Apple iPhone Retina Icon", "mk_framework"),
        "desc" => __("Icon for Apple iPhone Retina Version (114px x 114px)", "mk_framework"),
        "id" => "iphone_icon_retina",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Apple iPad Icon Upload", "mk_framework"),
        "desc" => __("Icon for Apple iPhone (72px x 72px)", "mk_framework"),
        "id" => "ipad_icon",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Apple iPad Retina Icon Upload", "mk_framework"),
        "desc" => __("Icon for Apple iPad Retina Version (144px x 144px)", "mk_framework"),
        "id" => "ipad_icon_retina",
        "default" => '',
        "type" => 'upload'
    ),
    array(
        "name" => __("Google Analytics ID", "mk_framework"),
        "desc" => __("Enter your Google Analytics ID here to track your site with Google Analytics.", "mk_framework"),
        "id" => "analytics",
        "default" => "",
        "type" => "text"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_toolbar'
    ),
    array(
        "name" => __("General / Header Toolbar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Header Toolbar", "mk_framework"),
        "desc" => __("You can Disable/Enable Header toolbar using this option", "mk_framework"),
        "id" => "disable_header_toolbar",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Toolbar Date", "mk_framework"),
        "desc" => __("If you enable this option today's date will be displayed on header toolbar. make sure your hosting server date configurations works as expected otherwise you might need to fix in hosting settings.", "mk_framework"),
        "id" => "enable_header_date",
        "default" => 'false',
        "type" => "toggle"
    ),

    array(
        "name" => __("Header Toolbar Tagline", "mk_framework"),
        "desc" => __("Fill this area which represents your site slogan or an important message.", "mk_framework"),
        "id" => "header_toolbar_tagline",
        "default" => "",
        "type" => "text"
    ),
    array(
        "name" => __("Header Toolbar Contact Info (Phone Number)", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_phone",
        "default" => "123-123456789",
        "type" => "text"
    ),
    array(
        "name" => __("Header Toolbar Contact Info (Email Address)", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_email",
        "default" => "some@companyname.com",
        "type" => "text"
    ),
    array(
        "name" => __("Header Toolbar Login Form", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_login",
        "default" => "true",
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Mailchimp Subscribe Form", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_toolbar_subscribe",
        "default" => "false",
        "type" => "toggle"
    ),
    array(
        "name" => __("Mailchimp List Subscribe Form URL", "mk_framework"),
        "desc" => __("This URL can be retrived from your mailchimp dashboard > Lists > your desired list > list settings > forms. in your form creation page you will need to click on 'share it' tab then find 'Your subscribe form lives at this URL:'. its a short URL so you will need to visit this link. once you get into the your created form page, then copy the full address and paste it here in this form. URL look like http://YOUR_USER_NAME.us6.list-manage.com/subscribe?u=d5f4e5e82a59166b0cfbc716f&id=4db82d169b", "mk_framework"),
        "id" => "mailchimp_action_url",
        "default" => "",
        "rows" => 2,
        "type" => "textarea"
    ),
    array(
        "name" => __("Header Toolbar Social Networks", "mk_framework"),
        "desc" => __("You can disable or enable header toolbar social networks from this option, you can control the icons from the below option.", "mk_framework"),
        "id" => "disable_header_social_networks",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Toolbar Social Networks Style", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "header_social_networks_style",
        "default" => 'circle',
        "options" => array(
            "circle" => 'Circled',
            "rounded" => 'Rounded',
            "simple" => 'Simple'
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Add New Network", "mk_framework"),
        "desc" => __("Select your social website and enter the full URL to your profile on the site, then click on add new button. then hit save settings.", "mk_framework"),
        "id" => "header_social_networks_site",
        "default" => '',
        "type" => 'header_social_networks'
    ),
    array(
        "id" => "header_social_networks_url",
        "default" => "",
        "type" => 'hidden_input'
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_header_section'
    ),
    array(
        "name" => __("General / Header", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Upload Custom Logo", "mk_framework"),
        "id" => "logo",
        "default" => "",
        "type" => "upload"
    ),
    array(
        "name" => __("Upload Custom Logo (Mobile Version)", "mk_framework"),
        "desc" => __("Use this option to change your logo for mobile devices if your logo width is quite long to fit in mobile device screen.", "mk_framework"),
        "id" => "responsive_logo",
        "default" => "",
        "type" => "upload"
    ),
    array(
        "name" => __("Boxed Header", "mk_framework"),
        "desc" => __("This option will fit the header and header toolbar into main gird container which you define in global settings.", "mk_framework"),
        "id" => "header_grid",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => __("Header Height", "mk_framework"),
        "desc" => __("You can change header header height using this option. (default:100px).", "mk_framework"),
        "id" => "header_height",
        "default" => "90",
        "min" => "50",
        "max" => "800",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Sticky Header?", "mk_framework"),
        "desc" => __("If you enable this option , header will be fixed on top of your browser window.", "mk_framework"),
        "id" => "enable_sticky_header",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Sticky Header Height", "mk_framework"),
        "desc" => __("While scrolling page header sticks to top with position fixed. This option defines header height on fixed mode. (default:50px).", "mk_framework"),
        "id" => "header_scroll_height",
        "default" => "55",
        "min" => "20",
        "max" => "400",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => __("Logo Position", "mk_framework"),
        "desc" => __("You can set your logo to stay on left or center. Please note that center align only works when Classic Style has been chosen from below option.", "mk_framework"),
        "id" => "logo_position",
        "default" => 'left',
        "options" => array(
            "left" => 'Left',
            "center" => 'Center',
            "right" => 'Right'
        ),
        "type" => "radio"
    ),
    array(
        "name" => __("Main Navigation for Logged In User", "mk_framework"),
        "desc" => __("Please choose the menu location that you would like to show as global main navigation for logged in users. You should first <a target='_blank' href='" . admin_url('nav-menus.php') . "'>create menu</a> and then <a target='_blank' href='" . admin_url('nav-menus.php') . "?action=locations'>assign to menu locations</a>", "mk_framework"),
        "id" => "loggedin_menu",
        "default" => 'primary-menu',
        "options" => array(
             "primary-menu" => __('Primary Navigation', "mk_framework"),
              "second-menu" => __('Second Navigation', "mk_framework"),
              "third-menu" => __('Third Navigation', "mk_framework"),
              "fourth-menu" => __('Fourth Navigation', "mk_framework")
        ),
        "type" => "dropdown"
    ),
    array(
        "name" => __("Main Navigation Styles", "mk_framework"),
        "desc" => __("You can switch between 2 main navigation styles.", "mk_framework"),
        "id" => "main_nav_style",
        "default" => 'modern',
        "options" => array(
            "modern" => 'Modern',
            "classic" => 'Classic'
        ),
        "type" => "radio"
    ),
    array(
        "name" => __("Main Navigation Align", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "main_menu_align",
        "default" => 'center',
        "options" => array(
            "left" => 'Left',
            "center" => 'Center',
            "right" => 'Right'
        ),
        "type" => "radio"
    ),
    array(
        "name" => __("Header Start Tour Page", "mk_framework"),
        "desc" => __("Please Select the page you would like this link be navigated once clicked.", "mk_framework"),
        "id" => "header_start_tour_page",
        "target" => 'page',
        "option_structure" => 'sub',
        "type" => "superlink"
    ),
    array(
        "name" => __("Header Start Tour Text", "mk_framework"),
        "desc" => __("If you dont want to show sart a tour link leave this field blank.", "mk_framework"),
        "id" => "header_start_tour_text",
        "default" => __("START A TOUR", "mk_framework"),
        "type" => "text"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_sidebar'
    ),
    array(
        "name" => __("General / Custom Sidebar", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Create a new sidebar", "mk_framework"),
        "desc" => __("Enter a name for new sidebar. It must be a valid name which starts with a letter, followed by letters, numbers, spaces, or underscores", "mk_framework"),
        "id" => "sidebars",
        "default" => '',
        "type" => 'custom_sidebar'
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_footer'
    ),
    array(
        "name" => __("General / Footer", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Footer", "mk_framework"),
        "desc" => __("You can enable or disable footer section using this option.", "mk_framework"),
        "id" => "disable_footer",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Footer Column layout", "mk_framework"),
        "id" => "footer_columns",
        "default" => "4",
        "item_padding" => "30px 30px 0 0",
        "options" => array(
            "1" => 'column_1',
            "2" => 'column_2',
            "3" => 'column_3',
            "4" => 'column_4',
            "5" => 'column_5',
            "6" => 'column_6',
            "half_sub_half" => 'column_half_sub_half',
            "half_sub_third" => 'column_half_sub_third',
            "third_sub_third" => 'column_third_sub_third',
            "third_sub_fourth" => 'column_third_sub_fourth',
            "sub_half_half" => 'column_sub_half_half',
            "sub_third_half" => 'column_sub_third_half',
            "sub_third_third" => 'column_sub_third_third',
            "sub_fourth_third" => 'column_sub_fourth_third'
        ),
        "type" => "visual_selector"
    ),
    array(
        "name" => __("Sub Footer", "mk_framework"),
        "desc" => __("Use this option to enable or disable the sub-footer.", "mk_framework"),
        "id" => "disable_sub_footer",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => "Footer Toolbar Navigation",
        "desc" => __("This option allows you to enable a custom navigation on the left section of custom footer.", "mk_framework"),
        "id" => "enable_footer_nav",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Footer Logo", "mk_framework"),
        "desc" => __("This will appear in the sub-footer section. Your image shouldn't not exceed 150 * 60 pixels.", "mk_framework"),
        "id" => "footer_logo",
        "default" => "",
        "type" => "upload"
    ),
    array(
        "name" => __("Copyright Text", "mk_framework"),
        "desc" => "",
        "id" => "copyright",
        "default" => 'Copyright All Rights Reserved &copy; 2012',
        "type" => "textarea"
    ),
    array(
        "type" => "end_pane"
    ),
    array(
        "type" => "end_sub_pane"
    ),
    array(
        "type" => "start_sub_pane",
        "id" => 'mk_options_quick_contact'
    ),
    array(
        "name" => __("General / Quick Contact", "mk_framework"),
        "desc" => __("Quick Contact is a floating contact form accessible by a button that will be always stick to the website's bottom right section.", "mk_framework"),
        "type" => "heading"
    ),
    array(
        "name" => __("Quick Contact", "mk_framework"),
        "desc" => __("You can enable or disable this section using this option.", "mk_framework"),
        "id" => "disable_quick_contact",
        "default" => 'true',
        "type" => "toggle"
    ),
    array(
        "name" => __("Quick Contact Title", "mk_framework"),
        "desc" => __("", "mk_framework"),
        "id" => "quick_contact_title",
        "default" => __("Contact Us", "mk_framework"),
        "type" => "text"
    ),
    array(
        "name" => __("Quick Contact Email", "mk_framework"),
        "desc" => __("This email will be used for sending this form's inqueries. Admin's email will be used as default email.", "mk_framework"),
        "id" => "quick_contact_email",
        "default" => get_bloginfo('admin_email'),
        "type" => "text"
    ),
    array(
        "name" => __("Quick Contact Description", "mk_framework"),
        "desc" => "",
        "id" => "quick_contact_desc",
        "default" => __("We're not around right now. But you can send us an email and we'll get back to you, asap.", "mk_framework"),
        "type" => "textarea"
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