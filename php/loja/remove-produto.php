<?php require_once("cabecalho.php");
require_once("banco-produto.php");

if(isset($_POST['id'])){
	removeProduto($conexao, $_POST);
	$_SESSION['success'] = "Produto removido com sucesso!";
	header("Location: produto-lista.php");
	die();
}
?>
