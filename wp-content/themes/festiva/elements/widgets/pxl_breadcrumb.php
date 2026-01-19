<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_breadcrumb',
        'title' => esc_html__('Pxl Breadcrumb', 'festiva' ),
        'icon' => 'eicon-yoast',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'post_title',
                            'label' => esc_html__('Post Title Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'custom_text' => 'Custom Title Text',
                            ],
                            'default' => 'default', 
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb li a,{{WRAPPER}} .pxl-breadcrumb li span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-breadcrumb li a,{{WRAPPER}} .pxl-breadcrumb li span',
                        ),
                        array(
                            'name' => 'arrow_color',
                            'label' => esc_html__('Arrow Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb li::after' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
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
                            '{{WRAPPER}} .pxl-breadcrumb' => 'justify-content: {{VALUE}};',
                        ],
                    ),
                        array(
                            'name' => 'active_text_color',
                            'label' => esc_html__('Active Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-breadcrumb li:last-child span' => 'color: {{VALUE}}  !important;',
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