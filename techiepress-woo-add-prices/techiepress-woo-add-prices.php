<?php

/**
 * Plugin Name: Techiepress Add Prices
 * Author: Techiepress
 * Plugin URI: https://omukiguy.com
 * Author URI: https://omukiguy.com
 * Description: This plugin adds extra fees to woocommerce.
*/

function lab_pacakge_cost() {
    global $woocommerce;

    $flat_rate = 5;

    $taxable = $flat_rate + ( $woocommerce->cart->cart_contents_total * 0.18 );

    $woocommerce->cart->add_fee( __( 'Soda price', 'om-service-widget' ), $taxable );
}

add_action( 'woocommerce_cart_calculate_fees', 'lab_pacakge_cost');