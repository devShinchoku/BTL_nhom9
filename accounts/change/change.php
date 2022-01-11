<?php
    session_start();
    $email = $_POST["email"];
    $passcu = $_POST["password_cu"];
    $passmoi = $_POST["password_moi"];

    $conn = mysqli_connect('localhost','root','','tour') or die('Unable To connect');
    if(count($_POST)>0) {
    $result = mysqli_query($conn,"SELECT * from db_user WHERE email='" . $email . "'");
    $row=mysqli_fetch_array($result);


        if(password_verify($_POST["password_cu"],$row["password"])){ 
        // if($_POST["password_cu"] == $row["password"]) {
            $pass_hash = password_hash($passmoi,PASSWORD_DEFAULT);
            $sql02 = "UPDATE db_user SET password ='$pass_hash' WHERE email='$email'";
            $result02 = mysqli_query($conn,$sql02);
            ?>
            <script>
                alert("Bạn đã đổi mật khẩu thành công");
                location.href = "index.php";      
            </script>
            <?php 
        } else{
            ?>
            <script>
                alert("Sai tài khoản hoặc mật khẩu");
                location.href = "index.php";      
            </script>
            <?php 
        }
    }
?>