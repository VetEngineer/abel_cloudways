<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider',
        'title' => esc_html__('BR Slider', 'festiva'),
        'icon' => 'eicon-slider-device',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Slide', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'date' ,
                                    'label' => esc_html__('Date', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                                array(
                                    'name' => 'title' ,
                                    'label' => esc_html__('Title', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),

                                array(
                                    'name' => 'button' ,
                                    'label' => esc_html__('Button', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default'   => 'Button',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'img_feature',
                                    'label' => esc_html__( 'Image Feature', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                            'title_field' => '{{{ date }}}',
                        ),
                        array(
                            'name' => 'contact' ,
                            'label' => esc_html__('Contact', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'contact_link',
                            'label' => esc_html__('Link Contact', 'festiva'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => false,
                        ),
                    )
                ),

                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
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
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'heading_date',
                            'label' => esc_html__('Date','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name'  => 'date_color',
                            'label' => esc_html__('Text Color','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--date '=> 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name'  => 'date_bg_color',
                            'label' => esc_html__('Background Color','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--date '=> 'background: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'date_typography',
                            'label' => esc_html__(' Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--date',

                        ),
                        array(
                            'name' => 'date_border',
                            'label' => esc_html__('Border', 'festiva' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--date',

                        ),

                        array(
                            'name'  => 'heading_title',
                            'label' => esc_html__('Title','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name'  => 'title_color',
                            'label' => esc_html__('Text Color','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--title '=> 'color: {{VALUE}};'
                            ],
                        ),                       
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__(' Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--title',

                        ),


                        array(
                            'name'  => 'heading_button',
                            'label' => esc_html__('Button','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name'  => 'button_color',
                            'label' => esc_html__('Text Color','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--button a '=> 'color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name'  => 'button_bg_color',
                            'label' => esc_html__('Background Color','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--button a '=> 'background: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__(' Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--button a',

                        ),
                        array(
                            'name' => 'button_border_radius',
                            'label' => esc_html__('Border Radius', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_padding',
                            'label' => esc_html__('Padding', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider .pxl-swiper-slide .pxl-content--left .pxl-item--button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_contact',
    'label' => esc_html__('Contact', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name'  => 'contact_color',
            'label' => esc_html__('Text Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider .pxl-item--contact a '=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'contact_typography',
            'label' => esc_html__(' Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-slider .pxl-item--contact a',

        ),
    ),
),
),
),
),
festiva_get_class_widget_path()
);