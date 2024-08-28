<?php

/** * Enables the HTTP Strict Transport Security (HSTS) header. */

add_action( 'send_headers', 'strict_transport_security' );
function strict_transport_security() {
    header( 'Strict-Transport-Security: max-age=10886400; includeSubDomains; preload' );
}


/* Aggiunge al Body class la categorie del Post */
/* Risorsa https://css-tricks.com/snippets/wordpress/add-category-name-body_class/ */

add_filter('body_class','add_category_to_single');
  function add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }