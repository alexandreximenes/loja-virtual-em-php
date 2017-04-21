<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
  if(!usuarioEstaLogado()) {
  	$_SESSION['danger'] = "Voce nao tem acesso a esta funcionalidade!";
     header("Location: index.php");
     die();
  }
}

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
    $_SESSION["usuario_logado"] = $email;
}

function logout() {
    session_destroy();
    session_start();
}
