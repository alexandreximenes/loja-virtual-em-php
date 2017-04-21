<?php
#$banco = 'aula';
$banco = 'sistemavendas';
$conexao = mysqli_connect('localhost','root','',$banco) or die ("Não foi possivel conectar no banco de dados");
