function stampa_numero_entries_dentro_field($choice_markup, $choice, $field, $value ){
 


 if ( $field->get_input_type() == 'radio' && rgar( $choice, 'text' ) == 'Prima scelta' ) {
       $search_criteria['field_filters'][] = array( 'key' => '18', 'value' => 'Prima scelta' );
       $entries = GFAPI::count_entries(2,$search_criteria);
       if($entries == 2){
         $choice_markup = str_replace( "type='radio'", "type='radio' disabled", $choice_markup );
       }
       $choice_markup.= "Numero Entries:".$entries."<br>";
 }

 if ( $field->get_input_type() == 'radio' && rgar( $choice, 'text' ) == 'Seconda scelta' ) {
       $search_criteria['field_filters'][] = array( 'key' => '18', 'value' => 'Seconda scelta' );
       $entries = GFAPI::count_entries(2,$search_criteria);
         if($entries == 2){
        $choice_markup = str_replace( "type='radio'", "type='radio' disabled", $choice_markup );
       }
       $choice_markup.= "Numero Entries:".$entries."<br>";
 }

 if ( $field->get_input_type() == 'radio' && rgar( $choice, 'text' ) == 'Terza scelta' ) {
       $search_criteria['field_filters'][] = array( 'key' => '18', 'value' => 'Terza scelta' );
       $entries = GFAPI::count_entries(2,$search_criteria);
         if($entries == 2){
         return str_replace( "type='radio'", "type='radio' disabled", $choice_markup );
       }
       $choice_markup.= "Numero Entries:".$entries."<br>";
 }

 

  return $choice_markup;
 
}

add_filter( 'gform_field_choice_markup_pre_render_2_18', 'stampa_numero_entries_dentro_field', 10, 4 );