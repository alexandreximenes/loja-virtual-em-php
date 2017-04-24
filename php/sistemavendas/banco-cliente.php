<?php require_once 'conecta.php';

function listaCliente($conexao) {
	$clientes = array ();
	$query = "select * from cliente";
	$resultado = mysqli_query ( $conexao, $query );
	while ( $cliente = mysqli_fetch_assoc ( $resultado ) ) {
		array_push ( $clientes, $cliente );
	}
	return $clientes;
}

function apagaCliente($conexao, $codigo){
	$cod = addslashes($codigo);
	$query = "delete from cliente where codigo = {$cod}";
	return mysqli_query($conexao, $query);
}

function adicionaCliente($conexao, $cliente){
	
	$codigo = addslashes($cliente['codigo']);
	$nome =  addslashes($cliente ['nome']);
	$nascimento =  date('Y-m-d', strtotime(addslashes($cliente ['nascimento'])));
	$endereco =  addslashes($cliente ['endereco']);
	$numero =  addslashes($cliente ['numero']);
	$cep =  addslashes($cliente ['cep']);
	$cidade =  addslashes($cliente ['cidade']);
	$estado =  addslashes($cliente ['estado']);
	$login =  addslashes($cliente ['login']);
	$senha =  addslashes($cliente ['senha']);
	$imagem = $_FILES['imagem']['name'];
	$tmpName = $_FILES['imagem']['tmp_name']; // Recebe o arquivo temporario
	$url_imagem = (empty($imagem)) ? '' : "img/cliente/".$imagem; // url da imagem na pasta	
	move_uploaded_file($tmpName, $url_imagem);
	
	$query = "";
	
	if($cliente['codigo'] == ""){
		if(empty($url_imagem)){
			$query = "insert into cliente (nome, nascimento, endereco, numero, cep, cidade, estado, login, senha) values
			('{$nome}', '{$nascimento}', '{$endereco}', {$numero}, '{$cep}', '{$cidade}', '{$estado}', '{$login}', '{$senha}')";
		}else{
			$query = "insert into cliente (nome, nascimento, endereco, numero, cep, cidade, estado, login, senha, imagem) values
			('{$nome}', '{$nascimento}', '{$endereco}', {$numero}, '{$cep}', '{$cidade}', '{$estado}', '{$login}', '{$senha}','{$url_imagem}')";
		}
	}else{
		if(empty($url_imagem)){
			$query = "update cliente set nome = '{$nome}', nascimento = '{$nascimento}', endereco = '{$endereco}', numero = {$numero}, cep = '{$cep}', cidade = '{$cidade}', estado = '{$estado}', login = '{$login}', senha = '{$senha}' where codigo = {$codigo}";
		}else{
			$query = "update cliente set nome = '{$nome}', nascimento = '{$nascimento}', endereco = '{$endereco}', numero = {$numero}, cep = '{$cep}', cidade = '{$cidade}', estado = '{$estado}', login = '{$login}', senha = '{$senha}', imagem = '{$url_imagem}' where codigo = {$codigo}";
		}
	}
	
 	return mysqli_query($conexao, $query);
 
 }
 
 function buscaCliente($conexao, $codigo){
 	$cod = addslashes($codigo);
 	$query = "select * from cliente where codigo = {$cod}";
 	$resultado = mysqli_query($conexao, $query);
 	return mysqli_fetch_assoc($resultado);
 		
 	}

 function validarUsuario($conexao, $usuario){
	 
	 $login = addslashes($usuario['login']);
	 $password = addslashes($usuario['password']);
	 
	 $query = "select login from cliente where login = '{$login}' and senha = '{$password}'";
	 $resultado = mysqli_query($conexao, $query);
	 
	 if($resultado != ""){
	 	session_start();
		 $_SESSION['cliente'] = $login;
	 	mysqli_fetch_assoc($resultado);
	 	return true;
	 }else{
	 	echo mysqli_error($conexao);
	 	return false;
	 }
	 
	 
	 
 }