(function($) {$(document).on('change', '#registration_region', '#registration_departement', function()
{
    let $field = $(this)
    let $regionField = $('#registration_region')
    let $form = $field.closest('form')
    let target = '#' + $field.attr('id').replace('registration_departement', 'registration_ville').replace('registration_region', 'registration_departement')
    let data = {}
    data[$regionField.attr('name')] = $regionField.val()
    data[$field.attr('name')] = $field.val()
    $.post($form.attr('action'), data).then(function (data) {
        let $input = $(data).find(target)
        $(target).replaceWith($input)
    })
})
})(jQuery);