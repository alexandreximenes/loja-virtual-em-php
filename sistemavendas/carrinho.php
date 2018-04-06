<?php include("cabecalho.php");
include("banco-jogo.php");

verificaUsuario();

$jogo = "";
$tela = "";

if(isset($_GET['codigo']) && $_GET['remover'] == ''){
	
	if(isset($_SESSION['jogos'])){
	}else{
		$_SESSION['jogos'] = array();
	}
	
	$jogos = $_SESSION['jogos'];
	
	//unset($_SESSION['jogos']);
	
	$jogo = buscaJogoParaSessao($conexao, $_GET['codigo']);

	array_push($jogos, $jogo);
	
	$_SESSION['jogos'] = $jogos;
	
// 	if(isset($_SESSION['tela'])){
// 		$tela = $_SESSION['tela'];
// 	}
}

if(isset($_GET['codigo']) && $_GET['acao'] == "remover"){
	
	$carrinho = array();
	
	$codigo = $_GET['codigo'];
	
	if(isset($_SESSION['jogos'])){
		
		foreach($_SESSION['jogos'] as $item){
			if($codigo != $item['codigo']){
				array_push($carrinho, $item);
			}
		}
	}
	
	$_SESSION['jogos'] = $carrinho;
} 

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
	
?>
	<body>
	
	<div class="container">
	<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Carrinho de compras</h3>
            </div>
            <div class="panel-body">

<br>

<table class="table table-striped">
	<?php 
	$total = "";
	?>
	
	<div id="formulario">
		<a href="telaCarrinho.php" class="btn btn-success">Continuar comprando</a>
		<table class="table table-striped">
			<thead>
				<th>CODIGO</th>
				<th>NOME</th>
				<th>QUANTIDADE</th>
				<th>ACÃO</th>
				<th>VALOR</th>
			</thead>
			
			<?php 
			if(isset($_SESSION['jogos'])){
				$jogos = $_SESSION['jogos'];
			}
			
			$numeroDeCompras = "";
			foreach($jogos as $item): ?>
			<tr>
				<td><?= $item['codigo'] ?></td>
				<td><?= $item['nome'] ?></td>
				<?php $total += $item['valor'];
				$numeroDeCompras++;
				?>
				<td>1</td>
				<td>
				    <a href="carrinho.php?acao=remover&codigo=<?=$item['codigo']?>"><figure><img class="icon" src="img/icon/remover.jpg"></figure></a>
				</td>
				<td><?= $item['valor'] ?></td>
			</tr>
			<?php endforeach; 
			
			if(!isset($_SESSION['pedido'])){
				$_SESSION['pedido'] = array();
				$_SESSION['pedido'] = $jogos;
				
			}
			?>
			
			<tr>
				<td><span style="font-size:20px; font-weight: bold;">Qtde: <?=$numeroDeCompras;?></span></td>
				<td></td>
				<td></td>
				<td></td>
				<td><span style="font-size:20px; font-weight: bold;"><?=number_format($total, 2)?></span></td>

			</tr>
			
		</table>
		
		<?php 
			
			if(isset($_GET['usuario']) && isset($_GET['total'])){
				$ultimoRegistro = inserirPedido($conexao, $_GET['usuario'], $_GET['total']);
				
				if(empty($ultimoRegistro)){
					$_SESSION ['danger'] = "Pedido nao foi inserido!" . mysqli_error($conexao);
				}else{
					$_SESSION['sucess'] = "Pedido realizado com sucesso!";
					$_SESSION['email'] = "Enviamos um E-MAIL para voce, com os dados do seu PEDIDO!";
					
				}
				
				$pedido = insereItemPedido($conexao, $jogos, $ultimoRegistro);
				
			}	
?>
		<a href="carrinho.php?usuario=<?=$_SESSION['usuario']['codigo'] ?>&total=<?=$total?>" class="btn btn-success">Finalizar Pedido</a>
	</div>
	</div>
	</div>
</div>
	<?php include("rodape.php");?>