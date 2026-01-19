<?php
/**
 * The template to display the side menu
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */
?>
<div class="menu_side_wrap
<?php
echo ' menu_side_' . esc_attr( prisma_get_theme_option( 'menu_side_icons' ) > 0 ? 'icons' : 'dots' );
$prisma_menu_scheme = prisma_get_theme_option( 'menu_scheme' );
$prisma_header_scheme = prisma_get_theme_option( 'header_scheme' );
if ( ! empty( $prisma_menu_scheme ) && ! prisma_is_inherit( $prisma_menu_scheme  ) ) {
	echo ' scheme_' . esc_attr( $prisma_menu_scheme );
} elseif ( ! empty( $prisma_header_scheme ) && ! prisma_is_inherit( $prisma_header_scheme ) ) {
	echo ' scheme_' . esc_attr( $prisma_header_scheme );
}
?>
				">
	<span class="menu_side_button icon-menu-2"></span>

	<div class="menu_side_inner">
		<?php
		// Logo
		set_query_var( 'prisma_logo_args', array( 'type' => 'side' ) );
		get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'prisma_logo_args', array() );
		// Main menu button
		?>
		<div class="toc_menu_item"
			<?php
			if ( prisma_mouse_helper_enabled() ) {
				echo ' data-mouse-helper="click" data-mouse-helper-axis="y" data-mouse-helper-text="' . esc_attr__( 'Open main menu', 'prisma' ) . '"';
			}
			?>
		>
			<a href="#" role="button" class="toc_menu_description menu_mobile_description"><span class="toc_menu_description_title"><?php esc_html_e( 'Main menu', 'prisma' ); ?></span></a>
			<a class="menu_mobile_button toc_menu_icon icon-menu-2" href="#" role="button"></a>
		</div>		
	</div>

</div>