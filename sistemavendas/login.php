<?php
include ("cabecalho.php");
include ("banco-cliente.php");


if(isset($_GET['logout'])){
	logout();
	$_SESSION ['deslogado'] = "Deslogado com sucesso!";
	unset($_SESSION ['success']);
}
$usuario = "";
if (usuarioEstaLogado()) {
	$_SESSION ['sucess'] = "Voce esta logado como ". $_SESSION ['usuario']['nome'];
} else {
	
	if (count ( $_POST ) > 0) {
		$usuario = buscaUsuario ( $conexao, $_POST );
		if ($usuario == null) {
			$_SESSION ['danger'] = "Usuario ou senha incorreto!";
		} else {
			logaUsuario ( $usuario);
			$_SESSION ['sucess'] = "Voce esta logado como ". $usuario['nome'];
// 			header("Location: index.php");
// 			die();
		}
	}
}
?>
<div class="container">
	<div class="panel panel-primary" style="margin: 10%">
		<div class="panel-heading">
			<h3 class="panel-title">Dados de acesso</h3>
		</div>
		<div class="panel-body">

			<div id="formulario">
				<form action="login.php" method="POST">
					<table class="table table-striped">
					
						<?php
						if (isset ( $_SESSION ['deslogado'] )) {
							?>
								<div class="alert alert-info alert-dismissable fade in">
									<strong>Info! </strong> <?=$_SESSION ['deslogado']?>
								</div>
							<?php
						}
						unset ( $_SESSION ['deslogado'] );
						
						if (isset ( $_SESSION ['danger'] )) {
							?>
								<div class="alert alert-danger alert-dismissable fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Danger! </strong> <?=$_SESSION ['danger']?>
								</div>
							<?php
							unset ( $_SESSION ['danger'] );
						}
						
						
						
						if (isset ( $_SESSION ['sucess'] )) {
							?>
							<div class="alert alert-success alert-dismissable fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Sucess! </strong> <?=$_SESSION ['sucess']?>
								Deseja se <a href="login.php?logout=<?=$_SESSION['usuario']['nome']?>"><strong>deslogar ?</strong>"</a>
							
							</div>
						<?php
						unset ( $_SESSION ['sucess'] );
						}
						
						
						?>

						<h2>Usuario e senha</h2>
						<tr>
							<td>Login</td>
							<td><input type="text" class="form-control" name="login"
								placeholder="Informe seu Usuario" /></td>

						</tr>
						<tr>
							<td>Senha</td>
							<td><input type="password" class="form-control" name="senha"
								placeholder="Informe seu password"></td>

						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-lg btn-primary"
								value="Entrar"></td>

						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("rodape.php");?>

