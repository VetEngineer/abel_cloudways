<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'festiva' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'btn_layout',
                            'label' => esc_html__('Layout', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-style-1',
                            'options' => [
                                'btn-style-1' => esc_html__('Style 1', 'festiva' ),
                                'btn-style-2' => esc_html__('Style 2', 'festiva' ),
                                'btn-style-3' => esc_html__('Style 3', 'festiva' ),
                                'btn-style-4' => esc_html__('Style 4', 'festiva' ),
                                'btn-style-5' => esc_html__('Style 5', 'festiva' ),
                                'btn-style-6' => esc_html__('Style 6','festiva'),
                                'btn-style-custom' => esc_html__('Custom', 'festiva' ),
                            ],
                        ),

                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'festiva'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'festiva' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'festiva' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'festiva' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'festiva' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),

                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'festiva' ),
                                'right' => esc_html__('After', 'festiva' ),
                            ],
                        ),
                    ),
),

array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE, 
    'controls' => array_merge(
        array(
            array(
                'name'  => 'heading_text',
                'label' => esc_html__('Text','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ),
            array(
                'name'  => 'btn_color_type',
                'label' => esc_html__('Text Color','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .pxl--btn-text'=> 'color:{{VALUE}};',
                ], 
            ),
            array(
                'name' => 'btn_typography',
                'label' => esc_html__('Typography', 'festiva' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-button .btn' ,
            ),
            array(
                'name'  => 'heading_fontsize',
                'label' => esc_html__('Font Size Button','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'btn_layout'    => 'btn-style-3'
                ],

            ),
            array(
                'name' => 'button_height',
                'label' => esc_html__('Height', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_layout'    => 'btn-style-3',
                ],
            ),
            array(
                'name' => 'button_width',
                'label' => esc_html__('Width', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'btn_layout'    => 'btn-style-3',
                ],
            ),

            array(
                'name'  => 'heading_background',
                'label' => esc_html__('Background','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ),
            array(
                'name'  => 'btn_bg_color_type',
                'label' => esc_html__('Background Color Type','festiva'),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options'=> [
                    'bg_color_normal'    => 'Normal',
                    'bg_color_gradient'    => 'Gradient',
                ],
                'default'  => 'bg_color_gradient',
            ),
            array(
                'name'  => 'btn_bg_color_type_normal',
                'label' => esc_html__('Background Color','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button a'=> 'background: {{VALUE}};',
                ], 
                'condition' => [
                    'btn_bg_color_type' => 'bg_color_normal',
                ],
            ),
            array(
             'name' => 'btn_bg_color_gr',
             'label' => esc_html__('Background Gradient Color', 'festiva'),
             'type'         => \Elementor\Group_Control_Background::get_type(), 
             'control_type' => 'group', 
             'types' => [ 'gradient' ],
             'selector' => '{{WRAPPER}} .pxl-button a',
             'condition' => [
                'btn_bg_color_type' => ['bg_color_gradient'],
            ],
        ),

            array(
                'name'  => 'heading_border',
                'label' => esc_html__('Border','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ),
            array(
                'name' => 'btn_border',
                'type' => \Elementor\Group_Control_Border::get_type(),
                'control_type'  => 'group', 
                'selector' => '{{WRAPPER}} .pxl-button .btn',
            ),
            array(
                'name' => 'btn_border_radius',
                'label' => esc_html__('Border Radius', 'festiva' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','custom'],
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .pxl-button .btn i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'name' => 'btn_padding',
                'label' => esc_html__('Padding', 'festiva' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','custom'],
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'control_type' => 'responsive',
            ),

        ), 
),



),

array(
    'name' => 'section_style_button_hv',
    'label' => esc_html__('Button Hover', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE, 
    'controls' => array_merge(
        array(

            array(
                'name' => 'button_hover2_color',
                'label' => esc_html__('Color Text', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn:hover span,
                    {{WRAPPER}} .pxl-button .btn::after'  => 'color: {{VALUE}};',
                ],

            ),
            array(
                'name'  => 'button_hover_type',
                'label' => esc_html__('Style Hover','festiva'),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    ''  => 'Default',
                    'btn-hover1'    => 'Flip',  
                    'btn-hover2'    => 'Popup',  
                    'btn-hover3'    => 'Fade',  
                ],
                'default'   => '',
            ),


            array(
                'name'  => 'heading_before',
                'label' => 'Before',
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ),
            array(
                'name' => 'button_hover2_bg_from',
                'label' => esc_html__( 'Background Color From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn::before' => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ),
            array(
                'name' => 'button_hover2_bg_to',
                'label' => esc_html__( 'Background Color To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn::before' => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ), 

            array(
                'name'  => 'heading_after',
                'label' => 'After',
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ),
            array(
                'name' => 'button_hover2_bg_from_after',
                'label' => esc_html__( 'Background Color From', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn::after' => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ),
            array(
                'name' => 'button_hover2_bg_to_after',
                'label' => esc_html__( 'Background Color To', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn::after' => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    'button_hover_type' => ['btn-hover2','btn-hover3'],
                ],
            ),
        ),
    )
),
festiva_widget_animation_settings(),
),
),
festiva_get_class_widget_path()
),
); 