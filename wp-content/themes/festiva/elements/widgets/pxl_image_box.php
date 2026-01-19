<?php
// Register Image Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_box',
        'title' => esc_html__('BR Image Box', 'festiva' ),
        'icon' => 'eicon-image-box',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_box/layout1.png'
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
                            'name' => 'image',
                            'label' => esc_html__( 'Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'm_height',
                            'label' => esc_html__('Image Max Height', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-box1 .pxl-item--image img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name'  => 'link',
                            'label' => esc_html__('Link','festiva'),
                            'type'  => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),

                    ),
                ),

                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_title_color',
                            'label' => esc_html__('Box Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-box .pxl-item--holder' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'border_box_title_color',
                            'label' => esc_html__('Border Box Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-box .pxl-item--holder:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
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
                                '{{WRAPPER}} .pxl-image-box .pxl-item--bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
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
                            'label' => esc_html__('Title Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-box .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-box .pxl-item--title',
                        ),
                    ),
                ),
array(
    'name'  => 'section_style_sub_title',
    'label' => esc_html__('Sub Title','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'sub_color',
            'label' => esc_html__('Sub Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-box .pxl-item--sub a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_typography',
            'label' => esc_html__('Sub Title Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-box .pxl-item--sub',
        ),
        array(
            'name' => 'sub_padding',
            'label' => esc_html__('Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-image-box .pxl-item--sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'sub_border',
            'label' => esc_html__('Sub Title Border', 'festiva' ),
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-box .pxl-item--sub',
        ),

    ),
),
array(
    'name' => 'section_style_img',
    'label' => esc_html__('Image', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
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
),festiva_get_class_widget_path()
);