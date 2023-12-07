<?php
/**
 * Utility per Gravity Form.
 *
 * Author: Massimiliano Canzonieri
 */

/**
 * Questo filtro può essere usato per aggiungere/rimuovere CSS ai fields e/o per aggiungere elementi ad un fields come nel caso del select.
 *
 * @param string $classes The CSS classes to be filtered, separated by empty spaces, (i.e. “gfield custom_class”).
 * @param object $field   Current field.
 * @param object $form    Current form.
 * @return $classes
 *
 * @version 1.0.0
 */
function custom_class( $classes, $field, $form ) {
	$italian_provinces = array(
		array( 'value' => 'AG', 'text' => 'Agrigento' ),
		array( 'value' => 'AL', 'text' => 'Alessandria' ),
		array( 'value' => 'AN', 'text' => 'Ancona' ),
		array( 'value' => 'AO', 'text' => 'Aosta' ),
		array( 'value' => 'AR', 'text' => 'Arezzo' ),
		array( 'value' => 'AP', 'text' => 'Ascoli Piceno' ),
		array( 'value' => 'AT', 'text' => 'Asti' ),
		array( 'value' => 'AV', 'text' => 'Avellino' ),
		array( 'value' => 'BA', 'text' => 'Bari' ),
		array( 'value' => 'BT', 'text' => 'Barletta-Andria-Trani' ),
		array( 'value' => 'BL', 'text' => 'Belluno' ),
		array( 'value' => 'BN', 'text' => 'Benevento' ),
		array( 'value' => 'BG', 'text' => 'Bergamo' ),
		array( 'value' => 'BI', 'text' => 'Biella' ),
		array( 'value' => 'BO', 'text' => 'Bologna' ),
		array( 'value' => 'BZ', 'text' => 'Bolzano' ),
		array( 'value' => 'BS', 'text' => 'Brescia' ),
		array( 'value' => 'BR', 'text' => 'Brindisi' ),
		array( 'value' => 'CA', 'text' => 'Cagliari' ),
		array( 'value' => 'CL', 'text' => 'Caltanissetta' ),
		array( 'value' => 'CB', 'text' => 'Campobasso' ),
		array( 'value' => 'CI', 'text' => 'Carbonia-Iglesias' ),
		array( 'value' => 'CE', 'text' => 'Caserta' ),
		array( 'value' => 'CT', 'text' => 'Catania' ),
		array( 'value' => 'CZ', 'text' => 'Catanzaro' ),
		array( 'value' => 'CH', 'text' => 'Chieti' ),
		array( 'value' => 'CO', 'text' => 'Como' ),
		array( 'value' => 'CS', 'text' => 'Cosenza '),
		array( 'value' => 'CR', 'text' => 'Cremona' ),
		array( 'value' => 'KR', 'text' => 'Crotone' ),
		array( 'value' => 'CN', 'text' => 'Cuneo' ),
		array( 'value' => 'EN', 'text' => 'Enna' ),
		array( 'value' => 'FM', 'text' => 'Fermo' ),
		array( 'value' => 'FE', 'text' => 'Ferrara' ),
		array( 'value' => 'FI', 'text' => 'Firenze' ),
		array( 'value' => 'FG', 'text' => 'Foggia' ),
		array( 'value' => 'FC', 'text' => 'Forlì-Cesena' ),
		array( 'value' => 'FR', 'text' => 'Frosinone' ),
		array( 'value' => 'GE', 'text' => 'Genova' ),
		array( 'value' => 'GO', 'text' => 'Gorizia' ),
		array( 'value' => 'GR', 'text' => 'Grosseto' ),
		array( 'value' => 'IM', 'text' => 'Imperia' ),
		array( 'value' => 'IS', 'text' => 'Isernia' ),
		array( 'value' => 'SP', 'text' => 'La Spezia' ),
		array( 'value' => 'AQ', 'text' => 'L`Aquila' ),
		array( 'value' => 'LT', 'text' => 'Latina' ),
		array( 'value' => 'LE', 'text' => 'Lecce' ),
		array( 'value' => 'LC', 'text' => 'Lecco' ),
		array( 'value' => 'LI', 'text' => 'Livorno' ),
		array( 'value' => 'LO', 'text' => 'Lodi' ),
		array( 'value' => 'LU', 'text' => 'Lucca' ),
		array( 'value' => 'MC', 'text' => 'Macerata' ),
		array( 'value' => 'MN', 'text' => 'Mantova' ),
		array( 'value' => 'MS', 'text' => 'Massa-Carrara' ),
		array( 'value' => 'MT', 'text' => 'Matera' ),
		array( 'value' => 'ME', 'text' => 'Messina' ),
		array( 'value' => 'MI', 'text' => 'Milano' ),
		array( 'value' => 'MO', 'text' => 'Modena' ),
		array( 'value' => 'MB', 'text' => 'Monza e della Brianza' ),
		array( 'value' => 'NA', 'text' => 'Napoli' ),
		array( 'value' => 'NO', 'text' => 'Novara' ),
		array( 'value' => 'NU', 'text' => 'Nuoro' ),
		array( 'value' => 'OT', 'text' => 'Olbia-Tempio' ),
		array( 'value' => 'OR', 'text' => 'Oristano' ),
		array( 'value' => 'PD', 'text' => 'Padova' ),
		array( 'value' => 'PA', 'text' => 'Palermo' ),
		array( 'value' => 'PR', 'text' => 'Parma' ),
		array( 'value' => 'PV', 'text' => 'Pavia' ),
		array( 'value' => 'PG', 'text' => 'Perugia' ),
		array( 'value' => 'PU', 'text' => 'Pesaro e Urbino' ),
		array( 'value' => 'PE', 'text' => 'Pescara' ),
		array( 'value' => 'PC', 'text' => 'Piacenza' ),
		array( 'value' => 'PI', 'text' => 'Pisa' ),
		array( 'value' => 'PT', 'text' => 'Pistoia' ),
		array( 'value' => 'PN', 'text' => 'Pordenone' ),
		array( 'value' => 'PZ', 'text' => 'Potenza' ),
		array( 'value' => 'PO', 'text' => 'Prato' ),
		array( 'value' => 'RG', 'text' => 'Ragusa' ),
		array( 'value' => 'RA', 'text' => 'Ravenna' ),
		array( 'value' => 'RC', 'text' => 'Reggio Calabria' ),
		array( 'value' => 'RE', 'text' => 'Reggio Emilia' ),
		array( 'value' => 'RI', 'text' => 'Rieti' ),
		array( 'value' => 'RN', 'text' => 'Rimini' ),
		array( 'value' => 'RM', 'text' => 'Roma' ),
		array( 'value' => 'RO', 'text' => 'Rovigo' ),
		array( 'value' => 'SA', 'text' => 'Salerno' ),
		array( 'value' => 'VS', 'text' => 'Medio Campidano' ),
		array( 'value' => 'SS', 'text' => 'Sassari' ),
		array( 'value' => 'SV', 'text' => 'Savona' ),
		array( 'value' => 'SI', 'text' => 'Siena' ),
		array( 'value' => 'SR', 'text' => 'Siracusa' ),
		array( 'value' => 'SO', 'text' => 'Sondrio' ),
		array( 'value' => 'TA', 'text' => 'Taranto' ),
		array( 'value' => 'TE', 'text' => 'Teramo' ),
		array( 'value' => 'TR', 'text' => 'Terni' ),
		array( 'value' => 'TO', 'text' => 'Torino' ),
		array( 'value' => 'OG', 'text' => 'Ogliastra' ),
		array( 'value' => 'TP', 'text' => 'Trapani' ),
		array( 'value' => 'TN', 'text' => 'Trento' ),
		array( 'value' => 'TV', 'text' => 'Treviso' ),
		array( 'value' => 'TS', 'text' => 'Trieste' ),
		array( 'value' => 'UD', 'text' => 'Udine' ),
		array( 'value' => 'VA', 'text' => 'Varese' ),
		array( 'value' => 'VE', 'text' => 'Venezia' ),
		array( 'value' => 'VB', 'text' => 'Verbano-Cusio-Ossola' ),
		array( 'value' => 'VC', 'text' => 'Vercelli' ),
		array( 'value' => 'VR', 'text' => 'Verona' ),
		array( 'value' => 'VV', 'text' => 'Vibo Valentia' ),
		array( 'value' => 'VI', 'text' => 'Vicenza' ),
		array( 'value' => 'VT', 'text' => 'Viterbo' ),
	);

	if ( 'select' === $field->type ) {
		$new_value = array(
			'text'       => '',
			'value'      => '',
			'isSelected' => false,
			// 'price'      => '',
		);
		if ( '' !== $field->choices[0]['text'] ) {
			array_unshift( $field->choices, $new_value ); // aggiunge il nuovo valore $new_value alla scelta dropdown della select in prima pos.
		}

		// Se è presente una select con nome 'Provincia di residenza' viene aggiunto l'array contenente le province italiane.
		if ( 'Provincia di residenza' === $field->label ) {
			foreach ( $italian_provinces as $province ) {
				array_push( $field->choices, $province );
			}
		}
		// $classes .= ' select-focused'; // aggiunge una nuova classe.
	}
	return $classes;
}
add_filter( 'gform_field_css_class', 'custom_class', 10, 3 );

