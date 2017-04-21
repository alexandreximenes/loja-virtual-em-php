<?php

 function cadastrarCarro($conexao, $carro){
 	$codigo = addslashes($carro['codigo']);
 	$placa = addslashes($carro['placa']);
 	$renavam = addslashes($carro['renavam']);
 	$chassi = addslashes($carro['chassi']);
 	$marca = addslashes($carro['marca']);
 	$modelo = addslashes($carro['modelo']);
 	$cor = addslashes($carro['cor']);
 	$anofabricacao = date('Y-m-d', strtotime(addslashes($carro['anofabricacao'])));
 	$anomodelo = date('Y-m-d', strtotime(addslashes($carro['anomodelo'])));
 	$combustivel = addslashes($carro['combustivel']);
 	$quilometragem = addslashes($carro['quilometragem']);
 	$ipva = addslashes($carro['ipva']);
 	$descricao = addslashes($carro['descricao']);
 	
 	if($carro['codigo'] == ""){
 		$query = "insert into carro (placa, renavam, chassi, marca, modelo, cor, ano_fabricacao, ano_modelo, tipo_combustivel, quilometragem, valor_ipva, descricao) values"
 			  . "('{$placa}', '{$renavam}', '{$chassi}', '{$marca}', '{$modelo}', '{$cor}', '{$anofabricacao}', '{$anomodelo}', '{$combustivel}', {$quilometragem}, {$ipva}, '{$descricao}')";
 	}else{
 		echo "entrou no update";
 		$query = "update carro set placa = '{$placa}', renavam = '{$renavam}', chassi = '{$chassi}', marca = '{$marca}', modelo = '{$modelo}', cor = '{$cor}', ano_fabricacao = '{$anofabricacao}', ano_modelo = '{$anomodelo}', tipo_combustivel = '{$combustivel}', quilometragem = {$quilometragem}, valor_ipva = {$ipva}, descricao = '{$descricao}' where codigo = {$codigo}";
 	}
 	return mysqli_query($conexao, $query);
 	
 }
 function buscarCarro($conexao, $codigo){
 	$query = "select * from carro where codigo = {$codigo}";
 	$result = mysqli_query($conexao, $query);
 	return mysqli_fetch_assoc($result);
 		
 	}
 	
 	
 
 function buscarCarros($conexao){
 	$carros = array();
 	$query = "select * from carro";
 	$result = mysqli_query($conexao, $query);
 	while($carro = mysqli_fetch_assoc($result)){
 		array_push($carros, $carro);
 	}
 	
 	return $carros;
 }
 
 function deletarCarro($conexao, $codigo){
 	$query = "delete from carro where codigo = {$codigo}";
 	return mysqli_query($conexao, $query);
 }