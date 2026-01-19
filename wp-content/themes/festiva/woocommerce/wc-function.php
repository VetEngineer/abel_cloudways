<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'festiva_loop_shop_columns', 20 ); 
function festiva_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : festiva()->get_theme_opt('products_columns', 4);
	return $columns;
}


// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'festiva_loop_shop_per_page', 20 );
function festiva_loop_shop_per_page( $limit ) {
	$limit = festiva()->get_theme_opt('product_per_page', 9);
	return $limit;
}
if(!function_exists('festiva_woocommerce_catalog_result')){
    // remove
	
    // add back
	add_action('woocommerce_before_shop_loop','festiva_woocommerce_catalog_result', 20);
	add_action('festiva_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
	add_action('festiva_woocommerce_result_count', 'woocommerce_result_count');
	function festiva_woocommerce_catalog_result(){
		$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : festiva()->get_theme_opt('products_columns', '2');
		$display_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : festiva()->get_theme_opt('shop_display_type', 'grid');
		$active_grid = 'active';
		$active_list = '';
		if( $display_type == 'list' ){
			$active_list = $display_type == 'list' ? 'active' : '';
			$active_grid = '';
		}
		?>
		<div class="pxl-shop-topbar-wrap ">
			<div class="pxl-view-layout-wrap ">
				<ul class="pxl-view-layout d-flex align-items-center">
					<li class="view-icon view-grid <?php echo esc_attr($active_grid) ?>"><a href="javascript:void(0);" class="pxl-ttip tt-top-left" data-cls="products columns-<?php echo esc_attr($columns);?>" data-col="grid"><span class="tt-txt">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M0 -0.00012207H4V2.99988H0V-0.00012207ZM6 -0.00012207H10V2.99988H6V-0.00012207ZM16 -0.00012207H11V2.99988H16V-0.00012207ZM0 4.99988H4V7.99988H0V4.99988ZM10 4.99988H6V7.99988H10V4.99988ZM11 4.99988H16V7.99988H11V4.99988ZM4 9.99988H0V12.9999H4V9.99988ZM6 9.99988H10V12.9999H6V9.99988ZM16 9.99988H11V12.9999H16V9.99988Z" fill="#D9D9D9"/>
						</svg>
					</span></a></li>
					<li class="view-icon view-list <?php echo esc_attr($active_list) ?>"><a href="javascript:void(0);" class="pxl-ttip tt-top-left" data-cls="products shop-view-list" data-col="list">
						<span class="tt-txt">
							<svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 2.99988C2.32843 2.99988 3 2.32831 3 1.49988C3 0.671451 2.32843 -0.00012207 1.5 -0.00012207C0.671573 -0.00012207 0 0.671451 0 1.49988C0 2.32831 0.671573 2.99988 1.5 2.99988ZM1.5 7.99988C2.32843 7.99988 3 7.32831 3 6.49988C3 5.67145 2.32843 4.99988 1.5 4.99988C0.671573 4.99988 0 5.67145 0 6.49988C0 7.32831 0.671573 7.99988 1.5 7.99988ZM3 11.4999C3 12.3283 2.32843 12.9999 1.5 12.9999C0.671573 12.9999 0 12.3283 0 11.4999C0 10.6715 0.671573 9.99988 1.5 9.99988C2.32843 9.99988 3 10.6715 3 11.4999ZM15 -0.00012207H4V2.99988H15V-0.00012207ZM4 4.99988H15V7.99988H4V4.99988ZM15 9.99988H4V12.9999H15V9.99988Z" fill="#D9D9D9"/>
							</svg></span>
						</a></li>
					</ul>
					<div class="text-heading number-result">
						<?php do_action('festiva_woocommerce_result_count'); ?>
					</div>
				</div>
				
				<div class="woocommerce-topbar-ordering">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</div>
			<?php
		}
	}

	/* Remove result count & product ordering & item product category..... */
	function festiva_cwoocommerce_remove_function() {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
	}
	add_action( 'init', 'festiva_cwoocommerce_remove_function' );

	/* Product Category */
	//add_action( 'woocommerce_before_shop_loop', 'festiva_woocommerce_nav_top', 2 );
	function festiva_woocommerce_nav_top() { ?>
		<div class="woocommerce-topbar">
			<div class="woocommerce-result-count">
				<?php woocommerce_result_count(); ?>
			</div>
			<div class="woocommerce-topbar-ordering">
				<?php woocommerce_catalog_ordering(); ?>
			</div>
		</div>
	<?php }

	add_filter( 'woocommerce_after_shop_loop_item', 'festiva_woocommerce_product' );
	function festiva_woocommerce_product() {
		global $product;
		$shop_layout = festiva()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
			$shop_layout = $_GET['shop-layout'];
		}
		?>
		<div class="woocommerce-product-inner item-layout-<?php echo esc_attr($shop_layout); ?>">
			<div class="woocommerce-product-header">
				<?php 
				if ( $product->is_featured() ) {
					$feature_text = get_post_meta($product->get_id(),'product_feature_text', true);
					if (empty($feature_text)){
						$feature_text = "NEW";
					}
					?>
					<span class="pxl-featured"><?php echo esc_html($feature_text); ?></span>
					<?php
				}
				?>
				<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
					<?php woocommerce_template_loop_product_thumbnail(); ?>
				</a>
			</div>
			<div class="woocommerce-product-content">
				<div class="woocommerce-product-meta">
					<div class="meta-left">
						<h8 class="woocommerce-product-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h8>
					</div>
					<div class="woocommerce-product--price">
						<?php woocommerce_template_loop_price(); ?>
					</div>
					<div class="woocommerce-product--excerpt" style="display: none;">
						<?php woocommerce_template_single_excerpt(); ?>
					</div>
				</div>

			</div>
		</div>
	<?php }

	add_filter('woocommerce_loop_add_to_cart_link', 'festiva_woocommerce_loop_add_to_cart_link', 10, 3);
	function festiva_woocommerce_loop_add_to_cart_link($button, $product, $args){
		return sprintf(
			'<a href="%s" data-quantity="%s" class="%s" %s><span class="pxl-cart-text pxl-hidden">%s</span><span class="pxl-cart-label">%s</span>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() ),
			esc_html( $product->add_to_cart_text() ),
			'<span class="pxl-cart-icon"><i class="flaticon-shoping-bag"></i></span>'
		);
	}

	/* Removes the "shop" title on the main shop page */
	function festiva_hide_page_title()
	{
		return false;
	}
	add_filter('woocommerce_show_page_title', 'festiva_hide_page_title');

	/* Replace text Onsale */
	add_filter('woocommerce_sale_flash', 'festiva_custom_sale_text', 10, 3);
	function festiva_custom_sale_text($text, $post, $_product)
	{
		return '<span class="onsale">' . esc_html__( 'Sale', 'festiva' ) . '</span>';
	}

	add_filter( 'woocommerce_checkout_before_order_review_heading', 'festiva_checkout_before_order_review_heading', 10 );
	function festiva_checkout_before_order_review_heading() {
		echo '<div class="pxl-checkout-order-review">';
	}
	add_filter( 'woocommerce_checkout_after_order_review', 'festiva_checkout_after_order_review', 20 );
	function festiva_checkout_after_order_review() {
		echo '</div>';
	}

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
	$size['width'] = 400;
	$size['height'] = 700;
	$size['crop'] = 1;
	return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
	$size['width'] = 700;
	$size['height'] = 700;
	$size['crop'] = 1;
	return $size;
});

