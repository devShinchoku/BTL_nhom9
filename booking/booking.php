<?php
    require('../../config/db.php');
    if(isset($_POST['txtHo'])){
        $ho = $_POST['txtHo'];
    }
    $ten = $_POST['txtTen'];
    $email = $_POST['txtEmail'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['txtDiachi'];
    $total = $_POST['txtTotal'];
    $ttID = $_POST['txtID'];
    $ttIDT = $_POST['txtIDT'];

    $sql = "INSERT INTO db_order(order_id,tour_id,total,customer_fname,customer_lname,customer_phonenum,customer_email,customer_address)
     VALUES ('$ttIDT','$ttID','$total','$ho','$ten'','$sdt','$diachi')";
    
    $number = mysqli_query($conn,$sql);
    if($number > 0){
        header("location: index.php");
    }else{
        header("location: ../template/error/404.php");
    }
    mysqli_close($conn);
?>