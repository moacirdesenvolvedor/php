<?php

@session_start();

Class LoginCliente extends appModel {

    public function __construct() {
        $this->initApp();
    }

    public function indexAction() {
        $config = (new configModel)->get_config();
        $cliente = (new clienteModel)->get_all();
        $dados = array(
            'config' => $config,
            'cliente' => $cliente
        );
        if (isset($_GET['carrinho'])) {
            $dados['carrinho'] = $_GET['carrinho'];
        }
        Tpl::View("site.login", $dados);
    }

    public function entrar() {
        $this->cliente_email = Post:: get('cliente_email', 'string', 1);
        $this->cliente_senha = Post:: crypt('cliente_senha');
        $this->db->query = "SELECT * FROM cliente WHERE cliente_email = '$this->cliente_email' AND cliente_senha = '$this->cliente_senha';";
        $dados = $this->db->fetch();
        if (isset($dados[0])) {
            $_SESSION['__CLIENTE__LOGADO__'] = TRUE;
            $_SESSION['__CLIENTE__ID__'] = $dados[0]->cliente_id;
            $_SESSION['__CLIENTE__NOME__'] = $dados[0]->cliente_nome;
            $dados[0]->cliente_senha = '';
            $_SESSION['__CLIENTE__OBJ__'] = $dados[0];
            if (isset($_GET['carrinho'])) {
                Http::redirect_to("/pedido/");
            } else {
                Http::redirect_to("/");
            }
        } else {
            Http::redirect_to("/entrar/?incorreto=true");
            //@session_destroy();
        }
    }
    
    public function autenticar() {
        $this->cliente_email = Post:: get('cliente_email', 'string', 1);
        $this->cliente_senha = Post:: get('cliente_senha');
        $this->db->query = "SELECT * FROM cliente WHERE cliente_email = '$this->cliente_email' AND cliente_senha = '$this->cliente_senha';";
        $dados = $this->db->fetch();
        if (isset($dados[0])) {
            $_SESSION['__CLIENTE__LOGADO__'] = TRUE;
            $_SESSION['__CLIENTE__ID__'] = $dados[0]->cliente_id;
            $_SESSION['__CLIENTE__NOME__'] = $dados[0]->cliente_nome;
            $dados[0]->cliente_senha = '';
            $_SESSION['__CLIENTE__OBJ__'] = $dados[0];
            Http::redirect_to('/meus-enderecos/?success');
        } else {
           Http::redirect_to('/');
        }
    }    

    public function logout() {
        if (isset($_SESSION['__CLIENTE__ID__']) || isset($_SESSION['__CLIENTE__LOGADO__'])) {
            unset($_SESSION['__CLIENTE__LOGADO__']);
            unset($_SESSION['__CLIENTE__ID__']);
            unset($_SESSION['__CLIENTE__NOME__']);
            unset($_SESSION['__CLIENTE__OBJ__']);
            //@session_destroy();
        }
        Http::redirect_to("/");
    }



    public function recupera_senha()
    {
        $config = (new configModel)->get_config();
        $data = ['config' => $config];
        Tpl::view('site.recupera-senha', $data);
    }

    public function recuperar()
    {
        $config = (new configModel)->get_config();
        $email = Post::get('cliente_email');
        $token = Md5(Time());
        $cliente = (new clienteModel)->gera_token($email, $token);
        if ($cliente) {
            $msg = '';
            $msg .= 'Mensagem: A recuperação de senha foi solicitada.<br> acesse: ' . Http::base() . '/nova-senha/' . $token . '<br>';
            $msg .= 'Data: ' . date('d/m/Y H:s') . '<br>';
            $data = array(
                'destinatario' => $cliente->cliente_email,
                'assunto' => 'Recuperação de senha, Site: ' . $config->config_nome,
                'mensagem' => $msg,
            );
            if (Sender::mail($data)) {
                Http::redirect_to('/entrar/?envio=true');
            } else {
                Http::redirect_to('/entrar/?falha=true');
            }
        } else {
            Http::redirect_to('/recupera-senha/?incorreto=true');
        }
    }

    public function nova_senha()
    {
        $token = Http::get_param(1);
        $cliente = (new clienteModel)->get_by_token($token);
        if ($cliente) {
            $config = (new configModel)->get_config();
            $data = [
                'config' => $config,
                'cliente' => $cliente
            ];
            Tpl::view('site.nova-senha', $data);
        } else {
            Http::redirect_to('/entrar/');
        }
    }

    public function muda_senha()
    {
        $id = Post::get('cliente_id', 'int');
        Post::drop_blank();
        Post::add('cliente_token', md5(Time()));
        $post = Post::get_all();
        if (!Post::is_empty('cliente_password')) {
            Post::crypt('cliente_password');
        }
        if ((new clienteModel)->gravar($id)) {
            Http::redirect_to("/entrar/?muda-senha=true");
        } else {
            Http::redirect_to("/entrar/?muda-falha=true");
        }
    }


}
