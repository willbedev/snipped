/* fu functions php abilita */

add_filter('wpml_user_can_translate', function ($user_can_translate, $user){
    if (in_array('editor', (array) $user->roles, true) && current_user_can('translate')) {
        return true;
    }
       
    return $user_can_translate;
}, 10, 2);