<?php include("cabecalho.php");
include("banco-jogo.php");

$carrinho = listaJogo($conexao);

shuffle($carrinho);

?>

	<body>
			<?php
			foreach($carrinho as $jogo) : 
				include 'produtos-carrinho.php';
			
			endforeach;?>
	</body>
<?php include("rodape.php");?>