// add_filter('woocommerce_get_image_size_single', function ($size) {
// 	$size['width'] = 500;
// 	$size['height'] = 500;
// 	$size['crop'] = 1;
// 	return $size;
// });

add_action( 'woocommerce_before_single_product_summary', 'festiva_woocommerce_single_summer_start', 0 );
function festiva_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'festiva_woocommerce_single_summer_end', 5 );
function festiva_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'festiva_woocommerce_sg_product_title', 5 );
function festiva_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = festiva()->get_theme_opt( 'product_title', true ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
	<?php endif; }

	add_action( 'woocommerce_single_product_summary', 'festiva_woocommerce_sg_product_rating', 10 );
	function festiva_woocommerce_sg_product_rating() { global $product; ?>
		<div class="woocommerce-sg-product-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_before_add_to_cart_quantity', 'custom_before_quantity_input_field', 25 );
	function custom_before_quantity_input_field() {
		echo '<div class="wooc-product-quantity">';
		echo '<span class="quantity-label">' . esc_html__( 'QUANTITY', 'festiva' ) . '</span>';
	}

	add_action( 'woocommerce_after_add_to_cart_quantity', 'custom_after_quantity_input_field', 26 );
	function custom_after_quantity_input_field() {
		echo "</div>";
		global $product;
		?>
		<div class="wooc-product-meta">
			<?php if (class_exists('WPCleverWoosw')) { ?>
				<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
			<?php if (class_exists('WPCleverWoosc')) { ?>
				<?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
			<?php } ?>
		</div>
		<?php
	}

	add_action( 'woocommerce_single_product_summary', 'festiva_woocommerce_sg_product_price', 11 );
	function festiva_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	<?php }

	add_action( 'woocommerce_single_product_summary', 'festiva_woocommerce_sg_product_excerpt', 15 );
	function festiva_woocommerce_sg_product_excerpt() { ?>
		<div class="woocommerce-sg-product-excerpt">
			<?php woocommerce_template_single_excerpt(); ?>
		</div>
	<?php }

	add_action('woocommerce_single_product_summary','festiva_single_product_meta_before', 40);
	function festiva_single_product_meta_before() {
		global $product;
		echo '<div class="woocommerce-product-info-meta product_meta">';
		echo wc_get_product_category_list( $product->get_id(), '<span class="comma">, </span>', '<div class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'festiva' ) . ' ', '</div>' );
		if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
			<div class="sku_wrapper"><?php esc_html_e( 'SKU:', 'festiva' ); ?> <span class="sku"><?php echo festiva_html($product->get_sku()); ?></span></div>
	<?php endif;
	echo wc_get_product_tag_list( $product->get_id(), '', '<div class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'festiva' ) . ' ', '</div>' );
}

add_action( 'woocommerce_single_product_summary', 'festiva_woocommerce_sg_social_share', 40 );
function festiva_woocommerce_sg_social_share() { 
	$product_social_share = festiva()->get_theme_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label><?php echo esc_html__('Share:', 'festiva'); ?></label>
			<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'festiva'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
			<a class="tw-social" title="<?php echo esc_attr__('Twitter', 'festiva'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
			<a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'festiva'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_attr( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>&description=<?php the_title(); ?>"><i class="fab fa-pinterest-p"></i></a>
			<a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'festiva'); ?>" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url( get_permalink() ); ?>"><i class="caseicon-linkedin"></i></a>
		</div>
	<?php endif; }

	/* Product Single: Gallery */
	add_action( 'woocommerce_before_single_product_summary', 'festiva_woocommerce_single_gallery_start', 0 );
	function festiva_woocommerce_single_gallery_start() { ?>
		<?php echo '<div class="woocommerce-gallery col-xl-7 col-lg-6 col-md-6"><div class="woocommerce-gallery-inner flex-slider-active">'; ?>
	<?php }
	add_action( 'woocommerce_before_single_product_summary', 'festiva_woocommerce_single_gallery_end', 30 );
	function festiva_woocommerce_single_gallery_end() { ?>
		<?php echo '</div></div><div class="woocommerce-summary-inner col-xl-5 col-lg-6 col-md-6">'; ?>
	<?php }

	/* Ajax update cart item */
	add_filter('woocommerce_add_to_cart_fragments', 'festiva_woo_mini_cart_item_fragment');
	function festiva_woo_mini_cart_item_fragment( $fragments ) {
		global $woocommerce;
		$product_subtitle = festiva()->get_page_opt( 'product_subtitle' );
		ob_start();
		?>
		<div class="widget_shopping_cart">
			<div class="widget_shopping_head">
				<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
				<div class="widget_shopping_title">
					<?php echo esc_html__( 'Cart', 'festiva' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'festiva' ), WC()->cart->cart_contents_count ); ?>)</span>
				</div>
			</div>
			<div class="widget_shopping_cart_content">
				<?php
				$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
				?>
				<ul class="cart_list product_list_widget">

					<?php if ( ! WC()->cart->is_empty() ) : ?>

					<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li>
								<?php if(!empty($thumbnail)) : ?>
									<div class="cart-product-image">
										<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="cart-product-meta">
									<h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_attr__( 'Remove this item', 'festiva' ),
										esc_attr( $product_id ),
										esc_attr( $cart_item_key ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
									?>
								</div>	
							</li>
							<?php
						}
					}
					?>

					<?php else : ?>

						<li class="empty">
							<i class="caseicon-shopping-cart-alt"></i>
							<span><?php esc_html_e( 'Your cart is empty', 'festiva' ); ?></span>
							<a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'festiva'); ?></a>
						</li>

					<?php endif; ?>

				</ul><!-- end product list -->
			</div>
			<?php if ( ! WC()->cart->is_empty() ) : ?>
			<div class="widget_shopping_cart_footer">
				<p class="total"><strong><?php esc_html_e( 'Subtotal', 'festiva' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'festiva' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'festiva' ); ?></a>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
	$fragments['div.widget_shopping_cart'] = ob_get_clean();
	return $fragments;
}

/* Ajax update cart total number */

add_filter( 'woocommerce_add_to_cart_fragments', 'festiva_woocommerce_sidebar_cart_count_number' );
function festiva_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'festiva' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php
	
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'festiva_woocommerce_sidebar_cart_count_number_header' );
function festiva_woocommerce_sidebar_cart_count_number_header( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'festiva' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.widget_cart_counter_header'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'festiva_woocommerce_sidebar_cart_count_number_sidebar' );
function festiva_woocommerce_sidebar_cart_count_number_sidebar( $fragments ) {
	ob_start();
	?>
	<span class="ct-cart-count-sidebar"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'festiva' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.ct-cart-count-sidebar'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_output_related_products_args', 'festiva_related_products_args', 20 );
function festiva_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

/* Pagination Args */
function festiva_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
	return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'festiva_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'festiva_update_woo_flexslider_options' );
function festiva_update_woo_flexslider_options( $options ) {
	$options['directionNav'] = true;
	return $options;
}