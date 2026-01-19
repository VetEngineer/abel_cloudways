<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_invitation_carousel',
        'title' => esc_html__('BR Invitation Carousel', 'festiva'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_invitation_card/layout1.png'
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
                            'name' => 'invitation',
                            'label' => esc_html__('Invitation', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                             array(
                                'name'  => 'stage',
                                'label' => esc_html__('Stage','festiva'),
                                'type'  => \Elementor\Controls_Manager::TEXT,
                                'label_block'   => true,
                            ),
                             array(
                                'name'  => 'title',
                                'label' => esc_html__('Title','festiva'),
                                'type'  => \Elementor\Controls_Manager::TEXT,
                                'label_block'   => true,
                            ),
                             array(
                                'name' => 'link',
                                'label' => esc_html__('Link', 'festiva'),
                                'type' => \Elementor\Controls_Manager::URL,
                                'label_block' => true,
                            ),
                             array(
                                'name'  => 'describe',
                                'label' => esc_html__('Describe','festiva'),
                                'type'  => \Elementor\Controls_Manager::TEXT,
                                'label_block'   => true,
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
    'name'  => 'section_style',
    'label' => esc_html__('Style','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'heading_stage',
            'label' => esc_html__('Stage','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'color_text_stage',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--stage' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'typography_text_stage',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--stage',
        ),

        array(
            'name'  => 'heading_title',
            'label' => esc_html__('Title','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'color_text_title',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'typography_text_title',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--title',
        ),

        array(
            'name'  => 'heading_desc',
            'label' => esc_html__('Describe','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'color_text_desc',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--describe' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'typography_text_desc',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-inner--describe',
        ),

        array(
            'name'  => 'heading_number',
            'label' => esc_html__('Number','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'color_text_number',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-number' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'typography_text_number',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-invitation-carousel .pxl-item--inner .pxl-number',
        ),
    ),
),

festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);