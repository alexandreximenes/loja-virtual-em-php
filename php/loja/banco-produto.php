<?php
require_once ("conecta.php");
require_once ("class/Produto.php");
require_once ("class/Categoria.php");

function listaProdutos($conexao) {
	
	$produtos = array ();
	$query = "select p.*, c.nome as categoria_nome from produtos p join categorias c on p.categorias_id = c.id";
	$resultado = mysqli_query ( $conexao, $query );
	
	while ( $produto_array = mysqli_fetch_assoc ( $resultado ) ) {
		$produto = new Produto();
		$categoria = new Categoria();
		$categoria->nome = $produto_array['categoria_nome'];
		
		$produto->id = $produto_array ['id'];
		$produto->nome =$produto_array ['nome'];
		$produto->setPreco($produto_array ['preco']);
		$produto->descricao = $produto_array ['descricao'];
		$produto->categorias = $categoria;
		$produto->usado = $produto_array ['usado'];
		array_push ( $produtos, $produto );
	}
	
	return $produtos;
}
function insereProduto($conexao, $post) {
	$produto = new Produto ();
	$categoria = new Categoria();
	$categoria->id = addslashes ( $post ['categorias_id'] );
	
	$produto->id = addslashes ( $post["id"] );
	$produto->nome = addslashes ( $post ["nome"] );
	$produto->setPreco(addslashes ( $post ["preco"] ));
	$produto->descricao = addslashes ( $post ["descricao"] );
	$produto->categorias = $categoria;
	
	if (array_key_exists ( 'usado', $_POST )) {
		$produto->usado = "true";
	} else {
		$produto->usado = "false";
	}
	$query = "";	
	if(empty($produto->id)){
		$query = "insert into produtos (nome, preco, descricao, categorias_id, usado)
		values ('{$produto->nome}', {$produto->getPreco()}, '{$produto->descricao}', {$produto->categorias}, {$produto->usado})";		
	}else{
		$query = "update produtos set nome = '{$produto->nome}', preco = {$produto->getPreco()}, descricao = '{$produto->descricao}',
		categorias_id= {$produto->categorias->id}, usado = {$produto->usado} where id = {$produto->id}";
	}
	
	if(mysqli_query ($conexao, $query )){
		return $produto;
	}else{
		return mysqli_error($conexao);
	}
}

function removeProduto($conexao, $post) {
	$produto = new Produto();
	$produto->id = addslashes($post['id']);
	$query = "delete from produtos where id = {$produto->id}";
	return mysqli_query ( $conexao, $query );
}
function buscaProduto($conexao, $get) {
	$id = addslashes($get['id']);
	
	$produto = new Produto();
	$categoria = new Categoria();
	
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query ( $conexao, $query );
	$p = mysqli_fetch_assoc ( $resultado );
	
	$categoria->id = $p['categorias_id'];
	$produto->id = $p ['id'];
	$produto->nome =$p ['nome'];
	$produto->setPreco($p ['preco']);
	$produto->descricao = $p ['descricao'];
	$produto->categorias = $categoria;
	$produto->usado = $p ['usado'];
	
	return $produto;
}
