<?php

require_once ("cabecalho.php");
require_once ("class/PHPMailerAutoload.php");

	$pedidos = array ();
	if (isset ( $_SESSION ['pedido_email'] )) {
		
		$pedidos = $_SESSION ['pedido_email'];
		unset ( $_SESSION ['pedido_email'] );
	}
	$nome = "";
	$mail = "";
	$mensagem = "";
	
	$jogo = "";
	$login = "";
	$pedido_codigo = "";
	$valorTotal = "";
	$imagem = "";
	$jogo = "";
	$quantidade = "";
	$valor_pedido = "";
	$site = "http://alexandreximenes.esy.es/";
	
	foreach ( $pedidos as $pedido ) :
		$jogo = $pedido ['cliente'];
		$valor = $pedido ['valor_total'];
		$login = $pedido ['login'];
		$pedido_codigo = $pedido ['pedido_codigo'];
	endforeach
	;
	
	if($login == "teste"){
		$login = "email@email.com";
	}
	if (count ( $_POST ) == 3) {
		$nome = $_POST ["nome"];
		$email = $_POST ["email"];
		$mensagem = "Recebemos Seu e-mail!<br><br>de: {$nome}\nemail:{$email}\nmensagem: ".$_POST ["mensagem"];
	} else {
		$nome = $jogo;
		$email = $login;
		$mensagem = "Seu pedido foi realizado com sucesso!<br><br>
		Pedido: 0" . $pedido ['pedido_codigo'] .
		"<br>Cliente: ".$nome.
		"<br>Email: ".$email.
		"<br>Valor R$ : ".$valor.
		"<br><br>Visite-nos<br><a href='$site'>Loja online de jogos</a>";
		
	}
	
	$mail = new PHPMailer ();
	$mail->isSMTP ();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "email@email.com";
	$mail->Password = htmlentities ( "suasenha" );
	
	$mail->setFrom ( "email@email.com", "Loja online de Games" );
	$mail->addAddress ( "email@email.com" );
	$mail->Subject = "Seu pedido foi realizado com sucesso!";
	$mail->msgHTML ( "<html>{$mensagem}<br><br></html>" );
	$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
			
		if ($mail->send ()) {
			$_SESSION ['email'] = "Enviamos um E-MAIL para voce desta compra. Obrigado!";
			} else {
				echo "Erro ao enviar mensagem " . $mail->ErrorInfo;
			}
			//redirect2('index.php', 1);
			?>