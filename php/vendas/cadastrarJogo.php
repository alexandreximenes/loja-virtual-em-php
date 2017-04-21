<?php include("cabecalho.php"); 
include("conecta.php");
include("banco-jogo.php");

$jogo = "";

if( isset($_POST['nome']) ){
	adicionaJogo($conexao, $_POST);
}

if( isset($_GET['codigo']) ){
	$jogo = buscaJogo($conexao, $_GET['codigo']);
}


?>


<body>
	<div id="formulario">
		<form action="listaJogo.php" method="POST">
			<table class="table table-striped">
				
				<tr>
					<td>Codigo</td>
					<td><input type="text" class="form-control" name="codigo"
						 placeholder="" value="<?=$jogo['codigo'] ?>" readonly="readonly" /> </td>
				
				</tr>
				<tr>
					<td>Nome</td>
					<td><input type="text" class="form-control" name="nome"
						 placeholder="Nome" value="<?=$jogo['nome'] ?>"></td>
				
				</tr>
				<tr>
					<td>Empresa</td>
					<td><input type="text" class="form-control" name="empresa"
						 maxlength="40" placeholder="Empresa" value="<?=$jogo['empresa'] ?>"></td>
				</tr>
				<tr>
					<td>Ano</td>
					<td><input type="date" class="form-control" name="ano"
						 maxlength="40" placeholder="Ano" value="<?=$jogo['ano'] ?>"></td>
				</tr>

				<tr>
					<td>Modalidade</td>
					<td><select name="modalidade" class="form-control" maxlength="40"
						 maxlength="40" placeholder="Opções">
							<option>Acao</option>
							<option>Guerra</option>
							<option>Comedia</option>
							<option>Documentario</option>
							<option>Terror</option>
					</select>
					</td>
				</tr>

				<tr>
					<td>Valor</td>
					<td><input type="number" class="form-control" name="valor"
						 maxlength="40" placeholder="Valor" value="<?=$jogo['valor'] ?>"></td>
				</tr>
				<tr>
					<td>Detalhes</td>
					<td><textarea class="form-control" name="detalhes"
							><?=$jogo['detalhes'] ?>
							</textarea>
					</td>
				</tr>
			</table>
			<input type="submit" class="btn btn-lg btn-primary" value="Salvar">
		</form>
		</br> </br> <a href="listaJogo.php" action="listaJogo.php">Listar
			Jogos</a>
	</div>
	<?php include("rodape.php") ?>