<?php
require_once ("cabecalho.php");
require_once ("conecta.php");
require_once ("banco-jogo.php");
require_once'carrocel.php'; 

$carrinho = listaJogo ( $conexao );
shuffle($carrinho);

foreach ( $carrinho as $jogo ) : 
 		include 'produtos-carrinho.php';
	endforeach?>

    <?php require_once("rodape.php");?>
  