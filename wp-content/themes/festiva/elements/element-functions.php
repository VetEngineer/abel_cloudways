<?php 

/**
 * Swipper Lib
*/
if(!function_exists('festiva_elements_scripts')){
    add_action( 'wp_enqueue_scripts', 'festiva_elements_scripts');
    function festiva_elements_scripts() {  
        $theme = wp_get_theme( get_template() );
        wp_enqueue_script('festiva-elementor', get_template_directory_uri() . '/elements/widgets/js/elementor.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-particle', get_template_directory_uri() . '/elements/widgets/js/particle.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-particle', get_template_directory_uri() . '/elements/widgets/js/particle.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-parallax', get_template_directory_uri() . '/elements/widgets/js/parallax.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-post-grid', get_template_directory_uri() . '/elements/widgets/js/grid.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
        wp_enqueue_script('pxl-countdown', get_template_directory_uri() . '/elements/widgets/js/pxl-countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_localize_script( 'pxl-post-grid', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_register_script('pxl-swiper', get_template_directory_uri() . '/elements/widgets/js/carousel.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_enqueue_script('festiva-typewrite', get_template_directory_uri() . '/elements/widgets/js/pxl-typewrite.js', ['jquery'], festiva()->get_version(), true);
        wp_register_script('festiva-counter', get_template_directory_uri() . '/elements/widgets/js/counter.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-accordion', get_template_directory_uri() . '/elements/widgets/js/accordion.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-tabs', get_template_directory_uri() . '/elements/widgets/js/tabs.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-progressbar', get_template_directory_uri() . '/elements/widgets/js/progressbar.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-countdown', get_template_directory_uri() . '/elements/widgets/js/countdown.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('pxl-pie-chart', get_template_directory_uri() . '/assets/js/libs/pie-chart.min.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        wp_register_script('festiva-pie-chart', get_template_directory_uri() . '/elements/widgets/js/pie-chart.js', [ 'jquery' ], $theme->get( 'Version' ), true);
        $pxl_api_key = festiva()->get_theme_opt( 'api_key' );
        $api_js = "https://maps.googleapis.com/maps/api/js?sensor=false&key=".$pxl_api_key;
        wp_register_script('pxl-map-api', $api_js, [], date("Ymd"));
        wp_register_script('pxl-map', get_template_directory_uri() . '/elements/widgets/js/map.js', ['pxl-map-api', 'jquery'], $theme->get( 'Version' ), true);
    }
}

/**
 * Extra Elementor Icons
*/
if(!function_exists('festiva_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'festiva_register_custom_icon_library');
    function festiva_register_custom_icon_library($tabs){
        $custom_tabs = [
            'pxl_icon1' => [
                'name' => 'flaticon',
                'label' => esc_html__( 'Festiva', 'festiva' ),
                'url' => false,
                'enqueue' => false,
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon-book',
                'ver' => '1.0.0',
                'fetchJson' =>  get_template_directory_uri(). '/assets/fonts/flaticon/flaticon.js',
                'native' => true,
            ],

        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

/**
 * Get class widget path
*/
if(!function_exists('festiva_get_class_widget_path')){
    function festiva_get_class_widget_path(){
        $upload_dir = wp_upload_dir();
        $cls_path = $upload_dir['basedir'].'/elementor-widget/';
        if(!is_dir($cls_path)) {
            wp_mkdir_p( $cls_path );
        }
        return $cls_path;
    }
}

/**
 * Get post type options
*/
function festiva_get_post_type_options($pt_supports=[]){
    $post_types = get_post_types([
        'public'   => true,
    ], 'objects');
    $excluded_post_type = [
        'page',
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
        'e-landing-page',
        'header',
        'footer',
        'mega-menu',
        'elementor_library'
    ];

    $result_some = [];
    $result_any = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $post_type) {
        if (!$post_type instanceof WP_Post_Type)
            continue;
        if (in_array($post_type->name, $excluded_post_type))
            continue;

        if(!empty($pt_supports) && in_array($post_type->name, $pt_supports)){
            $result_some[$post_type->name] = $post_type->labels->singular_name;
        }else{
            $result_any[$post_type->name] = $post_type->labels->singular_name;
        }
    }

    if(!empty($pt_supports))
        return $result_some;
    else   
        return $result_any;
}


/**
 * Start Post Grid Functions
*/
function festiva_get_post_grid_layout($pt_supports = []){
    $post_types  = festiva_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'festiva' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => festiva_get_grid_layout_options($name),
            'prefix_class' => 'pxl-post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;   
}

function festiva_get_grid_layout_options($post_type_name){
    $option_layouts = [];
    switch ($post_type_name) {

        case 'event':
        $option_layouts = [
            'event-2' => [
                'label' => esc_html__( 'Layout 2', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/event-layout1.png'
            ],
            'event-3' => [
                'label' => esc_html__( 'Layout 3', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/post-layout2.png'
            ],
        ];
        break;

        case 'post':  
        $option_layouts = [
            'post-1' => [
                'label' => esc_html__( 'Layout 1', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_grid/post-layout1.png'
            ],

        ];
        break;
    }
    return $option_layouts;
}

function festiva_get_grid_term_by_post_type($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]); 
    $post_types  = festiva_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
     
        $taxonomy = get_object_taxonomies($name, 'names');
        
        if($name == 'post') $taxonomy = ['category'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'festiva' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

function festiva_get_grid_ids_by_post_type($pt_supports = [], $args = []){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types = festiva_get_post_type_options($pt_supports);
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {

        $posts = festiva_list_post($name, false);
        
        $result[] = array(
            'name' => 'source_' . $name . '_post_ids',
            'label' => sprintf(esc_html__('Select posts', 'festiva'), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $posts,
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}

/**
 * End Post Grid Functions
*/


/**
 * Start Post Carousel Functions
*/
function festiva_get_post_carousel_layout($pt_supports = []){
    $post_types  = festiva_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
        $result[] = array(
            'name'     => 'layout_'.$name,
            'label'    => sprintf(esc_html__( 'Select Template of %s', 'festiva' ), $label),
            'type'     => 'layoutcontrol',
            'default' => 'post-1',
            'options'  => festiva_get_carousel_layout_options($name),
            'prefix_class' => 'post-layout-',
            'condition' => [
                'post_type' => [$name]
            ]
        );
    }
    return $result;   
}

function festiva_get_carousel_layout_options($post_type_name){
    $option_layouts = [];
    switch ($post_type_name) {

        case 'event':
        $option_layouts = [
            'event-1' => [
                'label' => esc_html__( 'Layout 1', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/event-layout1.png'
            ],
            'event-2' => [
                'label' => esc_html__( 'Layout 2', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/event-layout2.png'
            ],
            'event-3' => [
                'label' => esc_html__( 'Layout 3', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/event-layout3.png'
            ],
        ];
        break;

        case 'post':  
        $option_layouts = [
            'post-1' => [
                'label' => esc_html__( 'Layout 1', 'festiva' ),
                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_post_carousel/post-layout1.jpg'
            ],
        ];
        break;
    }
    return $option_layouts;
}

function festiva_get_carousel_term_by_post_type($pt_supports = [], $args=[]){
    $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
    $post_types  = festiva_get_post_type_options($pt_supports); 
    $result = [];
    if (!is_array($post_types))
        return $result;
    foreach ($post_types as $name => $label) {
     
        $taxonomy = get_object_taxonomies($name, 'names');
        
        if($name == 'post') $taxonomy = ['category'];

        $result[] = array(
            'name'     => 'source_'.$name,
            'label'    => sprintf(esc_html__( 'Select Term of %s', 'festiva' ), $label),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => pxl_get_grid_term_options($name,$taxonomy),
            'condition' => array_merge(
                [
                    $args['condition'] => [$name]
                ],
                $args['custom_condition']
            )
        );
    }

    return $result;
}
/**
 * End Post Carousel Functions
*/


/* Icon render */ 
function festiva_elementor_icon_render( $settings, $args = []){
    $args = wp_parse_args($args, [
        'prefix'     => '',   
        'id'         => 'selected_icon',
        'loop'       => false,
        'tag'        => 'div',   
        'wrap_class' => '',
        'class'      => '',
        'style'      => '',
        'before'     => '',
        'after'      => '',
        'atts'       => [],
        'animate_data' => '',
        'default_icon'    => [
            'value'   => '',
            'library' => ''
        ],
        'echo' => true
    ]);
    if($args['loop']) {
        $icon = $args['id'];
    } else {
        $icon = $settings[$args['id']];
    }
    if(empty($icon['value'])) $icon = $args['default_icon'];
    if (empty($icon['value'])) return;

    if ( 'svg' === $icon['library'] ){
        $args['before'] = '<span class="'.$args['wrap_class'].' '.$args['class'].'" data-settings="'. esc_attr($args['animate_data']).'">';
        $args['after']  = '</span>';
    }
    ob_start();
    printf('%s', $args['before']);
    ?>
    <?php \Elementor\Icons_Manager::render_icon( $icon, array_merge(
        [ 
            'aria-hidden' => 'true', 
            'class'       => trim(implode(' ', ['pxl-icon', $args['class'], $args['wrap_class']])),
            'style'       => $args['style']  
        ],
        $args['atts']
    ), $args['tag']); ?>
    <?php
    printf('%s', $args['after']);

    if($args['echo']){
        echo ob_get_clean();
    } else {
        return ob_get_clean();
    }
}

/**
 * Animation List
*/

function festiva_widget_animate() {
    $festiva_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipCase' => 'flipCase',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomInSmall' => 'zoomInSmall',
        'wow zoomIn' => 'zoomInBig',
        'wow zoomOut' => 'zoomOut',
        'wow skewIn' => 'skewIn',
        'wow RotatingY' => 'RotatingY',
        'wow PXLfadeInUp' => 'PXLfadeInUp',
        'wow PXLFlicker'  => 'PXLFlicker',
    );
    return $festiva_animate;
}

function festiva_widget_animate_v2() {
    $festiva_animate_v2 = array(
        '' => 'None',
        'wow letter' => 'Letter',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipCase' => 'flipCase',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomInSmall' => 'zoomInSmall',
        'wow zoomIn' => 'zoomInBig',
        'wow zoomOut' => 'zoomOut',
        'wow skewIn' => 'skewIn',
        'wow RotatingY' => 'RotatingY',
        'wow PXLfadeInUp' => 'PXLfadeInUp',
        'wow PXLFlicker'  => 'PXLFlicker',
    );
    return $festiva_animate_v2;
}




/**
 * Pagram Animation
*/
if(!function_exists('festiva_widget_animation_settings')){
    function festiva_widget_animation_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => []
        ]);
        return array(
            'name'      => 'section_animation',
            'label'     => esc_html__('Animation', 'festiva'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name' => 'pxl_animate',
                        'label' => esc_html__('Case Animate', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => festiva_widget_animate(),
                        'default' => '',
                    ),
                    array(
                        'name' => 'pxl_animate_delay',
                        'label' => esc_html__('Animate Delay', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '0',
                        'description' => 'Enter number. Default 0ms',
                    ),
                )
            )
        );
    }
}

if(!function_exists('festiva_widget_color_gradient')){
    function festiva_widget_color_gradient($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name'        => $args['prefix'] .'_color_gradient',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'festiva' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'] .'_color_gradient_from',
                'label' => esc_html__('From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_color_gradient!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_color_gradient_to',
                'label' => esc_html__('To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_color_gradient!' => '',
                ],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'festiva' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}

if(!function_exists('festiva_widget_color_gradient_rotate')){
    function festiva_widget_color_gradient_rotate($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name'        => $args['prefix'] .'_color_gradient',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'festiva' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'] .'_color_gradient_from',
                'label' => esc_html__('From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_color_gradient!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_color_gradient_to',
                'label' => esc_html__('To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_color_gradient!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_angle',
                'label' => esc_html__('Angle', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 360,
                        'step' => 10,
                    ],
                ],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'festiva' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}



// Color Gradient

if(!function_exists('festiva_widget_color_type')){
    function festiva_widget_color_type($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name' => $args['prefix'] .'_color_type',
                'label' => esc_html__('Color Type', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => 'Normal',
                    'gradient' => 'Gradient',
                ],
                'default' => 'normal',
            ),

            array(
                'name' => $args['prefix'] .'_normal_color',
                'label' => esc_html__('Normal Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => 'color: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'].'_color_type' => ['normal'],
                ],
            ),

            array(
                'name'        => $args['prefix'].'_gradient_color',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition' => [
                    $args['prefix'].'_color_type' => ['gradient'],
                ],
            ),
            array(
                'name'        => $args['prefix'].'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'festiva' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'].'_gradient_color_from',
                'label' => esc_html__('From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'].'_gradient_color_to',
                'label' => esc_html__('To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name'        => $args['prefix'].'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'festiva' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}

if(!function_exists('festiva_widget_gradient_color')){
    function festiva_widget_gradient_color($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name'        => $args['prefix'] .'_gradient_color',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'festiva' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_color_from',
                'label' => esc_html__('From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_color_to',
                'label' => esc_html__('To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'festiva' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}

if(!function_exists('festiva_widget_gradient_color_rotate')){
    function festiva_widget_gradient_color_rotate($args = []){
        $gradient_prefix_class = 'pxl-';
        $gradient_return_value = 'gradient';
        $args = wp_parse_args($args, [
            'label' => '',
            'prefix' => '',
            'selectors_class' => '',
            'condition' => []
        ]);
        $options = array(
            array(
                'name'        => $args['prefix'] .'_gradient_color',
                'label' => $args['label'] .' '.esc_html__('Gradient Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'prefix_class' => $gradient_prefix_class,
                'return_value' => $gradient_return_value,
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_start_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'Start Popover', 'festiva' ),
                'type'        => 'pxl_start_popover',
                'condition'   => $args['condition'],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_color_from',
                'label' => esc_html__('From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_color_to',
                'label' => esc_html__('To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$args['selectors_class'] => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    $args['prefix'] .'_gradient_color!' => '',
                ],
            ),
            array(
                'name' => $args['prefix'] .'_gradient_angle',
                'label' => esc_html__('Angle', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 360,
                        'step' => 10,
                    ],
                ],
            ),
            array(
                'name'        => $args['prefix'] .'pxl_end_popover',
                'label'       => ucfirst( str_replace('_', '', $args['prefix']) ).' '. esc_html__( 'End Popover', 'festiva' ),
                'type'        => 'pxl_end_popover',
                'condition'   => $args['condition'],
            ),
        );
        return $options;
    }
}
?>
<?php 
function svg_obj(){
    return '
    <svg width="572" height="962" viewBox="0 0 572 962" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M405.514 697.285C421.728 781.491 329.927 819.848 273.744 843.324C266.55 846.328 259.753 849.166 254.153 851.732C229.406 863.041 208.235 847.626 199.033 828.528C187.049 803.601 191.271 768.09 228.921 749.022C263.687 731.428 277.199 692.43 288.059 661.096C298.026 632.332 306.639 607.485 328.325 608.865C372.271 611.652 400.025 678.171 401.179 680.996L401.205 681.08C403.089 686.662 404.51 692.073 405.514 697.285ZM196.901 813.253C197.848 818.176 199.431 822.916 201.546 827.314C210.172 845.235 229.957 859.728 253.005 849.196C258.654 846.62 265.468 843.769 272.68 840.752C331.433 816.201 429.759 775.099 398.607 682.01C397.788 680.04 369.951 614.287 328.159 611.634C308.587 610.387 300.694 633.167 290.692 662.008C279.673 693.812 265.953 733.389 230.187 751.496C200.867 766.352 192.727 791.578 196.901 813.253Z" fill="white" fill-opacity="0.5"/>
        <g opacity="0.9524">
            <path d="M431.887 690.428C440.11 733.133 426.067 770.974 389.982 803.149C355.057 834.291 306.429 854.614 270.923 869.454C262.121 873.137 253.797 876.608 246.929 879.748C216.837 893.495 191.107 874.742 179.919 851.51C165.303 821.156 170.467 777.881 216.357 754.648C259.05 733.03 275.628 685.209 288.941 646.79C301.108 611.708 311.607 581.402 337.883 583.067C391.468 586.466 425.366 667.716 426.78 671.17L426.807 671.255C428.984 677.739 430.678 684.147 431.887 690.428ZM176.612 833.035C177.78 839.104 179.722 844.934 182.335 850.356C192.974 872.454 217.373 890.315 245.811 877.316C252.716 874.158 261.057 870.674 269.888 866.985C341.945 836.866 462.553 786.438 424.272 672.153C423.36 669.961 389.172 589.016 337.7 585.749C313.457 584.213 303.753 612.217 291.468 647.672C277.994 686.552 261.226 734.939 217.567 757.043C181.489 775.299 171.473 806.35 176.612 833.035Z" fill="white" fill-opacity="0.5"/>
        </g>
        <g opacity="0.9048">
            <path d="M458.385 684.057C468.096 734.488 451.515 779.182 408.899 817.18C367.613 853.993 310.098 878.025 268.102 895.583C257.671 899.939 247.823 904.053 239.697 907.766C204.278 923.947 173.97 901.859 160.798 874.494C143.561 838.679 149.653 787.663 203.772 760.268C254.395 734.636 274.029 677.994 289.812 632.475C304.16 591.079 316.555 555.313 347.423 557.272C410.647 561.283 451.95 660.34 452.362 661.339L452.389 661.424C454.962 669.081 456.957 676.639 458.385 684.057ZM156.322 852.807C157.71 860.013 160.025 866.95 163.12 873.377C175.761 899.646 204.787 920.882 238.626 905.425C246.79 901.695 256.665 897.565 267.105 893.207C352.468 857.528 462.553 786.438 424.272 672.153C423.36 669.961 389.172 589.016 337.7 585.749C313.457 584.213 303.753 612.217 291.468 647.672C277.994 686.552 261.226 734.939 217.567 757.043C181.489 775.299 171.473 806.35 176.612 833.035Z" fill="white" fill-opacity="0.5"/>
        </g>
        <g opacity="0.8571">
            <path d="M484.894 677.694C496.092 735.851 476.963 787.39 427.825 831.209C380.177 873.693 313.769 901.446 265.28 921.712C253.242 926.748 241.858 931.497 232.475 935.792C191.721 954.409 156.844 928.985 141.677 897.488C121.815 856.234 128.851 797.463 191.199 765.896C249.759 736.247 272.449 670.776 290.682 618.161C307.218 570.439 321.503 529.234 356.963 531.478C429.825 536.1 477.472 650.36 477.934 651.51L477.958 651.585C480.939 660.422 483.245 669.13 484.894 677.694ZM136.041 872.577C137.648 880.92 140.334 888.954 143.915 896.397C158.569 926.844 192.21 951.448 231.438 933.524C240.868 929.21 252.26 924.449 264.317 919.41C362.996 878.17 528.163 809.171 475.628 662.282C474.567 659.895 427.657 538.436 356.808 533.945C323.24 531.817 309.904 570.271 293.033 618.957C274.651 671.99 251.775 737.997 192.322 768.098C142.737 793.201 128.976 835.883 136.041 872.577Z" fill="white" fill-opacity="0.5"/>
        </g>
    </svg>';
}
?>