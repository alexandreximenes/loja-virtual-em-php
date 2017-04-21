<?php require_once("cabecalho.php");
require_once("banco-produto.php"); 
require_once("class/Produto.php"); ?>

<?php

if(insereProduto($conexao, $_POST)) { ?>
    <p class="text-success">O produto <?= $produto->nome; ?>, <?= $produto->preco; ?> alterado com sucesso!</p>
<?php } else {
?>
    <p class="text-danger">O produto <?= $produto->nome; ?> não foi alterado:</p>
<?php
}
?>

<?php include("rodape.php"); ?>
