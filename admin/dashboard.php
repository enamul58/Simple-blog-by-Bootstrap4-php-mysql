<?php
    require_once '../vendor/autoload.php';
    $users = new App\classes\Users();
    session_start();

    if( $_SESSION['id'] == null){
        header('Location: index.php');
    }
    //log out
   if(isset($_GET['logout'])){
       $users->logout();
   }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
    </head>
    <body>

        <?php include 'includes/menu.php'?>

        <script src="../asserts/js/jQuery-3.4.1.js"></script>
        <script src="../asserts/js/popper.js"></script>
        <script src="../asserts/js/bootstrap.bundle.js"></script>
    </body>
</html>