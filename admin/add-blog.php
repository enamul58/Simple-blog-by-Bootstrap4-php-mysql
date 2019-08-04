<?php
    require_once '../vendor/autoload.php';
    $category = new App\classes\category();
    $blogs = new App\classes\Blogs();
    session_start();

    if(isset($_POST['btn'])){
        $message = $blogs->insertBlogInfo($_POST);
    }
    //display value in select option
    $queryResult = $category->showAllPublishedCategoryNameById() ;
    $categoryInfo = mysqli_fetch_assoc($queryResult);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Blog</title>
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
</head>
<body>

<?php include 'includes/menu.php'?>
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-10 mx-auto" >
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h4 align="center"><?php if(isset($message))echo $message;?></h4>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                    <option>========Select Option========</option>
                                    <?php while($categoryInfo){?>
                                        <option value="<?php echo $categoryInfo['category_id'];?>">
                                            <?php echo $categoryInfo['category_name'];?>
                                        </option>
                                        <?php $categoryInfo = mysqli_fetch_assoc($queryResult);?>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  name="blog_title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control textarea" name="long_description" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file"  name="blog_image" accept="image/*"/>
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
                                <button type="submit" name="btn" class="btn btn-info btn-block">Save Category Info</button>
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
<script src="../asserts/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'.textarea'});</script>
<script src="../asserts/js/bootstrap.min.js"></script>

</body>
</html>