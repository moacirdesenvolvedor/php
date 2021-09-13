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
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/css/style.css"/>       
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/jquery.select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/jquery.select2/dist/css/select2-bootstrap.min.css">
    </head>
    <body>
        <div class="canvas">
            <?php require_once 'topo.php'; ?>
            <div class="tamh">
                <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="row">
                                <form action="<?= Http::base() ?>/busca/" method="post" role="form"  id="form-busca" autocomplete="off">
                                    <div class="col-md-3 col-xs-3 hide">
                                        <select class="form-control input-lg" name="categoria" id="categoria">
                                            <option value="">Categoria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="">
                                            <select class="select2 input-lg form-control" id="busca" name="busca" autocomplete="off">
                                                <option value=""></option>
                                                <?php foreach ($data['lista_combo'] as $obj) : ?>
                                                    <optgroup label="<?= $obj['categoria'] ?>"> >
                                                        <?php foreach ($obj['item'] as $item) : ?>        
                                                            <option value="<?= $item->item_nome ?>" 
                                                                    data-desc="<?= strip_tags($item->item_desc) ?>" 
                                                                    data-cod="<?= strip_tags($item->item_codigo) ?>"
                                                                    data-obs="<?= strip_tags($item->item_obs) ?>"
                                                                    >
                                                                        <?= $item->item_nome ?> <?= ($item->item_codigo != "") ? " Ref:  $item->item_codigo" : '' ?>
                                                            </option>
                                                        <?php endforeach; ?> 
                                                    </optgroup>
                                                <?php endforeach; ?> 
                                            </select>
                                        </div>
                                        <!--
                                        <input class="form-control input-lg" id="busca" name="busca" placeholder="Buscar..." required value="<?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? Filter::parse_string($_POST['busca']) : '' ?>" />
                                        <span class="input-group-btn <?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? '' : '' ?>">
                                            <button type="submit" class="btn btn-primary input-lg" style="margin-left:-2px"><i class="fa fa-search"></i></button>
                                        </span>
                                        <span class="input-group-btn hide <?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? '' : 'hide' ?>">
                                            <button type="submit" class="btn btn-danger input-lg" id="btn-busca-clear"><i class="fa fa-remove"></i></button>
                                        </span>
                                    </div>
                                        -->
                                    </div>
                                    <br>                                    
                                    <input type="hidden" name="ipt-nome" id="ipt-nome" />
                                    <input type="hidden" name="ipt-cod" id="ipt-cod" />
                                    <input type="hidden" name="ipt-desc" id="ipt-desc" />
                                </form>
                            </div>
                            <br/>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php foreach ($data['lista'] as $obj) : ?>
                                    <?php $categoria_nome = $obj['categoria']; ?>
                                    <?php $categoria_id = $obj['categoria_id']; ?>
                                    <?php $meia = ( $obj['categoria_meia'] == 1) ? TRUE : FALSE; ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading-<?= $categoria_id; ?>">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $categoria_id; ?>" aria-expanded="true" aria-controls="collapse-<?= $categoria_id; ?>">
                                                    <?= $categoria_nome; ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-<?= $categoria_id; ?>" class="panel-collapse collapse <?= (isset($_POST['busca']) && !empty($_POST['busca'])) ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading-<?= $categoria_id; ?>">
                                            <div class="panel-body">
                                                <?php $k = 0; ?>
                                                <?php foreach ($obj['item'] as $item) : ?>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a  data-toggle="tooltip" title="<?= strip_tags($item->item_obs) ?>" >
                                                                <?php if ($item->item_foto != ""): ?>
                                                                    <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=90&h=80&src=item/<?= $item->item_foto ?>" alt="..."  class="media-object img-thumbnail img-responsive">
                                                                <?php else : ?>
                                                                    <img src="<?= Http::base() ?>/midias/thumb.php?zcx=3&w=90&h=80&src=img/sem_foto.jpg" alt="..."  class="media-object img-thumbnail img-responsive">
                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <span class="text-danger"><?= $item->item_nome ?></span>
                                                                <span class="pull-right text-success" id="sp-<?= $item->item_id ?>">
                                                                    <small style="padding-right:30px;"><?= ($item->item_codigo != "") ? "cód. $item->item_codigo" : "" ?></small>
                                                                    <b style="color:#EC971F">R$ <?= Filter::moeda($item->item_preco) ?></b>
                                                                </span>
                                                            </h4>
                                                            <div style="min-height: 30px">
                                                                <span class="text-success"><?= strip_tags($item->item_desc) ?> </span>
                                                            </div>
                                                            <div class="pull-right">

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
                                                                    <br>
                                                                <?php endif; ?>

                                                                <button type="button" 
                                                                        data-id="<?= $item->item_id; ?>" 
                                                                        data-nome="<?= $item->item_nome; ?>" 
                                                                        data-obs="<?= strip_tags($item->item_obs); ?>" 
                                                                        data-desc="<?= strip_tags($item->item_desc); ?>" 
                                                                        data-categoria="<?= $item->categoria_id; ?>" 
                                                                        data-preco="<?= $item->item_preco; ?>" 
                                                                        data-nome="<?= $item->item_nome; ?>" 
                                                                        data-cod="<?= $item->item_codigo; ?>" 
                                                                        class="btn btn-xs btn-primary add-item"
                                                                        title="1 SABOR - <?= $item->item_nome; ?>"> 
                                                                    <i class="fa fa-plus-circle"></i> Adicionar</button>  

                                                                <?php if ($meia) : ?>
                                                                    <?php $pizza[] = $item; ?> &nbsp;
                                                                    <button type="button" 
                                                                            data-id="<?= $item->item_id; ?>" 
                                                                            data-nome="<?= $item->item_nome; ?>" 
                                                                            data-obs="<?= strip_tags($item->item_obs); ?>" 
                                                                            data-desc="<?= strip_tags($item->item_desc); ?>" 
                                                                            data-categoria="<?= $item->categoria_id; ?>" 
                                                                            data-preco="<?= $item->item_preco; ?>" 
                                                                            data-nome="<?= $item->item_nome; ?>" 
                                                                            data-cod="<?= $item->item_codigo; ?>"                                                                             
                                                                            class="btn btn-xs btn-primary add-meia"
                                                                            title="2 SABORES"
                                                                            >
                                                                        <i class="fa fa-pie-chart"></i> Meio a Meio</button>  
                                                                <?php endif; ?>

                                                            </div>
                                                        </div>   
                                                    </div>   
                                                    <?php $k++; ?>
                                                    <?php if (count($obj['item']) != $k): ?>
                                                        <hr />
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="visible-xs" style="position: fixed; bottom:10px;left:33%">
                                <button class="btn btn-xs btn-block btn-warning scroll-to-up"><i class="fa fa-chevron-up"></i> Ir para o topo</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 hidden-xs">
                            <div id="side-carrinho" style="position: fixed">
                                <?php require 'side-carrinho.php'; ?>           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navmenu navmenu-default navmenu-fixed-right" id="side-carrinho-mobile" style="overflow-x: hidden">
            <?php require 'side-carrinho.php'; ?>            
        </div>     


        <div class="modal fade" id="modal-pizza-meia" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Pizza Meio a Meio</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <Br>
                            <div class="i-circle warning hide"><i class="fa-2x fa fa-warning text-danger"></i></div>
                            <h4 class="text-danger">Selecione os 2 sabores desejados!</h4>
                            <Br>
                        </div>
                        <div class="row">
                            <div class="col-md-6  col-xs-12">
                                <?php if (isset($data['meia'][0])): ?>
                                    <?php $pizza = $data['meia']; ?>
                                    <select class="form-control combo-meia-s1 combo-meia" required>
                                        <option value="">SABOR 1</option>
                                        <?php foreach ($pizza as $pp): ?>    
                                            <optgroup data-id="<?php echo $pp['categoria_id']; ?>" label="<?php echo $pp['categoria']; ?>">
                                                <?php foreach ($pp['item'] as $p): ?>    
                                                    <option 
                                                        value="<?php echo $p->item_id; ?>"
                                                        data-id="<?= $p->item_id; ?>" 
                                                        data-nome="<?= $p->item_nome; ?>" 
                                                        data-obs="<?= strip_tags($p->item_obs); ?>" 
                                                        data-desc="<?= strip_tags($p->item_desc); ?>" 
                                                        data-categoria="<?= $p->categoria_id; ?>" 
                                                        data-preco="<?= $p->item_preco; ?>" 
                                                        data-nome="<?= $p->item_nome; ?>" 
                                                        data-cod="<?= $p->item_codigo; ?>"><?php echo $p->item_nome; ?></option>
                                                    <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>                                
                                <?php endif; ?>                        
                                <br />
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <?php if (isset($data['meia'][0])): ?>
                                    <?php $pizza = $data['meia']; ?>
                                    <select class="form-control combo-meia-s2 combo-meia" required>
                                        <option value="">SABOR 2</option>
                                        <?php foreach ($pizza as $pp): ?>    
                                            <optgroup data-id="<?php echo $pp['categoria_id']; ?>" label="<?php echo $pp['categoria']; ?>">
                                                <?php foreach ($pp['item'] as $p): ?>    
                                                    <option 
                                                        value="<?php echo $p->item_id; ?>"
                                                        data-id="<?= $p->item_id; ?>" 
                                                        data-nome="<?= $p->item_nome; ?>" 
                                                        data-obs="<?= strip_tags($p->item_obs); ?>" 
                                                        data-desc="<?= strip_tags($p->item_desc); ?>" 
                                                        data-categoria="<?= $p->categoria_id; ?>" 
                                                        data-preco="<?= $p->item_preco; ?>" 
                                                        data-nome="<?= $p->item_nome; ?>" 
                                                        data-cod="<?= $p->item_codigo; ?>"><?php echo $p->item_nome; ?></option>
                                                    <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>    
                                <Br><Br>
                            </div>
                            <div class="text-center">
                                <span id="meia-total"></span>
                            </div>                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form name="form-pizza-meia" id="form-pizza-meio" method="post">
                            <button type="button" class="btn btn-success btn-flat btn-confirma-meia" disabled>
                                <i class="fa fa-plus-circle"></i> Adicionar</button>
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">
                                <i class="fa fa-check-circle-o"></i>  Voltar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'footer-core-js.php'; ?>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/number.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/carrinho.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery.select2/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery.select2/dist/js/i18n/pt-BR.js"></script>
        <script type="text/javascript">
        <?php if (isset($_POST['busca']) && !empty($_POST['busca'])): ?>
                $('#busca').val('A');
                $('.add-item').addClass('returnIndex');
        <?php endif; ?>
            $('.select2').select2({
                "language": "pt-BR",
                //minimumInputLength: 3,
                placeholder: "Digite aqui o que você deseja...",
            });
            if ($(window).height() <= 700) {
                // $('.scroll-to-up').remove();
            }
            $('.add-meia').on('click', function () {
                var id = $(this).data('id');
                var cat = $(this).data('categoria');
                $('.combo-meia-s1 optgroup').each(function (k, v) {
                    if ($(this).data('id') != cat) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
                $('.combo-meia-s2 optgroup').each(function (k, v) {
                    if ($(this).data('id') != cat) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
                $('#modal-pizza-meia').modal('show');
                setTimeout(function () {
                    $('.combo-meia-s1').val(id);
                }, 500)
            });

            $('.combo-meia').on('change', function () {
                var $s1 = $('.combo-meia-s1 option:selected');
                var $s2 = $('.combo-meia-s2 option:selected');
                if ($s1.val() > 0 && $s2.val() > 0) {
                    //console.log($s1.data('preco'));
                    //console.log($s2.data('preco'));
                    var preco_item = $.number(((parseFloat($s1.data('preco')) + parseFloat($s2.data('preco'))) / 2), 2);
                    $('#meia-total').html('<b>Valor do item R$ ' + preco_item + '</b><br> Preço definido pela média entre os preços dos 2 sabores escolhidos!');
                    $('.btn-confirma-meia').removeAttr('disabled');
                } else {
                    $('.btn-confirma-meia').attr('disabled', 'disabled');
                }
            });

            $('.btn-confirma-meia').on('click', function () {
                var $s1 = $('.combo-meia-s1 option:selected');
                var $s2 = $('.combo-meia-s2 option:selected');
                if ($s1.val() > 0 && $s2.val() > 0) {
                    var item_preco = $.number(((parseFloat($s1.data('preco')) + parseFloat($s2.data('preco'))) / 2), 2);
                    var item_id = 1;
                    var item_nome = 'MEIO A MEIO ' + '(' + $s1.data('nome') + ' e ' + $s2.data('nome') + ')';
                    var item_categoria = 1;
                    var item_obs = 'Sabor 1: ' + $s1.data('nome') + ' Sabor 2: ' + $s2.data('nome');
                    var item_desc = 'Descrição 1: ' + $s1.data('desc') + ' Descrição 2: ' + $s2.data('desc')
                    var item_cod = '999'; //MEIA
                    var opc_preco = 0;
                    var opc_id = 0;
                    var opc_nome = '';
                    //opc_preco = parseFloat(opc_preco);
                    var preco_item = parseFloat(((parseFloat($s1.data('preco')) + parseFloat($s2.data('preco'))) / 2));
                    var dados = {
                        item_id: item_id,
                        item_nome: item_nome,
                        item_categoria: item_categoria,
                        item_obs: item_obs,
                        item_desc: item_desc,
                        item_preco: preco_item,
                        item_codigo: item_cod,
                        opc_id: opc_id,
                        opc_preco: opc_preco,
                        opc_nome: opc_nome,
                        item_opc_preco: preco_item
                    }
                    var url = baseUrl + '/carrinho/add/';
                    $.post(url, dados, function (rs) {
                        rebind_reload();
                        $('#modal-pizza-meia').modal('hide');
                        $('.collapse').removeClass('in');
                    });
                    $('.combo-meia-s2').val('');
                    $('.btn-confirma-meia').attr('disabled', 'disabled');
                }
            });

            $('.btns-buy button').tooltip();
            $('#busca').on('change', function () {
                var desc = $('#busca option:selected').data('desc');
                var obs = $('#busca option:selected').data('obs');
                var cod = $('#busca option:selected').data('cod');
                var item = $('#busca option:selected').val();
                var term = item;
                if (desc != "") {
                    term += '|#|' + desc;
                }
                if (cod != "") {
                    term += '|#|' + cod;
                }
                if (obs != "") {
                    term += '|#|' + obs;
                }
                $('#ipt-busca').val(term);
                $('#ipt-nome').val(item);
                $('#ipt-desc').val(desc);
                $('#ipt-cod').val(cod);
                $('#ipt-obs').val(obs);
                if ($('#busca').val() != "") {
                    $('#form-busca').submit();
                }
            });
        </script>
    </body>
</html>