<?php

class Produto extends PHPFrodo
{

    public $config = array();
    public $config_cep = array();
    public $menu;
    public $item_categoria = null;
    public $item_sub = null;
    public $item_url = null;
    public $item_id = null;
    public $item_title = '';
    public $nota = '';
    public $item = null;
    public $f_foto = null;
    public $f_foto_big = null;
    public $payConfig;

    public function __construct()
    {
        parent:: __construct();
        $sid = new Session;
        $sid->start();
        if ($sid->check() && $sid->getNode('cliente_id') >= 1) {
            $this->cliente_email = (string)$sid->getNode('cliente_email');
            $this->cliente_id = (string)$sid->getNode('cliente_id');
            $this->cliente_nome = (string)$sid->getNode('cliente_nome');
            $this->cliente_fullnome = (string)$sid->getNode('cliente_fullnome');
            $this->assign('cliente_nome', $this->cliente_nome);
            $this->assign('cliente_email', $this->cliente_email);
            $this->assign('cliente_msg', 'acesse aqui sua conta.');
            $this->assign('logged', 'true');
        } else {
            $this->assign('cliente_nome', 'visitante');
            $this->assign('cliente_msg', 'fa?a seu login ou cadastre-se.');
            $this->assign('logged', 'false');
        }
        $this->select()
            ->from('config')
            ->execute();
        if ($this->result()) {
            $this->config = (object)$this->data[0];
            $this->assignAll();
        }
        if (isset($this->uri_segment[1]) && isset($this->uri_segment[2]) && isset($this->uri_segment[3]) && isset($this->uri_segment[4])) {
            $this->item_categoria = $this->uri_segment[1];
            $this->item_sub = $this->uri_segment[2];
            $this->item_url = $this->uri_segment[3];
            $this->item_id = $this->uri_segment[4];
        }
//mostra meios de pagamento no rodape
        $this->payConfig = new Pay;
        $this->view_prepend_data = $this->payConfig->getPaysOn();

        $this->select()
            ->from('social')
            ->execute();
        if ($this->result()) {
            $this->social = (object)$this->data[0];
            if ($this->social->social_fb == "") {
                $this->assign('faceSH', 'hide');
            } else {
                $pl = '<div class="fb-page" data-href="' . $this->social->social_fb . '" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/clares.lab"><a href="https://www.facebook.com/clares.lab">PHPStaff</a></blockquote></div></div>
                      <div id="fb-root"></div>';
                $this->assign('social_plug_fb', $pl);
            }
            if ($this->social->social_tw == "") {
                $this->assign('twSH', 'hide');
            }
            if ($this->social->social_yt == "") {
                $this->assign('ytSH', 'hide');
            }
            if ($this->social->social_in == "") {
                $this->assign('inSH', 'hide');
            }
            if ($this->social->social_in != "") {
                $this->assign('social_insta', str_replace('@','',$this->social->social_in));
            }             
            if ($this->config->config_site_cnpj == "") {
                $this->assign('cnpjSH', 'hide');
            }
            $this->assignAll();
        }
    }

