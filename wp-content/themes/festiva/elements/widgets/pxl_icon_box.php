<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('BR Icon Box', 'festiva' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array( 
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'festiva' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [

                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout2.png'
                                ],
                                
                                
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout11.png'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['2','1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_readmore',
                            'label' => esc_html__('Read More', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout'    => ['1'],
                            ],
                            'default'   => esc_html__('Read More','festiva'),
                        ),

                        
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['2','1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => ['2','1'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                                'layout' => ['2','1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['2','1'],
                            ],
                        ),
                        
                        array(
                            'name' => 'wg_max_width',
                            'label' => esc_html__('Widget Max Width', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name'  => 'section_style_layout',
    'label' => esc_html__('General','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,


    'controls' =>   array(
        array(
            'name'  => 'style_layout',
            'label' => esc_html__('Style Layout','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'layout-style1' => esc_html__('Style 1','festiva'),
                'layout-style2' => esc_html__('Style 2','festiva'),
            ],
            'default'   => 'layout-style1',
            'condition' => [
                'layout'   => ['1'],
            ],
        ),
        array(
            'name'  => 'style_color',
            'label' => esc_html__('Style Color','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'normal' => esc_html__('Normal','festiva'),
                'gradient' => esc_html__('Gradient','festiva'),
            ],
            'default'   => 'normal',
            
        ),
        array(
            'name' => 'bg_item',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box11::before,
                {{WRAPPER}} .pxl-icon-box2 .pxl-item--inner ' => 'background: {{VALUE}};'
            ],
            'condition' => [
                'style_color'   => ['normal'],
            ],
        ),
        array(
           'name' => 'color_linear_gradient',
           'label' => esc_html__('Gradient Color', 'festiva'),
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-icon-box11:before,{{WRAPPER}} .pxl-icon-box2 .pxl-item--inner',
           'condition' => [
            'style_color'   => ['gradient'],
        ],
    ),
        
    ), 
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
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
            'name'  => 'title_color_type',
            'label' => esc_html__('Title Color Type','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''  => 'Normal',
                'title_gradient' => 'Gradient',
            ],
            'default' => '',
            'condition'=> [
                'layout'    => '1',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title a' => 'color: {{VALUE}} !important;'
            ],
            'condition' => [
                'title_color_type'  => '',
            ],
        ),
        array(
           'name' => 'title_color_gr',
           'label' => esc_html__('Gradient Color', 'festiva'),
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item-title',
           'condition' => [
            'title_color_type'   => 'title_gradient',
        ],
    ),

        array(
            'name' => 'title_custom_from',
            'label' => esc_html__('Gradient - From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => '--gradient-color-from: {{VALUE}};'
            ],
            'condition' => [
                'title_color_type'  => 'custom_title',
            ],
        ),
        array(
            'name' => 'title_custom_to',
            'label' => esc_html__('Gradient - To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => '--gradient-color-to: {{VALUE}};'
            ],
            'condition' => [
                'title_color_type'  => 'custom_title',
            ],
        ),


        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box  .pxl-item-title a',
        ),
        array(
            'name' => 'title_top_spacer',
            'label' => esc_html__('Top Spacer', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'title_bottom_spacer',
            'label' => esc_html__('Bottom Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['2','1'],
    ],
    'controls' => array(
        array(
            'name' => 'description_top_spacer',
            'label' => esc_html__('Top Spacer', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'description_bottom_spacer',
            'label' => esc_html__('Bottom Spacer', 'festiva' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--description',
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(


        array(
            'name'  => 'style_hover_icon',
            'label' => esc_html__('Style Hover Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                ''              => 'Default',    
                'sty_hover_icon_1'   => 'Rotate',
                'sty_hover_icon_2'   => 'Phone Ring',
                'sty_hover_icon_3'   => 'Zoom Effect',
            ],
            'default'   => '',

        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),

        array(
            'name'  => 'heading_bg',
            'label' => esc_html__('Background Color','festiva'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),

        array(
           'name' => 'bg_icon_linear_gradient',
           'label' => esc_html__('Gradient Color', 'festiva'),
           'type'         => \Elementor\Group_Control_Background::get_type(), 
           'control_type' => 'group', 
           'types' => [ 'gradient' ],
           'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--inner .pxl-item--icon',

       ),

        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Size', 'festiva' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'bicon_width',
            'label' => esc_html__('Box Size', 'festiva' ),
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
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'spl_icon',
            'label' => esc_html__('Icon Space Right', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'deg','px' ],
            'condition' => [
                'layout' => ['2'],
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box i' => 'margin-right:{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box img' => 'margin-right:{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box svg' => 'margin-right:{{SIZE}}{{UNIT}};',
            ],
        ),


    ),
),festiva_widget_animation_settings(),
),
),
),festiva_get_class_widget_path()
);