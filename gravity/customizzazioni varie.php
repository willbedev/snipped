// tiutto in functions.php_check_syntax

/* disabilita campi obbligatori */
add_filter( 'gform_required_legend', '__return_empty_string' );