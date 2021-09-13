$('.btn-endereco-remove').on('click', function () {
    var endereco_id = $(this).data('id');
    $('#endereco_id').val(endereco_id);
    $('#modal-endereco-remove').modal('show');
    $('.btn-confirma-remove').on('click', function () {
        var url = $('#form-remove').attr('action');
        $.post(url, {endereco_id: endereco_id}, function (rs) {
            $('#modal-endereco-remove').modal('hide');
            $('#tr-' + endereco_id).fadeOut();
            __alert__success();
        });
        return false;
    });
});

$("[data-mask='cep']").mask("99999-999");
$('#endereco_cep').keyup(function () {
    var cep = $(this).val();
    cep = cep.replace(/_/g, '');
    if (cep.length >= 9) {
        var url = 'http://cep.republicavirtual.com.br/web_cep.php?cep=' + cep + '&formato=json';
        $.getJSON(url, {}, function (rs) {
            if (rs.resultado == 1) {
                new dgCidadesEstados({
                    cidade: document.getElementById('endereco_cidade'),
                    estado: document.getElementById('endereco_uf'),
                    estadoVal: rs.uf,
                    cidadeVal: rs.cidade
                });
                $('#endereco_bairro').val(rs.bairro);
                $('#endereco_endereco').val(rs.tipo_logradouro + ' ' + rs.logradouro);
                $('#endereco_numero').focus();
            }
        });
    }
});


$('#endereco_cep').change(function () {
    var cep = $(this).val();
    var url = baseUri + '/local/getfaixa/';
    $.post(url,{cep:cep},function(rs){
       if(rs == '-1'){
           $("#modal-faixa-cep").modal('show');
           $('.btn-endereco-gravar').attr('disabled','disabled');
       }else{
           $('.btn-endereco-gravar').removeAttr('disabled');
       }
    });
});