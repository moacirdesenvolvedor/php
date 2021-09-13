<?php

Class categoriaModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all($order = 'categoria_nome ASC') {
        $this->db->query = "SELECT * FROM categoria ORDER BY $order";
        return $this->db->fetch();
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM categoria WHERE categoria_id = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function get_by_item($id) {
        $this->db->query = "SELECT * FROM item INNER JOIN categoria ON (categoria_id = item_categoria) WHERE categoria_id = $id;";
        $data = $this->db->fetch();
        return (isset($data)) ? $data : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        if ($id != null) {//atualiza
            $this->db->query("UPDATE categoria SET $post->sql_update WHERE categoria_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO categoria $post->sql_insert;");
        }
    }

    public function remove($id) {
        $this->db->query("DELETE FROM categoria WHERE categoria_id = $id;");
    }

    public function __destruct() {
        //
    }
}
