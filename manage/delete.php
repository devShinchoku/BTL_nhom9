<?php
    require '../config/db.php';

   
    if($_SESSION['permission'] > 1){
        header('location:../');
    }
    else{
        if(isset($_GET['order_id'])){
            $sql = "DELETE FROM db_order WHERE order_id = {$_GET['order_id']}";
            $result = mysqli_query($conn,$sql);
        } 
        if(isset($_GET['category_id'])){
            $sql = "DELETE FROM db_tourcategory WHERE category_id = {$_GET['category_id']}";
            $result = mysqli_query($conn,$sql);
        } 
        if(isset($_GET['tour_id'])){
            $sql = "DELETE FROM db_tour WHERE tour_id = {$_GET['tour_id']}";
            $result = mysqli_query($conn,$sql);
        } 

        if($_SESSION['permission'] == 0){
            if(isset($_GET['user_id'])){
                $sql = "DELETE FROM db_user WHERE user_id = {$_GET['user_id']}";
                $result = mysqli_query($conn,$sql);
            }
        }
        if($result)
            echo '<script>alert("Thành công");</script>'; 
        else
            echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
        header("Refresh: 1; url='../manage/'");
    }
    
        
