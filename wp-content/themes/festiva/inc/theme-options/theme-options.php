<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = festiva()->get_option_name();
$version = festiva()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'festiva'),
    'page_title'           => esc_html__('Theme Options', 'festiva'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Festiva_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'festiva'),
    'icon'   => 'el-icon-home',
    'fields' => array(

    )
));

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'festiva'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'festiva'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'third_color',
            'type'    => 'color',
            'title'   => esc_html__('Third Color', 'festiva'),
            'default'     => '',
            'transparent' => false,
        ),
        array(
            'id'      => 'four_color',
            'type'    => 'color',
            'title'   => esc_html__('Four Color', 'festiva'),
            'default'     => '',
            'transparent' => false,
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'festiva'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'festiva'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => '',
            ),
            'output'  => array('a')
        ),
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Body Color', 'festiva'),
            'subtitle' => esc_html__('Body Background color.', 'festiva'),
            'output'   => array('background-color' => '#pxl-wapper')
        ),
        
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Favicon', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'festiva'),
            'default'  => '',
            'url'      => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mouse', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'festiva'),
            'default'  => false
        ),
        array(
            'id'    => 'mouse_move_style',
            'type'  => 'select',
            'title' => esc_html__('Mouse Move Style', 'festiva'),
            'options' => [
                'style-default'           => esc_html__('Default', 'festiva'),
                'style-morden'           => esc_html__('Morden', 'festiva'),
            ],
            'default' => 'style-default',
            'indent' => true,
            'required' => array( 0 => 'mouse_move_animation', 1 => 'equals', 2 => true ),
        ),
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Loader', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'festiva'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'festiva'),
            'options' => [
                'style-default'           => esc_html__('Default', 'festiva'),
                'style-fashion'           => esc_html__('Fashion', 'festiva'),
                'style-digital'           => esc_html__('Digital', 'festiva'),
                'style-software'           => esc_html__('Software', 'festiva'),
                'style-business'           => esc_html__('Business', 'festiva'),
                'style-insurance'           => esc_html__('Insurance', 'festiva'),
                'style-event'           => esc_html__('Event', 'festiva'),
                'style-corporate'           => esc_html__('Corporate', 'festiva'),
                'style-startup'           => esc_html__('Startup', 'festiva'),
                'style-app'           => esc_html__('App', 'festiva'),
                'style-photography'           => esc_html__('Photography', 'festiva'),
                'style-architecture'           => esc_html__('Architecture', 'festiva'),
                'style-seo'           => esc_html__('Seo', 'festiva'),
                'style-portfolio'           => esc_html__('Portfolio Dark', 'festiva'),
                'style-portfolio2'           => esc_html__('Portfolio Light', 'festiva'),
                'style-law'           => esc_html__('Law', 'festiva'),
                'style-wave'           => esc_html__('Wave', 'festiva'),
            ],
            'default' => 'style-default',
            'indent' => true,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
        ),
        array(
            'id'      => 'loader_text',
            'type'    => 'text',
            'title'   => esc_html__('Loader Text', 'festiva'),
            'default' => '',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
        array(
            'id'             => 'loading_text',
            'type'           => 'text',
            'title'          => esc_html__('Loading Text 1', 'festiva'),
            'default'        => '',
            'desc'           => esc_html__('Enter the text displayed on load.', 'festiva'),
            'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
            'force_output'   => true
        ),
        array(
            'id'             => 'loading_text2',
            'type'           => 'text',
            'title'          => esc_html__('Loading Text 2', 'festiva'),
            'default'        => '',
            'desc'           => esc_html__('Color Primary', 'festiva'),
            'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
            'force_output'   => true
        ),
        array(
            'id'       => 'loader_text_color',
            'type'     => 'button_set',
            'title'    => esc_html__('Color Type', 'festiva'),
            'options'  => array(
                'primary' => esc_html__('Primary', 'festiva'),
                'gradient' => esc_html__('Gradient', 'festiva'),
            ),
            'default'  => 'primary',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'festiva'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        festiva_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'festiva'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'festiva'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'festiva'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
            array(
                'id'       => 'p_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Menu', 'festiva' ),
                'options'  => festiva_get_nav_menu_slug(),
                'default' => '',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mobile_display',
            'type'     => 'button_set',
            'title'    => esc_html__('Display', 'festiva'),
            'options'  => array(
                'show'  => esc_html__('Show', 'festiva'),
                'hide'  => esc_html__('Hide', 'festiva'),
            ),
            'default'  => 'show'
        ),
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Select Logo', 'festiva'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
            'url'      => false,
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'festiva'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'       => 'pm_menu',
            'type'     => 'select',
            'title'    => esc_html__( 'Select Menu Mobile', 'festiva' ),
            'options'  => festiva_get_nav_menu_slug(),
            'default' => '-1',
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'festiva'),
            'default'  => true,
            'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'search_placeholder_mobile',
            'type'    => 'text',
            'title'   => esc_html__('Search Text Placeholder', 'festiva'),
            'default' => '',
            'subtitle' => esc_html__('Default: Search...', 'festiva'),
            'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'festiva'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        festiva_page_title_opts()
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'festiva'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        festiva_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'festiva'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'button_set',
                'title'    => esc_html__('Footer Fixed', 'festiva'),
                'options'  => array(
                    'on' => esc_html__('On', 'festiva'),
                    'off' => esc_html__('Off', 'festiva'),
                ),
                'default'  => 'off',
            ),
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'festiva'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        festiva_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'festiva'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_categorie',
                'title'    => esc_html__('Categorie', 'festiva'),
                'subtitle' => esc_html__('Display the Categorie for each blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'festiva'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'festiva'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'festiva'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'festiva'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'festiva'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'festiva'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        festiva_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Post Title Type', 'festiva'),
                'options'  => array(
                    'default' => esc_html__('Default', 'festiva'),
                    'custom_text' => esc_html__('Custom Text', 'festiva'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'post_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Post Title Text', 'festiva'),
                'default' => 'Blog Details',
                'required' => array( 0 => 'post_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'festiva'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_social_share_social',
                'title'    => esc_html__('Share Social', 'festiva'),
                'subtitle' => esc_html__('Display the Share for blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => false
            ),
            array(
                'id'      => 'sg_featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'festiva'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'title' => esc_html__('Author Box', 'festiva'),
                'type'  => 'section',
                'id' => 'social_section_author',
                'indent' => false,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Box', 'festiva'),
                'subtitle' => esc_html__('Display info author for blog post.', 'festiva'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_author_position',
                'title'    => esc_html__('Description Author', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'link_facebook',
                'title'    => esc_html__('Facebook', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'link_instagram',
                'title'    => esc_html__('Instagram', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'link_twitter',
                'title'    => esc_html__('Twitter', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'link_pinterest',
                'title'    => esc_html__('Pinterest', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'link_linkedin',
                'title'    => esc_html__('LinkedIn', 'festiva'),
                'type'     => 'text',
                'default'  => '',
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
)
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'festiva'),
        'icon'   => 'el el-shopping-cart',
        'fields'     => array_merge(
            festiva_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'       => 'shop_layout',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Layout', 'festiva'),
                    'options'  => array(
                        'grid'  => esc_html__('Grid', 'festiva'),
                        'list'  => esc_html__('List', 'festiva'),
                    ),
                    'default'  => 'grid',
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'festiva'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'festiva'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 5,
                    'display_value' => 'text',
                    'required' => array( 0 => 'shop_layout', 1 => 'equals', 2 => 'grid' ),
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'festiva'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'festiva'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
                array(
                    'title' => esc_html__('Single Product', 'festiva'),
                    'type'  => 'section',
                    'id' => 'shop_single',
                    'indent' => true,
                ),
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'festiva'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'festiva'),
                    'default'  => false
                ),
            )
        )
    ));
}
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'festiva'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'pxl_body_typography',
            'type'     => 'select',
            'title'    => esc_html__('Body Font Type', 'festiva'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'festiva'),
                'google-font'  => esc_html__('Google Font', 'festiva'),
            ),
            'default'  => 'default-font',
        ),

        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'festiva'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_body_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'       => 'pxl_heading_typography',
            'type'     => 'select',
            'title'    => esc_html__('Heading Font Type', 'festiva'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'festiva'),
                'google-font'  => esc_html__('Google Font', 'festiva'),
            ),
            'default'  => 'default-font',
        ),
        
        // array(
        //     'id'          => 'font_heading',
        //     'type'        => 'typography',
        //     'title'       => esc_html__('Heading Google Font', 'festiva'),
        //     'google'      => true,
        //     'font-backup' => true,
        //     'all_styles'  => true,
        //     'text-align'  => false,
        //     'line-height'  => false,
        //     'font-size'  => false,
        //     'font-backup'  => false,
        //     'font-style'  => false,
        //     'output'      => array('h1,h2,h3,h4,h5,h6,.ft-heading-default'),
        //     'units'       => 'px',
        //     'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
        //     'force_output' => true
        // ),

        array(
            'id'          => 'theme_default',
            'type'        => 'typography',
            'title'       => esc_html__('Theme Default', 'festiva'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'festiva'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'festiva'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'       => 'portfolio_display',
            'type'     => 'switch',
            'title'    => esc_html__('Portfolio', 'festiva'),
            'default'  => true
        ),
        array(
            'id'       => 'link_p_grid',
            'title'    => esc_html__('Portfolio Gird Link', 'festiva'),
            'type'     => 'text',
            'default'  => '',
            'indent' => true,
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'festiva'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'festiva'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'festiva' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Service', 'festiva'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'service_display',
            'type'     => 'switch',
            'title'    => esc_html__('Service', 'festiva'),
            'default'  => true
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'festiva'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'festiva'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'festiva' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Event', 'festiva'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'event_display',
            'type'     => 'switch',
            'title'    => esc_html__('Event', 'festiva'),
            'default'  => true
        ),
        array(
            'id'      => 'event_slug',
            'type'    => 'text',
            'title'   => esc_html__('Event Slug', 'festiva'),
            'default' => '',
            'desc'     => 'Default: event',
            'required' => array( 0 => 'event_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'event_name',
            'type'    => 'text',
            'title'   => esc_html__('Event Name', 'festiva'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'event_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_event_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'festiva' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'event_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
    )
));

//Page 404
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Page 404', 'festiva'),
    'icon'       => 'el el-website',
    'fields'     => array(
        array(
            'id'       => 'background_404',
            'type'     => 'media',
            'title'    => esc_html__('Background Image', 'festiva'),
        ),
        array(
            'id' => 'title_404',
            'type' => 'text',
            'title' => esc_html__('Title', 'festiva'),
        ),
        array(
            'id' => 'description_404',
            'type' => 'text',
            'title' => esc_html__('Description', 'festiva'),
        ),
        array(
            'id'       => 'search_bar_404',
            'type'     => 'switch',
            'title'    => esc_html__('Search Bar', 'festiva'),
            'default'  => true
        ),
    ),
));