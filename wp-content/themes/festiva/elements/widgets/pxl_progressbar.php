<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_progressbar',
        'title' => esc_html__( 'BR Progress Bar', 'festiva' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-progressbar',
            'festiva-progressbar',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_progressbar/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_progressbar/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'progressbar',
                            'label' => esc_html__( 'Progress Bar', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__( 'Title', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Title Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}}  .pxl-progressbar .pxl--title',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_percentage',
                    'label' => esc_html__( 'Percentage', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'percentage_color',
                            'label' => esc_html__( 'Percentage Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percentage_typography',
                            'label' => esc_html__( 'Percentage Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .pxl--percentage',
                        ),
                        array(
                            'name'  => 'percentage_show',
                            'label' => esc_html__('Show Percentage','festiva'),
                            'type'  => \Elementor\Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Show','festiva'),
                            'label_off' => esc_html__('Hide','festiva'),
                            'return_value'    => 'yes',
                            'default'         => 'label_on',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_bar',
                    'label' => esc_html__( 'Bar', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                         array(
                            'name' => 'height_bar_t',
                            'label' => esc_html__('Position Top', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'top: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                         array(
                            'name' => 'height_bar_l',
                            'label' => esc_html__('Position Left', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'left: {{SIZE}}{{UNIT}} !important;',
                                '{{WRAPPER}} .pxl-progressbar .pxl--holder' => 'padding-right: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                         array(
                            'name' => 'height_bar',
                            'label' => esc_html__('Height', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                         array(
                            'name' => 'height_bar_box',
                            'label' => esc_html__('Height Box', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-progressbar .pxl--holder' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),


                        array(
                            'name'  => 'type_color_bar',
                            'label' => esc_html__('Bar type color','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                'type_color_bar_normal'    => 'Normal',
                                'type_color_bar_gradient'   => 'Gradient',
                            ],
                            'default'   => 'type_color_bar_gradient',
                        ),
                        array(
                            'name'  => 'type_color_normal',
                            'label' => esc_html__('Normal','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => '--gradient-color-from: {{VALUE}};--gradient-color-to: {{VALUE}};'
                            ],
                            'condition' => [
                                'type_color_bar' => 'type_color_bar_normal',
                            ],
                        ),

                        array(
                            'name'  => 'type_color_gradient_from',
                            'label' => esc_html__('Color - From','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => '--gradient-color-from: {{VALUE}};--gradient-color-to: {{VALUE}};'
                            ],
                            'condition' => [
                                'type_color_bar' => 'type_color_bar_gradient',
                            ],
                        ),

                        array(
                            'name'  => 'type_color_gradient_to',
                            'label' => esc_html__('Color - To','festiva'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--progressbar' => '--gradient-color-to: {{VALUE}};--gradient-color-to: {{VALUE}};'
                            ],
                            'condition' => [
                                'type_color_bar' => 'type_color_bar_gradient',
                            ],
                        ),

                        
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Bar Background Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--holder' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_border_color',
                            'label' => esc_html__( 'Border Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .pxl--holder' => 'border-color: {{VALUE}} !important;'

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