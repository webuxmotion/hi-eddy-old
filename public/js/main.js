/* cart */
$('body').on('click', '.js-add-to-cart', function(e) {
    e.preventDefault();

    var id = $(this).data('id'),
        qty = $('input[name="quantity"]').val() || 1;
    alert(qty);
});
/* END. cart */

$(document).ready(function() {
    $("#js-currency-select").change(function() {
        window.location = '/currency/change?curr=' + $(this).val();
    });
});

$('.available select').on('change', function() {
    var modeId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('.js-price').data('value');

    if (price) {
        $('.js-price').text(symbolLeft + price + symbolRight);
    } else {
        $('.js-price').text(symbolLeft + asePrice + symbolRight);
    }
});
