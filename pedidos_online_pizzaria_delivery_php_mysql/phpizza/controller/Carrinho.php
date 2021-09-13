<?php

@session_start();

class Carrinho {

    static public function isfull() {
        if (isset($_SESSION['__APP__CART__']) && !empty($_SESSION['__APP__CART__'])) {
            return true;
        } else {
            return false;
        }
    }

    static public function get_count() {
        if (isset($_SESSION['__APP__CART__']) && count($_SESSION['__APP__CART__']) >= 1) {
            return '<span class="badge badge-success">' . count($_SESSION['__APP__CART__']) . '</span>';
        } else {
            return '';
        }
    }

    static public function get_count_js() {
        if (isset($_SESSION['__APP__CART__']) && count($_SESSION['__APP__CART__']) >= 1) {
            echo '<span class="badge badge-success">' . count($_SESSION['__APP__CART__']) . '</span>';
        } else {
            echo '';
        }
    }

    static public function get_all() {
        if (isset($_SESSION['__APP__CART__'])) {
            return $_SESSION['__APP__CART__'];
        } else {
            return false;
        }
    }

    static public function add() {
        if (isset($_POST) && !empty($_POST)) {
            $array = $_POST;
            $object = new stdClass();
            foreach ($array as $key => $value) {
                $object->$key = Filter::trim_str($value);
            }
            if (isset($object->item_preco) && isset($object->item_nome)) {
                $object->qtde = 1;
                $object->item_hash = uniqid(time());
                $_SESSION['__APP__CART__'][] = $object;
                //print_r($object);
            }
        }
    }

    static public function add_more() {
        $id = Post::get('id');
        if ($id > 0) {
            if (isset($_SESSION['__APP__CART__'])) {
                foreach ($_SESSION['__APP__CART__'] as $k => $v) {
                    if ($_SESSION['__APP__CART__'][$k]->item_hash == $id) {
                        $_SESSION['__APP__CART__'][$k]->qtde++;
                        if ($_SESSION['__APP__CART__'][$k]->qtde <= 9)
                            echo "0" . $_SESSION['__APP__CART__'][$k]->qtde;
                        else
                            echo $_SESSION['__APP__CART__'][$k]->qtde;
                    }
                }
            }
        }
    }

    static public function del_more() {
        $id = Post::get('id');
        if ($id > 0) {
            if (isset($_SESSION['__APP__CART__'])) {
                foreach ($_SESSION['__APP__CART__'] as $k => $v) {
                    if ($_SESSION['__APP__CART__'][$k]->item_hash == $id) {
                        if ($_SESSION['__APP__CART__'][$k]->qtde > 1) {
                            $_SESSION['__APP__CART__'][$k]->qtde--;
                            if ($_SESSION['__APP__CART__'][$k]->qtde <= 9)
                                echo "0" . $_SESSION['__APP__CART__'][$k]->qtde;
                            else
                                echo $_SESSION['__APP__CART__'][$k]->qtde;
                        } else {
                            if (isset($_SESSION['__APP__CART__'][$k])) {
                                unset($_SESSION['__APP__CART__'][$k]);
                            }
                        }
                    }
                }
            }
        }
    }

    static public function clear() {
        if (isset($_SESSION['__APP__CART__'])) {
            unset($_SESSION['__APP__CART__']);
        }
    }

    static public function get_total() {
        if (isset($_SESSION['__APP__CART__'])) {
            $total = 0;
            foreach ($_SESSION['__APP__CART__'] as $k) {
                $total += (floatval($k->item_preco) + floatval($k->opc_preco)) * intval($k->qtde);
            }
            return $total;
        }
    }

    static public function __show() {
        if (isset($_SESSION['__APP__CART__'])) {
           // Filter::pre($_SESSION['__APP__CART__']);
        }
    }

    static public function reload() {
        $config = (new configModel)->get_config();
        $cat_item = array();
        $categorias = (new categoriaModel)->get_all('categoria_pos ASC');
        $k = 0;
        foreach ($categorias as $cat) {
            $itens = (new itemModel)->get_by_categoria_com_opcao($cat->categoria_id);
            $cat_item[$k]['categoria'] = $cat->categoria_nome;
            $cat_item[$k]['categoria_id'] = $cat->categoria_id;
            $cat_item[$k]['item'] = $itens;
            $k++;
        }
        $dados = array(
            'config' => $config,
            'lista' => (object) $cat_item
        );
        Tpl::view("site.side-carrinho", $dados);
    }

}
