<?php

class Produto{
	public $id;
	public $nome;
	private $preco;
	public $descricao;
	public $categorias;
	public $usado;
	
	function __construct(){}
	
	function __construct($id, $nome, $preco, $descricao, $categorias, $usado){
		$this->$id = $id;
		$this->$nome = $nome;
		$this-> $preco = $preco;
		$this->$descricao = $descricao;
		$this->$categorias = $categorias;
		$this->$usado = $usado;
	}
	
	function precoComDesconto($valor = 0.1){
		if($valor > 0 && $valor < 0.5){
			$this->preco -= $this->preco * $valor; 
			return $this->preco;
		}
	}
	
	function setPreco($preco){
		$this->preco = $preco;
	}
	function getPreco(){
		return $this->preco;
	}
	
		
	
}