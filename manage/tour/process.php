<?php
require '../../config/db.php';
if (!isset($_SESSION['user_id'])) {
    header('location:../../accounts/');
} else {
    if ($_SESSION['permission'] > 1) {
        header('location:../../');
    } else {
        if (isset($_POST['btnInfo'])) {
            if (isset($_POST['txtIsIsta']))
                $i = 1;
            else
                $i = 0;
            $sql = "UPDATE db_tour
                SET name='{$_POST['txtTourName']}',tour_long={$_POST['txtTourLong']},
                starttime='{$_POST['txtStartDate']}',endtime='{$_POST['txtEndDate']}',
                description='{$_POST['txtDescription']}',
                rules='{$_POST['txtRules']}',policy='{$_POST['txtPolicy']}',
                man_price='{$_POST['txtManPrice']}',kid_price='{$_POST['txtKidPrice']}',
                child_price='{$_POST['txtChildPrice']}',country='{$_POST['txtCountry']}',
                city='{$_POST['txtCity']}',district='{$_POST['txtDistrict']}',
                address='{$_POST['txtAddress']}',is_installment=$i,
                promotion={$_POST['txtPromotion']},category_id={$_POST['txtTourCate']} WHERE tour_id={$_POST['txtTourID']}";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($_POST['btnPart'])) {
            $sql = "INSERT INTO db_tourpart(name, info, city, district, address, tour_id) VALUES ('{$_POST['txtPartName']}','{$_POST['txtPartDes']}','{$_POST['txtCity']}','{$_POST['txtPartDis']}','{$_POST['txtPartAddr']}',{$_POST['txtTourID']})";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($_POST['btnSV'])) {
            $sql = "INSERT INTO db_service(name, price, tour_id) VALUES ('{$_POST['txtSVname']}',{$_POST['txtSVprice']},{$_POST['txtTourID']})";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($_POST['btnPublic'])) {
            if (isset($_POST['cbxPublic']))
                $i = 1;
            else
                $i = 0;
            $sql = "UPDATE db_tour SET status = $i WHERE tour_id = {$_POST['txtTourID']}";
            $result = mysqli_query($conn, $sql);
        }
        if ($result)
            echo '<script>alert("Thành công");</script>';
        else
            echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
        header("Refresh: 1; url='../tour/?id={$_POST['txtTourID']}'");
    }
}
