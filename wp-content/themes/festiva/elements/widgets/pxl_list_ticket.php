<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list_ticket',
        'title' => esc_html__('BR List Ticket', 'festiva'),
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
                            'name' => 'lists',
                            'label' => esc_html__('Content', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'  => 'pxl_date',
                                    'label' => esc_html__('Date','festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'label_block'   => true,
                                ),
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name Author', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'  => 'position',
                                    'label' => esc_html__('Position', 'festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'label_block'   => true,
                                ),
                                array(
                                    'name'  => 'image',
                                    'label' => esc_html__('Image','festiva'),
                                    'type'  => \Elementor\Controls_Manager::MEDIA,

                                ),
                                array(
                                    'name'  => 'condition_active',
                                    'label' => esc_html__('Condition','festiva'),
                                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                                    'default'   => 'false',
                                ),
                                array(
                                    'name'  => 'condition',
                                    'label' => esc_html__  ('Condition','festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'default'   => esc_html__(' SOLD OUT', 'festiva'),
                                    'condition' => [
                                        'condition_active'  => 'true',
                                    ],
                                ),
                                array(
                                    'name'  => 'text',
                                    'label' => esc_html__  ('Button Buy','festiva'),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                    'default'   => esc_html__(' BUY TICKET', 'festiva'),
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link Buy', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'options'   => ['url', 'is_external', 'nofollow'],

                                    'default' => [
                                        'url' => '#',
                                        'is_external'=> true,
                                        'nofollow'  => true,
                                    ],
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_icon',
                                    'label' => esc_html__('Icon', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'label_block' => true,
                                    'fa4compatibility' => 'icon',
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
                '{{WRAPPER}} .pxl-list-ticket' => 'align-items: {{VALUE}};',
            ],
        ),

        array(
            'name'  => 'items_padding',
            'label' => esc_html__('Padding Items','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type'  => 'responsive',
            'size_units'    => ['px'],
            'range' => [
                'px'=> [
                    'min'   => 0,
                    'max'   => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl--items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),

        array(
            'name'  => 'items_margin',
            'label' => esc_html__('Margin Items','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type'  => 'responsive',
            'size_units'    => ['px'],
            'range' => [
                'px'=> [
                    'min'   => 0,
                    'max'   => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl--items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_text',
    'label' => esc_html__('Style Text', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        
        array(
            'name' => 'date_color',
            'label' => esc_html__('Date Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl--date' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'date_typography',
            'label' => esc_html__('Date Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list-ticket .pxl--date',
        ),

        array(
            'name' => 'date_space',
            'label' => esc_html__('Date Space', 'festiva' ),
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
                '{{WRAPPER}} .pxl-list-ticket .pxl--date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),



        array(
            'name' => 'name_color',
            'label' => esc_html__('Name Author Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl-name-author' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'name_typography',
            'label' => esc_html__('Name Author Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list-ticket .pxl-name-author',
        ),

        array(
            'name' => 'name_space',
            'label' => esc_html__('Name Author Space', 'festiva' ),
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
                '{{WRAPPER}} .pxl-list-ticket .pxl-name-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),


        array(
            'name' => 'position_color',
            'label' => esc_html__('Position Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl-position' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'position_typography',
            'label' => esc_html__('Position Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list-ticket .pxl-position',
        ),

        array(
            'name' => 'position_space',
            'label' => esc_html__('Position Space', 'festiva' ),
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
                '{{WRAPPER}} .pxl-list-ticket .pxl-position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),

array(
    'name'  => 'section_style_ticket',
    'label' => esc_html__('Style Ticket','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name' => 'condition_color',
            'label' => esc_html__('Condition Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl--button span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'condition_typography',
            'label' => esc_html__('Condition Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list-ticket .pxl--button span',
        ),

        array(
            'name' => 'condition_space',
            'label' => esc_html__('Condition Space', 'festiva' ),
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
                '{{WRAPPER}} .pxl-list-ticket .pxl--button span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),

        array(
            'name' => 'buy_ticket_color',
            'label' => esc_html__('Buy Ticket Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .btn-buy-ticket a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'buy_ticket_typography',
            'label' => esc_html__('Buy Ticket Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-list-ticket .btn-buy-ticket a',
        ),

        array(
            'name' => 'buy_ticket_space',
            'label' => esc_html__('Buy Ticket Space', 'festiva' ),
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
                '{{WRAPPER}} .pxl-list-ticket .btn-buy-ticket a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),

    ),
),
array(
    'name' => 'section_style_image',
    'label' => esc_html__('Image', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name'  => 'image_border_radius',
            'label' => esc_html__('Image Border Radius','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px','%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
                '%' => [
                    'min'   => 0,
                    'max'   => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-list-ticket .pxl-image-author img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),

        array(
            'name'  => 'image_border_style',
            'label' => esc_html__('Image Border Style','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'condition' => [
                'solid_normal' => 'Solid',
                'solid gradient'    => 'Gradient',
                'none'  => 'None',
            ],
            'default'   => '',
        ),

    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);