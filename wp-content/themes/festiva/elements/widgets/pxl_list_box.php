<?php
$templates = festiva_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list_box',
        'title' => esc_html__( 'BR List Box', 'festiva' ),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list_box/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'festiva' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list_box/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'list_box_content',
                    'label' => esc_html__( 'List Box', 'festiva' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '2',
                        ),
                        array(
                            'name' => 'list_box',
                            'label' => esc_html__( 'Content', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__( 'Image', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'author_fisrtname',
                                    'label' => esc_html__( 'Author First Name', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'author_lastname',
                                    'label' => esc_html__( 'Author Last Name', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__( 'Position', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ), 
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__( 'Link', 'festiva' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block'   => true,
                                ),
                            ),
                            'title_field' => '{{{ author_fisrtname }}}',
                        ),
                    ),
                ),

                array(
                   'name' => 'section_style',
                   'label' => esc_html__( 'Style', 'festiva' ),
                   'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                   'controls' => array(
                    array(
                        'name'  => 'heading_author_name',
                        'label' => esc_html__('Author Name','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'color_first_name',
                        'label' => esc_html__(' First Name Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl-first--name' => 'color: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'typography_first_name',
                        'label' => esc_html__('First Name Typography', 'festiva' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl-first--name',
                    ),
                    array(
                        'name' => 'color_last_name',
                        'label' => esc_html__(' Last Name Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl-last--name' => 'color: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'typography_last_name',
                        'label' => esc_html__('Last Name Typography', 'festiva' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl-last--name',
                    ),

                    array(
                        'name'  => 'heading_position',
                        'label' => esc_html__('Position','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'color_position',
                        'label' => esc_html__(' Position Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl--position' => 'color: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'typography_position',
                        'label' => esc_html__('Position Typography', 'festiva' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl--position',
                    ),

                    array(
                        'name'  => 'heading_number',
                        'label' => esc_html__('Number','festiva'),
                        'type'  => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ),
                    array(
                        'name' => 'color_number',
                        'label' => esc_html__(' Number Color', 'festiva' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl--position' => 'color: {{VALUE}};',
                        ],
                    ),
                    array(
                        'name' => 'typography_number',
                        'label' => esc_html__('Number Typography', 'festiva' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb .pxl--position',
                    ),

                ),


),
array(
    'name' => 'section_style_active',
   'label' => esc_html__( 'Style Active', 'festiva' ),
   'tab' => \Elementor\Controls_Manager::TAB_STYLE,
   'controls' => array(
    array(
        'name' => 'bg_active',
        'label' => esc_html__(' Background', 'festiva' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active' => 'background: {{VALUE}};',
        ],
    ),
    array(
        'name'  => 'heading_author_name_active',
        'label' => esc_html__('Author Name','festiva'),
        'type'  => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ),
    array(
        'name' => 'color_first_name_active',
        'label' => esc_html__(' First Name Color', 'festiva' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl-first--name' => 'color: {{VALUE}};',
        ],
    ),
    array(
        'name' => 'typography_first_name_active',
        'label' => esc_html__('First Name Typography', 'festiva' ),
        'type' => \Elementor\Group_Control_Typography::get_type(),
        'control_type' => 'group',
        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl-first--name',
    ),
    array(
        'name' => 'color_last_name_active',
        'label' => esc_html__(' Last Name Color', 'festiva' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl-last--name' => 'color: {{VALUE}};',
        ],
    ),
    array(
        'name' => 'typography_last_name_active',
        'label' => esc_html__('Last Name Typography', 'festiva' ),
        'type' => \Elementor\Group_Control_Typography::get_type(),
        'control_type' => 'group',
        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl-last--name',
    ),

    array(
        'name'  => 'heading_position_active',
        'label' => esc_html__('Position','festiva'),
        'type'  => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ),
    array(
        'name' => 'color_position_active',
        'label' => esc_html__(' Position Color', 'festiva' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl--position' => 'color: {{VALUE}};',
        ],
    ),
    array(
        'name' => 'typography_position_active',
        'label' => esc_html__('Position Typography', 'festiva' ),
        'type' => \Elementor\Group_Control_Typography::get_type(),
        'control_type' => 'group',
        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl--position',
    ),

    array(
        'name'  => 'heading_number_active',
        'label' => esc_html__('Number','festiva'),
        'type'  => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ),
    array(
        'name' => 'color_number_active',
        'label' => esc_html__(' Number Color', 'festiva' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl--position' => 'color: {{VALUE}};',
        ],
    ),
    array(
        'name' => 'typography_number_active',
        'label' => esc_html__('Number Typography', 'festiva' ),
        'type' => \Elementor\Group_Control_Typography::get_type(),
        'control_type' => 'group',
        'selector' => '{{WRAPPER}} .pxl-listbox .pxl-content--lb.active .pxl--position',
    ),

),


),
festiva_widget_animation_settings(),
),
),
),
festiva_get_class_widget_path()
);