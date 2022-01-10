<?php
    require('../../config/db.php');
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    $sql01 = "SELECT * from db_user where email = '$email'";
    $result01 = mysqli_query($conn,$sql01);



    if(mysqli_num_rows($result01)>0){
        $error = "email is existed";
        // header("location:sign-up.php?error=$error");
        echo $error;

    }else{
        $pass_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql02 = "INSERT INTO db_user (first_name,last_name,email,password) values ('$first_name','$last_name','$email','$pass_hash')";
        $result02 = mysqli_query($conn,$sql02);
    }
    
    
    if($result02){
        require 'mail.php'; 
        $subject = "Chào mừng";
        $body = "Chúc mừng bạn đã đăng kí thành công";
        sendmail($email, $last_name, $subject, $body);
        header("location:../sign-in");
    }else{
        $error = "Can...";
        header("location:index.php?error=$error");
    }
  
?>