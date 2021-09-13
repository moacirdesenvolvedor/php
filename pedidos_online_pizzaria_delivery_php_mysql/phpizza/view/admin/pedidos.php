<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once 'site-base.php'; ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/icon.png">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
        <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
        <link href="css/style.css" rel="stylesheet" />	
    </head>
    <body class="animated">
        <div id="cl-wrapper">
            <div class="cl-sidebar">
                <?php require_once 'side-menu.php'; ?>
            </div>
            <div class="container-fluid" id="pcont">
                <?php require_once 'top-menu.php'; ?>
                <div class="cl-mcont">
                    <div class="block-flat">
                        <div class="header">
                            <h3>
                                <Br>
                                Últimos Pedidos
                                <span class="pull-right">
                                    <div class="hidden-xs">
                                        <small>Filtrar por: </small>
                                        <button class="btn btn-xs btn-default btn-status" data-status="0"><i class="fa fa-filter"></i> todos</button>
                                        <button class="btn btn-xs btn-warning btn-status" data-status="1"><i class="fa fa-filter"></i> pendentes</button>
                                        <button class="btn btn-xs btn-info btn-status" data-status="2"><i class="fa fa-filter"></i> em andamento</button>
                                        <button class="btn btn-xs btn-primary btn-status" data-status="3"><i class="fa fa-filter"></i> em rota</button>
                                        <button class="btn btn-xs btn-success btn-status" data-status="4"><i class="fa fa-filter"></i> entregues</button>
                                        <button class="btn btn-xs btn-danger  btn-status" data-status="5"><i class="fa fa-filter"></i> cancelados</button>
                                    </div>
                                </span>
                                <div class="row hidden-desktop"></div>
                            </h3>
                        </div>

                        <?php if (isset($data['pedido'][0])) : ?>
                            <table class="table table-bordered table-striped pedido-table">
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Itens</th>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Status</th>
                                        <th width="120"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['pedido'] as $obj): ?>
                                        <?php
                                        $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                        $rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
                                        $status = preg_replace($pat, $rep, $obj->pedido_status);
                                        $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                        $rep = array('warning', 'info', 'info', 'success', 'danger');
                                        $status_msg = preg_replace($pat, $rep, $obj->pedido_status);
                                        ?>
                                        <tr id="tr-<?= $obj->pedido_id ?>" data-status="<?= $obj->pedido_status; ?>" class="status-<?= $obj->pedido_status; ?> status-all">
                                            <td><?= $obj->pedido_id ?></td>
                                            <td><?= $obj->pedido_id ?></td>
                                            <td><?= Filter::moeda($obj->pedido_total) ?></td>
                                            <td><?= Filter::parse_to_date($obj->pedido_data) ?></td>
                                            <td><?= $obj->cliente_nome ?></td>
                                            <td width="180" class="bg-<?= $status_msg ?>"><?= $status ?></td>
                                            <td class="text-center">
                                                <a href="<?= Http::base() ?>/admin/pedido/<?= $obj->pedido_id ?>/" class="btn btn-xs btn-prusia"><i class="fa fa-search"></i></a>
                                                <button type="button" class="btn btn-danger btn-xs btn-remover" data-id="<?= $obj->pedido_id ?>"><i class="fa fa-remove"></i> </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
            <!-- Right Chat-->
            <?php //require_once 'side-right-chat.php'; ?>
            <div class="modal fade colored-header warning md-effect-10" id="modal-remove" tabindex="-1" role="dialog">
                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Remover Registro</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="i-circle warning"><i class="fa fa-warning"></i></div>
                                <h4>Atenção!</h4>
                                <p>Você está prestes à remover um registro e esta ação não pode ser desfeita. <br /> 
                                    Deseja realmente prosseguir?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form name="form-remove" id="form-remove" action="<?= Http::base() ?>/admin/pedido_remove/" method="post">
                                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-warning btn-flat btn-confirma-remove">Prosseguir</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->  
            <script src="js/jquery.js"></script>
            <script src="js/jquery.cooki/jquery.cooki.js"></script>
            <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
            <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
            <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
            <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
            <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
            <script type="text/javascript" src="js/behaviour/core.js"></script>
            <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
            <script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
            <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
            <script src="app-js/main.js"></script>
            <script src="app-js/pedido.js"></script>
            <?php require_once 'switch-color.php'; ?>
            <script type="text/javascript">
                podt.fnSort([[0, 'desc']]);//ordem da tabela   
                $('#menu-pedido').addClass('active');
<?php if (isset($_GET['success'])): ?>
                    _alert_success();
<?php endif; ?>
    
    
            $('.btn-status').on('click', function () {
                var status = $(this).data('status');
                console.log(status)
                if (status == 0) {
                    $('.status-all').fadeIn();
                } else {
                    $('.status-all').fadeOut();
                    $('.status-' + status).fadeIn();
                }
            });
            
            </script>
    </body>
</html>
