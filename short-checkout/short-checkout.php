<?php

/**
 * Plugin Name: TechiePress short Checkout
 * Plugin URI: https://omukiguy.com
 * Author: TechiePress
 * Author URI: https://omukiguy.com
 * Description: This plugin makes short checkout process
 * Version: 0.1.0
 * License: GPL2 or Later
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: techiepress-short-checkout
*/

function techiepress_skipcart() {
    return wc_get_checkout_url();
}

add_filter( 'woocommerce_add_to_cart_redirect', 'techiepress_skipcart' );