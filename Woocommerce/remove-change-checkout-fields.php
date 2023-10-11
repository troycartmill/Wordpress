/**
 Remove all possible fields
 **/
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields) {
	
	// Billing fields
    //unset( $fields['billing']['billing_company'] );
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    //unset( $fields['billing']['billing_state'] );
    //unset( $fields['billing']['billing_first_name'] );
    //unset( $fields['billing']['billing_last_name'] );
    //unset( $fields['billing']['billing_address_1'] );
    //unset( $fields['billing']['billing_address_2'] );
    //unset( $fields['billing']['billing_city'] );
    //unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    //unset( $fields['shipping']['shipping_company'] );
    //unset( $fields['shipping']['shipping_phone'] );
    //unset( $fields['shipping']['shipping_state'] );
    //unset( $fields['shipping']['shipping_first_name'] );
    //unset( $fields['shipping']['shipping_last_name'] );
    //unset( $fields['shipping']['shipping_address_1'] );
    //unset( $fields['shipping']['shipping_address_2'] );
    //unset( $fields['shipping']['shipping_city'] );
    //unset( $fields['shipping']['shipping_postcode'] );
	
	//$fields['billing']['billing_city']['placeholder'] = 'City';
	//$fields['billing']['billing_city']['label'] = 'City';
	//$fields['billing']['billing_postcode']['placeholder'] = 'Zip Code';
	//$fields['billing']['billing_address_1']['placeholder'] = 'FOB Delivery Address';
	//$fields['billing']['billing_address_1']['label'] = 'FOB Delivery Address';
	
	//$fields['shipping']['shipping_city']['placeholder'] = 'City';
	//$fields['shipping']['shipping_city']['label'] = 'City';
	
	// Order fields
    //unset( $fields['order']['order_comments'] );

	return $fields;
}
