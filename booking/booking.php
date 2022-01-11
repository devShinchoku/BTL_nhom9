<?php
    require('../config/db.php');
    // $hostname="localhost";
    // $dbname="tour";
    // $username="root";
    // $password="";
    // $conn= mysqli_connect("$hostname","$usename","$dbname");

    if(mysqli_connect_error())
    {
        echo"Connection Failed..".mysqli_connect_error();
    }
    $result=mysqli_query($conn,"SELECT * FROM dichvu");
    echo"<center>";
    echo "<select>";
    echo "<option>-- Dich vu --</option>";
    while($row=mysqli_fetch_array($result))
    {
        echo"<option>$row[TenDV] | $row[Gia]</option>";
    }
    echo"</select>";
    echo"</center>";
    mysqli_close($conn);
?>