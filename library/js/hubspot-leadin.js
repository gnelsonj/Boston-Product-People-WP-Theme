function runLeadIn ( $form, ctx ) {
    register_leadin_form($form);
}

function register_leadin_form ( form ) {
    form.find('input[type="submit"]').on('click', function ( e ) {
        var parentForm = jQuery(this).closest('form');
        leadin_submit_form(parentForm, jQuery);
    });
}