<?php
/**
 * The Classic template to display the content
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
$prisma_expanded   = ! prisma_sidebar_present() && prisma_get_theme_option( 'expand_content' ) == 'expand';

$prisma_post_format = get_post_format();
$prisma_post_format = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );

?><div class="<?php
	if ( ! empty( $prisma_template_args['slider'] ) ) {
		echo ' slider-slide swiper-slide';
	} else {
		echo ( prisma_is_blog_style_use_masonry( $prisma_blog_style[0] ) ? 'masonry_item masonry_item-1_' . esc_attr( $prisma_columns ) : esc_attr( $prisma_columns_class ) );
	}
?>"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $prisma_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $prisma_columns )
				. ' post_layout_' . esc_attr( $prisma_blog_style[0] )
				. ' post_layout_' . esc_attr( $prisma_blog_style[0] ) . '_' . esc_attr( $prisma_columns )
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

	// Featured image
	$prisma_hover      = ! empty( $prisma_template_args['hover'] ) && ! prisma_is_inherit( $prisma_template_args['hover'] )
							? $prisma_template_args['hover']
							: prisma_get_theme_option( 'image_hover' );

	$prisma_components = ! empty( $prisma_template_args['meta_parts'] )
							? ( is_array( $prisma_template_args['meta_parts'] )
								? $prisma_template_args['meta_parts']
								: explode( ',', $prisma_template_args['meta_parts'] )
								)
							: prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) );

	prisma_show_post_featured( apply_filters( 'prisma_filter_args_featured',
		array(
			'thumb_size' => ! empty( $prisma_template_args['thumb_size'] )
				? $prisma_template_args['thumb_size']
				: prisma_get_thumb_size(
					'classic' == $prisma_blog_style[0]
						? ( strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $prisma_columns > 2 ? 'big' : 'huge' )
								: ( $prisma_columns > 2
									? ( $prisma_expanded ? 'square' : 'square' )
									: ($prisma_columns > 1 ? 'square' : ( $prisma_expanded ? 'huge' : 'big' ))
									)
							)
						: ( strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $prisma_columns > 2 ? 'masonry-big' : 'full' )
								: ($prisma_columns === 1 ? ( $prisma_expanded ? 'huge' : 'big' ) : ( $prisma_columns <= 2 && $prisma_expanded ? 'masonry-big' : 'masonry' ))
							)
			),
			'hover'      => $prisma_hover,
			'meta_parts' => $prisma_components,
			'no_links'   => ! empty( $prisma_template_args['no_links'] ),
        ),
        'content-classic',
        $prisma_template_args
    ) );

	// Title and post meta
	$prisma_show_title = get_the_title() != '';
	$prisma_show_meta  = count( $prisma_components ) > 0 && ! in_array( $prisma_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $prisma_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php

			// Post meta
			if ( apply_filters( 'prisma_filter_show_blog_meta', $prisma_show_meta, $prisma_components, 'classic' ) ) {
				if ( count( $prisma_components ) > 0 ) {
					do_action( 'prisma_action_before_post_meta' );
					prisma_show_post_meta(
						apply_filters(
							'prisma_filter_post_meta_args', array(
							'components' => join( ',', $prisma_components ),
							'seo'        => false,
							'echo'       => true,
						), $prisma_blog_style[0], $prisma_columns
						)
					);
					do_action( 'prisma_action_after_post_meta' );
				}
			}

			// Post title
			if ( apply_filters( 'prisma_filter_show_blog_title', true, 'classic' ) ) {
				do_action( 'prisma_action_before_post_title' );
				if ( empty( $prisma_template_args['no_links'] ) ) {
					the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
				} else {
					the_title( '<h4 class="post_title entry-title">', '</h4>' );
				}
				do_action( 'prisma_action_after_post_title' );
			}

			if( !in_array( $prisma_post_format, array( 'quote', 'aside', 'link', 'status' ) ) ) {
				// More button
				if ( apply_filters( 'prisma_filter_show_blog_readmore', ! $prisma_show_title || ! empty( $prisma_template_args['more_button'] ), 'classic' ) ) {
					if ( empty( $prisma_template_args['no_links'] ) ) {
						do_action( 'prisma_action_before_post_readmore' );
						prisma_show_post_more_link( $prisma_template_args, '<div class="more-wrap">', '</div>' );
						do_action( 'prisma_action_after_post_readmore' );
					}
				}
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}

	// Post content
	if( in_array( $prisma_post_format, array( 'quote', 'aside', 'link', 'status' ) ) ) {
		ob_start();
		if (apply_filters('prisma_filter_show_blog_excerpt', empty($prisma_template_args['hide_excerpt']) && prisma_get_theme_option('excerpt_length') > 0, 'classic')) {
			prisma_show_post_content($prisma_template_args, '<div class="post_content_inner">', '</div>');
		}
		// More button
		if(! empty( $prisma_template_args['more_button'] )) {
			if ( empty( $prisma_template_args['no_links'] ) ) {
				do_action( 'prisma_action_before_post_readmore' );
				prisma_show_post_more_link( $prisma_template_args, '<div class="more-wrap">', '</div>' );
				do_action( 'prisma_action_after_post_readmore' );
			}
		}
		$prisma_content = ob_get_contents();
		ob_end_clean();
		prisma_show_layout($prisma_content, '<div class="post_content entry-content">', '</div><!-- .entry-content -->');
	}
	?>

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
