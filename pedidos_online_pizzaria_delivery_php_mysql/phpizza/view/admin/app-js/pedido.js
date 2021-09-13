var podt = $(".pedido-table").dataTable(
        {
            //paging: false,
            //searching: false,
            "iDisplayLength": 50,
            "order": [[1, "asc"]],
            "oLanguage": {
                //"sUrl": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json",
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ <small class='text-muted'>itens por página</small>",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });


$(function () {
    $('.btn-remover').on('click', function () {
        $('#modal-remove').modal('show');
        var id = $(this).data('id');
        $('.btn-confirma-remove').on('click', function () {
            var url = $('#form-remove').attr('action');
            $.post(url, {pedido_id: id}, function (rs) {
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



