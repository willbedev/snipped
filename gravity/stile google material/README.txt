classi                funzionamento
.focused  
.focusout
.formWrapper          da dare al form che vogliamo modificare
.wrap                 da dare ai campi ché vogliammo modificare
.Mustread             obbliga a leggere il consent
.gf_readonly          blocca i campi input
.placeholderhollow    da valore 0 al placeholder 

N.b. inserire nel div che contiene la form di gravity la classe .formWrapper

Questo script in un blocco html dentro la form se occorre inserire dei blocchi ai campi

//inside a gravity form html block
<script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a input with a class of gf_readonly */
            jQuery(".gf_readonly input").attr("readonly","readonly");
 jQuery(".gf_readonly select").attr("disabled","disabled");
 jQuery(".placeholderhollow option.gf_placeholder").text("\n");
        });
</script>