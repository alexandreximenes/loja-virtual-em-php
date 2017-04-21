<?php
include("conecta.php");
include("banco-jogo.php");

$codigo = $_GET['codigo'];

echo $codigo;

apagaJogo($conexao, $codigo);

header("Location: listaJogo.php");
die();
