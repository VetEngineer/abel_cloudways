<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('BR Countdown', 'festiva' ),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),

                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'festiva'),
                        ),
                        array(
                            'name' => 'pxl_day',
                            'label' => esc_html__('Day', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-day' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-day',
                        ),
                        array(
                            'name' => 'pxl_hour',
                            'label' => esc_html__('Hour', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-hour' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-hour',
                        ),
                        array(
                            'name' => 'pxl_minute',
                            'label' => esc_html__('Minute', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-minute' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-minute',
                        ),
                        array(
                            'name' => 'pxl_second',
                            'label' => esc_html__('Second', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-second' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-second',
                        ), 
                        array(
                          'name' => 'align',
                          'label' => esc_html__( 'Alignment', 'festiva' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'flex-start' => [
                                'title' => esc_html__( 'Left', 'festiva' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'festiva' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'flex-end' => [
                                'title' => esc_html__( 'Right', 'festiva' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-countdown-layout1' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                    ),
),
array(
    'name'  => 'section_style_item',
    'label' => esc_html__('Items','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'padding_item_countdown',
            'label' => esc_html__('Padding','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type'  => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner', 
                '{{WRAPPER}} .pxl-countdown .countdown-item + .countdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            
        ),
        array(
            'name'  => 'margin_item_countdown',
            'label' => esc_html__('Margin','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type'  => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            
        ),

        array(
            'name'  => 'bg_item_gr_type',
            'label' => esc_html__('Title Color Type','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''  => 'Normal',
                'bg_gradient' => 'Gradient',
            ],
            'default' => '',
        ),
        array(
            'name' => 'bg_item_normal',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown.style1 .countdown-item,
                 {{WRAPPER}} .pxl-countdown.style2 .countdown-item .countdown-amount,
                 {{WRAPPER}} .pxl-countdown.style3 .countdown-item .countdown-amount'      => 'background: {{VALUE}};',
            ],
            'condition' => [
                'bg_item_gr_type'  => '',
            ],
        ),

        array(
           'name' => 'bg_item_gr',
           'label' => esc_html__('Background Gradient Color', 'festiva'),
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-countdown.style1 .countdown-item,
                          {{WRAPPER}} .pxl-countdown.style2 .countdown-item .countdown-amount,
                          {{WRAPPER}} .pxl-countdown.style3 .countdown-item .countdown-amount ',
           'condition' => [
            'bg_item_gr_type'   => ['bg_gradient'],
        ],
    ),
    )
),
array(
    'name'  => 'section_style_amount',
    'label' => esc_html__('Amount','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'background_size_amount',
            'label' => esc_html__('Background Size Amount','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'control_type'  => 'responsive',
            'size_units'    => ['px','custom'],
            'range' => [
                'px'    => [
                    'min'  => 0,
                    'max'  => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner .countdown-amount'  => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'style' => 'style2',
            ],
        ),
        array(
            'name'  => 'background_color_amount',
            'label' => esc_html__('Background Color Amount','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner .countdown-amount'  => 'background: {{VALUE}};',
            ],
            'condition' => [
                'style' => 'style2',
            ],
        ),
        array(
            'name'  => 'color_amount',
            'label' => esc_html__('Color Amount','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-amount span'  => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'typography_amount',
            'label' => esc_html__('Typography Amount','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => 
            '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner .countdown-amount span',
            
        ),
    ),
),
array(
    'name'  => 'section_style_period',
    'label' => esc_html__('Period','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'color_period',
            'label' => esc_html__('Color Period','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-countdown .countdown-period'  => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'typography_period',
            'label' => esc_html__('Typography Period','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => 
            '{{WRAPPER}} .pxl-countdown .countdown-item .countdown-item-inner .countdown-period',
            
        ),

    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);