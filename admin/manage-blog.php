<?php
require_once '../vendor/autoload.php';
$category = new App\classes\category();
$blogs = new  App\classes\Blogs();
session_start();
//show all info
$QueryResult = $blogs->showAllBlogInfo();
$rows = [];
while($repository = mysqli_fetch_assoc($QueryResult)){
    $rows[] = $repository;
}
//delete info by id
if( isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = $blogs->deleteBlogInfoById($id);
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Blog</title>
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
</head>
<body>

<?php include 'includes/menu.php'?>
<div class="container">

    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <?php if(isset($message)) echo $message;?>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#SL-NO</th>
                            <th scope="col">Category-Name</th>
                            <th scope="col">Blog-Title</th>
                            <th scope="col">Publisher-Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach ($rows as $categoryInfo){?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $categoryInfo['category_name'];?></td>
                                <td><?php echo $categoryInfo['blog_title'];?></td>
                                <td><?php echo $categoryInfo['publisher_status']==1?'published':'unpublished';?></td>
                                <td>
                                    <a href="blog-view.php?id=<?php echo $categoryInfo['id'];?>">View</a>
                                    <a href="edit-blog.php?id=<?php echo $categoryInfo['id'];?>">Edit</a>
                                    <a href="?delete=true&id=<?php echo $categoryInfo['id'];?>" onclick="return confirm('are you sure delete blog info..')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../asserts/js/jQuery-3.4.1.js"></script>
<script src="../asserts/js/popper.js"></script>
<script src="../asserts/js/bootstrap.bundle.js"></script>
</body>
</html>
