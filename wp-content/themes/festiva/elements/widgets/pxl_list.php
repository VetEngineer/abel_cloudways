<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('BR List', 'festiva'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'pxl_title',
                            'label' => esc_html__('Title','festiva'),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('Content', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'  => 'sub_text',
                                    'label' => esc_html__('Sub Text', 'festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'label_block'   => true,
                                ),
                                array(
                                    'name'  => 'btn_link',
                                    'label' => esc_html__('Link','festiva'),
                                    'type'  => \Elementor\Controls_Manager::URL,
                                    'label_block'   => true,
                                    
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'pxl-type-list',
                            'label' => esc_html__('Type','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                'type-vertical'      => 'Vertical',
                                'type-horizontal'   => 'Horizontal',
                            ],
                            'default'   => 'type-vertical',
                        ),

                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
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
                                '{{WRAPPER}} .pxl-list .pxl--item' => 'align-items: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'pxl-type-list'  => 'type-horizontal',
                            ],
                        ),
                        array(
                            'name' => 'justify_content',
                            'label' => esc_html__('Justify Content', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Flex Start', 'festiva' ),
                                    'icon' => 'eicon-justify-start-h',
                                ],
                                'Center' => [
                                    'title' => esc_html__( 'Center', 'festiva' ),
                                    'icon' => 'eicon-justify-center-h',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Flex End', 'festiva' ),
                                    'icon' => 'eicon-justify-end-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list' => 'justify-content: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list .pxl--item' => 'justify-content: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list' => 'text-align: {{VALUE}};',
                            ],
                        ),

                    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_text_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_text_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list .pxl--title',
        ),
        array(
            'name' => 'title_space',
            'label' => esc_html__('Title Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_text',
    'label' => esc_html__('Text', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'text_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item-text' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list .pxl--item .pxl-item-text',
        ),

        array(
            'name' => 'text_space',
            'label' => esc_html__('Text Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl--item .pxl-item--text .pxl-item-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_sub_text',
    'label' => esc_html__('Sub Text', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'sub_text_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--text .pxl-sub-text' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_text_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list .pxl-sub-text',
        ),
        array(
            'name' => 'sub_text_space',
            'label' => esc_html__('Sub Text Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-sub-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'style_icon',
            'label' => esc_html__('Style Icon', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
                'style-3' => 'Style-3',
                'style-custom'  => 'Custom',

            ],
            'default'   => 'style-1',
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color Icon', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-list .pxl-item--icon svg path' => 'fill: {{VALUE}};',
            ],
        ),

        array(
            'name' => 'icon_size',
            'label' => esc_html__('Size Icon', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-list .pxl-item--icon svg' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),

        array(
            'name'  => 'rotate_icon',
            'label' => esc_html__('Rotate Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => ['deg','custom'],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
            ],

        ),



        array(
            'name' => 'bg_icon_color_type',
            'label' => esc_html__('Background Color Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'bg_color' => 'Normal',
                'bg_gradient' => 'Gradient',
            ],
            'default' => 'bg_gradient',
        ),
        array(
            'name' => 'bg_icon_color',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'background: {{VALUE}};',

            ],
            'condition' => [
                'bg_icon_color_type' => ['bg_color'],
            ],
        ),
        array(
           'name' => 'bg_icon_color_gr',
           'label' => esc_html__('Gradient Color', 'festiva'),
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-list .pxl-item--icon',
           'condition' => [
            'bg_icon_color_type'   => ['bg_gradient'],
        ],
    ),





        array(
            'name'  => 'background_icon_size',
            'label' => esc_html__('Background Size','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; min-height: {{SIZE}}{{UNIT}};',
            ],
        ),

        array(
            'name' => 'icon_space',
            'label' => esc_html__('Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list .pxl-item--icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);