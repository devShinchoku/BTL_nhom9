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
        echo $error;

    }else{
        // if{
            // nhap dung
            $token = md5($email).rand(10,9999);
            $test = 'Active account netflix';
            $body = 'Click link'.$link;
            
            $pass_hash = password_hash($password,PASSWORD_DEFAULT);
            $sql02 = "INSERT INTO db_user (first_name,last_name,email,password,status) values ('$first_name','$last_name','$email','$pass_hash','0')";
            $result02 = mysqli_query($conn,$sql02);
            // }
            // else{
                //     nhap sai cút
                // }
            }
            
            
    if($result02){
        require 'mail.php'; 
        $subject = "Chào mừng";
        $body = "<a href='localhost/BTL_NHOM9/accounts/sign-up/verify-email.php?key=".$email."&token=".$token."'>Click and Verify Email</a>";
        // $body = "Chúc mừng bạn đã đăng kí thành công";
        sendmail($email, $last_name, $subject, $body);
        header("location:../sign-in");
    }else{
        // $error = "Can...";
        ?>
            <script>
                alert("Email đã tồn tại");
                location.href = "index.php";                                   
            </script>
        <?php 
        // header("location:index.php?error=$error");
    }
  
?>