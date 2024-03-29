// filtro mail con lista domini gestiti da regex

add_filter( 'gform_field_validation_4_37', 'validate_email', 10, 4 );  /* 4_37 corrisponde a ID 4 e field 37 */ 
function validate_email( $result, $value, $form, $field ) {
	$pattern = "/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+.)?[a-zA-Z]+.)?(arcese.com|ventanaserra.com|willbecreative.com|arcese+-+cosulich.ie)$/";
	if ( $field->type == 'email' && $field->emailFormat != 'standard' && ! preg_match( $pattern, $value ) ) {
		$result['is_valid'] = false;
		$result['message'] = __('Inserire una email valida','traduzioni');
	}
	return $result;
}
