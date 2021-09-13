<?php

Class entregaModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all() {
        $this->db->query = "SELECT * FROM entrega ORDER BY entrega_inicio ASC";
        return $this->db->fetch();
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM entrega  WHERE entrega_id = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function get_faixas() {
        $this->db->query = "SELECT * FROM entrega;";
        $data = $this->db->fetch();
       return (isset($data[0])) ? $data : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        if ($id != null) {//atualiza
            $this->db->query("UPDATE entrega SET $post->sql_update WHERE entrega_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO entrega $post->sql_insert;");
        }
    }

    public function remove($id) {
        $this->db->query("DELETE FROM entrega WHERE entrega_id = $id;");
    }

 
    public function __destruct() {
        //
    }

}
