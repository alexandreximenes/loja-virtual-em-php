<?php
function buscaUsuario($conexao, $post) {
	$usuario = "";
	$senha = "";
	if (isset ( $post ['login'] ) && isset ( $post ['senha'] )) {
		$usuario = addslashes ( $post ['login'] );
		$senha = addslashes ( $post ['senha'] );
		
		$query = "select nome, login from cliente where login = '{$usuario}' and senha = '{$senha}'";
		
		$resultado = mysqli_query ( $conexao, $query );
		$usuario = mysqli_fetch_assoc ( $resultado );
		return $usuario;
	}
}

function logaUsuario($usuario) {
	if (session_status () == 1) {
		session_start (); // session_start() == 2
	}
	$_SESSION ['usuario'] = array ();
	$_SESSION ['usuario'] = $usuario;

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
	return $_SESSION ["usuario"];
}
function logout() {
	session_destroy ();
	session_start();
}

?>