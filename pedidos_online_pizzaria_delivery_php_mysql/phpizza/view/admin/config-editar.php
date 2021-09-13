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
        <link rel="stylesheet" type="text/css" href="js/jquery.select2/dist/css/select2.css" />
        <link rel="stylesheet" href="<?= Http::base() ?>/assets/vendor/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?= Http::base() ?>/assets/vendor/html5/html5.js"></script>
          <script src="<?= Http::base() ?>/assets/vendor/html5/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="js/bootstrap.summernote/dist/summernote.css" />
        <link href="css/style.css" rel="stylesheet" />	
        <link href="css/btn-upload.css" rel="stylesheet" />	
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
                    <h3 class="text-center">Configurações</h3>
                    <div class="block-flat">
                        <div class="header">							
                            <h3>Configurações do Sistema</h3>
                        </div>
                        <div class="content">
                            <form action="<?= Http::base() ?>/config/gravar/" method="post" role="form" autocomplete="off" enctype="multipart/form-data"> 
                                <input type="hidden" name="config_id" id="config_id" value="<?= $data['config']->config_id ?>">                                        
                                <div class="row">

                                    <div class="form-group">
                                        <label for="config_nome">Nome da empresa <span class="text-danger">*</span></label> 
                                        <input type="text" name="config_nome" id="config_nome" class="form-control" placeholder="Informe o nome da empresa" 
                                               value="<?= $data['config']->config_nome ?>" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="config_horario">Horário de funcionamento <span class="text-danger">*</span></label> 
                                                <input type="text" name="config_horario" id="config_horario" class="form-control" placeholder="Informe o horário de funcionamento" 
                                                       value="<?= $data['config']->config_horario ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="config_entrega">Tempo estimado da entrega <span class="text-danger">*</span></label> 
                                                <input type="text" name="config_entrega" id="config_entrega" class="form-control" placeholder="Tempo estimado para entrega ex: 40-65 minu" 
                                                       value="<?= $data['config']->config_entrega ?>" required>
                                            </div>                                                
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="config_taxa_entrega">Taxa de entrega <span class="text-danger">*</span></label> 
                                                <input type="text" name="config_taxa_entrega" id="config_taxa_entrega" class="form-control" placeholder="Taxa de entrega" 
                                                       value="<?= $data['config']->config_taxa_entrega ?>" required>
                                            </div>                                                
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="config_nome">Telefone Principal<span class="text-danger">*</span></label> 
                                                <input type="text" name="config_fone1" id="config_fone1" class="form-control fone" placeholder="Informe um telefone" 
                                                       value="<?= $data['config']->config_fone1 ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="config_nome">Telefone </label> 
                                                <input type="text" name="config_fone2" id="config_fone2" class="form-control fone" placeholder="Informe um telefone" 
                                                       value="<?= $data['config']->config_fone2 ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="config_nome">Telefone </label> 
                                                <input type="text" name="config_fone3" id="config_fone3" class="form-control fone" placeholder="Informe um telefone" 
                                                       value="<?= $data['config']->config_fone3 ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="config_desc">Logotipo</label>
                                                <br> <br><br>
                                                <?php if ($data['config']->config_foto != ""): ?>
                                                    <img src="<?= Http::base() ?>/midias/thumb.php?zc=1&w=230&hd=160&src=logo/<?= $data['config']->config_foto; ?>" alt="Foto" class="img-responsive"/>
                                                <?php else : ?>
                                                    <img src="<?= Http::base() ?>/midias/thumb.php?zc=1&w=195&h=160&src=img/sem_foto.jpg<?= $data['config']->config_foto; ?>" alt="Foto" class="img-responsive"/>
                                                <?php endif; ?>
                                            </div>      
                                            <br> <br>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-danger btn-file btn-block">
                                                    <span class="fileinput-exists">
                                                        <i class="fa fa-retweet"></i>
                                                        Trocar Logo 
                                                    </span>
                                                    <input type="file" id="config_foto" name="config_foto" class="form-control">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="config_desc">Sobre Nós</label> 
                                            <textarea name="config_desc" id="config_desc" name="config_desc" class="form-control"><?= $data['config']->config_desc ?></textarea>
                                        </div>  
                                    </div>  
                                    <p class="text-center">
                                        <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-check-circle-o"></i> Gravar Dados</button>
                                    </p>
                                </div>
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
        <script type="text/javascript" src="js/jquery.select2/dist/js/select2.js"></script>
        <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= Http::base() ?>/assets/vendor/uf-combo/cidades-estados-1.4-utf8.js" charset="utf-8"></script>
        <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        <script type = "text/javascript" src = "js/bootstrap.summernote/dist/summernote.min.js" ></script>
        <?php require_once 'switch-color.php'; ?>
        <script src="app-js/main.js"></script>
        <script src="app-js/config.js"></script>
        <script type="text/javascript">
            $('#menu-config-site').addClass('active');
<?php if (isset($_GET['success'])): ?>
                _alert_success();
<?php endif; ?>
        </script>        
        <script>
            $('#config_taxa_entrega').mask("#.##0,00", {reverse: true});
        </script>
        <script src="js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
        <script src="js/jquery.parsley/dist/pt-br.js" type="text/javascript"></script>             
    </body>
</html>
