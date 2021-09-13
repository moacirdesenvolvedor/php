<?php

@session_start();
/* Cliente Controller */
/* Author: Rafael <falecom@phpstaff.com.br> */

Class Cliente {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        Tpl::view("admin.cliente-lista", (new clienteModel)->get_all());
    }

    public function novo() {
        Tpl::view("admin.cliente-novo");
    }

    public function editar() {
        $id = Http::get_param(2, 'int');
        $cliente = (new clienteModel)->get_by_id($id);
        if (!is_null($cliente)) {
            Tpl::view("admin.cliente-editar", $cliente);
        } else {
            Http::redirect_to('/cliente/?registro-invalido');
        }
    }

    public function gravar() {
        if (Post::get('cliente_senha') == "") {
            Post::drop('cliente_senha');
        } else {
            Post::crypt('cliente_senha');
        }
        if (Post::get('cliente_id', 'int') > 0) {
            $id = Post::get('cliente_id', 'int');
            (new clienteModel)->gravar($id);
        } else {
            (new clienteModel)->gravar();
        }

        Http::redirect_to('/cliente/?success');
    }

    public function remove() {
        if (Post::get('cliente_id', 'int') > 0) {
            $id = Post::get('cliente_id');
            (new clienteModel)->remove($id);
        }
    }

}
