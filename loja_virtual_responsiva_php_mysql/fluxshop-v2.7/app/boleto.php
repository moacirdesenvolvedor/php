<?php

//require_once 'app/helpers/openboleto/src/OpenBoleto/autoload.php';
//require_once 'app/helpers/openboleto/autoloader.php';
require_once 'app/helpers/openboleto/src/OpenBoleto/Agente.php';
require_once 'app/helpers/openboleto/src/OpenBoleto/BoletoAbstract.php';
require_once 'app/helpers/openboleto/src/OpenBoleto/BoletoFactory.php';
require_once 'app/helpers/openboleto/src/OpenBoleto/Exception.php';
require_once 'app/helpers/openboleto/src/OpenBoleto/Banco/Bradesco.php';
//require_once 'app/helpers/openboleto/src/OpenBoleto/Banco/BancoDoBrasil.php';
//require_once 'app/helpers/openboleto/src/OpenBoleto/Banco/Itau.php';

//@header('Content-Type: text/html; charset=UTF-8');

class Boleto extends PHPFrodo
{
    public function __construct()
    {
        parent::__construct();
        $this->sid = new Session;
        $this->sid->start();
        if ($this->sid->check() && $this->sid->getNode('cliente_id') >= 1) {
            $this->cliente_cep = (string)$this->sid->getNode('cliente_cep');
            $this->cliente_email = (string)$this->sid->getNode('cliente_email');
            $this->cliente_id = (int)$this->sid->getNode('cliente_id');
            $this->cliente_nome = (string)$this->sid->getNode('cliente_nome');
            $this->cliente_fullnome = (string)$this->sid->getNode('cliente_fullnome');
        } else {
            $this->redirect("$this->baseUri/");
        }

        $this->select()
            ->from('config')
            ->execute();
        if ($this->result()) {
            $this->config = (object)$this->data[0];
        }
    }

    public function welcome($banco = 'Bradesco')
    {
        $this->pedido_id = $this->uri_segment[1];
        $this->select()
            ->from('cliente')
            ->where("cliente_id = $this->cliente_id")
            ->execute();
        //$this->printr($this->data[0]);
        $cli = (object)$this->data[0];

        $this->select()
            ->from('pedido')
            //->join('lista', 'lista_pedido = pedido_id', 'INNER')
            ->where("pedido_cliente = $this->cliente_id and pedido_id = $this->pedido_id")
            ->execute();
        //$this->printr($this->data[0]);exit;
        $ped = (object)$this->data[0];
        $valor = $this->_money(($ped->pedido_total_produto - $ped->pedido_cupom_desconto) + $ped->pedido_frete);
        $valor = $ped->pedido_total_frete;

        $this->select('lista_title')
            ->from('lista')
            ->where("lista_pedido = $this->pedido_id")
            ->paginate(4)
            ->execute();
        foreach ($this->data as $i) {
            $lista[] = $i['lista_title'];
        }

        $this->select()
            ->from('endereco')
            ->where("endereco_id = $ped->pedido_endereco")
            ->execute();
        if (isset($this->data[0])) {
            $end = (object)$this->data[0];
        } else {
            $this->select()
                ->from('endereco')
                ->where("endereco_cliente = $ped->pedido_cliente")
                ->execute();
            if (isset($this->data[0])) {
                $end = (object)$this->data[0];
            }
        }

        $this->select()->from('pay')->where('pay_name = "Boleto"')->execute();
        //$this->printr($this->data[0]);

        $this->map($this->data[0]);
        $sacado = new Agente("$cli->cliente_nome $cli->cliente_sobrenome", $cli->cliente_cpf, "$end->endereco_rua,$end->endereco_num, $end->endereco_complemento $end->endereco_bairro", $end->endereco_cep, $end->endereco_cidade, $end->endereco_uf);
        $cedente = new Agente($this->pay_key, $this->pay_c6, $this->pay_c7, $this->pay_c8, $this->pay_c9, $this->pay_d1);

        $hoje = date('Y-m-d H:i:s');
        $hoje = date('Y-m-d', strtotime($hoje . "+" . intval($this->pay_d2) . " days"));
        $nosso_num = str_pad($ped->pedido_id, 5, '000', STR_PAD_LEFT);
        $nosso_num = $ped->pedido_id;

        $demons[] = "$this->pay_key  -  Ref: Pedido #$nosso_num";
        //$demons[] = "$this->baseUri";
        $valor =  preg_replace('/\,/', '', $valor);
        $boleto = new Bradesco(array(
            'dataVencimento' => new DateTime($hoje),
            'valor' => $valor,
            'sequencial' => $nosso_num, // Até 11 dígitos
            'numeroDocumento' => $nosso_num, // Até 11 dígitos
            'sacado' => $sacado,
            'cedente' => $cedente,
            'agencia' => $this->pay_c1, // Até 4 dígitos
            'carteira' => $this->pay_c5, // 3, 6 ou 9
            'conta' => $this->pay_c3, // Até 7 dígitos
            //'logoPath' => 'http://empresa.com.br/logo.jpg', // Logo da sua empresa
            'contaDv' => $this->pay_c4,
            'agenciaDv' => $this->pay_c2,
            'descricaoDemonstrativo' => $demons,
            //'descricaoDemonstrativo' => $lista, //itens do pedido
            'instrucoes' => array(// Até 8
                //'Após o vencimento cobrar 2% de mora e 1% de juros ao dia.',
                'Não receber após o vencimento.',
            ),
        ));
        echo $boleto->getOutput();
    }

    public function _money($val)
    {
        return number_format($val, 2, ".", ",");
    }
}
