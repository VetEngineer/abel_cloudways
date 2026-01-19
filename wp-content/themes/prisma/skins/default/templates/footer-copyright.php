<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package PRISMA
 * @since PRISMA 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$prisma_copyright_scheme = prisma_get_theme_option( 'copyright_scheme' );
if ( ! empty( $prisma_copyright_scheme ) && ! prisma_is_inherit( $prisma_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $prisma_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$prisma_copyright = prisma_get_theme_option( 'copyright' );
			if ( ! empty( $prisma_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$prisma_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $prisma_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$prisma_copyright = prisma_prepare_macros( $prisma_copyright );
				// Display copyright
				echo wp_kses( nl2br( $prisma_copyright ), 'prisma_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
