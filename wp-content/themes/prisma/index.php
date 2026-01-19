<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: //codex.wordpress.org/Template_Hierarchy
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

$prisma_template = apply_filters( 'prisma_filter_get_template_part', prisma_blog_archive_get_template() );

if ( ! empty( $prisma_template ) && 'index' != $prisma_template ) {

	get_template_part( $prisma_template );

} else {

	prisma_storage_set( 'blog_archive', true );

	get_header();

	if ( have_posts() ) {

		// Query params
		$prisma_stickies   = is_home()
								|| ( in_array( prisma_get_theme_option( 'post_type' ), array( '', 'post' ) )
									&& (int) prisma_get_theme_option( 'parent_cat' ) == 0
									)
										? get_option( 'sticky_posts' )
										: false;
		$prisma_post_type  = prisma_get_theme_option( 'post_type' );
		$prisma_args       = array(
								'blog_style'     => prisma_get_theme_option( 'blog_style' ),
								'post_type'      => $prisma_post_type,
								'taxonomy'       => prisma_get_post_type_taxonomy( $prisma_post_type ),
								'parent_cat'     => prisma_get_theme_option( 'parent_cat' ),
								'posts_per_page' => prisma_get_theme_option( 'posts_per_page' ),
								'sticky'         => prisma_get_theme_option( 'sticky_style', 'inherit' ) == 'columns'
															&& is_array( $prisma_stickies )
															&& count( $prisma_stickies ) > 0
															&& get_query_var( 'paged' ) < 1
								);

		prisma_blog_archive_start();

		do_action( 'prisma_action_blog_archive_start' );

		if ( is_author() ) {
			do_action( 'prisma_action_before_page_author' );
			get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/author-page' ) );
			do_action( 'prisma_action_after_page_author' );
		}

		if ( prisma_get_theme_option( 'show_filters', 0 ) ) {
			do_action( 'prisma_action_before_page_filters' );
			prisma_show_filters( $prisma_args );
			do_action( 'prisma_action_after_page_filters' );
		} else {
			do_action( 'prisma_action_before_page_posts' );
			prisma_show_posts( array_merge( $prisma_args, array( 'cat' => $prisma_args['parent_cat'] ) ) );
			do_action( 'prisma_action_after_page_posts' );
		}

		do_action( 'prisma_action_blog_archive_end' );

		prisma_blog_archive_end();

	} else {

		if ( is_search() ) {
			get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/content', 'none-search' ), 'none-search' );
		} else {
			get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/content', 'none-archive' ), 'none-archive' );
		}
	}

	get_footer();
}
