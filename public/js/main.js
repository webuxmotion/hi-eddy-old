$(document).ready(function() {
    $("#js-currency-select").change(function() {
        window.location = '/currency/change?curr=' + $(this).val();
    });
});

$('.available select').on('change', function() {
    var modeId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('.js-price').text();

    console.log(basePrice);
    if (price) {
        //$('.')
    }

    
});
