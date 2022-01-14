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
        echo 'loi';
    }else{
        $sql = "SELECT order_id FROM db_oder LIMIT 1 ORDER BY order_id DESC";
        $reslut = mysqli_query($conn,$sql);
        $order_id = mysqli_fetch_assoc($reslut);
        if(isset('chooseone-enter')){
            if(isset($_POST['quantity'])){
                $slnl = $_POST['quantity'];
                if($slnl != 0){
                    $sql ='';
                    for($i=1;$i<=$slnl;$i++){
                        $sql.="INSERT INTO db_passge(name,birthday,sex,order_id,type) VALUES('{$_POST['tennl'.$i]}','{$_POST['ngaysinh'.$i]}',..,".$order_id['order_id'].",1);";
                    }
                    $ketquanl = mysqli_query($conn,$sql);
                }
            }
        }
    }
?>

