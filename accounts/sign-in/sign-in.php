<?php
// lấy dữ liệu từ form 
    $u = $_POST['username'];
    $p = $_POST['password'];

    //  ket noi den csdl 
    $db = mysli_connect("localhost", "root", "", "csdldemo" );

    // Truy vấn dũ liệu tìm tk mk có trong csdl ko
    $sql = "select * from users where username" = '$u' and password = '$p'";



    $rs = mysqli_query($db,$sql);

    if (mysqli_num_rows($rs) > 0){
        // echo "<h1>dang nhap thanh cong</h1>";
        header("location:admin/admin_page.php");

    }   else {
        echo "<h1>dang nhap that bai</h1>";
        require_once 'login.html'
    }

?>



<?php

    include('connect.php');
    if (isset($_POST['btn_submit'])) {
        $email = $_POST['txtEmail'];
        $pass = $_POST['txtPass'];

        $sql = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
        echo $sql;
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            // CẤP THẺ LÀM VIỆC

            $_SESSION['isLoginOK'] = $email;
            $dbarray = mysqli_fetch_array($result);
            if($dbarray['Usertype'] == 99){
                header("location:admin/admin_page.php"); 
                $_SESSION['username'] = $username;
            }

            else{

                header("location:main.php"); 
            }
        }
        else{

            $error = "Bạn đã nhập thông tin Email"."<br/>"."hoặc mật khẩu chưa chính xác";
            header("location: login.php?error=$error");
             //Chuyển hướng, hiển thị thông báo lỗi
        } 
         else {
            header("Location: login.php");
        }
        
    }

?>