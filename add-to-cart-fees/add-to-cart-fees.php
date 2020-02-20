<?php
/**
 * WooCommerce: Add custom fee to cart automatically
 * Can be used to add a surcharge if so desired.
 */
function woo_add_cart_fee() {
 
  global $woocommerce;
	
  $woocommerce->cart->add_fee( __('Custom', 'woocommerce'), 5 );
	
}
add_action( 'woocommerce_cart_calculate_fees', 'woo_add_cart_fee' );