<?php
/**
 * The template to display the site logo in the footer
 *
 * @package PRISMA
 * @since PRISMA 1.0.10
 */

// Logo
if ( prisma_is_on( prisma_get_theme_option( 'logo_in_footer' ) ) ) {
	$prisma_logo_image = prisma_get_logo_image( 'footer' );
	$prisma_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $prisma_logo_image['logo'] ) || ! empty( $prisma_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $prisma_logo_image['logo'] ) ) {
					$prisma_attr = prisma_getimagesize( $prisma_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $prisma_logo_image['logo'] ) . '"'
								. ( ! empty( $prisma_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $prisma_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'prisma' ) . '"'
								. ( ! empty( $prisma_attr[3] ) ? ' ' . wp_kses_data( $prisma_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $prisma_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $prisma_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
