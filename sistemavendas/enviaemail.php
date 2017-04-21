<?php
require_once("class/PHPMailerAutoload.php");

function enviaEmail($post){
	//session_start();
	$nome = $post["nome"];
	$email = $post["email"];
	$mensagem = $post["mensagem"];

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "xyymenes@gmail.com";
	$mail->Password = "3nc4ypt10n#1";

	$mail->setFrom("xyymenes@gmail.com", "Alura Curso PHP e MySQL");
	$mail->addAddress("xyymenes@gmail.com");
	$mail->Subject = "Email de contato da loja";
	$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
	$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

	if($mail->send()) {
	    //$_SESSION["success"] = "Mensagem enviada com sucesso";
	    header("Location: index.php");
	} else {
	    //$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	    header("Location: contato.php");
	}
	die();
	}
?>