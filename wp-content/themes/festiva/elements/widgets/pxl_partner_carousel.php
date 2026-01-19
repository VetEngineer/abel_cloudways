<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_partner_carousel',
        'title' => esc_html__('BR Partner Carousel', 'festiva'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'  => 'section_layout',
                    'label' => esc_html__('Layout','festiva'),
                    'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls'  => array(
                        array(
                            'name'  => 'layout',
                            'label' => esc_html__('Templates','festiva'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_partner_carousel/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_partner_carousel/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'partner',
                            'label' => esc_html__('Partner', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'logo',
                                    'label' => esc_html__('Logo', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'  => 'industry',
                                    'label' => esc_html__('Industry','festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'label_block'   => true,
                                    'description'   => 'Only apply to layout 2',
                                ),
                                array(
                                    'name'  => 'position',
                                    'label' => esc_html__('Position','festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'label_block'   => true,
                                    'description'   => 'Only apply to layout 2',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
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
                            'label' => esc_html__('Autoplay Speed', 'festiva'),
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
                    ),
),
array(
    'name'  => 'section_style_logo',
    'label' => esc_html__('Logo','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  =>  array(
        array(
            'name'  => 'logo_height',
            'label' => esc_html__('Height','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'control_type'  => 'responsive',
            'size_units'    => ['px','custom'],
            'range'         => [
                'px'    => [
                    'min'   => 0,
                    'max'   => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-partner-carousel .pxl-item--logo img' => 'height: {{SIZE}}{{UNIT}};'
            ],
        ),
        array(
            'name'  => 'logo_width',
            'label' => esc_html__('Width','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'control_type'  => 'responsive',
            'size_units'    => ['px','custom'],
            'range'         => [
                'px'    => [
                    'min'   => 0,
                    'max'   => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-partner-carousel .pxl-item--logo img' => 'width: {{SIZE}}{{UNIT}};'
            ],
        ),
    ),
),
array(
    'name' => 'section_style_industry',
    'label' => esc_html__('Industry','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'color_industry',
            'label' => esc_html__('Color Industry','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-sliders .pxl-item-industry' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name'  => 'industry_typography',
            'label' => esc_html__('Industry Typography','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector'  => '{{WRAPPER}} .pxl-swiper-sliders .pxl-carousel-inner .pxl-swiper-slide .pxl-item--inner .pxl-item-industry',
        ),
    ),
),
array(
    'name' => 'section_style_position',
    'label' => esc_html__('Position','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'color_position',
            'label' => esc_html__('Color Position','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-sliders .pxl-item-position' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name'  => 'potision_typography',
            'label' => esc_html__('Position Typography','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector'  => '{{WRAPPER}} .pxl-swiper-sliders .pxl-carousel-inner .pxl-swiper-slide .pxl-item--inner .pxl-item-position',
        ),
    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);