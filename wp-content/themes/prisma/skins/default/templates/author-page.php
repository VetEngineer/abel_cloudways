<?php
/**
 * The template to display the user's avatar, bio and socials on the Author page
 *
 * @package PRISMA
 * @since PRISMA 1.71.0
 */
?>

<div class="author_page author vcard"<?php
	if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
		?> itemprop="author" itemscope="itemscope" itemtype="<?php echo esc_attr( prisma_get_protocol( true ) ); ?>//schema.org/Person"<?php
	}
?>>

	<div class="author_avatar"<?php
		if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
			?> itemprop="image"<?php
		}
	?>>
		<?php
		$prisma_mult = prisma_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120 * $prisma_mult );
		?>
	</div>

	<h4 class="author_title"<?php
		if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
			?> itemprop="name"<?php
		}
	?>><span class="fn"><?php the_author(); ?></span></h4>

	<?php
	$prisma_author_description = get_the_author_meta( 'description' );
	if ( ! empty( $prisma_author_description ) ) {
		?>
		<div class="author_bio"<?php
			if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
				?> itemprop="description"<?php
			}
		?>><?php echo wp_kses( wpautop( $prisma_author_description ), 'prisma_kses_content' ); ?></div>
		<?php
	}
	?>

	<div class="author_details">
		<span class="author_posts_total">
			<?php
			$prisma_posts_total = count_user_posts( get_the_author_meta('ID'), 'post' );
			if ( $prisma_posts_total > 0 ) {
				// Translators: Add the author's posts number to the message
				echo wp_kses( sprintf( _n( '%s article published', '%s articles published', $prisma_posts_total, 'prisma' ),
										'<span class="author_posts_total_value">' . number_format_i18n( $prisma_posts_total ) . '</span>'
								 		),
							'prisma_kses_content'
							);
			} else {
				esc_html_e( 'No posts published.', 'prisma' );
			}
			?>
		</span><?php
			ob_start();
			do_action( 'prisma_action_user_meta', 'author-page' );
			$prisma_socials = ob_get_contents();
			ob_end_clean();
			prisma_show_layout( $prisma_socials,
				'<span class="author_socials"><span class="author_socials_caption">' . esc_html__( 'Follow:', 'prisma' ) . '</span>',
				'</span>'
			);
		?>
	</div>

</div>
