<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

$prisma_args = get_query_var( 'prisma_logo_args' );

// Site logo
$prisma_logo_type   = isset( $prisma_args['type'] ) ? $prisma_args['type'] : '';
$prisma_logo_image  = prisma_get_logo_image( $prisma_logo_type );
$prisma_logo_text   = prisma_is_on( prisma_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$prisma_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $prisma_logo_image['logo'] ) || ! empty( $prisma_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $prisma_logo_image['logo'] ) ) {
			if ( empty( $prisma_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric($prisma_logo_image['logo']) && (int) $prisma_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$prisma_attr = prisma_getimagesize( $prisma_logo_image['logo'] );
				echo '<img src="' . esc_url( $prisma_logo_image['logo'] ) . '"'
						. ( ! empty( $prisma_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $prisma_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $prisma_logo_text ) . '"'
						. ( ! empty( $prisma_attr[3] ) ? ' ' . wp_kses_data( $prisma_attr[3] ) : '' )
						. '>';
			}
		} else {
			prisma_show_layout( prisma_prepare_macros( $prisma_logo_text ), '<span class="logo_text">', '</span>' );
			prisma_show_layout( prisma_prepare_macros( $prisma_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
