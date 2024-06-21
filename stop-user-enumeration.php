// Hook into 'init' action to intercept requests early
add_action('init', 'rs24_stop_user_enumeration');
function rs24_stop_user_enumeration() {
    // Check if the request is trying to enumerate users
    if (rs24_is_user_enumeration_request()) {
        // Block the request by sending a 403 Forbidden response
        wp_die('User enumeration is not allowed.', 'Forbidden', array('response' => 403));
    }
}
function rs24_is_user_enumeration_request() {
    // Check for author archive pages
    if (is_author()) {
        return true;
    }

    // Check for ?author=N queries
    if (!empty($_GET['author'])) {
        return true;
    }

    // Check for REST API user endpoint access
    $request_uri = $_SERVER['REQUEST_URI'];
    if (preg_match('/\/wp-json\/wp\/v2\/users/', $request_uri)) {
        return true;
    }

    return false;
}
