<?php

@session_start();
/* Categoria Controller */
/* Author: Rafael Clares <falecom@phpstaff.com.br> */

Class Config {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'config' => (new configModel)->get_config()
        );
        if (!is_null($dados)) {
            Tpl::view("admin.config-editar", $dados);
        } else {
            Http::redirect_to('/config/?registro-invalido');
        }
    }

    public function novo() {
        Tpl::view("admin.config-novo");
    }

    public function editar() {
        $dados = array(
            'config' => (new configModel)->get_config(d)
        );
        if (!is_null($dados)) {
            Tpl::view("admin.config-editar", $dados);
        } else {
            Http::redirect_to('/config/?registro-invalido');
        }
    }

    public function gravar() {
        if (isset($_FILES['config_foto']) && !empty($_FILES['config_foto']['name'])) {
            $this->config_foto = Upload::Logo($_FILES['config_foto'], "logo/");
            Post::add('config_foto', $this->config_foto);
        }
        Post::change('config_taxa_entrega',  str_replace(',', '.', Post::get('config_taxa_entrega'))  );
        if (Post::get('redir') == false) {
            $redirect = true;
        }
        (new configModel)->gravar(1);
        if (isset($redirect)) {
            Http::redirect_to('/config/?success');
        }
    }

    public function remove() {
        if (Post::get('config_id', 'int') > 0) {
            $id = Post::get('config_id');
            //(new configModel)->remove($id);
        }
    }

}
