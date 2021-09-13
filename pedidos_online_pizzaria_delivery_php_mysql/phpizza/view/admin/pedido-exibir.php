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
        <link rel="stylesheet" type="text/css" href="js/jquery.easypiechart/jquery.easy-pie-chart.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
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
                        <?php if (isset($data['lista'])): ?>
                            <div class="header">
                                <h3>Dados do Pedido #<?= $data['pedido']->pedido_id ?> <br>
                                    <small class="pull-right" style="font-size:13px;font-family: 'Open Sans',arial,verdana;">Data: <?= Filter::parse_to_date($data['pedido']->pedido_data) ?></small>
                                    <br>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="itens-cart">
                                    <?php foreach ($data['lista'] as $cart): ?>
                                        <div class="item" id="list-item-<?= $cart->item_id ?>">
                                            <span class="item-span">
                                                <span>
                                                    <?= $cart->lista_item_nome ?> <?= ($cart->lista_opcao_nome != "") ? ' - ' . $cart->lista_opcao_nome : '' ?>
                                                    <small style="color:#666"><?= ($cart->lista_item_codigo != "") ? "(cód. $cart->lista_item_codigo)" : "" ?></small>
                                                    <?php if (strip_tags($cart->lista_item_desc) != ''): ?>
                                                        <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                        <small><?= strip_tags($cart->lista_item_desc) ?></small>
                                                    <?php endif; ?>
                                                    <?php if (strip_tags($cart->lista_item_obs) != ''): ?>
                                                        <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                        <small class="text-muted"><i><?= strip_tags($cart->lista_item_obs) ?></i></small>
                                                    <?php endif; ?>
                                                    <span class="pull-right mar-right-3" data-toggle="tooltip" title="<?= $cart->lista_qtde ?> x <?= Filter::moeda($cart->lista_opcao_preco) ?>">R$ <?= Filter::moeda($cart->lista_opcao_preco * $cart->lista_qtde) ?> </span>
                                                </span>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php if ($data['pedido']->pedido_obs != ""): ?>
                                    <div>
                                        <br/><br/>
                                        <p>
                                            <b>Observações:</b><br/>
                                            <?= $data['pedido']->pedido_obs ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <hr>
                                <div class="text-right">
                                    <p>Taxa de Entrega  R$ <?= Filter::moeda($data['pedido']->pedido_entrega) ?></p> 
                                    <p><strong>Total do Pedido R$ <?php
                                            if ($data['pedido']->pedido_total > 0) {
                                                echo Filter::moeda($data['pedido']->pedido_total);
                                            } else {
                                                echo '0,00';
                                            }
                                            ?></strong></p>
                                    <p><small>Tempo de Entrega Estimado: <?= $data['pedido']->pedido_entrega_prazo ?></small></p>
                                    <p><strong><?= $data['pedido']->pedido_obs_pagto ?></strong></p>
                                </div>
                                <hr>
                                <div class="">
                                    <?php if (isset($data['endereco'])) : ?>
                                        <?php $end = $data['endereco']; ?>
                                        <h4>Endereço de entrega: <b><?= $end->endereco_nome ?></b></h4>
                                        <?= $end->endereco_endereco ?>,
                                        <?= $end->endereco_numero ?>,
                                        <?php if ($end->endereco_complemento != ""): ?>
                                            <?= $end->endereco_complemento ?> -
                                        <?php endif; ?>
                                        <?= $end->endereco_cidade ?> -
                                        <?= $end->endereco_uf ?>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <br>
                                        <h5>
                                            Cliente: <b><?= $end->cliente_nome ?></b>  
                                            <br><br>
                                            Contato: <b><?= $end->cliente_fone ?>  &nbsp; <?= $end->cliente_fone2 ?> </b>
                                            <br><br> 
                                            Email: <b><?= $end->cliente_email ?>
                                        </h5>
                                    </div>
                                    <hr>
                                    <br>
                                <?php endif; ?>
                                <div class="">
                                    <?php
                                    $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                    $rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
                                    $status = preg_replace($pat, $rep, $data['pedido']->pedido_status);

                                    $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                    $rep = array('warning', 'info', 'info', 'success', 'danger');
                                    $status_msg = preg_replace($pat, $rep, $data['pedido']->pedido_status);
                                    ?>
                                    <h4 class="alert alert-<?= $status_msg ?> text-center" id="current-status"><?= $status ?></h4>
                                    <br>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-control input-lg"
                                                        name="pedido_status" id="pedido_status" 
                                                        data-id="<?= $data['pedido']->pedido_id ?>" 
                                                        data-cliente="<?= $data['pedido']->pedido_cliente ?>" required>                                                    
                                                    <option value="">ALTERAR STATUS DO PEDIDO PARA: </option>
                                                    <option value="1">Pendente</option>
<!--                                                    <option value="7">Pago (ONLINE)</option>-->
                                                    <option value="2">Andamento</option>
                                                    <option value="3">Em rota</option>
                                                    <option value="4">Entregue</option>
                                                    <option value="5">Cancelado</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-lg btn-success" id="btn-update-status"><i class="fa fa-refresh"></i> Atualizar</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        <?php endif; ?>

                    </div>
                </div> 
            </div>
            <!-- Right Chat-->
            <?php //require_once 'side-right-chat.php'; ?>
            <script src="js/jquery.js"></script>
            <script src="js/jquery.cooki/jquery.cooki.js"></script>
            <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
            <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
            <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
            <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
            <script type="text/javascript" src="js/behaviour/core.js"></script>
            <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
            <?php require_once 'switch-color.php'; ?>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
            <script type="text/javascript">
                var baseUrl = '<?= Http::base() ?>';
                $("#cl-wrapper").removeClass("sb-collapsed");
                $('#menu-pedido').addClass('active');
                $('#btn-update-status').on('click', function () {
                    var status = $('#pedido_status option:selected').val();
                    if (status != "") {
                        var url = baseUrl + '/admin/atualiza_status/';
                        var id = $('#pedido_status').data('id');
                        var cliente = $('#pedido_status').data('cliente');
                        $('#btn-update-status').html(' Atualizando, aguarde....').attr('disabled', 'disabled');
                        $.post(url, {pedido_id: id, pedido_status: status, cliente: cliente}, function (data) {
                            location.reload();
                            if (data != "") {
                                $('#btn-update-status').removeAttr('disabled').html('<i class="fa fa-refresh"></i> Atualizar');
                                //data = $.parseJSON(data)
                                $('#current-status').removeClass('alert-success alert-warning alert-info alert-info alert-danger');
                                $('#current-status').addClass('alert-' + data.class);
                                $('#current-status').html(data.text);
                                location.reload();
                            }
                        });
                    }
                });
            </script>
    </body>
</html>
