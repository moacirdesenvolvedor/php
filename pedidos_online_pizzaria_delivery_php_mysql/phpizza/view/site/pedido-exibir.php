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
    </head>
    <body>
        <?php require_once 'topo.php'; ?>
        <br/>
        <div class="container">
            <div class="panel panel-default" id="painel-carrinho">
                <div class="panel-heading panel-heading-red">

                    <div class="row">
                        <div class="col-md-3">
                            <br>
                            <i class="fa fa-shopping-cart fa-2x"></i> 
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center">Pedido # <?= $data['pedido']->pedido_id ?> <br>
                                <small>Data do pedido: <?= date('d/m/Y H:i', strtotime($data['pedido']->pedido_data)); ?></small>
                            </h4>
                        </div>
                    </div>
                </div>
                <?php if (isset($data['lista'])): ?>
                    <div class="panel-body">
                        <h4 class="text-center carrinho-bg">Confira andamento do seu Pedido</h4>
                        <div class="itens-cart">
                            <?php foreach ($data['lista'] as $cart): ?>
                                <div class="item" id="list-item-<?= $cart->item_hash ?>">
                                    <span class="item-span">
                                        <span>
                                            <?= $cart->lista_item_nome ?> <?= ($cart->lista_opcao_nome != "") ? ' - ' . $cart->lista_opcao_nome : '' ?>
                                            <small style="color:#888"><?= ($cart->lista_item_codigo != "") ? "(cód. $cart->lista_item_codigo)" : "" ?></small>
                                            <?php if (strip_tags($cart->lista_item_desc) != ''): ?>
                                                <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                <small><?= strip_tags($cart->lista_item_desc) ?></small>
                                            <?php endif; ?>
                                            <?php if (strip_tags($cart->lista_item_obs) != ''): ?>
                                                <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                <small class="text-muted"><i><?= strip_tags($cart->lista_item_obs) ?></i></small>
                                            <?php endif; ?>
                                            <span class="pull-right mar-right-3" data-toggle="tooltip" title="<?= $cart->qtde ?> x <?= Filter::moeda($cart->lista_opcao_preco) ?>">R$ <?= Filter::moeda($cart->lista_opcao_preco * $cart->lista_qtde) ?> </span>
                                        </span>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <hr>
                        <?php if ($data['pedido']->pedido_obs != ""): ?>
                            <div>
                                <br/>
                                <p>
                                    <b>Observações:</b><br/>
                                    <?= $data['pedido']->pedido_obs ?>
                                </p>
                            </div>
                        <?php endif; ?>

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
                        <?php if ($data['pedido']->pedido_obs_pagto): ?>
                            <div>
                                <br/>
                                <p>
                                    <b>Opção de Pagamento:</b><br/>
                                    <?= $data['pedido']->pedido_obs_pagto ?>
                                </p>
                            </div>
                        <?php endif; ?>                            
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
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="">
                            <?php
                            $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                            $rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
                            $status = preg_replace($pat, $rep, $data['pedido']->pedido_status);

                            $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
                            $rep = array('warning', 'info', 'info', 'success', 'danger');
                            $status_msg = preg_replace($pat, $rep, $data['pedido']->pedido_status);
                            ?>
                            <h4 class="alert alert-<?= $status_msg ?> text-center"><?= $status ?></h4>
                        </div>
                        <br><br>
                    </div>
                <?php endif; ?>
            </div>
            <?php require_once 'footer-core-js.php'; ?>
            <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/carrinho.js"></script>
    </body>
</html>            