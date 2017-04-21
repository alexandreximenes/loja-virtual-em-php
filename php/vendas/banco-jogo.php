<?php
function listaJogo($conexao) {
	$jogos = array ();
	$query = "select * from jogo";
	$resultado = mysqli_query ( $conexao, $query );
	while ( $jogo = mysqli_fetch_assoc ( $resultado ) ) {
		array_push ( $jogos, $jogo );
	}
	
	return $jogos;
}
function apagaJogo($conexao, $codigo) {
	$cod = addslashes ( $codigo );
	$query = "delete from jogo where codigo = {$cod}";
	return mysqli_query ( $conexao, $query );
}
function gerarPedido($conexao, $itens) {
	$query = "insert into pedido () values ()";
	mysqli_query ( $conexao, $query );
	
	$pedido_codigo = mysqli_insert_id ();
	
	foreach ( $itens as $item ) {
		$jogo_codigo = $item ['jogo_codigo'];
		$quantidade = $item ['quantidade'];
		
		$query = "insert into item_pedido (pedido_codigo, jogo_codigo, quantidade) values ({$pedido_codigo}, {$jogo_codigo}, {$quantidade})";
		mysqli_query ( $conexao, $query );
	}
	return $pedido_codigo;
}
function adicionaJogo($conexao, $jogo) {
	$codigo = addslashes ( $jogo ['codigo'] );
	$nome = addslashes ( $jogo ['nome'] );
	$empresa = addslashes ( $jogo ['empresa'] );
	$ano = addslashes ( $jogo ['ano'] );
	$modalidade = addslashes ( $jogo ['modalidade'] );
	$valor = addslashes ( $jogo ['valor'] );
	$detalhes = addslashes ( $jogo ['detalhes'] );
	
	$query = "";
	
	if ($jogo ['codigo'] == "") {
		$query = "insert into jogo (nome, empresa, ano, modalidade, valor, detalhes) values
		('{$nome}', '{$empresa}', '{$ano}', '{$modalidade}', {$valor}, '{$detalhes}')";
	} else {
		$query = "update jogo set nome = '{$nome}', empresa = '{$empresa}', ano = '{$ano}', modalidade = '{$modalidade}', valor = '{$valor}', detalhes = '{$detalhes}' where codigo = {$codigo}";
	}
	
	return mysqli_query ( $conexao, $query );
}
function adicionaNaSessao($get) {
	session_start ();
	$carrinho = array ();
	if (! isset ( $_SESSION ['carrinho'] )) {
		$_SESSION ['carrinho'] = array ();
	}
	
	if (isset ( $get ["codigo"] ) && $get ['acao'] == '') {
		$jogo = buscaJogo ( $get ['codigo'] );
		print_r ( $jogo );
		$carrinho ['codigo'] = $jogo ['codigo'];
		$carrinho ['nome'] = $jogo ['nome'];
		$carrinho ['valor'] = $jogo ['valor'];
		$carrinho ['quantidade'] = 1;
		
		array_push ( $_SESSION ['carrinho'], $carrinho );
	}
	
	if (isset ( $get ["codigo"] ) && $get ['acao'] == '') {
		$jogo = buscarJogo ( $get ["codigo"] );
		$item ['codigo'] = $jogo ['codigo'];
		$item ['nome'] = $jogo ['nome'];
		$item ['quantidade'] = 1;
		$item ['valor'] = 10.00;
		array_push ( $_SESSION ['carrinho'], $item );
	}
}
function buscaJogo($conexao, $codigo) {
	$cod = addslashes ( $codigo );
	$query = "select * from jogo where codigo = {$cod}";
	echo "query buscaJogo" . $query;
	$resultado = mysqli_query ( $conexao, $query );
	return mysqli_fetch_assoc ( $resultado );
}
 
 /*
 function editaJogo($conexao, $jogo){
 	$nome =  addslashes($jogo ['nome']);
 	$empresa =  addslashes($jogo ['empresa']);
 	$ano =  addslashes($jogo ['ano']);
 	$modalidade =  addslashes($jogo ['modalidade']);
 	$valor =  addslashes($jogo ['valor']);
 	$detalhes =  addslashes($jogo ['detalhes']);
 	
 	$query = "update jogo set nome = '{$nome}', empresa = '{$empresa}', ano = '{$ano}', modalidade = '{$modalidade}', valor = '{$valor}', detalhes = '{$detalhes}'";
	 
 }

 */
 
 	
/*function adicionaJogo($conexao, $jogo) {
	$nome = $jogo ['nome'];
	$empresa = $jogo ['empresa'];
	$ano = $jogo ['ano'];
	$modalidade = $jogo ['modalidade'];
	$valor = $jogo ['valor'];
	$detalhes = $jogo ['detalhes'];
	
	$query = sprintf ( "insert into jogo (nome, empresa) values ('%s', '%s')", // ano, modalidade, valor, detalhes) values
    mysql_real_scape_string ($nome), mysql_real_scape_string ( $empresa ) ); // ', '{$ano}', '{$modalidade}', {$valor}, '{$detalhes}')";
	echo $query;
	return mysqli_query ( $conexao, $query );
}
*/