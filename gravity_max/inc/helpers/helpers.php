<?php

/**
 * Utility per Gravity Form.
 *
 * Author: Massimiliano Canzonieri
 */

/**
 * Questo filtro può essere usato per aggiungere/rimuovere CSS ai fields e/o per aggiungere elementi ad un fields come nel caso del select.
 *
 * @param [type] $classes
 * @param [type] $field
 * @param [type] $form
 * @return void
 */
function custom_class( $classes, $field, $form ) {
	if ( 'select' === $field->type ) {
		$new_value = array(
			'text'       => '',
			'value'      => '',
			'isSelected' => false,
			'price'      => '',
		);
		if ( '' !== $field->choices[0]['text'] ) {
			array_unshift( $field->choices, $new_value ); // aggiunge il nuovo valore $new_value alla scelta dropdown della select in prima pos.
		}
		// $classes .= ' select-focused'; // aggiunge una nuova classe.
	}
	return $classes;
}
add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );

/**
 * Aggiunge elementi html dopo il pulsante submit.
 *
 * @param [type] $button
 * @param [type] $form
 * @return void
 */
function add_paragraph_below_submit( $button, $form ) {
	return "<p class='required-text'>* campi obbligatori</p>" . $button;
}
add_filter( 'gform_submit_button', 'add_paragraph_below_submit', 10, 2 );