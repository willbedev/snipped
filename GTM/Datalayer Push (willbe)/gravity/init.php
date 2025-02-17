<?php

/**
 * Carica CSS e JS del form gravity.
 *
 * @return void
 */

 function gravity_enqueue_styles_scripts() {

// script per la gestione del dataLayer.
wp_enqueue_script( 'gtm-data-layer-gravity-form', get_stylesheet_directory_uri() . '/gravity/inc/js/gtm_data_layer_gravity_forms.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'gravity_enqueue_styles_scripts' );
// ----------------------------------------------------------------------------------------
// HELPERS
// ----------------------------------------------------------------------------------------
include_once 'inc/helpers/helpers.php';
include_once 'inc/helpers/helper-after-submit.php';