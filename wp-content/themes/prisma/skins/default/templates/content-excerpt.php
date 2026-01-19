<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

$prisma_template_args = get_query_var( 'prisma_template_args' );
$prisma_columns = 1;
if ( is_array( $prisma_template_args ) ) {
	$prisma_columns    = empty( $prisma_template_args['columns'] ) ? 1 : max( 1, $prisma_template_args['columns'] );
	$prisma_blog_style = array( $prisma_template_args['type'], $prisma_columns );
	if ( ! empty( $prisma_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $prisma_columns > 1 ) {
	    $prisma_columns_class = prisma_get_column_class( 1, $prisma_columns, ! empty( $prisma_template_args['columns_tablet']) ? $prisma_template_args['columns_tablet'] : '', ! empty($prisma_template_args['columns_mobile']) ? $prisma_template_args['columns_mobile'] : '' );
		?>
		<div class="<?php echo esc_attr( $prisma_columns_class ); ?>">
		<?php
	}
} else {
	$prisma_template_args = array();
}
$prisma_expanded    = ! prisma_sidebar_present() && prisma_get_theme_option( 'expand_content' ) == 'expand';
$prisma_post_format = get_post_format();
$prisma_post_format = empty( $prisma_post_format ) ? 'standard' : str_replace( 'post-format-', '', $prisma_post_format );
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_excerpt post_format_' . esc_attr( $prisma_post_format ) );
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
			'thumb_size' => ! empty( $prisma_template_args['thumb_size'] )
							? $prisma_template_args['thumb_size']
							: prisma_get_thumb_size( strpos( prisma_get_theme_option( 'body_style' ), 'full' ) !== false
								? 'full'
								: ( $prisma_expanded 
									? 'huge' 
									: 'big' 
									)
								),
		),
		'content-excerpt',
		$prisma_template_args
	) );

	// Title and post meta
	$prisma_show_title = get_the_title() != '';
	$prisma_show_meta  = count( $prisma_components ) > 0 && ! in_array( $prisma_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $prisma_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			if ( apply_filters( 'prisma_filter_show_blog_title', true, 'excerpt' ) ) {
				do_action( 'prisma_action_before_post_title' );
				if ( empty( $prisma_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}
				do_action( 'prisma_action_after_post_title' );
			}
			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( apply_filters( 'prisma_filter_show_blog_excerpt', empty( $prisma_template_args['hide_excerpt'] ) && prisma_get_theme_option( 'excerpt_length' ) > 0, 'excerpt' ) ) {
		?>
		<div class="post_content entry-content">
			<?php

			// Post meta
			if ( apply_filters( 'prisma_filter_show_blog_meta', $prisma_show_meta, $prisma_components, 'excerpt' ) ) {
				if ( count( $prisma_components ) > 0 ) {
					do_action( 'prisma_action_before_post_meta' );
					prisma_show_post_meta(
						apply_filters(
							'prisma_filter_post_meta_args', array(
								'components' => join( ',', $prisma_components ),
								'seo'        => false,
								'echo'       => true,
							), 'excerpt', 1
						)
					);
					do_action( 'prisma_action_after_post_meta' );
				}
			}

			if ( prisma_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'prisma_action_before_full_post_content' );
					the_content( '' );
					do_action( 'prisma_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'prisma' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'prisma' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				prisma_show_post_content( $prisma_template_args, '<div class="post_content_inner">', '</div>' );
			}

			// More button
			if ( apply_filters( 'prisma_filter_show_blog_readmore',  ! isset( $prisma_template_args['more_button'] ) || ! empty( $prisma_template_args['more_button'] ), 'excerpt' ) ) {
				if ( empty( $prisma_template_args['no_links'] ) ) {
					do_action( 'prisma_action_before_post_readmore' );
					if ( prisma_get_theme_option( 'blog_content' ) != 'fullpost' ) {
						prisma_show_post_more_link( $prisma_template_args, '<p>', '</p>' );
					} else {
						prisma_show_post_comments_link( $prisma_template_args, '<p>', '</p>' );
					}
					do_action( 'prisma_action_after_post_readmore' );
				}
			}

			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</article>
<?php

if ( is_array( $prisma_template_args ) ) {
	if ( ! empty( $prisma_template_args['slider'] ) || $prisma_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
