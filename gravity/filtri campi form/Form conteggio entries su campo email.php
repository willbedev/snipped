<? // Conteggio delle entries duplicate 

add_filter( 'gform_field_validation_45_56', 'custom_validation_adesioni', 10, 4 ); // 45 id form, 56 id del campo es. <input name="input_56" id="input_45_56" type="email" value="" >
function custom_validation_adesioni ( $result, $value, $form, $field ) {
  
    if ( $result['is_valid']) {
      $search_criteria['field_filters'][] = array( 'key' => '56', 'value' => $value );  /* 56 id field email da controllare */ 
      $entries = GFAPI::count_entries(45,$search_criteria); /* 45 è il numero id della form */
     
        if($entries != 0){
          $result['is_valid'] = false;
          $result['message'] = 'Registrazione già effettuata con questa email';
        }
    }
    var_dump($entries);
    return $result;
}
