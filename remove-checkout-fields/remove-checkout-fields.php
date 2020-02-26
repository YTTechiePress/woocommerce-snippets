<?php
/*
Plugin name: Lab Slim Checkout Process
Description: Lab Slim Checkout Process removes unused fields on checkout page.
Plugin Author: Laurence Bahiirwa
Plugin URI: https://omukiguy.com
Author URI: https://omukiguy.com
text-domain: lab-slim-checkout
*/

add_filter( 'woocommerce_checkout_fields', 'simplify_checkout_process' );

function simplify_checkout_process($fields) {

        // var_dump($fields);
        
        unset( $fields['billing']['billing_company']);
        unset( $fields['billing']['billing_address_1']);
        unset( $fields['billing']['billing_address_2']);
        unset( $fields['billing']['billing_postcode']);
        unset( $fields['billing']['billing_state']);
        unset( $fields['billing']['billing_city']);
        unset( $fields['billing']['billing_country']);

        return $fields;
}