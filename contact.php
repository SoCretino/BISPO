<?php
	require_once('phpmailer/class.phpmailer.php');
	require_once('phpmailer/class.smtp.php');
	if ( strlen($_POST['name']) < 2 || strlen($_POST['name']) > 70 || !isset($_POST['name']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !isset($_POST['email']) || strlen($_POST['message']) < 5 || strlen($_POST['message']) > 1500 || !isset($_POST['message']) ) {
		echo "No se pudo enviar el mensaje. Chequee que sus datos son correctos e inténtelo nuevamente.";
	}
	else {
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "user@test.com";
		$mail->Password = "password_here";
		$mail->SetFrom($_POST['email']);
		$mail->Subject = "Contacto Backline - " . $_POST['email'];
		$mail->Body = "<b>Nombre:</b> " . $_POST['name'] . "<br>" . "<b>Correo:</b> " . $_POST['email']. "<br>" . "<b>Mensaje:</b>" . "<blockquote>" . nl2br($_POST['message'] . "</blockquote>");
		$mail->AddAddress("user@test.com");
		if(!$mail->Send()) {
			echo "El mensaje no pudo ser enviado. Inténtelo nuevamente.";
		}
		else {
			echo "Mensaje enviado correctamente.";
		}
	}
?>