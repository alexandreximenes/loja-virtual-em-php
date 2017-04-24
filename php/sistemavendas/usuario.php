<?php include 'conecta.php';
function buscaUsuario($conexao, $post) {
	$usuario = "";
	$senha = "";
	if (isset ( $post ['login'] ) && isset ( $post ['senha'] )) {
		$usuario = addslashes ( $post ['login'] );
		$senha = addslashes ( $post ['senha'] );
		
		$query = "select * from cliente where login = '{$usuario}' and senha = '{$senha}'";
		
		$resultado = mysqli_query ( $conexao, $query );
		$usuario = mysqli_fetch_assoc ( $resultado );
		return $usuario;
	}
}

function buscaUsuario2($conexao, $codigo){
	$cod = addslashes($codigo);
	$query = "select codigo, nome, login, imagem from cliente where codigo = {$cod}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
	
}

function inserirPedido($conexao, $usuario, $valor){
	$user = addslashes($usuario);
	$valor = addslashes($valor);
	
	$query = "insert into pedido (cliente_codigo, valor) values ({$user}, {$valor})";
	//return "o";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_insert_id($conexao);
}

function insereItemPedido($conexao, $jogos, $ultimoRegistro){
	$jogos_pedido = array();
	$jogos_pedido = $jogos;
	$ultimoRegistro= addslashes($ultimoRegistro);
	
	foreach ($jogos as $itens){
		$query = "insert into item_pedido(jogo_codigo, quantidade, valor, pedido_codigo)
		values ({$itens['codigo']}, 1, {$itens['valor']}, {$ultimoRegistro})";
		mysqli_query($conexao, $query);
	}
	;
	redirect("pedido.php?codigo=".$ultimoRegistro);
}

function buscaPedido($conexao, $codigo){
	$cod = addslashes($codigo);
	
	$busca = array();
	
	$query = "select c.codigo as cliente_codigo, 
	c.nome as cliente, 
	c.login,
	p.codigo as pedido_codigo,
	p.valor as valor_total, 
	j.codigo as jogo_codigo, 
	j.nome as jogo, 
	j.imagem as jogo_imagem, 
	i.codigo as item_codigo, 
	i.quantidade, 
	i.valor as item_pedido_valor 
	from item_pedido i 
	join pedido p on i.pedido_codigo = p.codigo 
	join cliente c on c.codigo = p.cliente_codigo 
	join jogo j on j.codigo = i.jogo_codigo 
	where p.codigo = {$cod};";
	
	$resultado = mysqli_query($conexao, $query);
	
	while($pedido = mysqli_fetch_assoc($resultado)){
		array_push($busca, $pedido);
	}
	
	return $busca;
}


function logaUsuario($usuario) {
	if (session_status () == 1) {
		session_start (); // session_start() == 2
	}
	$_SESSION ['usuario'] = array ();
	$_SESSION ['usuario'] = $usuario;
	redirect('index.php');

}
function redirect($pagina){
	echo "<script>
			setTimeout(function(){location.href = 'http://localhost/sistemavendas/$pagina';}, 1000);
		</script>";
}
function redirect2($pagina, $segundos){
	echo "<script>
	setTimeout(function(){location.href = 'http://localhost/sistemavendas/$pagina';}, $segundos);
	</script>";
}
function usuarioEstaLogado() {
	return isset ( $_SESSION ['usuario'] );
}
function verificaUsuario() {
	if (!usuarioEstaLogado ()) {
		if (session_status () == 1) {
			session_start (); // session_start() == 2
		}
		$_SESSION ['danger'] = "Voce precisa estar logado para acessar essa funcionalidade!";
	// 		sleep(2);
	// 		echo "<script> window.location='index.php';</script>";
	}
}
function usuarioLogado() {
	return $_SESSION["usuario"];
}
function logout() {
	session_destroy ();
	session_start();
}

?>