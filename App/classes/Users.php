<?php


namespace App\classes;
use App\classes\Database;


class Users
{
    public function createUserAccount( $data ){

        $name = $data['name']; $email = $data['email']; $password = md5($data['password']);
        $sql = "INSERT INTO USERS(name,email,password)VALUES ('$name','$email','$password')";
        if( mysqli_query( Database::dbConnection(), $sql )){
            return $message = "<div class='alert alert-success' align='center'> Data Insert Successfully</div>";
        }else{
            die('query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function logInUserAccount( $data ){

         $email = $data['email']; $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        if( mysqli_query( Database::dbConnection(), $sql )){
            $repository= mysqli_query(Database::dbConnection(), $sql);
            $user = mysqli_fetch_assoc($repository);
            if($user){
                $_SESSION['id'] = $user['id'];
               $_SESSION['name'] = $user['name'];
               header('Location: dashboard.php');
            }else{
                return $message = '<div class="alert alert-danger" align="center">Enter Valid Email And Password</div>';
            }

        }else{
            die('query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public function logOut(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        session_destroy();
        session_unset();
        header('Location: index.php');
    }

}