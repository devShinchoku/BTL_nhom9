<?php
    require '../../config/db.php';
    if(isset($_GET['id']) && isset($_GET['tour_id'])){
        $sql = "DELETE FROM db_tourpart WHERE part_id = {$_GET['id']}";
        $result = mysqli_query($conn,$sql);
        echo $result;
        if($result)
            echo '<script>alert("Thành công");</script>'; 
        else
            echo '<script>alert("Lỗi xảy ra, hãy thử lại sau");</script>';
        header("Refresh: 1; url='../tour/?id={$_GET['tour_id']}'");
    }
?>