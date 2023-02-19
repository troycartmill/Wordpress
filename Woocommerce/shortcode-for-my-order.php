function shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count
    ) );
    return ob_get_clean();
}
add_shortcode('my_orders', 'shortcode_my_orders');
