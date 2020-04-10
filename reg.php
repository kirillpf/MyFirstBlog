<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <title>bloger.ru</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
<body>
 <div class="login-wrap mt-5">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Registration</label>
    <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <form action="php/checkreg.php" method="POST">
        <div class="sign-in-htm">
          <div class="group">
            <label for="email" class="label">Email</label>
            <input name="email" type="text" class="input">
          </div>
          <div class="group">
            <label for="name" class="label">Name</label>
            <input name="name" type="text" class="input">
          </div>
          <div class="group">
            <label for="password" class="label">Password</label>
            <input name="password" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input type="submit" class="button" name="btn1" value="Registration">
          </div>
          <div class="hr mb-4"></div>
          <?php
            if (isset($_SESSION['message'])) {
                echo '  
                    <div class="alert alert-primary text-center">
                      <span>'.$_SESSION['message'].'</span>
                    </div>
                ';
            }
            unset($_SESSION['message']);
            session_destroy();
          ?>
        </div>
      </form>  
    </div>
  </div>
</div>
</body>
</html>