    public function welcome()
    {
        if ($this->item_id != null) {
            $this->select()
                ->from('item')
                ->join('sub', 'item_sub = sub_id', 'LEFT')
                ->join('categoria', 'item_categoria = categoria_id', 'INNER')
                ->where("item_id = $this->item_id and item_show = 1")
                ->execute();
            if ($this->result()) {
                $this->addkey('item_bread_title', '', 'item_title');
                $this->cut('item_bread_title', 35, '...');
                if ($this->data[0]['item_disp'] == "") {
                    $this->data[0]['show_hide_disp'] = 'hide';
                }
                $this->data[0]['item_desc'] = stripslashes($this->data[0]['item_desc']);
                //desconto
                $item_ref = $this->data[0]['item_ref'];
                $item_title = stripslashes($this->data[0]['item_title']);
                $this->item_title = $item_title;
                $item_desconto = $this->data[0]['item_desconto'];
                $item_estoque = $this->data[0]['item_estoque'];
                if ($item_estoque >= 1) {
                    $this->tpl('public/produto.html');
                    if ($item_desconto > 1) {
                        $this->assign('item_valor_original', @number_format($this->data[0]['item_preco'], 2, ",", "."));
                        $this->data[0]['item_preco'] = ($this->data[0]['item_preco'] - $this->data[0]['item_desconto']);
                    } else {
                        $this->assign('item_valor_original', '');
                        $this->assign('showHide', "hide");
                    }
                    //parcelamento
                    $item_parc = $this->data[0]['item_parc'];
                } else {
                    $this->tpl('public/produto_sem_estoque.html');
                }
                $item_preco_final = $this->data[0]['item_preco'];
                if (isset($_SESSION['mycep'])) {
                    $this->assign('mycep', $_SESSION['mycep']);
                }
                if ($this->data[0]['item_preco'] == '0,00' || $this->data[0]['item_preco'] <= 0) {
                    if ($item_ref == "") {
                        $item_ref = $this->item_id;
                    }
                    $_SESSION['FLUX_SOB_CONSULTA'] = "$item_title - Cód. do Produto: $item_ref";
                    $this->data[0]['item_preco'] = "Sob consulta ";
                    $this->data[0]['item_preco'] .= "<br /><br />  <a href='$this->baseUri/atendimento/' class='form-control btn btn-success'>Solicitar mais informações</a>";
                    $this->data[0]['show_hide_btn_comprar'] = "hide";
                    $this->data[0]['show_preco_avista'] = "hide";
                    $this->assign('show_valor_parc', 'hide');
                    $this->assignAll();
                } else {
                    //valor desconto % boleto
                    if ($this->payConfig->_pay['Boleto']->pay_status == 1) {
                        $desconto_boleto = $this->payConfig->_pay['Boleto']->pay_fator_juros;
                        $this->data[0]['item_avista'] = $this->data[0]['item_preco'] - (($this->data[0]['item_preco'] / 100) * $desconto_boleto);
                        $this->data[0]['item_avista'] = number_format($this->data[0]['item_avista'], 2, ',', '.');
                    } else {
                        $this->data[0]['show_preco_avista'] = 'hide';
                        $this->assign('show_desc_boleto', 'hide');
                    }
                    $this->money('item_preco');
                    $this->data[0]['item_preco'] = "Por R$ " . $this->data[0]['item_preco'];
                    $this->assignAll();
                    $parcelamento = '';
                    if ($item_estoque >= 1) {
                        $this->fillAtributos();
                        if ($item_parc >= 2) {
                            $parcelamento = preg_replace('/\./', ',', $this->payConfig->parcelamentoTabela($item_preco_final, $item_parc));
                            $this->assign('parcelas', $parcelamento);
                        } else {
                            $this->assign('show_valor_parc', 'hide');
                        }
                    }
                    $this->assign('parcelas', $parcelamento);
                }
            } else {
                $this->redirect("$this->baseUri/");
            }
            if (!$this->fillFoto()) {
                $this->assign('show_pics', 'false');
            } else {
                $this->assign('show_pics', 'true');
            }
            $this->getMenu();
            $this->fillAvaliacao();
            if ($this->cliente_id > 0) {
                //verifico se cliente comprou o item                
                if ($this->clienteComprouProduto($this->item_id) ||
                    isset($_SESSION['__PRODUTO__AVALIADO__']) &&
                    $_SESSION['__PRODUTO__AVALIADO__'] == $this->item_id
                ) {
                    $this->assign('showavaliacao', 'show');
                    if ($this->clienteAvaliouProduto($this->item_id)) {
                        //if (isset($_SESSION['__PRODUTO__AVALIADO__']) && $_SESSION['__PRODUTO__AVALIADO__'] == $this->item_id) {
                        $this->assign('showmsg', '');
                        $this->assign('showavaliacao', 'hide');
                    }
                } else {
                    $this->assign('showavaliacao', 'hide');
                    $this->assign('showmsg', 'Para avaliar este produto é necessário ter comprado!');
                }
            } else {
                $this->assign('showavaliacao', 'hide');
                $this->assign('showmsg', "Para avaliar este produto é necessário estar logado!<a href=\"$this->baseUri/cliente/\" class=\"btn btn-link\">clique aqui para entrar</a> ");
            }
            $this->render();
            $this->viewcount();
        }
    }

