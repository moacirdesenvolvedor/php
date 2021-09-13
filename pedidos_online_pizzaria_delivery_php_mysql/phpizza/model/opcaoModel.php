<?php

Class opcaoModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all($order = 'opcao_nome DESC') {
        $this->db->query = "SELECT * FROM opcao ORDER BY $order";
        return $this->db->fetch();
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM opcao JOIN item ON (item_id = opcao_item) JOIN categoria ON (categoria_id = item_categoria) WHERE opcao_id = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function get_by_item($id) {
        $this->db->query = "SELECT * FROM opcao JOIN item ON (item_id = opcao_item) WHERE opcao_item = $id ORDER BY opcao_preco ASC;";
        $data = $this->db->fetch();
        return (isset($data)) ? $data : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        if ($id != null) {//atualiza
            $this->db->query("UPDATE opcao SET $post->sql_update WHERE opcao_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO opcao $post->sql_insert;");
        }
    }

    public function remove($id) {
        $this->db->query("DELETE FROM opcao WHERE opcao_id = $id;");
    }

    public function __destruct() {
        //
    }

}
