<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('BR Icons', 'festiva'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Label', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'style' => ['style-2'],
                            ],
                        ),
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'sub_text',
                                    'label' => esc_html__('Sub Text', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                          'name' => 'align',
                          'label' => esc_html__( 'Alignment', 'festiva' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'festiva' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'festiva' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'festiva' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};',
                        ],
                    ),
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                'style-3' => 'Style 3',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__( 'Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__( 'Icon Color Hover', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
                            ],
                        ),  

                        array(
                            'name' => 'box_color_hover_type',
                            'label' => esc_html__('Box Color Hover Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'normal' => 'Normal',
                                'gradient' => 'Gradient',
                            ],
                            'default' => 'color',
                            'condition' => [
                                'style' => 'style-1'
                            ],
                        ),
                        array(
                            'name' => 'box_color_hover_normal',
                            'label' => esc_html__( 'Box Color Hover', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1.style-round-box a:hover, {{WRAPPER}} .pxl-icon1.style-square-box a:hover' => 'background-color: {{VALUE}} !important;border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-1',
                                'box_color_hover_type' => ['normal'],
                            ],
                        ),
                        array(
                            'name' => 'box_color_hover_from',
                            'label' => esc_html__( 'Box Color Hover - From', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-1',
                                'box_color_hover_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'box_color_hover_to',
                            'label' => esc_html__( 'Box Color Hover - To', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => 'style-1',
                                'box_color_hover_type' => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-icon1 svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_size',
                            'label' => esc_html__('Background Size Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 i' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Spacer (Left/Right)', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 6,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 a' => 'margin: 0 {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'color_sub_text',
                            'label' => esc_html__( 'Color Sub Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon1 .sub_text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Sub Text Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-icon-list .sub_text',
                        ),
                        array(
                            'name' => 'padding_sub_text',
                            'label' => esc_html__('Padding Sub Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-list .sub_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name'  => 'section_animation_infinite',
                    'label' => esc_html__('Animation Infinite','festiva'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls'  => array(
                        array(
                            'name'  => 'animation_icon',
                            'label' => esc_html__('Animation Icon','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                ''  => esc_html__('None','festiva'),
                                'ani_zoom' => 'Zoom Effect',
                                'ani_spin' => 'Spin',
                                'ani_oscillate' => 'Oscillate',
                            ],
                            'default'   => 'ani_scale',
                        ),
                    ),
                ),
festiva_widget_animation_settings(),


),
),
),
festiva_get_class_widget_path()
);