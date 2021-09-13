<div class="col-md-12 col-xs-10 col-xs-offset-1" style="padding: 0px;">
    <div class="row">
        <div class="panel panel-default" id="painel-carrinho" >
            <div class="panel-heading panel-heading-red">
                <h3 class="text-center">
                    <span class="text-write">
                        <i class="fa fa-shopping-cart fa-1x"></i>
                        &nbsp;Seu Carrinho <br>
                        <small><?= $data['config']->config_nome; ?> </small>
                    </span>
                </h3>
            </div>
            <?php if (Carrinho::isfull()): ?>
                <div class="panel-body">
                    <div class="row">
                        <?php foreach (Carrinho::get_all() as $cart): ?>
                            <div class="item" id="list-item-<?= $cart->item_hash ?>">
                                <span class="item-span">
                                    <i class="fa fa-minus-circle btn-plus-minus text-danger del-more" data-id="<?= $cart->item_hash ?>" data-toggle="tooltip" title="-1"></i> <span id="sp-qt-<?= $cart->item_hash ?>"><?= ($cart->qtde <= 9) ? "0$cart->qtde" : $cart->qtde ?></span> 
                                    <i class="fa fa-plus-circle  btn-plus-minus text-success add-more" data-id="<?= $cart->item_hash ?>" data-toggle="tooltip" title="+1"></i> &nbsp;
                                    <span data-toggle="tooltip" title="<?= ($cart->opc_nome != "") ? $cart->opc_nome : $cart->item_nome ?>"><?= Filter::cut($cart->item_nome, 15, '... &nbsp;') ?> 
                                        <span class="pull-right mar-right-3" data-toggle="tooltip" title="<?= $cart->qtde ?> x <?= Filter::moeda($cart->item_opc_preco) ?>">R$ <?= Filter::moeda($cart->item_opc_preco * $cart->qtde) ?> </span>
                                    </span>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="carrinho-total">
                            <p class="hide">Taxa de Entrega R$ <?= Filter::moeda($data['config']->config_taxa_entrega) ?></p> 
                            <p><strong>Total Do Pedido R$ 
                                    <?php
                                    if (Carrinho::get_total() > 0):
                                        //echo Filter::moeda(Carrinho::get_total() + $data['config']->config_taxa_entrega);
                                        echo Filter::moeda(Carrinho::get_total());
                                    else:
                                        echo '0,00';
                                    endif;
                                    ?>
                                </strong></p>
                            <p><small>Tempo de Entrega Estimado: <?= $data['config']->config_entrega ?></small></p>
                        </div>
                    </div>
                    <div class="divi-btn-finaliza">
                        <div class="row">
                            <?php if ($data['config']->config_aberto == 1): ?>
                                <a <?php if (Carrinho::get_total() <= 0): ?> disabled<?php endif; ?> href="<?= Http::base() ?>/pedido/" class="btn btn-block btn-success text-uppercase no-radius">
                                    <i class="fa fa-check-circle-o"></i>
                                    fechar pedido
                                </a>
                            <?php else: ?>
                                <button class="btn btn-block btn-danger text-uppercase no-radius" type="button">
                                    <i class="fa fa-clock-o"></i> Estamos Fechados ;(
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="panel-body text-center">
                    <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=218&h=178&src=img/icon-triste.png" alt="..."  class="img-thumbnail img-responsive no-border" >
                    <h4><b>Carrinho Vazio</b></h4>
                    Que tal encontrar algo gostoso <br/>pra comer?
                </div>
            <?php endif; ?>
        </div>       
        <button class="btn btn-xs btn-block btn-warning scroll-to-up hidden-xs"><i class="fa fa-chevron-up"></i> Ir para o topo</button>
        <br><br><br>
    </div>
</div>
