<?php

@session_start();
/* Cliente Controller */
/* Author: Rafael <falecom@phpstaff.com.br> */

Class Entrega {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        Tpl::view("admin.entrega-lista", (new entregaModel)->get_all());
    }

    public function novo() {
        Tpl::view("admin.entrega-novo");
    }

    public function editar() {
        $id = Http::get_param(2, 'int');
        $entrega = (new entregaModel)->get_by_id($id);
        if (!is_null($entrega)) {
            Tpl::view("admin.entrega-editar", $entrega);
        } else {
            Http::redirect_to('/entrega/?registro-invalido');
        }
    }


    public function gravar() {
        Post::change('entrega_inicio', preg_replace('/\-/', '', Post::get('entrega_inicio')));
        Post::change('entrega_fim', preg_replace('/\-/', '', Post::get('entrega_fim')));
        Post::change('entrega_taxa',  str_replace(',', '.', Post::get('entrega_taxa')) );
        if (Post::get('entrega_id', 'int') > 0) {
            $id = Post::get('entrega_id', 'int');
            (new entregaModel)->gravar($id);
        } else {
        	Post::drop('entrega_id');
            (new entregaModel)->gravar();
        }
        Http::redirect_to('/entrega/?success');
    }

    public function remove() {
        if (Http::get_param(2, 'int') > 0) {
            $id = Http::get_param(2, 'int');
            (new entregaModel)->remove($id);
        }
        Http::redirect_to('/entrega/?success');
    }

}
