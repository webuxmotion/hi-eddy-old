/* cart */
$('body').on('click', '.js-add-to-cart', function(e) {
    e.preventDefault();

    var id = $(this).data('id'),
        qty = $('input[name="quantity"]').val() || 1,
        mod = $('.available select').val();

    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert('Error! Try later');
        }
    });
});

function showCart(cart) {
    if ($.trim(cart) == '<h3>Cart is empty!</h3>') {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}
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
