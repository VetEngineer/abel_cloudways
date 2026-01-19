<?php
/**
 * The template to display the background video in the header
 *
 * @package PRISMA
 * @since PRISMA 1.0.14
 */
$prisma_header_video = prisma_get_header_video();
$prisma_embed_video  = '';
if ( ! empty( $prisma_header_video ) && ! prisma_is_from_uploads( $prisma_header_video ) ) {
	if ( prisma_is_youtube_url( $prisma_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $prisma_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php prisma_show_layout( prisma_get_embed_video( $prisma_header_video ) ); ?></div>
		<?php
	}
}
