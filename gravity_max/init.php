<?php

/**
 * Carica CSS e JS del form gravity.
 *
 * @return void
 */
function gravity_enqueue_styles_scripts() {
	// Font-awesome.
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), '', 'all' );

	// Regole generali per gravity form.
	wp_enqueue_style( 'gf-custom-general', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-general.css', array(), '1.0.0', 'all' );

	// style01 -> willbecreative.com.
	// wp_enqueue_style( 'gf-custom-style01', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style01.css', array(), '1.0.0', 'all' );

	// se vuoi aggiungere uno stile nella pagina specifica commentare sopra e decommentare il codice sottostante.
	// slug / slug-2 sono gli slug della pagina.
	/*
	if ( ! is_page ( 'lavora-con-noi' ) || ! is_page ( 'chi-siamo' ) ) {
		wp_enqueue_style( 'gf-custom-style01', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style01.css', array(), '1.0.0', 'all' );
	} else {
		wp_enqueue_style( 'gf-custom-style01', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style-alternative.css', array(), '1.0.0', 'all' );
	}
	*/

	// style02 -> advenias.care/.
	wp_enqueue_style( 'gf-custom-style02', get_stylesheet_directory_uri() . '/gravity/inc/assets/gf-custom-style02.css', array(), '1.0.0', 'all' );

	wp_register_script( 'gf-custom-script', get_stylesheet_directory_uri() . '/gravity/inc/js/gf-custom-script.js', array( 'jquery' ), '1.0.0', true );

	wp_localize_script(
		'gf-custom-script',
		'ajax_edit_form',
		array(
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'security' => wp_create_nonce( 'edit-form-nonce' ),
		)
	);

	wp_enqueue_script( 'gf-custom-script' );
}
add_action( 'wp_enqueue_scripts', 'gravity_enqueue_styles_scripts' );

// ----------------------------------------------------------------------------------------
// HELPERS
// ----------------------------------------------------------------------------------------
include_once 'inc/helpers/helpers.php';
