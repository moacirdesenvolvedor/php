$(function () {
    $('#item_preco').mask("#.##0,00", {reverse: true});
    $('#datatable').on('click','.btn-remover',function () {
        var id = $(this).data('id');
        $('#modal-remove').modal('show');
        $('.btn-confirma-remove').on('click', function () {
            var url = $('#form-remove').attr('action');
            $.post(url, {item_id: id}, function (rs) {
                $('#modal-remove').modal('hide');
                $('#tr-' + id).fadeOut();
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
            });
            return false;
        });
    });
});

