<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['permission'])
?>
    <script>
        alert("Bạn đã đăng xuất");
        location.href = "index.php";                                   
    </script>
<?php 
?>