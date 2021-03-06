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
    <link rel="stylesheet" type="text/css" href="<?= Http::base() ?>/assets/vendor/jquery.gritter/css/jquery.gritter.css" />
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
<br/><br/>
<div class="hidden-xs"><br/><br/><br/></div>
<div class="container">
    <div class="row">
        <div id="cl-wrapper">
            <div class="content col-md-offset-4">
                <form action="<?= Http::base() ?>/muda_senha/<?= (isset($data['carrinho'])) ? '?carrinho' : '' ?>" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <input type="hidden" name="cliente_id" value="<?= $data['cliente']->cliente_id ?>">
                        <div class="form-group">
                            <label for="cliente_email">Senha</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-2x"></i></span>
                                <input type="password" name="cliente_senha" id="cliente_senha" class="form-control input-lg" placeholder="Informe a senha" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-lg" data-dismiss="modal" type="submit">
                                <i class="fa fa-lock"></i>
                                ALTERAR SENHA
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery.ui/jquery-ui.js" ></script>
<script type="text/javascript" src="<?= Http::base() ?>/assets/vendor/jquery.gritter/js/jquery.gritter.js"></script>
<script type="text/javascript">
    $(function () {
        $("#cl-wrapper").css({opacity: 1, 'margin-left': 0});
        <?php if (Post::request('incorreto') != '') : ?>
        $.gritter.add({
            title: 'Login/Senha Incorreto',
            text: 'Verifique seus dados de acesso e tente novamente.',
            class_name: 'danger'
        });
        <?php endif; ?>
        <?php if (Post::request('falha') != '') : ?>
        $.gritter.add({
            title: 'Email N??o Enviado',
            text: 'Verifique seu email e tente novamente.',
            class_name: 'danger'
        });
        <?php endif; ?>
        <?php if (Post::request('envio') != '') : ?>
        $.gritter.add({
            title: 'Email de Recupera????o Enviado',
            text: 'Por favor verifique sua caixa de entrada.',
            class_name: 'success'
        });
        <?php endif; ?>


    });
</script>
</html>