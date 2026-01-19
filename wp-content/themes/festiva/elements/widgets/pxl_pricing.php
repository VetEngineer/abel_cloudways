<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('BR Pricing', 'festiva'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-progressbar',
            'festiva-progressbar',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),

                array(
                    'name'  => 'get_ticket_section',
                    'label' => esc_html__('Content','festiva'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls'  => array(
                        array(
                            'name' => 'title_ticket',
                            'label' => esc_html__('Title Ticket', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'object',
                            'label' => esc_html__('Object', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'price_note',
                            'label' => esc_html__('Price Note', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout'   => '2',
                            ],
                        ),

                    ),
                ),
                array(
                    'name' => 'section_content_progressbar',
                    'label' => esc_html__('Progressbar', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout'    => '1',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'progressbar_title',
                            'label' => esc_html__('Title', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                        array(
                            'name' => 'avaiable_ticket',
                            'label' => esc_html__('Avaiable Ticket', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                        array(
                            'name' => 'sum_ticket',
                            'label' => esc_html__('Sum Ticket', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                    )
                    
                ),
                array(
                    'name' => 'section_content_feature1',
                    'label' => esc_html__('Feature', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout'    => '1',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon List', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Feature', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    )
                ),
                array(
                    'name' => 'section_content_feature2',
                    'label' => esc_html__('Feature', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout'    => '2',
                    ],
                    'controls' => array( 
                        array(
                            'name' => 'items_layout_2',
                            'label' => esc_html__('Feature', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon List', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name'  => 'style_icon',
                                    'label' => esc_html__('Style Icon','festiva'),
                                    'type'  => \Elementor\Controls_Manager::SELECT,
                                    'options'   => [
                                        'style_icon_1'  => 'Style 1',
                                        'style_icon_2'  => 'Style 2',
                                    ],
                                    'default'   => 'style_icon_1'
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_button',
                    'label' => esc_html__('Button', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array( 
                        array(
                            'name' => 'btn_text',
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
                            'name' => 'desc',
                            'label' => esc_html__('Desciption', 'festiva'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                    )
                ),
                array(
                    'name'  => 'section_style_layout',
                    'label' => esc_html__('Layout','festiva'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition'    => [
                        'layout'    => '2',
                    ],
                    'controls'  => array(
                        array(
                            'name'  => 'style_layout',
                            'label' => esc_html__('Style Layout','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                'style_layout_1' => 'Style 1',
                                'style_layout_2' => 'Style 2',
                                'style_layout_custom' => 'Custom',
                            ],
                            'default'   => 'style_layout_1',
                            'condition'    => [
                                'layout'    => '2',
                            ],
                        ),
                        array(
                            'name'  => 'heading_bg_item',
                            'label' => esc_html__('Background','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),
                        array(
                            'name'  => 'bg_item_from',
                            'label' => esc_html__('Color From','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner'=> '--gradient-color-from: {{VALUE}};'
                            ],
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),
                        array(
                            'name'  => 'bg_item_to',
                            'label' => esc_html__('Color To','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner'=> '--gradient-color-to: {{VALUE}};'
                            ],
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),

                        array(
                            'name'  => 'heading_bg_acitve',
                            'label' => esc_html__('Background Active','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),
                        array(
                            'name'  => 'bg_item_from_active',
                            'label' => esc_html__('Color From','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner:hover'=> '--gradient-color-from: {{VALUE}};'
                            ],
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),
                        array(
                            'name'  => 'bg_item_to_active',
                            'label' => esc_html__('Color To','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner:hover'=> '--gradient-color-to: {{VALUE}};'
                            ],
                            'condition'    => [
                                'style_layout'    => 'style_layout_custom',
                            ],
                        ),
                    ),
),
array(
    'name'  => 'section_style_content',
    'label' => esc_html__('Content','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'heading_ticket',
            'label' => esc_html__('Ticket','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'title_ticket_color',
            'label' => esc_html__('Title Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket .pxl-title--ticket '=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'title_ticket_typography',
            'label' => esc_html__('Title Ticket Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket .pxl-title--ticket',
            
        ),

        array(
         'name' => 'ticket_bg_color_gr',
         'label' => esc_html__('Gradient Color', 'festiva'),
         'type'         => \Elementor\Group_Control_Background::get_type(), 
         'control_type' => 'group', 
         'types' => [ 'gradient' ],
         'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket:before',
         'condition'    => [
            'style_layout'    => 'style_layout_1',
            'layout'    => '2'
        ],
    ),


        array(
            'name'  => 'ticket_bg_color',
            'label' => esc_html__('Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket '=> 'background: {{VALUE}};'
            ],
            'condition'    => [
                'style_layout'    => 'style_layout_2',
                'layout'    => '2'
            ],
        ),
        array(
            'name'  => 'ticket_bg_color_active',
            'label' => esc_html__('Background Color Active','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner:hover .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket,
                {{WRAPPER}} .pxl-pricing .pxl-pricing--inner:hover .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-ticket::after '=> 'background: {{VALUE}};'
            ],
            'condition'    => [
                'layout'    => '2'
            ],

        ),
        array(
            'name'  => 'title_ticket_color_from',
            'label' => esc_html__('Background Color From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition'    => [
                'layout'    => '1'
            ],

        ),
        array(
            'name'  => 'title_ticket_color_to',
            'label' => esc_html__('Background Color To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition'    => [
                'layout'    => '1'
            ],

        ),




        array(
            'name'  => 'heading_price',
            'label' => esc_html__('Price','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'price_color',
            'label' => esc_html__('Price Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-content .pxl-price--inner'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name'  => 'price_stroke',
            'label' => esc_html__('Price Text Stroke','festiva'),
            'type'  => \Elementor\Group_Control_Text_Stroke::get_type(),
            'control_type'  => 'group',
            'selector' => 
            '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-content .pxl-price--inner',
        ),

        array(
            'name' => 'price_typography',
            'label' => esc_html__('Price Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-content .pxl-price--inner',
        ),
        array(
            'name'  => 'object_color',
            'label' => esc_html__('Object Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-content .pxl-object'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'object_typography',
            'label' => esc_html__('Object Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-content .pxl-object',
        ),


        array(
            'name'  => 'heading_note',
            'label' => esc_html__('Price Note','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition'    => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'price_note_color',
            'label' => esc_html__(' Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-price--note'=> 'color: {{VALUE}};'
            ],
            'condition'    => [
                'layout'    => '2',
            ],
        ),
        array(
            'name' => 'price_note_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-ticket--inner .pxl-price--note',
            'condition'    => [
                'layout'    => '2',
            ],
        ),
    ),
),
array(
    'name'  => 'section_style_progressbar',
    'label' => esc_html__('Progressbar','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout'    => '1',
    ],
    'controls'  => array(
        array(
            'name'  => 'title_pgb_color',
            'label' => esc_html__('Title Progressbar Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl-item--title'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'title_pgb_typography',
            'label' => esc_html__('Title Progressbar Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl-item--title',
        ),
        array(
            'name'  => 'pgb_color_type',
            'label' => esc_html__('Progressbar Color Type','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'color_normal'    => esc_html__('Color Normal','festiva'),
                'color_gradient'    => esc_html__('Color Gradient','festiva'),
            ],
            'default'   => 'color_normal',
        ),
        array(
            'name'  => 'pgb_color',
            'label' => esc_html__('Progressbar Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl--holder .pxl--progressbar'=> '--gradient-color-from: {{VALUE}}; --gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'pgb_color_type'    => 'color_normal',
            ],
        ),
        array(
            'name'  => 'pgb_gradient_from',
            'label' => esc_html__('Progressbar Color From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl--holder .pxl--progressbar'=> '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'pgb_color_type'    => 'color_gradient',
            ],
        ),
        array(
            'name'  => 'pgb_gradient_to',
            'label' => esc_html__('Progressbar Color To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl--holder .pxl--progressbar'=> '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'pgb_color_type'    => 'color_gradient',
            ],
        ),
        array(
            'name'  => 'pgb_bg_color',
            'label' => esc_html__('Progressbar Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl--holder'=> 'background: {{VALUE}};',
            ],
        ),

        array(
            'name'  => 'heading_fractions',
            'label' => esc_html__('Fractions','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'fractions_color',
            'label' => esc_html__('Frations Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl-item-fractions'=> 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'fractions_typography',
            'label' => esc_html__('Fractions Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-progressbar .pxl-item-fractions',
        ),

    ),
),
array(
    'name'  => 'section_style_feature',
    'label' => esc_html__('Feature','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'heading_icon_sty',
            'label' => esc_html__('Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition'    => [
                'layout'    => '1',
            ],
        ),

        array(
            'name'  => 'heading_icon_sty1',
            'label' => esc_html__('Icon Style 1','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition'    => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'icon_color1',
            'label' => esc_html__('Icon Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--icons'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name'  => 'bg_icon_color1',
            'label' => esc_html__('Background Icon Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--icons'=> 'background: {{VALUE}};'
            ],
        ),
        array(
            'name'  => 'heading_icon_sty2',
            'label' => esc_html__('Icon Style 2','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition'    => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'icon_color2',
            'label' => esc_html__('Icon Color 2','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--icons.style_icon_2'=> 'color: {{VALUE}};'
            ],
            'condition'    => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'bg_icon_color2',
            'label' => esc_html__('Background Icon Color 2','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--icons.style_icon_2'=> 'background: {{VALUE}};'
            ],
            'condition'    => [
                'layout'    => '2',
            ],
        ),

        array(
            'name'  => 'heading_text_feature',
            'label' => esc_html__('Text','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'text_feature_color',
            'label' => esc_html__('Text Feature Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--text'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'text_feature_typography',
            'label' => esc_html__('Text Feature Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-top .pxl-get--ticket .pxl-pricing--list .pxl--item .pxl-item--text',
        ),
    ),
),
array(
    'name'  => 'section_style_button',
    'label' => esc_html__('Button','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(

        array(
            'name'  => 'heading_bg_color',
            'label' => esc_html__('Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'button_style',
            'label' => esc_html__('Button Style','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''  => esc_html__('Style 1','festiva'),
                'btn-custom'   => esc_html__('Style Custom','festiva'),
            ],
            'default'   => '',
        ),
        array(
            'name'  => 'bg_button_from',
            'label' => esc_html__('Color From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-bottom .btn'=> '--gradient-color-from: {{VALUE}};'
            ],
            'condition'    => [
                'button_style'    => 'btn-custom',
            ],
        ),
        array(
            'name'  => 'bg_button_to',
            'label' => esc_html__('Color To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-bottom .btn'=> '--gradient-color-to: {{VALUE}};'
            ],
            'condition'    => [
                'button_style'    => 'btn-custom',
            ],
        ),

        array(
            'name'  => 'heading_bg_boder_color',
            'label' => esc_html__('Border','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'border_button_from',
            'label' => esc_html__('Color From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-bottom .pxl-button'=> '--gradient-color-from: {{VALUE}};'
            ],
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'border_button_to',
            'label' => esc_html__('Color To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-pricing--inner .pxl-content-bottom .pxl-button'=> '--gradient-color-to: {{VALUE}};'
            ],
            'condition' => [
                'layout'    => '2',
            ],
        ),

        array(
            'name'  => 'heading_text',
            'label' => esc_html__('Text','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'text_color',
            'label' => esc_html__('Text Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-content-bottom .btn'=> 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'text_button_typography',
            'label' => esc_html__('Text Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-content-bottom .btn',
        ),

        array(
            'name'  => 'heading_desc',
            'label' => esc_html__('Description','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'layout'    => '1',
            ],
        ),
        array(
            'name'  => 'desc_color',
            'label' => esc_html__('Description Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-content-bottom .pxl-item--desc'=> 'color: {{VALUE}};'
            ],
            'condition' => [
                'layout'    => '1',
            ],
        ),
        array(
            'name' => 'desc_feature_typography',
            'label' => esc_html__('Description Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-content-bottom .pxl-item--desc',
            'condition' => [
                'layout'    => '1',
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