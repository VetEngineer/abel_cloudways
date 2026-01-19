<?php
/**
 * The template to display default site header
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

$prisma_header_css   = '';
$prisma_header_image = get_header_image();
$prisma_header_video = prisma_get_header_video();
if ( ! empty( $prisma_header_image ) && prisma_trx_addons_featured_image_override( is_singular() || prisma_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$prisma_header_image = prisma_get_current_mode_image( $prisma_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $prisma_header_image ) || ! empty( $prisma_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $prisma_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $prisma_header_image ) {
		echo ' ' . esc_attr( prisma_add_inline_css_class( 'background-image: url(' . esc_url( $prisma_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( prisma_is_on( prisma_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight prisma-full-height';
	}
	$prisma_header_scheme = prisma_get_theme_option( 'header_scheme' );
	if ( ! empty( $prisma_header_scheme ) && ! prisma_is_inherit( $prisma_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $prisma_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $prisma_header_video ) ) {
		get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-navi' ) );

	// Mobile header
	if ( prisma_is_on( prisma_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	if ( ! is_single() ) {
		get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-title' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
