<?php
/**
 * Plugin name: Extra fee for the particualar payment gateways.
 * Description: Package Cost Extra fee for the particualar payment gateways.
 * Author: Techiepress
 * Plugin URI: https://omukiguy.com
 * Author URI: https://omukiguy.com
 * text-domain: package-cost-extra
 */

 add_action( 'woocommerce_cart_calculate_fees', 'techiepress_cart_fees_gateway' );

 function techiepress_cart_fees_gateway( $cart ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }

    // cod, cheque, paypal, bacs, payleo
    $preferred_payment_gateway_id = WC()->session->get( 'chosen_payment_method' );
    
    if ( empty( $preferred_payment_gateway_id ) ) {
        return;
    }

    $chosen_methods_ids = array(
        'cod'    => 3,
        'cheque' => 1,
        'paypal' => 4,
        'bacs'   => 2,
        'payleo' => 6
    );

    foreach( $chosen_methods_ids as $chosen_methods_id => $amount ) {
        if ( $preferred_payment_gateway_id === $chosen_methods_id ) {
            $cart->add_fee( 'Handling', $amount, true );
        }
    }

 }

 // Ajax update on gateway change
 add_action( 'wp_footer', 'techiepress_ajax_runner' );

 function techiepress_ajax_runner() {
     if ( is_checkout() && ! is_wc_endpoint_url() ) {
        ?>
            <script>
                jQuery( function($){
                    $('form.checkout').on('change', 'input[name="payment_method"]', function(){
                        $(document.body).trigger('update_checkout');
                    });
                });
            </script>
        <?php
     }
 }
