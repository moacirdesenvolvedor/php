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
        <link rel="stylesheet" href="<?= Http::base() ?>/view/site/plugins/jquery.gritter/css/jquery.gritter.css"/>        
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
            <div class="content">
                <form action="<?= Http::base() ?>/meu-cadastro-salvar/" method="post" role="form" autocomplete="off" enctype="multipart/form-data"> 
                    <br/>
                    <h4 class="text-uppercase">Dados Pessoais
                        <span class="pull-right">
                            <a class="btn btn-success btn-lg" href="<?= Http::base() ?>/meus-enderecos/">
                                <i class="fa fa-map-marker"></i>
                                Meus Endereços
                            </a>                           
                        </span>
                    </h4>
                    <br/>
                    <hr />
                    <div class="form-group">
                        <label for="cliente_nome">Nome completo</label> 
                        <input type="hidden" name="cliente_id" value="<?= $data['cliente']->cliente_id ?>" />
                        <input type="text" name="cliente_nome"  id="cliente_nome" class="form-control" value="<?= $data['cliente']->cliente_nome ?>"
                               placeholder="Informe seu nome completo" required>
                    </div>                                        
                    <div class="form-group">
                        <label for="cliente_cpf">CPF</label> 
                        <input type="text" data-mask="cpf" name="cliente_cpf"  id="cliente_cpf" value="<?= $data['cliente']->cliente_cpf ?>"
                               class="form-control" placeholder="Informe o número do documento">
                    </div>
                    <br/>
                    <div class="header">							
                        <h4 class="text-uppercase">Contato</h4>
                        <hr />
                    </div>
                    <div class="form-group">
                        <label for="cliente_fone2">Celular</label> 
                        <input type="text" data-mask="cell" placeholder="(99) 99999-9999"  name="cliente_fone2"  id="cliente_fone2" value="<?= $data['cliente']->cliente_fone2 ?>"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cliente_fone">Fone Fixo</label> 
                        <input type="text" data-mask="phone" placeholder="(99) 9999-9999"  name="cliente_fone"  id="cliente_fone" class="form-control" value="<?= $data['cliente']->cliente_fone ?>">
                    </div>                                      
                    <div class="form-group">
                        <label for="cliente_fone3">Fone Personalizado</label> 
                        <input type="text" placeholder="(99) 999-999-999 (WhatsApp)"  name="cliente_fone3"  id="cliente_fone3" class="form-control" value="<?= $data['cliente']->cliente_fone3 ?>">
                    </div>   
                    <div class="form-group">
                        <label for="cliente_email">Email</label> 
                        <input type="email" name="cliente_email" id="cliente_email" class="form-control" placeholder="informe um email válido"  required value="<?= $data['cliente']->cliente_email ?>">
                    </div>                                             
                    <div class="form-group">
                        <label for="cliente_senha">Senha</label> 
                        <input type="password" name="cliente_senha" id="cliente_senha" class="hide"/>
                        <input type="password" name="cliente_senha" id="cliente_senha" class="form-control" placeholder="somente se desejar alterar a senha" >
                    </div><br/>      
                    <div class="text-center hidden-xs">
                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-refresh"></i> Atualizar meus dados</button>
                        </div>
                    </div>
                    <div class="form-group visible-xs">
                        <button class="btn btn-success btn-block btn-lg" data-dismiss="modal" type="submit">
                            <i class="fa fa-refresh"></i>
                            Atualizar meus dados
                        </button>
                    </div>
                </form>
            </div>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
        </div>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/plugins/jquery.gritter/js/jquery.gritter.js"></script>       
        <script src="<?= Http::base() ?>/assets/vendor/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/main.js"></script>       
        <script type="text/javascript" src="<?= Http::base() ?>/view/site/app-js/cliente.js"></script>       

        <?php if (isset($_REQUEST['success'])) : ?>
            <script type="text/javascript">__alert__success()</script>
        <?php endif; ?>    
    </body>
</html>