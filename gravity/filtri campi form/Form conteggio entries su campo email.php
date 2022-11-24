// Conteggio delle entries duplicate 

add_filter( 'gform_field_validation_44_56', 'custom_validation_adesioni', 10, 4 );
function custom_validation_adesioni ( $result, $value, $form, $field ) {
  
    if ( $result['is_valid']) {
      $search_criteria['field_filters'][] = array( 'key' => '56', 'value' => $value );  /* 56 id field email da controllare */ 
      $entries = GFAPI::count_entries(44,$search_criteria); /* 44 è il numero id della form */
     
        if($entries != 0){
          $result['is_valid'] = false;
          $result['message'] = 'email gia inserita';
        }
    }
    var_dump($entries);
    return $result;
}
