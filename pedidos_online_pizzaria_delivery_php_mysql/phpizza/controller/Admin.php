<?php

@session_start();

Class Admin {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $config = (new configModel)->get_config();
        $pedido = (new pedidoModel)->get_dash();
        $cliente = (new clienteModel)->get_dash();
        $dados = array(
            'config' => $config,
            'pedido' => $pedido,
            'cliente' => $cliente,
        );
        Tpl::view("admin.dashboard", $dados);
    }

    public function pedidos() {

        $config = (new configModel)->get_config();
        $pedido = (new pedidoModel)->get_all();
        $dados = array(
            'config' => $config,
            'pedido' => $pedido
        );
        Tpl::view("admin.pedidos", $dados);
    }

    public function pedido() {
        $config = (new configModel)->get_config();
        $pedido_id = Http::get_param(2);
        $pedido = (new pedidoModel)->get_by_id($pedido_id);
        $lista = (new pedidoModel)->get_lista_by_pedido($pedido_id);
        $endereco = (new enderecoModel)->get_by_id($pedido->pedido_local);
        $dados = array(
            'lista' => $lista,
            'pedido' => $pedido,
            'endereco' => $endereco,
            'config' => $config,
        );
        Tpl::view("admin.pedido-exibir", $dados);
    }

    public function pedido_remove() {
        $pedido_id = Post::get('pedido_id', 'int');
        if ($pedido_id > 0) {
            (new pedidoModel)->remove($pedido_id);
        }
    }

    public function atualiza_status() {

        $config = (new configModel)->get_config();

        $id = Post::get_and_drop('pedido_id');
        $cliente_id = Post::get_and_drop('cliente');
        $pstatus = Post::get('pedido_status');
        (new pedidoModel())->gravar($id);

        $pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
        $rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
        $status = preg_replace($pat, $rep, $pstatus);

        $pats = array('/1/', '/2/', '/3/', '/4/', '/5/');
        $reps = array('warning', 'info', 'info', 'success', 'danger');
        $status_msg = preg_replace($pats, $reps, $pstatus);

        echo json_encode(array('text' => $status, 'class' => $status_msg));

        $cliente = (new clienteModel())->get_by_id($cliente_id);
        $url = Http::base() . '/pedido-ficha-cliente/' . $id . '/';
        //$body = Request::open_curl($url, $cliente);
        $body = "";
        $body .= "Olá <br>";
        $body .= "O status do seu pedido mudou! <br>";
        $body .= "Confira o status do seu pedido em: $url <br>";
        $data = array(
            'destinatario' => "$cliente->cliente_email",
            //'bcc' => array('falecom@phpstaff.com.br', 'vhavhugo@gmail.com'),
            'assunto' => "$config->config_nome - Novo status do seu Pedido Nº $id",
            'mensagem' => $body,
        );
        Sender::mail($data);
    }

}
