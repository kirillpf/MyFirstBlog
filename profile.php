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
  <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<form>
    <div class="btn btn-block" style="opacity: .5;">
        <div class="">
            <a href="/" class="btn btn-primary rounded-pill">Home</a>
            <a href="/articles.php" class="btn btn-primary rounded-pill">Item</a>
            <a href="/contact.php" class="btn btn-primary rounded-pill">Feet</a>
            <a href="/create.php" class="btn btn-primary rounded-pill">Send</a>
        </div>
    </div>
</form>
<form class="container">
    <div class="row mt-lg-3 mb-3">
        <div class="col-md-4">
            <div class="col-form-label">
                <?php
                    $email = $_SESSION['user']['email'];
                    $qypub = $pdo -> query("SELECT `img` FROM `users` WHERE `email` = '$email'");
                    while ($row = $qypub -> fetch(PDO::FETCH_OBJ)) {
                        echo "<img src=".$row->img." class='img-thumbnail ml-lg-n3'>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
              <?php                        
                echo '<h3 class="ml-lg-5 mr-lg-n5 mt-4">'.$_SESSION['user']['name'].'</h5>';
                echo '<h6 class="ml-lg-5 mr-lg-n5 mt-4">'.$_SESSION['user']['profession'].'</h6>';
              ?>
            </div>
        </div>
    </div>
</form>
<table class="table table-bordered success container text-center table-active table-sm">
    <thead>
        <tr>
            <th class="w-50">Name</th>
            <?php    
                echo '<td>'.$_SESSION['user']['name'].'</td>';
            ?>
        </tr>
        <tr>
            <th class="info">Email</th>
            <?php    
                echo '<td class="col-form-label-sm">'.$_SESSION['user']['email'].'</td>';
            ?>
        </tr>
        <tr>
            <th class="info">Phone</th>
            <?php    
                echo '<td>'.$_SESSION['user']['phone'].'</td>';
            ?>
        </tr>
        <tr>
            <th class="info">Profession</th>
            <?php    
                echo '<td>'.$_SESSION['user']['profession'].'</td>';
            ?>
        </tr>
    </thead>
</table>
<footer>
    
</footer>
<footer class="my-md-5 border-top container text-dark">
      <div class="bottom section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="copyright">
                <div class="mt-5" style="opacity: .5;">
                    <a href="/"><input type="button" class="btn btn-primary rounded-pill" value="Home"/></a>
                    <a href="editProfile.php"><input type="button" class="btn btn-primary rounded-pill" value="Edit"/></a>
                    <a href="php/exit.php"><input type="button" class="btn btn-primary rounded-pill" value="Exit"/></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</footer>
</body>
</html>
