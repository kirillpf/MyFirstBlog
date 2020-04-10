<?php session_start(); ?>
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

  <div class="container emp-profile">
        <form action="php/edit.php" method="POST" enctype="multipart/form-data">
           <div class="col-md-6 m-auto">
              <div class="profile-img">
                  <img src="http://placehold.it/800x600" class="img-thumbnail" />
                  <div class="file btn btn-lg btn-primary d-block">
                    <input class="col-10" type="file" name="avatar">
                  </div>
              </div>
            </div>
            <div class="container col-md-10 mt-lg-5 order-md-1">
              <h1 class="mt-3 text-center mb-5">Edit profile</h1>
                  <div class="mb-3">
                    <label for="phone">Phone</label>
                    <?php 
                     echo '<input type="text" class="form-control" name="phone" value="'.$_SESSION['user']['phone'].'">';
                    ?>
                  </div>
                  <div class="mb-3">
                    <label for="profession">Profession</label>
                    <?php 
                     echo '<input type="text" class="form-control" name="profession" value="'.$_SESSION['user']['profession'].'">';
                    ?>
                  </div>
                
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block rounded-pill mb-5" type="submit">Save</button>
          </div>
        </form>           
    </div>
</body>
</html>