<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_video_player',
        'title' => esc_html__('BR Video Player', 'festiva' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_video_text',
                            'label' => esc_html__('Button Video Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Link', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'video_icon',
                            'label' => esc_html__('Video Icon', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => 'None',
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'none',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'image_type' => ['img', 'bg'],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name'  => 'img_overplay',
                            'label' => esc_html__('Opacity','festiva'),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'condition' => [
                                'image_type'  => ['img','bg'],
                            ],
                            'range' => [
                                'min'   => 0,
                                'max'   => 1,
                            ],

                            'control_type'  => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--holder'  => 'opacity: {{SIZE}};',
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
                                '{{WRAPPER}} .pxl-video-player .pxl-video--imagebg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_video_style',
                            'label' => esc_html__('Button Video Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'btn_video_position',
                            'label' => esc_html__('Button Video Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'p-center' => 'Center',
                                'p-top-left' => 'Top Left',
                                'p-top-right' => 'Top Right',
                                'p-bottom-left' => 'Bottom Left',
                                'p-bottom-right' => 'Bottom Right',
                            ],
                            'default' => 'p-center',
                            'condition' => [
                                'image_type' => ['img','bg'],
                            ],
                        ),
                        array(
                            'name' => 'top_positioon',
                            'label' => esc_html__('Top Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-top-right'],
                            ],
                        ),
                        array(
                            'name' => 'right_positioon',
                            'label' => esc_html__('Right Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-right', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'bottom_positioon',
                            'label' => esc_html__('Bottom Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-bottom-left', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'left_positioon',
                            'label' => esc_html__('Left Position', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-bottom-left'],
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-video-player .pxl-video-text',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player .pxl-video-text' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name'  => 'heading_icon',
            'label' => esc_html__('Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'ic_color',
            'label' => esc_html__('Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player i' => 'color: {{VALUE}} !important;',
            ],
        ),

        array(
            'name' => 'bg_ic_color',
            'label' => esc_html__('Background Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player .btn-video' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-video-player .btn-video:before' => 'border-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-video-player .btn-video:after' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'btn_video_style'   => ['style2','style3'],
            ],
        ),
        array(
            'name'  => 'heading_bg',
            'label' => esc_html__('Background Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name'  => 'bg_width',
            'label' => esc_html__('Width','festiva'),
            'type'  => \Elementor\Controls_Manager::SLIDER,
            'size_units'    => ['px','custom'],
            'range' => [
                'px'    => [
                    'min'   => 0,
                    'max'   => 300,
                ],
            ],
            'control_type'  => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player .btn-video'  => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name'        => 'bg_height',
            'label'       => esc_html__('Height', 'festiva'),
            'type'        => \Elementor\Controls_Manager::SLIDER,
            'size_units'  => ['px', 'em', '%'],  
            'range'       => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 20,  
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100, 
                ],
            ],
            'default'     => [
                'unit' => 'px',  
            ],
            'control_type' => 'responsive',
            'selectors'   => [
                '{{WRAPPER}} .pxl-video-player .btn-video' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'bg_ic_color_fr',
            'label' => esc_html__('Background Color From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player .btn-video' => '--gradient-color-from: {{VALUE}} !important;',
            ],
            'condition' => [
                'btn_video_style'   => ['style1'],
            ],
        ),
        array(
            'name' => 'bg_ic_color_to',
            'label' => esc_html__('Background Color To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-video-player .btn-video' => '--gradient-color-to: {{VALUE}} !important;',
            ],
            'condition' => [
                'btn_video_style'   => ['style1'],
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