<?php

Class Upload {

    static public function Enviar($file, $pasta = '') {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/$pasta";
        $arquivo = $midia . basename($file['name']);
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $arquivo)) {
            return $file['name'];
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Pdf($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/pdf/";
        $arquivo = $midia . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $arquivo)) {
            return $file['name'];
        } else {
            echo "Erro ao fazer upload!";
            exit;
            //ideal seria redirecionar para pagina de erro ex:
            //View::Tpl( 'erro/upload'); exit;
        }
    }

    static public function Slide($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/item/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Filter::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Filter::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Logo($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/logo/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Filter::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Filter::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Banner($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/banner/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Popular($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/popular/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Cliente($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/cliente/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Parceiro($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/parceiro/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Cliente2($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/cliente/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }

    static public function Agencia($file) {
        $midia = explode("/helpers", __DIR__);
        $midia = $midia[0] . "/midias/agencia/";
        $extensao = Upload::get_extensao($file['name']);
        $arquivo_extensao = Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        $destino = $midia . Util::slug(basename($file['name'])) . "_" . time() . ".$extensao";
        //verifica se o arquivo enviado é uma imagem
        $check = getimagesize($file["tmp_name"]);
        if ($check === false || !isset($check['mime'])) {
            $dados = array('mensagem' => "Erro ao fazer upload - O arquivo deve ser uma imagem!");
            Tpl::View('adm/erro/upload', $dados);
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $arquivo_extensao;
        } else {
            Tpl::view('adm/erro/upload');
            exit;
        }
    }



    static public function get_extensao($file) {
        $ext = explode(".", $file);
        return $ext[count($ext) - 1];
    }

}
