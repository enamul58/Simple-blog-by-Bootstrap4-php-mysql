<?php


namespace App\classes;


class View
{
    public function viewAllPublishedInfo() {
            $sql = "SELECT * FROM blogs WHERE publisher_status = 1";
            if(mysqli_query(Database::dbConnection(),$sql)){
                $queryResult = mysqli_query(Database::dbConnection(),$sql);
                return $queryResult;
            }else{
                die('Query Problem'.mysqli_error(Database::dbConnection()));
            }
        }

    public function viewAllPublishedInfoById($id) {
        $sql = "SELECT * FROM blogs WHERE id= '$id'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult = mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error(Database::dbConnection()));
        }
    }
}