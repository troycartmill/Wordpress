// Function to add anti-clickjacking headers
function rs24_add_anti_clickjacking_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header("Content-Security-Policy: frame-ancestors 'self'");
}
add_action('send_headers', 'rs24_add_anti_clickjacking_headers');
