<?php

Class itemModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all($order = 'categoria_pos ASC, item_nome ASC') {
        $this->db->query = "SELECT * FROM item "
                . "INNER JOIN categoria ON (categoria_id = item_categoria) "
                . "WHERE item_id > 1 "
                . "ORDER BY $order";
        return $this->db->fetch();
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM item "
                . "INNER JOIN categoria ON (categoria_id = item_categoria) "
                . "WHERE item.item_id = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function get_by_categoria($id) {
        $this->db->query = "SELECT * FROM item "
                . "INNER JOIN categoria ON (categoria_id = item_categoria) "
                . "WHERE item_id > 1  AND item.item_categoria = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_by_busca($id, $nome, $cod, $desc, $obs) {
        $this->db->query = "SELECT * FROM item "
                . "INNER JOIN categoria ON (categoria_id = item_categoria) WHERE  "
                . "categoria_id = $id AND ( "
                . "item_nome LIKE'%$nome%' ";
        if ($cod != "") {
            $this->db->query .= " OR  item_codigo LIKE'%$cod%' ";
        }
        if ($desc != "") {
            $this->db->query .= " OR item_desc LIKE'%$desc%' ";
        }
        if ($obs != "") {
            //$this->db->query .= " OR item_obs LIKE'%$obs%' ";
        }
        $this->db->query .= " ); ";

        $data = $this->db->fetch();

        if (isset($data[0])) {
            foreach ($data as $k => $v) {
                $opc = (new opcaoModel)->get_by_item($data[$k]->item_id);
                $data[$k]->opcao = $opc;
            }
        }        
        return (isset($data[0])) ? $data : null;
    }

    public function get_by_categoria_com_opcao($id, $cond = null) {
        $this->db->query = "SELECT * FROM item "
                . "JOIN categoria ON (categoria_id = item_categoria) "
                . "WHERE item_id > 1 AND  item.item_categoria = $id ";
        $data = $this->db->fetch();
        if (isset($data[0])) {
            foreach ($data as $k => $v) {
                $opc = (new opcaoModel)->get_by_item($data[$k]->item_id);
                $data[$k]->opcao = $opc;
            }
        }
        return (isset($data[0])) ? $data : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        //echo $post->sql_update;exit;
        if ($id != null) {//atualiza
            $this->db->query("UPDATE item SET $post->sql_update WHERE item_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO item $post->sql_insert;");
        }
    }

    public function remove($id) {
        $this->db->query("DELETE FROM item WHERE item_id = $id;");
    }

    public function __destruct() {
        //
    }

}
