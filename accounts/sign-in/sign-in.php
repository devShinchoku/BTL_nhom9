
<?php

    // require('../../config/constants.php');
    // if (isset($_POST['ok'])) {
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];


    //     $sql = "SELECT * FROM db_user WHERE email = '$email' AND password = '$password'";
    //     echo $sql;
    //     $result = mysqli_query($conn,$sql);
    //     if(mysqli_num_rows($result) > 0){
    //         // CẤP THẺ LÀM VIỆC

    //         $_SESSION['isLoginOK'] = $email;
    //         $dbarray = mysqli_fetch_array($result);
    //         if($dbarray['Usertype'] == 99){
    //             header("location:admin/admin_page.php"); 
    //             $_SESSION['email'] = $email;
    //         }

    //         else{
    //             header("location:../index.php"); 
    //         }
    //     }
    //     // else{

    //     //     $error = "Bạn đã nhập thông tin Email"."<br/>"."hoặc mật khẩu chưa chính xác";
    //     //     header("location: login.php?error=$error");
    //     //     // header("Location: login.php");
    //     //      //Chuyển hướng, hiển thị thông báo lỗi
    //     // } 
    //      else {
    //         header("Location: ../sign-in/");
    //     }
        
    // }
    
?>


<?php
    require('../../config/constants.php');
    if (isset($_POST['ok']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if ($email == "" ||  $pass =="") {?><script>
			alert("username và password bạn không được để trống!")
            </script>
            <?php
        }
        else{
            $sql = "SELECT * FROM db_user WHERE email=?";
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$account_id,$email ,$phonenum,$password,$first_name,$last_name,$permission);
                // echo $email;
                if(mysqli_stmt_fetch($stmt)){
                    // echo $email;
                    if(password_verify($pass,$password)){                 
                        // if($usertype == '99'){  
                        //     // $_SESSION['isLoginOK'] = $email;
                        //     // header("location:../admin/admin_page.php"); 
                        //     ?>
                                

                             <?php                        
                        // }                      
                        // else{
                            ?>
                                <script>
                                    alert("Đăng nhập thành công");
                                    location.href = "../index.php";
                                    
                                </script>

                            <?php        
                            // echo 'hello';
                            // header("location: ../main.php"); 
                        }
                    }
                    else{
                        ?>
                                <script>
                                    alert("Sai mật khẩu rồi!!!quay lại đi");
                                    location.href = "index.php";
                                    
                                </script>

                            <?php  
                    }
                }
                else{
                    ?>
                    <script>
                        alert("Tài khoản không tồn tại!!!");
                        location.href = "index.php";
                        // alert("hshshsh");
                    </script>

                <?php  
                }
            }

        }
       


    
    //}
    ?>