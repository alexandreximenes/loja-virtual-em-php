<?php require_once("cabecalho.php"); 

if (isset ( $_SESSION ['danger'] )) {
	?>
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Danger! </strong> <?=$_SESSION ['danger']?>
	</div>
	<?php
		unset ( $_SESSION ['danger'] );
	}
	
	if (isset ( $_SESSION ['success'] )) {
		?>
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success! </strong> <?=$_SESSION ['success']?>
	</div>
	<?php
		unset ( $_SESSION ['success'] );
	}
?>
<div class="container">
	<div class="panel panel-primary" style="margin: 10%">
		<div class="panel-heading">
			<h3 class="panel-title">Dados de acesso</h3>
		</div>
		<div class="panel-body">
							
					<form action="enviaemail.php" method="post">
					    <table class="table">
					        <tr>
					            <td>Nome</td>
					            <td><input type="text" name="nome" class="form-control"></td>
					        </tr>
					        <tr>
					            <td>Email</td>
					            <td><input type="email" name="email" class="form-control"></td>
					        </tr>
					        <tr>
					            <td>Mensagem</td>
					            <td><textarea class="form-control" name="mensagem"></textarea></td>
					        </tr>
					        <tr>
					            <td><button type="submit" class="btn btn-primary">Enviar</button></td>
					        </tr>
					    </table>
					
					</form>
			</div>
		</div>
	</div>


<?php require_once("rodape.php");  ?>