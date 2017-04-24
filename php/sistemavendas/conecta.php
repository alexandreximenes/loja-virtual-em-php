<?php
#$banco = 'aula';

// $nomeBanco = 'id1442605_sistemavendas';
// $usuario = 'id1442605_root';
// $senha = 'tipmuch';

// $conexao = mysqli_connect('localhost',$usuario, $senha, $nomeBanco) or die ("Não foi possivel conectar no banco de dados");

$banco = 'sistemavendas';
$conexao = mysqli_connect('localhost','root','',$banco) or die ("Não foi possivel conectar no banco de dados");
