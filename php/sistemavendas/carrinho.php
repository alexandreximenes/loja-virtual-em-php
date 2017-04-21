<?php include("cabecalho.php");
include("banco-jogo.php");

verificaUsuario();

$jogo = "";
$tela = "";
$jogos = array();

if(isset($_GET['codigo']) && $_GET['remover'] == ''){
	
	$jogos = $_SESSION['jogos'];
	
	//unset($_SESSION['jogos']);
	
	$jogo = buscaJogoParaSessao($conexao, $_GET['codigo']);

	array_push($jogos, $jogo);
	
	$_SESSION['jogos'] = $jogos;
	
	if(isset($_SESSION['tela'])){
		$tela = $_SESSION['tela'];
	}
}

if(isset($_GET['codigo']) && $_GET['acao'] == "remover"){
	
	$remover = $_GET['codigo'];
	
	echo "<br> remover". $remover;
	
	$produtosNaSessao = array();
	
	echo "<br> produtosNaSessao". print_r($produtosNaSessao);
	
	$produtosNaSessao = $_SESSION['jogos'];
	
	//unset($_SESSION['jogos']);
	
	$_SESSION['jogos'] = array();
	
	$carrinho = array();
	
	foreach($produtosNaSessao as $item){
		echo "<br> item nome". $item['nome'];
		if($item['codigo'] != $remover){
			echo "<br> item['codigo'] = ". $item['codigo'] . " != " . $remover;
			$carrinho = $tem;
		}	
	}

	$_SESSION['jogos'] = $carrinho;
} 

if (isset ( $_SESSION ['danger'] )) {
	?>
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Danger! </strong> <?=$_SESSION ['danger']?>
		<strong>Deseja ir para a tela de login <a href="login.php"> Login </strong></a>
									</div>
	<?php
	unset ( $_SESSION ['danger'] ); die();
		
	} 
	
	


?>
	<body>
	<div id="formulario">
		<a href="telaCarrinho.php" class="btn btn-success">Continuar comprando</a>
		<a href="carrinho.php" class="btn btn-success">Finalizar Pedido</a>
		<table class="table table-striped">
			<thead style="color:blue;">
				<th>CODIGO</th>
				<th>NOME</th>
				<th>VALOR</th>
				<th>QUANTIDADE</th>
				<th>ACÃO</th>
			</thead>
			<?php 
			if(isset($_SESSION['jogos'])){
				$jogos = $_SESSION['jogos'];
			}
			foreach($jogos as $item): ?>o
			<tr>
				<td><?= $item['codigo'] ?></td>
				<td><?= $item['nome'] ?></td>
				<td><?= $item['valor'] ?></td>
				<td>1</td>
				<td>
				    <a href="carrinho.php?acao=remover&codigo=<?=$item['codigo']?>" class="btn btn-danger">Excluir</a>
				</td>
			</tr>
			<?php endforeach; ?>
			
		</table>
		
	</div>
	</body>
<?php include("rodape.php");?>