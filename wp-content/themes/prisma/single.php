<?php
/**
 * The template to display single post
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

// Full post loading
$full_post_loading          = prisma_get_value_gp( 'action' ) == 'full_post_loading';

// Prev post loading
$prev_post_loading          = prisma_get_value_gp( 'action' ) == 'prev_post_loading';
$prev_post_loading_type     = prisma_get_theme_option( 'posts_navigation_scroll_which_block', 'article' );

// Position of the related posts
$prisma_related_position   = prisma_get_theme_option( 'related_position', 'below_content' );

// Type of the prev/next post navigation
$prisma_posts_navigation   = prisma_get_theme_option( 'posts_navigation' );
$prisma_prev_post          = false;
$prisma_prev_post_same_cat = (int)prisma_get_theme_option( 'posts_navigation_scroll_same_cat', 1 );

// Rewrite style of the single post if current post loading via AJAX and featured image and title is not in the content
if ( ( $full_post_loading 
		|| 
		( $prev_post_loading && 'article' == $prev_post_loading_type )
	) 
	&& 
	! in_array( prisma_get_theme_option( 'single_style' ), array( 'style-6' ) )
) {
	prisma_storage_set_array( 'options_meta', 'single_style', 'style-6' );
}

do_action( 'prisma_action_prev_post_loading', $prev_post_loading, $prev_post_loading_type );

get_header();

while ( have_posts() ) {

	the_post();

	// Type of the prev/next post navigation
	if ( 'scroll' == $prisma_posts_navigation ) {
		$prisma_prev_post = get_previous_post( $prisma_prev_post_same_cat );  // Get post from same category
		if ( ! $prisma_prev_post && $prisma_prev_post_same_cat ) {
			$prisma_prev_post = get_previous_post( false );                    // Get post from any category
		}
		if ( ! $prisma_prev_post ) {
			$prisma_posts_navigation = 'links';
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $prisma_prev_post ) ) {
		prisma_sc_layouts_showed( 'featured', false );
		prisma_sc_layouts_showed( 'title', false );
		prisma_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $prisma_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/content', 'single-' . prisma_get_theme_option( 'single_style' ) ), 'single-' . prisma_get_theme_option( 'single_style' ) );

	// If related posts should be inside the content
	if ( strpos( $prisma_related_position, 'inside' ) === 0 ) {
		$prisma_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'prisma_action_related_posts' );
		$prisma_related_content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $prisma_related_content ) ) {
			$prisma_related_position_inside = max( 0, min( 9, prisma_get_theme_option( 'related_position_inside' ) ) );
			if ( 0 == $prisma_related_position_inside ) {
				$prisma_related_position_inside = mt_rand( 1, 9 );
			}

			$prisma_p_number         = 0;
			$prisma_related_inserted = false;
			$prisma_in_block         = false;
			$prisma_content_start    = strpos( $prisma_content, '<div class="post_content' );
			$prisma_content_end      = strrpos( $prisma_content, '</div>' );

			for ( $i = max( 0, $prisma_content_start ); $i < min( strlen( $prisma_content ) - 3, $prisma_content_end ); $i++ ) {
				if ( $prisma_content[ $i ] != '<' ) {
					continue;
				}
				if ( $prisma_in_block ) {
					if ( strtolower( substr( $prisma_content, $i + 1, 12 ) ) == '/blockquote>' ) {
						$prisma_in_block = false;
						$i += 12;
					}
					continue;
				} else if ( strtolower( substr( $prisma_content, $i + 1, 10 ) ) == 'blockquote' && in_array( $prisma_content[ $i + 11 ], array( '>', ' ' ) ) ) {
					$prisma_in_block = true;
					$i += 11;
					continue;
				} else if ( 'p' == $prisma_content[ $i + 1 ] && in_array( $prisma_content[ $i + 2 ], array( '>', ' ' ) ) ) {
					$prisma_p_number++;
					if ( $prisma_related_position_inside == $prisma_p_number ) {
						$prisma_related_inserted = true;
						$prisma_content = ( $i > 0 ? substr( $prisma_content, 0, $i ) : '' )
											. $prisma_related_content
											. substr( $prisma_content, $i );
					}
				}
			}
			if ( ! $prisma_related_inserted ) {
				if ( $prisma_content_end > 0 ) {
					$prisma_content = substr( $prisma_content, 0, $prisma_content_end ) . $prisma_related_content . substr( $prisma_content, $prisma_content_end );
				} else {
					$prisma_content .= $prisma_related_content;
				}
			}
		}

		prisma_show_layout( $prisma_content );
	}

	// Comments
	do_action( 'prisma_action_before_comments' );
	comments_template();
	do_action( 'prisma_action_after_comments' );

	// Related posts
	if ( 'below_content' == $prisma_related_position
		&& ( 'scroll' != $prisma_posts_navigation || (int)prisma_get_theme_option( 'posts_navigation_scroll_hide_related', 0 ) == 0 )
		&& ( ! $full_post_loading || (int)prisma_get_theme_option( 'open_full_post_hide_related', 1 ) == 0 )
	) {
		do_action( 'prisma_action_related_posts' );
	}

	// Post navigation: type 'scroll'
	if ( 'scroll' == $prisma_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $prisma_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $prisma_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $prisma_prev_post ) ); ?>"
			data-cur-post-link="<?php echo esc_attr( get_permalink() ); ?>"
			data-cur-post-title="<?php the_title_attribute(); ?>"
			<?php do_action( 'prisma_action_nav_links_single_scroll_data', $prisma_prev_post ); ?>
		></div>
		<?php
	}
}

get_footer();
