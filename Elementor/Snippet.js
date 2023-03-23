// Per chiudere di default l'accordion
// Da inserire su file JSON
// Per aprire tab specifici vedere guida https://element.how/elementor-open-specific-tab-toggle-accordion/

jQuery(document).ready(function($) { 
    
    var delay = 100; setTimeout(function() {
    $('.elementor-tab-title').removeClass('elementor-active');
    $('.elementor-tab-content').css('display', 'none'); }, delay); 
    
});
