<?php
    require('../config/db.php');
    if(isset($_POST['txtHo'])){
        $ho = $_POST['txtHo'];
    }
    $ten = $_POST['txtTen'];
    $email = $_POST['txtEmail'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['txtDiachi'];
    $total = $_POST['total-money'];
    $ttID = $_POST['txtID'];
    $orderdate = $_POST['date-dat'];

    $sql = "INSERT INTO db_order(tour_id,total,order_date,customer_fname,customer_lname,customer_phonenum,customer_email,customer_address)
     VALUES ('$ttID','$total','$orderdate','$ho','$ten','$sdt','$email','$diachi')";
    $ketqua = mysqli_query($conn,$sql);
    if(!$ketqua){
        header("location: ../template/error/404.php");
    }else{
        ?>
        <script>
            alert("Thông tin đã đượ tiếp nhận, đang chờ thanh toán");
            location.href = "index.php";                                   
        </script>
    <?php 
    }
?>

