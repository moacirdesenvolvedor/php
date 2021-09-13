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
        <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
        <link href="css/style.css" rel="stylesheet" />	
    </head>
    <body class="animated">
        <div id="cl-wrapper">
            <div class="cl-sidebar">
                <?php require_once 'side-menu.php'; ?>
            </div>
            <div class="container-fluid" id="pcont">
                <!-- TOP NAVBAR -->
                <?php require_once 'top-menu.php'; ?>
                <div class="cl-mcont">
                    <h3 class="text-center">Opções Cadastradas</h3>
                    <div class="block-flat">
                        <div class="header">							
                            <h3><?= $data['item']->categoria_nome ?> > <?= $data['item']->item_nome ?> > <span class="text-primary">Opções do Item</span>
                                <span class="pull-right">
                                    <!--<button type="button" class="btn btn-primary btn-novo"><i class="fa fa-plus-circle"></i> Cadastrar Novo</button>-->
                                    <a href="<?= Http::base() ?>/opcao/novo/<?= $data['item']->item_id ?>/" class="btn btn-primary btn-novo"><i class="fa fa-plus-circle"></i> Cadastrar Nova Opção</a>
                                    <a href="<?= Http::base() ?>/item/editar/<?= $data['item']->item_id ?>/" class="btn btn-primary btn-editar-item"><i class="fa fa-edit"></i> Editar Item</a>
                                </span>
                            </h3>
                        </div>
                        <div class="content">
                            <div class="table-responsives">
                                <table class="table table-bordered table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th width="125">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($data['opcao'][0])): ?>
                                            <?php foreach ($data['opcao'] as $obj): ?>
                                                <tr class="gradeA" id="tr-<?= $obj->opcao_id ?>">
                                                    <td id="td-nome"><?= $obj->opcao_nome ?></td>
                                                    <td id="td-preco"><?= Filter::moeda($obj->opcao_preco) ?></td>
                                                    <td class="center">
                                                        <a href="<?= Http::base() ?>/opcao/editar/<?= $obj->opcao_id ?>/" title="editar" data-toggle="tooltip"
                                                           class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>
                                                        </a>
                                                        <button data-id="<?= $obj->opcao_id ?>" title="excluir" data-toggle="tooltip" 
                                                                class="btn btn-sm btn-danger btn-remover"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>							
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Right Chat-->
                <?php //require_once 'side-right-chat.php'; ?>
                <div class="modal fade colored-header warning md-effect-10" id="modal-remove" tabindex="-1" role="dialog">
                    <div class="modal-dialog custom-width">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Remover Registro</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>cookie
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="i-circle warning"><i class="fa fa-warning"></i></div>
                                    <h4>Atenção!</h4>
                                    <p>Você está prestes à remover um registro e esta ação não pode ser desfeita. <br /> 
                                        Deseja realmente prosseguir?</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form name="form-remove" id="form-remove" action="<?= Http::base() ?>/opcao/remove/" method="post">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" >Cancelar</button>
                                    <button type="button" class="btn btn-warning btn-flat btn-confirma-remove" >Prosseguir</button>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->       
            </div>     
        </div>     
        <script src="js/jquery.js"></script>
        <script src="js/jquery.cooki/jquery.cooki.js"></script>
        <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
        <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
        <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
        <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="js/behaviour/core.js"></script>
        <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
        <script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
        <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="app-js/main.js"></script>
        <script src="app-js/opcao.js"></script>
        <?php require_once 'switch-color.php'; ?>
        <script type="text/javascript">
            $('#menu-opcao').addClass('active');
            oDt.fnSort([[0, 'asc']]);//ordem da tabela   
<?php if (isset($_GET['success'])): ?>
                _alert_success();
<?php endif; ?>
        </script>
    </body>
</html>
