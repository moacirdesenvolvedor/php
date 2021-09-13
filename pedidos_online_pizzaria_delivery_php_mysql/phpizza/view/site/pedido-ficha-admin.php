<?php

function br() {
    echo "<br> \n";
}
?>

PEDIDO - <?= $data['pedido']->pedido_id ?><?php br(); ?>
Data do pedido: <?= date('d/m/Y H:i', strtotime($data['pedido']->pedido_data)); ?><?php br(); ?>
Cliente: <?= (Filter::antiSQL($_POST['cliente_nome'])) ?><?php br(); ?>
Telefone de Entrega: <?= (Filter::antiSQL($_POST['cliente_fone'])) ?> <?php br(); ?>
Taxa de Entrega:  R$ <?= Filter::moeda($data['pedido']->pedido_entrega) ?><?php br(); ?>
Total do Pedido: R$ <?= ($data['pedido']->pedido_total > 0) ? Filter::moeda($data['pedido']->pedido_total) : '0.00'; ?><?php br(); ?>

<?php
$pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
$rep = array('<i class="fa fa-hourglass-o"></i> Pendente', '<i class="fa fa-hourglass-2"></i> Em andamento', '<i class="fa fa-motorcycle"></i>  Em rota de entrega', '<i class="fa fa-check-circle-o"></i> Pedido Entregue', '<i class="fa fa-remove"></i> Cancelado');
$status = preg_replace($pat, $rep, $data['pedido']->pedido_status);
$pat = array('/1/', '/2/', '/3/', '/4/', '/5/');
$rep = array('warning', 'info', 'info', 'success', 'danger');
$status_msg = preg_replace($pat, $rep, $data['pedido']->pedido_status);
?>
Status do Pedido: <?= $status ?><?php br(); ?>
Observações: <?= strip_tags($data['pedido']->pedido_obs) ?><?php br(); ?>

<?php $end = $data['endereco']; ?>
Local de Entrega: <?= $end->endereco_nome ?>        <?php br(); ?>
Endereço <?= $end->endereco_endereco ?>, <?= $end->endereco_numero ?>, <?php if ($end->endereco_complemento != ""): ?> <?= $end->endereco_complemento ?> - <?php endif; ?> <?= $end->endereco_cidade ?> - <?= $end->endereco_uf ?> <?php br(); ?>
<?php if (isset($data['lista'])): ?>
    Itens do Pedido: <?php br(); ?>
    <?php foreach ($data['lista'] as $cart): ?>
        <?= $cart->lista_item_codigo ?>|<?= $cart->lista_item_nome ?> <?= ($cart->lista_opcao_nome != "") ? ' - ' . $cart->lista_opcao_nome : '' ?>|<?= $cart->lista_qtde ?>|<?= $cart->lista_opcao_preco ?>|<?= strip_tags($cart->lista_item_desc) ?><?php br(); ?>         
    <?php endforeach; ?>
<?php endif; ?>
     