<div class="front_page_section front_page_section_team<?php
	$prisma_scheme = prisma_get_theme_option( 'front_page_team_scheme' );
	if ( ! empty( $prisma_scheme ) && ! prisma_is_inherit( $prisma_scheme ) ) {
		echo ' scheme_' . esc_attr( $prisma_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( prisma_get_theme_option( 'front_page_team_paddings' ) );
	if ( prisma_get_theme_option( 'front_page_team_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$prisma_css      = '';
		$prisma_bg_image = prisma_get_theme_option( 'front_page_team_bg_image' );
		if ( ! empty( $prisma_bg_image ) ) {
			$prisma_css .= 'background-image: url(' . esc_url( prisma_get_attachment_url( $prisma_bg_image ) ) . ');';
		}
		if ( ! empty( $prisma_css ) ) {
			echo ' style="' . esc_attr( $prisma_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$prisma_anchor_icon = prisma_get_theme_option( 'front_page_team_anchor_icon' );
	$prisma_anchor_text = prisma_get_theme_option( 'front_page_team_anchor_text' );
if ( ( ! empty( $prisma_anchor_icon ) || ! empty( $prisma_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_team"'
									. ( ! empty( $prisma_anchor_icon ) ? ' icon="' . esc_attr( $prisma_anchor_icon ) . '"' : '' )
									. ( ! empty( $prisma_anchor_text ) ? ' title="' . esc_attr( $prisma_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_team_inner
	<?php
	if ( prisma_get_theme_option( 'front_page_team_fullheight' ) ) {
		echo ' prisma-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$prisma_css      = '';
			$prisma_bg_mask  = prisma_get_theme_option( 'front_page_team_bg_mask' );
			$prisma_bg_color_type = prisma_get_theme_option( 'front_page_team_bg_color_type' );
			if ( 'custom' == $prisma_bg_color_type ) {
				$prisma_bg_color = prisma_get_theme_option( 'front_page_team_bg_color' );
			} elseif ( 'scheme_bg_color' == $prisma_bg_color_type ) {
				$prisma_bg_color = prisma_get_scheme_color( 'bg_color', $prisma_scheme );
			} else {
				$prisma_bg_color = '';
			}
			if ( ! empty( $prisma_bg_color ) && $prisma_bg_mask > 0 ) {
				$prisma_css .= 'background-color: ' . esc_attr(
					1 == $prisma_bg_mask ? $prisma_bg_color : prisma_hex2rgba( $prisma_bg_color, $prisma_bg_mask )
				) . ';';
			}
			if ( ! empty( $prisma_css ) ) {
				echo ' style="' . esc_attr( $prisma_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_team_content_wrap content_wrap">
			<?php
			// Caption
			$prisma_caption = prisma_get_theme_option( 'front_page_team_caption' );
			if ( ! empty( $prisma_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_team_caption front_page_block_<?php echo ! empty( $prisma_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $prisma_caption, 'prisma_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$prisma_description = prisma_get_theme_option( 'front_page_team_description' );
			if ( ! empty( $prisma_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_team_description front_page_block_<?php echo ! empty( $prisma_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $prisma_description ), 'prisma_kses_content' ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_team_output">
				<?php
				if ( is_active_sidebar( 'front_page_team_widgets' ) ) {
					dynamic_sidebar( 'front_page_team_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! prisma_exists_trx_addons() ) {
						prisma_customizer_need_trx_addons_message();
					} else {
						prisma_customizer_need_widgets_message( 'front_page_team_caption', 'ThemeREX Addons - Team' );
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
