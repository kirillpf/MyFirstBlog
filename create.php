<?php session_start(); ?>
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
    <h1 class="mb-4">Create article</h1>
      <?php
        if (isset($_SESSION['alert'])) {
          echo '  
              <div class="alert alert-primary text-center">
                <span>'.$_SESSION['alert'].'</span>
              </div>
              ';
        }
        unset($_SESSION['alert']);
      ?>
      <form action="php/articlepub.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group has-error">
              <label for="title">Title *</label>
              <input type="text" class="form-control rounded-pill" name="title" />
            </div>
            
            <div class="form-group">
              <label for="description">Description *</label>
              <input type="text" class="form-control rounded-pill" name="description" />
            </div>
            
            <div class="form-group">
              <label for="text">Text *</label>
              <textarea rows="10" class="form-control rounded-bottom" name="text" ></textarea>
            </div>

              <div class="form-group col-md-6 mb-3">
                <label for="file">Image(800x600)</label>
                <input type="file" class="form-control-file mt-1" name="image">
              </div>

            <div class="form-group">
              <button type="submit" name="btn" class="btn btn-block btn-primary rounded-pill mr-lg-n4">Send!</button>
            </div>

      </form>
</div>
</body>
</html>