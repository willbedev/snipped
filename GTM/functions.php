*  * Insert Google Analytics Code
 * 99 to right before </head> tag */

 function hook_javascript() {

    ?> 
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WVZW33S');</script>
      <!-- End Google Tag Manager -->        
    <?php

}

add_action('wp_head', 'hook_javascript', 99);

// Add Google Tag code which is supposed to be placed after opening body tag.

add_action( 'wp_body_open', 'mb_add_custom_body_open_code' );

function mb_add_custom_body_open_code() {
    echo '<!-- Google Tag Manager (noscript) --> 
       <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVZW33S"
       height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
  '.PHP_EOL;

}
/* FINE GTM CODE */