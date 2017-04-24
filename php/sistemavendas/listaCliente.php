<?php
include ("cabecalho.php");
include ("banco-cliente.php");

verificaUsuario ();

if (isset ( $_SESSION ['danger'] )) {
	?>
<div class="alert alert-danger alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Danger! </strong> <?=$_SESSION ['danger']?>
		<strong>Deseja ir para a tela de login <a href="login.php"> Login </strong></a>
</div>
<?php
	unset ( $_SESSION ['danger'] );
	die ();
}

if (count ( $_POST == 0 )) {
	$clientes = listaCliente ( $conexao );
}

if (isset ( $_POST ['remover'] )) {
	$jogo = apagaCliente ( $conexao, $_POST ['remover'] );
} else {
	echo mysqli_error ( $conexao );
}
?>

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Lista de Clientes</h3>
		</div>
		<div class="panel-body">

			<br>
			<div class="input-group">
				<input class="form-control" placeholder="Search for..."> <span
					class="input-group-btn">
					<button class="btn btn-default" type="button">Filtrar</button>
				</span>
			</div>

			<br>


			<div id="formulario">
				<table class="table table-striped">
					<thead style="font-weight: bold;">
						<th>CODIGO</th>
						<th>NOME</th>
						<th>NASCIMENTO</th>
						<th>ENDERECO</th>
						<th>LOGIN</th>
						<th>SENHA</th>
						<th>ACOES</th>
					</thead>
			<?php
			foreach ( $clientes as $jogo ) :
				?>
			<tr>
						<td><?= $jogo['codigo'] ?></td>
						<td><?= $jogo['nome'] ?></td>
						<td><?= date('d-m-Y', strtotime($jogo['nascimento']))?></td>
						<td><?= $jogo['endereco'] .", ". $jogo ['numero'] ." - ". $jogo ['cidade'].", ". $jogo ['estado'] ." - ". $jogo ['cep']?></td>
						<td><?= $jogo['login'] ?></td>
						<td><?php for($i=0; $i < strlen($jogo['senha']); $i++){echo "*";} ?></td>
						<td width="80">
							<form action="cadastroCliente.php" method="POST">
								<input type="hidden" name="editar"
									value="<?= $jogo['codigo']?>"> <input class="icon"
									type="image" src="img/icon/editar.jpg">
							</form>
							<form action="listaCliente.php" method="POST">
								<input type="hidden" name="remover"
									value="<?= $jogo['codigo']?>"> <input class="icon"
									type="image" src="img/icon/remover.jpg">

							</form>


						</td>
					</tr>
			<?php endforeach;?>
			
		</table>
			</div>
		</div>
	</div>

<?php include("rodape.php");?>
          </div>
<?php require_once("rodape.php");?>