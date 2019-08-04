<?php
    require_once '../vendor/autoload.php';
    $users = new App\classes\Users();

    session_start();
    if(isset($_SESSION['id'])){
        header('Location: dashboard.php');
    }
    //log in
    if(isset($_POST['logIn'])){
        $message = $users->logInUserAccount($_POST);
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Admin</title>
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css"/>

    </head>
    <body>
        <div class="container" style="margin-top: 140px;">
            <div class="row">
                <div class="col-md-6 m-auto" style="margin-top: 500px;">
                    <?php if(isset($message)) echo $message;?>
                    <div class="card">
                        <div class="card-title" align="center"><strong><i>Admin Panel</i></strong></div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" name ="logIn" class="btn btn-success">login</button>
                                        <a href="sing-up.php" name="singUp" class="btn btn-success">Sing Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../asserts/js/jQuery-3.4.1.js"></script>
    <script src="../asserts/js/popper.js"></script>
    <script src="../asserts/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
