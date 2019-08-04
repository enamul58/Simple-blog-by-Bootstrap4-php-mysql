
<?php
require_once '../vendor/autoload.php';
$category = new App\classes\category();
$blogs = new  App\classes\Blogs();
session_start();

//show all info by id
$id = $_GET['id'];
$QueryResult = $blogs->showAllBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($QueryResult);


//delete info by id
if( isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = $category->deleteCategoryInfoById($id);
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog-View</title>
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
</head>
<body>

<?php include 'includes/menu.php'?>
<div class="container">
    <?php if(isset($message)) echo $message;?>
    <div class="row">
        <table class="table table-bordered" >
            <tr>
                <th>Blog Id</th>
                <td><?php echo $blogInfo['id'] ;?></td>
            </tr>
            <tr>
                <th>Blog Title</th>
                <td><?php echo $blogInfo['blog_title'] ;?></td>
            </tr>
            <tr>
                <th>Category Id</th>
                <td><?php echo $blogInfo['category_id'] ;?></td>
            </tr>
            <tr>
                <th>Short Description</th>
                <td><?php echo $blogInfo['short_description'] ;?></td>
            </tr>
            <tr>
                <th>Long Description</th>
                <td><?php echo $blogInfo['long_description'] ;?></td>
            </tr>
            <tr>
                <th>Blog Image</th>
                <td><img src="<?php echo $blogInfo['blog_image'];?>" alt="" height="200" width="300"> </td>
            </tr>
            <tr>
                <th>Publication_Status</th>
                <td><?php echo $blogInfo['publisher_status'] == 1? 'published':'unpublished' ;?></td>
            </tr>
        </table>
    </div>
</div>
<script src="../asserts/js/jQuery-3.4.1.js"></script>
<script src="../asserts/js/popper.js"></script>
<script src="../asserts/js/bootstrap.bundle.js"></script>
</body>
</html>
