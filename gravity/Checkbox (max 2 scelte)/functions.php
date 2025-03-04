<?php

// ** Stili e Child ** //
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');

});




// -----------------------------------------------------------------
// Gravity customization
// -----------------------------------------------------------------

function enqueue_custom_gravity_js_child() {
    wp_enqueue_script(
        'custom-gravity-js',
        get_stylesheet_directory_uri() . '/gravity/js/custom.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_gravity_js_child');




/* messaggio alternativo con controllo in modale, non necessita di JS aggiuntivo */
function limit_gravity_forms_checkboxes() {
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var checkboxes = document.querySelectorAll("#input_11_15 input[type='checkbox']");

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                var checkedCount = document.querySelectorAll("#input_11_15 input[type='checkbox']:checked").length;

                if (checkedCount > 2) {
                    this.checked = false; // Deseleziona il checkbox
                    alert("Puoi selezionare al massimo 2 opzioni.");
                }
            });
        });
    });
    </script>
    <?php
}
// add_action('wp_footer', 'limit_gravity_forms_checkboxes');