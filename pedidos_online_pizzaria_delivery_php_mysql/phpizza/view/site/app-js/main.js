$(function () {

    $('[data-toggle="tooltip"]').tooltip();
    $('.sel-option').on('change', function () {
        var item_id = $(this).data('id');
        var item_preco = $(this).data('preco');
        var opc_preco = '';
        if ($('#sel-' + item_id)) {
            var opc_preco = $('#sel-' + item_id + ' option:selected').data('preco');
        }
        if (!isNaN(opc_preco)) {
            var item_opc_preco = number_format(parseFloat(item_preco) + parseFloat(opc_preco), 2, ',', '.');
        } else {
            var item_opc_preco = number_format(parseFloat(item_preco), 2, ',', '.');
        }
        $('#sp-' + item_id + ' b').html('R$ ' + item_opc_preco);
    });
    $('#btn-busca-clear').on('click', function () {
        $('#busca').val('');
        window.location = baseUrl;
    });
});

function __alert__success() {
    $.gritter.add({
        title: 'Procedimento Realizado',
        text: 'Registro removido com sucesso!',
        class_name: 'success',
        before_open: function () {
            if ($('.gritter-item-wrapper').length == 1) {
                // prevents new gritter 
                return false;
            }
        }
    });
}
function __alert__error(msg) {
    $.gritter.add({
        title: 'Atenção',
        text: msg,
        class_name: 'danger',
        before_open: function () {
            if ($('.gritter-item-wrapper').length == 1) {
                // prevents new gritter 
                return false;
            }
        }
    });
}

function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function scroll_to(to) {
    $('html, body').animate({
        scrollTop: $('#' + to).offset().top - 60
    }, 1300);
}

$('.scroll-to-up').on('click', function () {
    scroll_to('topo');
});


