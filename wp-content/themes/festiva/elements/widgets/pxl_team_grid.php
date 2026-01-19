<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_grid',
        'title' => esc_html__('BR Team Grid', 'festiva'),
        'icon' => 'eicon-lock-user',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_grid/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_grid/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_grid/layout3.png'
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
                            'name' => 'team',
                            'label' => esc_html__('Team', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image', 
                                    'label' => esc_html__('Image', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'schedule',
                                    'label' => esc_html__('Schedule', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),

                                array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Button Link', 'festiva'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'festiva' ),
                                    'type' => 'pxl_icons',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),

                        

                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Grid', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR Animate', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => festiva_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                    ),
                ),

array(
    'name' => 'section_items_grid',
    'label' => esc_html__('Items Grid', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout'    => '3',
    ],
    'controls' => array(
        array(
            'name'  => 'padding_items_grid',
            'label' => esc_html__('Padding','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px','custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            
        ),
    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Content', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name'  => 'heading_title',
            'label' => esc_html__('Title','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'title_color_type',
            'label' => esc_html__('Title Color Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'normal' => 'Normal',
                'gradient' => 'Gradient',
            ],
            'default' => 'gradient',
        ),
        array(
            'name' => 'title_normal_color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => '--gradient-color-from: {{VALUE}}; --gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'title_color_type' => ['normal'],
            ],
        ),
        array(
            'name' => 'title_gradient_from',
            'label' => esc_html__( 'Color - From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'title_color_type' => ['gradient'],
            ],
        ),
        array(
            'name' => 'title_gradient_to',
            'label' => esc_html__( 'Color - To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'title_color_type' => ['gradient'],
            ],
        ),

        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-grid-item .pxl-item--inner .pxl-item--holder .pxl-item--title a',
        ),
        array(
            'name'  => 'heading_position',
            'label' => esc_html__('Position','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'pos_color',
            'label' => esc_html__('Position Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--position' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'pos_typography',
            'label' => esc_html__('Position Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-grid-item .pxl-item--inner .pxl-item--holder .pxl-item--position ',
        ),
        
        array(
            'name' => 'schedule_color',
            'label' => esc_html__('Schedule Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--holder .pxl-item--schedule' => 'color: {{VALUE}} !important;',
            ],
            'condition' => [
                'layout'    => '2',
            ],

        ),
        array(
            'name' => 'schedule_typography',
            'label' => esc_html__('Schedule Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-team-grid.pxl-item--holder .pxl-item--schedule',
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name' => 'button_type_color',
            'label' => esc_html__('Button Type Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'normal'    => 'Normal',
                'gradient'  => 'Gradient',
            ],
            'default'   => 'normal',
            'condition' => [
                'layout'    => '2',
            ],
        ),

        array(
            'name' => 'button_color',
            'label' => esc_html__('Button Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-social .pxl-button--social' => 'background: {{VALUE}} !important;',
            ],
            'condition' => [
                'button_type_color' => 'normal',
                'layout' => '2',
            ],

        ),

        array(
            'name' => 'button_color_from',
            'label' => esc_html__( 'Color - From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid  .pxl-social .pxl-button--social' => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'button_type_color' => 'gradient',
                'layout' => '2',
            ],
        ),

        array(
            'name' => 'button_color_to',
            'label' => esc_html__( 'Color - To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-social .pxl-button--social' => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'button_type_color' => 'gradient',
                'layout' => '2',
            ],
        ),


        array(
            'name'  => 'heading_social',
            'label' => esc_html__('Social','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),

        array(
            'name' => 'font_size_ic',
            'label' => esc_html__('Font Size Icon Social', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px','custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}}  .pxl-grid .pxl-grid-item .pxl-item--inner .pxl-social .pxl-item--social a' => 'font-size:  {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'gap_ic',
            'label' => esc_html__('Gap Icon Social', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px','custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}}  .pxl-grid .pxl-grid-item .pxl-item--inner .pxl-social .pxl-item--social' => 'gap:  {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name'  => 'padding_social',
            'label' => esc_html__('Padding','festiva'),
            'type'  => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px','custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-grid-item .pxl-item--inner .pxl-social' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'layout'    => '3',
            ]
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--social i,
                {{WRAPPER}} .pxl-team-grid .pxl-social .pxl-button--social rect' => 'color: {{VALUE}} !important; fill: {{VALUE}} !important;',

            ],
        ),

        array(
            'name' => 'bg_social_type_color',
            'label' => esc_html__('Background Social Type Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'normal'    => 'Normal',
                'gradient'  => 'Gradient',
            ],
            'default'   => 'normal',
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name' => 'bg_social_color',
            'label' => esc_html__('Background Social Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-item--social,
                {{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-button--social' => 'background: {{VALUE}} !important;',
            ],
            'condition' => [
                'bg_social_type_color'    => 'normal',
                'layout' => '2',
            ],

        ),

        array(
            'name' => 'bg_social_from',
            'label' => esc_html__( 'Background - From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-item--social,
                {{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-button--social' => '--gradient-color-from: {{VALUE}} !important;',
            ],
            'condition' => [
                'bg_social_type_color'    => 'gradient',
                'layout' => '2',
            ],
        ),

        array(
            'name' => 'bg_social_to',
            'label' => esc_html__( 'Background - To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-item--social, 
                {{WRAPPER}} .pxl-team-grid .pxl-item--inner .pxl-social .pxl-button--social' => '--gradient-color-to: {{VALUE}} !important;',
            ],
            'condition' => [
                'bg_social_type_color'    => 'gradient',
                'layout' => '2',
            ],
        ),
    ),
),
array(
    'name' => 'svg_color_gradient',
    'label' => esc_html__('SVG Gradient Color', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array( 
        array(
            'name'  => 'gradient_color_from_1',
            'label' => esc_html__('Gradient From 1','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout'    => '1',
            ],  
        ),
        array(
            'name'  => 'gradient_color_to_1',
            'label' => esc_html__('Gradient To 1','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout'    => '1',
            ],    
        ),
        array(
            'name'  => 'gradient_color_from_2',
            'label' => esc_html__('Gradient From 2','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,  
            'condition' => [
                'layout'    => '1',
            ],  
        ),
        array(
            'name'  => 'gradient_color_to_2',
            'label' => esc_html__('Gradient To 2','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,  
            'condition' => [
                'layout'    => '1',
            ],  
        ),

        array(
            'name'  => 'color_bg_front',
            'label' => esc_html__('Color SVG Front','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--background .background-front path' => 'fill: {{VALUE}};'
            ],
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'gradient_color_from',
            'label' => esc_html__('Color SVG Back - Top - From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'gradient_color_to',
            'label' => esc_html__('Color SVG Back - Top - To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout'    => '2',
            ],
        ),
        array(
            'name'  => 'color_bg_back_below',
            'label' => esc_html__('Color SVG Back - Below','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--background .background-back .background-below path' => 'fill: {{VALUE}};'
            ],
            'condition' => [
                'layout'    => '2',
            ],
        ),
    ),
),
),
),
),
festiva_get_class_widget_path()
);