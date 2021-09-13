<?php

@session_start();
/* Cliente Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Cadastro {

    public function __construct() {
        
    }

    public function indexAction() {
        
    }

    public function novo() {
        $config = (new configModel)->get_config();
        $dados = array(
            'config' => $config,
        );
        Tpl::view("site.cliente-cadastro", $dados);
    }

    public function editar() {
        $cliente = ClienteSessao::get_obj();
        $id = $cliente->cliente_id;
        $cliente = (new clienteModel)->get_by_id($id);
        $config = (new configModel)->get_config();
        $dados = array(
            'config' => $config,
            'cliente' => $cliente,
        );        
        if (!is_null($cliente)) {
            Tpl::view("site.meus-dados", $dados);
        } else {
            Http::redirect_to('/?registro-invalido');
        }
    }

    public function gravar() {
        if (Post::get('cliente_senha') == "") {
            Post::drop('cliente_senha');
        } else {
            Post::crypt('cliente_senha');
        }
        if (Post::get('cliente_id', 'int') > 0) {
            $id = Post::get('cliente_id');
            (new clienteModel)->gravar($id);
            Http::redirect_to('/meus-dados/?success');
        } else {
            (new clienteModel)->gravar();
            (new LoginCliente)->autenticar();
        }
    }

}
