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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <?php include_once 'block/header.php'; ?>
  <div class="container">
    <a href="/" class="btn btn-primary rounded-pill" style="position: relative; left: 50%; transform: translate(-50%, 0);">На главную</a>
  </div>
    <div>
      <?php
        $id=$_GET['id'];
        $qypub=$pdo->prepare("SELECT * FROM `articles` WHERE `id` = ?");
        $qypub->execute(array($id));
        while ($row=$qypub->fetch(PDO::FETCH_OBJ)) {
          echo '
              <div role="tabpanel" class="container" id="seite1">
                  <article class="panel panel-default">
                    <header class="panel-heading">
                      <h1 class="text-muted text-center mt-5 "><span class="glyphicon glyphicon-pencil"></span>'.$row->title.'</h1>
                      <hr class="mb-4" />
                    </header>
                      <div class="panel-body">
                         <figure class="pull-left text-center"><img class="img-responsive img-rounded col-10" alt="image" src="'.$row->image.'"/>
                        </figure>
                          <p class="text-justify">'.$row->text.'</p>
                      </div>
                  <footer class="panel-footer clearfix mt-5"><address class="pull-right">Written by <b>'.$row->email.'</b> at <time><b>'.$row->date.'</b></time></address></footer>
              </div>';
      }
    ?>
    </div>
</body>
</html>