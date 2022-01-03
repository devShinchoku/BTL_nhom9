<?php
if($_POST['email'])
{
    require "db.php";
    $result = mysqli_query($conn,"SELECT * from users Where email ='" . $_POST['email'] ."'");

    if(mysqli_num_rows($result) <= 0)
    {
        echo "Email hop le";
    }else{
        echo "email da dc dang ki";
    }
}
?>