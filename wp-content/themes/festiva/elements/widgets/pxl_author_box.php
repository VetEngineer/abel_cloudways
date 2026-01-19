<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_author_box',
        'title' => esc_html__('BR Author Box', 'festiva' ),
        'icon' => 'eicon-person',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_author_box/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_author_box/layout2.png'
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
                            'name' => 'au_image',
                            'label' => esc_html__( 'Image', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme).',
                            'condition' => [
                                'layout'    => '1',
                            ],
                        ),
                        array(
                            'name' => 'au_signature',
                            'label' => esc_html__( 'Signature', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'sig_size',
                            'label' => esc_html__('Signature Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme).',
                        ),
                        array(
                            'name' => 'au_genre',
                            'label' => esc_html__('Genre', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label'=> esc_html__('Style','festiva'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls'  => array(
                        array(
                            'name' => 'sig_size_w',
                            'label' => esc_html__('Signature Width', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-author-box .pxl-item--signature img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sig_size_h',
                            'label' => esc_html__('Signature Height', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-author-box .pxl-item--signature img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'color_genre',
                            'label' => esc_html__('Genre Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-author-box .pxl-item--genre' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name'  => 'typography_genre',
                            'label' => esc_html__('Genre Typography','festiva'),
                            'type'  => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-author-box .pxl-item--genre',
                        ),


                    ),
                ),


                festiva_widget_animation_settings(),
            ),
        ),
    ),
    festiva_get_class_widget_path()
);