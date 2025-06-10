"use strict";

let mapsLoaded = true;
let mapMarkers = [];
let $form = $('.checkout-form');

const CARD_NUMBER_LENGTH = 16;
const CARD_CVC_LENGTH = 3;
const ADDRESS_ZIP_LENGTH = 5;

$form.submit(function(event) {
    $form.find('button').prop('disabled', true);

    if (validateData()) {
        $form.get(0).submit();
    }

    $form.find('button').prop('disabled', false);
});

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

    //Via Cesare Pavese, 50, 47521 Cesena FC

    return isCountryValid && isCityValid && isZipValid && isStreetValid && isNumberValid;
}

let map;

$(document).ready(function (...args) {
    const cesenaCampusLatLng = {lat: 44.147760, lng: 12.234989};
    map = new google.maps.Map(document.getElementById("map"), {
        center: cesenaCampusLatLng,
        zoom: 13,
    });

    map.addListener("click", (e) => {
        console.log(e);
        placeMarkerAndPanTo(e.latLng, map);
    });
})

function placeMarkerAndPanTo(latLng, map) {
    const m = new google.maps.Marker({
        position: latLng,
        map: map,
    });
    map.panTo(latLng);

    mapMarkers.forEach(m => m.setMap(null));
    mapMarkers = [];
    mapMarkers.push(m);

    $('#latitude').val(latLng.lat);
    $('#longitude').val(latLng.lng);
}

function gm_authFailure() {
    mapsLoaded = false;

    $(".google-map").css('display', 'none');
    $('#latitude').css('display', 'none');
    $('#longitude').css('display', 'none');

    $("label[for='latitude']").css('display', 'none');
    $("label[for='longitude']").css('display', 'none');
}
