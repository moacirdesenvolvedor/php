<?php

@session_start();

class Pedido {

    public function __construct() {
        if (ClienteSessao::get_id() <= 0) {
            Http::redirect_to('/entrar/?carrinho');
        }
    }

    public function indexAction() {
        $config = (new configModel)->get_config();
        $cliente = ClienteSessao::get_obj();
        $cliente_id = ClienteSessao::get_id();
        $dados = array(
            'config' => $config,
            'cliente' => $cliente,
            'endereco' => (new enderecoModel)->get_by_cliente($cliente_id)
        );
        if (Carrinho::isfull()) {
            $itens = Carrinho::get_all();
            $dados['itens'] = $itens;
        }
        Tpl::view("site.carrinho", $dados);
    }

    public function lista() {
        $config = (new configModel)->get_config();
        $cliente = ClienteSessao::get_obj();
        $cliente_id = ClienteSessao::get_id();
        $pedido = (new pedidoModel)->get_by_cliente($cliente_id);
        $dados = array(
            'pedido' => $pedido,
            'config' => $config,
        );
        Tpl::view("site.pedido-lista", $dados);
    }

    public function exibir() {
        $config = (new configModel)->get_config();
        $pedido_id = Http::get_param(1);
        $pedido = (new pedidoModel)->get_by_id($pedido_id);
        if ($pedido == null) {
            Http::redirect_to("/meus-pedidos/?pedido-nao-encontrato");
        }
        $lista = (new pedidoModel)->get_lista_by_pedido($pedido_id);
        $endereco = (new enderecoModel)->get_by_id($pedido->pedido_local);
        $dados = array(
            'lista' => $lista,
            'pedido' => $pedido,
            'endereco' => $endereco,
            'config' => $config,
        );
        Tpl::view("site.pedido-exibir", $dados);
    }

    public function confirmar() {
        if (Carrinho::isfull()) {
            $cart = Carrinho::get_all();
            $cliente = ClienteSessao::get_obj();

            $p = new stdClass;
            $p->pedido_cliente = $cliente->cliente_id;
            $p->pedido_data = date('Y-m-d H:i:s');
            $p->pedido_local = Post::get('pedido_local');
            $p->pedido_total = Post::get('pedido_total');
            $p->pedido_entrega = Post::get('pedido_entrega');
            $p->pedido_entrega_prazo = Post::get('pedido_entrega_prazo');
            $p->pedido_obs = Filter::antiSQL(Post::get('pedido_obs'), true);
            $p->pedido_obs_pagto = Filter::antiSQL(Post::get('pedido_obs_pagto'), true);
            $p->pedido_id = (new pedidoModel)->incluir($p, $cart, $cliente);
            if ($p->pedido_id > 0) {
                $this->notificarPedido($p, $cliente);
                Carrinho::clear();
                Http::redirect_to("/detalhes-do-pedido/$p->pedido_id/");
            } else {
                Http::redirect_to("/pedido/?error");
            }
        } else {
            Http::redirect_to("/");
        }
    }

    public function notificarPedido($pedido, $cliente) {
        $conf = (new configModel)->get_config();
        /* NOTIFICA CLIENTE */
        $cliente = ClienteSessao::get_obj();
        $url = Http::base() . '/pedido-ficha-cliente/' . $pedido->pedido_id . '/';
        $body = Request::open_curl($url, $cliente);
        // $body = "";
        $data = array(
            'destinatario' => "$cliente->cliente_email",
            //'bcc' => array('falecom@phpstaff.com.br', 'vhavhugo@gmail.com'),
            'assunto' => "$conf->config_nome - Seu Pedido Nº $pedido->pedido_id",
            'mensagem' => $body,
        );
        Sender::mail($data);

        /* NOTIFICA ADM */
        $host = new smtpModel();
        $url = Http::base() . '/pedido-ficha-admin/' . $pedido->pedido_id . '/';
        $body = Request::open_curl($url, $cliente);
        // $body = "";
        $data = array(
            'destinatario' => $host->__get('email'),
            'bcc' => array($host->__get('bcc')),
            'assunto' => "$conf->config_nome - Novo Pedido Nº $pedido->pedido_id",
            'mensagem' => $body,
        );
        Sender::mail($data);
    }

    public function ficha_cliente() {
        $config = (new configModel)->get_config();
        $pedido_id = Http::get_param(1);
        $pedido = (new pedidoModel)->get_by_id($pedido_id);
        $lista = (new pedidoModel)->get_lista_by_pedido($pedido_id);
        $endereco = (new enderecoModel)->get_by_id($pedido->pedido_local);
        $dados = array(
            'lista' => $lista,
            'pedido' => $pedido,
            'endereco' => $endereco,
            'config' => $config,
        );
        Tpl::view("site.pedido-ficha-cliente", $dados);
    }

    public function ficha_admin() {
        $config = (new configModel)->get_config();
        $pedido_id = Http::get_param(1);
        $pedido = (new pedidoModel)->get_by_id($pedido_id);
        $lista = (new pedidoModel)->get_lista_by_pedido($pedido_id);
        $endereco = (new enderecoModel)->get_by_id($pedido->pedido_local);
        $dados = array(
            'lista' => $lista,
            'pedido' => $pedido,
            'endereco' => $endereco,
            'config' => $config,
        );
        Tpl::view("site.pedido-ficha-admin", $dados);
    }
}
