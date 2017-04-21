<?php require_once("cabecalho.php");
	require_once("conecta.php");
	require_once("carroDAO.php");
	
error_reporting ( E_ALL ^ E_NOTICE ^ E_WARNING);

$carro = "";

if(isset($_POST['placa']) && !empty($_POST['placa'])){
	cadastrarCarro($conexao, $_POST);
}


if(isset($_GET['codigo']) && isset($_GET['acao']) == 'editar'){
	$carro = buscarCarro($conexao, $_GET['codigo']);
}


?>

	<div class="container theme-showcase" role="main">
		<form action="cadastrocarro.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="codigo" class="col-sm-2 control-label">Codigo</label>
				<div class="col-sm-10">
					<input type="number" id="codigo" required name="codigo"
						value="<?=$carro["codigo"]?>" class="form-control"
					 readonly="readonly"/>
				</div>
			</div>
			<div class="form-group">
				<label for="placa" class="col-sm-2 control-label">Placa</label>
				<div class="col-sm-10">
					<input type="text" name="placa" required
						value="<?=$carro["placa"]?>" id="placa" class="form-control"
						placeholder="Digite a placa" />
				</div>
			</div>
			<div class="form-group">
				<label for="renavam" class="col-sm-2 control-label">Renavam</label>
				<div class="col-sm-10">
					<input type="number" name="renavam" value="<?=$carro["renavam"]?>"
						id="renavam" class="form-control" placeholder="Digite o renavam" />
				</div>
			</div>
			<div class="form-group">
				<label for="chassi" class="col-sm-2 control-label">Chassi</label>
				<div class="col-sm-10">
					<input type="text" name="chassi" value="<?=$carro["chassi"]?>"
						id="chassi" class="form-control" placeholder="Digite o Chassi" />
				</div>
			</div>
			<div class="form-group">
				<label for="marca" class="col-sm-2 control-label">Marca</label>
				<div class="col-sm-10">
					<input type="text" name="marca" value="<?=$carro["marca"]?>"
						id="marca" class="form-control" placeholder="Digite a Marca" />
				</div>
			</div>
			<div class="form-group">
				<label for="modelo" class="col-sm-2 control-label">modelo</label>
				<div class="col-sm-10">
					<input type="text" name="modelo" value="<?=$carro["modelo"]?>"
						id="modelo" class="form-control" placeholder="Digite o Modelo" />
				</div>
			</div>
			<div class="form-group">
				<label for="cor" class="col-sm-2 control-label">Cor</label>
				<div class="col-sm-10">
					<input type="text" name="cor" value="<?=$carro["cor"]?>" id="cor"
						class="form-control" placeholder="Digite a Cor" />
				</div>
			</div>
			<div class="form-group">
				<label for="anofabricacao" class="col-sm-2 control-label">Ano
					Fabricacao</label>
				<div class="col-sm-10">
					<input type="date" name="anofabricacao"
						value="<?=$carro["ano_fabricacao"]?>" id="anofabricacao"
						class="form-control" placeholder="Digite o Ano de Fabricacao" />
				</div>
			</div>
			<div class="form-group">
				<label for="anomodelo" class="col-sm-2 control-label">Ano Modelo</label>
				<div class="col-sm-10">
					<input type="date" name="anomodelo"
						value="<?=$carro["ano_modelo"]?>" id="anomodelo"
						class="form-control" placeholder="Digite o Ano do Modelo" />
				</div>
			</div>
			<div class="form-group">
				<label for="combustivel" class="col-sm-2 control-label">Tipo
					Combustivel</label>
				<div class="col-sm-10">
					<select name="combustivel" value="<?=$carro["tipo_combustivel"]?>"
						id="combustivel" class="form-control"
						placeholder="Digite o Tipo do Combustivel" />
					<option>Flex</option>
					<option>Gasolina</option>
					<option>Alcool</option>
					</select>

				</div>
			</div>
			<div class="form-group">
				<label for="quilometragem" class="col-sm-2 control-label">Quilometragem</label>
				<div class="col-sm-10">
					<input type="number" name="quilometragem" value="<?=$carro["quilometragem"]?>" id="km"
						class="form-control" placeholder="Digite a Kilometragem" />
				</div>
			</div>
			<div class="form-group">
				<label for="ipva" class="col-sm-2 control-label">Valor IPVA</label>
				<div class="col-sm-10">
					<input type="number" name="ipva" value="<?=$carro["valor_ipva"]?>"
						id="ipva" class="form-control"
						placeholder="Digite o valor do IPVA" />
				</div>
			</div>
			<div class="form-group">
				<label for="descricao" class="col-sm-2 control-label">Descricao</label>
				<div class="col-sm-10">
					<textarea name="descricao" id="descricao" class="form-control"
						placeholder="Digite a Descricao"><?=$carro["descricao"]?></textarea>
				</div>
			</div>




			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Salvar" class="btn btn-primary" />
				</div>
			</div>

			<!--: </br>
			Empresa: <input type="text" name="empresa"/></br>
			Ano: <input type="number" name="ano"/></br>
			Modalidade: 
			<select name="modalidade">
				<option>Acao</option>
				<option>Guerra</option>
			</select>			
			</br>
			Valor: <input type="email" name="valor" onkeyup="moeda(this);"/></br>
			Detalhes: <textarea name="detalhes"></textarea></br>
			!-->


		</form>

	</div>
	<!-- /container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="javascript/jquery.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="javascript/bootstrap.js"></script>
	<script src="javascript/docs.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="javascript/ie10-viewport-bug-workaround.js"></script>


	<div data-original-title="Copy to clipboard" title=""
		style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;"
		class="global-zeroclipboard-container"
		id="global-zeroclipboard-html-bridge">
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
			id="global-zeroclipboard-flash-bridge" height="100%" width="100%">
			<param name="movie"
				value="/assets/flash/ZeroClipboard.swf?noCache=1489443984959">
			<param name="allowScriptAccess" value="sameDomain">
			<param name="scale" value="exactfit">
			<param name="loop" value="false">
			<param name="menu" value="false">
			<param name="quality" value="best">
			<param name="bgcolor" value="#ffffff">
			<param name="wmode" value="transparent">
			<param name="flashvars"
				value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">
			<embed
				src="Theme%20Template%20for%20Bootstrap_files/ZeroClipboard.swf"
				loop="false" menu="false" quality="best" bgcolor="#ffffff"
				name="global-zeroclipboard-flash-bridge"
				allowscriptaccess="sameDomain" allowfullscreen="false"
				type="application/x-shockwave-flash" wmode="transparent"
				pluginspage="http://www.macromedia.com/go/getflashplayer"
				flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com"
				scale="exactfit" height="100%" width="100%">
		
		</object>
	</div>
	<svg
		style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"
		preserveAspectRatio="none" viewBox="0 0 1140 500" height="500"
		width="1140" xmlns="http://www.w3.org/2000/svg">
		<defs>
		<style type="text/css"></style></defs>
		<text
			style="font-weight:bold;font-size:57pt;font-family:Arial, Helvetica, Open Sans, sans-serif"
			y="57" x="0">Thirdslide</text></svg>
</body>
</html>