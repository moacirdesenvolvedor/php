<?php
/*
 * @author phpstaff.com.br
 */
require_once './loader.php';

function incluir() {
    $pagina_nome = addslashes($_POST['pagina_nome']);
    $comentario_nome = addslashes($_POST['comentario_nome']);
    $comentario_email = addslashes($_POST['comentario_email']);
    $comentario_mensagem = addslashes($_POST['comentario_mensagem']);
    $comentario_pagina = $_REQUEST['comentario_pagina'];
    $comentario_website = $_REQUEST['comentario_website'];

    $comment = new Comment();
    $comment->comentario_nome = addslashes(strip_tags($comentario_nome));
    $comment->comentario_email = addslashes($comentario_email);
    $comment->comentario_mensagem = addslashes(strip_tags($comentario_mensagem));
    $comment->comentario_pagina = addslashes(strip_tags($comentario_pagina));
    $comment->comentario_website = addslashes(strip_tags($comentario_website));
    $comment->incluir();
    $url_redirect = "post/".Filter::slug2($pagina_nome)."/$comentario_pagina/?success#comentario";
    Filter:: redirect($url_redirect);
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

