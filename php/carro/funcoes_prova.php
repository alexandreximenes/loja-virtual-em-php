<?php

session_start();


function cadastrarcarro($carro) {
	
	//verifica se a variável foi inicializada
	if (!isset($_SESSION['array'])) {
		$_SESSION['array'] = array();
	}
	
	$achou = false;
	foreach ($_SESSION['array'] as $indice => $carro_sessao) {
		if ($carro_sessao["codigo"] == $carro["codigo"]) {
			$_SESSION['array'][$indice] = $carro;
			$achou = true;
		}
	}
	
	if (!$achou) {
		array_push($_SESSION['array'],$carro);
	}
		
	//print_r($_SESSION['array']);
	return "carro cadastrado com sucesso!!";
}

function buscarcarro($codigo) {
	foreach ($_SESSION['array'] as $indice => $carro) {
		if ($carro["codigo"] == $codigo) {
			return $carro;
		}
	}
}

















/*session_start();

if (!isset($_SESSION['array'])) {
	$_SESSION['array'] = array();
	$_SESSION['indice'] = 1;
} 

function cadastrarcarro($value) {
	$_SESSION['array'][$_SESSION['indice']] = $value;
	$_SESSION['indice']++;
 	 	
 	 print_r($_SESSION['array']);
}*/

?>