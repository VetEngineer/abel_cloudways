<?php
/**
 * The template to display the widgets area in the header
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

// Header sidebar
$prisma_header_name    = prisma_get_theme_option( 'header_widgets' );
$prisma_header_present = ! prisma_is_off( $prisma_header_name ) && is_active_sidebar( $prisma_header_name );
if ( $prisma_header_present ) {
	prisma_storage_set( 'current_sidebar', 'header' );
	$prisma_header_wide = prisma_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $prisma_header_name ) ) {
		dynamic_sidebar( $prisma_header_name );
	}
	$prisma_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $prisma_widgets_output ) ) {
		$prisma_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $prisma_widgets_output );
		$prisma_need_columns   = strpos( $prisma_widgets_output, 'columns_wrap' ) === false;
		if ( $prisma_need_columns ) {
			$prisma_columns = max( 0, (int) prisma_get_theme_option( 'header_columns' ) );
			if ( 0 == $prisma_columns ) {
				$prisma_columns = min( 6, max( 1, prisma_tags_count( $prisma_widgets_output, 'aside' ) ) );
			}
			if ( $prisma_columns > 1 ) {
				$prisma_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $prisma_columns ) . ' widget', $prisma_widgets_output );
			} else {
				$prisma_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $prisma_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<?php do_action( 'prisma_action_before_sidebar_wrap', 'header' ); ?>
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $prisma_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $prisma_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'prisma_action_before_sidebar', 'header' );
				prisma_show_layout( $prisma_widgets_output );
				do_action( 'prisma_action_after_sidebar', 'header' );
				if ( $prisma_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $prisma_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
			<?php do_action( 'prisma_action_after_sidebar_wrap', 'header' ); ?>
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
