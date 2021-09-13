<?php

@session_start();
/* Cliente Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Local {

    public function __construct() {
        
    }

    public function indexAction() {
        
    }

    public function lista() {
        if (ClienteSessao::get_id() > 0) {
            $cliente_id = ClienteSessao::get_id();
            $dados = array(
                'cliente' => (new clienteModel)->get_by_id($cliente_id),
                'endereco' => (new enderecoModel)->get_by_cliente($cliente_id),
                'config' => (new configModel)->get_config()
            );
            Tpl::view("site.cliente-endereco-lista", $dados);
        } else {
            Http::redirect_to("/");
        }
    }

    public function novo() {
        if (ClienteSessao::get_id() > 0) {
            $cliente_id = ClienteSessao::get_id();
            $dados = array(
                'cliente' => (new clienteModel)->get_by_id($cliente_id),
                'config' => (new configModel)->get_config()
            );

            Tpl::view("site.cliente-endereco-novo", $dados);
        }
    }

    public function editar() {
        if (ClienteSessao::get_id() > 0) {
            $cliente_id = ClienteSessao::get_id();
            $id = Http::get_param(1, 'int');
            $dados = array(
                'cliente' => (new clienteModel)->get_by_id($cliente_id),
                'endereco' => (new enderecoModel)->get_by_id($id),
                'config' => (new configModel)->get_config()
            );
            Tpl::view("site.cliente-endereco-editar", $dados);
        }
    }

    public function getfaixa() {
        $intervalos = (new entregaModel)->get_faixas();
        $cep = Post::get('cep');
        //$cep = explode("-", $cep)[0];
        $v = (int) preg_replace("/\D+/", "", $cep);
        $rs = '-1';
        foreach ($intervalos as $faixa) {
            $range = [$faixa->entrega_inicio, $faixa->entrega_fim];
            list($min, $max) = $range;
            if ($v >= $min && $v <= $max) {
                $rs = "$faixa->entrega_taxa <br>";
            }
        }
        echo $rs;
    }

    public function gravar() {
        $endereco_cliente = Post::get('endereco_cliente', 'int');
        if (Post::get('endereco_id', 'int') > 0) {
            $id = Http::get_param(1, 'int');
            $id = Post::get('endereco_id', 'int');
            (new enderecoModel)->gravar($id);
        } else {
            (new enderecoModel)->gravar();
            if (Carrinho::isfull()){
                Http::redirect_to("/pedido/");
            }else{
                Http::redirect_to("/meus-enderecos/");
            }    
        }
        Http::redirect_to("/meus-enderecos/$endereco_cliente/?success");
    }

    public function remove() {
        if (Post::get('endereco_id', 'int') > 0) {
            $id = Post::get('endereco_id', 'int');
            (new enderecoModel)->remove($id);
        }
        Http::redirect_to("/meus-enderecos/?success");
    }

}
