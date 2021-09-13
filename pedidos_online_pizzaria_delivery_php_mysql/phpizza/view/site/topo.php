<div class="topo" id="topo">
    <div class="container">
        <div class="row">
            <p class="text-white">
                <br class="hidden-xs">
                <span class="pull-right">
                    <i class="fa fa-phone"></i>
                    <?= $data['config']->config_fone1 ?> &nbsp;
                    <?= $data['config']->config_fone2 ?> &nbsp;
                </span>
            </p>            
            <div class="col-md-3 col-sm-3 col-xs-5">
                <a href="<?= Http::base() ?>/">
                    <img src="<?= Http::base() ?>/midias/logo/<?= (new configModel)->get_config()->config_foto; ?>" class="img-responsive margin-full-20" alt="logo"/>
                </a>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-4 pull-right hidden-xs">
                <?php require_once 'menu.php'; ?>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7 visible-xs">
                <?php require_once 'menu_responsivo.php'; ?>
            </div>
            <div class="col-md-12 col-xs-12 visible-xs">
                <?php require_once 'menu_responsivo_lista.php'; ?>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="container">
            &nbsp;
            <span class="text-white"><?= $data['config']->config_nome; ?> </span>
            &nbsp;
            <?php if (ClienteSessao::get_id() > 0): ?>
                <span class="text-white pull-right">Olá, <?php echo ClienteSessao::get_nome(); ?>!</span>
            <?php endif; ?>
        </div>
    </div>
</div>
