<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('BR Counter', 'festiva'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'festiva-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout2.png'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),

                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'content',
                            'label' => esc_html__('Content', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        // array(
                        //     'name' => 'thousand_separator_char',
                        //     'label' => esc_html__('Number Separator', 'festiva'),
                        //     'type' => \Elementor\Controls_Manager::SELECT,
                        //     'options' => [
                        //         '' => 'Default',
                        //         '.' => 'Dot',
                        //         ',' => 'Comma',
                        //         ' ' => 'Space',
                        //     ],
                        //     'default' => '',
                        // ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'festiva'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
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
                            'justify' => [
                                'title' => esc_html__( 'Justified', 'festiva' ),
                                'icon' => 'eicon-text-align-justify',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-counter1 .pxl--item-inner .pxl--counter-meta' => 'justify-content: {{VALUE}};',
                        ],
                        'condition' => [
                            'layout' => ['1'],
                        ],
                    ),
                    ),
),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btn_padding',
            'label' => esc_html__('Box Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'color',
            'label' => esc_html__('Box Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_type',
            'label' => esc_html__( 'Border Type', 'festiva' ),
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type'  => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-inner',
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'sp_t',
            'label' => esc_html__('Space Top', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'underline_color',
            'label' => esc_html__('Border Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'border-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-inner .pxl--counter-meta .pxl--item-title',
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'color: {{VALUE}};
                text-fill-color: {{VALUE}};
                -webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'icon_color_hv',
            'label' => esc_html__('Color Hover', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i:hover' => 'color: {{VALUE}} !important;
                text-fill-color: {{VALUE}};
                -webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'box_icon_color',
            'label' => esc_html__('Box Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-counter .pxl--item-inner:hover' => 'border-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_icon_type',
            'label' => esc_html__( 'Border Type', 'festiva' ),
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type'  => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl-item--icon',
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'festiva' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon' => 'padding-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-item--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'section_number',
    'label' => esc_html__('Number', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'nb_stroke_width',
            'label' => esc_html__('Stroke Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'default' => [
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix,
                {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => '-moz-webkit-text-stroke: {{SIZE}}{{UNIT}} black; 
                -webkit-text-stroke: {{SIZE}}{{UNIT}} black;',
                '{{WRAPPER}} .pxl-counter .pxl--counter-number'=> '-moz-webkit-text-stroke: {{SIZE}}{{UNIT}} black; 
                -webkit-text-stroke: {{SIZE}}{{UNIT}} black;',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'stroke_color',
            'label' => esc_html__('Text Stroke Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => '-webkit-text-stroke-color: {{VALUE}} !important; -moz-webkit-text-stroke-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => '-webkit-text-stroke-color: {{VALUE}} !important; -moz-webkit-text-stroke-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'number_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-inner .pxl--counter-meta .pxl--counter-number',
        ),
        array(
            'name' => 'number_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner .pxl--counter-meta .pxl--counter-number' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'prefix_suffix_color',
            'label' => esc_html__('Prefix/Suffix Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'prefix_space_bottom',
            'label' => esc_html__('Prefix Spacer Top', 'festiva' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-suffix, {{WRAPPER}} .pxl-counter .pxl--counter-number .pxl--counter-prefix' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'duration',
            'label' => esc_html__('Animation Duration', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2000,
            'min' => 100,
            'step' => 100,
        ),
        array(
            'name' => 'number_space_top',
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'number_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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