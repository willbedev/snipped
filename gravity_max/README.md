# Gravity Form - Customization
***
Questa cartella contine un codici custom e personalizzazioni di gravity form.

## Table of Contents
1. [Nuove funzionalità](#new-functions)
2. [Shortcodes](#shortcodes)

<a name="new-functions"></a>
***
## Nuove funzionalità
**06/12/2023**
- Creato shortcode [edit_form] per la modifica delle informazioni di un form compilato dall'utente.
-- versione 1.0.0
***
- Possibilità di inserire la lista delle provincie dando il nome **Provincia di residenza** alla select desiderata.
-- codice inserito in helpers.php filtro **gform_field_css_class**

<a name="shortcodes"></a>
***
## Lista degli shortcode
- [edit_form]: nessun parametro in ingresso.
-- Dipendenze: parametri necessari ( fid (ID form), email (USER email), feid (ENTITY ID form) ) passati nell'url della pagina.
-- versione 1.0.0