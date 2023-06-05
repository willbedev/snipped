//add_filter( 'gform_submit_button_36', '__return_false' );
// 36 è il numero della form

add_action( 'gform_print_entry_footer_36', 'custom_footer', 10, 2 );
function custom_footer( $form, $entry ) {
   echo "<small>Vuoi inviare la tua candidatura in un secondo momento? Utlizza la funziona salva e continua.</small>";
}
