<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pagination',
        'title' => esc_html__('BR Pagination', 'festiva'),
        'icon' => 'eicon-apps',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'festiva'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'prev_text',
                            'label' => esc_html__('Previous Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'next_text',
                            'label' => esc_html__('Next Text', 'festiva' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
    festiva_get_class_widget_path()
);