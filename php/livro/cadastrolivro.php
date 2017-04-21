<?php require_once("cabecalho.php");
	require_once("funcoes_prova2.php");
	
// $livro = array("codigo" => "", "nome" => "", "editora" => "", "isbn" => "",
// 		"numero_edicao" => "", "ano_edicao" => "", "autor" => "", 
// 		"definicao_avaliacao" => "", "avaliacao" => "", "descricao" => "",
// );

if(isset($_POST['nome']) && !empty($_POST['nome'])){
	cadastrarLivro($conexao, $_POST);
}

if(isset($_GET['codigo']) && isset($_GET['acao']) == 'editar'){
	$livro = editarLivro($conexao, $_GET);
}
if(isset($_GET['codigo']) && isset($_GET['acao']) == ''){
	$livro = buscarLivros($conexao);
}

?>
	
	<div class="container theme-showcase" role="main">
		<form action="cadastrolivro.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="codigo" class="col-sm-2 control-label">Codigo do Livro</label>
				<div class="col-sm-10">
					<input type="number" id="codigo" name="codigo"
						value="<?=$livro["id"]?>" class="form-control"
					 readonly="readonly"/>
				</div>
			</div>
			<div class="form-group">
				<label for="livro" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-10">
					<input type="text" name="nome" required value="<?=$livro["nome"]?>" id="nome" class="form-control"
						placeholder="Digite o nome do livro" tabindex="1" autofocus="autofocus" accesskey="n"/>
				</div>
			</div>
			<div class="form-group">
				<label for="editora" class="col-sm-2 control-label">Editora</label>
				<div class="col-sm-10">
					<input type="text" name="editora" value="<?=$livro["editora"]?>" id="editora" class="form-control" 
					placeholder="Digite o nome da editora" tabindex="2"/>
				</div>
			</div>
			<div class="form-group">
				<label for="isbn" class="col-sm-2 control-label">I.S.B.N</label>
				<div class="col-sm-10">
					<input type="text" name="isbn" value="<?=$livro["isbn"]?>"
						id="isbn" class="form-control" placeholder="Digite o codigo I.S.B.N do livro" tabindex="3"/>
				</div>
			</div>
			<div class="form-group">
				<label for="numero_edicao" class="col-sm-2 control-label">Numero Edicao</label>
				<div class="col-sm-10">
					<input type="number" name="numero_edicao" value="<?=$livro["numero_edicao"]?>"
						id="numero_edicao" class="form-control" placeholder="Digite o numero da edicao" 
						tabindex="4" pattern="\d+"/>
				</div>
			</div>
			<div class="form-group">
				<label for="ano_edicao" class="col-sm-2 control-label">Ano Edicao</label>
				<div class="col-sm-10">
					<input type="text" name="ano_edicao" value="<?=$livro["ano_edicao"]?>"
						id="ano_edicao" class="form-control" placeholder="Digite o ano com 4 digitos ex: 2017" 
						tabindex="5" pattern="\d{4}" accesskey="a"/>
				</div>
			</div>
			<div class="form-group">
				<label for="autor" class="col-sm-2 control-label">Autor</label>
				<div class="col-sm-10">
					<input type="text" name="autor" value="<?=$livro["autor"]?>" id="autor"
						class="form-control" placeholder="Digite o autor do livro" tabindex="6"/>
				</div>
			</div>
			<div class="form-group">
				<label for="avaliacao" class="col-sm-2 control-label" >Avaliacao</label>
				<div class="col-sm-10">
					<select name="avaliacao" id="avaliacao" class="form-control" tabindex="7" onchange="avaliacao(this.value)">
					<?php $avaliacao = "";?>
						<option value="1" <?=$avaliacao = $livro["avaliacao"] == '1 estrela' ? "selected='selected'" : "" ?>>1 Estrela</option>
						<option value="2" <?=$avaliacao = $livro["avaliacao"] == '2 estrela' ? "selected='selected'" : "" ?>>2 Estrela</option>
						<option value="3" <?=$avaliacao = $livro["avaliacao"] == '3 estrela' ? "selected='selected'" : "" ?>>3 Estrela</option>
						<option value="4" <?=$avaliacao = $livro["avaliacao"] == '4 estrela' ? "selected='selected'" : "" ?>>4 Estrela</option>
						<option value="5" <?=$avaliacao = $livro["avaliacao"] == '5 estrela' ? "selected='selected'" : "" ?>>5 Estrela</option>
					</select>
						
				</div>
			</div>
			<!--<div class="form-group">
				<label for="definicao_avaliacao" class="col-sm-2 control-label">Definicao da Avaliacao</label>
				<div class="col-sm-10">
					<input type="text" id="definicao_avaliacao" class="form-control" name="definicao_avaliacao" 
					value="" readonly="readonly">
						
				</div>-->
			</div>
			<div class="form-group">
				<label for="descricao" class="col-sm-2 control-label">Descricao</label>
				<div class="col-sm-10">
					<textarea name="descricao" id="descricao" tabindex="8" class="form-control"
						placeholder="Digite a Descricao"><?=$livro["descricao"]?></textarea>
				</div>
			</div>




			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Salvar" class="btn btn-primary" tabindex="8" accesskey="s"/>
				</div>
			</div>

		</form>

	</div>
	<script src="js/script.js"></script>
	<?php require_once 'rodape.php';?>