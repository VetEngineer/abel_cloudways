<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('BR Accordion', 'festiva' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'festiva-accordion'
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Style', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'heading_title',
                            'label' => esc_html__('Title','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
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
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--title',
                        ),



                        array(
                            'name'  => 'heading_content',
                            'label' => esc_html__('Content','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--content',
                        ),


                        array(
                            'name'  => 'heading_bg',
                            'label' => esc_html__('Background','festiva'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name'  => 'bg_color_type',
                            'label' => esc_html__('Background Color Type','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                ''  => 'Normal',
                                'bg_gradient' => 'Gradient',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'bg_color_normal',
                            'label' => esc_html__('Background Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'bg_color_type'  => '',
                            ],
                        ),
                        array(
                         'name' => 'bg_color_gr',
                         'label' => esc_html__('Background Color', 'festiva'),
                         'type'         => \Elementor\Group_Control_Background::get_type(), 
                         'control_type' => 'group', 
                         'types' => [ 'gradient' ],
                         'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--title',
                         'condition' => [
                            'bg_color_type'   => ['bg_gradient'],
                        ],
                    ),


                        array(
                            'name'  => 'bg_active_color_type',
                            'label' => esc_html__('Background Active Color Type','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                ''  => 'Normal',
                                'bg_gradient' => 'Gradient',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'bg_active_color_normal',
                            'label' => esc_html__('Background Active Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'bg_active_color_type'  => '',
                            ],
                        ),
                        array(
                         'name' => 'bg_active_color_gr',
                         'label' => esc_html__('Background Active Color', 'festiva'),
                         'type'         => \Elementor\Group_Control_Background::get_type(), 
                         'control_type' => 'group', 
                         'types' => [ 'gradient' ],
                         'selector' => '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-item--title',
                         'condition' => [
                            'bg_active_color_type'   => ['bg_gradient'],
                        ],
                    ),



                        array(
                            'name' => 'bsd',
                            'label' => esc_html__('Box Shadow', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',

                        ),
                        array(
                            'name' => 'bsd_tl',
                            'label' => esc_html__( 'Box Shadow', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                            ],
                            'condition' => [
                                'bsd' => 'true',
                            ],
                        ),
                        
                    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(



        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-icon-plus i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_active_color',
            'label' => esc_html__('Icon Active Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-icon-plus i' => 'color: {{VALUE}};',
            ],
        ),

        array(
            'name'  => 'heading_background',
            'label' => esc_html__('Background','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'bg_icon_color_type',
            'label' => esc_html__('Background Color Type','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''  => 'Normal',
                'bg_gradient' => 'Gradient',
            ],
            'default' => '',
        ),
        array(
            'name' => 'bg_icon_color_normal',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-icon-plus' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'bg_icon_color_type'  => '',
            ],
        ),
        array(
         'name' => 'bg_icon_color_gr',
         'label' => esc_html__('Background Color', 'festiva'),
         'type'         => \Elementor\Group_Control_Background::get_type(), 
         'control_type' => 'group', 
         'types' => [ 'gradient' ],
         'selector' => '{{WRAPPER}} .pxl-accordion .pxl--item .pxl-icon-plus',
         'condition' => [
            'bg_icon_color_type'   => ['bg_gradient'],
        ],
    ),


        array(
            'name'  => 'bg_icon_active_color_type',
            'label' => esc_html__('Background Active Color Type','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''  => 'Normal',
                'bg_gradient' => 'Gradient',
            ],
            'default' => '',
        ),
        array(
            'name' => 'bg_icon_active_color_normal',
            'label' => esc_html__('Background Active Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-icon-plus' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'bg_icon_active_color_type'  => '',
            ],
        ),
        array(
         'name' => 'bg_icon_active_color_gr',
         'label' => esc_html__('Background Active Color', 'festiva'),
         'type'         => \Elementor\Group_Control_Background::get_type(), 
         'control_type' => 'group', 
         'types' => [ 'gradient' ],
         'selector' => '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-icon-plus',
         'condition' => [
            'bg_icon_active_color_type'   => ['bg_gradient'],
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