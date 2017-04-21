<?php include("cabecalho.php");
include("conecta.php");
include("banco-jogo.php");

$item_carrinho = "";
if(isset($_GET['codigo'])){
	adicionaNaSessao($_GET);
}

if(isset($_GET['codigo']) && $_GET['acao'] == "remover"){
	$remover = $_GET['codigo'];
	$itens_sessao = $_SESSION['carrinho'];
	$carrinho = "";
	foreach($itens_sessao as $item):
		if($item['codigo'] != $remover):
			$carrinho = $item;
		endif;
	endforeach;
	$_SESSION['carrinho'] = $carrinho;
}



?>
	<body>
	<div id="formulario">
		<a href="carrinho.php" class="btn btn-success">Continuar comprando</a>
		<a href="carrinho.php" class="btn btn-success">Finalizar Pedido</a>
		<table class="table table-striped">
			<thead style="color:blue;">
				<th>NOME</th>
				<th>VALOR</th>
				<th>QUANTIDADE</th>
				<th>ACÃO</th>
			</thead>
			<?php 
			foreach($_SESSION['carrinho'] as $item): ?>
			<tr>
				<td><?= $item['nome'] ?></td>
				<td><?= $item['valor'] ?></td>
				<td><?= $item['quantidade'] ?></td>
				<td>
				    <a href="carrinho.php?acao=remover&codigo=<?= $jogo['codigo'] ?>" class="btn btn-danger">Excluir</a>
				
				</td>
			</tr>
			<?php endforeach; 
			
			foreach($jogos as $jogo) : ?>
			<tr>
				<td><?= $jogo['nome'] ?></td>
				<td><?= $jogo['valor'] ?></td>
				<td>1</td>
				<td>
				    <a href="apagarJogo.php?codigo=<?= $jogo['codigo'] ?>" class="btn btn-danger">Excluir</a>
				
				</td>
			</tr>
			<?php endforeach;?>
			
		</table>
		
	</div>
	</body>
<?php include("rodape.php");?>