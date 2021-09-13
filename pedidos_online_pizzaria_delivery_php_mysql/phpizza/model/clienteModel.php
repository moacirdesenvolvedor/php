<?php

Class clienteModel extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function get_all($order = 'ASC') {
        $this->db->query = "SELECT * FROM cliente ORDER BY cliente_nome $order";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_dash() {
        $this->db->query = "SELECT * FROM cliente "
                . "INNER JOIN endereco ON (cliente_id = endereco_cliente) "
                . "GROUP BY cliente_id ORDER BY cliente_id DESC, cliente_nome ASC LIMIT 0,20";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data : null;
    }

    public function get_by_id($id) {
        $this->db->query = "SELECT * FROM cliente WHERE cliente_id  = $id;";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : null;
    }

    public function gravar($id = null) {
        $post = Post::query_build();
        if ($id != null) {//atualiza
            $this->db->query("UPDATE cliente SET $post->sql_update WHERE cliente_id = $id;");
        } else {//cadastra
            $this->db->query("INSERT INTO cliente $post->sql_insert;");
        }
    }

    public function remove($id) {
        $this->db->query("DELETE FROM cliente WHERE cliente_id = $id;");
    }


    public function gera_token($email, $token)
    {
        $this->db->query = "SELECT * FROM cliente WHERE cliente_email = '$email';";
        $data = $this->db->fetch();
        $retorno = (isset($data[0])) ? $data[0] : false;

        if($retorno){
            $this->db->query("UPDATE cliente 
                                       SET cliente_token = '$token' 
                                       WHERE cliente_email = '$email';");
            return $data[0];
        }else{return false;}
    }

    public function get_by_token($token)
    {
        $this->db->query = "SELECT * FROM cliente WHERE cliente_token = '$token';";
        $data = $this->db->fetch();
        return (isset($data[0])) ? $data[0] : false;
    }

    public function __destruct() {
        //
    }

}
