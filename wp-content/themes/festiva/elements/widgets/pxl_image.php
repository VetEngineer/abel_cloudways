<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image',
        'title' => esc_html__('BR Image', 'festiva' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt',
            'pxl-tweenmax',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                's_img' => 'Select Image',
                                'f_img' => 'Featured Image',
                            ],
                            'default' => 's_img',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'source_type' => ['s_img'],
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),

                        
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Button Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'None',
                                'style-button'  => 'Style Button',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'text_btn_img',
                            'label' => esc_html__('Text Button', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => ['style-button'],
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__('Image Alignment', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'festiva' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'festiva' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'festiva' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
),

array(
    'name'  => 'tab_style_hover_img',
    'label' => esc_html__('Image Hover','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'style_hover',
            'label' =>   esc_html__('Select Style Hover','festiva'),
            'type'  =>  \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'style-hover-default'   => esc_html__('Style Hover Default','festiva'),
                'style-hover-style-1'   => esc_html__('Style Hover 1','festiva'),
            ],
            'default'   => 'style-hover-style-1',                        
        ),
    ),
),

array(
    'name'  => 'tab_style_button_img',
    'label' => esc_html__('Button','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls'  => array(
        array(
            'name'  => 'bg_button_color',
            'label' => esc_html__('Background Button','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single .btn-image a:after '  => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'bg_button_color_hv',
            'label' => esc_html__('Background Button Hover','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single .btn-image a:before '  => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'text_button_color',
            'label' => esc_html__('Text Button Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single .btn-image a'  => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'text_button_typography',
            'label' => esc_html__('Text Button Typography','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'  => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-single .btn-image a',
        ),
    ),
),

array(
    'name' => 'tab_style_img',
    'label' => esc_html__('Image', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'image_max_height',
            'label' => esc_html__('Image Max Height', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'description' => esc_html__('Enter number.', 'festiva' ),
            'condition' => [
                'image_type' => 'img',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'image_type' => 'img',
            ],
        ),
        array(
            'name' => 'image_width',
            'label' => esc_html__('Image Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'auto' => [
                    'title' => esc_html__( 'Auto', 'festiva' ),
                    'icon' => 'fas fa-arrows-alt-v',
                ],
                '100%' => [
                    'title' => esc_html__( 'Full', 'festiva' ),
                    'icon' => 'fas fa-arrows-alt-h',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img' => 'width: {{VALUE}};',
            ],
            'condition' => [
                'image_type' => 'img',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'image_height',
            'label' => esc_html__('Image Height', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'description' => esc_html__('Enter number.', 'festiva' ),
            'condition' => [
                'image_type' => 'bg',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single .pxl-item--bg' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'border_radius',
            'label' => esc_html__('Border Radius', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img, {{WRAPPER}} .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'border_type',
            'label' => esc_html__( 'Border Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__( 'None', 'festiva' ),
                'solid' => esc_html__( 'Solid', 'festiva' ),
                'double' => esc_html__( 'Double', 'festiva' ),
                'dotted' => esc_html__( 'Dotted', 'festiva' ),
                'dashed' => esc_html__( 'Dashed', 'festiva' ),
                'groove' => esc_html__( 'Groove', 'festiva' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__( 'Border Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single img' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
        array(
            'name'         => 'box_shadow',
            'label' => esc_html__( 'Box Shadow', 'festiva' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-image-single img'
        ),
        array(
            'name' => 'img_effect',
            'label' => esc_html__('Image Effect', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => 'None',
                'pxl-image-effect1' => 'Zigzag',
                'pxl-image-tilt' => 'Tilt',
                'pxl-image-spin' => 'Spin',
                'pxl-image-rotatey' => 'Rotate Y',
                'pxl-image-zoom' => 'Zoom',
                'pxl-image-bounce' => 'Bounce',
                'slide-up-down' => 'Slide Up Down',
                'slide-top-to-bottom' => 'Slide Top To Bottom ',
                'pxl-image-effect2' => 'Slide Bottom To Top ',
                'slide-right-to-left' => 'Slide Right To Left ',
                'slide-left-to-right' => 'Slide Left To Right ',
                'pxl-hover1' => 'ZoomIn',
                'pxl-hover2' => 'ZoomOut',
                'pxl-animation-round' => 'Round',
                'pxl-image-parallax' => 'Parallax',
                'pxl-parallax-scroll' => 'Parallax Scroll',
            ],
            'default' => '',
            'condition' => [
                'image_type' => 'img',
            ],
        ),
        array(
            'name' => 'parallax_scroll_type',
            'label' => esc_html__('Parallax Scroll Type', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'y' => 'Effect Y',
                'x' => 'Effect X',
                'z' => 'Effect Z',
            ],
            'default' => 'y',
            'condition' => [
                'img_effect' => 'pxl-parallax-scroll',
            ],
        ),
        array(
            'name' => 'parallax_scroll_value_x',
            'label' => esc_html__('Parallax Value', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'img_effect' => 'pxl-parallax-scroll',
            ],
            'default' => '80',
            'description' => esc_html__('Enter number.', 'festiva' ),
        ),
        array(
            'name' => 'parallax_value',
            'label' => esc_html__('Parallax Value', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'img_effect' => 'pxl-image-parallax',
            ],
            'default' => '40',
            'description' => esc_html__('Enter number.', 'festiva' ),
        ),
        array(
            'name' => 'max_tilt',
            'label' => esc_html__('Max Tilt', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'img_effect' => 'pxl-image-tilt',
            ],
            'default' => '10',
            'description' => esc_html__('Enter number.', 'festiva' ),
        ),
        array(
            'name' => 'speed_tilt',
            'label' => esc_html__('Speed Tilt', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'img_effect' => 'pxl-image-tilt',
            ],
            'default' => '400',
            'description' => esc_html__('Enter number.', 'festiva' ),
        ),
        array(
            'name' => 'perspective_tilt',
            'label' => esc_html__('Perspective Tilt', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                'img_effect' => 'pxl-image-tilt',
            ],
            'default' => '1000',
            'description' => esc_html__('Enter number.', 'festiva' ),
        ),
        array(
            'name' => 'speed_effect',
            'label' => esc_html__('Speed', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-image-single' => 'animation-duration: {{SIZE}}ms;',
            ],
            'condition' => [
                'img_effect!' => ['pxl-image-tilt','pxl-hover1'],
            ],
            'description' => 'Enter number, unit is ms.',
        ),
    ),
),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);