<?php
/**
 * The template to display the attachment
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */


get_header();

while ( have_posts() ) {
	the_post();

	// Display post's content
	get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/content', 'single-' . prisma_get_theme_option( 'single_style' ) ), 'single-' . prisma_get_theme_option( 'single_style' ) );

	// Parent post navigation.
	$prisma_posts_navigation = prisma_get_theme_option( 'posts_navigation' );
	if ( 'links' == $prisma_posts_navigation ) {
		?>
		<div class="nav-links-single<?php
			if ( ! prisma_is_off( prisma_get_theme_option( 'posts_navigation_fixed', 0 ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation( apply_filters( 'prisma_filter_post_navigation_args', array(
					'prev_text' => '<span class="nav-arrow"></span>'
						. '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Published in', 'prisma' ) . '</span> '
						. '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'prisma' ) . '</span> '
						. '<h5 class="post-title">%title</h5>'
						. '<span class="post_date">%date</span>',
			), 'image' ) );
			?>
		</div>
		<?php
	}

	// Comments
	do_action( 'prisma_action_before_comments' );
	comments_template();
	do_action( 'prisma_action_after_comments' );
}

get_footer();
