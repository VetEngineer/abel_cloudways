<?php
/**
 * The template 'Style 5' to displaying related posts
 *
 * @package PRISMA
 * @since PRISMA 1.0.54
 */

$prisma_link        = get_permalink();
$prisma_post_format = get_post_format();
$prisma_post_format = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $prisma_post_format ) ); ?> data-post-id="<?php the_ID(); ?>">
	<?php
	prisma_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'prisma_filter_related_thumb_size', prisma_get_thumb_size( (int) prisma_get_theme_option( 'related_posts' ) == 1 ? 'big' : 'med' ) ),
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $prisma_link ); ?>"><?php
			if ( '' == get_the_title() ) {
				esc_html_e( '- No title -', 'prisma' );
			} else {
				the_title();
			}
		?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<div class="post_meta">
				<a href="<?php echo esc_url( $prisma_link ); ?>" class="post_meta_item post_date"><?php echo wp_kses_data( prisma_get_date() ); ?></a>
			</div>
			<?php
		}
		?>
	</div>
</div>
