<?php include("cabecalho.php");
include("banco-jogo.php");

$jogos = listaJogo($conexao);

?>

	<body>
			<?php
			foreach($jogos as $jogo) : 
		
				include 'produtos-carrinho.php';
			
			endforeach;?>
	</body>
<?php include("rodape.php");?>