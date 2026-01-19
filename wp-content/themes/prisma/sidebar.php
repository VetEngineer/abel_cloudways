<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

if ( prisma_sidebar_present() ) {
	
	$prisma_sidebar_type = prisma_get_theme_option( 'sidebar_type' );
	if ( 'custom' == $prisma_sidebar_type && ! prisma_is_layouts_available() ) {
		$prisma_sidebar_type = 'default';
	}
	
	// Catch output to the buffer
	ob_start();
	if ( 'default' == $prisma_sidebar_type ) {
		// Default sidebar with widgets
		$prisma_sidebar_name = prisma_get_theme_option( 'sidebar_widgets' );
		prisma_storage_set( 'current_sidebar', 'sidebar' );
		if ( is_active_sidebar( $prisma_sidebar_name ) ) {
			dynamic_sidebar( $prisma_sidebar_name );
		}
	} else {
		// Custom sidebar from Layouts Builder
		$prisma_sidebar_id = prisma_get_custom_sidebar_id();
		do_action( 'prisma_action_show_layout', $prisma_sidebar_id );
	}
	$prisma_out = trim( ob_get_contents() );
	ob_end_clean();
	
	// If any html is present - display it
	if ( ! empty( $prisma_out ) ) {
		$prisma_sidebar_position    = prisma_get_theme_option( 'sidebar_position' );
		$prisma_sidebar_position_ss = prisma_get_theme_option( 'sidebar_position_ss', 'below' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $prisma_sidebar_position );
			echo ' sidebar_' . esc_attr( $prisma_sidebar_position_ss );
			echo ' sidebar_' . esc_attr( $prisma_sidebar_type );

			$prisma_sidebar_scheme = apply_filters( 'prisma_filter_sidebar_scheme', prisma_get_theme_option( 'sidebar_scheme', 'inherit' ) );
			if ( ! empty( $prisma_sidebar_scheme ) && ! prisma_is_inherit( $prisma_sidebar_scheme ) && 'custom' != $prisma_sidebar_type ) {
				echo ' scheme_' . esc_attr( $prisma_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php

			// Skip link anchor to fast access to the sidebar from keyboard
			?>
			<span id="sidebar_skip_link_anchor" class="prisma_skip_link_anchor"></span>
			<?php

			do_action( 'prisma_action_before_sidebar_wrap', 'sidebar' );

			// Button to show/hide sidebar on mobile
			if ( in_array( $prisma_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$prisma_title = apply_filters( 'prisma_filter_sidebar_control_title', 'float' == $prisma_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'prisma' ) : '' );
				$prisma_text  = apply_filters( 'prisma_filter_sidebar_control_text', 'above' == $prisma_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'prisma' ) : '' );
				?>
				<a href="#" role="button" class="sidebar_control" title="<?php echo esc_attr( $prisma_title ); ?>"><?php echo esc_html( $prisma_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'prisma_action_before_sidebar', 'sidebar' );
				prisma_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $prisma_out ) );
				do_action( 'prisma_action_after_sidebar', 'sidebar' );
				?>
			</div>
			<?php

			do_action( 'prisma_action_after_sidebar_wrap', 'sidebar' );

			?>
		</div>
		<div class="clearfix"></div>
		<?php
	}
}
