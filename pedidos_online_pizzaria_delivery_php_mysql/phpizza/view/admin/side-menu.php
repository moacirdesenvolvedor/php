<div class="cl-toggle"><i class="fa fa-bars"></i></div>
<div class="cl-navblock">
    <div class="menu-space">
        <div class="content">
            <div class="sidebar-logo">
                <div class="logo">
                    <a href="<?= Http::base() ?>/admin/"><img src="<?= Http::base() ?>/midias/thumb.php?zc=3&w=170&hs=100&src=logo/<?= (new configModel)->get_config()->config_foto; ?>" class="img-responsive img-circle" alt="logo" style="margin-left: 15%;" /></a>
                </div>
            </div>
            <div class="side-user">
                <div class="avatar"><img src="<?php echo Sessao::get_avatar(); ?>" alt="Avatar" width="50" height="50" /></div>
                <div class="info">
                    <p><b>PAINEL DE CONTROLE</b> <span><a name="dash-ancor"><i class="fa fa-cog"></i></a></span></p>
                    <div class="progress progress-user">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            <span class="sr-only hide">100%</span>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="cl-vnavigation">
                <li id="menu-dashboard"><a href="<?= Http::base() ?>/admin/"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    <!--
                    <li id="menu-chamado"><a href="<?= Http::base() ?>/chamado/"><i class="fa fa-tasks"></i><span>Ordens de Serviço</span></a>
                    -->
                <li id="menu-pedido"><a href="<?= Http::base() ?>/admin/pedidos/"><i class="fa fa-list"></i><span>Pedidos</span></a>
                <li id="menu-cliente"><a href="<?= Http::base() ?>/cliente/"><i class="fa fa-street-view"></i><span>Clientes</span></a>
                <li id="menu-categoria"><a href="<?= Http::base() ?>/categoria/"><i class="fa fa-tags"></i><span>Categorias</span></a>
                <li id="menu-item"><a href="<?= Http::base() ?>/item/"><i class="fa fa-th-list"></i><span>Produtos</span></a>
                    <!--
                <li id="menu-servico-grupo"><a href="<?= Http::base() ?>/grupo/"><i class="fa fa-wrench"></i> Serviços</a></li>
                    -->
                    <!--
                    <li id="menu-servico">
                        <a href="#"><i class="fa fa-briefcase"></i><span>Serviços</span></a>
                        <ul class="sub-menu">
                            <li id="menu-servico-grupo"><a href="<?= Http::base() ?>/grupo/"><i class="fa fa-th-large"></i> Grupos</a></li>
                            <li id="menu-servico-lista"><a href="<?= Http::base() ?>/servico/"><i class="fa fa-th-list"></i> Listar Serviços</a></li>
                            <li id="menu-servico-novo"><a href="<?= Http::base() ?>/servico/novo/"><i class="fa fa-plus-circle"></i> Novo Serviço</a></li>
                        </ul>
                    </li>
                    <li id="menu-tecnico"><a href="<?= Http::base() ?>/tecnico/"><i class="fa fa-user-md"></i><span>Técnicos</span></a></li>
                    <li id="menu-chamado"><a href="<?= Http::base() ?>/relatorio/"><i class="fa fa-bar-chart"></i><span>Relatórios</span></a>
                    -->
                <li id="menu-usuario"><a href="<?= Http::base() ?>/usuario/"><i class="fa fa-users"></i><span>Usuários</span></a></li>
                <li id="menu-config">
                    <a href="<?= Http::base() ?>/admin/"><i class="fa fa-cog"></i><span>Configurações</span></a>
                    <ul class="sub-menu">
                        <li id="menu-config-site"><a href="<?= Http::base() ?>/config/"><i class="fa fa-globe"></i> Parâmetros do Site</a></li>
                        <li id="menu-config-entrega"><a href="<?= Http::base() ?>/entrega/"><i class="fa fa-globe"></i> Faixas de CEP (entrega)</a></li>
                        <li id="menu-config-email"><a href="<?= Http::base() ?>/configuracao-email/"><i class="fa fa-envelope-o"></i> Configurações de email</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
            <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>                
    </div>
</div>