console.log('hello gravity form')

//observer su tutti i field
const targetNode = document.querySelector('#main');

// Options for the observer (which mutations to observe)
const config = { attributes: true, childList: false, subtree: true };

// Callback function to execute when mutations are observed
const callback = (mutationList, observer) => {
  for (const mutation of mutationList) {
    if (mutation.type === 'childList') {
    //   console.log('A child node has been added or removed.');
    } else if (mutation.type === 'attributes') {
    //   console.log(`The ${mutation.attributeName} attribute was modified.`);
    }
  }
    for (const mutation of mutationList) {
        jQuery('form input, form  textarea, form  select').each( function(key,element){
            if( jQuery(element).val().length != 0 ) {
                console.log(mutation);
                jQuery(element).parent().siblings('label').addClass('focused');
                // console.log( jQuery(element).parent().siblings('label'))
            }
        })
      }
            
    
};

// Create an observer instance linked to the callback function
const observer = new MutationObserver(callback);

// Start observing the target node for configured mutations
observer.observe(targetNode, config);
//oserver

jQuery(document).on('focus', 'form input, form textarea, form select', function () {
    //console.log(jQuery(this).parent().siblings('label'));
    jQuery(this).parent().siblings('label').addClass('focused');
    //console.log('focusin')
});

jQuery(document).on('focusout', 'form input, form textarea, form select', function () {
    var input = jQuery(this);
    if (input.val().length === 0) {

        input.parent().siblings('label').removeClass('focused');

    }
    //console.log('focusout')
});



jQuery(document).bind('gform_post_render', function () {


    jQuery('form .gfield input, form .gfield textarea, form .gfield select').each(function () {
        var input = jQuery(this);

        if (jQuery(this).val().length > 0) {
            input.parent().siblings('label').addClass('focused');
        }
    });
});
