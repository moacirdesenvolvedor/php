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
                    <h3 class="text-center">Cadastrar Item</h3>
                    <div class="block-flat">
                        <div class="header">
                            <h3>Novo Item
                                <span class="pull-right"><a href="<?= Http::base() ?>/item/" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Listar Itens</a></span>
                            </h3>
                        </div>
                        <div class="content">
                            <form action="<?= Http::base() ?>/item/gravar/" method="post" role="form" autocomplete="off" enctype="multipart/form-data"> 
                                <div class="row">
                                    <div class="col-md-10 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label>Código</label> 
                                                    <input type="text" name="item_codigo" id="item_codigo" class="form-control" placeholder="Referência">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Nome da categoria <span class="text-danger">*</span></label> <br>
                                                    <select name="item_categoria" id="item_categoria" class="form-controls">
                                                        <option value="">Selecione uma categoria...</option>
                                                        <?php if (isset($data['categoria'][0])): ?>
                                                            <?php foreach ($data['categoria'] as $cat): ?>
                                                                <option value="<?= $cat->categoria_id ?>"><?= $cat->categoria_nome ?> </option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>                                                
                                                    </select>
                                                </div>   
                                            </div>   
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>Nome do item <span class="text-danger">*</span></label> <input type="text" name="item_nome" id="item_nome" class="form-control" placeholder="Informe o nome do item" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label>Preço do item <span class="text-danger">*</span></label> <input type="text" name="item_preco" id="item_preco" class="form-control" placeholder="Informe o preço do item" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group">
                                            <img src="<?= Http::base() ?>/midias/thumb.php?zcc=3&w=440&h=250&src=img/sem_foto.jpg" alt="Foto" class="img-responsive"/>
                                        </div>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn btn-primary btn-file btn-block">
                                                <span class="fileinput-exists">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    Foto
                                                </span>
                                                <input type="file" id="item_foto" name="item_foto" class="form-control">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="item_desc">Descrição Breve</label> 
                                    <textarea name="item_desc" id="item_desc" class="form-control"></textarea>
                                </div>         
                                <br>
                                <div class="form-group">
                                    <label for="item_desc">Ingredientes</label> 
                                    <textarea  id="item_obs" name="item_obs" class="form-control"></textarea>
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
        <script src="app-js/item.js"></script>
        <script type="text/javascript" src="js/jquery.mask.js"></script>
        <script type="text/javascript" src="js/bootstrap.summernote/dist/summernote.min.js"></script>
        <script type="text/javascript" src="js/jquery.select2/dist/js/select2.js"></script>
        <script>$("#item_categoria").select2({'width':'100%'});</script>
        <script type="text/javascript">
            $('#menu-item').addClass('active');
            $('#item_desc').summernote({
                height: 100
            });
            $('#item_obs').summernote({
                height: 100
            });
        </script>
        <script src="js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
        <script src="js/jquery.parsley/dist/pt-br.js" type="text/javascript"></script>            
    </body>
</html>
