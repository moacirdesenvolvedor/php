<?php

Class pedidoModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all() {
        $this->db->query = "SELECT * FROM pedido "
                . "INNER JOIN pedido_lista ON (lista_pedido = pedido_id) "
                . "INNER JOIN cliente ON (cliente_id = pedido_cliente) "
                . "GROUP BY pedido_id ORDER BY pedido.pedido_id DESC";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_dash() {
        $this->db->query = "SELECT * FROM pedido "
                . "INNER JOIN pedido_lista ON (lista_pedido = pedido_id) "
                . "INNER JOIN cliente ON (cliente_id = pedido_cliente) "
                . "WHERE (pedido_status = 1 OR pedido_status = 2 OR pedido_status = 3) "
                . "GROUP BY pedido_id ORDER BY pedido_id DESC, pedido_status ASC LIMIT 0,20";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM pedido "
                . "INNER JOIN cliente ON (pedido_cliente = cliente_id ) "
                . "INNER JOIN endereco ON (pedido_local = endereco_id ) "
                . "WHERE pedido_id = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function get_lista_by_pedido($id) {
        $this->db->query = "SELECT * FROM pedido_lista  WHERE lista_pedido = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_by_cliente($id) {
        $this->db->query = "SELECT * FROM pedido  WHERE pedido_cliente = $id ORDER BY pedido_id DESC";
        $data = $this->db->fetch();
        if (isset($data[0])) {
            foreach ($data as $k => $v) {
                $data[$k]->lista = $this->get_lista_by_pedido($data[$k]->pedido_id);
            }
        }
        return (isset($data[0])) ? $data : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        if ($id != null) {//atualiza
            $this->db->query("UPDATE pedido SET $post->sql_update WHERE pedido_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO pedido $post->sql_insert;");
        }
    }

    public function incluir($p, $cart, $cliente) {
        /* SQL PEDIDO */
        $sql_pedido = "INSERT INTO pedido (pedido_data,pedido_cliente,pedido_local,pedido_total,pedido_entrega,pedido_entrega_prazo,pedido_obs,pedido_obs_pagto) ";
        $sql_pedido .= " VALUES ";
        $sql_pedido .= " ('$p->pedido_data','$p->pedido_cliente','$p->pedido_local','$p->pedido_total','$p->pedido_entrega','$p->pedido_entrega_prazo,','$p->pedido_obs','$p->pedido_obs_pagto'); ";
        $this->db->query("$sql_pedido");
        $p->pedido_id = $this->db->lastId();
        if ($p->pedido_id > 0) {
            /* SQL LISTA DE ITENS DO PEDIDO */
            $sql_pedido_lista = "INSERT INTO pedido_lista (lista_pedido,lista_item,lista_item_obs,lista_item_desc,lista_item_nome,lista_opcao,lista_opcao_nome,lista_opcao_preco,lista_qtde,lista_item_codigo) ";
            $sql_pedido_lista .= "VALUES ";
            foreach ($cart as $c) {
                $sql_pedido_lista .= "('$p->pedido_id','$c->item_id','$c->item_obs','$c->item_desc','$c->item_nome','$c->opc_id','$c->opc_nome','$c->item_opc_preco','$c->qtde','$c->item_codigo'),";
            }
            $sql_pedido_lista = substr($sql_pedido_lista, 0, -1) . ";";
            $this->db->query("$sql_pedido_lista");
        }
        return $p->pedido_id;
    }

    public function remove($id) {
        $this->db->query("DELETE FROM pedido WHERE pedido_id = $id;");
    }

    public function remove_by_cliente($id, $cliente) {
        $this->db->query("DELETE FROM pedido WHERE pedido_id = $id AND pedido_cliente = $cliente;");
    }

    public function __destruct() {
        //
    }

}
