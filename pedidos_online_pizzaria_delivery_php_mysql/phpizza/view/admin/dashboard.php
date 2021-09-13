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
        <!-- Bootstrap core CSS -->
        <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.min.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
        <link href="css/style.css" rel="stylesheet" />	
        <style>
            .bootstrap-switch-handle-off{
                padding-right: 30px !important;
            }
        </style>
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
                        <h3>Status da Loja </h3>
                        <input class="switch" name="loja-status" data-size="large" type="checkbox" data-on-color="success" data-off-color="danger" data-on-text="&nbsp; ABERTA" data-off-text="FECHADA&nbsp;" <?= ($data['config']->config_aberto == 1) ? 'checked' : '' ?>>            
                        <br /><br /><br /><br /><br />
                        <div class="header">
                            <h3>Últimos Pedidos Pendentes/Em Andamento/Em Rota</h3>
                        </div>
                        <?php if (isset($data['pedido'][0])) : ?>
                            <table class="table table-bordered table-striped datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Itens</th>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Status</th>
                                        <th width="60"><i class="fa fa-cog"></i></th>
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
                                        <tr>
                                            <td><?= $obj->pedido_id ?></td>
                                            <td><?= $obj->pedido_id ?></td>
                                            <td><?= Filter::moeda($obj->pedido_total) ?></td>
                                            <td><?= Filter::parse_to_date($obj->pedido_data) ?></td>
                                            <td><?= $obj->cliente_nome ?></td>
                                            <td width="180" class="bg-<?= $status_msg ?>"><?= $status ?></td>
                                            <td width="60"><a href="<?= Http::base() ?>/admin/pedido/<?= $obj->pedido_id ?>/" class="btn btn-xs btn-prusia"><i class="fa fa-search"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                        <br>
                        <div class="header">
                            <h3>Últimos Clientes Cadastrados</h3>
                        </div>
                        <?php if (isset($data['cliente'][0])) : ?>
                            <table class="table table-bordered table-striped datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Fone</th>
                                        <th>Cidade</th>
                                        <th>Bairro</th>
                                        <th width="60"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['cliente'] as $obj): ?>
                                        <tr>
                                            <td><?= $obj->cliente_id ?></td>
                                            <td><?= $obj->cliente_nome ?></td>
                                            <td><?= $obj->cliente_email ?></td>
                                            <td><?= ($obj->cliente_fone != '') ? $obj->cliente_fone : $obj->cliente_fone2 ; ?></td>
                                            <td><?= $obj->endereco_cidade ?></td>
                                            <td><?= $obj->endereco_bairro ?></td>
                                            <td width="60"><a href="<?= Http::base() ?>/cliente/editar/<?= $obj->cliente_id ?>/" class="btn btn-xs btn-prusia"><i class="fa fa-search"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>                        
                    </div>
                </div> 
            </div>
            <?php //require_once 'side-right-chat.php'; ?>
            <script src="js/jquery.js"></script>
            <script src="js/jquery.cooki/jquery.cooki.js"></script>
            <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
            <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
            <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
            <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
            <script type="text/javascript" src="js/behaviour/core.js"></script>
            <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.js"></script>
            <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
            <script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
            <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
            <script src="app-js/main.js"></script>            
            <?php require_once 'switch-color.php'; ?>
            <script type="text/javascript">
                var baseUrl = '<?= Http::base() ?>';
                $("#cl-wrapper").removeClass("sb-collapsed");
                $('#menu-dashboard').addClass('active');
                $('.switch').bootstrapSwitch();                
                oDt.fnSort([[0, 'desc']]);//ordem da tabela  
                $('input[name="loja-status"]').on('switchChange.bootstrapSwitch', function (event, state) {
                    var url = baseUrl + '/config/gravar/';
                    if (state == false) {
                        state = 0;
                    } else {
                        state = 1;
                    }
                    $.post(url, {config_aberto: state, redir: 'true'}, function (data) {
                        //console.log(data)
                    });
                });
            </script>
    </body>
</html>
