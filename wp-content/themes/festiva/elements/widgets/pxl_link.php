<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_link',
        'title' => esc_html__('BR Links', 'festiva'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'icon_image_type',
                                    'label' => esc_html__('Icon Image Type', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'img' => 'Image',
                                        'ic' => 'Icon',
                                    ],
                                    'default' => 'img',
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_image_type' => ['ic'],
                                    ],
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__( 'Icon Image', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'icon_image_type' => ['img'],
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'l_width',
                            'label' => esc_html__('Max Width', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'min_height',
                            'label' => esc_html__('Min Height', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link' => 'min-height: {{SIZE}}{{UNIT}}; align-items: center;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Link', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(

                        array(
                            'name' => 'heading_select_options',
                            'label' => esc_html__('Options', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'type',
                            'label' => esc_html__('Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'type-vertical' => 'Vertical',
                                'type-horizontal' => 'Horizontal',
                            ],
                            'default' => 'type-vertical',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-custom' => 'Custom',
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                
                            ],
                            'default' => 'style-2',
                        ),
                        array(
                            'name'  => 'list_style',
                            'label' => esc_html__('List Style','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'  => [
                                'none'  => esc_html__('None','festiva'),
                                'decimal'   => esc_html__('Decimal','festiva'),
                            ],
                            'default'   => 'none',
                        ),
                        array(
                            'name' => 'heading_typo_color',
                            'label' => esc_html__('Typography & Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Color', 'festiva'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a span' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-link span:after' => '--element-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-link span:before' => '--element-color: {{VALUE}};',
                            ],
                        ),
                        
                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Typography Text', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link a',
                        ),
                        array(
                            'name' => 'color_list_style',
                            'label' => esc_html__('Color List Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li .list_style' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'list_style'    => 'decimal',
                            ],
                        ),
                        array(
                            'name' => 'typography_list_style',
                            'label' => esc_html__('Typography List Style', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link li .list_style',
                            'condition' => [
                                'list_style'    => 'decimal',
                            ],
                        ),
                        array(
                            'name' => 'space_list_style',
                            'label' => esc_html__('List Style Space', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-link li .list_style' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'list_style'    => 'decimal',
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Divider Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link a:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-divider'],
                            ],
                        ),
                        array(
                            'name' => 'heading_border',
                            'label' => esc_html__('Border', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ), 
                        array(
                            'name' => 'border_link',
                            'label' => esc_html__('Border', 'festiva' ),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type'  => 'group',
                            'selector' => '{{WRAPPER}} .pxl-link li'

                        ),



                        array(
                            'name' => 'heading_extend_features',
                            'label' => esc_html__('Extend Features', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
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
                            '{{WRAPPER}} .pxl-link' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Align Items', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__( 'Flex Start', 'festiva' ),
                                    'icon' => 'far fa-arrow-alt-to-top',
                                ],
                                'Center' => [
                                    'title' => esc_html__( 'Center', 'festiva' ),
                                    'icon' => 'far fa-arrows-alt-v',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__( 'Flex End', 'festiva' ),
                                    'icon' => 'far fa-arrow-alt-to-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li a' => 'align-items: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'padding_items_list',
                            'label' => esc_html__('Padding Items List', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'margin_items_list',
                            'label' => esc_html__('Margin Items List', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-link li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'left_spacer',
                            'label' => esc_html__('Horizontal Spacer Left', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                        array(
                            'name' => 'right_spacer',
                            'label' => esc_html__('Horizontal Spacer Right', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-link.type-horizontal li' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'type' => ['type-horizontal'],
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-link a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-link a svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_color_type',
            'label' => esc_html__('Background Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'color' => 'Normal',
                'gradient' => 'Gradient',
            ],
            'default' => 'color',
        ),
        
        array(
            'name' => 'icon_background_color',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-link i' => 'background: {{VALUE}};',
                '{{WRAPPER}} .pxl-link a svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_color_type' => ['color'],
            ],
        ),

        array(
            'name' => 'bg_icon_color_gr',
            'label' => esc_html__('Background Color', 'festiva'),
            'type'         => \Elementor\Group_Control_Background::get_type(), 
            'control_type' => 'group', 
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} .pxl-link i',
            'condition' => [
                'icon_color_type'   => ['gradient'],
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
                'style' => ['style-round-box','style-square-box'],
                'box_color_hover_type' => ['gradient'],
            ],
        ),
        array(
            'name' => 'icon_space_top',
            'label' => esc_html__('Top Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a i' => 'margin-top: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a img' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_left',
            'label' => esc_html__('Left Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a i' => 'margin-left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a img' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_right',
            'label' => esc_html__('Right Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a i' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a img' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a svg' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Font Size', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_width',
            'label' => esc_html__('Min Width', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a i' => 'min-width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-link a img' => 'min-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_height',
            'label' => esc_html__('Min Height(Only Image)', 'festiva' ),
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
                '{{WRAPPER}} .pxl-link a img' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_hover',
    'label' => esc_html__('Hover', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'link_color_hover',
            'label' => esc_html__('Color Hover', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-link a span:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-link a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-link a:hover svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'link_bg_hover',
            'label' => esc_html__('Background Hover', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-link a:hover i:after' => 'background: {{VALUE}};',
            ],
        ),
    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);