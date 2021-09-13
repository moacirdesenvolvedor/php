<?php

@session_start();
/* Categoria Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Categoria {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'categoria' => (new categoriaModel)->get_all()
        );
        Tpl::view("admin.categoria-lista", $dados);
    }

    public function item() {
        $id = Http::get_param(2, 'int');
        $dados = array(
            'item' => (new categoriaModel)->get_by_item($id)
        );
        Tpl::view("admin.item-lista", $dados);
    }

    public function novo() {
        Tpl::view("admin.categoria-novo");
    }

    public function editar() {
        $id = Http::get_param(2, 'int');
        $dados = array(
            'categoria' => (new categoriaModel)->get_by_id($id),
        );
        if (!is_null($dados)) {
            Tpl::view("admin.categoria-editar", $dados);
        } else {
            Http::redirect_to('/categoria/?registro-invalido');
        }
    }

    public function gravar() {
        if (Post::get('categoria_id', 'int') > 0) {
            $id = Post::get('categoria_id', 'int');
            (new categoriaModel)->gravar($id);
        } else {
            (new categoriaModel)->gravar();
        }
        Http::redirect_to('/categoria/?success');
    }

    public function remove() {
        if (Post::get('categoria_id', 'int') > 0) {
            $id = Post::get('categoria_id');
            (new categoriaModel)->remove($id);
        }
    }

}
