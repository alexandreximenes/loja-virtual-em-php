<?php
require_once ("conecta.php");
function cadastrarLivro($conexao, $post) {
	if (count ( $post ) > 0) {
		$codigo = addslashes ( $post ['codigo'] );
		$nome = addslashes ( $post ['nome'] );
		$editora = addslashes ( $post ['editora'] );
		$isbn = addslashes ( $post ['isbn'] );
		$numero_edicao = addslashes ( $post ['numero_edicao'] );
		$ano_edicao = addslashes ( $post ['ano_edicao'] );
		$autor = addslashes ( $post ['autor'] );
		$avaliacao = addslashes ( $post ['avaliacao'] );
		$descricao = addslashes ( $post ['descricao'] );
		
		$query = "";
		if (empty ( $codigo )) {
			echo "insert --" . $query = "insert into livro (nome, editora, isbn, numero_edicao, ano_edicao, autor, avaliacao, descricao) 
			values('{$nome}', '{$editora}', {$isbn}, {$numero_edicao}, {$ano_edicao}, '{$autor}', '{$avaliacao}', '{$descricao}')";
		} else {
			echo "update --" . $query = "update livro set nome = '{$nome}', editora = '{$editora}', isbn = {$isbn}, numero_edicao = {$numero_edicao}, 
			ano_edicao = {$ano_edicao}, autor = '{$autor}', avaliacao = '{$avaliacao}', descricao = '{$descricao}' where id = {$codigo}";
		}
		echo "result " . $result = mysqli_query ( $conexao, $query );
		if (! $result) {
			erroNoBanco ( $result );
		}
		;
	}
}
function buscarLivros($conexao) {
	$livros = array();
	$query = "select * from livro order by nome";
	$result = mysqli_query ( $conexao, $query );
	
	if (! $result) {
		erroNoBanco ( $conexao );
	} else {
		while ( $livro = mysqli_fetch_assoc ( $result ) ) {
			array_push ( $livros, $livro );
		}
		return $livros;
	}
}

function deletarLivro($conexao, $get) {
	if (count ( $get == 1 )) {
		$id = addslashes($get['codigo']);
		$query = "delete from livro where id = {$id}";
		$result = mysqli_query($conexao, $query);
		if(!result){
			erroNoBanco($conexao);
		}
	}
}
function editarLivro($conexao, $get){
	if (count ( $get == 1 )) {
		$id = addslashes($get['codigo']);
		$query = "select * from livro where id = {$id}";
		echo $query;
		$result = mysqli_query($conexao, $query);
		if(!result){
			erroNoBanco($conexao);
		}
		return mysqli_fetch_assoc($result);
		
	}
}
function nota($estrela){
	switch ($estrela){
		case '1 estrela': echo "Ruim"; break;
		case '2 estrela': echo "Bom";
		case '3 estrela': echo "Bom"; break;
		case '4 estrela': echo "Otimo";
		case '5 estrela': echo "Otimo";break;
	}
}
function erroNoBanco($conexao) {
	echo '<br> Erro ao executar acao no banco : <br>'.mysqli_error ( $conexao );
	return;
}
?>