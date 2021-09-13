<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once 'site-base.php'; ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/icon.png">
        <title>Flat Dream</title>
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
                    <h3 class="text-center">Cadastrar Usuário</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="block-flat">
                                <div class="header">							
                                    <h3>Dados do Novo Usuário
                                        <span class="pull-right"><a href="<?= Http::base() ?>/usuario/" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Listar Usuários</a></span>
                                    </h3>
                                </div>
                                <div class="content">
                                    <form action="<?= Http::base() ?>/usuario/gravar/" method="post" role="form" autocomplete="off"> 
                                        <div class="form-group">
                                            <label>Email</label> 
                                            <input type="email" name="usuario_email" id="usuario_email" placeholder="Informe um email válido" class="form-control">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Senha</label> <input type="password" name="usuario_senha" id="usuario_senha" placeholder="Informe a senha de acesso" class="form-control">
                                        </div> 
                                        <button class="btn btn-primary" type="submit">Gravar</button>
                                        <button class="btn btn-default">Cancelar</button>
                                    </form>
                                </div>
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
            <?php //require_once 'switch_color.php'; ?>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
            <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
    </body>
</html>
