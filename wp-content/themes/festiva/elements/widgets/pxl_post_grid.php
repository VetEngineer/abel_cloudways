<?php
$pt_supports = ['post','event'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('BR Post Grid', 'festiva' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                                'default'  => 'post'
                            ) 
                        ),
                        festiva_get_post_grid_layout($pt_supports),
                    ),
                ),

                array(
                    'name' => 'tab_source',
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
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 410x514 (Width x Height)).',
                            
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('BR Animate', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => festiva_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'festiva' ),
                                'false' => esc_html__('Disable', 'festiva' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'festiva' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                          'name' => 'filter_alignment',
                          'label' => esc_html__( 'Filter Alignment', 'festiva' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'festiva' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'festiva' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'festiva' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-grid .pxl-grid-filter' => 'text-align: {{VALUE}};',
                        ],
                        'condition' => [
                            'filter' => 'true',
                            'select_post_by' => 'term_selected',
                        ],
                    ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'festiva' ),
                                'loadmore' => esc_html__('Loadmore', 'festiva' ),
                                'false' => esc_html__('Disable', 'festiva' ),
                            ],
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
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'festiva' ),
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'festiva' ),
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
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'festiva' ),
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
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'festiva'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
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
                                    'name' => 'col_sm_m',
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
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns MD Devices', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns LG Devices', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns XL Devices', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 410x514 (Width x Height)).',
                                ),
                            ),
),
),
),
array(
    'name' => 'tab_display',
    'label' => esc_html__('Display', 'festiva' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 't_color',
            'label' => esc_html__('Title Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-grid-item .pxl-item--inner .pxl-item--title' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-grid .pxl-grid-item .pxl-item--inner .pxl-item--title',
        ),
        array(
            'name' => 'item_padding',
            'label' => esc_html__('Item Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => '15',
                'right' => '15',
                'bottom' => '15',
                'left' => '15'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'bd_ic_cl',
            'label' => esc_html__('Icon Border Color ', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-service-grid-layout1.style-2 .pxl-icon' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'style' => ['style-2'],
            ],
        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-3']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_author',
            'label' => esc_html__('Show Author', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-1','event-2','event-3']]
                        ]
                    ],
                ],
            ]
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
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2']]
                        ]
                    ],
                ],
            ]
        ),


        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button LearnMore', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
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
                            ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-2','event-3']]
                        ]
                    ],
                ],
            ],
            'condition' => [
                'show_button'   => 'true',
            ],
        ),
    ),
),
array(
    'name'  => 'tab_style_layout',
    'label' => esc_html__('Layout','festiva'),
    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
    'controls'  => array_merge(
        array(
            array(
                'name'  => 'style_layout',
                'label' => esc_html__('Style Layout','festiva'),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'style-layout--1'   => esc_html__('Style Layout 1','festiva'),
                    'style-layout--2'   => esc_html__('Style Layout 2','festiva'),
                ],
                'default'   => 'style-layout--1',
            ),

        ),
    ),
),
array(
    'name'  => 'tab_style_title',
    'label' => esc_html__('Title','festiva'),
    'tab'  => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name'  => 'heading_author',
                'label' => esc_html__('Author Name','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'text_color_author',
                'label' => esc_html__('Color Text Author','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--author .info-author,
                    {{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--author .info-author .name a'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'typography_author',
                'label' => esc_html__('Typography Author','festiva'),
                'type'  => \Elementor\Group_Control_Typography::get_type(),
                'control_type'  => 'group',
                'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--author .info-author,{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--author .info-author .name a' ,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),

            array(
                'name'  => 'heading_title',
                'label' => esc_html__('Title','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'style_color_title',
                'label' => esc_html__('Style Title Color','festiva'),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'style-color--1' => 'Style Color 1',
                    'custom'              => 'Custom',
                ],
                'default'   => 'style-color--1',
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
            ),
            array(
                'name'  => 'color_title_from',
                'label' => esc_html__('Title Color From','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-inner .pxl-item--title'  => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    'style_color_title' => 'custom',
                ],
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
            ),
            array(
                'name'  => 'color_title_to',
                'label' => esc_html__('Title Color To','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-inner .pxl-item--title'  => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    'style_color_title' => 'custom',
                ],
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

            ),
            array(
                'name'  => 'color_title',
                'label' => esc_html__('Title Color','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--title a'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ],
                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),

            array(
                'name'  => 'typography_title',
                'label' =>  esc_html__('Typography','festiva'),
                'type'  => \Elementor\Group_Control_Typography::get_type(),
                'control_type'=> 'group',
                'selector'  => '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--title a '
            ),
        ),
),
),
array(
    'name'  => 'tab_style_schedule',
    'label' => esc_html__('Schedule','festiva'),
    'tab'  => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name'  => 'color_icon_from',
                'label' => esc_html__('Color Icon From','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-schedule i'  => '--gradient-color-from: {{VALUE}};',
                ],
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
            ),
            array(
                'name'  => 'color_icon_to',
                'label' => esc_html__('Color Icon To','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-schedule i'  => '--gradient-color-to: {{VALUE}};',
                ],
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
            ),
            array(
                'name'  => 'typography_schedule',
                'label' =>  esc_html__('Typography','festiva'),
                'type'  => \Elementor\Group_Control_Typography::get_type(),
                'control_type'=> 'group',
                'selector'  => '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-schedule,
                {{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta span'
            ),
            array(
                'name'  => 'color_text_schedule',
                'label' => esc_html__('Color Text','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta span'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),

            array(
                'name'  => 'color_icon_sc',
                'label' => esc_html__('Color Icon','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta i'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),


            array(
                'name' => 'font_size_icon_sc',
                'label' => esc_html__('Font Size Icon', 'festiva' ),
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
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),

            array(
                'name'  => 'background_schedule_type',
                'label' => esc_html__('Background Type','festiva'),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'bg_sty_1'  => esc_html__('Style 1','festiva'),
                    'custom'    => esc_html__('Custom','festiva'),
                ],
                'default'   => 'bg_sty_1',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'background_sc_from',
                'label' => esc_html__('Background From','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta .pxl-item--date'  => '--gradient-color-from: {{VALUE}};',
                ],
                'condition' => [
                    'background_schedule_type'  => 'custom',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'background_sc_to',
                'label' => esc_html__('Background To','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta .pxl-item--date'  => '--gradient-color-to: {{VALUE}};',
                ],
                'condition' => [
                    'background_schedule_type'  => 'custom',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'background_sc_3',
                'label' => esc_html__('Background','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--meta'  => 'background: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            
        ),
),
),
array(
    'name'  => 'tab_style_summary',
    'label' => esc_html__('Summary','festiva'),
    'tab'  => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name'  => 'heading_summary',
                'label' => esc_html__('Summary','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'text_color_summary',
                'label' => esc_html__('Color','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--summary'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'typography_summary',
                'label' => esc_html__('Typography','festiva'),
                'type'  => \Elementor\Group_Control_Typography::get_type(),
                'control_type'  => 'group',
                'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--summary' ,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'heading_readmore',
                'label' => esc_html__('Read more','festiva'),
                'type'  => \Elementor\Controls_Manager::HEADING,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'text_color_readmore',
                'label' => esc_html__('Color','festiva'),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--readmore a'  => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),
            array(
                'name'  => 'typography_readmore',
                'label' => esc_html__('Typography','festiva'),
                'type'  => \Elementor\Group_Control_Typography::get_type(),
                'control_type'  => 'group',
                'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--holder .pxl-item--readmore a' ,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [

                        [
                            'terms' => [
                                ['name' => 'post_type', 'operator' => '==', 'value' => 'event'],
                                ['name' => 'layout_event', 'operator' => 'in', 'value' => ['event-3']]
                            ]
                        ]
                    ],
                ],
            ),




        ),
),
),
array(
    'name'  => 'tab_style_button',
    'label' => esc_html__('Button','festiva'),
    'tab'  => \Elementor\Controls_Manager::TAB_STYLE,
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
    'controls' => array_merge(
       array(
        array(
            'name'  => 'border_color_from',
            'label' => esc_html__('Border Color From','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button '  => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--1',
            ],
        ),
        array(
            'name'  => 'border_color_to',
            'label' => esc_html__('Border Color To','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button'  => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--1',
            ],
        ),
        array(
            'name'  => 'border_color_2',
            'label' => esc_html__('Border Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button'  => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--2',
            ],
        ),

        array(
            'name'  => 'background_color_1',
            'label' => esc_html__('Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button:after'  => 'background: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--1',
            ],
        ),
        array(
            'name'  => 'background_color_2',
            'label' => esc_html__('Background Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button'  => 'background: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--2',
            ],
        ),
        array(
            'name'  => 'background_hover_2',
            'label' => esc_html__('Background Hover Color','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button:after'  => 'background: {{VALUE}};',
            ],
            'condition' => [
                'style_layout' => 'style-layout--2',
            ],
        ),
        array(
            'name'  => 'color_text_button',
            'label' => esc_html__('Color Text','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button a'  => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'color_hover_text_button',
            'label' => esc_html__('Color Hover Text','festiva'),
            'type'  => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button a:hover'  => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name'  => 'typography_button',
            'label' =>  esc_html__('Typography','festiva'),
            'type'  => \Elementor\Group_Control_Typography::get_type(),
            'control_type'=> 'group',
            'selector'  => '{{WRAPPER}} .pxl-grid .pxl-item--holder .meta-content .pxl-item--button a'
        ),
    ),
   ),
), 
),
),
),
festiva_get_class_widget_path(),
);