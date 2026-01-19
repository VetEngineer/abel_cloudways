<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */

							do_action( 'prisma_action_page_content_end_text' );
							
							// Widgets area below the content
							prisma_create_widgets_area( 'widgets_below_content' );
						
							do_action( 'prisma_action_page_content_end' );
							?>
						</div>
						<?php
						
						do_action( 'prisma_action_after_page_content' );

						// Show main sidebar
						get_sidebar();

						do_action( 'prisma_action_content_wrap_end' );
						?>
					</div>
					<?php

					do_action( 'prisma_action_after_content_wrap' );

					// Widgets area below the page and related posts below the page
					$prisma_body_style = prisma_get_theme_option( 'body_style' );
					$prisma_widgets_name = prisma_get_theme_option( 'widgets_below_page', 'hide' );
					$prisma_show_widgets = ! prisma_is_off( $prisma_widgets_name ) && is_active_sidebar( $prisma_widgets_name );
					$prisma_show_related = prisma_is_single() && prisma_get_theme_option( 'related_position', 'below_content' ) == 'below_page';
					if ( $prisma_show_widgets || $prisma_show_related ) {
						if ( 'fullscreen' != $prisma_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $prisma_show_related ) {
							do_action( 'prisma_action_related_posts' );
						}

						// Widgets area below page content
						if ( $prisma_show_widgets ) {
							prisma_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $prisma_body_style ) {
							?>
							</div>
							<?php
						}
					}
					do_action( 'prisma_action_page_content_wrap_end' );
					?>
			</div>
			<?php
			do_action( 'prisma_action_after_page_content_wrap' );

			// Don't display the footer elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ( ! prisma_is_singular( 'post' ) && ! prisma_is_singular( 'attachment' ) ) || ! in_array ( prisma_get_value_gp( 'action' ), array( 'full_post_loading', 'prev_post_loading' ) ) ) {
				
				// Skip link anchor to fast access to the footer from keyboard
				?>
				<span id="footer_skip_link_anchor" class="prisma_skip_link_anchor"></span>
				<?php

				do_action( 'prisma_action_before_footer' );

				// Footer
				$prisma_footer_type = prisma_get_theme_option( 'footer_type' );
				if ( 'custom' == $prisma_footer_type && ! prisma_is_layouts_available() ) {
					$prisma_footer_type = 'default';
				}
				get_template_part( apply_filters( 'prisma_filter_get_template_part', "templates/footer-" . sanitize_file_name( $prisma_footer_type ) ) );

				do_action( 'prisma_action_after_footer' );

			}
			?>

			<?php do_action( 'prisma_action_page_wrap_end' ); ?>

		</div>

		<?php do_action( 'prisma_action_after_page_wrap' ); ?>

	</div>

	<?php do_action( 'prisma_action_after_body' ); ?>

	<?php wp_footer(); ?>

</body>
</html>