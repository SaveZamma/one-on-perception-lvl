var stripe = Stripe('pk_test_51RSKAx04dVDtB2GgixMBgbrI5yNsBa7Nc9cTpc6uRSdZnDy8LuBpBQgfJhu4O0TEdtHcKTgxsuxZYQ9yw7TV9G6G00urMBF4Et');

var $form = $('#checkout-form');

$form.submit(function(event) {
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);

    stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler)

    return false;
});

function stripeResponseHandler(status, response) {
    if (!!response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);

        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;

        $form.append($('<input type="hidden" id="stripeToken"/>')).val(token);

        $form.get(0).submit();
    }
}

