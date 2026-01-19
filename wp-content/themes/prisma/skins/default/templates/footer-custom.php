<?php
/**
 * The template to display default site footer
 *
 * @package PRISMA
 * @since PRISMA 1.0.10
 */

$prisma_footer_id = prisma_get_custom_footer_id();
$prisma_footer_meta = get_post_meta( $prisma_footer_id, 'trx_addons_options', true );
if ( ! empty( $prisma_footer_meta['margin'] ) ) {
	prisma_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( prisma_prepare_css_value( $prisma_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $prisma_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $prisma_footer_id ) ) ); ?>
						<?php
						$prisma_footer_scheme = prisma_get_theme_option( 'footer_scheme' );
						if ( ! empty( $prisma_footer_scheme ) && ! prisma_is_inherit( $prisma_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $prisma_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'prisma_action_show_layout', $prisma_footer_id );
	?>
</footer><!-- /.footer_wrap -->
