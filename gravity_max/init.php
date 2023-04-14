<?php

/**
 * Carica CSS e JS del form gravity.
 *
 * @return void
 */
function gravity_enqueue_styles_scripts() {
	// regole generali per gravity form.
	wp_enqueue_style( 'gf-custom-general', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-general.css', array(), '1.0.0', 'all' );

	// style01 -> willbecreative.com.
	//wp_enqueue_style( 'gf-custom-style01', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style01.css', array(), '1.0.0', 'all' );

	// style02 -> advenias.care/.
	wp_enqueue_style( 'gf-custom-style02', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style02.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'gf-custom-script', get_stylesheet_directory_uri() . '/gravity/inc/js/gf-custom-script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'gravity_enqueue_styles_scripts' );

// ----------------------------------------------------------------------------------------
// HELPERS
// ----------------------------------------------------------------------------------------
include_once 'inc/helpers/helpers.php';
