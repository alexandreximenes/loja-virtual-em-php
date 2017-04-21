<?php
require_once ("cabecalho.php");
require_once ("conecta.php");
require_once ("banco-jogo.php");

?>

<?php include 'carrocel.php'; ?>

<?php

if (isset ( $_SESSION ['usuario'] )) {
	$usuarioLogado = $_SESSION ['usuario']; ?>
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success!</strong> <strong><?=$usuarioLogado['nome']?></strong>
	</div>
<?php }

$jogos = listaJogo ( $conexao );
foreach ( $jogos as $jogo ) : 
 		include 'produtos-carrinho.php';
	endforeach?>

    <?php require_once("rodape.php");?>
  