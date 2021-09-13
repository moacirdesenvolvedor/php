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
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
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
                        &nbsp;<i class="fa fa-shopping-cart fa-2x"></i> 
                        &nbsp;Meu Carrinho
                    </div>
                </div>
                <?php if (Carrinho::isfull()): ?>
                    <form action="<?= Http::base() ?>/pedido/confirmar/" method="post" onsubmit="return validaPagamento()">
                        <div class="panel-body">
                            <h4 class="text-center carrinho-bg">Confira os itens do seu Pedido</h4>
                            <div class="itens-cart">
                                <?php foreach (Carrinho::get_all() as $cart): ?>
                                    <div class="item" id="list-item-<?= $cart->item_hash ?>">
                                        <span class="item-span">
                                            <i class="fa fa-minus-circle btn-plus-minus text-danger del-more btn-reload" data-id="<?= $cart->item_hash ?>" data-toggle="tooltip" title="-1"></i> <span id="sp-qt-<?= $cart->item_hash ?>"><?= ($cart->qtde <= 9) ? "0$cart->qtde" : $cart->qtde ?></span> 
                                            <i class="fa fa-plus-circle  btn-plus-minus text-success add-more btn-reload" data-id="<?= $cart->item_hash ?>" data-toggle="tooltip" title="+1"></i> &nbsp;
                                            <span>
                                                <?= $cart->item_nome ?> <?= ($cart->opc_nome != "") ? ' - ' . $cart->opc_nome : '' ?>
                                                <?php if (strip_tags($cart->item_desc) != ''): ?>
                                                    <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                    <small><?= strip_tags($cart->item_desc) ?></small>
                                                <?php endif; ?>
                                                <?php if (strip_tags($cart->item_obs) != ''): ?>
                                                    <br>&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; 
                                                    <small class="text-muted"><i><?= strip_tags($cart->item_obs) ?></i></small>
                                                <?php endif; ?>
                                                <span class="pull-right mar-right-3" data-toggle="tooltip" title="<?= $cart->qtde ?> x <?= Filter::moeda($cart->item_opc_preco) ?>">R$ <?= Filter::moeda($cart->item_opc_preco * $cart->qtde) ?> </span>
                                            </span>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr>
                            <div class="text-right">
                                <!-- <p>Taxa de Entrega R$ <?= Filter::moeda($data['config']->config_taxa_entrega) ?></p>  -->
                                <p>Taxa de Entrega <span id="taxa-faixa"></span></p> 
                                <p><strong>Total do Pedido <span id="pedido-total">R$ <?php
                                            if (Carrinho::get_total() > 0) {
                                                //echo Filter::moeda(Carrinho::get_total() + $data['config']->config_taxa_entrega);
                                                echo Filter::moeda(Carrinho::get_total(), 'usd');
                                            } else {
                                                echo '0,00';
                                            }
                                            ?></span></strong></p>
                                <p><small>Tempo de Entrega Estimado: <?= $data['config']->config_entrega ?></small></p>
                                <div class="hide">
                                <input type="hidden" name="pedido_total" id="pedido_total" value="<?php echo Filter::moeda(Carrinho::get_total() + $data['config']->config_taxa_entrega, 'double'); ?>" />
                                <input type="hidden" name="pedido_entrega" id="pedido_entrega" value="<?php echo Filter::moeda($data['config']->config_taxa_entrega, 'double'); ?>" />
                                <input type="hidden" name="pedido_entrega_prazo" id="pedido_entrega_prazo" value="<?= $data['config']->config_entrega ?>" />
                                </div>
                            </div>                        
                            <hr>
                            <div class="text-center row">
                                <h4>Nos diga onde deseja receber seu pedido</h4>
                                <?php foreach ($data['endereco'] as $end) : ?>
                                    <div class="col-md-4 text-center margin-top-2">
                                        <!--  <button class="btn btn-primary"> -->
                                        <div class="carrinho-bg">
                                            <h4><b><?= $end->endereco_nome ?></b></h4>
                                            <small>
                                                <?= $end->endereco_endereco ?>,
                                                <?= $end->endereco_numero ?>,
                                                <?php if ($end->endereco_complemento != ""): ?>
                                                    <?= $end->endereco_complemento ?> -
                                                <?php endif; ?>
                                                <?= $end->endereco_cidade ?> -
                                                <?= $end->endereco_uf ?>
                                            </small>
                                            <input type="radio" name="pedido_local" id="pedido_local" class="pedido_local form-control no-shadow"
                                                   value="<?= $end->endereco_id ?>" data-cep="<?= $end->endereco_cep ?>" />
                                            <!--  </button> -->
                                        </div>                                    
                                    </div>                                    
                                <?php endforeach; ?>
                                <br/><br/>
                            </div>
                            <p class="text-right">
                                <br/>
                                <a href="<?= Http::base() ?>/novo-endereco/" class="btn btn-xs btn-warning"><i class="fa fa-plus-circle"></i> novo endereço</a>
                            </p>
                            <hr>
                            <div class="form-group">
                                <label>Deseja incluir alguma observação ao seu pedido?</label>
                                <textarea class="form-control" name="pedido_obs" id="pedido_obs" rows="4"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Qual a forma de pagamento?</label>
                                <select class="form-control" id="forma-pagamento" required>
                                    <option value="">Selecione uma forma de pagamento...</option>
                                    <option value="1">Dinheiro</option>
                                    <option value="2">Cartão de Débito</option>
                                    <option value="3">Cartão de Crédito</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group hide"  id="forma-pagamento-troco-bandeira">
                                <label id="troco-bandeira-label">Troco para quanto?</label>
                                <input type="text" id="troco-bandeira" name="troco-bandeira" class="form-control" required />
                            </div>
                            <input type="hidden" id="pedido_obs_pagto" name="pedido_obs_pagto" />
                            <br><br>
                            <div class="divi-btn-finaliza">
                                <div class="row">
                                    <?php if (ClienteSessao::get_id() > 0): ?>
                                        <?php if ($data['config']->config_aberto == 1): ?>
                                            <button type="submit" disabled class="btn btn-block btn-success text-uppercase no-radius" id="btn-pedido-concluir" 
                                                    <?php if (Carrinho::get_total() <= 0): ?> disabled<?php endif; ?>>
                                                <i class="fa fa-check-circle-o"></i>
                                                Confirmar e fechar pedido
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-block btn-danger text-uppercase no-radius" type="button">
                                                <i class="fa fa-clock-o"></i> Estamos Fechados ;(
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?= Http::base() ?>/entrar/" class="btn btn-block btn-danger text-uppercase no-radius">
                                            <i class="fa fa-sign-in"></i>
                                            Efetue o Login para concluir seu pedido
                                        </a>                                    
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else : ?>
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="container-fluid">
                                <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=218&h=178&src=img/icon-triste.png" alt="..."  class="img-responsive">
                            </div>
                        </div>
                        <div class="text-center">
                            <h4><b>Vazio</b></h4>
                        </div>
                        <p class="text-center">
                            Que tal encontrar algo gostoso <br/>pra comer?
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once 'footer-core-js.php'; ?>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/carrinho.js"></script>
        <script type="text/javascript">

                        Number.prototype.formatMoney = function (places, symbol, thousand, decimal) {
                            places = !isNaN(places = Math.abs(places)) ? places : 2;
                            symbol = symbol !== undefined ? symbol : "R$ ";
                            thousand = thousand || ",";
                            decimal = decimal || ".";
                            var number = this,
                                    negative = number < 0 ? "-" : "",
                                    i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
                                    j = (j = i.length) > 3 ? j % 3 : 0;
                            return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
                        };

                        var baseUri = '<?= Http::base() ?>';
                        var totalCompra = '<?= Filter::moeda(Carrinho::get_total(), 'US') ?>';
                        $('.btn-reload').on('click', function () {
                            window.location.reload();
                        });

                        $('.pedido_local').on('click', function () {
                            if ($(this).val() > 0) {
                                $('#btn-pedido-concluir').removeAttr('disabled');
                                var cep = $(this).data('cep');
                                var url = baseUri + '/local/getfaixa/';
                                $.post(url, {cep: cep}, function (rs) {
                                    if (rs == '-1') {
                                        $('#btn-pedido-concluir').attr('disabled', 'disabled');
                                        return false;
                                    } else {
                                        var total = parseFloat(totalCompra) + parseFloat(rs);
                                        var taxa = parseFloat(rs);
                                        $('#pedido_total').val(total.formatMoney(2, ''))
                                        $('#pedido_entrega').val(taxa)
                                        $('#pedido-total').html(total.formatMoney());
                                        $('#taxa-faixa').html(taxa.formatMoney());
                                    }
                                });

                                //scroll_to('btn-pedido-concluir');
                            }
                        });

                        $('#forma-pagamento').on('change', function () {
                            scroll_to('btn-pedido-concluir');
                            var forma = $('#forma-pagamento').val();
                            if (forma > 1) {
                                var cartao = $('#forma-pagamento option:selected').text();
                                $('#troco-bandeira-label').text('Informe a bandeira de seu cartão: (ex: Visa, Master, Elo...)');
                                $('#troco-bandeira').attr('placeholder', 'Informe a bandeira de seu cartão ex: Visa, Master, Elo...');
                            } else {
                                $('#troco-bandeira-label').text('Troco para quanto?');
                                $('#troco-bandeira').attr('placeholder', 'Informe para quanto precisa de troco');
                                //$('#troco-bandeira').on('keyup', function () {
                                // var troco = parseFloat($(this).val());
                                //  $(this).val(troco.formatMoney(2, ''))
                                //})
                            }
                            $('#forma-pagamento-troco-bandeira').removeClass('hide').show();
                        });

                        function validaPagamento() {
                            var forma = $('#forma-pagamento').val();
                            var troco_bandeira = $('#troco-bandeira').val();
                            var pagto;
                            if (forma === "" || troco_bandeira === "") {
                                return false;
                            } else {

                                if (forma == 1) {
                                    pagto = "Dinheiro - troco para: " + troco_bandeira;
                                }
                                if (forma == 2) {
                                    pagto = "Cartão de Débito: " + troco_bandeira;
                                }
                                if (forma == 3) {
                                    pagto = "Cartão de Crédito: " + troco_bandeira;
                                }
                            }
                            $('#btn-pedido-concluir').on('click', function () {
                                $(this).hide();
                            });
                            //var obs = $('#pedido_obs').val();
                            $('#pedido_obs_pagto').val(pagto);
                        }
        </script>
    </body>
</html>            