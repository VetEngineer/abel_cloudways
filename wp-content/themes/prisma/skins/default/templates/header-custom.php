<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package PRISMA
 * @since PRISMA 1.0.06
 */

$prisma_header_css   = '';
$prisma_header_image = get_header_image();
$prisma_header_video = prisma_get_header_video();
if ( ! empty( $prisma_header_image ) && prisma_trx_addons_featured_image_override( is_singular() || prisma_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$prisma_header_image = prisma_get_current_mode_image( $prisma_header_image );
}

$prisma_header_id = prisma_get_custom_header_id();
$prisma_header_meta = get_post_meta( $prisma_header_id, 'trx_addons_options', true );
if ( ! empty( $prisma_header_meta['margin'] ) ) {
	prisma_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( prisma_prepare_css_value( $prisma_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $prisma_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $prisma_header_id ) ) ); ?>
				<?php
				echo ! empty( $prisma_header_image ) || ! empty( $prisma_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'prisma_action_show_layout', $prisma_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
