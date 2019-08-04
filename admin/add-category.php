<?php
require_once '../vendor/autoload.php';
$category = new \App\classes\category();
session_start();
//insert data
$message ='';
if(isset($_POST['btn'])){
    $message = $category->insertCategoryInfo($_POST);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Admin-Category</title>
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
</head>
<body>
<?php include 'includes/menu.php'?>
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-8 mx-auto" >
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <h4 align="center"><?php echo $message;?></h4>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="category_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="category_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1">published
                                <input type="radio" name="status" value="0">unpublished
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Save Category Info</button>
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

