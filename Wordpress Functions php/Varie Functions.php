
/** * Enables the HTTP Strict Transport Security (HSTS) header. */
add_action( 'send_headers', 'strict_transport_security' );
function strict_transport_security() {
    header( 'Strict-Transport-Security: max-age=10886400; includeSubDomains; preload' );
}