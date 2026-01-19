<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package PRISMA
 * @since PRISMA 1.0.10
 */

// Footer sidebar
$prisma_footer_name    = prisma_get_theme_option( 'footer_widgets' );
$prisma_footer_present = ! prisma_is_off( $prisma_footer_name ) && is_active_sidebar( $prisma_footer_name );
if ( $prisma_footer_present ) {
	prisma_storage_set( 'current_sidebar', 'footer' );
	$prisma_footer_wide = prisma_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $prisma_footer_name ) ) {
		dynamic_sidebar( $prisma_footer_name );
	}
	$prisma_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $prisma_out ) ) {
		$prisma_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $prisma_out );
		$prisma_need_columns = true;   //or check: strpos($prisma_out, 'columns_wrap')===false;
		if ( $prisma_need_columns ) {
			$prisma_columns = max( 0, (int) prisma_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $prisma_columns ) {
				$prisma_columns = min( 4, max( 1, prisma_tags_count( $prisma_out, 'aside' ) ) );
			}
			if ( $prisma_columns > 1 ) {
				$prisma_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $prisma_columns ) . ' widget', $prisma_out );
			} else {
				$prisma_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $prisma_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<?php do_action( 'prisma_action_before_sidebar_wrap', 'footer' ); ?>
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $prisma_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $prisma_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'prisma_action_before_sidebar', 'footer' );
				prisma_show_layout( $prisma_out );
				do_action( 'prisma_action_after_sidebar', 'footer' );
				if ( $prisma_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $prisma_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
			<?php do_action( 'prisma_action_after_sidebar_wrap', 'footer' ); ?>
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
