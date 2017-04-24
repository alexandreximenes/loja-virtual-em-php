<?php
include ("cabecalho.php");
include ("banco-cliente.php");

verificaUsuario ();

$jogo = "";
if (isset ( $_POST ['nome'] )) {
	adicionaCliente ( $conexao, $_POST );
}

if (count ( $_POST ) > 0) {
	if ($_POST ['editar']) {
		$jogo = buscaCliente ( $conexao, $_POST ['editar'] );
	}
}

// if(isset($_GET['codigo'])){
// $cliente = buscaCliente($conexao, $_GET['codigo']);
// }

if (isset ( $_SESSION ['danger'] )) {
	?>
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Danger! </strong> <?=$_SESSION ['danger']?>
		<strong>Deseja ir para a tela de login <a href="login.php"> Login </strong></a>
									</div>
	<?php
	unset ( $_SESSION ['danger'] ); die();
		
	} ?>
	
	<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Cadastro de Clientes</h3>
		</div>
		<div class="panel-body">

			<div>
				<form action="cadastroCliente.php" method="POST"
					enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>Codigo</td>
							<td><input class="form-control" value="<?=$jogo['codigo'] ?>"
								type="number" name="codigo" required="required" maxlength="40"
								placeholder="" readonly=readonly></td>
						</tr>
						<tr>
							<td>Nome</td>
							<td><input class="form-control" value="<?=$jogo['nome'] ?>"
								type="text" name="nome" required="required" maxlength="40"
								placeholder="Nome" autofocus="true"></td>
						</tr>
						<tr>
							<td>Data Nascimento</td>
							<td><input class="form-control"
								value="<?=$jogo['nascimento'] ?>" type="date"
								name="nascimento" required="required" maxlength="40"
								placeholder="Data de nascimento"></td>
						</tr>

						<tr>
							<td>Endreco</td>
							<td><input class="form-control"
								value="<?=$jogo['endereco'] ?>" type="text" name="endereco"
								required="required" maxlength="40" placeholder="Endereco"></td>
						</tr>

						<tr>
							<td>Numero</td>
							<td><input class="form-control" value="<?=$jogo['numero'] ?>"
								type="number" name="numero" required="required" maxlength="40"
								placeholder="numero"></td>
						</tr>
						<tr>
							<td>CEP</td>
							<td><input class="form-control" value="<?=$jogo['cep'] ?>"
								type="text" name="cep" required="required" maxlength="40"
								placeholder="cep"></td>
						</tr>
						<tr>
							<td>Cidade</td>
							<td><input class="form-control" value="<?=$jogo['cidade'] ?>"
								type="text" name="cidade" required="required" maxlength="40"
								placeholder="cidade"></td>
						</tr>
						<tr>
							<td>Estado</td>
							<td><select class="form-control" name="estado">
									<option value="">Selecione</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapa</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceara</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espirito Santo</option>
									<option value="GO">Goias</option>
									<option value="MA">Maranhao</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MT">Mato Grosso</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Para</option>
									<option value="PB">Paraiba</option>
									<option value="PR">Parana</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piaui</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondonia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">Sao Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
							</select></td>
						</tr>
						<tr>
							<td>Login</td>
							<td><input class="form-control" value="<?=$jogo['login'] ?>"
								type="text" name="login" required="required" maxlength="40"
								placeholder="username"></td>
						</tr>
						<tr>
							<td>Senha</td>
							<td><input class="form-control" value="<?=$jogo['senha'] ?>"
								type="password" name="senha" required="required" maxlength="40"
								placeholder="password"></td>
						</tr>
						<tr>
							<td>Foto</td>
							<td><input class="form-control" type="file" name="imagem"
								maxlength="40" placeholder="password"><img class="foto"
								src="<?=$jogo['imagem'] ?>"></td>
						</tr>
					</table>
					<input type="submit" value="Salvar" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
	


		
<?php include("rodape.php") ?>