// Rimuovere le opzioni di spedizione a pagamento se la spedizione gratuita è disponibile
add_filter('woocommerce_package_rates', 'nascondi_spedizioni_a_pagamento_se_gratis_v2', 10, 2);

function nascondi_spedizioni_a_pagamento_se_gratis_v2($rates, $package) {
    // Controlla se la spedizione gratuita è disponibile
    $spedizione_gratuita_disponibile = array_filter($rates, function($rate) {
        return 'free_shipping' === $rate->method_id;
    });

    // Se è disponibile, rimuove tutte le altre opzioni
    if (!empty($spedizione_gratuita_disponibile)) {
        foreach ($rates as $rate_id => $rate) {
            if ('free_shipping' !== $rate->method_id) {
                unset($rates[$rate_id]);
            }
        }
    }

    return $rates; // Ritorna solo le opzioni aggiornate
}
