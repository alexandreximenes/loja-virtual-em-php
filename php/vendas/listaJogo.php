<?php include("cabecalho.php");
include("conecta.php");
include("banco-jogo.php");

//adicionaJogo($conexao, $_POST['nome'], $_POST['empresa'], $_POST['ano'], $_POST['modalidade'], $_POST['valor'], $_POST['detalhes']);
adicionaJogo($conexao, $_POST);

$jogos = listaJogo($conexao);
?>

	<body>
	<div id="formulario">
		<table class="table table-striped">
			<thead style="color:blue;">
				<th>CODIGO</th>
				<th>NOME</th>
				<th>EMPRESA</th>
				<th>ANO</th>
				<th>MODALIDADE</th>
				<th>VALOR</th>
				<th>DETALHES</th>
				<th>ACOES</th>
			</thead>
			<?php 
			foreach($jogos as $jogo) : ?>
			<tr>
				<td><?= $jogo['codigo'] ?></td>
				<td><?= $jogo['nome'] ?></td>
				<td><?= $jogo['empresa'] ?></td>
				<td><?= $jogo['ano'] ?></td>
				<td><?= $jogo['modalidade']?></td>
				<td><?= $jogo['valor'] ?></td>
				<td><?= $jogo['detalhes'] ?></td>
				<td>
					<a href="cadastrarJogo.php?codigo=<?= $jogo['codigo'] ?>" class="btn btn-danger">Editar</a>
				    <a href="apagarJogo.php?codigo=<?= $jogo['codigo'] ?>" class="btn btn-danger">Excluir</a>
				
				</td>
			</tr>
			<?php endforeach;?>
			
		</table>
		<br><br>
		<a href="cadastrarJogo.php">Cadastrar Jogo</a>
	</div>
	</body>
<?php include("rodape.php");?>