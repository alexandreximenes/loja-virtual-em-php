<?php

session_start();

function cadastrarJogo($jogo){

	if(!isset($_SESSION['jogos'])){
		$_SESSION['jogos'] = array();
	}
	array_push($_SESSION['jogos'], $jogo);
	
	print_r($_SESSION['jogos']);
	
	return "Jogo cadastrado com sucesso!";
	

}

?>