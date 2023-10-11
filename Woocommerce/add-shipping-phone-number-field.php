<?php

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['shipping']['shipping_phone'] = array(
        'label'   => __('Phone', 'woocommerce'),
    'placeholder'=>  _x('Phone', 'placeholder', 'woocommerce'),
    'required' => false,
    'class'    => array('form-row-wide'),
    'clear'    => true
     );

     return $fields;
}

/**
 * Display field value on the order edit page
 */

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    global $post_id;
    $order = new WC_Order( $post_id );
    echo '<p><strong>'.__('Field Value').':</strong> ' . get_post_meta($order->get_id(), '_shipping_field_value', true ) . '</p>';
}
