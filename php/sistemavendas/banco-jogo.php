<?php include("conecta.php");
function listaJogo($conexao) {
	$jogos = array ();
	$query = "select * from jogo order by codigo desc";
	$resultado = mysqli_query ( $conexao, $query );
	while ( $jogo = mysqli_fetch_assoc ( $resultado ) ) {
		array_push ( $jogos, $jogo );
	}
	
	return $jogos;
}

function apagaJogo($conexao, $codigo){
	$cod = addslashes($codigo);
	$query = "delete from jogo where codigo = {$cod}";
	return mysqli_query($conexao, $query);
}

function gerarPedido($conexao, $itens){
	$query = "insert into pedido () values ()";
	mysqli_query($conexao, $query);
	
	$pedido_codigo = mysqli_insert_id();
	
	foreach($itens as $item){
		$jogo_codigo = $item['jogo_codigo'];
		$quantidade = $item['quantidade'];
		
		$query = "insert into item_pedido (pedido_codigo, jogo_codigo, quantidade) values ({$pedido_codigo}, {$jogo_codigo}, {$quantidade})"; 
		mysqli_query($conexao, $query);
	}
	return $pedido_codigo;
}

function adicionaJogo($conexao, $jogo){
	
	$codigo = addslashes($jogo['codigo']);
	$nome =  addslashes($jogo ['nome']);
	$empresa =  addslashes($jogo ['empresa']);
	$ano =  addslashes($jogo ['ano']);
	$modalidade =  addslashes($jogo ['modalidade']);
	$valor =  addslashes($jogo ['valor']);
	$detalhes =  addslashes($jogo ['detalhes']);
	$imagem ="";
	
	if(strlen($_FILES['imagem']['name'])>5){
		$imagem = "img/".$_FILES['imagem']['name'];
	}else{
		$imagem = "img/semimagem.jpg";
	}
	
	$url_imagem = $imagem; // url da imagem na pasta
	
	$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário
	move_uploaded_file($tmpName, $url_imagem);
	
	$query = "";
	
	if($jogo['codigo'] == ""){
		$query = "insert into jogo (nome, empresa, ano, modalidade, valor, detalhes, imagem) values
		('{$nome}', '{$empresa}', '{$ano}', '{$modalidade}', {$valor}, '{$detalhes}', '{$url_imagem}')";
	}else{
		$query = "update jogo set nome = '{$nome}', empresa = '{$empresa}', ano = '{$ano}', modalidade = '{$modalidade}', valor = '{$valor}', detalhes = '{$detalhes}', imagem = '{$url_imagem}' where codigo = {$codigo}";
	}
	
 	return mysqli_query($conexao, $query);
 
 }

 
 function buscaJogo($conexao, $codigo){
 	$cod = addslashes($codigo);
 	$query = "select * from jogo where codigo = {$cod}";
 	$resultado = mysqli_query($conexao, $query);
 	return mysqli_fetch_assoc($resultado);
 		
 	}
 	
 	function buscaJogoParaSessao($conexao, $codigo){
 		$cod = addslashes($codigo);
 		$query = "select codigo, nome, valor from jogo where codigo = {$cod}";
 		$resultado = mysqli_query($conexao, $query);
 		return mysqli_fetch_assoc($resultado);
 		
 	}
 	
 	
 