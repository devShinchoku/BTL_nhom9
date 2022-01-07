
<?php

    require('../../config/constants.php');
    if (isset($_POST['ok'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM db_user WHERE email = '$email' AND password = '$password'";
        echo $sql;
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            // CẤP THẺ LÀM VIỆC

            $_SESSION['isLoginOK'] = $email;
            $dbarray = mysqli_fetch_array($result);
            if($dbarray['Usertype'] == 99){
                header("location:admin/admin_page.php"); 
                $_SESSION['email'] = $email;
            }

            else{
                header("location:../index.php"); 
            }
        }
        // else{

        //     $error = "Bạn đã nhập thông tin Email"."<br/>"."hoặc mật khẩu chưa chính xác";
        //     header("location: login.php?error=$error");
        //     // header("Location: login.php");
        //      //Chuyển hướng, hiển thị thông báo lỗi
        // } 
         else {
            header("Location: ../sign-in/");
        }
        
    }
    
?>
