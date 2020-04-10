<?php
	session_start();

	require_once 'connect.php';

	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	$path = 'http://placehold.it/800x600';

	/*Проверка Email*/
	if(!$email){
		$_SESSION['message'] = 'Пожалуйста, введите свой E-mail';
		header('Location: /reg.php');
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['message'] = 'Пожалуйста, введите свой E-mail правильно';
		header('Location: /reg.php');
		exit();
	}else if(mb_strlen($email) > 60){
		$_SESSION['message'] = 'Email не должен привышать 60 символов';
		header('Location: /reg.php');
		exit();
	}
	$valEmail=$pdo->prepare("SELECT `id` FROM `users` WHERE `email` = ?");
	$valEmail->execute(array($email));
	$val = $valEmail->fetch()['id'];
	if ($val == 1){
		$_SESSION['message'] = 'Email занят';
		header('Location: /reg.php');
		exit();
	}
	/*Проверка имени*/
	if(!$name){
		$_SESSION['message'] = 'Пожалуйста, введите своe имя';
		header('Location: /reg.php');
		exit();
	}else if(mb_strlen($name) > 50){
		$_SESSION['message'] = 'Имя не должен привышать 50 символов';
		header('Location: /reg.php');
		exit();
	}
	/*Проверка пароля*/
	if(!$password){
		$_SESSION['message'] = 'Пожалуйста, введите свой пароль';
		header('Location: /reg.php');
		exit();
	}else if(mb_strlen($password) < 8){
		$_SESSION['message'] = 'Пароль должен содержать не менее 8 символов';
		header('Location: /reg.php');
		exit();
	}

	$hash = password_hash($password, PASSWORD_DEFAULT);

	$query = $pdo -> prepare("INSERT INTO `users` (`email`, `name`, `phone`, `profession`, `img`, `password`) VALUES (:email, :name, '', '', :img, :hash)");
	$query -> execute(['email' => $email, 'name' => $name, 'img' => $path, 'hash' => $hash]);

	$query2 = $pdo -> prepare("SELECT * FROM `users` WHERE `email` = ?");
	$query2 -> execute(array($email));
	$user = $query2 -> fetch();
	$_SESSION['user'] = [
        "id" => $user['id'],
        "email" => $user['email'],
        "name" => $user['name'],
        "phone" => $user['phone'],
        "profession" => $user['profession'],
        "img" => $user['img']
    ];
	header('Location: /');
?>