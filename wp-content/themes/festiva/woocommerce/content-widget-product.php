<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<div class="wg-product-inner">
		<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

		<div class="wg-product-image">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<?php echo ''.$product->get_image(array( 300, 300 )); ?>
			</a>
		</div>
		<div class="wg-product-holder">
			<h3 class="product-title">
				<a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo ''.$product->get_name(); ?></a>
			</h3>
			<?php if ( ! empty( $show_rating ) ) : ?>
				<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
			<?php endif; ?>
			<?php echo ''.$product->get_price_html(); ?>
		</div>

		<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
	</div>
</li>
