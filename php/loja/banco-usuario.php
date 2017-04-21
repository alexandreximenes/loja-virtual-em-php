<?php require_once("conecta.php");
function buscaUsuario($conexao, $email, $senha) {
    $senhaMd5 = addslashes(md5($senha));
    $memail = addslashes($email);
    $query = "select * from usuarios where email='{$memail}' and senha='{$senhaMd5}'";
	echo $query;
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
