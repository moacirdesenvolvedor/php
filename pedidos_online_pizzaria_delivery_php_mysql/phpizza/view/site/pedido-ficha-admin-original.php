<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?= $data['config']->config_nome; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default" id="painel-carrinho">
                <div class="panel-heading panel-heading-red">
                    <h3>
                        Cliente: <?= (Filter::antiSQL($_POST['cliente_nome'])) ?> | 
                        Contato: <?= (Filter::antiSQL($_POST['cliente_fone'])) ?> <?= (Filter::antiSQL($_POST['cliente_fone2'])) ?>  <?= (Filter::antiSQL($_POST['cliente_fone3'])) ?><br>
                    </h3>
                    <div class="row">
                        <h3 class="text-center">
                            Pedido # <?= $data['pedido']->pedido_id ?> <br>
                            <small>Data do pedido: <?= date('d/m/Y H:i', strtotime($data['pedido']->pedido_data)); ?></small>
                        </h3>
                    </div>
                </div>
                <?php if (isset($data['lista'])): ?>
                    <div class="panel-body">
                        <div class="itens-cart">
                            <?php foreach ($data['lista'] as $cart): ?>
                                <div class="item" id="list-item-<?= $cart->item_hash ?>">
                                    <span class="item-span">
                                        <span>
                                            <?= $cart->lista_item_nome ?> <?= ($cart->lista_opcao_nome != "") ? ' - ' . $cart->lista_opcao_nome : '' ?>
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
                            <br>
                            <P><strong>Observações:</strong> <?= strip_tags($data['pedido']->pedido_obs) ?></p>
                        </div>
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
                            <h4 class="alert alert-<?= $status_msg ?> text-center">Status do Pedido: <?= $status ?></h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>            