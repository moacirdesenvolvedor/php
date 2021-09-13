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
        <br/>
        <div class="container">
            <div class="content">
                <form action="<?= Http::base() ?>/meu-endereco-salvar/" method="post" role="form" autocomplete="off" enctype="multipart/form-data"> 
                    <input type="hidden" name="cliente_id" id="cliente_id" value="<?php $data['cliente']->cliente_id ?>" >
                    <br/>
                    <div class="col-md-8">
                        <h4>
                            <span class="text-danger text-uppercase">
                                <i class="fa fa-map-marker fa-2x"></i>
                                Meus endereços
                            </span>
                        </h4>
                        <br/>
                    </div>
                </form>
                <div class="col-md-4 col-xs-12 text-right">
                    <div class="row">
                        <a href="<?= Http::base() ?>/novo-endereco/" class="btn btn-success btn-lg">
                            <i class="fa fa-plus-circle"></i> Novo Endereço
                        </a>
                    </div>
                </div><br/><br/><br/><br/>
                <?php /* Filter::pre($data['endereco']); */ ?>
                <div class="col-md-12">
                    <div class="row">
                        <?php if (isset($data['endereco'][0])) : ?>
                            <?php foreach ($data['endereco'] as $end) : ?>
                                <div class="well well-sm" id="tr-<?= $end->endereco_id; ?>">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h3><b><?= $end->endereco_nome ?></b></h3>
                                            <p>
                                                <?= $end->endereco_endereco ?>,
                                                <?= $end->endereco_numero ?>,
                                                <?php if ($end->endereco_complemento != ""): ?>
                                                    <?= $end->endereco_complemento ?> -
                                                <?php endif; ?>
                                                <?= $end->endereco_cidade ?> -
                                                <?= $end->endereco_uf ?>
                                            </p>
                                        </div>
                                        <div class="col-md-2" style="line-height: 110px;">
                                            <a class="btn btn-primary" href="<?= Http::base() ?>/editar-endereco/<?= $end->endereco_id; ?>/" title="Editar" data-toggle="tooltip">
                                                <i class="fa fa-edit fa-2x"></i> 
                                            </a>
                                            &nbsp;
                                            <button data-id="<?= $end->endereco_id; ?>" title="Remover" data-toggle="tooltip" 
                                                    class="btn btn-danger btn-endereco-remove">
                                                <i class="fa fa-trash-o fa-2x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 hide">
                                    <button class="btn btn-warning btn-lg"><i class="fa fa-edit fa-2x"></i></button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="alert alert-success">Você precisa cadastrar um endereço para entrega!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-endereco-remove" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Remover Registro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="i-circle warning"><i class="fa-2x fa fa-warning text-danger"></i></div>
                            <h4 class="text-danger">Atenção!</h4>
                            <p>Você está prestes à remover um registro e esta ação não pode ser desfeita. <br /> 
                                Deseja realmente prosseguir?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form name="form-remove" id="form-remove" action="<?= Http::base() ?>/cliente-remover-endereco/" method="post">
                            <input type="hidden" name="endereco_id" id="endereco_id" />
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-warning btn-flat btn-confirma-remove">Prosseguir</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->              
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/plugins/jquery.gritter/js/jquery.gritter.js"></script>  
        <script src="<?= Http::base() ?>/assets/vendor/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/main.js"></script>       
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/endereco.js"></script>     
        <?php if (isset($_REQUEST['success'])) : ?>
            <script type="text/javascript">__alert__success()</script>
        <?php endif; ?>
    </body>
</html>