/**
 * This filter is executed when the form is displayed and can be used to completely change the form button tag.
 *
 * @param string $button - Contains the <input> tag to be filtered.
 * @param object $form   - Contains all the properties of the current form.
 *
 * @return string The filtered button.
 *
 * @version 1.0.0
 */
function add_paragraph_below_submit( $button, $form ) {
	return $button;
	// return "<p class='required-text'>* campi obbligatori</p>" . $button;.

	// se si vuole l'icona all'interno del btn submit, commentare la riga sopra e decommentare questa.
	// return "<p class='required-text' style='width: 100%;'>* campi obbligatori</p>" . "<div style='width: 100%; text-align: end;'>" . $button . "</div>";.
}
add_filter( 'gform_submit_button', 'add_paragraph_below_submit', 10, 2 );

/**
 * Filtro utilizzato per inserire script nel footer, agisce quando il form è inizializzato e presente nella pagina.
 * Questo script inserisce una icona per i pulsanti di caricamento.
 *
 * @param string $form_string  - A string of the scripts used in the footer.
 * @param object $form         - The current form.
 * @param int    $current_page - The ID of the current page.
 *
 * @return string $form_string
 *
 * @version 1.0.0
 */
function custom_script( $form_string, $form, $current_page ) {
	$form_string .= "
		<script type='text/javascript'>
		jQuery(document).bind( 'gform_post_render',
			function( event, formId, currentPage ) {
				if ( jQuery('form[id^=gform_] .gform-body.gform_body p').length === 0 ) {
					jQuery('form[id^=gform_] .gform-body.gform_body').append('<p style=\"float:right;font-size:1rem;\">* campi obbligatori</p>');
				}
				if ( jQuery('.gfield.gfield--type-fileupload').is(':visible') ) {
					console.log( jQuery('.gfield.gfield--type-fileupload > .ginput_container.ginput_container_fileupload i.fa.fa-upload').length );
					if ( jQuery('.gfield.gfield--type-fileupload > .ginput_container.ginput_container_fileupload i.fa.fa-upload').length === 0 ) {
						jQuery('.gfield.gfield--type-fileupload > .ginput_container.ginput_container_fileupload').append('<i class=\'fa fa-upload\' aria-hidden=\'true\'></i>');
					}
				}
			}
		);
		</script>";
	return $form_string;
}
add_filter( 'gform_footer_init_scripts_filter', 'custom_script', 10, 3 );

