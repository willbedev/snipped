<?php

/* Gravity - Abitare il tempo disabilitazione data 1 sett */

function my_custom_disable_gravity_choice() {

    // Verifica che sia il frontend
    if ( ! is_admin() ) {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
          const checkbox = document.getElementById('choice_2_33_1');
          const label = document.getElementById('label_2_33_1');

          if (checkbox && label) {
            checkbox.disabled = true;
            label.insertAdjacentHTML('beforeend', ' <span style="color:red; font-weight:bold;">(Posti esauriti)</span>');
            label.style.opacity = '0.6';
          }
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'my_custom_disable_gravity_choice');