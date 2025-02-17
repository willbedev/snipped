<?php
/**
 * Crea un oggetto JSON con i dati del form di Gravity Forms e lo salva in localStorage.
 *
 * @param [type] $entry
 * @param object $form
 * @return void
 */
function set_localstorage_gravity( $entry, $form ) {
	// Create an associative array for the entry data with labels as keys.
	$entry_with_labels = array();

	// Loop through each field in the form.
	foreach ( $form['fields'] as $field ) {
		$field_id    = $field->id; // Get the field ID.
		$field_label = 'field_' . $field->formId . '_' . $field_id; // Get the field label.

		// If the entry has a value for this field, add it to the new array.
		if ( isset( $entry[ $field_id ] ) ) {
			$entry_with_labels[ $field_label ] = $entry[ $field_id ];
		}
	}

	// Log the entry and form data as JSON.
	// $entry_json = json_encode( $entry );.
	// $form_json = json_encode( $form );.

	// Convert the new entry data to JSON.
	$entry_json = json_encode( $entry_with_labels );

	// Log to error log for debugging.
	// error_log( 'Entry Data: ' . $entry_json );
	?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var gformData = <?php echo $entry_json; ?>;

			// Remove the existing 'gFormData' from localStorage
			localStorage.removeItem('gFormData');

			// Store the new gformData in localStorage as a JSON string
			localStorage.setItem('gFormData', JSON.stringify(gformData));

			// You can now use gformData in your JavaScript
			console.log("Entry Data:", gformData);
		});
	</script>
	<?php
}
add_action( 'gform_after_submission', 'set_localstorage_gravity', 10, 2 );
