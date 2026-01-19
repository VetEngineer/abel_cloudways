<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'prisma_extra_styles_get_css' ) ) {
	add_filter( 'prisma_filter_get_css', 'prisma_extra_styles_get_css', 10, 2 );
	function prisma_extra_styles_get_css( $css, $args ) {
		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
			
		
		.sc_blogger_default.sc_blogger_default_over_centered_hover_price .sc_item_featured .post_info_mc .sc_blogger_item_price {
			{$fonts['h5_font-family']}
		}
		.text_stroke .trx_addons_bg_text.trx_addons_marquee_wrap .trx_addons_marquee_element .trx_addons_bg_text_char > span {
			{$fonts['h1_font-family']}
		}


CSS;
		}

		return $css;
	}
}

