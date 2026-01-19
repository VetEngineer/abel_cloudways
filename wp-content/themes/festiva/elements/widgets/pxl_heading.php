<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('BR Heading', 'festiva' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text', 
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => esc_html__('Create Highlight Text with shortcode: [highlight text=" text 1"]','festiva'),
                        ),
                        array(
                            'name'  => 'content_extend_features',
                            'label' => esc_html__('Extend Features','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name'  => 'indentation',
                            'label' => esc_html__( 'Show Indentation', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Show', 'festiva' ),
                            'label_off' => esc_html__( 'Hide', 'festiva' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                        ),
                        array(
                          'name' => 'display',
                          'label' => esc_html__( 'Display', 'festiva' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'unset' => [
                                'title' => esc_html__( 'Unset', 'festiva' ),
                                'icon' => 'eicon-ban',
                            ],
                            'flex' => [
                                'title' => esc_html__( 'Flex', 'festiva' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'none' => [
                                'title' => esc_html__( 'None', 'festiva' ),
                                'icon' => 'eicon-trash-o',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'display: {{VALUE}};',
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
                            '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'justify-content: {{VALUE}};',
                            '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--subtitle span' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name' => 'h_width',
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_height',
                            'label' => esc_html__('Max Height', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name'  => 'section_style_divider_title',
    'label' => esc_html__('Divider','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
    'controls'  => array_merge(
        array(
            array(
                'name'  => 'pxl_divider_title',
                'label' => esc_html__('Divider Style','festiva'),
                'type'  =>  \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    ''   => 'none',
                    'style_divider_1'    => 'Style 1',
                ],
                'default'   => '',
            ),
        ),
    ),
),

array(
    'name' => 'highlight_section',
    'label' => esc_html__('Highlight Text', 'festiva' ),
    'tab' => 'content',
    'controls' => array_merge(
        array(
            array(
                'name' => 'text_list',
                'label' => esc_html__('Text List', 'festiva'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'controls' => array(
                    array(
                        'name' => 'highlight_text',
                        'label' => esc_html__('Text', 'festiva'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ),
                ),
                'title_field' => '{{{ highlight_text }}}',
            ),
            array(
                'name'  => 'heading_highlight_style',
                'label' => esc_html__('Style','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ),
            array(
                'name' => 'highlight_color_1',
                'label' => esc_html__('Random Text Color', 'festiva' ),
                'type' => 'color',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .heading-highlight' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'highlight_typography',
                'label' => esc_html__('Highlight Typography', 'festiva' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .heading-highlight',
            ),
            array(
                'name' => 'highlight_color_typed_cursor',
                'label' => esc_html__('Typed Cursor Color', 'festiva' ),
                'type' => 'color',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .typed-cursor' => 'color: {{VALUE}};',
                ],
            ),
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_tag',
            'label' => esc_html__('HTML Tag', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h3',
        ),
        array(
            'name'  =>  'title_color_type',
            'label' => esc_html__('Color','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'pxl-color-style-1' => ' Style 1',
                'pxl-color-style-2' => ' Style 2',
                'pxl-color-style-3' => ' Style 3',
                'pxl-color-custom'  => 'Custom',
            ],
            'default'   => 'pxl-color-style-1',
            'separator' => 'before',
        ),


        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'title_color_type'  => 'pxl-color-custom',
            ],
        ),
        array(
           'name' => 'title_color_gr',
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
           'condition' => [
            'title_color_type'  => 'pxl-color-style-1',
        ],
        
    ),
        array(
            'name' => 'color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-heading .pxl-item--title' => '-webkit-text-stroke-color: {{VALUE}};',
            ],
            'condition' => [
                'title_color_type'  => 'pxl-color-style-2',
            ],
        ),

        array(
            'name' => 'title_typography_type',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'pxl-heading--tcustom' => 'Custom',
                'pxl-heading--tsize1' => 'Heading 1',
            ],
            'default' => 'pxl-heading--tcustom',
            'separator' => 'before',
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Custom Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
            'condition' => [
                'title_typography_type' => 'pxl-heading--tcustom',
            ],
        ),
       
        array(
            'name'         => 'title_box_shadow',
            'label' => esc_html__( 'Title Shadow', 'festiva' ),
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
        ),
        array(
            'name' => 'title_space',
            'label' => esc_html__('Margin', 'festiva' ),
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
               '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
           ],
       ),
        array(
            'name'  => 'heading_hilight_title',
            'label' => esc_html__('Highlight Title','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'typography_hilight_title',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title .pxl-title--highlight',
        ),
        array(
            'name' => 'color_hilight_title',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}  .pxl-heading .pxl-item--title .pxl-title--highlight' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'pxl_animate',
            'label' => esc_html__('BR Animate', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => festiva_widget_animate_v2(),
            'default' => '',
        ),
        array(
            'name' => 'pxl_animate_delay',
            'label' => esc_html__('Animate Delay', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => 'Enter number. Default 0ms',
        ),
    ),
),

array(
    'name' => 'section_style_title_sub',
    'label' => esc_html__('Sub Title', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(


            array(
                'name' => 'sub_title_color',
                'label' => esc_html__('Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .pxl-item--subtitle span' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'sub_title_bgcolor',
                'label' => esc_html__('Background Color', 'festiva' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span' => 'background-color: {{VALUE}};',
                ],
            ),


            array(
                'name' => 'sub_title_typography',
                'label' => esc_html__('Typography', 'festiva' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
            ),

            array(
                'name' => 'sub_title_margin',
                'label' => esc_html__('Margin', 'festiva' ),
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
                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'name'  => 'heading_indentation',
                'label' => esc_html__('Indentation','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ),
            array(
                'name'  => 'pxl_indentation_color',
                'label' => esc_html__('Indentation Color', 'festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-indentation:before' => 'background: {{VALUE}};',
                ],
            ),
            array(
                'name'  => 'pxl_indentation_width',
                'label' => esc_html__('Indentation Width', 'festiva'),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'], 
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-indentation:before' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'name'  => 'pxl_indentation_height',
                'label' => esc_html__('Indentation Height', 'festiva'),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'], 
                'control_type' => 'responsive',
                'selectors' => [
                    '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-indentation:before' => 'height: {{SIZE}}{{UNIT}};',
                ],

            ),
            
            
            array(
                'name' => 'pxl_animate_sub',
                'label' => esc_html__('BR Animate', 'festiva' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => festiva_widget_animate(),
                'default' => '',
            ),
            array(
                'name' => 'pxl_animate_delay_sub',
                'label' => esc_html__('Animate Delay', 'festiva' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0',
                'description' => 'Enter number. Default 0ms',
            ),
        ),
),
),

),
),
),
festiva_get_class_widget_path()
);