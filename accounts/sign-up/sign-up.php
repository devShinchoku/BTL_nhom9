<?php
    $err = [];
    if(isset($_POST['name'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];


        if(empty($first_name)){
            $err['first_name'] = 'ban chua nhap ten';
        }
        if(empty($last_name)){
            $err['last_name'] = 'ban chua nhap ten';
        }
        if(empty($email)){
            $err['email'] = 'ban chua nhap email';
        }
        if(empty($password)){
            $err['password'] = 'ban chua nhap pass';
        }
        if(empty($password != $password )){
            $err['rpassword'] = 'nhap lai sai';
        }
        if(empty($err)){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(first_name,last_name,email,password) VALUES ('$first_name','$last_name','$email','$pass')";
            $query = mysqli_query($conn,$sql);
            if($query){
                header('location: sign-in.php');
            }
        }
    }
?>