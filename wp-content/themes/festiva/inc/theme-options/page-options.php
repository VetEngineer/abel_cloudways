<?php

add_action( 'pxl_post_metabox_register', 'festiva_page_options_register' );
function festiva_page_options_register( $metabox ) {
	
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'festiva' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'festiva' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						festiva_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
								'id'      =>'featured-quote-text',
								'type'    => 'textarea',
								'description' => esc_html__( 'Quote that will show when set post format is quote', 'festiva' ),
								'title'   => esc_html__('Quote Text', 'festiva'),
								'default' => '',
							),
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'festiva' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								) 
							),
						),
					),
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'festiva' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'loader' => [
					'title'  => esc_html__( 'Loader', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'site_loader',
								'type'     => 'switch',
								'title'    => esc_html__('Loader', 'festiva'),
								'default'  => false
							),
							array(
								'id'    => 'loader_style',
								'type'  => 'select',
								'title' => esc_html__('Loader Style', 'festiva'),
								'options' => [
									'style-default'           => esc_html__('Default', 'festiva'),
									'style-fashion'           => esc_html__('Fashion', 'festiva'),
									'style-digital'           => esc_html__('Digital', 'festiva'),
									'style-software'           => esc_html__('Software', 'festiva'),
									'style-business'           => esc_html__('Business', 'festiva'),
									'style-insurance'           => esc_html__('Insurance', 'festiva'),
									'style-event'           => esc_html__('Event', 'festiva'),
									'style-corporate'           => esc_html__('Corporate', 'festiva'),
									'style-startup'           => esc_html__('Startup', 'festiva'),
									'style-app'           => esc_html__('App', 'festiva'),
									'style-photography'           => esc_html__('Photography', 'festiva'),
									'style-architecture'           => esc_html__('Architecture', 'festiva'),
									'style-seo'           => esc_html__('Seo', 'festiva'),
									'style-portfolio'           => esc_html__('Portfolio Dark', 'festiva'),
									'style-portfolio2'           => esc_html__('Portfolio Light', 'festiva'),
									'style-law'           => esc_html__('Law', 'festiva'),
									'style-wave'           => esc_html__('Wave', 'festiva'),
								],
								'default' => 'style-default',
								'indent' => true,
								'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
							),
							array(
								'id'      => 'loader_text',
								'type'    => 'text',
								'title'   => esc_html__('Loader Text', 'festiva'),
								'default' => '',
								'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
							),
							array(
								'id'             => 'loading_text',
								'type'           => 'text',
								'title'          => esc_html__('Loading Text 1', 'festiva'),
								'default'        => '',
								'desc'           => esc_html__('Enter the text displayed on load.', 'festiva'),
								'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
								'force_output'   => true
							),
							array(
								'id'             => 'loading_text2',
								'type'           => 'text',
								'title'          => esc_html__('Loading Text 2', 'festiva'),
								'default'        => '',
								'desc'           => esc_html__('Color Primary', 'festiva'),
								'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
								'force_output'   => true
							),
							array(
								'id'       => 'loader_text_color',
								'type'     => 'button_set',
								'title'    => esc_html__('Color Type', 'festiva'),
								'options'  => array(
									'primary' => esc_html__('Primary', 'festiva'),
									'gradient' => esc_html__('Gradient', 'festiva'),
								),
								'default'  => 'primary',
								'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
							),
						)
					)
				],
				'header' => [
					'title'  => esc_html__( 'Header', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						festiva_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'festiva'),
								'options'  => array(
									'show' => esc_html__('Show', 'festiva'),
									'hide'  => esc_html__('Hide', 'festiva'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'festiva' ),
								'options'  => festiva_get_nav_menu_slug(),
								'default' => '',
							),
							array(
								'id'       => 'logo_m_c',
								'type'     => 'media',
								'title'    => esc_html__('Select Logo Mobile', 'festiva'),
								'url'      => false,
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'festiva'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'festiva'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'festiva'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'festiva'),
								),
								'default'  => '-1',
							),
						)
					)
					
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'festiva' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						festiva_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'festiva' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						festiva_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'festiva' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'festiva' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						festiva_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'festiva'),
								'options'  => array(
									'show' => esc_html__('Show', 'festiva'),
									'hide'  => esc_html__('Hide', 'festiva'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'festiva'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'festiva'),
									'on' => esc_html__('On', 'festiva'),
									'off' => esc_html__('Off', 'festiva'),
								),
								'default'  => 'inherit',
							),
						)
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'festiva' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'content_bg_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Body Color', 'festiva'),
								'subtitle' => esc_html__('Body Background color.', 'festiva'),
								'output'   => array('background-color' => '#pxl-wapper')
							),
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'festiva'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'gradient_color',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color', 'festiva'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '', 
								),
							),
						)
					)
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'festiva' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'festiva'),
							),
						)
					)
				]
			]
		],
		'event' => [
			'opt_name'            => 'pxl_event_options',
			'display_name'        => esc_html__( 'Event Options', 'festiva' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'festiva' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),

							array(
								'id'	=> 'event_category',
								'type'	=> 'text',
								'title'	=> esc_html__('Event Category','festiva'),
								'default'	=> '',
							),
							array(
								'id'	=> 'event_time',
								'type'	=> 'text',
								'title'	=> esc_html__('Event Time','festiva'),
								'default'	=> '',
							),
							array(
								'id'	=> 'event_date',
								'type'	=> 'text',
								'title'	=> esc_html__('Event Date','festiva'),
								'default'	=> '',
							),

							array(
								'id'	=> 'event_summary',
								'type'	=> 'textarea',
								'title'	=> esc_html__('Event Summary','festiva'),
								'default'	=> '',
							),
						),
					),
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'festiva' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'festiva'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'festiva'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'festiva'),
									'image'  => esc_html__('Image', 'festiva'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'festiva'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'festiva'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						)
					)
				],
				
				'header1' => [
					'title'  => esc_html__( 'Header', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						festiva_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'festiva' ),
								'options'  => festiva_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'festiva'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'festiva'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'festiva'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'festiva'),
								),
								'default'  => '-1',
							),
						)
					)
					
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'festiva' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						festiva_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'festiva' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						festiva_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing1',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'festiva' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'       => 'content_bg_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Background Color', 'festiva'),
								'subtitle' => esc_html__('Content background color.', 'festiva'),
								'output'   => array('background-color' => '#pxl-main')
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'festiva' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						festiva_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'festiva'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'festiva'),
									'on' => esc_html__('On', 'festiva'),
									'off' => esc_html__('Off', 'festiva'),
								),
								'default'  => 'inherit',
							),
						)
					)
				],
			]
		],
		'product' => [ 
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'festiva' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						festiva_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'festiva' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						festiva_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'general' => [
					'title'  => esc_html__( 'General', 'festiva' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'product_feature_text',
								'type' => 'text',
								'title' => esc_html__('Featured Text', 'festiva'),
								'default' => '',
							),
						)
					)
				],
			]
		],
		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Options', 'festiva' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'festiva' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'festiva'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'festiva'), 
							'header'       => esc_html__('Header', 'festiva'), 
							'footer'       => esc_html__('Footer', 'festiva'), 
							'mega-menu'    => esc_html__('Mega Menu', 'festiva'), 
							'page-title'   => esc_html__('Page Title', 'festiva'), 
							'tab' => esc_html__('Tab', 'festiva'),
							'hidden-panel' => esc_html__('Hidden Panel', 'festiva'),
							'popup' => esc_html__('Popup', 'festiva'),
							'slider' => esc_html__('Slider', 'festiva'),
							'widget' => esc_html__('Widget Sidebar', 'festiva'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'festiva'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'festiva'), 
							'px-header--transparent'       => esc_html__('Transparent', 'festiva'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),
					array(
						'id'          => 'hidden_panel_bg',
						'type'        => 'color',
						'title'       => esc_html__('Hidden Panel Box Color', 'festiva'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'hidden_panel_width',
						'type'        => 'text',
						'title'       => esc_html__('Hidden Panel Width', 'festiva'),
						'subtitle'       => esc_html__('Enter number.', 'festiva'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'header_sidebar_width',
						'type'        => 'slider',
						'title'       => esc_html__('Header Sidebar Width', 'festiva'),
						"default"   => 300,
						"min"       => 50,
						"step"      => 1,
						"max"       => 900,
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
					),
				),
				
			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
