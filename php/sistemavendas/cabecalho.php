<?php 
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0054)http://getbootstrap.com.br/examples/navbar-static-top/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com.br/favicon.ico">

    <title>Loja Virtual de Jogos</title>

  <link href="css/estilo.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top" style="height: 10px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Shop Game</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Inicio</a></li>
            <li><a href="cadastrarJogo.php">Novo jogo</a></li>
              <li><a href="listaJogo.php">Listar jogo</a></li>
            <li><a href="cadastroCliente.php">Novo cliente</a></li>
            <li><a href="listaCliente.php">Listar cliente</a></li>
                  <li><a href="telaCarrinho.php">Comprar</a></li>
                   <li><a href="formulario-enviaemail.php">Contato</a></li>
                    <?php 
                    require_once 'usuario.php';
                    if(usuarioEstaLogado()):?>
                    	  <li><a href="login.php?logout="<?=$_SESSION['usuario']['nome']?>"><strong>Deslogar</strong></a></li>
                    <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <li><a href="cadastrarJogo.php">Cadastrar jogo</a></li>
                    <li><a href="listaJogo.php">Listar jogo</a></li>
                      <li><a href="telaCarrinho.php">Tela de carrinho</a></li>
                  <li><a href="carrinho.php">Carrinho de compras</a></li>
                            <li role="separator" class="divider"></li>
                <li><a href="cadastroCliente.php">Cadastrar cliente</a></li>
                  <li><a href="listaCliente.php">Listar cliente</a></li>
                     <li><a href="login.php">Login</a></li>
                  <li><a href="formulario-enviaemail.php">Contato</a></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          
           <li class="dropdown" >
           	<a href="#" style="height: 50px;class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

			<?php
						$usuario = "";
                    	if(usuarioEstaLogado()):
                    		$usuario =  buscaUsuario2($conexao, $_SESSION['usuario']['codigo']);?>
                    		<img style="width: 35px; padding:0; margin:0; border-radius: 50%" src="<?=$usuario['imagem'] ?>">
                    	<?php 	echo $usuario['nome']; ?>
			 <span class="caret"></span></a>
               	
              <ul class="dropdown-menu">
                    	<li><a href="login.php?logout="<?=$usuario['nome']?>"><strong>Logout</strong></a></li>
                    	<?=$usuario['login']?>
              </ul>
             
             <?php else: ?>
              Login
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                     <li>
	                   	<div class="form-group">
	                   		<form action="index.php" method="post" navbar-form navbar-right" style="width: 235px;">
				                          <div class="form-group">
				                            <label style="text-indent: 4px;">Usuario:<br><input type="text" name="login" placeholder="Email" class="form-control" style="margin-left: 5px;"></label>
				                          </div>
				                          <div class="form-group">
				                            <label style="text-indent: 4px;">Senha:<br><input type="password" name="senha" placeholder="Password" class="form-control" style="margin-left: 5px;"></label>
				                          </div>
				                          <button type="submit" class="btn btn-success" style="width: 215px;margin: 5px;">Sign in</button>
				         </form>
	                    	<?php endif; ?>      	
	    
	              </li>

              </ul>
            </li>
          
         
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      </div>
    </nav>


<?php error_reporting(E_ALL ^ E_NOTICE ^E_WARNING);?> 
