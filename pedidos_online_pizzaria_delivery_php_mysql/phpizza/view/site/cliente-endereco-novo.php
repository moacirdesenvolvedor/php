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
            <div class="content">
                <form action="<?= Http::base() ?>/meu-endereco-salvar/" method="post" role="form" autocomplete="off" enctype="multipart/form-data"> 
                    <input type="hidden" name="endereco_cliente" id="endereco_cliente" value="<?= $data['cliente']->cliente_id ?>">
                    <br/>
                    <h4>
                        <span class="text-danger text-uppercase">
                            <i class="fa fa-map-marker fa-2x"></i>
                            Cadastrar endereço
                        </span>
                    </h4>
                    <br/>
                    <div class="form-group">
                        <label for="endereco_cliente">Local / Apelido </label> 
                        <span class="pull-right">
                            <small><b class="fa fa-info-circle"> Ex: Casa da Praia, Escritório, Tia Maria</b></small>
                        </span>
                        <input type="text" name="endereco_nome" id="endereco_nome"
                               class="form-control" placeholder="ex: Casa, Escritório, Praia" />
                    </div><br/>                                        
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="endereco_cep">CEP</label> 
                                <input type="text" data-mask="cep"  placeholder="EX: 11700-000"  name="endereco_cep"  id="endereco_cep" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="endereco_uf">Estado</label> 
                                <select name="endereco_uf"  id="endereco_uf" class="form-control"  required>
                                    <option value=""> Selecione um estado...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="endereco_cidade">Cidade</label> 
                                <select name="endereco_cidade"  id="endereco_cidade" class="form-control"  required></select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="endereco_bairro">Bairro</label> 
                                <input type="text" placeholder="Ex: Centro"  name="endereco_bairro"  id="endereco_bairro" class="form-control"  required>
                            </div>                                        
                        </div>                                        
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <label for="endereco_endereco">Endereço</label> 
                                <input type="text" placeholder="Ex: Avenida Paulista"  name="endereco_endereco"  id="endereco_endereco" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-xs-12">
                                    <label for="endereco_numero">Número</label> 
                                    <input type="text" placeholder="Ex: 500"  name="endereco_numero"  id="endereco_numero" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-xs-12">
                                <label for="endereco_complemento">Complemento</label>
                                <input type="text" placeholder="Ex: Bloco 5 - Apto 51"  name="endereco_complemento"  id="endereco_complemento" class="form-control">
                            </div>
                        </div>
                    </div><br/>
                    <div class="form-group hidden-xs text-center">
                        <button class="btn btn-success btn-lg btn-endereco-gravar" type="submit" disabled><i class="fa fa-check-circle-o"></i> Gravar</button>
                    </div>
                    <div class="form-group visible-xs">
                        <button class="btn btn-success btn-block btn-lg btn-endereco-gravar" disabled data-dismiss="modal" type="submit">
                            <i class="fa fa-check-circle-o"></i>
                            Gravar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="modal-faixa-cep" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Entrega</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="i-circle warning"><i class="fa-2x fa fa-warning text-danger"></i></div>
                            <h4 class="text-danger">Atenção!</h4>
                            <p>
                                Desculpe, no momento não realizamos entrega na região informada!<br><br>
                                Dúvidas: <br>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <?= $data['config']->config_fone1 ?> &nbsp;
                                    <?= $data['config']->config_fone2 ?> &nbsp;
                                </span>                                   
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fechar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->   
        
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="<?= Http::base() ?>/assets/vendor/uf-combo/cidades-estados-1.4-utf8.js" charset="utf-8"></script>
        <script src="<?= Http::base() ?>/assets/vendor/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript">var baseUri = '<?= Http::base() ?>';</script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/endereco.js"></script>
        <script type="text/javascript">
            $(function () {
                new dgCidadesEstados({
                    cidade: document.getElementById('endereco_cidade'),
                    estado: document.getElementById('endereco_uf')
                });
            });
        </script>
        <script src="<?= Http::base() ?>/assets/vendor/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
        <script src="<?= Http::base() ?>/assets/vendor/jquery.parsley/dist/pt-br.js" type="text/javascript"></script>   
    </body>
</html>