<?php
/**
 * Filters hook for the theme
 *
 * @package Bravis-Themes
 */

/* Custom Classs - Body */
function festiva_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = festiva()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = festiva()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $pxl_body_typography = festiva()->get_theme_opt('pxl_body_typography');
	    if($pxl_body_typography != 'google-font') {
	        $classes[] = ' body-'.$pxl_body_typography.' ';
	    }

	    $pxl_heading_typography = festiva()->get_theme_opt('pxl_heading_typography');
	    if($pxl_heading_typography != 'google-font') {
	        $classes[] = ' heading-'.$pxl_heading_typography.' ';
	    }

	    $theme_default = festiva()->get_theme_opt('theme_default');
	    if(isset($theme_default['font-family']) && $theme_default['font-family'] == false && $pxl_body_typography == 'google-font') {
	        $classes[] = ' pxl-font-default';
	    }

	    $header_layout = festiva()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = festiva()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_display_type = festiva()->get_theme_opt('shop_display_type', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_display_type = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_display_type;

		$body_custom_class = festiva()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'festiva_body_classes' );

/* Post Type Support */
function festiva_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'event', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'event', $cpt_support ) ) {
        $cpt_support[] = 'event';
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    


    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'festiva_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'festiva_support_default_cpt' );
function festiva_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'festiva_add_post_type' );
function festiva_add_post_type( $postypes ) {
	$event_display = festiva()->get_theme_opt('event_display', true);
	$event_slug = festiva()->get_theme_opt('event_slug', 'event');
	$event_name = festiva()->get_theme_opt('event_name', 'Event');
	if($event_display) {
		$event_status = true;
	} else {
		$event_status = false;
	}

	$postypes['event'] = array(
		'status' => $event_status,
		'item_name'  => $event_name,
		'items_name' => $event_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $event_slug,
 		 	),
		),
	);
  
	return $postypes;
}

/* Custom Archive Post Type Link */

function festiva_custom_archive_event_link() {
    if( is_post_type_archive( 'event' ) ) {
        $archive_event_link = festiva()->get_theme_opt('archive_event_link');
        wp_redirect( get_permalink($archive_event_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'festiva_custom_archive_event_link' );

add_filter( 'pxl_extra_taxonomies', 'festiva_add_tax' );
function festiva_add_tax( $taxonomies ) {

	$taxonomies['event-category'] = array(
		'status'     => true,
		'post_type'  => array( 'Event' ),
		'taxonomy'   => 'Event Categories',
		'taxonomies' => 'Event Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'event-category'
 		 	),
		),
		'labels'     => array()
	);

	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'festiva_theme_builder_post_type' );
function festiva_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'festiva_theme_builder_layout_id' );
function festiva_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)festiva()->get_opt('header_layout');
	$header_sticky_layout = (int)festiva()->get_opt('header_sticky_layout');
	$footer_layout        = (int)festiva()->get_opt('footer_layout');
	$ptitle_layout        = (int)festiva()->get_opt('ptitle_layout');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;

	$slider_template = festiva_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = festiva_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = festiva_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'festiva_wg_get_source_builder' );
function festiva_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'festiva_add_editor_preview_style' );
function festiva_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', festiva_editor_preview_inline_styles() );
}
function festiva_editor_preview_inline_styles(){
    $theme_colors = festiva_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'festiva_archive_title_remove_label' );
function festiva_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'festiva_comment_reply_text' );
function festiva_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'festiva').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'festiva_enable_pagepopup' );
function festiva_enable_pagepopup() {
	return true;
}
add_filter( 'pxl_enable_megamenu', 'festiva_enable_megamenu' );
function festiva_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'festiva_enable_onepage' );
function festiva_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'festiva_support_awesome_pro' );
function festiva_support_awesome_pro() {
	return false;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'festiva_add_icons_to_pxl_iconpicker_field' );
function festiva_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "festiva_add_icons_to_megamenu");
function festiva_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'festiva_comment_field_to_bottom' );
function festiva_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
//add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'festiva_export_wp_settings' );
function festiva_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'festiva_add_server_info');
function festiva_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/festiva/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://demo.bravisthemes.com/festiva/',
    'support_url' => 'https://bravisthemes.ticksy.com/',
    'help_url' => 'https://doc.bravisthemes.com/festiva',
    'email_support' => 'bravisthemesagency@gmail.com',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'festiva_template_type_support' );
function festiva_template_type_support($type) {
	$extra_type = [
		'page-title'          => esc_html__('Page Title', 'festiva'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'festiva'), 
		'tab'          => esc_html__('Tab', 'festiva'), 
		'popup'          => esc_html__('Popup', 'festiva'),
		'slider'          => esc_html__('Slider', 'festiva'),
	];
	$template_type = array_merge($type,$extra_type); 
	return $template_type;
}
//Hook Count Widget Archive
add_filter('get_archives_link', 'abcde',10,7);
function abcde($link_html, $url, $text, $format, $before, $after, $selected){
	$text         = wptexturize( $text );
	$url          = esc_url( $url );
	$aria_current = $selected ? ' aria-current="page"' : '';

	if ( 'link' === $format ) {
		$link_html = "\t<link rel='archives' title='" . esc_attr( $text ) . "' href='$url' />\n";
	} elseif ( 'option' === $format ) {
		$selected_attr = $selected ? " selected='selected'" : '';
		$link_html     = "\t<option value='$url'$selected_attr>$before $text $after</option>\n";
	} elseif ( 'html' === $format ) {
		$after = str_replace('&nbsp;(', '<span class="count">', $after);
		$after = str_replace(')', '</span>', $after);
		$link_html = "\t<li>$before<a href='$url'$aria_current>$text</a>$after</li>\n";
	} else { // Custom.
		$link_html = "\t$before<a href='$url'$aria_current>$text</a>$after\n";
	}
	return $link_html;
}

/* Search Result  */
function festiva_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'festiva_custom_post_types_in_search_results' );