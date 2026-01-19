<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

// Page (category, tag, archive, author) title

if ( prisma_need_page_title() ) {
	prisma_sc_layouts_showed( 'title', true );
	prisma_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								prisma_show_post_meta(
									apply_filters(
										'prisma_filter_post_meta_args', array(
											'components' => join( ',', prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) ) ),
											'counters'   => join( ',', prisma_array_get_keys_by_value( prisma_get_theme_option( 'counters' ) ) ),
											'seo'        => prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$prisma_blog_title           = prisma_get_blog_title();
							$prisma_blog_title_text      = '';
							$prisma_blog_title_class     = '';
							$prisma_blog_title_link      = '';
							$prisma_blog_title_link_text = '';
							if ( is_array( $prisma_blog_title ) ) {
								$prisma_blog_title_text      = $prisma_blog_title['text'];
								$prisma_blog_title_class     = ! empty( $prisma_blog_title['class'] ) ? ' ' . $prisma_blog_title['class'] : '';
								$prisma_blog_title_link      = ! empty( $prisma_blog_title['link'] ) ? $prisma_blog_title['link'] : '';
								$prisma_blog_title_link_text = ! empty( $prisma_blog_title['link_text'] ) ? $prisma_blog_title['link_text'] : '';
							} else {
								$prisma_blog_title_text = $prisma_blog_title;
							}
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr( $prisma_blog_title_class ); ?>"<?php
								if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
									?> itemprop="headline"<?php
								}
							?>>
								<?php
								$prisma_top_icon = prisma_get_term_image_small();
								if ( ! empty( $prisma_top_icon ) ) {
									$prisma_attr = prisma_getimagesize( $prisma_top_icon );
									?>
									<img src="<?php echo esc_url( $prisma_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'prisma' ); ?>"
										<?php
										if ( ! empty( $prisma_attr[3] ) ) {
											prisma_show_layout( $prisma_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $prisma_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $prisma_blog_title_link ) && ! empty( $prisma_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $prisma_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $prisma_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( ! is_paged() && ( is_category() || is_tag() || is_tax() ) ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						ob_start();
						do_action( 'prisma_action_breadcrumbs' );
						$prisma_breadcrumbs = ob_get_contents();
						ob_end_clean();
						prisma_show_layout( $prisma_breadcrumbs, '<div class="sc_layouts_title_breadcrumbs">', '</div>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
