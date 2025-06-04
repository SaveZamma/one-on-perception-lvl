"use strict";
var $form = $('#checkout-form');

const CARD_NUMBER_LENGTH = 16;
const CARD_CVC_LENGTH = 3;
const ADDRESS_ZIP_LENGTH = 5;

$form.submit(function(event) {
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);

    if (validateData()) {
        $form.get(0).submit();
    }

    $form.find('button').prop('disabled', false);
});

function stripeResponseHandler(status, response) {
    if (!!response.error) {
        let chargeError = $('#charge-error');
        chargeError.removeClass('hidden');
        chargeError.text(response.error.message);

        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;

        $form.append($('<input type="hidden" id="stripeToken"/>')).val(token);

        sessionStorage.setItem('pippo', 'gambadilegno');

        $form.get(0).submit();
    }
}

function validateData () {
    let isValid = validateCardData() && validateShippingAddress();
    return isValid;
}

function validateCardData() {
    const expiryDate = new Date($('#card-expiry-month').val());
    const isDateValid = expiryDate >= new Date();

    const cardNumber = $('#card-number').val();
    const isCardNumberValid = cardNumber.length === CARD_NUMBER_LENGTH;

    const cvc = $('#card-cvc').val();
    const isCvcValid = /^\d+$/.test(cvc) && cvc.length === CARD_CVC_LENGTH;

    const cardHolderName = $('#card-name').val();
    const isCardHolderNameValid = cardHolderName !== undefined && cardHolderName !== '';

    return isDateValid && isCardNumberValid && isCvcValid && isCardHolderNameValid;
}

function validateShippingAddress() {
    const country = $('#country').val();
    const city = $('#address-city').val();
    const zip = $('#address-zip').val();
    const street = $('#address-street').val();
    const number = $('#address-number').val();

    if ($('#latitude').val() == undefined) $('#latitude').val(0);
    if ($('#longitude').val() == undefined) $('#longitude').val(0);

    const isCountryValid = country !== undefined && country !== '';
    const isCityValid = city !== undefined && city !== '';
    const isZipValid = zip !== undefined && zip !== '' && zip.length === ADDRESS_ZIP_LENGTH && /^\d+$/.test(zip);
    const isStreetValid = street !== undefined && street !== '';
    const isNumberValid = number !== undefined && number !== '';

    return isCountryValid && isCityValid && isZipValid && isStreetValid && isNumberValid;
}
