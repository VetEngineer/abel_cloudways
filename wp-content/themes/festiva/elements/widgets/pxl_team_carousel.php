<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_carousel',
        'title' => esc_html__('BR Team Carousel', 'festiva'),
        'icon' => 'eicon-lock-user',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
                    'label' => esc_html__('Layout', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'festiva' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_carousel/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_carousel/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                        ),
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Content', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(

                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                               
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Author Name', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'festiva' ),
                                    'type' => 'pxl_icons',
                                ),

                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'description'   => 'Only apply to Layout 2.'
                                ),

                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_p_hv',
                            'label' => esc_html__('Color El Hover', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}}  .pxl-team .pxl-item--inner:hover .plus' => 'background-color: {{VALUE}} ;',
                                '{{WRAPPER}}  .pxl-team .pxl-item--inner:hover .pxl-item--title a' => 'color: {{VALUE}};',
                                '{{WRAPPER}}  .pxl-team .pxl-item--inner:hover .pxl-item--position' => 'color: {{VALUE}} ;',
                                '{{WRAPPER}}  .pxl-team .pxl-item--inner:hover .pxl-item--social a' => 'background-color: {{VALUE}} ;',
                            ],
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),


                        array(
                            'name' => 'title_color_type',
                            'label' => esc_html__('Title Color Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'normal' => 'Normal',
                                'gradient' => 'Gradient',
                            ],
                            'default' => 'gradient',
                        ),
                        array(
                            'name' => 'title_normal_color',
                            'label' => esc_html__('Title Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-inner .pxl-item--title' => '--gradient-color-from: {{VALUE}}; --gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['normal'],
                            ],
                        ),
                        array(
                            'name' => 'title_gradient_from',
                            'label' => esc_html__( 'Color - From', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-inner .pxl-item--title' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'title_gradient_to',
                            'label' => esc_html__( 'Color - To', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-carousel-inner .pxl-item--title' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'title_color_type' => ['gradient'],
                            ],
                        ),

                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--title',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-team .pxl-item--position' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-team .pxl-item--position',
                        ),

                        array(
                            'name' => 'color_ic',
                            'label' => esc_html__('Color Icon Social', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}}  .pxl-team i' => 'color: {{VALUE}} !important;',
                            ],
                        ),

                        array(
                            'name' => 'font_size_ic',
                            'label' => esc_html__('Font Size Icon Social', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}}  .pxl-team i' => 'font-size:  {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        
                        array(
                            'name' => 'gap_ic',
                            'label' => esc_html__('Gap Icon Social', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}}  .pxl-team-carousel1 .pxl-item--social' => 'gap: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),

                        array(
                            'name' => 'svg_gradient_color_from_1',
                            'label' => esc_html__('SVG From 1', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'svg_gradient_color_to_1',
                            'label' => esc_html__('SVG To 1', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'svg_gradient_color_from_2',
                            'label' => esc_html__('SVG From 2', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'svg_gradient_color_to_2',
                            'label' => esc_html__('SVG To 2', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),

                    ),
),
array(
    'name' => 'section_carousel_settings',
    'label' => esc_html__('Carousel Settings', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
        ),
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_sm',
            'label' => esc_html__('Columns SM Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_lg',
            'label' => esc_html__('Columns LG Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xxl',
            'label' => esc_html__('Columns XXL Devices', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),

        array(
            'name' => 'slides_to_scroll',
            'label' => esc_html__('Slides to scroll', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'arrows',
            'label' => esc_html__('Show Arrows', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'pagination',
            'label' => esc_html__('Show Pagination', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'pagination_type',
            'label' => esc_html__('Pagination Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'bullets',
            'options' => [
                'bullets' => 'Bullets',
                'fraction' => 'Fraction',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay_speed',
            'label' => esc_html__('Autoplay Delay', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5000,
            'condition' => [
                'autoplay' => 'true'
            ]
        ),
        array(
            'name' => 'infinite',
            'label' => esc_html__('Infinite Loop', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 500,
        ),
        array(
            'name' => 'drap',
            'label' => esc_html__('Show Scroll Drap', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);