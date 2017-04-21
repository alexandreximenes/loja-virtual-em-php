<?php include("cabecalho.php");
include("conecta.php");
include("banco-jogo.php");


	$pedido_codigo = gerarPedido($conexao, $_SESSION['carrinho']);
	
?>

O seu pedido foi gerado <br>
O codigo do pedido é : <?= $pedido_codigo ?>