<?php
/**
 * The Portfolio template to display the content
 *
 * Used for index/archive/search.
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

$prisma_template_args = get_query_var( 'prisma_template_args' );
if ( is_array( $prisma_template_args ) ) {
	$prisma_columns    = empty( $prisma_template_args['columns'] ) ? 2 : max( 1, $prisma_template_args['columns'] );
	$prisma_blog_style = array( $prisma_template_args['type'], $prisma_columns );
    $prisma_columns_class = prisma_get_column_class( 1, $prisma_columns, ! empty( $prisma_template_args['columns_tablet']) ? $prisma_template_args['columns_tablet'] : '', ! empty($prisma_template_args['columns_mobile']) ? $prisma_template_args['columns_mobile'] : '' );
} else {
	$prisma_template_args = array();
	$prisma_blog_style = explode( '_', prisma_get_theme_option( 'blog_style' ) );
	$prisma_columns    = empty( $prisma_blog_style[1] ) ? 2 : max( 1, $prisma_blog_style[1] );
    $prisma_columns_class = prisma_get_column_class( 1, $prisma_columns );
}

$prisma_post_format = get_post_format();
$prisma_post_format = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );

?><div class="
<?php
if ( ! empty( $prisma_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( prisma_is_blog_style_use_masonry( $prisma_blog_style[0] ) ? 'masonry_item masonry_item-1_' . esc_attr( $prisma_columns ) : esc_attr( $prisma_columns_class ));
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $prisma_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $prisma_columns )
		. ( 'portfolio' != $prisma_blog_style[0] ? ' ' . esc_attr( $prisma_blog_style[0] )  . '_' . esc_attr( $prisma_columns ) : '' )
	);
	prisma_add_blog_animation( $prisma_template_args );
	?>
>
<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$prisma_hover   = ! empty( $prisma_template_args['hover'] ) && ! prisma_is_inherit( $prisma_template_args['hover'] )
								? $prisma_template_args['hover']
								: prisma_get_theme_option( 'image_hover' );

	if ( 'dots' == $prisma_hover ) {
		$prisma_post_link = empty( $prisma_template_args['no_links'] )
								? ( ! empty( $prisma_template_args['link'] )
									? $prisma_template_args['link']
									: get_permalink()
									)
								: '';
		$prisma_target    = ! empty( $prisma_post_link ) && prisma_is_external_url( $prisma_post_link ) && function_exists( 'prisma_external_links_target' )
								? prisma_external_links_target()
								: '';
	}
	
	// Meta parts
	$prisma_components = ! empty( $prisma_template_args['meta_parts'] )
							? ( is_array( $prisma_template_args['meta_parts'] )
								? $prisma_template_args['meta_parts']
								: explode( ',', $prisma_template_args['meta_parts'] )
								)
							: prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) );

	// Featured image
	prisma_show_post_featured( apply_filters( 'prisma_filter_args_featured', 
        array(
			'hover'         => $prisma_hover,
			'no_links'      => ! empty( $prisma_template_args['no_links'] ),
			'thumb_size'    => ! empty( $prisma_template_args['thumb_size'] )
								? $prisma_template_args['thumb_size']
								: prisma_get_thumb_size(
									prisma_is_blog_style_use_masonry( $prisma_blog_style[0] )
										? (	strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false || $prisma_columns < 3
											? 'masonry-big'
											: 'masonry'
											)
										: (	strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false || $prisma_columns < 3
											? 'square'
											: 'square'
											)
								),
			'thumb_bg' => prisma_is_blog_style_use_masonry( $prisma_blog_style[0] ) ? false : true,
			'show_no_image' => true,
			'meta_parts'    => $prisma_components,
			'class'         => 'dots' == $prisma_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $prisma_hover
										? '<div class="post_info"><h5 class="post_title">'
											. ( ! empty( $prisma_post_link )
												? '<a href="' . esc_url( $prisma_post_link ) . '"' . ( ! empty( $target ) ? $target : '' ) . '>'
												: ''
												)
												. esc_html( get_the_title() ) 
											. ( ! empty( $prisma_post_link )
												? '</a>'
												: ''
												)
											. '</h5></div>'
										: '',
            'thumb_ratio'   => 'info' == $prisma_hover ?  '100:102' : '',
        ),
        'content-portfolio',
        $prisma_template_args
    ) );
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!