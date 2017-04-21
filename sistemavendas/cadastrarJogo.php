<?php
include ("cabecalho.php");
include ("conecta.php");
include ("banco-jogo.php");

	verificaUsuario ();
	
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
	
	$cliente = "";
	
	if (isset ( $_POST ['nome'] )) {
		adicionaJogo ( $conexao, $_POST );
	}
	
	if (isset ( $_GET ['codigo'] )) {
		$cliente = buscaJogo ( $conexao, $_GET ['codigo'] );
	}
	
	?>


<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Cadastro de Jogos</h3>
		</div>
		<div class="panel-body">

			<div id="formulario">
				<form action="listaJogo.php" method="POST"
					enctype="multipart/form-data">
					<table class="table">

						<tr>
							<td>Codigo</td>
							<td><input type="text" class="form-control" name="codigo"
								placeholder="" value="<?=$cliente['codigo'] ?>"
								readonly="readonly" /></td>

						</tr>
						<tr>
							<td>Nome</td>
							<td><input type="text" class="form-control" name="nome"
								placeholder="Nome" value="<?=$cliente['nome'] ?>"></td>

						</tr>
						<tr>
							<td>Empresa</td>
							<td><input type="text" class="form-control" name="empresa"
								maxlength="40" placeholder="Empresa"
								value="<?=$cliente['empresa'] ?>"></td>
						</tr>
						<tr>
							<td>Ano</td>
							<td><input type="text" class="form-control" name="ano"
								maxlength="40"
								placeholder="Ano - digite o ano com 4 digitos Ex: 2017"
								value="<?=$cliente['ano'] ?>" pattern="\d{4}"></td>
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
							</select></td>
						</tr>

						<tr>
							<td>Valor</td>
							<td><input type="number" class="form-control" name="valor"
								maxlength="40" placeholder="Valor"
								value="<?=$cliente['valor'] ?>"></td>
						</tr>
						<tr>
							<td>Detalhes</td>
							<td><textarea class="form-control" name="detalhes"><?=$cliente['detalhes'] ?>
							</textarea></td>
						</tr>
						<tr>
							<td>Imagem</td>
							<td><input type="file" class="form-control" name="imagem"
								placeholder="Carregue sua imagem" multiple></td>
						</tr>
					</table>
					<input type="submit" class="btn btn-lg btn-primary" value="Salvar">
				</form>
				</br> </br> <a href="listaJogo.php" action="listaJogo.php">Listar
					Jogos</a>
			</div>


		</div>
	</div>
</div>
<?php include("rodape.php") ?>