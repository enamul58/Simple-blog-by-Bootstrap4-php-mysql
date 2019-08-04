<?php
    require_once '../vendor/autoload.php';
    $category = new App\classes\category();
    session_start();
   //show all info
    $QueryResult = $category->showAllCategoryInfo();
    $rows = [];
    while($repository = mysqli_fetch_assoc($QueryResult)){
        $rows[] = $repository;
    }
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
    <title>Manage Category</title>
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asserts/custom-css/heroic-features.css">
</head>
<body>

<?php include 'includes/menu.php'?>
    <div class="container">
        <?php if(isset($message)) echo $message;?>
        <div class="row">
            <div class="card m-auto">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Category-Id</th>
                            <th scope="col">Category-Name</th>
                            <th scope="col">Category-Description</th>
                            <th scope="col">Publisher-Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $categoryInfo){?>
                            <tr>
                                <th scope="row"><?php echo $categoryInfo['category_id'];?></th>
                                <td><?php echo $categoryInfo['category_name'];?></td>
                                <td><?php echo $categoryInfo['category_description'];?></td>
                                <td><?php echo $categoryInfo['status']==1?'published':'unpublished';?></td>
                                <td>
                                    <a href="edit-category.php?id=<?php echo $categoryInfo['category_id'];?>">Edit</a>
                                    <a href="?delete=true&id=<?php echo $categoryInfo['category_id'];?>" onclick="return confirm('are you sure delete category info..')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<script src="../asserts/js/jQuery-3.4.1.js"></script>
<script src="../asserts/js/popper.js"></script>
<script src="../asserts/js/bootstrap.bundle.js"></script>
</body>
</html>
