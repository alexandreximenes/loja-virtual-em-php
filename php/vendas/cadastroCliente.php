<?php include("cabecalho.php")?>
<body>
		<div>
			<form>
				<table class="table">
					<tr>
						<td>Codigo</td>
						<td><input class="form-control" type="number" name="codigo" required="required" maxlength="40" placeholder="Codigo" ></td>
					</tr>
					<tr>
						<td>Nome</td>
						<td><input class="form-control" type="text" name="nome" required="required" maxlength="40" placeholder="Nome" autofocus="true"></td>
					</tr>
					<tr>
						<td>Data Nascimento</td>
						<td><input class="form-control" type="date" name="data-nascimento" required="required" maxlength="40" placeholder="Data de nascimento"></td>
					</tr>
					
					<tr>
						<td>Endreco</td>
						<td><input class="form-control" type="text" name="endereco" required="required" maxlength="40" placeholder="Endereco"></td>
					</tr>
					
					<tr>
						<td>Numero</td>
						<td><input class="form-control" type="number" name="numero" required="required" maxlength="40" placeholder="numero"></td>
					</tr>
					<tr>
						<td>CEP</td>
						<td><input class="form-control" type="text" name="cep" required="required" maxlength="40" placeholder="cep"></td>
					</tr>
					<tr>
						<td>Cidade</td>
						<td><input class="form-control" type="text" name="cidade" required="required" maxlength="40" placeholder="cidade"></td>
					</tr>
					<tr>
						<td>Estado</td>
						<td>
							<select class="form-control" >
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
							</select>
						</td>
					</tr>
					<tr>
						<td>Login</td>
						<td><input class="form-control" type="text" name="login" required="required" maxlength="40" placeholder="username"></td>
					</tr>
					<tr>
						<td>Senha</td>
						<td><input class="form-control" type="password" name="senha" required="required" maxlength="40" placeholder="password"></td>
					</tr>
					<tr>
						<td>Foto</td>
						<td><input class="form-control" type="file" name="foto" required="required" maxlength="40" placeholder="password"></td>
					</tr>
				</table>
					<input type="submit" value="Salvar" class="btn btn-primary">
			</form>
			</br></br>
		<a href="listaCliente.php" action="cadastroCliente.php">Listar Cliente</a>
		</div>
		
<?php include("rodape.php") ?>