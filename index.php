<?php
   require_once 'vendor/autoload.php';
     $view = new App\classes\View();
     $queryResult = $view->viewAllPublishedInfo();
      $allPublishedInfo =  mysqli_fetch_array($queryResult);
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="asserts/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="asserts/custom-css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Simple Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Features -->
    <div class="row text-center">
        <?php while($allPublishedInfo){?>
      <div class="col-lg-3 col-md-6" style="margin-top: 65px;">
        <div class="card h-100">
          <img class="card-img-top" src="admin/<?php echo $allPublishedInfo['blog_image']?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $allPublishedInfo['blog_title']?></h4>
            <p class="card-text"><?php echo $allPublishedInfo['short_description']?></p>
          </div>
          <div class="card-footer">
            <a href="view-details.php?id=<?php echo $allPublishedInfo['id']?>" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
        <?php $allPublishedInfo = mysqli_fetch_array($queryResult);?>
        <?php }?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="margin-top: 200px">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="asserts/js/jQuery-3.4.1.js"></script>
  <script src="asserts/js/popper.js"></script>
  <script src="asserts/js/bootstrap.bundle.min.js"></script>
</body>

</html>
