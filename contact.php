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
    <div class="col-10 col-md-offset-2 container mt-5">
    <h1 class="mb-4">Feetback</h1>
      <form action="php/email.php" method="POST">
            
            <div class="form-group">
              <label for="email">Your E-mail *</label>
              <input type="text" class="form-control rounded-pill" name="email" />
            </div>
            
            <div class="form-group">
              <label for="message">Message *</label>
              <textarea rows="10" class="form-control rounded-bottom" name="message" ></textarea>
            </div>

            <div class="form-group">
              <button type="submit" name="btn" class="btn btn-block btn-primary rounded-pill mr-lg-n4">Send!</button>
            </div>

      </form>
</div>
  <?php include_once 'block/footer.php'; ?>
</body>
</html>