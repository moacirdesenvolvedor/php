<?php
$status0 = new Comment();
?>
<aside id="sidebar-left" class="sidebar-circle">
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="javascript:void(0);">
                <?php if ($_SESSION['USER']['IMAGEM']): ?>
                    <img src="../images/usuario/<?= $_SESSION['USER']['IMAGEM'] ?>" alt="admin">
                <?php else : ?>
                    <img src="../images/usuario/avatar.png" alt="admin">
                <?php endif; ?>
                <i class="online"></i>
            </a>
            <div class="media-body">
                <?php $user_nome = explode(" ", $_SESSION['USER']['NOME']); ?>
                <h4 class="media-heading">Olá, <span><?= $user_nome[0]; ?></span></h4>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li id="home">
            <a href="<?= Validacao::getBase() ?>admin/">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li id="frontend">
            <a href="frontend/">
                <span class="icon"><i class="fa fa-cog"></i></span>
                <span class="text">Configurações </span>
            </a>
        </li>
        <li id="slide">
            <a href="slide/">
                <span class="icon"><i class="fa fa-photo"></i></span>
                <span class="text">Slide </span>
            </a>
        </li>
        <li>
            <a class="logout" data-url="logar/?deslogar"  href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout">
                <span class="icon"><i class="fa fa-power-off"></i></span>
                <span class="text">Sair/ Logout </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span>Conteúdo</span>
            <span class="pull-right"><i class="fa fa-edit"></i></span>
        </li>
        <li class="submenu depoimentonovo listardepoimento">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-bullhorn"></i></span>
                <span class="text">Depoimento</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="depoimentonovo"><a href="depoimento/novo/">Novo Depoimento</a></li>
                <li class="listardepoimento"><a href="depoimentos/">Listar Depoimentos</a></li>
            </ul>
        </li>
        <li class="submenu clientenovo listar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-users"></i></span>
                <span class="text">Equipe</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="clientenovo"><a href="equipe/novo/">Novo Membro</a></li>
                <li class="listar"><a href="equipe/">Listar Membros</a></li>
            </ul>
        </li>
        <li class="submenu serviconovo listarservico servicoeditar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Serviços</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="serviconovo"><a href="servico/novo/">Novo Serviço</a></li>
                <li class="listarservico"><a href="servico/">Listar Serviços</a></li>
            </ul>
        </li>
        <li class="submenu blognovo listarblog categoria blogeditar comentario">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-pencil"></i></span>
                <span class="text">Blog</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="blognovo"><a href="post/novo/">Novo Post</a></li>
                <li class="listarblog"><a href="posts/">Listar Post</a></li>
                <li class="categoria"><a href="categoria/post/">Gerenciar Categoria</a></li>
            </ul>
        </li>

        <li class="submenu portfoliognovo listarportfolio portfoliocategoria portfolioeditar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-wrench"></i></span>
                <span class="text">Portfólio</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="portfoliognovo"><a href="portfolio/novo/">Novo Projeto</a></li>
                <li class="listarportfolio"><a href="portfolio/">Listar Projetos</a></li>
                <li class="portfoliocategoria"><a href="categoria/portfolio/">Gerenciar Categoria</a></li>

            </ul>
        </li>
        <li class="sidebar-category">
            <span>Configuração</span>
            <span class="pull-right"><i class="fa fa-cog"></i></span>
        </li>
        <li id="usuario">
            <a href="usuario/">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Usuário </span>
            </a>
        </li>
        <li id="seo">
            <a href="seo/">
                <span class="icon"><i class="fa fa-globe"></i></span>
                <span class="text">SEO </span>
            </a>
        </li>
        <li id="social">
            <a href="social/">
                <span class="icon"><i class="fa fa-facebook-f"></i></span>
                <span class="text">Redes Sociais </span>
            </a>
        </li>
        <li id="contato">
            <a href="contato/">
                <span class="icon"><i class="fa fa-phone"></i></span>
                <span class="text">Contato </span>
            </a>
        </li>
        <li id="smtp">
            <a href="config/email/">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">SMTP </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span><span class="hidden-sidebar-minimize"></span> &nbsp;</span>
        </li>
    </ul>
</aside>