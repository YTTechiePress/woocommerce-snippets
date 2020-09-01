<?php
/**
 * Plugin Name: Our currencies of the world
 * Plugin URI: https://omukiguy.com
 * Author: TechiePress
 * Author URI: https://omukiguy.com
 * Description: Add currencies of the world
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: ocotw
*/

/**
 * Add new Country/Economy currency.
 */
add_filter( 'woocommerce_currencies', 'techiepress_add_world_currencies' );

function techiepress_add_world_currencies( $currencies ) {

	// Add currency of Abkhazia
	$currencies['ARUB'] = __( 'Abkahzia Kopek', 'ocotw' );

	return $currencies;
}

/**
 * Add new Country/Economy currency code.
 */
add_filter( 'woocommerce_currency_symbol', 'techiepress_add_world_currencies_symbol', 10, 2 );

function techiepress_add_world_currencies_symbol( $currency_symbol, $currency ) {
	switch ( $currency ) {
		case 'ARUB': 
			$currency_symbol = 'AR'; 
		break;
	}
	return $currency_symbol;
}

/**
 * Change an exisiting currency
 *
 * Go to https://github.com/woocommerce/woocommerce/blob/master/includes/wc-core-functions.php
 * In the get_woocommerce_currencies() to find your currency code.
 */
add_filter( 'woocommerce_currency_symbol', 'techiepress_change_woocommerce_currency_symbol', 10, 2 );

function techiepress_change_woocommerce_currency_symbol( $currency_symbol, $currency ) {
    
    switch( $currency ) {
		    
	// Insert currency code from the get_woocommerce_currencies().
        case 'AED' : $currency_symbol = 'AED';
        break;
		    
    }
    
    return $currency_symbol;
    
}
