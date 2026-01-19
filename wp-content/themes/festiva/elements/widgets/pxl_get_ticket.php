<?php 
pxl_add_custom_widget(
	array(
		'name'	=> 'pxl_get_ticket',
		'title'	=> esc_html__('BR Get Ticket','festiva'),
		'icon'	=> 'eicon-progress-tracker',
		'categories'	=> array('pxltheme-core'),
		'scripts'	=> array(
			'pxl-countdown',
		),
		'params'	=> array(
			'sections'	=> array(
				array(
					'name'	=> 'get_ticket_section',
					'label'	=> esc_html__('Content','festiva'),
					'tab'	=> \Elementor\Controls_Manager::TAB_CONTENT,
					'controls'	=> array(
						array(
							'name' => 'title_ticket',
							'label' => esc_html__('Title Ticket', 'festiva' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'label_block' => true,
						),
						array(
							'name' => 'price',
							'label' => esc_html__('Price', 'festiva' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'label_block' => true,
						),
						array(
							'name' => 'object',
							'label' => esc_html__('Object', 'festiva' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'label_block' => true,
						),

					),
				),
				array(
					'name'	=> 'bg_color_title',
					'label'	=> esc_html__('Background Title','festiva'),
					'tab'	=> \Elementor\Controls_Manager::TAB_STYLE,
					'controls'	=> array(
						array(
							'name'	=> 'gradient_color_from',
							'label'	=> esc_html__('Gradient From','festiva'),
							'type'	=> \Elementor\Controls_Manager::COLOR,	
						),
						array(
							'name'	=> 'gradient_color_to',
							'label'	=> esc_html__('Gradient To','festiva'),
							'type'	=> \Elementor\Controls_Manager::COLOR,	
						),
					),
				),
				array(
					'name'	=> 'section_style',
					'label'	=> esc_html__('Text','festiva'),
					'tab'	=> \Elementor\Controls_Manager::TAB_STYLE,
					'controls'	=> array(

					),
				),
			),
		),
	),
	festiva_get_class_widget_path()
)
?>