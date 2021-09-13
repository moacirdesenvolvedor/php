<?php @session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $data['config']->config_nome; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="application-name" content="" />        
        <meta name="description" content="" />
        <meta name="keywords" content="" /> 
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/css/style.css"/>       
        <link rel="stylesheet" type="text/css" href="<?= Http::base() ?>/view/admin/js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
        <link rel="stylesheet" type="text/css" href="<?= Http::base() ?>/view/admin/js/jquery.select2/dist/css/select2.css" />
    </head>
    <body>
        <?php require_once 'topo.php'; ?>
        <div class="tamh">
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12">
                        <div class="row hide">
                            <form action="<?= Http::base() ?>/busca/" method="post" role="form" autocomplete="off">
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <input class="form-control input-lg" id="busca" name="busca" placeholder="Buscar..." required value="<?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? Filter::parse_string($_POST['busca']) : '' ?>" />
                                        <span class="input-group-btn <?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? 'hide' : '' ?>">
                                            <button type="submit" class="btn btn-primary input-lg" style="margin-left:-2px"><i class="fa fa-search"></i></button>
                                        </span>
                                        <span class="input-group-btn <?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? '' : 'hide' ?>">
                                            <button type="submit" class="btn btn-danger input-lg" id="btn-busca-clear"><i class="fa fa-remove"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatable">
                                <thead class="hides">
                                    <tr>
                                        <td></td>
                                        <td width="200">Item</td>
                                        <td width="100">Preço</td>
                                        <td></td>
                                        <td width="100">Opções</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>                            
                                    <?php foreach ($data['lista'] as $obj) : ?>
                                        <?php $categoria_nome = $obj['categoria']; ?>
                                        <?php $categoria_id = $obj['categoria_id']; ?>

                                        <?php $k = 0; ?>

                                        <?php foreach ($obj['item'] as $item) : ?>
                                            <tr>
                                                <td style="vertical-align: middle">
                                                    <a href="#" data-toggle="tooltip" title="<?= strip_tags($item->item_obs) ?>" >
                                                        <?php if ($item->item_foto != ""): ?>
                                                            <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=80&h=80&src=item/<?= $item->item_foto ?>" alt="..."  class="media-object img-thumbnail img-responsive">
                                                        <?php else : ?>
                                                            <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=80&h=80&src=img/sem_foto.jpg" alt="..."  class="media-object img-thumbnail img-responsive">
                                                        <?php endif; ?>
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <?= $item->item_nome ?> 
                                                    <?= ($item->item_codigo != "") ? "<br> <small style=\"padding-right:30px;\">cód. $item->item_codigo </small>" : "" ?>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <span class="text-success" id="sp-<?= $item->item_id ?>">
                                                        <b>R$ <?= Filter::moeda($item->item_preco) ?></b>
                                                    </span>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <?= strip_tags($item->item_desc) ?> 
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <?php if (isset($item->opcao[0])) : ?>
                                                        <select class="form-control sel-option" 
                                                                data-id="<?= $item->item_id ?>" 
                                                                data-preco="<?= $item->item_preco ?>" 
                                                                id="sel-<?= $item->item_id ?>">
                                                            <option value="">Opções ---</option>
                                                            <?php foreach ($item->opcao as $opc) : ?>
                                                                <option value="<?= $opc->opcao_id ?>"
                                                                        data-preco="<?= $opc->opcao_preco ?>" 
                                                                        data-nome="<?= $opc->opcao_nome ?>"                                                                                 
                                                                        data-id="<?= $opc->opcao_id ?>"                                                                                 
                                                                        >
                                                                            <?php if ($opc->opcao_preco > 0): ?>
                                                                        +R$ <?= Filter::moeda($opc->opcao_preco) ?>  
                                                                    <?php else: ?>
                                                                        Grátis  &nbsp; &nbsp;  &nbsp;
                                                                    <?php endif; ?>
                                                                    &nbsp; &nbsp; <?= $opc->opcao_nome ?> 
                                                                </option>
                                                            <?php endforeach; ?> 
                                                        </select>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <button type="button" 
                                                            data-id="<?= $item->item_id; ?>" 
                                                            data-nome="<?= $item->item_nome; ?>" 
                                                            data-obs="<?= strip_tags($item->item_obs); ?>" 
                                                            data-desc="<?= strip_tags($item->item_desc); ?>" 
                                                            data-categoria="<?= $item->categoria_id; ?>" 
                                                            data-preco="<?= $item->item_preco; ?>" 
                                                            data-nome="<?= $item->item_nome; ?>" 
                                                            data-cod="<?= $item->item_codigo; ?>" 
                                                            class="btn btn-primary add-item"> 
                                                        <i class="fa fa-plus-circle"></i></button>  

                                                    <?php $k++; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>                                                
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div id="side-carrinho" class="fixed">
                            <?php require_once 'side-carrinho.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'footer-core-js.php'; ?>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/carrinho.js"></script>
        <script type="text/javascript">
            if ($('.tamh').height() <= 500) {
                //$('.scroll-to-up').remove();
            }
        </script>

        <script type="text/javascript" src="<?= Http::base() ?>/view/admin/js/jquery.datatables/jquery.datatables.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/admin/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/admin/js/jquery.select2/dist/js/select2.js"></script>
        <script type="text/javascript">
            $('.sel-option').select2({width: '100px'});
            var oDt = $("#datatable").dataTable(
                    {
                        //paging: false,
                        //searching: false,
                        "iDisplayLength": 500,
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
            setTimeout(function () {
                //$('.dataTables_filter').html('');
                //$('.dataTables_filter').html('<label><input type="text" aria-controls="datatable" class="form-control" placeholder="Digite aqui o que você deseja..."></label>');
                $('.dataTables_filter').parent().removeClass('pull-right');
                $('#datatable_wrapper').removeClass('form-inline');
                $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Digite aqui o que você deseja...').css('width', '100% !important');
                $('.dataTables_length select').addClass('form-control').remove();
                $('.dataTables_length small').remove();
            }, 150);
                //$("#datatable").dataTable()

        </script>

    </body>
</html>