<?php


namespace App\classes;


class category
{
    public function insertCategoryInfo($data){
        $category_name = $data['category_name']; $category_description = $data['category_description'];
        $status = $data['status'];
        $sql = "INSERT INTO `categorys`( `category_name`, `category_description`, `status`)
                VALUES ('$category_name','$category_description','$status')";
        if(mysqli_query(Database::dbConnection(), $sql)){
            return $message = "<div class='alert alert-success' align='center'>Data insert successfully.</div>";
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function showAllCategoryInfo(){
        $sql = "SELECT * FROM categorys";

        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public function showAllCategoryInfoById($id){
        $sql = "SELECT * FROM categorys WHERE category_id = '$id'";
        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public function updateCategoryInfoById($data){
        $category_id = $data['category_id']; $category_name = $data['category_name']; $category_description = $data['category_description'];
       $status = $data['status'];
       $sql = "UPDATE `categorys` SET `category_name`='$category_name',`category_description`='$category_description',`status`='$status' WHERE `category_id` = '$category_id';";
        if(mysqli_query(Database::dbConnection(), $sql)){
            header('Location: manage-category.php');

        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public  function deleteCategoryInfoById($id){
        $category_id = $id;
        $sql = "DELETE FROM categorys WHERE category_id = '$category_id'";
        if(mysqli_query(Database::dbConnection(), $sql)){
            return $message = "<div class='alert alert-success' align='center'>Data Delete successfully.</div>";
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function showAllPublishedCategoryNameById(){
        $sql = "SELECT * FROM categorys WHERE status= 1";
        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

}