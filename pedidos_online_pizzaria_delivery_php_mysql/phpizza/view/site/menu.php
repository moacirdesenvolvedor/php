<div class="row">
    <div class="col-md-2 col-sm-2 text-center hidden-xs margin-full-30">
        <a class="text-white" href="<?= Http::base() ?>/">
            <i class="fa fa-home fa-3x"></i><br/>                        
            Home
        </a>
    </div>
    <?php if (ClienteSessao::get_id() > 0): ?>
        <div class="col-md-2 col-sm-2 text-center hidden-xs margin-full-30">
            <a class="text-white" href="<?= Http::base() ?>/meus-pedidos/">
                <i class="fa fa-cart-arrow-down fa-3x"></i><br/>                        
                Meus Pedidos
            </a>
        </div>
        <div class="col-md-2 col-sm-2 text-center hidden-xs margin-full-30">
            <a class="text-white" href="<?= Http::base() ?>/meus-dados/">
                <i class="fa fa-user fa-3x"></i><br/>                        
                Meus Dados
            </a>
        </div>
    <?php endif; ?>
    <div class="col-md-2 col-sm-2 text-center hidden-xs margin-full-30">
        <a class="text-white" href="<?= Http::base() ?>/sobre/">
            <i class="fa fa-get-pocket fa-3x"></i><br/>
            Sobre 
        </a>  
    </div>     
    <?php if (ClienteSessao::get_id() <= 0): ?>
        <div class="col-md-2 col-sm-2 text-center hidden-xs margin-full-30">
            <a class="text-white" href="<?= Http::base() ?>/cadastro/">
                <i class="fa fa-user fa-3x"></i><br/>
                Cadastro
            </a>        
        </div>                          
    <?php endif; ?>
    <div class="col-md-2 col-sm-2 hidden-xs pull-right margin-full-30">
        <?php if (ClienteSessao::get_id() > 0): ?>
            <a class="text-white" href="<?= Http::base() ?>/sair/">
                <i class="fa fa-sign-out fa-3x"></i><br/>                        
                <span class="topsmall">Sair</span>
            </a>          
        <?php else: ?>
            <a  class="text-white" href="<?= Http::base() ?>/entrar/">
                <i class="fa fa-sign-in fa-3x"></i><br/> 
                <span class="topsmall">Entrar</span>
            </a>                           

        <?php endif; ?>
    </div>   
</div>