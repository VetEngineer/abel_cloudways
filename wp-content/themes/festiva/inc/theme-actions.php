<?php 
/**
 * Actions Hook for the theme
 *
 * @package Bravis-Themes
 */
add_action('after_setup_theme', 'festiva_setup');
function festiva_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'festiva_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'festiva', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'festiva' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'post-formats', array (
        'quote',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'festiva-thumb-small', 147, 96, true );
    add_image_size( 'festiva-thumb-xs', 120, 104, true );
    add_image_size( 'festiva-large', 844, 512, true );
    add_image_size( 'festiva-portfolio', 600, 600, true );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'festiva_widgets_position' );
function festiva_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'festiva' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'festiva' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'festiva' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'festiva_scripts' );
function festiva_scripts() {  
    $festiva_version = wp_get_theme( get_template() );

    /* Popup Libs */
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

    /* Wow Libs */
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );

    /* Particles Background Libs */
    wp_register_script( 'particles-background', get_template_directory_uri() . '/assets/js/libs/particles.min.js', array( 'jquery' ), '1.1.0', true );

    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Parallax Libs */
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );
    wp_enqueue_script( 'pxl-parallax-background', get_template_directory_uri() . '/assets/js/libs/parallax-background.js', array( 'jquery' ), $festiva_version->get( 'Version' ), true );


    /* Nice Select */
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.min.js', array( 'jquery' ), 'all', true );

    /* Icons Lib - CSS */
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css' , array(), $festiva_version->get( 'Version' ));

    /* Counter Effect */
    wp_register_script( 'pxl-counter-slide', get_template_directory_uri() . '/assets/js/libs/counter-slide.min.js', array( 'jquery' ), '1.0.0', true );


    //
    wp_enqueue_script( 'pxl-parallax-scroll', get_template_directory_uri() . '/assets/js/libs/parallax-scroll.js', array( 'jquery' ), $festiva_version->get( 'Version' ), true );

    /* Scroll Effect */
    wp_register_script( 'pxl-scroll', get_template_directory_uri() . '/assets/js/libs/scroll.min.js', array( 'jquery' ), '0.6.0', true );

    /* Parallax Scroll */
    wp_register_script( 'pxl-parallax-scroll', get_template_directory_uri() . '/assets/js/libs/parallax-scroll.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'pxl-easing', get_template_directory_uri() . '/assets/js/libs/easing.js', array( 'jquery' ), '1.3.0', true );

    /* Tweenmax */
    wp_register_script( 'pxl-tweenmax', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '2.1.2', true );
    
    /* Parallax Move Mouse */
    wp_register_script( 'pxl-parallax-move-mouse', get_template_directory_uri() . '/assets/js/libs/parallax-move-mouse.js', array( 'jquery' ), '1.0.0', true );

    /* Woocommerce */
    //wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $festiva_version->get( 'Version' ), true );

    /* Cookie */
    wp_register_script( 'pxl-cookie', get_template_directory_uri() . '/assets/js/libs/cookie.js', array( 'jquery' ), '1.4.1', true );

    wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $festiva_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $festiva_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $festiva_version->get( 'Version' ) );
    wp_add_inline_style( 'pxl-style', festiva_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $festiva_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', festiva_fonts_url(), array(), null );
    wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $festiva_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'festiva_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'festiva_admin_style');
function festiva_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'festiva-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'elementor-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'festiva-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'festiva_site_favicon');
function festiva_site_favicon(){
    $favicon = festiva()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'festiva_pingback_header' );
function festiva_pingback_header(){
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

/* Hidden Panel */
add_action( 'pxl_anchor_target', 'festiva_hook_anchor_templates_hidden_panel');
function festiva_hook_anchor_templates_hidden_panel(){

    $hidden_templates = festiva_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('festiva_hook_anchor_hidden_panel')){
    function festiva_hook_anchor_hidden_panel($args){
        $hidden_panel_bg = get_post_meta( $args['post_id'], 'hidden_panel_bg', true );
        $hidden_panel_width = get_post_meta( $args['post_id'], 'hidden_panel_width', true );
        ?>
        <div id="pxl-hidden-panel-popup" class="pxl-popup-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta"></div>
            <div class="pxl-item--conent" style="background-color: <?php echo esc_attr($hidden_panel_bg); ?>; width:<?php echo esc_attr($hidden_panel_width).'px'; ?>;">
                <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                <div class="pxl-conent-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
                </div>
            </div>
        </div>
    <?php }
}

/* Elementor Popup */
add_action( 'pxl_anchor_target', 'festiva_hook_anchor_templates_popup');
function festiva_hook_anchor_templates_popup(){

    $popup_templates = festiva_get_templates_slug('popup');
    if(empty($popup_templates)) return;

    foreach ($popup_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_popup_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_popup_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('festiva_hook_anchor_popup')){
    function festiva_hook_anchor_popup($args){ ?>
        <div id="pxl-popup-elementor" class="pxl-popup-elementor-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta">
                <div class="pxl-item--flip pxl-item--flip1"></div>
                <div class="pxl-item--flip pxl-item--flip2"></div>
                <div class="pxl-item--flip pxl-item--flip3"></div>
                <div class="pxl-item--flip pxl-item--flip4"></div>
                <div class="pxl-item--flip pxl-item--flip5"></div>
            </div>
            <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
            <div class="pxl-item--conent">
                <div class="pxl-conent-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
                </div>
            </div>
        </div>
    <?php }
}

/* Search Popup */
if(!function_exists('festiva_hook_anchor_search')){
    function festiva_hook_anchor_search(){
        $logo_m = festiva()->get_theme_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo-light.png', 'id' => '' ] ); ?>
        <div id="pxl-search-popup">
            <div class="pxl-item--overlay"></div>
            <div class="pxl-item--logo">
                <?php
                if ($logo_m['url']) {
                    printf(
                        '<a href="%1$s" title="%2$s" rel="home">
                        <img src="%3$s" alt="%2$s" class="logo-light"/>
                        </a>',
                        esc_url( home_url( '/' ) ),
                        esc_attr( get_bloginfo( 'name' ) ),
                        esc_url( $logo_m['url'] )
                    );
                }
                ?>
            </div>
            <div class="pxl-item--conent">
                <div class="pxl-item--close pxl-close"></div>
                <form  method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" required placeholder="<?php esc_attr_e('Type Your Search Words...', 'festiva'); ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit rm-style-default"><i class="caseicon-search"></i></button>
                    <div class="pxl--search-divider"></div>
                </form>
            </div>
        </div>
    <?php }
}         

/* Cart Sidebar */
if(!function_exists('festiva_hook_anchor_cart')){
    function festiva_hook_anchor_cart(){ ?>
        <div id="pxl-cart-sidebar" class="pxl-popup-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta"></div>
            <div class="pxl-item--conent pxl-widget-cart-sidebar">
                <div class="widget_shopping_cart">
                    <div class="widget_shopping_head">
                        <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                        <div class="widget_shopping_title">
                            <?php echo esc_html__( 'Cart', 'festiva' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'festiva' ), WC()->cart->cart_contents_count ); ?>)</span>
                        </div>
                    </div>
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}