<?php


namespace App\classes;


class Blogs
{
     public function insertBlogInfo( $data ){
        $category_id = $data['category_id']; $blog_title = $data['blog_title']; $short_description = $data['short_description'];
         $long_description = $data['long_description']; $publisher_status = $data['status'];
         $fileName = $_FILES['blog_image']['name'];
         $directory = "../asserts/images/";
         $imageUrl = $directory.$fileName;
          $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
          $imageCheck = getimagesize($_FILES['blog_image']['tmp_name']);
          if($imageCheck){
              if(file_exists($imageUrl)){
                  die('image already Exists');
              }else{
                  if( $_FILES['blog_image']['size'] > 500000 ){
                    die('image size is less than 10kb');
                  }else{
                      if( $fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG' ){
                          die('image should be jpg or png');
                      }else{
                          move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                          $sql = "INSERT INTO `blogs`( `category_id`, `blog_title`, `short_description`, `long_description`, `blog_image`, `publisher_status`) 
                                    VALUES ('$category_id','$blog_title','$short_description','$long_description','$imageUrl','$publisher_status')";

                          if(mysqli_query(Database::dbConnection(),$sql)){
                              return $message = "<div class='alert alert-success' align='center'>Data insert successfully...</div>";
                          }else{
                              die('Query Problem'.mysqli_error(Database::dbConnection()));
                          }
                      }
                  }
              }
          }else{
              die('Please select Image file..');
          }
     }
     public function showAllBlogInfo(){
           $sql = "SELECT b.*, c.category_name FROM blogs as b, categorys as c WHERE c.category_id = b.category_id";
         if(mysqli_query(Database::dbConnection(),$sql)){
             $queryResult = mysqli_query(Database::dbConnection(),$sql);
             return $queryResult;
         }else{
             die('Query Problem'.mysqli_error(Database::dbConnection()));
         }
     }
     //for viewBlog
     public function showAllBlogInfoById($id){
         $sql = "SELECT * FROM blogs WHERE id = '$id'";
         if(mysqli_query(Database::dbConnection(),$sql)){
             $queryResult = mysqli_query(Database::dbConnection(),$sql);
             return $queryResult;
         }else{
             die('Query Problem'.mysqli_error(Database::dbConnection()));
         }
     }
    public function updateBlogInfo( $data ){
         $id = $data['blog_id']; $blog_title = $data['blog_title']; $short_description = $data['short_description'];
        $long_description = $data['long_description']; $publisher_status = $data['status'];
        $updateBlogImage = $_FILES['blog_image']['name'];
        if($updateBlogImage){
            $sql = "SELECT * FROM blogs WHERE id = '$id'";
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            $blogImage = mysqli_fetch_array($queryResult);
            unlink($blogImage['blog_image']);
            $fileName = $_FILES['blog_image']['name'];
            $directory = "../asserts/images/";
            $imageUrl = $directory.$fileName;
            $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
            $imageCheck = getimagesize($_FILES['blog_image']['tmp_name']);
            if($imageCheck){
                if(file_exists($imageUrl)){
                    die('image already Exists');
                }else{
                    if( $_FILES['blog_image']['size'] > 500000 ){
                        die('image size is less than 10kb');
                    }else{
                        if( $fileType != 'jpg' && $fileType != 'png' && $fileType != 'JPG' ){
                            die('image should be jpg or png');
                        }else{
                            move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                            $sql = "UPDATE `blogs` SET `blog_title`='$blog_title',`short_description`='$short_description',`long_description`='$long_description',`blog_image`='$imageUrl',`publisher_status`='$publisher_status'  WHERE id ='$id' ";

                            if(mysqli_query(Database::dbConnection(),$sql)){
                                return $message = "<div class='alert alert-success' align='center'>Data insert successfully...</div>";
                            }else{
                                die('Query Problem'.mysqli_error(Database::dbConnection()));
                            }
                        }
                    }
                }
            }else{
                die('Please select Image file..');
            }

        }else{
            $sql = "UPDATE `blogs` SET `blog_title`='$blog_title',`short_description`='$short_description',`long_description`='$long_description',`publisher_status`='$publisher_status'  WHERE id ='$id' ";
            if(mysqli_query(Database::dbConnection(),$sql)){
                return $message = "<div class='alert alert-success' align='center'>Data insert successfully...</div>";
            }else{
                die('Query Problem'.mysqli_error(Database::dbConnection()));
            }
        }
    }

    public function deleteBlogInfoById($id){

        $sql = "DELETE FROM blogs WHERE id = '$id'";
        if(mysqli_query(Database::dbConnection(), $sql)){
            return $message = "<div class='alert alert-danger' align='center'>Data Delete successfully.</div>";
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
}