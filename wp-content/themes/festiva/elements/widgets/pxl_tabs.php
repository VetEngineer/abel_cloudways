<?php
$templates = festiva_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs',
        'title' => esc_html__( 'BR Tabs', 'festiva' ),
        'icon' => 'eicon-tabs',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'festiva-tabs'
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout3.png'
                                ], 
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Tabs', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_active',
                            'label' => esc_html__( 'Active Tab', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name'  => 'sub_heading',
                            'label' => esc_html__('Sub Heading','festiva'),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                            'label_block'=> true,
                            'condition' => [
                                'layout'    => '3',
                            ],
                        ),
                        array(
                            'name'  => 'indentation',
                            'label' => esc_html__( 'Show Indentation', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Show', 'festiva' ),
                            'label_off' => esc_html__( 'Hide', 'festiva' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                            'condition' => [
                                'layout'    => '3',
                            ],
                        ),
                        array(
                            'name'  => 'heading',
                            'label' => esc_html__('Heading','festiva'),
                            'type'  => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block'=> true,
                            'description' => esc_html__('Create Highlight Text with shortcode: [highlight text=" text "]','festiva'),
                            'condition' => [
                                'layout'    => ['2','3'],
                            ],
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Content', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(

                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__( 'Sub Title', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'description'   => 'Only apply to layout 3.'
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'festiva'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'festiva' ),
                                        'template' => esc_html__( 'From Template Builder', 'festiva' )
                                    ],
                                    'default' => 'df' 
                                ),

                                array(
                                    'name' => 'image',
                                    'label' => esc_html__( 'Image', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => ['content_type' => 'df'],
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__( 'Desc', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => ['content_type' => 'df'],
                                ),
                                array(
                                    'name' => 'sub_desc',
                                    'label' => esc_html__( 'Sub Desc', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => ['content_type' => 'df'],
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'festiva'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
),

array(
    'name' => 'tab_style',
    'label' => esc_html__( 'Heading', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'heading_sub_heading',
            'label' => esc_html__('Sub Heading', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'sub_heading_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl-sub-heading' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl-sub-heading.pxl-indentation::before' => 'background: {{VALUE}} !important;',
            ],
            'condition' => [
                'layout'    => '3',
            ],
        ),
        array(
            'name' => 'sub_heading_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl-sub-heading .pxl-title--highlight, {{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl-sub-heading',
            
            'condition' => [
                'layout'    => '3',
            ],
        ),

        
        array(
            'name' => 'heading_heading',
            'label' => esc_html__('Heading', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'heading_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl--heading' => 'color: {{VALUE}} !important;',
            ],
        ),

        array(
            'name' => 'heading_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => 
            '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl--heading',
            
        ),
        array(
            'name' => 'heading_hightlight_color',
            'label' => esc_html__('Color Hightlight', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl--heading .pxl-title--highlight' => 'color: {{VALUE}} !important;',
            ],
        ),

        array(
            'name' => 'heading_hightlight_typography',
            'label' => esc_html__('Typography Hightlight', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => 
            '{{WRAPPER}} .pxl-tabs .wrap-title .pxl-tabs--heading .pxl--heading .pxl-title--highlight',
            
        ),




        array(
            'name' => 'heading_extend_features_heading',
            'label' => esc_html__('Extend Features', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'padding_heading',
            'label' => esc_html__('Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .wrap-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'margin_heading',
            'label' => esc_html__('Margin', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .wrap-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'tab_tab_bar',
    'label' => esc_html__( 'Tab Bar', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'heading_tabs_color',
            'label' => esc_html__(' Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'bg_color',
            'label' => esc_html__('Background Color ', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bg_at_color_type',
            'label' => esc_html__('Type Background Color Active', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'gradient'  => 'Gradient',
                'normal'    => 'Normal',
            ],
            'default'   => 'normal'
        ),
        array(
            'name' => 'bg_at_color',
            'label' => esc_html__('Background Color Title Active', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'background: {{VALUE}} !important;',
            ],
            'condition' => [
                'bg_at_color_type'  => 'normal',
            ],
        ),
        array(
            'name' => 'bg_active_gradient',
            'label' => esc_html__('Background Color Active', 'festiva'),
            'type'         => \Elementor\Group_Control_Background::get_type(), 
            'control_type' => 'group', 
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active',
            'condition' => [
                'bg_at_color_type'   => ['gradient'],
            ],
        ),


        array(
            'name' => 'bd_ic_color',
            'label' => esc_html__('Border Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title ' => 'border-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title ' => 'border-color: {{VALUE}} !important;',
            ],
        ),

        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_active_color',
            'label' => esc_html__('Title Active Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-item--title.active' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'heading_tab_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title',
        ),
        array(
            'name' => 'sub_title_typography',
            'label' => esc_html__('Sub Title Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title .pxl-sub--title',
        ),
        array(
            'name' => 'heading_extend_features_tab',
            'label' => esc_html__('Extend Features', 'festiva' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'margin_tabs',
            'label' => esc_html__('Margin Tabs', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'padding_item_title',
            'label' => esc_html__('Padding Item Title', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units' => [ 'px', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title .pxl-item--title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'tab_effect',
            'label' => esc_html__('Effect', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'tab-effect-slide' => 'Slide',
                'tab-effect-fade' => 'Fade',
            ],
            'default' => 'tab-effect-slide',
        ),

    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);