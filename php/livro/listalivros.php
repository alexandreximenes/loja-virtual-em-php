<?php require_once 'cabecalho.php';
require_once 'funcoes_prova2.php';

if(isset($_GET['codigo']) && !empty($_GET['codigo'])){
	deletarLivro($conexao, $_GET['codigo']);
	//header("Location: listalivros.php");
}

?>

    <div class="container theme-showcase" role="main">

		<table class="table" width="100%">
			<trhead>
				<td>CODIGO</td>
				<td>NOME</td>
				<td>EDITORA</td>
				<td>ISBN</td>
				<td>EDICAO N</td>
				<td>ANO</td>
				<td>AUTOR</td>
				<td>AVALIACAO</td>
				<td>NOTA</td>
				<td>DESCRICAO</td>
				<td>ACAO</td>
			</trhead>
			<?php 
			$livros = buscarLivros($conexao);
			foreach ($livros as $livro) : ?>
			<tr>
				<td><?=$livro['id']?></td>
				<td><?=$livro['nome']?></td>
				<td><?=$livro['editora']?></td>
				<td><?=$livro['isbn']?></td>
				<td><?=$livro['numero_edicao']?></td>
				<td><?=$livro['ano_edicao']?></td>
				<td><?=$livro['autor']?></td>
				<td><?=$livro['avaliacao']?></td>
				<td><?=nota($livro['avaliacao'])?>
				</td>
				<td><?=substr($livro['descricao'], 0,25)?>...</td>
				<td>
				<a class="btn btn-xs btn-danger" href="listalivros.php?codigo=<?=$livro['id']?>">Remover</a>
				<a class="btn btn-xs btn-danger" href="cadastrolivro.php?acao=editar&codigo=<?=$livro['id']?>">Editar</a>
				</td>
			</tr>
			<?php 
			endforeach;
			?>
		</table>
		</div> <?php require_once 'rodape.php';?>
		<script src="js/script.js"></script>