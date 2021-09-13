<?php
require_once './loader.php';
require_once './modulos.php';

if (isset($_POST['email']) && !empty($_POST['email'])) {
    require_once './plugin/email/email.php';
    global $mail;
    $smtp = new Smtpr();
    $smtp->getSmtp();
    $mail->Port = $smtp->smtp_port;
    $mail->Host = $smtp->smtp_host;
    $mail->Username = $smtp->smtp_username;
    $mail->From = $smtp->smtp_username;
    $mail->Password = $smtp->smtp_password;
    $mail->FromName = $smtp->smtp_fromname;
    $mail->Subject = utf8_decode("Contato Via Site " . $site->site_meta_titulo);
    $mail->AddBCC($smtp->smtp_bcc);
    $mail->AddAddress($smtp->smtp_username);

    $data = date('d/m/Y H:i');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail->AddReplyTo($email);
    $body = "<b>Data da Mensagem: </b> $data <br />";
    $body .= "<b>Nome:</b> $nome <br />";
    $body .= "<b>E-mail:</b> $email <br />";
    $body .= "<b>Mensagem: </b>$mensagem <br />";
    $mail->Body = nl2br($body);
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <?php //require_once './analytics.php'; ?>
        <?php require_once './base.php'; ?>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title><?= $site->site_meta_titulo ?></title>
        <meta name="description" content="<?= $site->site_meta_desc ?>">
        <meta name="keywords" content="<?= $site->site_meta_palavra ?>">
        <meta name="author" content="<?= $site->site_meta_autor ?>">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <!-- Bootstrap  -->
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!-- web font  -->
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- plugin css  -->
        <link rel="stylesheet" type="text/css" href="js-plugin/animation-framework/animate.css">
        <!-- Pop up-->
        <link rel="stylesheet" type="text/css" href="js-plugin/magnific-popup/magnific-popup.css">
        <!-- Flex slider-->
        <link rel="stylesheet" type="text/css" href="js-plugin/flexslider/flexslider.css">
        <!-- Owl carousel-->
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.theme.css">
        <!-- icon fonts -->
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
        <!-- nekoAnim-->
        <link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css">
        <!-- Custom css -->
        <link type="text/css" rel="stylesheet" href="css/layout.css">
        <link type="text/css" id="colors" rel="stylesheet" href="css/<?= $modulo_aparencia->modulo_aparencia_cor ?>.css">
        <link type="text/css" rel="stylesheet" href="css/custom.css">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <script src="js/modernizr-2.6.1.min.js"></script>
        <!-- Favicons
        ================================================== -->
      <link rel="shortcut icon" href="admin/assets/img/ico/favicon.ico?<?= rand(0, 10) ?>">
    </head>
    <body class="activateAppearAnimation" id="<?= $modulo_aparencia->modulo_aparencia_wide?>">
        <div id="globalWrapper" >
            <!-- ==============================================
                              MENU
            =============================================== -->
            <header class="navbar-fixed-top">			
                <!-- header -->
                <div id="mainHeader" role="banner">
                    <?php require_once './menu.php'; ?>
                </div>
            </header>
            <!-- ==============================================
                         FIM  MENU
            =============================================== -->

            <!-- ==============================================
                 SLIDE
            =============================================== -->

            <?php if ($topo->modulo1_status == 1): ?>
             <?php
                $slide = new Slide();
                $slide->getImagens();                   
             ?>            
                <section id="homeFlex">
                    <div class="flexslider flexFullScreen" >
                        <ul class="slides sliderWrapper">
                            <?php $i = 0; ?>
                            <?php if ($slide->db->data[0]): ?>
                                <?php foreach ($slide->db->data as $imagens): ?>
                                    <li class="slideN<?= $i++; ?>">
                                        <img src="thumb.php?w=1140&h=450&src=images/<?= $imagens->slide_imagem ?>" alt="pic 1" class="img-responsive"/>
                                        <div class="caption right">

                                            <?php if( stripslashes($imagens->slide_nome) != "" ): ?>
                                            <div class='element1-1' data-animation="fadeInRightBig">
                                                <h1><?= stripslashes($imagens->slide_nome) ?></h1>
                                            </div>
                                            <?php endif; ?>
                                            <?php if( stripslashes($imagens->slide_subtitulo) != "" ): ?>
                                            <div class='element1-2' data-animation="fadeInRightBig">
                                                <h2><?= stripslashes($imagens->slide_subtitulo) ?></h2>
                                            </div>
                                            <?php endif; ?>
                                            <?php if( stripslashes($imagens->slide_subtitulo1) != "" ): ?>
                                            <div class='element1-3 hidden-xs' data-animation="fadeInRightBig">
                                                <p><?= stripslashes($imagens->slide_subtitulo1) ?></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>				
                    </div>
                </section>
                <section id="content">
                    <section class="largeQuote pb40 pt40">
                        <div class="container">
                            <div class="row">
                                <div class="span12 text-center">
                                    <h1><?= stripslashes($topo->modulo1_nome) ?></h1>
                                    <h2 class="subTitle"><?= stripslashes($topo->modulo1_subtitulo1) ?></h2>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- ==============================================
                    SLIDE
                =============================================== -->

                <!-- ==============================================
                 SERVIÇOS
                 =============================================== -->
                 <?php
                    $servicos = new Modulo6();
                    $servicos->getModulo6();
                    $servico = new Servico();
                    $servico->getServicos();                    
                 ?>
                <?php if ($servicos->modulo6_status == 1) : ?>
                    <?php if (isset($servico->db->data[0])): ?>
                        <section id="services" class="color2 shadowBox">
                            <br>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1>Nossos Serviços</h1>
                                    <h2 class="subTitle">Crie seu Website Agora!</h2>
                                </div>
                            </div>

                            <div class="container pb30 pt15">
                                <div class="row">
                                    <?php foreach ($servico->db->data as $s): ?>
                                        <div class="col-sm-4">
                                            <article class="boxIcon">
                                                <a href="javascript:void(0);" style="cursor:default">
                                                    <i class="<?= stripslashes($s->servico_icon) ?> iconBig iconRounded"></i>
                                                    <h2><?= stripslashes($s->servico_nome) ?></h2>
                                                    <p><?= stripslashes($s->servico_descricao) ?></p>
                                                </a>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- ==============================================
                 SERVIÇOS
                 =============================================== -->

                <!-- ==============================================
                 PORTFÓLIO
                 =============================================== -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb30">
                        </div>
                    </div>
                </div>
                <?php 
                    $portfolio = new Modulo7();
                    $portfolio->getModulo7();
                ?>                  
                <?php if ($portfolio->modulo7_status == 1): ?>
                <?php 
                    $projeto = new Portfolio();
                    $projeto->getPortfolios();
                ?> 
                    <?php if ($projeto->db->data[0]): ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center mb40">
                                    <h1><?= stripslashes($portfolio->modulo7_nome) ?></h1>
                                    <h2 class="subTitle"><?= stripslashes($portfolio->modulo7_descricao) ?></h2>
                                </div>
                            </div>
                        </div>
                        <section class="nekoDataOwl owl-carousel pb30 imgHover" data-neko_items="4" data-neko_navigation="true" data-neko_pagination="false" data-neko_mousedrag="true"  data-nekoanim="fadeInUp" data-nekodelay="100">
                            <?php foreach ($projeto->db->data as $work): ?>
                                <article class="item">
                                    <div class="imgWrapper">
                                        <img alt="" src="thumb.php?w=500&h=350&src=images/portfolio/<?= $work->portfolio_imagem ?>" class="img-responsive">
                                    </div>
                                    <div class="mediaHover">
                                        <div class="mask"></div>
                                        <div class="iconLinks"> 
                                            <?php $img = "thumb.php?w=500&h=350&src=images/portfolio/$work->portfolio_imagem"; ?>
                                            
                                            <?php $projeto->getWork($work->portfolio_id); ?>
                                            <?php if (isset($projeto->db->data[0])): ?>
                                                <?php $img = ""; ?>
                                                <?php foreach ($projeto->db->data as $images) : ?>
                                                    <?php $img .= "thumb.php?w=600&h=400&zc=1&src=./images/portfolio/$images->foto_url,"; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                                <a href="projeto/<?= Filter::slug2($work->portfolio_nome) ?>/<?= $work->portfolio_id ?>/">
                                                    <i class="icon-link iconRounded"></i>
                                                    <span>visitar</span>
                                                </a> 

                                                <a href="images/portfolio/<?= $work->portfolio_imagem ?>" class="image-link" title="Zoom" data-gallery="<?= substr($img, 0, -1) ?>">
                                                    <i class="icon-search iconRounded"></i>
                                                     <span>ampliar</span>
                                                </a> 
                                        </div>
                                    </div>
                                    <div class="boxContent">
                                        <h3><?= stripslashes($work->portfolio_nome) ?></h3>
                                        <p><?= stripslashes(Validacao::cut(stripslashes($work->portfolio_descricao), 100, '...')) ?><br>
                                            <a href="projeto/<?= Filter::slug2($work->portfolio_nome) ?>/<?= $work->portfolio_id ?>/" class="moreLink">Leia mais ...</a>
                                        </p>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- ==============================================
                               FIM  PORTFÓLIO
                 =============================================== -->

                <!-- ==============================================
                                MODULO 4
                =============================================== -->
                <!-- parallax -->
                <?php
                    $modulo4 = new Modulo4();
                    $modulo4->getModulo4();                
                ?>
                <?php if ($modulo4->modulo4_status == 1): ?>
                    <section id="paralaxSlice3" data-stellar-background-ratio="0.5">
                        <div class="maskParent">
                            <div class="paralaxMask"></div>
                            <div class="paralaxText">
                                <blockquote>
                                    <?= stripslashes($modulo4->modulo4_descricao) ?>
                                </blockquote>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- ==============================================
                              FIM   MODULO 4
                =============================================== -->

                <!-- ==============================================
                 EQUIPE
                 =============================================== -->

                    <?php 
                    $equipe = new Modulo8();
                    $equipe->getModulo8();
                    ?>
                <?php if ($equipe->modulo8_status == 1): ?>

                    <?php 
                    $membro = new Cliente();
                    $membro->getClientes();
                    ?>                
                    <?php if (isset($membro->db->data[0])): ?>
                        <section id="team5" class="pt40 pb40">
                            <div class="container">
                                <div class="row"> 
                                    <div class="col-md-12 mb40 text-center">
                                        <h1><?= stripslashes($equipe->modulo8_nome) ?></h1>
                                        <h2 class="subTitle"><?= stripslashes($equipe->modulo8_descricao) ?></h2>
                                    </div>
                                    <section class="col-md-12">
                                        <div class="row mb15">
                                            <?php foreach ($membro->db->data as $e): ?>
                                                <div class="col-md-3 col-sm-6" data-nekoanim="slideInLeft" data-nekodelay="0">
                                                    <article>
                                                        <div><img src="thumb.php?w=320&h=320&zc=0&src=images/team/<?= $e->cliente_imagem ?>" alt="" class="img-responsive"></div>
                                                        <div class="boxContent text-center">
                                                            <h3><?= stripslashes($e->cliente_nome) ?></h3>
                                                            <p><?= stripslashes($e->cliente_subtitulo) ?></p>
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- ==============================================
                                FIM        EQUIPE
                 =============================================== -->


                 <?php if ($equipe->modulo8_status == 1): ?>
                 <?php 
                    $depoimentos = new Depoimento();
                    //$depoimentos->db->paginate(4);
                    $depoimentos->getDepoimentos();
                 ?>
                <?php if (isset($depoimentos->db->data[0])): ?>
                <!-- ==============================================
                                DEPOIMENTOs
                 =============================================== -->                                                  
                <section id="paralaxSlice3" data-stellar-background-ratio="0.5">
                    <div class="maskParent">
                        <div class="paralaxMask"></div>
                        <div class="paralaxText container" data-nekoanim="fadeIn" data-nekodelay="50">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel nekoDataOwl" data-neko_items="1" data-neko_singleitem="true" data-neko_paginationnumbers="true" data-neko_transitionstyle="fade">
                                        <?php foreach ($depoimentos->db->data as $d): ?>
                                        <div class="item">
                                            <img src="thumb.php?w=600&h=400&zc=1&src=images/team/<?= $d->depoimento_imagem ?>" class="img-circle mb15" alt="client">
                                            <blockquote> <?= Validacao::cut(stripslashes($d->depoimento_sobre),200,'...') ?><br/><small><?= stripslashes($d->depoimento_nome) ?></small></blockquote>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif; ?>                
                <?php endif; ?>
                <!-- parallax testimonial --> 

               <!-- ==============================================
                                          CONTATO
                  =============================================== -->
                <?php if ($contato->modulo9_status == 1): ?>
                    <section id="contact" class="color1 pt40 pb40">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb40 text-center">
                                    <h1><?= stripslashes($contato->modulo9_nome) ?></h1>
                                    <h2 class="subTitle"><?= stripslashes($contato->modulo9_subtitulo) ?></h2>
                                </div>
                                <div class="col-md-4 mb15" data-nekoanim="fadeInUp" data-nekodelay="0">
                                    <div id="mapWrapper"></div>
                                </div>
                                <div class="col-md-5 col-sm-8"  data-nekoanim="fadeInUp" data-nekodelay="100">
                                    <div class="boxFocus color0">
                                        <form method="post" id="contactfrm" role="form">

                                            <div class="form-group">
                                                <label for="name">Nome</label>
                                                <input type="text" class="form-control" name="nome" id="name" placeholder="Informe seu nome" required title="Por favor informe seu nome"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Informe seu email" required title="Por favor informe um endereço de email válido"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="comments">Mensagem</label>
                                                <textarea name="mensagem" class="form-control" id="comments" cols="3" style="height:60px" rows="3" placeholder="Mensagem…" required title="Por favor informe a mensagem (acima de 10 caracteres)"></textarea>
                                            </div>

                                            <div class="result"></div>
                                            <button name="submit" type="submit" class="btn btn-primary" id="submit"> <?= stripslashes($contato->modulo9_button) ?></button>

                                        </form>
                                    </div>
                                    <?php
                                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                                        if ($mail->Send()) {
                                            echo "<p class='alert alert-success' id='msg_alert'> <strong>Obrigado !</strong> Sua Mensagem foi entregue.</p>";
                                        } else {
                                            echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                        }
                                    }
                                    $contatos = new Contato();
                                    $contatos->getContato();                                    
                                    ?> 
                                </div>
                                <div class="col-md-3 col-sm-4"  data-nekoanim="fadeInUp" data-nekodelay="200">
                                    <h4>Endereço:</h4>
                                    <address>
                                        <?= $contatos->contato_endereco ?><br/>
                                    </address>
                                    <h4>Telefone:</h4>
                                    <address>
                                        <?= $contatos->contato_telefone1 ?><br />
                                    </address>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <!-- ==============================================
                                FIM  CONTATO
                =============================================== -->
                <!-- content -->
            </section>
            <!-- ==============================================
                              FIM  RODAPÉ
            =============================================== -->
            <footer id="footerWrapper" class="footer2">
                <?php require_once './footer.php'; ?>
            </footer>
            <!-- ==============================================
                               FIM  RODAPÉ
            =============================================== -->
        </div>


        <!-- global wrapper -->
        <!-- End Document 
        ================================================== -->
        <script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
        <!-- third party plugins  -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
        <!-- carousel -->
        <script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
        <!-- pop up -->
        <script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- flex slider -->
        <script type="text/javascript" src="js-plugin/flexslider/jquery.flexslider-min.js"></script>
        <!-- isotope -->
        <script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
        <!-- form -->
        <script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="js-plugin/parallax/js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="js-plugin/parallax/js/jquery.localscroll-1.2.7-min.js"></script>
        <!-- appear -->
        <script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>	
        <!-- Custom  -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script>
            $('#index').addClass('active');
            var locations = [
                //point number 1
                ['<?= $site->site_meta_titulo ?>', '<?= $contatos->contato_endereco ?>']

            ];
        </script>
        <script>
            jQuery(document).ready(function () {
                //hide a div after 3 seconds
                setTimeout(function () {
                    jQuery("#msg_alert").hide();
                }, 30000);
            });
        </script>
        <?php require_once 'switch_color.php'; ?>
    </body>
</html>
