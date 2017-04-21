<?php include("conecta.php");
function listaJogo($conexao) {
	$jogos = array ();
	$query = "select * from jogo";
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
	$imagem = $_FILES['imagem']['name'];
	
	$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporário
	$url_imagem = (empty($imagem)) ? "" : "img/".$imagem; // url da imagem na pasta
		
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
 
 function adicionaNaSessao($codigo){
	 session_start();
	 $carrinho = array();
	 if(!isset($_SESSION['carrinho'])) {
		 $_SESSION['carrinho'] = array();
		 }
	 
	 if (isset($_GET["codigo"]) && $_GET['acao'] == '') {
		 $jogo = buscaJogo($codigo);
		 $carrinho['codigo'] = $jogo['codigo'];
		 $carrinho['nome'] = $jogo['nome'];
		 $carrinho['valor'] = $jogo['valor'];
		 $carrinho['quantidade'] = 1;
	 
	 
	 array_push($_SESSION['carrinho'], $carrinho);
	 }
	 			if (isset($_GET["codigo"]) && $_GET['acao'] == '') {
				$jogo = buscaJogo($_GET["codigo"]);
				$item['codigo'] = $jogo['codigo'];
				$item['nome'] = $jogo['nome'];
				$item['quantidade'] = 1;
				$item['valor'] = 10.00;				
				array_push($_SESSION['carrinho'], $item);
			}	
	 
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
 	
 	
 