(function($) {
    $(document).ready(function(){

        jQuery(document).on('gform_confirmation_loaded', function(event, formId){
			var gformData = localStorage.getItem('gFormData');
			if(gformData) {
				gformData = JSON.parse(gformData);
			}

			window.dataLayer = window.dataLayer || [];
			dataLayer.push({event: 'gravity_form_submit', formId: formId, inputs: gformData});

        });
    });
})(jQuery);
