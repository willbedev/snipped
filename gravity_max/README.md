# Gravity Form - Customization
***
Questa cartella contine un codici custom e personalizzazioni di gravity form.

## Table of Contents
1. [Nuove funzionalità](#new-functions)
2. [Shortcodes](#shortcodes)

<a name="new-functions"></a>
***
## Nuove funzionalità

**19/12/2023**
Aggiunta gestione time. 
- Aggiunte funzionalità allo shortcode [edit_form], il campo ore è stato aggiunto.
- Modificato il JS per gestire i campi dell'edit form ed inviarli alla funzione per il salvataggio dei dati e l'invio della notifica
-- versione 1.3.2

**15/12/2023**
Aggiunto il datepicker. 
- Aggiunte funzionalità allo shortcode [edit_form], il campo date è stato aggiunto.
- Richiamato datepicker di jquery.ui
- Aggiunto CSS necessario a customizzare l'aspetto del datepicker e relativo JS
-- versione 1.3.1

**06/12/2023**
Il form generato dall'edit form ora permette di ereditare il codice CSS dello stile che si è scelto style01/style02
- Aggiunte funzionalità allo shortcode [edit_form]. E' stata migliorata la struttura html per i campi field text, select, radio-button.
- Aggiunto il CSS per i fogli general, style01, style02 per ereditare le stesse classi e attributi
-- versione 1.2.1

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