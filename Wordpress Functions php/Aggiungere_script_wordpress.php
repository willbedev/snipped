<?
//Per aggiungere un nuovo script o stile in wordpress 

function my_scripts()
{

    // or
    // Register the script like this for a theme:
    wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/js/custom.js' );
 
    // For either a plugin or a theme, you can then enqueue the script:
   wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
