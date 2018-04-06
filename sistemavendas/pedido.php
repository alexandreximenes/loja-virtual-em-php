<?php include("cabecalho.php");
include("banco-jogo.php");

verificaUsuario();

if(isset($_GET['codigo'])){ 
	$pedidos = buscaPedido($conexao, $_GET['codigo']);
	unset($_SESSION['jogos']);
	if(empty($pedidos)){
		$_SESSION ['danger'] = "Verifique com o Administrador do site! " . mysqli_error($conexao);
	}else{
		$_SESSION['pedido_email'] = array();
		$_SESSION['pedido_email'] = $pedidos;

	}?>
	
	<div class="container">
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title">Descricao do Pedido</h3>
	</div>
	<div class="panel-body">
	
	<br>
	
	<?php 
	$jogo = "";
	$valor = "";
	foreach ($pedidos as $pedido):
		$jogo = $pedido['cliente'];
		$valor= $pedido['valor_total'];	
	endforeach;
	?>
	
	
	<table class="table">
	
	<?php if (isset ( $_SESSION ['sucess'] )) {
			?>
			
						
							<div class="alert alert-info alert-dismissable fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Sucess! </strong> <?=$_SESSION ['sucess']?>
							</div>
							
							<div class="alert alert-success alert-dismissable fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Sucess! </strong> <?=$_SESSION ['email']?>
							</div>

		<?php
			unset ( $_SESSION ['sucess']);
			unset ( $_SESSION ['email']);
			
			
		}?>
		
		<table class="table">
			<tr>
				<td>Cliente <p style="font-size:30px;"><?=$jogo?></p></td> 
				<td>Total <p style="font-size:30px; font-weight:bold; postition:relative; right: 0;"><?=$valor?></p></td>
			</tr>
		</table>
		
		<table class="table table-striped">
			<thead>
				<th>ROTULO</th>
				<th>CODIGO</th>
				<th>NOME</th>
				<th>QUANTIDADE</th>
				<th>VALOR</th>
			</thead>
			
			<?php 
			$jogo = "";
			$valor = "";
			foreach ($pedidos as $pedido): ?>
			
			<tr>
			<td ><img style="width: 60px;" src="<?= $pedido['jogo_imagem']?>"/></td>
				<td><?= $pedido['jogo_codigo']?></td>
				<td><?= $pedido['jogo']?></td>
				<td><?= $pedido['quantidade']?></td>
				<td><?= $pedido['item_pedido_valor']?></td>
			</tr>
			
			
			<?php 
			endforeach;
			?>
				
		</table>

	</div>
	</div>
	</div>
</div>
	<table class="table table-striped">
	
	
<?php } 
		$_SESSION ['sucess'] = "Email enviado com sucesso";
		include_once 'enviaemail.php';
		//redirect2("index.php", 5000);
?>

	<?php include("rodape.php");?>