<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
<div class="btn d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal text-dark">bloger.ru</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Home</a>
    <a class="p-2 text-dark" href="/contact.php">Support</a>

    <?php 
      if(isset($_SESSION['user'])){
        echo '<a class="p-2 text-dark" href="/articles.php">My Articles</a>';
      } else {
        echo '<a class="p-2 text-dark" href="/log.php">Login</a>';
      }
    ?>
    <?php 
      if(isset($_SESSION['user'])){
        echo '<a class="btn btn-primary rounded-pill" href="/profile.php">Личный кабинет</a>'; 
      } else {
        echo '<a class="btn btn-primary rounded-pill" href="reg.php">Registration</a>';
      }
    ?>
  </nav>
</div>
</body>
</html>