    public function clienteComprouProduto($produto)
    {
        $this->select()
            ->from('lista')
            ->join('pedido', 'lista_pedido = pedido_id', 'INNER')
            ->where("lista_item = $produto and pedido_cliente = $this->cliente_id")
            ->execute();
        if ($this->result()) {
            return true;
        } else {
            return false;
        }
    }

    public function clienteAvaliouProduto($produto)
    {
        $this->select()
            ->from('avaliacao')
            ->where("avaliacao_produto = $produto and avaliacao_usuario = $this->cliente_id")
            ->execute();
        if ($this->result()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMenu()
    {
        $this->menu = new Menu;
        $menu = $this->menu->getAll();
        $this->fetch('cat', $menu[0]);
        if (!$this->check_agent('mobile')) {
            //$this->fetch('cat', $menu[0]);
        } else {
            //$this->fetch('depto', $menu[1]);
        }
        $this->fetch('f', $this->menu->getFooter());
    }

    public function viewcount()
    {
        $this->increment('item', 'item_views', 1, "item_id = $this->item_id");
    }

    public function fillAtributos()
    {
        $itemA = array();
        $itemB = array();
        $itemC = array();
        $this->select()
            ->from('atributo')
            ->join('iattr', 'iattr_atributo = atributo_id', 'INNER')
            ->join('relatrr', 'relatrr_atributo = atributo_id', 'INNER')
            ->groupby('atributo_id')
            ->orderby('atributo_nome asc')
            ->execute();
        if ($this->result()) {
            $attr = $this->data;
            foreach ($attr as $k => $v) {
                $this->attr_id = $attr[$k]['atributo_id'];
                $this->attr_nome = $attr[$k]['atributo_nome'];
                $this->attr_short = strtolower(current(explode(" ", $attr[$k]['atributo_nome'])));
                $this->select()->from('iattr')->where("iattr_atributo = $this->attr_id")->orderby('iattr_nome asc')->execute();
                if ($this->result()) {
                    $itemA = array(
                        'atributo_id' => $this->attr_id,
                        'atributo_nome' => $this->attr_nome,
                        'atributo_short' => $this->attr_short,
                    );
                    $iattr = $this->data;
                    foreach ($iattr as $m => $n) {
                        $this->iattr_id = $iattr[$m]['iattr_id'];
                        $this->iattr_nome = $iattr[$m]['iattr_nome'];
                        $this->iattr_atributo = $iattr[$m]['iattr_atributo'];
                        $this->select()
                            ->from('relatrr')
                            ->where("relatrr_iattr = $this->iattr_id and relatrr_item = $this->item_id and relatrr_qtde >= 1")
                            ->execute();
                        if ($this->result()) {
                            $itemB = array(
                                'iattr_nome' => $this->iattr_nome,
                                'iattr_id' => $this->iattr_id,
                                'iattr_atributo' => $this->iattr_atributo,
                            );
                            if ($this->data[0]['relatrr_qtde'] >= 1) {
                                $itemB['iattr_qtde'] = $this->data[0]['relatrr_qtde'];
                                $itemB['iattr_preco'] = $this->data[0]['relatrr_preco'];
                                $itemB['text_iattr_preco'] = "";
                                if ($itemB['iattr_preco'] > 0) {
                                    $itemB['text_iattr_preco'] = "  +R$ " . $itemB['iattr_preco'];
                                }
                                $itemA['item'][] = $itemB;
                            }
                        }
                    }
                    $itemC[] = $itemA;
                }
            }
        }
        foreach ($itemC as $k => $v) {
            if (!isset($itemC[$k]['item'])) {
                unset($itemC[$k]);
            }
        }
        if (isset($itemC) && count($itemC) >= 1) {
            sort($itemC);
            $this->fetch('att', $itemC);
        }
        unset($itemC);
    }

    public function fillFoto()
    {
        $this->select()
            ->from('foto')
            ->where("foto_item = $this->item_id")
            ->orderby('foto_pos asc')
            ->execute();
        if ($this->result()) {
            $this->addkey('foto_big', '', 'foto_url');
            //$this->preg( array( '/\.jpg/', '/\.png/' ), array( '', '' ), 'foto_url' );
            $this->f_foto = $this->data[0]['foto_url'];
            $this->f_foto_big = $this->data[0]['foto_big'];
            $this->assign('f_foto', $this->f_foto);
            $this->assign('f_big', $this->f_foto_big);
            $this->assignAll();
            $this->fetch('fg', $this->data);
            //$this->fetch('lfg', $this->data);
            $this->fetch('tfg', $this->data);
        } else {
            $this->fetch('fg', array(array('foto_url' => 'nopic.jpg')));
            $this->assign('semFoto', 'hide');
            return false;
        }
    }

    public function fillAvaliacao()
    {
        $this->select()
            ->from('avaliacao')
            ->join('cliente', 'avaliacao_usuario = cliente_id', 'INNER')
            ->where("avaliacao_produto = $this->item_id and avaliacao_aprovado = 1")
            ->orderby('avaliacao_id desc')
            ->execute();
        if ($this->result()) {
            $this->todata('avaliacao_data', 'd-m-Y');
            $this->fetch('av', $this->data);
        }
    }

    public function classificar()
    {

        if ($this->cliente_id > 0 && isset($_POST['nota'])) {
            $nota = intval($_POST['nota']);
            $this->nota = $nota;
            $comentario = addslashes(strip_tags($_POST['comentario']));
            $produto = intval($_POST['idprod']);
            $cliente = intval($this->cliente_id);
            $this->method = "INSERT";
            $sql = "INSERT INTO avaliacao(avaliacao_nota, avaliacao_produto, avaliacao_comentario, avaliacao_usuario)";
            $sql .= " values ($nota , $produto, '$comentario' , $cliente)";
            $this->query = $sql;
            $this->execute();
            $_SESSION['__PRODUTO__AVALIADO__'] = $produto;
            $this->notificarAdmin();
        }
    }

    public function notificarAdmin()
    {
        $body = '<html><body>';
        $body .= '<h1 style="font-size:15px;">Produto Avaliado -  ' . $this->item_title . '!</h1>';
        $body .= '<table style="border-color: #666; font-size:11px" cellpadding="10">';
        $body .= '<tr style="background: #fff;"><td><strong>Data:</strong> </td><td>' . date('d/m/Y H:s') . '</td></tr>';
        $body .= '<tr style="background: #eee;"><td><strong>Cliente:</strong> </td><td>' . $this->cliente_nome . '</td></tr>';
        $body .= '<tr style="background: #fff;"><td><strong>Produto:</strong> </td><td>' . $this->item_title . '</td></tr>';
        $body .= '<tr style="background: #eee;"><td><strong>Nota:</strong> </td><td>' . $this->nota . '</td></tr>';
        $body .= '</table>';
        $body .= '<br/><br/>';
        $body .= '</body></html>';
        $m = new sendmail;
        $n = array(
            'subject' => utf8_decode("Produto Avaliado - $this->item_title"),
            'body' => utf8_decode($body)
        );
        $m->sender($n);
    }

}

/* end file */
