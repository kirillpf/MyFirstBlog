<?php 
	session_start();
	require_once 'connect.php';

	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

	$subject = '=?utf-8?B?'.base64_encode('Feetback').'?=';
	$headers = 'From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n';

	mail('dragonsuper1234509876@gmail.com', $subject, $message, $headers);

	header('Location: /contact.php');

?>