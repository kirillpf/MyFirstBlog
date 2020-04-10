<?php 
session_start();
require_once 'php/connect.php';  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <title>bloger.ru</title> 
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <?php include_once 'block/header.php'; ?>
  <h1 class="container text-center mt-5 mb-5">My Articles</h1>
  <div class="container">
          <?php
            $email = $_SESSION['user']['email'];
            $qypub=$pdo->prepare("SELECT * FROM `articles` WHERE `email` = '$email'");
            $qypub->execute(array($email));
            while ($row=$qypub->fetch(PDO::FETCH_OBJ))
            {
              echo '
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col-form-label-sm p-3">
                    <div class="col-auto d-none d-lg-block">
                      <img src="'.$row->image.'" class="col-4 float-lg-left ml-lg-n4">
                    </div>
                      <strong class="d-inline-block mb-2 text-dark mt-3">E-mail: '.$row->email.'</strong>
                      <h3 class="mt-3">'.$row->title.'</h3>
                      <div class="mb-1 text-muted">'.$row->date.'</div>
                      <p class="card-text mb-auto">'.$row->description.'</p>
                      <a href="/full.php?id='.$row->id.'">Continue reading</a><br />
                      <a href="php/delete.php?id='.$row->id.'" class="btn btn-danger mt-4">Delete article</a>
                  </div>
                </div>
                  ';
            }
          ?>
  </div>
  <?php include_once 'block/footer.php'; ?>
</body>
</html>