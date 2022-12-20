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
        jQuery('form .wrap input, form .wrap  textarea, form .wrap  select').each( function(key,element){
            if (typeof jQuery(element).val() === 'string') {
                if( jQuery(element).val().length != 0 ) {
                    jQuery(element).parent().siblings('label').addClass('focused');
                }
            }
        })
      }
            
    
};

// Create an observer instance linked to the callback function
const observer = new MutationObserver(callback);

// Start observing the target node for configured mutations
observer.observe(targetNode, config);
//oserver


//focus
jQuery(document).on('focus', 'form input, form textarea, form select', function () {
    // console.log(jQuery(this).parent().siblings('label'));
    jQuery(this).parent().siblings('label').addClass('focused');
    // console.log('focusin')
});

jQuery(document).ready(function(){
    jQuery('form .gf_readonly input, form .gf_readonly textarea, form .gf_readonly select').each( function(key,element){
        if( jQuery(element).val().length != 0 ) {
            jQuery(element).parent().siblings('label').addClass('focused');
            // console.log( jQuery(element).parent().siblings('label'))
        }
    })
})


jQuery(document).on('focusout', 'form input, form textarea, form select', function () {
    var input = jQuery(this);
    if (input.val().length === 0) {

        input.parent().siblings('label').removeClass('focused');

    }
    console.log('focusout')
});


// jQuery(document).bind('gform_post_render', function () {


//     jQuery('form .gfield input, form .gfield textarea, form .gfield select').each(function () {
//         var input = jQuery(this);

//         if (jQuery(this).val().length > 0) {
//             input.parent().siblings('label').addClass('focused');
//         }
//     });
// });

if(document.querySelector(".Mustread")){
    document.querySelector(".Mustread").disabled = true;
    document.querySelector(".Mustread .gfield_description ").addEventListener(
        'scroll',
        function()
        {
            var scrollTop = document.querySelector('.Mustread .gfield_description').scrollTop;
            var scrollHeight = document.querySelector('.Mustread .gfield_description').scrollHeight; // added
            var offsetHeight = document.querySelector('.Mustread .gfield_description').offsetHeight;
            var contentHeight = scrollHeight - offsetHeight; // added
            if (contentHeight <= scrollTop) // modified
            {
                document.querySelector(".Mustread").disabled = false;
            }
        },
    )
}



