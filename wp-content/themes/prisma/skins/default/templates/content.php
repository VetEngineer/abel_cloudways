<?php
/**
 * The default template to display the content of the single post or attachment
 *
 * @package PRISMA
 * @since PRISMA 1.0
 */
?>
<article id="post-<?php the_ID(); ?>"
	<?php
	post_class( 'post_item_single'
		. ' post_type_' . esc_attr( get_post_type() ) 
		. ' post_format_' . esc_attr( str_replace( 'post-format-', '', get_post_format() ) )
	);
	prisma_add_seo_itemprops();
	?>
>
<?php

	do_action( 'prisma_action_before_post_data' );
	prisma_add_seo_snippets();
	do_action( 'prisma_action_after_post_data' );

	do_action( 'prisma_action_before_post_content' );

	// Post content
	$prisma_meta_components = prisma_array_get_keys_by_value( prisma_get_theme_option( 'meta_parts' ) );
	$prisma_share_position  = prisma_array_get_keys_by_value( prisma_get_theme_option( 'share_position' ) );
	?>
	<div class="post_content post_content_single entry-content<?php
		if ( in_array( 'left', $prisma_share_position ) && in_array( 'share', $prisma_meta_components ) ) {
			echo ' post_info_vertical_present' . ( in_array( 'top', $prisma_share_position ) ? ' post_info_vertical_hide_on_mobile' : '' );
		}
	?>"<?php
		if ( prisma_is_on( prisma_get_theme_option( 'seo_snippets' ) ) ) {
			?> itemprop="mainEntityOfPage"<?php
		}
	?>>
		<?php
		if ( in_array( 'left', $prisma_share_position ) && in_array( 'share', $prisma_meta_components ) ) {
			?><div class="post_info_vertical<?php
				if ( prisma_get_theme_option( 'share_fixed' ) > 0 ) {
					echo ' post_info_vertical_fixed';
				}
			?>"><?php
				prisma_show_post_meta(
					apply_filters(
						'prisma_filter_post_meta_args',
						array(
							'components'      => 'share',
							'class'           => 'post_share_vertical',
							'share_type'      => 'block',
							'share_direction' => 'vertical',
						),
						'single',
						1
					)
				);
			?></div><?php
		}
		the_content();
		?>
	</div>
	<?php

	do_action( 'prisma_action_after_post_content' );
	
	// Post footer: Tags, likes, share, author, prev/next links and comments
	do_action( 'prisma_action_before_post_footer' );
	?>
	<div class="post_footer post_footer_single entry-footer">
		<?php
		prisma_show_post_pagination();
		if ( is_single() && ! is_attachment() ) {
			prisma_show_post_footer();
		}
		?>
	</div>
	<?php
	do_action( 'prisma_action_after_post_footer' );
	?>
</article>
