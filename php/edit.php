<?php 
	session_start();

	require_once 'connect.php';

	$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
	$profession = filter_var(trim($_POST['profession']), FILTER_SANITIZE_STRING);
	$email = $_SESSION['user']['email'];

	$path = 'img/avatar/' . time() . $_FILES['avatar']['name'];
	if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
		$path = 'http://placehold.it/800x600';
    }
    
    $edit=$pdo->prepare("UPDATE `users` SET `img` = :img WHERE `email` = '$email'");
    $edit->execute(['img' => $path]);

	if(isset($phone) && isset($profession))
	{
		$edit=$pdo->prepare("UPDATE `users` SET `phone` = :phone, `profession` = :profession WHERE `email` = '$email'");
		$edit->execute(['phone' => $phone, 'profession' => $profession]);
	}else if(!isset($phone) && !isset($profession))
	{
		header('Location: /profile.php');
		exit();
	}else if(isset($phone) && !isset($profession)) {
		$edit=$pdo->prepare("UPDATE `users` SET `phone` = :phone, `profession` = :profession WHERE `email` = '$email'");
		$edit->execute(['phone' => $phone, 'profession' => $_SESSION['user']['profession']]);
	}else if (!isset($phone) && isset($profession)) {
		$edit=$pdo->prepare("UPDATE `users` SET `phone` = :phone, `profession` = :profession WHERE `email` = '$email'");
		$edit->execute(['phone' => $_SESSION['user']['phone'], 'profession' => $profession]);
	}

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

	header('Location: /profile.php');
?>