<?php
/**
 * The template to display the socials in the footer
 *
 * @package PRISMA
 * @since PRISMA 1.0.10
 */


// Socials
if ( prisma_is_on( prisma_get_theme_option( 'socials_in_footer' ) ) ) {
	$prisma_output = prisma_get_socials_links();
	if ( '' != $prisma_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php prisma_show_layout( $prisma_output ); ?>
			</div>
		</div>
		<?php
	}
}
