<?php include("cabecalho.php");
include("conecta.php");
include("banco-jogo.php");

$jogos = listaJogo($conexao);
?>

	<body>
			<?php
			foreach($jogos as $jogo) : ?>
			<div style="float:left; width:33%; margin: 0 auto;">
				<img src="img/nao-disponivel.jpg" style="width:40%; height:40%"/>
				</br>
				<?= $jogo['nome'] ?> 
				-
				<?= $jogo['valor'] ?> 
				<a href="carrinho.php?codigo=<?= $jogo['codigo'] ?>" class="btn btn-xs btn-danger">Comprar</a>
			</div>
			<?php endforeach;?>
	</body>
<?php include("rodape.php");?>