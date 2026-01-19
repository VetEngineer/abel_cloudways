<?php
/**
 * The Header: Logo and main menu
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php
	// Class scheme_xxx need in the <html> as context for the <body>!
	echo ' scheme_' . esc_attr( prisma_get_theme_option( 'color_scheme' ) );
?>">

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	do_action( 'prisma_action_before_body' );
	?>

	<div class="<?php echo esc_attr( apply_filters( 'prisma_filter_body_wrap_class', 'body_wrap' ) ); ?>" <?php do_action('prisma_action_body_wrap_attributes'); ?>>

		<?php do_action( 'prisma_action_before_page_wrap' ); ?>

		<div class="<?php echo esc_attr( apply_filters( 'prisma_filter_page_wrap_class', 'page_wrap' ) ); ?>" <?php do_action('prisma_action_page_wrap_attributes'); ?>>

			<?php do_action( 'prisma_action_page_wrap_start' ); ?>

			<?php
			$prisma_full_post_loading = ( prisma_is_singular( 'post' ) || prisma_is_singular( 'attachment' ) ) && prisma_get_value_gp( 'action' ) == 'full_post_loading';
			$prisma_prev_post_loading = ( prisma_is_singular( 'post' ) || prisma_is_singular( 'attachment' ) ) && prisma_get_value_gp( 'action' ) == 'prev_post_loading';

			// Don't display the header elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ! $prisma_full_post_loading && ! $prisma_prev_post_loading ) {

				// Short links to fast access to the content, sidebar and footer from the keyboard
				?>
				<a class="prisma_skip_link skip_to_content_link" href="#content_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'prisma_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to content", 'prisma' ); ?></a>
				<?php if ( prisma_sidebar_present() ) { ?>
				<a class="prisma_skip_link skip_to_sidebar_link" href="#sidebar_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'prisma_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to sidebar", 'prisma' ); ?></a>
				<?php } ?>
				<a class="prisma_skip_link skip_to_footer_link" href="#footer_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'prisma_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to footer", 'prisma' ); ?></a>

				<?php
				do_action( 'prisma_action_before_header' );

				// Header
				$prisma_header_type = prisma_get_theme_option( 'header_type' );
				if ( 'custom' == $prisma_header_type && ! prisma_is_layouts_available() ) {
					$prisma_header_type = 'default';
				}
				get_template_part( apply_filters( 'prisma_filter_get_template_part', "templates/header-" . sanitize_file_name( $prisma_header_type ) ) );

				// Side menu
				if ( in_array( prisma_get_theme_option( 'menu_side', 'none' ), array( 'left', 'right' ) ) ) {
					get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-navi-side' ) );
				}

				// Mobile menu
				if ( apply_filters( 'prisma_filter_use_navi_mobile', prisma_sc_layouts_showed( 'menu_button' ) || $prisma_header_type == 'default' ) ) {
					get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-navi-mobile' ) );
				}

				do_action( 'prisma_action_after_header' );

			}
			?>

			<?php do_action( 'prisma_action_before_page_content_wrap' ); ?>

			<div class="page_content_wrap<?php
				if ( prisma_is_off( prisma_get_theme_option( 'remove_margins' ) ) ) {
					if ( empty( $prisma_header_type ) ) {
						$prisma_header_type = prisma_get_theme_option( 'header_type' );
					}
					if ( 'custom' == $prisma_header_type && prisma_is_layouts_available() ) {
						$prisma_header_id = prisma_get_custom_header_id();
						if ( $prisma_header_id > 0 ) {
							$prisma_header_meta = prisma_get_custom_layout_meta( $prisma_header_id );
							if ( ! empty( $prisma_header_meta['margin'] ) ) {
								?> page_content_wrap_custom_header_margin<?php
							}
						}
					}
					$prisma_footer_type = prisma_get_theme_option( 'footer_type' );
					if ( 'custom' == $prisma_footer_type && prisma_is_layouts_available() ) {
						$prisma_footer_id = prisma_get_custom_footer_id();
						if ( $prisma_footer_id ) {
							$prisma_footer_meta = prisma_get_custom_layout_meta( $prisma_footer_id );
							if ( ! empty( $prisma_footer_meta['margin'] ) ) {
								?> page_content_wrap_custom_footer_margin<?php
							}
						}
					}
				}
				do_action( 'prisma_action_page_content_wrap_class', $prisma_prev_post_loading );
				?>"<?php
				if ( apply_filters( 'prisma_filter_is_prev_post_loading', $prisma_prev_post_loading ) ) {
					?> data-single-style="<?php echo esc_attr( prisma_get_theme_option( 'single_style' ) ); ?>"<?php
				}
				do_action( 'prisma_action_page_content_wrap_data', $prisma_prev_post_loading );
			?>>
				<?php
				do_action( 'prisma_action_page_content_wrap', $prisma_full_post_loading || $prisma_prev_post_loading );

				// Single posts banner
				if ( apply_filters( 'prisma_filter_single_post_header', prisma_is_singular( 'post' ) || prisma_is_singular( 'attachment' ) ) ) {
					if ( $prisma_prev_post_loading ) {
						if ( prisma_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) != 'article' ) {
							do_action( 'prisma_action_between_posts' );
						}
					}
					// Single post thumbnail and title
					$prisma_path = apply_filters( 'prisma_filter_get_template_part', 'templates/single-styles/' . prisma_get_theme_option( 'single_style' ) );
					if ( prisma_get_file_dir( $prisma_path . '.php' ) != '' ) {
						get_template_part( $prisma_path );
					}
				}

				// Widgets area above page
				$prisma_body_style   = prisma_get_theme_option( 'body_style' );
				$prisma_widgets_name = prisma_get_theme_option( 'widgets_above_page', 'hide' );
				$prisma_show_widgets = ! prisma_is_off( $prisma_widgets_name ) && is_active_sidebar( $prisma_widgets_name );
				if ( $prisma_show_widgets ) {
					if ( 'fullscreen' != $prisma_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					prisma_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $prisma_body_style ) {
						?>
						</div>
						<?php
					}
				}

				// Content area
				do_action( 'prisma_action_before_content_wrap' );
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $prisma_body_style ? '_fullscreen' : ''; ?>">

					<?php do_action( 'prisma_action_content_wrap_start' ); ?>

					<div class="content">
						<?php
						do_action( 'prisma_action_page_content_start' );

						// Skip link anchor to fast access to the content from keyboard
						?>
						<span id="content_skip_link_anchor" class="prisma_skip_link_anchor"></span>
						<?php
						// Single posts banner between prev/next posts
						if ( ( prisma_is_singular( 'post' ) || prisma_is_singular( 'attachment' ) )
							&& $prisma_prev_post_loading 
							&& prisma_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) == 'article'
						) {
							do_action( 'prisma_action_between_posts' );
						}

						// Widgets area above content
						prisma_create_widgets_area( 'widgets_above_content' );

						do_action( 'prisma_action_page_content_start_text' );
