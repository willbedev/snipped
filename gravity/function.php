// filtro mail 

add_filter( 'gform_field_validation_4_37', 'validate_email', 10, 4 );
function validate_email( $result, $value, $form, $field ) {
	$pattern = "/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+.)?[a-zA-Z]+.)?(arcese.com|ventanaserra.com|willbecreative.com|arcese+-+cosulich.ie)$/";
	if ( $field->type == 'email' && $field->emailFormat != 'standard' && ! preg_match( $pattern, $value ) ) {
		$result['is_valid'] = false;
		$result['message'] = _('Inserire una email valida','traduzioni');
	}
	return $result;
}
