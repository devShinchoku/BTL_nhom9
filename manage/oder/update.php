<?php
require '../../config/db.php';

    if(isset($_POST['btnSubmit'])){
    $sql = "UPDATE db_order SET status = {$_POST['txtStatus']} WHERE order_id = {$_POST['txtOderId']}";
    $result = mysqli_query($conn,$sql);
    if ($result)
        echo '<script>alert("Thành công");</script>';
    else
        echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
    }
    header("Refresh: 1; url='../");

