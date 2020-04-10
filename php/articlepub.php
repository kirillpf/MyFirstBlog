<?php 
	session_start();
	require_once 'connect.php';

	$title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
	$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
	$date = date('d M Y h:m');
	$email = $_SESSION['user']['email'];

	$path2 = 'img/imgArt/' . time() . $_FILES['image']['name'];
	if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path2)) 
	{
		$path2 = 'http://placehold.it/800x600';
    }
	
	if(!$title){
		$_SESSION['alert'] = 'Пожалуйста, напишите заголовок статьи';
        header('Location: /create.php');
        exit();
	}else if(mb_strlen($title) > 32)
	{
		$_SESSION['alert'] = 'Заголовок должен содержать не более 32 символов';
        header('Location: /create.php');
        exit();
	}else if(!$description)
	{
		$_SESSION['alert'] = 'Пожалуйста, напишите описание статьи';
        header('Location: /create.php');
        exit();
	}else if(mb_strlen($description) > 80)
	{
		$_SESSION['alert'] = 'Описание должно содержать не более 80 символов';
        header('Location: /create.php');
        exit();
	}else if(!$text)
	{
		$_SESSION['alert'] = 'Пожалуйста, напишите текст статьи';
        header('Location: /create.php');
        exit();
	}

	$query=$pdo->prepare("INSERT INTO `articles` (`title`, `description`, `text`, `date`, `image`, `email`) VALUES (:title, :description, :txt, :dat, :image, :email)");
	$query->execute(['title' => $title, 'description' => $description, 'txt' => $text, 'dat' => $date, 'image' => $path2, 'email' => $email]);

	$query2 = $pdo -> prepare("SELECT * FROM `articles` WHERE `email` = ?");
	$query2 -> execute(array($email));
	$articles = $query2 -> fetch();

    header('Location: /profile.php');
?>