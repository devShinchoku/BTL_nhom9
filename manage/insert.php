<?php
require '../config/db.php';
if (!isset($_SESSION['user_id'])) {
    header('location:../accounts/');
} else {
    if ($_SESSION['permission'] > 1) {
        header('location:../');
    } else {
        if (isset($_POST['txtCateName'])) {
            $sql = "INSERT INTO db_tourcategory(name,type,host_id) VALUES('{$_POST['txtCateName']}',{$_POST['txtCateType']},{$_SESSION['user_id']})";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($_POST['txtTourName'])) {
            $sql = "INSERT INTO db_tour(name,category_id) VALUES('{$_POST['txtTourName']}',{$_POST['txtTourCate']})";
            $result = mysqli_query($conn, $sql);
        }
        if ($result)
            echo '<script>alert("Thành công");</script>';
        else
            echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
        header("Refresh: 1; url='../manage/'");
    }
}
?>