<?php

@session_start();
/* Categoria Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Opcao {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        Tpl::view("admin.opcao-lista", (new opcaoModel)->get_all());
    }

    public function item() {
        $id = Http::get_param(2, 'int');
        $dados = array(
            'opcao' => (new opcaoModel)->get_by_item($id),
            'item' => (new itemModel)->get_by_id($id)
        );
        Tpl::view("admin.opcao-lista", $dados);
    }

    public function novo() {
        $id = Http::get_param(2, 'int');
        $dados = array(
            'item' => (new itemModel)->get_by_id($id)
        );
        Tpl::view("admin.opcao-novo", $dados);
    }

    public function editar() {
        $id = Http::get_param(2, 'int');
        $dados = array(
            'opcao' => (new opcaoModel)->get_by_id($id)
        );
        Tpl::view("admin.opcao-editar", $dados);
    }

    public function gravar() {
        $item = Post::get('opcao_item', 'int');
        Post::set_moeda('opcao_preco');
        if (Post::get('opcao_id', 'int') > 0) {
            $id = Post::get('opcao_id', 'int');
            (new opcaoModel)->gravar($id);
        } else {
            (new opcaoModel)->gravar();
        }
        Http::redirect_to("/opcao/item/$item/?success");
    }

    public function remove() {
        if (Post::get('opcao_id', 'int') > 0) {
            $id = Post::get('opcao_id');
            (new opcaoModel)->remove($id);
        }
    }

}
