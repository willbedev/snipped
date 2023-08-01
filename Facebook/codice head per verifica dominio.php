// Add custom Meta Tag to header FB domain verification

function custom_header_metadata() {

	echo '<meta name="facebook-domain-verification" content="8egapk3pz0dnb56h8zzwofwd2hf5lk" />';
}

add_action( 'wp_head', 'custom_header_metadata' );