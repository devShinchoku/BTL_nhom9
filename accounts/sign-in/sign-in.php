
<?php
    require('../../config/db.php');
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