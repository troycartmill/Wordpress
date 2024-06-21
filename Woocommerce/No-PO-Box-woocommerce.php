// Removes the ability to use PO Box address when checking out
function rs24_restrict_po_box_in_checkout_fields( $address, $errors ) {
    $po_box_patterns = [
        '/P\.?\s*O\.?\s*Box/i',
        '/Post\s*Office\s*Box/i',
        '/Private\.?\s*Mail\.?\s*Box/i',
        '/P\.?\s*O\.?\s*Drawer/i',
        '/Post\s*Office\s*Drawer/i'
    ];
    
    foreach ( $address as $field => $value ) {
        foreach ( $po_box_patterns as $pattern ) {
            if ( preg_match( $pattern, $value ) ) {
                $errors->add( 'validation', __( 'Sorry, we do not ship to PO Boxes. Please provide a valid street address.', 'woocommerce' ) );
                return;
            }
        }
    }
}
function rs24_validate_no_po_box( $posted ) {
    $address = [
        'billing_address_1' => isset( $posted['billing_address_1'] ) ? $posted['billing_address_1'] : '',
        'billing_address_2' => isset( $posted['billing_address_2'] ) ? $posted['billing_address_2'] : '',
        'shipping_address_1' => isset( $posted['shipping_address_1'] ) ? $posted['shipping_address_1'] : '',
        'shipping_address_2' => isset( $posted['shipping_address_2'] ) ? $posted['shipping_address_2'] : '',
    ];

    $errors = new WP_Error();
    rs24_restrict_po_box_in_checkout_fields( $address, $errors );

    if ( ! empty( $errors->errors ) ) {
        wc_add_notice( $errors->get_error_message(), 'error' );
    }
}

add_action( 'woocommerce_after_checkout_validation', 'rs24_validate_no_po_box', 10, 2 );
