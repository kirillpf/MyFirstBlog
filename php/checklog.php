<?php 
    session_start();

    require_once 'connect.php';

    $email = filter_var(trim($_POST['user']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(!$email){
        $_SESSION['message2'] = 'Пожалуйста, введите свой E-mail';
        header('Location: /log.php');
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message2'] = 'Пожалуйста, введите свой E-mail правильно';
        header('Location: /log.php');
        exit();
    }
    $valLog=$pdo->prepare("SELECT `id` FROM `users` WHERE `email` = ?");
    $valLog->execute(array($email));
    $val = $valLog->fetch()['id'];
    if (is_null($val)){
        $_SESSION['message2'] = 'Такого пользователя не существует. <a href="/reg.php">Зарегистрировать новый аккаунт?</a>';
        header('Location: /log.php');
        exit();
    }

    if(!$password){
        $_SESSION['message2'] = 'Пожалуйста, введите свой пароль';
        header('Location: /log.php');
        exit();
    }else if(mb_strlen($password) < 8){
        $_SESSION['message2'] = 'Пароль должен содержать не менее 8 символов';
        header('Location: /log.php');
        exit();
    }

    $check_user=$pdo->prepare("SELECT `password` FROM `users` WHERE `email` = ? ");
    if ($check_user->execute(array($email)))
    {
        while ($row = $check_user->fetch()['password']) 
        {
            if(password_verify($password, $row))
            {
                $sessionQuery=$pdo->prepare("SELECT * FROM `users` WHERE `email` = ? ");
                $sessionQuery->execute(array($email));
                $user=$sessionQuery->fetch();
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "email" => $user['email'],
                    "name" => $user['name'],
                    "phone" => $user['phone'],
                    "profession" => $user['profession'],
                    "img" => $user['img']
                ];
                header('Location: /');
            } else 
            {
                $_SESSION['message2'] = 'Неверный E-mail или пароль';
                header('Location: /log.php');
                exit();
            }
        }

    } else 
    {
        
    }

?>
