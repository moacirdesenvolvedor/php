<?php

@session_start();
/* Categoria Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Item {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'item' => (new itemModel)->get_all()
        );
        Tpl::view("admin.item-lista", $dados);
    }

    public function novo() {
        $dados = array(
            'categoria' => (new categoriaModel)->get_all()
        );
        Tpl::view("admin.item-novo", $dados);
    }

    public function editar() {
        $id = Http::get_param(2, 'int');
        $item = array(
            'categoria' => (new categoriaModel)->get_all(),
            'item' => (new itemModel)->get_by_id($id)
        );
        if (!is_null($item)) {
            Tpl::view("admin.item-editar", $item);
        } else {
            Http::redirect_to('/item/?registro-invalido');
        }
    }

    public function gravar() {
        if (isset($_FILES['item_foto']) && !empty($_FILES['item_foto']['name'])) {
            $this->item_foto = Upload::Slide($_FILES['item_foto'], "item/");
            Post::add('item_foto', $this->item_foto);
        }
        $preco = str_replace(',', '.' ,Post::get('item_preco', 'float'));
        $preco = number_format($preco, 2, '.', '');
        Post::change('item_preco', $preco);
        if (Post::get('item_id', 'int') > 0) {
            $id = Post::get('item_id', 'int');
            (new itemModel)->gravar($id);
        } else {
            (new itemModel)->gravar();
        }
        Http::redirect_to('/item/?success');
    }

    public function remove() {
        if (Post::get('item_id', 'int') > 0) {
            $id = Post::get('item_id');
            (new itemModel)->remove($id);
        }
    }

}
