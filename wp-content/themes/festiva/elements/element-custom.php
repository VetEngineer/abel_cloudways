<?php 
/* Start Section */
add_action( 'elementor/element/section/section_structure/after_section_end', 'festiva_add_custom_section_controls' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'festiva_add_custom_section_overlay_color' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'festiva_add_custom_section_overlay_img' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'festiva_add_custom_section_divider' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'festiva_add_custom_section_particles' );
function festiva_add_custom_section_controls( \Elementor\Element_Base $element) {

    $element->start_controls_section(
        'section_pxl',
        [
            'label' => esc_html__( 'Festiva General Settings', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_scroll_fixed',
        [
            'label'   => esc_html__( 'Column Fixed', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'festiva' ),
                'fixed'   => esc_html__( 'Yes', 'festiva' ),
            ),
            'prefix_class' => 'pxl-row-scroll-',
            'default'      => 'none',      
        ]
    );

    $element->add_control(
        'full_content_with_space',
            [
              'label' => esc_html__( 'Full Content with space from?', 'festiva' ),
              'type'         => \Elementor\Controls_Manager::SELECT,
              'prefix_class' => 'pxl-full-content-with-space-',
              'options'      => array(
                'none'    => esc_html__( 'None', 'festiva' ),
                'start'   => esc_html__( 'Start', 'festiva' ),
                'end'     => esc_html__( 'End', 'festiva' ),
            ),
              'default'      => 'none',
              'condition' => [
                'layout' => 'full_width'
            ]
        ]
    
    );

    $element->add_control(
        'pxl_container_width',
        [
            'label' => esc_html__('Container Width', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 1200,
            'condition' => [
              'layout' => 'full_width',
              'full_content_with_space!' => 'none'
          ]           
      ]
  );

    $element->add_control(
        'pxl_section_overflow',
        [
            'label'   => esc_html__( 'Overflow', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'visible'        => esc_html__( 'Visible', 'festiva' ),
                'hidden'   => esc_html__( 'Hidden', 'festiva' ),
            ),
            'default'      => 'visible', 
            'separator' => 'after',
            'prefix_class' => 'pxl-section-overflow-'     
        ]
    );

    $element->add_control(
        'pxl_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'festiva' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'festiva' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'festiva' ),
                'center center' => esc_html__( 'Center Center', 'festiva' ),
                'center left'   => esc_html__( 'Center Left', 'festiva' ),
                'center right'  => esc_html__( 'Center Right', 'festiva' ),
                'top center'    => esc_html__( 'Top Center', 'festiva' ),
                'top left'      => esc_html__( 'Top Left', 'festiva' ),
                'top right'     => esc_html__( 'Top Right', 'festiva' ),
                'bottom center' => esc_html__( 'Bottom Center', 'festiva' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'festiva' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'festiva' ),
                'initial'       =>  esc_html__( 'Custom', 'festiva' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_bg_pos_custom_y.SIZE}}{{pxl_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{pxl_parallax_bg_pos_custom_x.SIZE}}{{pxl_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_parallax_bg_position' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'festiva' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'festiva' ),
                'auto' => esc_html__( 'Auto', 'festiva' ),
                'cover'   => esc_html__( 'Cover', 'festiva' ),
                'contain'  => esc_html__( 'Contain', 'festiva' ),
                'initial'    => esc_html__( 'Custom', 'festiva' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_parallax_bg_size' => [ 'initial' ],
                'pxl_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'festiva' ),
            'label_on' => esc_html__( 'Custom', 'festiva' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_responsive_control(
        'pxl_parallax_pos_left',
        [
            'label' => esc_html__( 'Left', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'left: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_top',
        [
            'label' => esc_html__( 'Top', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'top: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_responsive_control(
        'pxl_parallax_pos_right',
        [
            'label' => esc_html__( 'Right', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'right: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_bottom',
        [
            'label' => esc_html__( 'Bottom', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'bottom: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->end_popover();

    $element->add_control(
        'pxl_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'festiva' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'festiva' ),
            'label_on' => esc_html__( 'Custom', 'festiva' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_control(
        'pxl_parallax_bg_img_effect_x',
        [
            'label' => esc_html__( 'TranslateX', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_y',
        [
            'label' => esc_html__( 'TranslateY', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_z',
        [
            'label' => esc_html__( 'TranslateZ', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_x',
        [
            'label' => esc_html__( 'Rotate X', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_y',
        [
            'label' => esc_html__( 'Rotate Y', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_rotate_z',
        [
            'label' => esc_html__( 'Rotate Z', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_x',
        [
            'label' => esc_html__( 'Scale X', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_y',
        [
            'label' => esc_html__( 'Scale Y', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale_z',
        [
            'label' => esc_html__( 'Scale Z', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_img_effect_scale',
        [
            'label' => esc_html__( 'Scale', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_parallax_bg_from_scroll_custom',
        [
            'label' => esc_html__( 'Scroll From (px)', 'festiva' ).' (350) from offset top',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_section_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-section-bg-parallax',
            'condition'     => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_section_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-section-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    
    $element->end_controls_section();
};
function festiva_add_custom_section_overlay_color( \Elementor\Element_Base $element) {

    $element->start_controls_section(
        'section_overlay_color',
        [
            'label' => esc_html__( 'Festiva Overlay Color', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'pxl_color_offset',
        [
            'label'   => esc_html__( 'Overlay Color', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'festiva' ),
                'top'   => esc_html__( 'Top Space', 'festiva' ),
                'left'   => esc_html__( 'Left Space', 'festiva' ),
                'right'   => esc_html__( 'Right Space', 'festiva' ),
                'skew'   => esc_html__( 'Skew', 'festiva' ),
            ),
            'prefix_class' => 'pxl-bg-color-',
            'default'      => 'none',
        ]
    );

    $element->add_control(
        'overlay_top_space',
        [
            'label' => esc_html__('Overlay Top Space', 'festiva' ),
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
                '{{WRAPPER}}.pxl-bg-color-top::before' => 'top: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['top'],
            ],
        ]
    );

    $element->add_control(
        'overlay_left_space',
        [
            'label' => esc_html__('Overlay Left Space', 'festiva' ),
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
                '{{WRAPPER}}.pxl-bg-color-left::before' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left'],
            ],
        ]
    );

    $element->add_control(
        'overlay_right_space',
        [
            'label' => esc_html__('Overlay Right Space', 'festiva' ),
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
                '{{WRAPPER}}.pxl-bg-color-right::before' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['right'],
            ],
        ]
    );

    $element->add_control(
        'offset_color',
        [
            'label' => esc_html__('Overlay Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-left:before, {{WRAPPER}}.pxl-bg-color-right:before, {{WRAPPER}}.pxl-bg-color-skew:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left','right','skew'],
            ],
        ]
    );

    $element->add_control(
        'offset_color_top_fr',
        [
            'label' => esc_html__('Overlay Color From', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-top:before' => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['top'],
            ],
        ]
    );
    $element->add_control(
        'offset_color_top_to',
        [
            'label' => esc_html__('Overlay Color To', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-top:before' => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['top'],
            ],
        ]
    );

    $element->add_control(
        'overlay_broder_radius',
        [
            'label' => esc_html__('Overlay Border Radius', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-left:before, {{WRAPPER}}.pxl-bg-color-right:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left','right'],
            ],
        ]
    );

    $element->end_controls_section();
};

function festiva_add_custom_section_overlay_img( \Elementor\Element_Base $element) {

    $element->start_controls_section(
        'section_overlay_img',
        [
            'label' => esc_html__( 'Festiva Overlay Image', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'pxl_overlay_display',
        [
            'label'   => esc_html__( 'Overlay Image', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'festiva' ),
                'image'   => esc_html__( 'Yes', 'festiva' ),
            ),
            'prefix_class' => 'pxl-section-overlay-',
            'default'      => 'none',
        ]
    );

    $element->add_control(
        'pxl_overlay_img',
        [
            'label'   => esc_html__( 'Select Image', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'condition' => [
                'pxl_overlay_display' => ['image'],
            ],
        ]
    );

    $element->end_controls_section();
};

function festiva_add_custom_section_divider( \Elementor\Element_Base $element) {

    $element->start_controls_section(
        'section_divider',
        [
            'label' => esc_html__( 'Festiva Divider', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_divider',
        [
            'label'   => esc_html__( 'Divider', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'None', 'festiva' ),
                'angle-top'   => esc_html__( 'Angle Top Left', 'festiva' ),
                'angle-top-right'   => esc_html__( 'Angle Top Right', 'festiva' ),
                'angle-bottom-left'   => esc_html__( 'Angle Bottom Left', 'festiva' ),
                'angle-bottom'   => esc_html__( 'Angle Bottom Right', 'festiva' ),
                'angle-top-bottom'   => esc_html__( 'Angle Top & Bottom Right', 'festiva' ),
                'angle-top-bottom-left'   => esc_html__( 'Angle Top & Bottom Left', 'festiva' ),
                'wave-animation-top'   => esc_html__( 'Wave Animation Top', 'festiva' ),
                'wave-animation-bottom'   => esc_html__( 'Wave Animation Bottom 1', 'festiva' ),
                'wave-animation-bottom2'   => esc_html__( 'Wave Animation Bottom 2', 'festiva' ),
                'curved-top'   => esc_html__( 'Curved Top', 'festiva' ),
                'curved-bottom'   => esc_html__( 'Curved Bottom', 'festiva' ),
                'vertical1'   => esc_html__( 'Divider Vertical', 'festiva' ),
            ),
            'prefix_class' => 'pxl-row-divider-active pxl-row-divider-',
            'default'      => '',
        ]
    );

    $element->add_control(
        'divider_color',
        [
            'label' => esc_html__('Divider Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-wave-parallax > use' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-divider-vertical > div' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $element->add_responsive_control(
        'divider_height',
        [
            'label' => esc_html__('Divider Height', 'festiva' ),
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
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-section-waves' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'row_divider!' => ['vertical1'],
            ],     
        ]
    );

    $element->end_controls_section();
};

function festiva_add_custom_section_particles( \Elementor\Element_Base $element) {

    $element->start_controls_section(
        'section_particles',
        [
            'label' => esc_html__( 'Festiva Particles', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_particles_display',
        [
            'label'   => esc_html__( 'Particles', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',  
        ]
    );

    $element->add_control(
        'number',
        [
            'label' => esc_html__('Number', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 4,      
            'condition' => [
                'row_particles_display' => ['yes'],
            ],     
        ]
    );

    $element->add_control(
        'size',
        [
            'label' => esc_html__('Size', 'festiva'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 3, 
            'condition' => [
                'row_particles_display' => ['yes'],
            ],           
        ]
    );

    $element->add_control(
        'size_random',
        [
            'label' => esc_html__('Size Random', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],   
        ]
    );

    $element->add_control(
        'move_direction',
        [
            'label'   => esc_html__( 'Move Direction', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'festiva' ),
                'top'        => esc_html__( 'Top', 'festiva' ),
                'top-right'        => esc_html__( 'Top Right', 'festiva' ),
                'right'        => esc_html__( 'Right', 'festiva' ),
                'bottom-right'        => esc_html__( 'Bottom Right', 'festiva' ),
                'bottom'        => esc_html__( 'Bottom', 'festiva' ),
                'bottom-left'        => esc_html__( 'Bottom Left', 'festiva' ),
                'left'        => esc_html__( 'Left', 'festiva' ),
                'top-left'        => esc_html__( 'Top Left', 'festiva' ),
            ),
            'default'      => 'none',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],  
        ]
    );

    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'particle_color', 
        [
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );
    $element->add_control(
        'particle_color_item',
        [
            'label' => esc_html__('Color', 'festiva'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'condition' => [
                'row_particles_display' => ['yes'],
            ],    
        ]
    );

    $element->end_controls_section();
};

/* End Section */

/* Start Column */
add_action( 'elementor/element/column/layout/after_section_end', 'festiva_add_custom_columns_controls' ); 
function festiva_add_custom_columns_controls( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'columns_pxl',
        [
            'label' => esc_html__( 'Festiva General Settings', 'festiva' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'col_content_align',
        [
            'label'   => esc_html__( 'Column Content Align', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''           => esc_html__( 'Default', 'festiva' ),
                'start'           => esc_html__( 'Start', 'festiva' ),
                'center'           => esc_html__( 'Center', 'festiva' ),
                'end'           => esc_html__( 'End', 'festiva' ),
            ),
            'default' => '',
            'prefix_class' => 'pxl-col-align-'
        ]
    );
    $element->add_control(
        'col_sticky',
        [
            'label'   => esc_html__( 'Column Sticky', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'           => esc_html__( 'No', 'festiva' ),
                'sticky' => esc_html__( 'Yes', 'festiva' ),
            ),
            'default' => 'none',
            'prefix_class' => 'pxl-column-'
        ]
    );
    $element->add_control(
        'col_divider',
        [
            'label'   => esc_html__( 'Divider', 'festiva' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'None', 'festiva' ),
                'left'   => esc_html__( 'Left', 'festiva' ),
                'right'   => esc_html__( 'Right', 'festiva' ),
            ),
            'prefix_class' => 'pxl-col-divider-',
            'default'      => '',
        ]
    );
    $element->add_control(
        'bf_left_space',
        [
            'label' => esc_html__('Left Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -3000,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-left:before' => 'left: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'col_divider' => ['left'],
            ],
        ]
    );
    $element->add_control(
        'bf_right_space',
        [
            'label' => esc_html__('Right Space', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -3000,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-right:before' => 'right: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'col_divider' => ['right'],
            ],
        ]
    );
    $element->add_control(
        'col_divider_color',
        [
            'label' => esc_html__('Divider Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-right:before' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}}.pxl-col-divider-left:before' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $element->add_control(
        'pxl_column_parallax_bg_img',
        [
            'label' => esc_html__( 'Parallax Background Image', 'festiva' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'hide_in_inner' => true,
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-image: url( {{URL}} );',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_position',
        [
            'label' => esc_html__( 'Background Position', 'festiva' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'festiva' ),
                'center center' => esc_html__( 'Center Center', 'festiva' ),
                'center left'   => esc_html__( 'Center Left', 'festiva' ),
                'center right'  => esc_html__( 'Center Right', 'festiva' ),
                'top center'    => esc_html__( 'Top Center', 'festiva' ),
                'top left'      => esc_html__( 'Top Left', 'festiva' ),
                'top right'     => esc_html__( 'Top Right', 'festiva' ),
                'bottom center' => esc_html__( 'Bottom Center', 'festiva' ),
                'bottom left'   => esc_html__( 'Bottom Left', 'festiva' ),
                'bottom right'  => esc_html__( 'Bottom Right', 'festiva' ),
                'initial'       =>  esc_html__( 'Custom', 'festiva' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_x',
        [
            'label' => esc_html__( 'X Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_column_parallax_bg_pos_custom_y.SIZE}}{{pxl_column_parallax_bg_pos_custom_y.UNIT}}',
            ],
            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_pos_custom_y',
        [
            'label' => esc_html__( 'Y Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-position: {{pxl_column_parallax_bg_pos_custom_x.SIZE}}{{pxl_column_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
            ],

            'condition' => [
                'pxl_column_parallax_bg_position' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size',
        [
            'label' => esc_html__( 'Background Size', 'festiva' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'hide_in_inner' => true,
            'options'      => array(
                ''              => esc_html__( 'Default', 'festiva' ),
                'auto' => esc_html__( 'Auto', 'festiva' ),
                'cover'   => esc_html__( 'Cover', 'festiva' ),
                'contain'  => esc_html__( 'Contain', 'festiva' ),
                'initial'    => esc_html__( 'Custom', 'festiva' ),
            ),
            'default'      => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{VALUE}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ]        
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_bg_size_custom',
        [
            'label' => esc_html__( 'Background Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,  
            'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 100,
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
            ],
            'condition' => [
                'pxl_column_parallax_bg_size' => [ 'initial' ],
                'pxl_column_parallax_bg_img[url]!' => '',
            ],
        ]
    );
    $element->add_control(
        'pxl_column_parallax_pos_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Position', 'festiva' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'festiva' ),
            'label_on' => esc_html__( 'Custom', 'festiva' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_responsive_control(
        'pxl_column_parallax_pos_left',
        [
            'label' => esc_html__( 'Left', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'left: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_pos_top',
        [
            'label' => esc_html__( 'Top', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'top: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_responsive_control(
        'pxl_column_parallax_pos_right',
        [
            'label' => esc_html__( 'Right', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'right: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_pos_bottom',
        [
            'label' => esc_html__( 'Bottom', 'festiva' ).' (50px) px,%,vw,auto',
            'type' => 'text',
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'bottom: {{VALUE}}',
            ],
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->end_popover();

    $element->add_control(
        'pxl_column_parallax_effect_popover_toggle',
        [
            'label' => esc_html__( 'Parallax Background Effect', 'festiva' ),
            'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
            'label_off' => esc_html__( 'Default', 'festiva' ),
            'label_on' => esc_html__( 'Custom', 'festiva' ),
            'return_value' => 'yes',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->start_popover();
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_x',
        [
            'label' => esc_html__( 'TranslateX', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_y',
        [
            'label' => esc_html__( 'TranslateY', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_z',
        [
            'label' => esc_html__( 'TranslateZ', 'festiva' ).' (-80)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_rotate_x',
        [
            'label' => esc_html__( 'Rotate X', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_rotate_y',
        [
            'label' => esc_html__( 'Rotate Y', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_rotate_z',
        [
            'label' => esc_html__( 'Rotate Z', 'festiva' ).' (30)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_scale_x',
        [
            'label' => esc_html__( 'Scale X', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    ); 
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_scale_y',
        [
            'label' => esc_html__( 'Scale Y', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_scale_z',
        [
            'label' => esc_html__( 'Scale Z', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_img_effect_scale',
        [
            'label' => esc_html__( 'Scale', 'festiva' ).' (1.2)',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_control(
        'pxl_column_parallax_bg_from_scroll_custom',
        [
            'label' => esc_html__( 'Scroll From (px)', 'festiva' ).' (350) from offset top',
            'type' => 'text',
            'default' => '',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->end_popover(); 
    $element->add_group_control(
        \Elementor\Group_Control_Css_Filter::get_type(),
        [
            'name'      => 'pxl_column_parallax_img_css_filter',
            'selector' => '{{WRAPPER}} .pxl-column-bg-parallax',
            'condition'     => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );
    $element->add_responsive_control(
        'pxl_column_parallax_opacity',
        [
            'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%' ],
            'range' => [
                '%' => [
                    'min' => 1,
                    'max' => 100,
                ]
            ],
            'default'    => [
                'unit' => '%'
            ],
            'laptop_default' => [
                'unit' => '%',
            ],
            'tablet_extra_default' => [
                'unit' => '%',
            ],
            'tablet_default' => [
                'unit' => '%',
            ],
            'mobile_extra_default' => [
                'unit' => '%',
            ],
            'mobile_default' => [
                'unit' => '%',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-column-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_column_parallax_bg_img[url]!' => ''
            ] 
        ]
    );

    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'festiva'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'festiva' ),
            'label_off' => esc_html__( 'No', 'festiva' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );

    $element->end_controls_section();
}

/* End Column */

add_action( 'elementor/element/after_add_attributes', 'festiva_custom_el_attributes', 10, 1 );
function festiva_custom_el_attributes($el){
    if( 'section' !== $el->get_name() ) {
        return;
    }
    $settings = $el->get_settings();

    $pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

    if( isset( $settings['stretch_section']) && $settings['stretch_section'] == 'section-stretched') 
        $pxl_container_width = $pxl_container_width - 30;

    $pxl_container_width = $pxl_container_width.'px';

    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'start' ) {
       
        $el->add_render_attribute( '_wrapper', 'style', 'padding-left: calc( (100% - '.$pxl_container_width.')/2);');
    }
    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'end' ) {
       
          $el->add_render_attribute( '_wrapper >', 'style', 'padding-right: calc( (100% - '.$pxl_container_width.')/2);');
    }
    if( 'section' == $el->get_name() ) {
        if ( isset( $settings['pxl_header_type'] ) && !empty($settings['pxl_header_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-'.$settings['pxl_header_type']);
        }
    }
}

add_filter( 'pxl-custom-section/before-render', 'festiva_custom_section_before_render', 10, 3 );
function festiva_custom_section_before_render($html ,$settings, $el) {

    if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_parallax_bg_from_scroll_custom'];
        }
         
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-section-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }

    if(!empty($settings['row_divider'])) {
        if($settings['row_divider'] == 'angle-top' || $settings['row_divider'] == 'angle-bottom' || $settings['row_divider'] == 'angle-top-right' || $settings['row_divider'] == 'angle-bottom-left') {
            $html .=  '<svg class="pxl-row-angle" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
        }
        if($settings['row_divider'] == 'angle-top-bottom' || $settings['row_divider'] == 'angle-top-bottom-left') {
            $html .=  '<svg class="pxl-row-angle pxl-row-angle-top" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg><svg class="pxl-row-angle pxl-row-angle-bottom" style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="130px"><path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"></path></svg>';
        }
        if($settings['row_divider'] == 'wave-animation-top' || $settings['row_divider'] == 'wave-animation-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 150" fill="#fff"><path d="M 0 26.1978 C 275.76 83.8152 430.707 65.0509 716.279 25.6386 C 930.422 -3.86123 1210.32 -3.98357 1439 9.18045 C 2072.34 45.9691 2201.93 62.4429 2560 26.198 V 172.199 L 0 172.199 V 26.1978 Z"><animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z; M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z; M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z; M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate></path></svg>';
        }
        if($settings['row_divider'] == 'wave-animation-bottom2') {
            $pxl_uniqid = uniqid();
            $html .=  '<svg class="pxl-section-waves pxl-section-waves1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto"><defs><path id="pxl-gentle-wave-'.$pxl_uniqid.'" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" /></defs><g class="pxl-wave-parallax"><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="0" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="3" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="5" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="7" /></g></svg>';
        }
        if($settings['row_divider'] == 'curved-top' || $settings['row_divider'] == 'curved-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 128" version="1.1" preserveAspectRatio="none" style="fill:#ffffff"><path stroke-width="0" d="M-1,126a3693.886,3693.886,0,0,1,1921,2.125V-192H-7Z"></path></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow') {
            $html .=  '<svg class="pxl-curved-arrow pxl-curved-arrow-top" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg><svg class="pxl-curved-arrow pxl-curved-arrow-bottom" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow-inner-top') {
            $html .=  '<svg class="pxl-curved-arrow-inner-top" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'curved-arrow-inner-bottom') {
            $html .=  '<svg class="pxl-curved-arrow-inner-bottom" data-name="shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 954.78 402.26"><path d="M.74,402.26h0Z"/><path d="M954.78,402.26h0Z"/><path d="M477.39,0C402.6,395.71,19.71,402.18.74,402.26H954C935.08,402.18,552.18,395.71,477.39,0Z"/></svg>';
        }

        if($settings['row_divider'] == 'vertical1') {
            $html .=  '<div class="pxl-divider-vertical"><div class="pxl-section-line1"></div><div class="pxl-section-line2"></div><div class="pxl-section-line3"></div><div class="pxl-section-line4"></div><div class="pxl-section-line5"></div><div class="pxl-section-line6"></div></div>';
        }

        if($settings['row_divider'] == 'divider-border') {
            $html .=  '<div class="pxl-divider-border"><div class="pxl-divider-border-top"></div><div class="pxl-divider-border-bottom"></div></div>';
        }
    }

    if($settings['pxl_color_offset'] == 'full' || $settings['pxl_color_offset'] == 'skew' || $settings['pxl_color_offset'] == 'scroll' ) {
        $html .=  '<div class="pxl-section-overlay-color overlay-type-'.$settings['pxl_color_offset'].'" data-space-top="'.$settings['overlay_space_sc']['top'].'" data-space-left="'.$settings['overlay_space_sc']['left'].'" data-space-right="'.$settings['overlay_space_sc']['right'].'" data-space-bottom="'.$settings['overlay_space_sc']['bottom'].'" data-radius-top="'.$settings['overlay_broder_radius_sc']['top'].'" data-radius-right="'.$settings['overlay_broder_radius_sc']['right'].'" data-radius-bottom="'.$settings['overlay_broder_radius_sc']['bottom'].'" data-radius-left="'.$settings['overlay_broder_radius_sc']['left'].'"></div>';
    }

    if($settings['pxl_overlay_display'] == 'image' && !empty($settings['pxl_overlay_img']['url'])) {
        $html .=  '<div class="pxl-overlay--image pxl-overlay--imageLeft"><div class="bg-image"></div></div>';
    }

    if($settings['pxl_overlay_display'] == 'image' && $settings['pxl_overlay_img2']['url']) {
        $html .=  '<div class="pxl-overlay--image pxl-overlay--imageRight"><div class="bg-image"></div></div>';
    }

    if(!empty($settings['row_particles_display']) && $settings['row_particles_display'] == 'yes') {
        wp_enqueue_script('particles-background');
        $s_random = '';
        if($settings['size_random'] == 'yes') {
            $s_random = 'true';
        } else {
            $s_random = 'false';
        }
        $colors = [];
        foreach($settings['particle_color_item'] as $values) {
            $colors[] = $values['particle_color'];
        }
        if(empty($colors)) {
            $colors = ["#b73490","#006b41","#cd3000","#608ecb","#ffb500","#6e4e00","#6b541b","#305686","#00ffb4","#8798ff","#0044c1"];
        }
        $el->add_render_attribute( 'color', 'data-color', json_encode($colors) );
        $html .= '<div id="pxl-row-particles-'.uniqid().'" class="pxl-row-particles" data-number="'.$settings['number'].'" data-size="'.$settings['size'].'" data-size-random="'.$s_random.'" data-move-direction="'.$settings['move_direction'].'" '.$el->get_render_attribute_string( 'color' ).'></div>';
    }

    if(isset($settings['row_effect_images']) && !empty($settings['row_effect_images']) && count($settings['row_effect_images'])):
        $html .= '<div class="pxl-section-effect-images">';
            foreach ($settings['row_effect_images'] as $key => $value):
                $item_image = isset($value['item_image']) ? $value['item_image'] : '';
                $effect_image = isset($value['effect_image']) ? $value['effect_image'] : '';
                $image_display = isset($value['image_display']) ? $value['image_display'] : '';
                $image_display_md = isset($value['image_display_md']) ? $value['image_display_md'] : '';
                $image_display_sm = isset($value['image_display_sm']) ? $value['image_display_sm'] : '';
                $parallax_scroll_type = isset($value['parallax_scroll_type']) ? $value['parallax_scroll_type'] : '';
                $parallax_scroll_value = isset($value['parallax_scroll_value']) ? $value['parallax_scroll_value'] : '';
                $hidde_class = '';
                if($image_display !== 'false') {
                   $hidde_class = 'pxl-hide-sr-lg';
                }
                $hidde_class_md = '';
                if($image_display_md !== 'false') {
                   $hidde_class_md = 'pxl-hide-sr-md';
                }
                $hidde_class_sm = '';
                if($image_display_sm !== 'false') {
                   $hidde_class_sm = 'pxl-hide-sr-sm';
                }
                $effects = [];
                if($parallax_scroll_type == 'y' && !empty($parallax_scroll_value)){
                    $effects['y'] = (int)$parallax_scroll_value;
                }
                if($parallax_scroll_type == 'x' && !empty($parallax_scroll_value)){
                    $effects['x'] = (int)$parallax_scroll_value;
                }
                if($parallax_scroll_type == 'z' && !empty($parallax_scroll_value)){
                    $effects['z'] = (int)$parallax_scroll_value;
                }
                $data_parallax = json_encode($effects);

                wp_enqueue_script( 'pxl-parallax-move-mouse');
                $parallax_hover_value = isset($value['parallax_hover_value']) ? $value['parallax_hover_value'] : '';

                $html .= '<img data-parallax-value="'.esc_attr($parallax_hover_value).'" data-parallax="'.esc_attr($data_parallax).'" class="pxl-item--image elementor-repeater-item-'.$value['_id'].' '.$effect_image.' '.$hidde_class.' '.$hidde_class_md.' '.$hidde_class_sm.'" src="'.$item_image['url'].'" />';
            endforeach;
        $html .= '</div>';
    endif;

    return $html;

}

add_filter( 'pxl-custom-column/before-render', 'festiva_custom_column_before_render', 10, 3 );
function festiva_custom_column_before_render($html, $settings, $el){
    if(!empty($settings['pxl_column_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_column_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_column_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_column_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_column_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_column_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_column_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_column_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_column_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_column_parallax_bg_from_scroll_custom'];
        }
         
        $data_parallax = json_encode($effects);
        $html .= '<div class="pxl-column-bg-parallax" data-parallax="'.esc_attr($data_parallax).'"></div>';
    }
    return $html;
}