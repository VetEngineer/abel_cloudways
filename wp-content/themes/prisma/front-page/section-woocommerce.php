<?php
$prisma_woocommerce_sc = prisma_get_theme_option( 'front_page_woocommerce_products' );
if ( ! empty( $prisma_woocommerce_sc ) ) {
	?><div class="front_page_section front_page_section_woocommerce<?php
		$prisma_scheme = prisma_get_theme_option( 'front_page_woocommerce_scheme' );
		if ( ! empty( $prisma_scheme ) && ! prisma_is_inherit( $prisma_scheme ) ) {
			echo ' scheme_' . esc_attr( $prisma_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( prisma_get_theme_option( 'front_page_woocommerce_paddings' ) );
		if ( prisma_get_theme_option( 'front_page_woocommerce_stack' ) ) {
			echo ' sc_stack_section_on';
		}
	?>"
			<?php
			$prisma_css      = '';
			$prisma_bg_image = prisma_get_theme_option( 'front_page_woocommerce_bg_image' );
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
		$prisma_anchor_icon = prisma_get_theme_option( 'front_page_woocommerce_anchor_icon' );
		$prisma_anchor_text = prisma_get_theme_option( 'front_page_woocommerce_anchor_text' );
		if ( ( ! empty( $prisma_anchor_icon ) || ! empty( $prisma_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
			echo do_shortcode(
				'[trx_sc_anchor id="front_page_section_woocommerce"'
											. ( ! empty( $prisma_anchor_icon ) ? ' icon="' . esc_attr( $prisma_anchor_icon ) . '"' : '' )
											. ( ! empty( $prisma_anchor_text ) ? ' title="' . esc_attr( $prisma_anchor_text ) . '"' : '' )
											. ']'
			);
		}
	?>
		<div class="front_page_section_inner front_page_section_woocommerce_inner
			<?php
			if ( prisma_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
				echo ' prisma-full-height sc_layouts_flex sc_layouts_columns_middle';
			}
			?>
				"
				<?php
				$prisma_css      = '';
				$prisma_bg_mask  = prisma_get_theme_option( 'front_page_woocommerce_bg_mask' );
				$prisma_bg_color_type = prisma_get_theme_option( 'front_page_woocommerce_bg_color_type' );
				if ( 'custom' == $prisma_bg_color_type ) {
					$prisma_bg_color = prisma_get_theme_option( 'front_page_woocommerce_bg_color' );
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
			<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
				<?php
				// Content wrap with title and description
				$prisma_caption     = prisma_get_theme_option( 'front_page_woocommerce_caption' );
				$prisma_description = prisma_get_theme_option( 'front_page_woocommerce_description' );
				if ( ! empty( $prisma_caption ) || ! empty( $prisma_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					// Caption
					if ( ! empty( $prisma_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $prisma_caption ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( $prisma_caption, 'prisma_kses_content' );
						?>
						</h2>
						<?php
					}

					// Description (text)
					if ( ! empty( $prisma_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $prisma_description ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( wpautop( $prisma_description ), 'prisma_kses_content' );
						?>
						</div>
						<?php
					}
				}

				// Content (widgets)
				?>
				<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
					<?php
					if ( 'products' == $prisma_woocommerce_sc ) {
						$prisma_woocommerce_sc_ids      = prisma_get_theme_option( 'front_page_woocommerce_products_per_page' );
						$prisma_woocommerce_sc_per_page = count( explode( ',', $prisma_woocommerce_sc_ids ) );
					} else {
						$prisma_woocommerce_sc_per_page = max( 1, (int) prisma_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
					}
					$prisma_woocommerce_sc_columns = max( 1, min( $prisma_woocommerce_sc_per_page, (int) prisma_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
					echo do_shortcode(
						"[{$prisma_woocommerce_sc}"
										. ( 'products' == $prisma_woocommerce_sc
												? ' ids="' . esc_attr( $prisma_woocommerce_sc_ids ) . '"'
												: '' )
										. ( 'product_category' == $prisma_woocommerce_sc
												? ' category="' . esc_attr( prisma_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
												: '' )
										. ( 'best_selling_products' != $prisma_woocommerce_sc
												? ' orderby="' . esc_attr( prisma_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
													. ' order="' . esc_attr( prisma_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
												: '' )
										. ' per_page="' . esc_attr( $prisma_woocommerce_sc_per_page ) . '"'
										. ' columns="' . esc_attr( $prisma_woocommerce_sc_columns ) . '"'
						. ']'
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
