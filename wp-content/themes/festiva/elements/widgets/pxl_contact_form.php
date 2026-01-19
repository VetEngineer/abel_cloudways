<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'festiva')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('BR Contact Form', 'festiva'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'festiva'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'festiva'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                            
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'festiva'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Typography', 'festiva' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight, {{WRAPPER}} .pxl-select .pxl-select-options li',
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Color', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight, {{WRAPPER}} .pxl-select .pxl-select-options li' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_bg_color',
                                'label' => esc_html__('Background Color', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_padding',
                                'label' => esc_html__('Padding Input', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_border_radius',
                                'label' => esc_html__('Border Radius', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name'         => 'input_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'festiva' ),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight'
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-acceptance), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .row' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}}  !important;',
                                    '{{WRAPPER}} .pxl-contact-form .input-filled:not(.label-text)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'input_height',
                                'label' => esc_html__('Input Height', 'festiva' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-textarea), {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_height',
                                'label' => esc_html__('Textarea Height', 'festiva' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'textarea_padding',
                                'label' => esc_html__('Padding Textarea', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'textarea_border_type',
                                'label' => esc_html__( 'Textarea Border Type', 'festiva' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'textarea_border_width',
                                'label' => esc_html__( 'Textarea Border Width', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'textarea_border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'textarea_typography',
                                'label' => esc_html__('Textarea Typography', 'festiva' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea',
                            ),
                            array(
                                'name' => 'textarea_color',
                                'label' => esc_html__('Textarea Color', 'festiva' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control.wpcf7-textarea' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'input_spacer_bottom',
                                'label' => esc_html__('Spacer Bottom', 'festiva' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .input-filled' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
),
array(
    'name' => 'tab_style_input_hover',
    'label' => esc_html__('Input Hover', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'input_color_hover',
            'label' => esc_html__('Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-options li, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight.active' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'input_bg_color_hover',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'input_box_shadow_hover',
            'label' => esc_html__( 'Box Shadow', 'festiva' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover'
        ),
        array(
            'name' => 'border_type_hover',
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width_hover',
            'label' => esc_html__( 'Border Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_type_hover!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color_hover',
            'label' => esc_html__( 'Border Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type_hover!' => '',
            ],
        ),
    ),
),
array(
    'name' => 'tab_style_button',
    'label' => esc_html__('Button', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button',
        ),
        array(
            'name' => 'button_height',
            'label' => esc_html__('Button Height', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form button' => 'height: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'button_color',
            'label' => esc_html__('Button Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'button_color_hover',
            'label' => esc_html__('Button Color Hover', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'color: {{VALUE}}!important;',
            ],
        ),
        array(
            'name' => 'button_bg_color',
            'label' => esc_html__('Button Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'background: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_bg_color_hover',
            'label' => esc_html__('Button Background Color Hover', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit:hover, {{WRAPPER}} .pxl-contact-form .wpcf7-submit:focus' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_padding',
            'label' => esc_html__('Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'button_margin',
            'label' => esc_html__('Margin', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'button_border_radius',
            'label' => esc_html__('Border Radius', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name'         => 'button_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'festiva' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-contact-form .wpcf7-submit, {{WRAPPER}} .pxl-contact-form button'
        ),
        array(
            'name' => 'button_border_type',
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-style: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_border_width',
            'label' => esc_html__( 'Border Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'button_border_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'button_border_color',
            'label' => esc_html__( 'Border Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'button_border_type!' => '',
            ],
        ),
        array(
            'name' => 'btn_width',
            'label' => esc_html__( 'Width', 'festiva' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'btn-w-auto' => 'Auto',
                'btn-w-full' => '100%',
            ],
            'default' => 'btn-w-auto',
        ),
        array(
            'name' => 'btn_spacer_top',
            'label' => esc_html__('Spacer Top', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'tab_box',
    'label' => esc_html__('Box', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'box_bgr',
            'label' => esc_html__('Background Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form,{{WRAPPER}} .pxl-contact-form .wrap-form' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_border_radius',
            'label' => esc_html__('Border Radius', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_padding',
            'label' => esc_html__('Padding', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wrap-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name'         => 'box_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'festiva' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-contact-form .wrap-form'
        ),
    ),
),
festiva_widget_animation_settings(),
array(
    'name' => 'extra',
    'label' => esc_html__('Extra', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => ' ',
            'label' => esc_html__('Space Label', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'label_color',
            'label' => esc_html__('Label Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form  label,{{WRAPPER}} .pxl-contact-form h5' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'label_typography',
            'label' => esc_html__('Label Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-contact-form  label,{{WRAPPER}} .pxl-contact-form h5',
        ),
        array(
            'name' => 'label_spacer_bottom',
            'label' => esc_html__('Label Spacer Bottom', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form  label,{{WRAPPER}} .pxl-contact-form h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'radio_custom',
    'label' => esc_html__('Radio Button', 'festiva'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'space_box_rd',
            'label' => esc_html__('Space Box Radio Button', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-radio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'space_rd_label',
            'label' => esc_html__('Space Label', 'festiva' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form .wpcf7-list-item-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'label_rd_color',
            'label' => esc_html__('Label Color', 'festiva' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-contact-form  .wpcf7-list-item-label' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'label_rd_typography',
            'label' => esc_html__('Label Typography', 'festiva' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-contact-form  .wpcf7-list-item-label',
        ),
        array(
            'name' => 'w_rd',
            'label' => esc_html__(' Width Height Radio Button', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-list-item-label:before' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
        ),

        array(
            'name' => 'bd_width_before_rd',
            'label' => esc_html__('Border Width Before Radio Button', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-list-item-label:before' => 'border-width: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'width_before_rd',
            'label' => esc_html__('Width Height Before Radio Button', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-list-item-label:after' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'space_bf_rd_label1',
            'label' => esc_html__('Border Width Before Radio Button', 'festiva' ),
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
                '{{WRAPPER}} .pxl-contact-form .wpcf7-radio .wpcf7-list-item-label:after' => 'left: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
),
),
),
festiva_get_class_widget_path()
);
}