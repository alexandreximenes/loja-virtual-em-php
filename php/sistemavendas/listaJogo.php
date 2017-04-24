<?php include("cabecalho.php");
include("banco-jogo.php");

verificaUsuario();

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

if(count($_POST)>0){
	adicionaJogo($conexao, $_POST);
}

$carrinho = listaJogo($conexao);
?>

<div class="container">
	<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Lista de Jogos</h3>
            </div>
            <div class="panel-body">

<br>
              <div class="input-group"> 
	              <input class="form-control" placeholder="Search for..."> <span class="input-group-btn"> <button class="btn btn-default" type="button">Filtrar</button> </span>
	          </div>

<br>
	<div id="formulario">
		<table class="table table-striped">
			<thead style="font-weight: bold;">
				<th>CODIGO</th>
				<th>IMAGEM</th>
				<th>NOME</th>
				<th>EMPRESA</th>
				<th>ANO</th>
				<th>MODALIDADE</th>
				<th>VALOR</th>
				<th>DETALHES</th>
				<th>ACOES</th>
			</thead>
			<?php 
			foreach($carrinho as $jogo) : ?>
			<tr>
				<td><?= $jogo['codigo'] ?></td>
				<td><img style="width: 35px; padding:0; margin:0;" src="<?=$jogo['imagem'] ?>"></td>
				<td><?= $jogo['nome'] ?></td>
				<td><?= $jogo['empresa'] ?></td>
				<td><?= $jogo['ano'] ?></td>
				<td><?= $jogo['modalidade']?></td>
				<td><?= $jogo['valor'] ?></td>
				<td><?= substr($jogo['detalhes'],0,25)?>...</td>
				<td>
				<a href="cadastrarJogo.php?codigo=<?= $jogo['codigo'] ?>"><figure><img class="icon" src="img/icon/editar.jpg"></figure></a>
				    <a href="apagarJogo.php?codigo=<?= $jogo['codigo'] ?>"><figure><img class="icon" src="img/icon/remover	.jpg"></figure></a>
				
				</td>
			</tr>
			<?php endforeach;?>
			
		</table>

	</div>
	</div>
	</div>
</div>
	
<?php include("rodape.php");?>