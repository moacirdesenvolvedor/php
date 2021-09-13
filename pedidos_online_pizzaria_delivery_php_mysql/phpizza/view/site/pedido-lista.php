<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $data['config']->config_nome; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="application-name" content="" />        
        <meta name="description" content="" />
        <meta name="keywords" content="" /> 
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?= Http::base() ?>/view/site/plugins/jquery.gritter/css/jquery.gritter.css"/>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/css/style.css"/>       
    </head>
    <body>
        <?php require_once 'topo.php'; ?>
        <div class="tamh">
            <br/>
            <div class="container">
                <div class="content">
                    <input type="hidden" name="cliente_id" id="cliente_id" value="<?php $data['cliente']->cliente_id ?>" >
                    <br/>
                    <h4>
                        <span class="text-danger text-uppercase">
                            <i class="fa fa-shopping-cart fa-2x"></i>
                            Meus Pedidos
                        </span>

                        <span class="pull-right">
                            <br />                            
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
                    </h4>
                    <div class="visible-xs visible-md">
                        <br>
                        <select class="form-control btn-status-sel" >
                            <option value="0" data-status="0">filtrar pedidos...</option>
                            <option value="0" data-status="0">todos</option>
                            <option value="1" data-status="1">pendentes</option>
                            <option value="2" data-status="2">em andamento</option>
                            <option value="3" data-status="3">em rota</option>
                            <option value="4" data-status="4">entregues</option>
                            <option value="5" data-status="5">cancelados</option>
                        </select>
                    </div>                    
                    <br/>

                    <?php /* Filter::pre($data['endereco']); */ ?>
                    <?php if (isset($data['pedido'][0])) : ?>
                        <?php foreach ($data['pedido'] as $p) : ?>
                            <div class="well well-sm status-<?= $p->pedido_status; ?> status-all" data-status="<?= $p->pedido_status; ?>" id="tr-<?= $p->pedido_id; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p> 
                                            <span class="text-muted">PEDIDO <b>#<?= $p->pedido_id; ?></b></span>
                                            <span class="pull-right text-muted">Data do pedido: <?= date('d/m/Y H:i', strtotime($p->pedido_data)); ?></span>
                                        </p>
                                        <?php foreach ($p->lista as $l): ?>
                                            <p>
                                                <b><?= $l->lista_item_nome ?></b>
                                                <br>
                                                <small><?= $l->lista_item_desc ?></small>
                                            </p>
                                        <?php endforeach; ?>
                                        <p class="text-right">
                                            <a href="<?= Http::base() ?>/detalhes-do-pedido/<?= $p->pedido_id; ?>/">detalhes do pedido</a>
                                        </p>
                                        <?php
                                        $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                        $rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
                                        $status = preg_replace($pat, $rep, $p->pedido_status);
                                        $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                                        $rep = array('warning', 'info', 'info', 'success', 'danger');
                                        $status_msg = preg_replace($pat, $rep, $p->pedido_status);
                                        ?>
                                        <h4 class="text-center alert alert-<?= $status_msg ?> text-center"><?= $status ?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h4 class="alert alert-danger">Você ainda não possui pedidos!</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="col-md-offset-9 col-sm-offset-9">
                <a href="javascript:void(0);" class="foot scroll-to-up"><i class="fa fa-chevron-circle-up"></i> </a>
            </div>
        </footer>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/plugins/jquery.gritter/js/jquery.gritter.js"></script>       
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/main.js"></script> 
        <script type="text/javascript">
            if ($(window).height() <= 700) {
                $('.scroll-to-up').remove();
            }
            $('.btn-status').on('click', function () {
                var status = $(this).data('status');
                if (status == 0) {
                    $('.status-all').fadeIn();
                } else {
                    $('.status-all').fadeOut();
                    $('.status-' + status).fadeIn();
                }
            });
            $('.btn-status-sel').on('change', function () {
                var status = $('.btn-status-sel option:selected').data('status');
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