/**
 * Modifica la visualizzazione dei messaggi di errore.
 * Viene tradotto in inglese il messaggio di errore per l'indirizzo email.
 * Il messaggio viene tradotto se è presente WPML e la sua variabile globale ICL_LANGUAGE_CODE.
 *
 * @param array  $result - The result array. // C'è stato un problema con il tuo invio. Verifica i campi qui sotto.
 * @param string $value  - The value of the field.
 * @param array  $form   - The Gravity Form array.
 * @param object $field  - The form field object.
 *
 * @return array  The result array.
 *
 * @version 1.0.0
 */
function change_validation_error_message( $result, $value, $form, $field ) {
	// error_log( $field->get_input_type() );.
	if ( 'email' === $field->get_input_type() ) {
		if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
			if ( 'en' === ICL_LANGUAGE_CODE ) :
				$result['message'] = 'Please enter a valid email address';
			else :
				$result['message'] = 'Inserire un’indirizzo email valido';
			endif;
		} else {
			$result['message'] = 'si prega di fornire un indirizzo email valido';
		}
	}

	return $result;
}
add_filter( 'gform_field_validation', 'change_validation_error_message', 10, 4 );

/**
 * Permette di inserire un messaggio/testo nell'email che viene inviata all'utente.
 *
 * @version 1.0.0
 */
