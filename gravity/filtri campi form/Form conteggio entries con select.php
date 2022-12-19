/* Form con trollollo inscrizioni del 6-7 dic */
/* ----------- */
/* ----------- */

add_filter( 'gform_field_choice_markup_pre_render_4_18', 'stampa_numero_entries_dentro_field', 10, 4 );
function stampa_numero_entries_dentro_field($choice_markup, $choice, $field, $value ){
 
$disponibili=7; /* totale entries */

 if ( $field->get_input_type() == 'radio' && rgar( $choice, 'value' ) == '6 Dicembre' ) {
       $search_criteria['field_filters'][] = array( 'key' => '18', 'value' => '6 Dicembre' );
       $entries = GFAPI::count_entries(4,$search_criteria); /* nunero id della form */
       $search_criteria['field_filters'][] = array( 
        'key' => '18', 'value' => '6 Dicembre', 
        'key' => '26', 'value' => 'Si' 
      );
       $entries_duplicate = GFAPI::count_entries(4,$search_criteria);
       $entries=$entries+$entries_duplicate;
       $posti_liberi=$disponibili-$entries;
       if($entries >= $disponibili){
        $choice_markup = str_replace( "type='radio'", "type='radio' disabled", $choice_markup );
        $choice_markup.= "<span class='posti esauriti'>Posti Esauriti</span><br>";
      }
      else{
        $choice_markup.= "<span class='posti'>Numero posti disponibili: ".$posti_liberi."</span><br>";
      }
 }

 if ( $field->get_input_type() == 'radio' && rgar( $choice, 'value' ) == '7 Dicembre' ) {
      $search_criteria['field_filters'][] = array( 'key' => '18', 'value' => '7 Dicembre' );
      $entries = GFAPI::count_entries(4,$search_criteria); /* numero id della form */
      $search_criteria['field_filters'][] = array(
        'key' => '18', 'value' => '7 Dicembre',
        'key' => '26', 'value' => 'Si' );
      $entries_duplicate = GFAPI::count_entries(4,$search_criteria);
      $entries=$entries+$entries_duplicate;
      $posti_liberi=$disponibili-$entries;
      if($entries >= $disponibili){
        $choice_markup = str_replace( "type='radio'", "type='radio' disabled", $choice_markup );
        $choice_markup.= "<span class='posti esauriti'>Posti Esauriti</span><br>";
      }
      else{
        $choice_markup.= "<span class='posti'>Numero posti disponibili: ".$posti_liberi."</span><br>";
      }
  }

  return $choice_markup;
 
}

add_filter( 'gform_field_validation_4_25', 'custom_validation_4_25', 10, 4 );
function custom_validation_4_25( $result, $value, $form, $field ) {
  
    if ( $result['is_valid']) {
      $search_criteria['field_filters'][] = array( 'key' => '25', 'value' => $value );
      $entries = GFAPI::count_entries(4,$search_criteria); /* nunero id della form */
      if($entries == 0){
        $search_criteria['field_filters'][] = array( 'key' => '9', 'value' => $value );
        $entries = GFAPI::count_entries(4,$search_criteria); /* numero id della form */
        if($entries != 0){
          $result['is_valid'] = false;
          $result['message'] = 'email gia inserita';
        }
      }
      else{
        $result['is_valid'] = false;
        $result['message'] = 'email gia inserita';
      }
    }
    return $result;
}

add_filter( 'gform_field_validation_4_9', 'custom_validation_4_9', 10, 4 );
function custom_validation_4_9( $result, $value, $form, $field ) {
  
  if ( $result['is_valid']) {
    $search_criteria['field_filters'][] = array( 'key' => '25', 'value' => $value );
    $entries = GFAPI::count_entries(4,$search_criteria); /* nunero id della form */
    if($entries == 0){
      $search_criteria['field_filters'][] = array( 'key' => '9', 'value' => $value );
      $entries = GFAPI::count_entries(4,$search_criteria); /* nunero id della form */
      if($entries != 0){
        $result['is_valid'] = false;
        $result['message'] = 'email gia inserita';
      }
    }
    else{
      $result['is_valid'] = false;
      $result['message'] = 'email gia inserita';
    }
  }
  return $result;
}
