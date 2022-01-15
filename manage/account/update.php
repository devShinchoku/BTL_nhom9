<?php
require '../../config/db.php';

    if(isset($_POST['btnSubmit'])){
    $sql = "UPDATE db_user SET first_name = '{$_POST['txtFName']}',last_name = '{$_POST['txtLName']}',permission = {$_POST['txtPer']} WHERE user_id = {$_POST['txtUserId']}";
    $result = mysqli_query($conn,$sql);
    if ($result)
        echo '<script>alert("Thành công");</script>';
    else
        echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
    }
    header("Refresh: 1; url='../'");