add_filter(
	'gform_pre_send_email',
	function ( $email, $message_format, $notification, $entry ) {
		/*if ( $message_format != 'html' ) {
			return $email;
		}*/
		// $entryid = rgar( $entry, 'id' );

		if ( 'User notification' === $notification['name'] || 'Notifica utente' === $notification['name'] ) {
			$email['message'] = '<html>' . $email['message'] . '<p>Se vuoi modificare le tue informazioni <a href="' . get_site_url() . '/modify/?fid=' . $entry['form_id'] . '&email=' . $notification['to'] . '&feid=' . $entry['id'] . '">clicca qui</a></p></html>';
		}
		return $email;
	},
	10,
	4
);

/**
 * Shortcode per la modifica delle informazioni di un form compilato dall'utente.
 * Lo shortcode leggere i parametri fid (ID form), email (USER email ID), feid (ENTITY ID form) che vengono passati dall'url inserito
 * nell'email con la funzione gform_pre_send_email.
 *
 * @version 1.1.0
 *
 * @return mixed struttura html form con informazioni utente.
 */
function get_user_information() {
	ob_start();
	if ( isset( $_GET['fid'] ) && isset( $_GET['email'] ) && isset( $_GET['feid'] ) ) {
		$form_id    = $_GET['fid']; // phpcs:ignore
		$user_email = $_GET['email']; // phpcs:ignore
		$entry_id   = $_GET['feid']; // phpcs:ignore

		global $wpdb;
		$table_name = $wpdb->prefix . 'gf_entry_meta';

		$query   = $wpdb->prepare( "SELECT * FROM $table_name WHERE `form_id` = $form_id AND `entry_id` = $entry_id" );
		$results = $wpdb->get_results( $query );

		global $wpdb;
		$table_name_form = $wpdb->prefix . 'gf_form_meta';

		$query_form  = $wpdb->prepare( "SELECT display_meta FROM $table_name_form WHERE `form_id` = $form_id" );
		$result_form = $wpdb->get_results( $query_form  );

		// GFEntryDetail::lead_detail_grid( $form, $entry );.

		$arr_data = array();
		foreach ( $results as $result ) {
			// get the field.
			array_push( $arr_data, array( $result->meta_key, $result->meta_value ) );
		}

		// Separate each entry inside a form element so radio buttons don't get treated as a single group across multiple entries.
		$entry = GFAPI::get_entry( $entry_id );

		$form_exist = GFAPI::form_id_exists( $form_id );
		if ( $form_exist ) {
			$form  = GFAPI::get_form( $form_id );

			/*echo '<pre>';
			var_dump( $form['fields'][1] );
			echo '</pre>';*/

			echo '<div class="gform_wrapper gravity-theme">';

			if ( '' !== $form['title'] || '' !== $form['description'] ) {
				echo '<div class="gform_heading">';
				if ( '' !== $form['title'] ) {
					echo '<h2 class="gform_title">' . esc_attr( $form['title'] ) . '</h2>';
				}
				if ( '' !== $form['description'] ) {
					echo '<p class="gform_description">' . esc_attr( $form['description'] ) . '</p>';
				}
				echo '</div>';
			}

			echo '<form method="post" enctype="multipart/form-data" id="edit-form" data-formid="' . esc_attr( $form['id'] ) . '">';
			foreach ( $form['fields'] as $field ) {
				$content = $field->content;

				if ( $field['isRequired'] ) {
					$span = '<span class="gfield_required">*</span>';
				} else {
					$span = '<span></span>';
				}
				$value = '';

				if ( 'text' === $field->type ) {
					foreach ( $arr_data as $data ) {
						if ( in_array( $field->id, $data ) ) {
							$value = $data[1];
						}
					}

					$dimension_field = '';
					if ( 'large' === $field['size'] ) {
						$dimension_field = 'gfield--width-full';
					} elseif ( 'medium' === $field['size'] ) {
						$dimension_field = 'medium';
					}

					$description_placement      = ( $field['descriptionPlacement'] ) ? $field['descriptionPlacement'] : '';
					$description_value          = ( $field['description'] ) ? $field['description'] : '';
					$class_has_description      = '';
					if ( '' === $description_value ) {
						$class_has_description = ' gfield--no-description';
					} else {
						$class_has_description = ' gfield--has-description';
					}
					if ( 'above' === $description_placement || '' === $description_placement ) {
						$class_position_description = ' field_description_above';
					} else {
						$class_position_description = ' field_description_below';
					}

					$label_placement = ( $field['labelPlacement'] ) ? $field['labelPlacement'] : '';
					$class_label     = '';
					if ( '' !== $label_placement ) {
						$class_label = ' ' . $label_placement;
					}

					$visibility       = ( $field['visibility'] ) ? $field['visibility'] : '';
					$class_visibility = '';
					if ( '' !== $visibility ) {
						$class_visibility = ' gfield_visibility_' . $visibility;
					}

					echo '<div
						id="' . esc_attr( 'field_' . $field['formId'] . '_' . $field['id'] ) . '"class="gfield ' . esc_attr( 'gfield--type-' . $field['type'] ) . ' gfield--width-full field_sublabel_above' . esc_attr( $class_has_description ) . esc_attr( $class_position_description ) . esc_attr( $class_label ) . esc_attr( $class_visibility ) . '">';

					echo '<legend class="gfield_label gform-field-label" for="' . esc_attr( 'input_' . $field['formId'] . '_' . $field['id'] ) . '">' . esc_attr( $field->label ) . ' ' . $span . '</legend>';

					if ( 'above' === $description_placement ) {
						echo '<div class="gfield_description" id="' . esc_attr( 'gfield_description_' . $field['formId'] . '_' . $field['id'] ) . '">' . esc_html( $description_value ) . '</div>';
					}

					echo '<div class="ginput_container ginput_container_text">';
					$aria_required = ( $field['isRequired'] ) ? ' aria-required="true" ' : '';

					echo '<input name="' . esc_attr( 'input_' . $field['id'] ) . '" id="' . esc_attr( 'input_' . $field['formId'] . '_' . $field['id'] ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . $value . '" class="' . esc_attr( $field->size ) . '"' . $aria_required . 'aria-invalid="false">';
					echo '</div>';

					if ( 'below' === $description_placement ) {
						echo '<div class="gfield_description" id="' . esc_attr( 'gfield_description_' . $field['formId'] . '_' . $field['id'] ) . '">' . esc_html( $description_value ) . '</div>';
					}

					echo '</div>';
				}

				if ( 'textarea' === $field->type ) {
					foreach ( $arr_data as $data ) {
						if ( in_array( $field->id, $data ) ) {
							$value = $data[1];
						}
					}
					echo '<div>';
					echo '<label>' . $field->label . ' ' . $span . '</label>';
					echo '<textarea id="' . $field->id . '" type="' . $field->type . '" class="' . $field->size . '" placeholder="' . $field->placeholder . '">' . $value . '</textarea>';
					echo '</div>';
				}

				if ( 'radio' === $field->type ) {

					echo '<div>';
						echo '<legend>' . $field->label . ' ' . $span . '</legend>';
						echo '<div id="' . $field->id . '" class="gfield_radio" style="display:flex; flex-direction: row; flex-wrap: wrap;">';
						//echo '<input id="' . $field->id . '" type="' . $field->type . '" value="' . $value . '" class="' . $field->size . '">';
						foreach ( $field->choices as $choise ) {
							$is_selected = '';

							foreach ( $arr_data as $data ) {
								if ( $choise['value'] === $data[1] && $field->id === (int) $data[0] ) {
									$is_selected = 'checked';
									break;
								}
							}
							echo '<div class="gchoice" style="width:auto; margin-left: 15px">';
								echo '<input name="' . $choise['text'] . '" type="radio" value="' . $choise['value'] . '" ' . $is_selected . '>';
								echo '<label style="padding-left: 5px;">' . $choise['value'] . '</label>';
							echo '</div>';
						}
						echo '</div>';
					echo '</div>';
				}

				/*if ( 'date' === $field->type ) {
					echo '<div>';
						echo '<label>' . $field->label . ' ' . $span . '</label>';
						echo '<div class="gfield_radio" style="display:flex; flex-direction: row; flex-wrap: wrap;">';
						//echo '<input id="' . $field->id . '" type="' . $field->type . '" value="' . $value . '" class="' . $field->size . '">';
						foreach ( $field->choices as $choise ) {
							$is_selected = '';
							if ( $choise->isSelected ) {
								$is_selected = 'checked';
							}
							echo '<div class="gchoice" style="width:auto; margin-left: 15px">';
								echo '<input name="' . $choise['text'] . '" type="radio" value="' . $choise['value'] . '" ' . $is_selected . '>';
								echo '<label style="padding-left: 5px;">' . $choise['value'] . '</label>';
							echo '</div>';
						}
						echo '</div>';
					echo '</div>';
				}*/

				if ( 'checkbox' === $field->type ) {
					if ( 'Privacy' === $field->label ) {
						break;
					}

					echo '<div>';
						echo '<legend>' . $field->label . ' ' . $span . '</legend>';
						echo '<div class="ginput_container ginput_container_checkbox">';
							echo '<div class="gfield_checkbox">';
								echo '<div id="' . $field->id . '" class="gchoice">';
									//echo '<input id="' . $field->id . '" type="' . $field->type . '" value="' . $value . '" class="' . $field->size . '">';
									foreach ( $field->choices as $index => $choise ) {
										// var_dump( $field->inputs[$index]['id'] );

										$is_selected = '';
										foreach ( $arr_data as $data ) {
											if ( $choise['value'] === $data[1] ) {
												$is_selected = 'checked="checked"';
												break;
											}
										}

										echo '<input class="gfield-choice-input" id="' . $field->inputs[$index]['id'] . '" name="' . htmlentities( $choise['value'] ) . '" type="checkbox" value="' . htmlentities( $choise['value']  ) . '" ' . $is_selected . '">';
										echo '<label style="padding-left: 5px;">' . $choise['value'] . '</label>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}

				if ( 'select' === $field->type ) {
					echo '<div>';
						echo '<legend>' . $field->label . ' ' . $span . '</legend>';
						echo '<div class="ginput_container ginput_container_select">';
							echo '<select id="' . $field->id . '">';
								echo '<option value=""></option>';

								foreach ( $field->choices as $choise ) {
									$is_selected = '';
									foreach ( $arr_data as $index => $data ) {

										if ( $data[0] === '63' ) {
											var_dump( $data[0], $field->id === (int) $data[0] );
											var_dump( $choise['value'], $data[1] );
										}

										/*echo '<pre>';
										var_dump( $field->id, (int) $data[0] , $field->id === (int) $data[0] );
										echo '</pre>';*/

										if ( $choise['value'] === $data[1] && $field->id === (int) $data[0] ) {
											$is_selected = 'selected="selected"';
											break;
										}
									}
									echo '<option value="' . $choise['value'] . '" ' . $is_selected . '">' . $choise['value'] . '</option>';
								}
							echo '</select>';
						echo '</div>';
					echo '</div>';
				}
			}
			// var_dump( $arr_data );.
			$string = array();
			$string['fid']  = $form_id;
			$string['feid'] = $entry_id;
			foreach ( $arr_data as $index => $data ) {
				$string[$index] = array( $data[0], $data[1] );
			}
			echo '<input type="hidden" id="results" data-results =\'' . json_encode( $string ) . '\' >';
			echo '<input type="button" id="edit-form-submit-modify" value="Invia">';
			echo '</form>';

			echo '</div>';
		}

		/*echo '<form>';
		GFEntryDetail::lead_detail_grid( $form, $entry );
		echo '</form>';*/
	} elseif ( isset( $_GET['msg'] ) ) {
		echo '<p>I tuoi dati sono stati aggiornati con successo</p>';
	} else {
		echo '<p>Attenzione! impossibile recuperare le informazioni, rivolgersi all\'amministratore</p>';
	}
	return ob_get_clean();
}
add_shortcode( 'edit_form', 'get_user_information' );

/**
 * Funzione ajax richiamata in gf-custom-script.js da $( '#edit-form-submit-modify' ).on( 'click', function(e).
 * Questa funzione riceve le informazioni del form e aggiorna i meta del form che si sta modificando.
 * Invia inoltre una notifica all'utente con la funzione send_notifications.
 *
 * @version 1.0.0
 *
 * @return json messaggio di ritorno in formato json.
 */
function editform_ajax() {

	// check_ajax_referer( 'sct_nonce_key', 'security' );

	// verifico che il codice casuale passato sia corretto.
	// if ( ! wp_verify_nonce( $_POST['_nonce'], 'edit-form-nonce' ) ) {.
		// die( 'non autorizzato' );.
	// }.

	if ( isset( $_POST['data'] ) ) {
		$form_id  = $_POST['data']['fid'];
		$entry_id = $_POST['data']['feid'];

		foreach ( $_POST['data'] as $index => $data ) {
			if ( strpos( $data[0], '\\' ) ) {
				$data[0] = str_replace( '\\', '', $data[0] );
			}

			if ( ! is_string( $data ) ) {
				gform_update_meta( $entry_id, $data[0], $data[1], $form_id );
			}
		}
		send_notifications( $form_id, $entry_id );

		$return = array(
			'message'  => 'success',
		);
		echo wp_send_json( $return );
	}
	exit( 0 );
}
add_action( 'wp_ajax_editform', 'editform_ajax' );
add_action( 'wp_ajax_nopriv_editform', 'editform_ajax' );

/**
 * Invia notifica all'utente se la modifica del form è andata a buon fine.
 *
 * @param int $form_id  - Form ID.
 * @param int $entry_id - Entity form ID.
 * @return void
 *
 * @version 1.0.0
 */
function send_notifications( $form_id, $entry_id ) {

	// Get the array info for our forms and entries.
	// that we need to send notifications for.

	$form  = RGFormsModel::get_form_meta( $form_id );
	$entry = RGFormsModel::get_lead( $entry_id );

	// Loop through all the notifications for the.
	// form so we know which ones to send.

	$notification_ids = array();

	foreach ( $form['notifications'] as $id => $info ) {
		array_push( $notification_ids, $id );
	}

	// Send the notifications.
	GFCommon::send_notifications( $notification_ids, $form, $entry );
}
