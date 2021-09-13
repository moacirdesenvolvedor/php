<?php

@session_start();

Class Index {

    public $param_busca = null;

    public function __construct() {
        
    }

    public function indexAction() {
        $config = (new configModel)->get_config();
        $categoria = (new categoriaModel)->get_all('categoria_pos ASC');
        $produtos = $this->lista_padrao($categoria);
        $meia = [];
        foreach ($produtos as $produto) {
            if ($produto['categoria_meia'] == 1) {
                $meia[] = $produto;
            }
        }
        $dados = array(
            'config' => $config,
            'categoria' => $categoria,
            'lista_combo' => $produtos,
            'lista' => $produtos,
            'meia' => $meia
        );
        Tpl::view("site.index", $dados);
    }

    public function busca() {
        $config = (new configModel)->get_config();
        $categoria = (new categoriaModel)->get_all('categoria_pos ASC');
        $produtos = $this->lista_padrao($categoria);
        $meia = [];
        foreach ($produtos as $produto) {
            if ($produto['categoria_meia'] == 1) {
                $meia[] = $produto;
            }
        } 
        $dados = array(
            'config' => $config,
            'categoria' => $categoria,
            'lista_combo' => $produtos,
            'lista' => $this->lista_busca($categoria),
            'meia' => $meia
        );
        Tpl::view("site.index", $dados);
    }

    public function lista_padrao($categoria) {
        $cat_item = array();
        $k = 0;
        foreach ($categoria as $cat) {
            $itens = (new itemModel)->get_by_categoria_com_opcao($cat->categoria_id, '');
            if (isset($itens[0])) {
                $cat_item[$k]['categoria'] = $cat->categoria_nome;
                $cat_item[$k]['categoria_id'] = $cat->categoria_id;
                $cat_item[$k]['categoria_meia'] = $cat->categoria_meia;
                $cat_item[$k]['item'] = $itens;
                $k++;
            }
        }
        return $cat_item;
    }

    public function lista_busca($categoria) {
        //$this->param_busca = explode('|#|',Post::get('ipt-busca'));
        //$this->nome  = explode('|#|',Post::get('ipt-busca'));
        $this->nome = Post::get('ipt-nome');
        $this->cod = Post::get('ipt-cod');
        $this->desc = Post::get('ipt-desc');
        $this->obs = Post::get('ipt-obs');
        $config = (new configModel)->get_config();
        $cat_item = array();
        $k = 0;
        foreach ($categoria as $cat) {
            $itens = (new itemModel)->get_by_busca($cat->categoria_id, $this->nome, $this->cod, $this->desc, $this->obs);
            if (isset($itens[0])) {
                $cat_item[$k]['categoria'] = $cat->categoria_nome;
                $cat_item[$k]['categoria_id'] = $cat->categoria_id;
                $cat_item[$k]['categoria_meia'] = $cat->categoria_meia;
                $cat_item[$k]['item'] = $itens;
                $k++;
            }
        }
        return $cat_item;
    }

    public function sobre() {
        $config = (new configModel)->get_config();
        $dados = array(
            'config' => $config,
        );
        Tpl::view("site.sobre", $dados);
    }

}
