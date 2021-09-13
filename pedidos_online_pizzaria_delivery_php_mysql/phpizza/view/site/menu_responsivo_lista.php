<div class="visible-xs menu-houve col-xs-12 col-md-12 col-sm-12">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" id="menu-top">
            <li class="dropdown">
                <a class="text-white text-uppercase" href="<?= Http::base() ?>/">
                    <i class="fa fa-home"></i>
                    Home
                </a>                          
            </li>
            <?php if (ClienteSessao::get_id() > 0): ?>
                <li class="dropdown">
                    <a class="text-white text-uppercase" href="<?= Http::base() ?>/meus-pedidos/">
                        <i class="fa fa-cart-arrow-down"></i>
                        Meus Pedidos
                    </a>                           
                </li>
                <li class="dropdown">
                    <a class="text-white text-uppercase" href="<?= Http::base() ?>/meus-enderecos/">
                        <i class="fa fa-map-marker"></i>&nbsp;
                        Meus Endereços
                    </a>                           
                </li>
                <li class="dropdown ">
                    <a class="text-white text-uppercase" href="<?= Http::base() ?>/meus-dados/">
                        <i class="fa fa-user"></i>
                        Meus Dados
                    </a>                           
                </li>
            <?php endif; ?>

            <li class="dropdown">
                <a class="text-white text-uppercase" href="<?= Http::base() ?>/sobre/">
                    <i class="fa fa-get-pocket"></i>
                    Sobre 
                </a>                          
            </li>
            <li class="dropdown">
                <a class="text-white text-uppercase" href="<?= Http::base() ?>/cadastro/">
                    <i class="fa fa-user"></i>
                    Cadastro 
                </a>                          
            </li>
            <li role="separator" class="divider"></li>

            <?php if (ClienteSessao::get_id() > 0): ?>
                <li class="dropdown">
                    <a class="text-white text-uppercase" href="<?= Http::base() ?>/sair/">
                        <i class="fa fa-sign-out"></i>                        
                        Sair
                    </a>          
                </li>
            <?php else: ?>            
                <li class="dropdown">
                    <a  class="text-white text-uppercase" href="<?= Http::base() ?>/entrar/">
                        <i class="fa fa-sign-in"></i>
                        Entrar 
                    </a>                           
                </li>
            <?php endif; ?>            
        </ul>
    </div>
</div>                