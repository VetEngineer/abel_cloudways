<?php
$templates_df = ['0' => esc_html__('None', 'festiva')];
$templates = $templates_df + Festiva_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'icon_hidden_panel',
        'title' => esc_html__('BR Hidden Panel', 'festiva' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'festiva'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line,{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line::before, {{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line::after' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'border-color: {{VALUE}};',
                            ],
                        ),


                        array(
                            'name' => 'background_color_type',
                            'label' => esc_html__('Background Color Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'  => [
                                'bg_normal'    => 'Normal',
                                'bg_gradient'   => 'Gradient',
                            ],
                            'default'   => 'bg_normal',
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__('Background Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'background_color_type' => 'bg_normal',
                            ],
                        ),
                        array(
                           'name' => 'background_color_gr',
                           'label' => esc_html__('Background Color', 'festiva'),
                           'type'         => \Elementor\Group_Control_Background::get_type(), 
                           'control_type' => 'group', 
                           'types' => [ 'gradient' ],
                           'selector' => '{{WRAPPER}} .pxl-hidden-panel-button',
                           'condition' => [
                            'background_color_type'   => ['bg_gradient'],
                        ],
                    ),



                        array(
                            'name'  => 'border_radius_button',
                            'label' => esc_html__('Border Radius Button','festiva'),
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
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        
                        array(
                            'name'  => 'fontsize_button',
                            'label' => esc_html__('Font Size Button','festiva'),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),



),
),
),
Festiva_get_class_widget_path()
);