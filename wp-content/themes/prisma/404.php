<?php
/**
 * The template to display the 404 page
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

get_header();

get_template_part( apply_filters( 'prisma_filter_get_template_part', 'templates/content', '404' ), '404' );

get_footer();
