<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package PRISMA
 * @since PRISMA 1.0.50
 */

$prisma_template_args = get_query_var( 'prisma_template_args' );
if ( is_array( $prisma_template_args ) ) {
	$prisma_columns    = empty( $prisma_template_args['columns'] ) ? 2 : max( 1, $prisma_template_args['columns'] );
	$prisma_blog_style = array( $prisma_template_args['type'], $prisma_columns );
} else {
	$prisma_template_args = array();
	$prisma_blog_style = explode( '_', prisma_get_theme_option( 'blog_style' ) );
	$prisma_columns    = empty( $prisma_blog_style[1] ) ? 2 : max( 1, $prisma_blog_style[1] );
}
$prisma_blog_id       = prisma_get_custom_blog_id( join( '_', $prisma_blog_style ) );
$prisma_blog_style[0] = str_replace( 'blog-custom-', '', $prisma_blog_style[0] );
$prisma_expanded      = ! prisma_sidebar_present() && prisma_get_theme_option( 'expand_content' ) == 'expand';
$prisma_components    = ! empty( $prisma_template_args['meta_parts'] )
							? ( is_array( $prisma_template_args['meta_parts'] )
								? join( ',', $prisma_template_args['meta_parts'] )
								: $prisma_template_args['meta_parts']
								)
							: prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) );
$prisma_post_format   = get_post_format();
$prisma_post_format   = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );

$prisma_blog_meta     = prisma_get_custom_layout_meta( $prisma_blog_id );
$prisma_custom_style  = ! empty( $prisma_blog_meta['scripts_required'] ) ? $prisma_blog_meta['scripts_required'] : 'none';

if ( ! empty( $prisma_template_args['slider'] ) || $prisma_columns > 1 || ! prisma_is_off( $prisma_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $prisma_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo esc_attr( ( prisma_is_off( $prisma_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $prisma_custom_style ) ) . "-1_{$prisma_columns}" );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_item_container post_format_' . esc_attr( $prisma_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $prisma_columns )
					. ' post_layout_' . esc_attr( $prisma_blog_style[0] )
					. ' post_layout_' . esc_attr( $prisma_blog_style[0] ) . '_' . esc_attr( $prisma_columns )
					. ( ! prisma_is_off( $prisma_custom_style )
						? ' post_layout_' . esc_attr( $prisma_custom_style )
							. ' post_layout_' . esc_attr( $prisma_custom_style ) . '_' . esc_attr( $prisma_columns )
						: ''
						)
		);
	prisma_add_blog_animation( $prisma_template_args );
	?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}
	// Custom layout
	do_action( 'prisma_action_show_layout', $prisma_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $prisma_template_args['slider'] ) || $prisma_columns > 1 || ! prisma_is_off( $prisma_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
