<?php

/**
 * Plugin Name: Techipress DHL Shipping
 * Plugin URI: https://github.com/omukiguy/techiepress-dhl-shipping
 * Author: Techipress
 * Author URI: https://github.com/omukiguy/techiepress-dhl-shipping
 * Description: Techipress DHL Shipping plugin
 * Version: 0.0.1
 */
 
 add_action( 'woocommerce_shipping_init', 'techiepress_dhl_shipping_init' );
 
 function techiepress_dhl_shipping_init() {
     if ( ! class_exists( 'WC_TECHIEPRESS_DHL_SHIPPING') ) {
         class WC_TECHIEPRESS_DHL_SHIPPING extends WC_Shipping_Method {
            
            public function __construct() {
                $this->id                 = 'techipress_dhl_shipping'; // Id for your shipping method. Should be uunique.
				$this->method_title       = __( 'Techiepress DHL Shipping' );  // Title shown in admin
				$this->method_description = __( 'Description of your Techiepress DHL Shipping' ); // Description shown in admin

				$this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
				$this->title              = "Techiepress DHL Shipping"; // This can be added as an setting but for this example its forced.

				$this->init();
            }
            
            public function init() {
                // Load the settings API
				$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
				$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

				// Save settings in admin if you have any defined
				add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
            }
            
            public function calculate_shipping( $package ) {
                
                $rate = array(
					'label' => $this->title,
					'cost' => '10.99',
					'calc_tax' => 'per_item'
				);

				// Register the rate
				$this->add_rate( $rate );
                
            }
            
         }
     }
 }
 
 add_filter( 'woocommerce_shipping_methods', 'add_techiepress_dhl_method');
 
 function add_techiepress_dhl_method( $methods ) {
    $methods['techipress_dhl_shipping'] = 'WC_TECHIEPRESS_DHL_SHIPPING';
    return $methods;
 }
