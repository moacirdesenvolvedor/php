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
            <div class="row">
                <div class="cl-mcont">
                    <h3 class="text-center">Cadastrar Cliente</h3>
                    <div class="block-flat">
                        <div class="header">							
                            <h3>Dados Cliente
                                <span class="pull-right"><a href="<?= Http::base() ?>/cliente/" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Listar Clientes</a></span>
                            </h3>
                        </div>
                        <div class="content">
                            <form action="<?= Http::base() ?>/cliente/gravar/" method="post" role="form" autocomplete="off"> 
                                <div class="form-group">
                                    <label>Nome completo</label> <input type="text"  name="cliente_nome"  id="cliente_nome" class="form-control" placeholder="Informe o nome do contato responsável" required>
                                </div>                                        
                                <div class="form-group">
                                    <label>CPF</label> <input type="text" data-mask="cpf" name="cliente_cpf"  id="cliente_cpf" class="form-control" placeholder="Informe o número do documento">
                                </div>                                        
                                <div class="header">							
                                    <h4>Contato</h4>
                                </div>
                                <div class="form-group">
                                    <label>Email</label> <input type="email" name="cliente_email" id="cliente_email" class="form-control" placeholder="informe um email válido"  required>
                                </div>                                             
                                <div class="form-group">
                                    <label>Celular</label> <input type="text" data-mask="phone" placeholder="(99) 99999-9999"  name="cliente_fone2"  id="cliente_fone2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Fone Fixo</label> <input type="text" data-mask="phone" placeholder="(99) 9999-9999"  name="cliente_fone"  id="cliente_fone" class="form-control">
                                </div>                                      
                                <div class="form-group">
                                    <label>Fone Personalizado</label> <input type="text" placeholder="(99) 999-999-999 (WhatsApp)"  name="cliente_fone3"  id="cliente_fone3" class="form-control">
                                </div> 

                                <p class="text-center hidden-xs">
                                    <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-check-circle-o"></i> Gravar Dados</button>
                                </p>
                            </form>
                        </div>
                    </div>				
                </div> 
            </div> 
        </div>
    </body>
    <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/main.js"></script>
</html>