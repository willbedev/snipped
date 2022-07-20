console.log('hello gravity form')

jQuery(document).on('focus', 'form input, form textarea, form select', function () {
    console.log(jQuery(this).parent().siblings('label'));
    jQuery(this).parent().siblings('label').addClass('focused');
    console.log('focusin')
});

jQuery(document).on('focusout', 'form input, form textarea, form select', function () {
    var input = jQuery(this);
    if (input.val().length === 0) {

        input.parent().siblings('label').removeClass('focused');

    }
    console.log('focusout')
});



jQuery(document).bind('gform_post_render', function () {


    jQuery('form .gfield input, form .gfield textarea, form .gfield select').each(function () {
        var input = jQuery(this);

        if (jQuery(this).val().length > 0) {
            input.parent().siblings('label').addClass('focused');
        }
    });
});