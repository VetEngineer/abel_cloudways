<?php
/**
 * 'Band' template to display the content
 *
 * Used for index/archive/search.
 *
 * @package PRISMA
 * @since PRISMA 1.71.0
 */

$prisma_template_args = get_query_var( 'prisma_template_args' );
if ( ! is_array( $prisma_template_args ) ) {
	$prisma_template_args = array(
								'type'    => 'band',
								'columns' => 1
								);
}

$prisma_columns       = 1;

$prisma_expanded      = ! prisma_sidebar_present() && prisma_get_theme_option( 'expand_content' ) == 'expand';

$prisma_post_format   = get_post_format();
$prisma_post_format   = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );

if ( is_array( $prisma_template_args ) ) {
	$prisma_columns    = empty( $prisma_template_args['columns'] ) ? 1 : max( 1, $prisma_template_args['columns'] );
	$prisma_blog_style = array( $prisma_template_args['type'], $prisma_columns );
	if ( ! empty( $prisma_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $prisma_columns > 1 ) {
	    $prisma_columns_class = prisma_get_column_class( 1, $prisma_columns, ! empty( $prisma_template_args['columns_tablet']) ? $prisma_template_args['columns_tablet'] : '', ! empty($prisma_template_args['columns_mobile']) ? $prisma_template_args['columns_mobile'] : '' );
				?><div class="<?php echo esc_attr( $prisma_columns_class ); ?>"><?php
	}
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_band post_format_' . esc_attr( $prisma_post_format ) );
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
								: array_map( 'trim', explode( ',', $prisma_template_args['meta_parts'] ) )
								)
							: prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) );
	prisma_show_post_featured( apply_filters( 'prisma_filter_args_featured',
		array(
			'no_links'   => ! empty( $prisma_template_args['no_links'] ),
			'hover'      => $prisma_hover,
			'meta_parts' => $prisma_components,
			'thumb_bg'   => true,
			'thumb_ratio'   => '1:1',
			'thumb_size' => ! empty( $prisma_template_args['thumb_size'] )
								? $prisma_template_args['thumb_size']
								: prisma_get_thumb_size( 
								in_array( $prisma_post_format, array( 'gallery', 'audio', 'video' ) )
									? ( strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false
										? 'full'
										: ( $prisma_expanded 
											? 'big' 
											: 'medium-square'
											)
										)
									: 'masonry-big'
								)
		),
		'content-band',
		$prisma_template_args
	) );

	?><div class="post_content_wrap"><?php

		// Title and post meta
		$prisma_show_title = get_the_title() != '';
		$prisma_show_meta  = count( $prisma_components ) > 0 && ! in_array( $prisma_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );
		if ( $prisma_show_title ) {
			?>
			<div class="post_header entry-header">
				<?php
				// Categories
				if ( apply_filters( 'prisma_filter_show_blog_categories', $prisma_show_meta && in_array( 'categories', $prisma_components ), array( 'categories' ), 'band' ) ) {
					do_action( 'prisma_action_before_post_category' );
					?>
					<div class="post_category">
						<?php
						prisma_show_post_meta( apply_filters(
															'prisma_filter_post_meta_args',
															array(
																'components' => 'categories',
																'seo'        => false,
																'echo'       => true,
																'cat_sep'    => false,
																),
															'hover_' . $prisma_hover, 1
															)
											);
						?>
					</div>
					<?php
					$prisma_components = prisma_array_delete_by_value( $prisma_components, 'categories' );
					do_action( 'prisma_action_after_post_category' );
				}
				// Post title
				if ( apply_filters( 'prisma_filter_show_blog_title', true, 'band' ) ) {
					do_action( 'prisma_action_before_post_title' );
					if ( empty( $prisma_template_args['no_links'] ) ) {
						the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
					} else {
						the_title( '<h4 class="post_title entry-title">', '</h4>' );
					}
					do_action( 'prisma_action_after_post_title' );
				}
				?>
			</div><!-- .post_header -->
			<?php
		}

		// Post content
		if ( ! isset( $prisma_template_args['excerpt_length'] ) && ! in_array( $prisma_post_format, array( 'gallery', 'audio', 'video' ) ) ) {
			$prisma_template_args['excerpt_length'] = 13;
		}
		if ( apply_filters( 'prisma_filter_show_blog_excerpt', empty( $prisma_template_args['hide_excerpt'] ) && prisma_get_theme_option( 'excerpt_length' ) > 0, 'band' ) ) {
			?>
			<div class="post_content entry-content">
				<?php
				// Post content area
				prisma_show_post_content( $prisma_template_args, '<div class="post_content_inner">', '</div>' );
				?>
			</div><!-- .entry-content -->
			<?php
		}
		// Post meta
		if ( apply_filters( 'prisma_filter_show_blog_meta', $prisma_show_meta, $prisma_components, 'band' ) ) {
			if ( count( $prisma_components ) > 0 ) {
				do_action( 'prisma_action_before_post_meta' );
				prisma_show_post_meta(
					apply_filters(
						'prisma_filter_post_meta_args', array(
							'components' => join( ',', $prisma_components ),
							'seo'        => false,
							'echo'       => true,
						), 'band', 1
					)
				);
				do_action( 'prisma_action_after_post_meta' );
			}
		}
		// More button
		if ( apply_filters( 'prisma_filter_show_blog_readmore', ! $prisma_show_title || ! empty( $prisma_template_args['more_button'] ), 'band' ) ) {
			if ( empty( $prisma_template_args['no_links'] ) ) {
				do_action( 'prisma_action_before_post_readmore' );
				prisma_show_post_more_link( $prisma_template_args, '<div class="more-wrap">', '</div>' );
				do_action( 'prisma_action_after_post_readmore' );
			}
		}
		?>
	</div>
</article>
<?php

if ( is_array( $prisma_template_args ) ) {
	if ( ! empty( $prisma_template_args['slider'] ) || $prisma_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
