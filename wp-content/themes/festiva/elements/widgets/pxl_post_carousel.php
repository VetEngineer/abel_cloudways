<?php
$pt_supports = ['event'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('BR Post Carousel', 'festiva' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_title',
                            'label' => esc_html__('Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            
                        ),
                    ),
                    'conditions' => [
                        'relation' => 'or',
                        'terms' => [
                            [
                                'terms' => [
                                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2']]
                                ]
                            ]
                        ],
                    ],
                ),
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'festiva' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'festiva' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => festiva_get_post_type_options($pt_supports),
                                'default'  => 'event'
                            ) 
                        ),
                        festiva_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'festiva' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'festiva' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'festiva' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        festiva_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        festiva_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'festiva' ),
                                    'ID' => esc_html__('ID', 'festiva' ),
                                    'author' => esc_html__('Author', 'festiva' ),
                                    'title' => esc_html__('Title', 'festiva' ),
                                    'rand' => esc_html__('Random', 'festiva' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'festiva' ),
                                    'asc' => esc_html__('Ascending', 'festiva' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Festiva Animate', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => festiva_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns: Screen <= 575', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns: Screen <= 767', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns: Screen <= 991', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns: Screen <= 1199', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns: Screen => 1200', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns: Screen => 1600', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides Scroll', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
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
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2']]
                                        ]
                                    ]
                                ],
                            ],
                        ),
                        array(
                            'name' => 'arrows_position',
                            'label' => esc_html__('Arrows Postion', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'position1',
                            'options' => [
                                'position1' => 'Position 1',
                                'position2' => 'Position 2',
                            ],
                            'condition' => [
                                'arrows' => 'true'
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2']]
                                        ]
                                    ]
                                ],
                            ],

                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),

                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'festiva'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'offset_left',
                            'label' => esc_html__('Offset Left', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-left: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-carousel-inner' => 'overflow: visible;',
                            ],
                        ),
                        array(
                            'name' => 'offset_right',
                            'label' => esc_html__('Offset Right', 'festiva' ),
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
                                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-right: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-carousel-inner' => 'overflow: visible;',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_display',
    'label' => esc_html__('Display', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'event_style_l1',
            'label' => esc_html__('Style', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'pxl-event-l1' => 'Style 1',
                'pxl-event-l2' => 'Style 2',
                'pxl-event-l3' => 'Style 3',
            ],
            'default' => 'pxl-event-l1',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',

        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'show_category',
            'label' => esc_html__('Show Category', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_excerpt',
            'label' => esc_html__('Show Excerpt', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'num_words',
            'label' => esc_html__('Number of Words', 'festiva' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 25,
            'separator' => 'after',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button Readmore', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'button_text',
            'label' => esc_html__('Button Text', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                ],
            ]
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2']]
                ]
            ]
        ],
    ],
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl--title',
        ),
        array(
            'name' => 'pxl_animate_tt',
            'label' => esc_html__('BR Animate', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => festiva_widget_animate_v2(),
            'default' => '',
        ),
        array(
            'name' => 'pxl_animate_delay',
            'label' => esc_html__('Animate Delay', 'festiva' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '0',
            'description' => 'Enter number. Default 0ms',
        ),
    ),

),
array(
    'name' => 'section_style_category',
    'label' => esc_html__('Category', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1']]
                ]
            ],
        ],
    ],
    'controls' => array(
        array(
            'name' => 'cate_bg_color',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl-item--featured .pxl-btn-category' => 'background: {{VALUE}};',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                        ]
                    ]
                ],
            ],
        ),
        array(
            'name' => 'cate_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl-item--featured .pxl-btn-category span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'cate_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl-item--featured .pxl-btn-category span',
        ),
    ),

),
array(
    'name' => 'section_style_item_tt',
    'label' => esc_html__('Title Items', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'item_tt_color',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl--inner .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'item_tt_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl--inner .pxl-item--title',
        ),
    ),
),
array(
    'name' => 'section_style_schedule',
    'label' => esc_html__('Schedule', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name'  => 'heading_icon',
            'label' => esc_html__('Icon','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Icon Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl-schedule i' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_fs',
            'label' => esc_html__('Icon Font Size', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px','custom'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl-schedule i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ),

        array(
            'name'  => 'heading_text',
            'label' => esc_html__('Text','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'text_color',
            'label' => esc_html__('Text Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl-schedule' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_typography',
            'label' => esc_html__('Text Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl-schedule',
        ),


        array(
            'name'  => 'heading_background',
            'label' => esc_html__('Background','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ),
        array(
            'name' => 'bg_color_type',
            'label' => esc_html__('Type Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'bg_sty_1'   => 'Style 1',
                'custom'    => 'Custom',
            ],
            'default'   => 'bg_sty_1',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'bg_color_from',
            'label' => esc_html__('Color From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl-schedule' => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'bg_color_type'    => 'custom',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'bg_color_to',
            'label' => esc_html__('Color To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl-schedule' => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'bg_color_type'    => 'custom',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'boder_color',
            'label' => esc_html__('Boder Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item  .pxl-schedule' => 'border-color: {{VALUE}};',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                        ]
                    ]
                ],
            ],
        ),

    ),
),
array(
    'name' => 'section_style_summary',
    'label' => esc_html__('Summary', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                ]
            ]
        ],
    ],
    'controls' => array(

        array(
            'name' => 'summary_color',
            'label' => esc_html__('Summary Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .meta-content .pxl-item--summary' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'summary_typography',
            'label' => esc_html__('Summary Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl--inner .meta-content .pxl-item--summary',
        ),
    ),
),
array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-3']]
                ]
            ]
        ],
    ],
    'controls' => array(

        array(
            'name' => 'boder_button_color',
            'label' => esc_html__('Boder Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .meta-content .pxl-item--button' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bg_button_color',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .meta-content .pxl-item--button a:after' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_button_color',
            'label' => esc_html__('Text Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .meta-content .pxl-item--button a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_color_hover',
            'label' => esc_html__('Text Hover Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .meta-content .pxl-item--button a:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'text_button_typography',
            'label' => esc_html__('Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item .pxl--inner .meta-content .pxl-item--button a',
        ),
    ),
),

array(
    'name' => 'section_style_background',
    'label' => esc_html__('Background Items', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                    ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2']]
                ]
            ]
        ],
    ],
    'controls' => array(
        array(
            'name' => 'bg_items_color',
            'label' => esc_html__('Type Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'   => [
                'color_sty_1'   => 'Style 1',
                'custom'    => 'Custom',
            ],
            'default'   => 'color_sty_1',
        ),

        array(
            'name'  => 'heading_bg',
            'label' => esc_html__('Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'bg_items_color'   => ['custom'],
            ],
        ),
        array(
            'name' => 'bg_items_custom',
            'type'         => \Elementor\Group_Control_Background::get_type(), 
            'control_type' => 'group', 
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item:before',
            'condition' => [
                'bg_items_color'   => ['custom'],
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ],
        ),

        array(
            'name'  => 'heading_bg_hover',
            'label' => esc_html__('Background Color Hover','festiva'),
            'type'  => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
                'bg_items_color'   => ['custom'],
            ],
        ),
        array(
            'name' => 'bg_items_custom_hv',
            'type'         => \Elementor\Group_Control_Background::get_type(), 
            'control_type' => 'group', 
            'types' => [ 'gradient' ],
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-carousel-inner .pxl-swiper-container .pxl-swiper-wrapper .pxl-swiper-slide .pxl--item:after',
            'condition' => [
                'bg_items_color'   => ['custom'],
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-2']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ],
        ),
        
    ),
),



),
),
),
festiva_get_class_widget_path()
);