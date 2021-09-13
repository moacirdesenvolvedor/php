<div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="<?php echo Sessao::get_avatar();?>" width="50" height="50" class="img-circle"/><span><?php echo Sessao::get_nome(); ?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= Http::base() ?>/usuario/me/">Minha Conta</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= Http::base() ?>/login/logout/">Sair</a></li>
                    </ul>
                </li>
            </ul>		
        </div>
    </div>
</div>