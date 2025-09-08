<?php

// -----------------------------------------------------------------
// Accessibilità
// -----------------------------------------------------------------

//** carica script generale accessibilitàse necessario */
function arcese_child_enqueue_scripts() {
    wp_enqueue_script(
        'logo-accessibility',
        get_stylesheet_directory_uri() . '/assets/js/accessibility.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'arcese_child_enqueue_scripts');
 
/* inserisce attraverso le classi il parametro autocomplete  */
add_filter('gform_field_content', function($content, $field) {

	// Nome completo
	if (strpos($field->cssClass, 'gf-autocomplete-name') !== false) {
		$content = str_replace('<input', '<input autocomplete="name"', $content);
	}
	// Email
	if (strpos($field->cssClass, 'gf-autocomplete-email') !== false) {
		$content = str_replace('<input', '<input autocomplete="email"', $content);
	}
	// Telefono
	if (strpos($field->cssClass, 'gf-autocomplete-tel') !== false) {
		$content = str_replace('<input', '<input autocomplete="tel"', $content);
	}
	return $content;

}, 10, 2);

/* Aria-label button submit gravity form */
add_filter('gform_submit_button_1', 'custom_submit_button_form_1', 10, 2);
function custom_submit_button_form_1($button, $form) {
	return '<input type="submit" id="gform_submit_button_1" class="gform_button button" value="Inviaci la tua richiesta" aria-label="Inviaci la tua richiesta">';
}

add_filter('gform_submit_button_2', 'custom_submit_button_form_2', 10, 2);
function custom_submit_button_form_2($button, $form) {
	return '<input type="submit" id="gform_submit_button_2" class="gform_button button" value="Invia la tua candidatura" aria-label="Invia la tua candidatura al nostro team">';
}

add_filter('gform_submit_button_4', 'custom_submit_button_form_4', 10, 2);
function custom_submit_button_form_4($button, $form) {
	return '<input type="submit" id="gform_submit_button_4" class="gform_button button" value="Richiedi la tua consulenza" aria-label="Richiedi la tua consulenza">';
}
add_filter('gform_submit_button_5', 'custom_submit_button_form_5', 10, 2);
function custom_submit_button_form_5($button, $form) {
	return '<input type="submit" id="gform_submit_button_5" class="gform_button button" value="Iscriviti" aria-label="Iscriviti alla nostra newsletter">';
}
/* label aria hidden per blocco testo+svg, richiede anche una parte di css */

add_filter('the_content', 'accessibility_hide_svg_icons', 20);

function accessibility_hide_svg_icons($content) {
	libxml_use_internal_errors(true); // Per evitare warning

	$dom = new DOMDocument();
	$dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);

	$xpath = new DOMXPath($dom);

	// Trova tutti gli <svg> dentro span con classe contenente "kb-svg-icon-wrap"
	$icons = $xpath->query('//span[contains(@class,"kb-svg-icon-wrap")]/svg');

	foreach ($icons as $icon) {
		$icon->setAttribute('aria-hidden', 'true');

		// Rimuove <title> se presente (opzionale)
		$titles = $icon->getElementsByTagName('title');
		foreach ($titles as $title) {
			$title->parentNode->removeChild($title);
		}
	}

	// Restituisce solo il corpo modificato, rimuovendo l'HTML aggiunto automaticamente
	$body = $dom->getElementsByTagName('body')->item(0);
	$new_content = '';
	foreach ($body->childNodes as $child) {
		$new_content .= $dom->saveHTML($child);
	}

	return $new_content;
}
