<?php

/* Configuração de Rotas Alternativas da Aplicação */
$routes = array(
    "sobre" => "Index:sobre",
    "busca" => "Index:busca",
    "cadastro" => "Cadastro:novo",
    "meu-cadastro-salvar" => "Cadastro:gravar",
    "meus-dados" => "Cadastro:editar",
    "meu-endereco-salvar" => "Local:gravar",
    "meus-enderecos" => "Local:lista",
    "meus-pedidos" => "Pedido:lista",
    "detalhes-do-pedido" => "Pedido:exibir",
    "pedido-ficha-cliente" => "Ficha:cliente",
    "pedido-ficha-admin" => "Ficha:admin",
    "novo-endereco" => "Local:novo",
    "editar-endereco" => "Local:editar",
    "cliente-remover-endereco" => "Local:remove",
    "entrar" => "loginCliente:indexAction",
    "sair" => "loginCliente:logout",
    "cliente-login-entrar" => "loginCliente:entrar",
    "configuracao-email" => "Smtp:indexAction",
    "configuracao-email-atualizar" => "Smtp:gravar",
    "recupera-senha" => "LoginCliente:recupera_senha",
    "nova-senha" => "LoginCliente:nova_senha",
);
