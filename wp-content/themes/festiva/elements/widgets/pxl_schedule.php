<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_schedule',
        'title' => esc_html__('BR Schedule', 'festiva'),
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
                            'name' => 'schedule',
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
                                    'label' => esc_html__('Date Time', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                   'name' => 'section_style',
                   'label' => esc_html__( 'Style', 'festiva' ),
                   'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                   'controls' => array(
                    array(
                        'name'  => 'heading_icon',
                        'label' => esc_html__('ICON','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'color_icon',
                        'label' => esc_html__('Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-schedule .pxl--inner .pxl--item i' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .pxl-schedule .pxl--inner .pxl--item svg' => 'fill: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'icon_size',
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
                            '{{WRAPPER}} .pxl-schedule .pxl--item i' => 'font-size: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .pxl-schedule .pxl--item svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                        ],
                    ),
                    array(
                        'name'  => 'heading_text',
                        'label' => esc_html__('DATE TIME','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'color_date',
                        'label' => esc_html__('Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-schedule .pxl--item .pxl-item--text' => 'color: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'typography_date_time',
                        'label' => esc_html__('Typography', 'festiva' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-schedule .pxl--item .pxl-item--text',
                    ),

                    array(
                        'name'  => 'heading_item',
                        'label' => esc_html__('ITEM','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'bg_item',
                        'label' => esc_html__('Background Item', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-schedule .pxl--inner' => 'background: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'bg_border',
                        'type' => \Elementor\Group_Control_Border::get_type(),
                        'control_type'  => 'group', 
                        'selector' => '{{WRAPPER}} .pxl-schedule .pxl--inner',
                    ),
                    array(
                        'name'  => 'bg_border_radius',
                        'label' => esc_html__('Border Radius','festiva'),
                        'type'  => \Elementor\Controls_Manager::DIMENSIONS,
                        'control_type' => 'responsive',
                        'size_units' => [ 'px', '%','custom'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 3000,
                            ],
                            '%' => [
                                'min'   => 0,
                                'max'   => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-schedule .pxl--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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