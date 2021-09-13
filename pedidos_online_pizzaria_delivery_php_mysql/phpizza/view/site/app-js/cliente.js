$(function () {
    $("[data-mask='phone']").mask("(99) 9999-9999");
    $("[data-mask='cell']").mask("(99) 99999-9999");
    $("[data-mask='cpf']").mask("999.999.999-99");
    $("[data-mask='cep']").mask("99999-999");
    $("[data-mask='cnpj']").mask("99.999.999/9999-99");
    
    $('#form-cadastro').on('submit',function(){
       if($('#cliente_fone').val() == '' && $('#cliente_fone2').val() == '') {
           __alert__error('Você precisa informar ao menos 01 número de telefone!');
           $('#cliente_fone').focus();
           return false;
       }
    });
});



