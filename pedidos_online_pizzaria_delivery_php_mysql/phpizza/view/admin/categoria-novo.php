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
                    <h3 class="text-center">Cadastrar Categoria</h3>
                    <div class="block-flat">
                        <div class="header">							
                            <h3>Dados da Categoria
                                <span class="pull-right"><a href="<?= Http::base() ?>/categoria/" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Listar Categorias</a></span>
                            </h3>
                        </div>
                        <div class="content">
                            <form action="<?= Http::base() ?>/categoria/gravar/" method="post" role="form" autocomplete="off"> 
                                <div class="col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label>Nome completo</label> 
                                        <input type="text" name="categoria_nome" id="categoria_nome" class="form-control" placeholder="Informe o nome do contato responsável" required />
                                    </div>                                                                               
                                </div>    
                                <div class="col-md-3 col-xs-12">
                                    <div class="form-group">
                                        <label for="categoria_meia">Meio a Meio?</label> 
                                        <select  name="categoria_meia"  id="categoria_meia" 
                                                 class="form-control">
                                            <option value="0">Não</option>         
                                            <option value="1">Sim</option>         
                                        </select>
                                    </div>  
                                </div>                                      
                                <div class="col-md-3 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Ordem de Exibição</label> 
                                            <input type="text" name="categoria_pos" id="categoria_nome" class="form-control" placeholder="Informe a posição da categoria" required>
                                        </div>                                                                               
                                    </div>                                                                               
                                </div>                                                                               
                                <div class="col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Categoria ID</label> 
                                            <input type="text" name="categoria_ref" id="categoria_ref" class="form-control" placeholder="ID da Categoria">
                                        </div>                                                                               
                                    </div>                                                                               
                                </div>                                                                               
                                <p class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-check-circle-o"></i> Gravar Dados</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>				
            </div>                    
        </div>
        <!-- Right Chat-->
        <?php //require_once 'side-right-chat.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.cooki/jquery.cooki.js"></script>
        <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
        <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
        <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
        <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="js/behaviour/core.js"></script>
        <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= Http::base() ?>/assets/vendor/uf-combo/cidades-estados-1.4-utf8.js" charset="utf-8"></script>
        <?php require_once 'switch-color.php'; ?>
        <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
        <script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
        <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="app-js/categoria.js"></script>
        <script type="text/javascript">
            $('#menu-categoria').addClass('active');
        </script>
        <script src="js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
        <script src="js/jquery.parsley/dist/pt-br.js" type="text/javascript"></script>            
    </body>
</html>
