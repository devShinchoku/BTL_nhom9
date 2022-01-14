<?php
session_start();
unset($_SESSION['user_id']);
?>
    <script>
        alert("Bạn đã đăng xuất");
        location.href = "index.php";                                   
    </script>
<?php 
?>