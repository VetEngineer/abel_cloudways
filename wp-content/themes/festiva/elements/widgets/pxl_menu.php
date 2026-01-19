<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$pxl_menus = array(
    '' => esc_html__('Default', 'festiva')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $value ) {
        if ( is_object( $value ) && isset( $value->name, $value->slug ) ) {
            $pxl_menus[ $value->slug ] = $value->name;
        }
    }
} else {
    $pxl_menus = '';
}
pxl_add_custom_widget(
    array(
        'name' => 'pxl_menu',
        'title' => esc_html__('BR Nav Menu', 'festiva'),
        'icon' => 'eicon-nav-menu',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'festiva'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $pxl_menus,
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
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
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'float: none;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_first_level',
                    'label' => esc_html__('First Level', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_menu',
                            'label' => esc_html__('Select Layout Menu','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'  =>   [
                                'default'  => 'Default',
                                'style-1'   => 'Style 1',
                                'style-2'   => 'Style 2',
                            ],
                            'default'   => 'style-1',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li:hover > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current-menu-parent > a:not(.is-one-page), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.current_page_item > a:not(.is-one-page), {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a.pxl-onepage-active' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'arrow_color',
                            'label' => esc_html__('Arrow Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a .caseicon-double-chevron-down' => 'color: {{VALUE}};',
                            ],
                        ),



                        array(
                            'name'  => 'background_color_type',
                            'label' => esc_html__('Background Color Type','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                ''  => 'Normal',
                                'bg_gradient' => 'Gradient',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'background_color_normal',
                            'label' => esc_html__('Background Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'background_color_type'  => '',
                            ],
                        ),
                        array(
                            'name' => 'background_color_gr',
                            'label' => esc_html__('Background Color', 'festiva'),
                            'type'         => \Elementor\Group_Control_Background::get_type(), 
                            'control_type' => 'group', 
                            'types' => [ 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary',
                            'condition' => [
                                'background_color_type'   => ['bg_gradient'],
                            ],
                        ),


                        array(
                            'name' => 'border_menu',
                            'label' => esc_html__('Border Menu', 'festiva'),
                            'type'         => \Elementor\Group_Control_Border::get_type(), 
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary',
                        ),


                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li > a',
                        ),
                        array(
                            'name' => 'arrow_children_font_size',
                            'label' => esc_html__('Arrow Has Children - Font Size', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li.menu-item-has-children > a .caseicon-double-chevron-down' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Spacer', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'control_type'  => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'padding_background',
                            'label' => esc_html__('Padding','festiva'),
                            'type'  =>\Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_active_style',
                            'label' => esc_html__('Hover/Active Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'fr-style-default' => 'Default',
                                'fr-style-box1' => 'Box',
                                'fr-style-divider1' => 'Divider Top/Bottom',
                            ],
                            'default' => 'fr-style-default',
                        ),

                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu.fr-style-box1 .pxl-menu-primary > li > a span::before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'hover_active_style' => ['fr-style-box1'],
                            ],
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'festiva' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'festiva' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_sub_level',
                    'label' => esc_html__('Sub Level', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu li.pxl-megamenu, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Active', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li:hover > a:before, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_item > a:before, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-item > a:before, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current_page_ancestor > a:before, {{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu li.current-menu-ancestor > a:before' => '--menu-hover-color: {{VALUE}};',
                            ],
                        ),


                        array(
                            'name'  => 'background_color_type_sub',
                            'label' => esc_html__('Background Color Type','festiva'),
                            'type'  => \Elementor\Controls_Manager::SELECT,
                            'options'   => [
                                ''  => 'Normal',
                                'bg_gradient' => 'Gradient',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'background_color_normal_sub',
                            'label' => esc_html__('Background Color', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-menu-primary .children' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'background_color_type_sub'  => '',
                            ],
                        ),
                        array(
                            'name' => 'background_color_gr_sub',
                            'label' => esc_html__('Background Color', 'festiva'),
                            'type'         => \Elementor\Group_Control_Background::get_type(), 
                            'control_type' => 'group', 
                            'types' => [ 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-menu-primary .sub-menu, {{WRAPPER}} .pxl-menu-primary .children',
                            'condition' => [
                                'background_color_type_sub'   => ['bg_gradient'],
                            ],
                        ),


                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'festiva' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary li .sub-menu a, {{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'sub_item_space',
                            'label' => esc_html__('Item Spacer', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-menu-primary .sub-menu li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'hover_active_style_sub',
                            'label' => esc_html__('Hover/Active Style', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-style-default' => 'Default',
                            ],
                            'default' => 'sub-style-default',
                        ),
                        array(
                            'name' => 'sub_show_effect',
                            'label' => esc_html__('Show Effect', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-effect-fade' => 'Fade',
                                'show-effect-slideup' => 'Slide Up',
                                'show-effect-dropdown' => 'Dropdown',
                                'show-effect-slidedown' => 'Slide Down 3D',
                            ],
                            'default' => 'show-effect-slideup',
                            'separator' => 'after',
                        ),

                        array(
                            'name'  => 'heading_mega_menu',
                            'label' => 'Mega Menu',
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'title_items_mg',
                            'label' => esc_html__('Title Items', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_mega_menu',
                            'label' => esc_html__('Background Mega Menu', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius_mega_menu',
                            'label' => esc_html__('Border Radius', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'padding_mega_menu',
                            'label' => esc_html__('Padding', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'default' => [
                                'size' => 25,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'margin_mega_menu',
                            'label' => esc_html__('Margin', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px','custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width_mega',
                            'label' => esc_html__('Max Width', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-nav-menu .pxl-menu-primary .pxl-mega-menu' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                    ),
                ),
            ),
        ),
    ),
    festiva_get_class_widget_path()
);