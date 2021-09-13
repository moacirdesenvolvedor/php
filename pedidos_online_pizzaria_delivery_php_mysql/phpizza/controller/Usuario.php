<?php

@session_start();

/* Usuario Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Usuario {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array('usuario' => (new usuarioModel)->get_all());
        Tpl::view("admin.usuario-lista", $dados);
    }

    public function novo() {
        Tpl::view("admin.usuario-novo");
    }

    public function me() {
        $me = Sessao::get_id();
        $dados = array('usuario' => (new usuarioModel)->get_all(), 'me' => $me);
        Tpl::view("admin.usuario-lista", $dados);
    }

    public function gravar() {
        if (Post::get('usuario_senha') == "") {
            Post::drop('usuario_senha');
        } else {
            Post::crypt('usuario_senha');
        }
        
         if (Post::get('usuario_avatar') != "" && Post::get('usuario_id', 'int') == Sessao::get_id()) {
             $_SESSION['__USUARIO__AVATAR__'] = Post::get('usuario_avatar');
         }
        if (Post::get('usuario_id', 'int') > 0) {
            $id = Post::get('usuario_id');
            (new usuarioModel)->gravar($id);
        } else {
            (new usuarioModel)->gravar();
        }
        echo Http::base();
    }

    public function remove() {
        if (Post::get('usuario_id', 'int') > 0) {
            $id = Post::get('usuario_id');
            (new usuarioModel)->remove($id);
        }
    }

}
