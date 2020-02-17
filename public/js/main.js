$(document).ready(function() {
    $("#js-currency-select").change(function() {
        window.location = '/currency/change?curr=' + $(this).val();
    });
});

