<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>
<meta charset=”UTF-8”>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link href="style/estilo.css" rel="stylesheet">
<link rel="icon" href="http://getbootstrap.com/favicon.ico">

<title>Cadastro de Livros</title>

<!-- Bootstrap core CSS -->
<link href="style/bootstrap.css" rel="stylesheet">
<!-- Bootstrap theme -->
<link href="style/bootstrap-theme.css" rel="stylesheet">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="style/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style/theme.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script
	src="Theme%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>
		
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Biblioteca</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="cadastrolivro.php">Cadastro de Livros</a></li>
					<li><a href="listalivros.php">Lista de Livros</a></li>
				</ul>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Opcoes <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="cadastrolivro.php">Cadastrar livro</a></li>
							<li><a href="listalivro.php">Listar os livros</a></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</div>
			
			<!--/.nav-collapse -->
		</div>
	</nav>

<?php error_reporting ( E_ALL ^ E_NOTICE ^ E_WARNING);
?>