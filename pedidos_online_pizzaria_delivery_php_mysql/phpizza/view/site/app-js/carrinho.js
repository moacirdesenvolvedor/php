$(function () {
    $('.add-item').on('click', function () {
        var item_id = $(this).data('id');
        var item_nome = $(this).data('nome');
        var item_categoria = $(this).data('categoria');
        var item_obs = $(this).data('obs');
        var item_desc = $(this).data('desc');
        var item_preco = $(this).data('preco');
        var item_cod = $(this).data('cod');
        var opc_preco = 0;
        var opc_id = 0;
        var opc_nome = '';
        if ($('#sel-' + item_id).length > 0) {
            opc_preco = $('#sel-' + item_id + ' option:selected').data('preco');
            opc_nome = $('#sel-' + item_id + ' option:selected').data('nome');
            opc_id = $('#sel-' + item_id + ' option:selected').data('id');
        }
        if (opc_preco > 0 && !isNaN(opc_preco)) {
            item_opc_preco = parseFloat(item_preco) + parseFloat(opc_preco);
            opc_nome = $('#sel-' + item_id + ' option:selected').data('nome');
            opc_id = $('#sel-' + item_id + ' option:selected').data('id');
        } else {
            item_opc_preco = parseFloat(item_preco);
            opc_preco = 0;
            opc_nome = '';
            opc_id = 0;
        }
        opc_preco = parseFloat(opc_preco);
        var dados = {
            item_id: item_id,
            item_nome: item_nome,
            item_categoria: item_categoria,
            item_obs: item_obs,
            item_desc: item_desc,
            item_preco: item_preco,
            item_codigo: item_cod,
            opc_id: opc_id,
            opc_preco: opc_preco,
            opc_nome: opc_nome,
            item_opc_preco: item_opc_preco
        };
        var url = baseUrl + '/carrinho/add/';
        $.post(url, dados, function (rs) {
            rebind_reload();
        });
        scroll_to('topo');
        //scroll_to('painel-carrinho');
        if ($(window).width() <= 768) {
            $('.menu-canvas').trigger('click');
            setTimeout(function () {
                $('.menu-canvas').trigger('click');
            }, 1000);
        }
        $('#busca').val('');
        if($(this).hasClass('returnIndex')){
            var url = baseUrl;
            window.location.href = baseUrl;
        }
    });
    rebind_add();
    rebind_del();
    rebind_scroll();
    rebind_get_count();
    /*
     setInterval(function () {
     rebind_add();
     rebind_del();
     }, 10000);
     */
});

function rebind_reload() {
    var url = baseUrl + '/carrinho/reload/';
    $.post(url, {}, function (data) {
        $('#side-carrinho').html(data);
        $('#side-carrinho-mobile').html(data);
        rebind_add();
        rebind_del();
        rebind_scroll();
        rebind_get_count();
        $('[data-toggle="tooltip"]').tooltip();
    })
}
function rebind_add() {
    $('.add-more').on('click', function () {
        var id = $(this).data('id');
        var url = baseUrl + '/carrinho/add_more/';
        $.post(url, {id: id}, function (rs) {
            rebind_reload();
            //rebind_get_count();
        });
    });
}

function rebind_del() {
    $('.del-more').on('click', function () {
        var id = $(this).data('id');
        var url = baseUrl + '/carrinho/del_more/';
        $.post(url, {id: id}, function (rs) {
            rebind_reload();
            //rebind_get_count();
        });
    });
}

function rebind_scroll() {
    $('.scroll-to-up').on('click', function () {
        scroll_to('topo');
    });
}


function rebind_get_count() {
    var url = baseUrl + '/carrinho/get_count_js/';
    $.post(url, {}, function (rs) {
        $('#cart-count').html(rs)
    });
}

$('#radioBtn a').on('click', function () {
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#' + tog).prop('value', sel);
    $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
});


